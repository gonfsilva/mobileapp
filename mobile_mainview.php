<div id="map_wrap">
<?php  echo $map['html']; ?>
</div>


	<div id="searchquick" style="height: 200px;postition:fixed; top: 150px; left:0px; position: fixed; width:100%;">
		<div style="background: #ccc;height: 100px; text-overflow: ellipsis;overflow: hidden; white-space: nowrap;">
            <div style="height: 100px;" class="buttonsearch" time="1" class="buttonsearchselecionado"><p style="line-height: 2em;margin: 0.25em 0;font-size: 40px;">Hoje</p></div>
            <div style="height: 100px;" class="buttonsearch" time="2"><p style="line-height: 2em;margin: 0.25em 0;font-size: 40px;border-left: solid 1px #999;">Amanhã</p></div>
            <div style="height: 100px;" class="buttonsearch" time="7"><p style="line-height: 2em;margin: 0.25em 0;font-size: 40px;border-left: solid 1px #999;">Semana</p></div>
        </div>
        <div style="height: 100px;width: 100%; text-align: center; padding-top: 0px;text-overflow: ellipsis;overflow: hidden; white-space: nowrap;position: fixed; background:#ccc; border-bottom: 1px solid #999;">
        	<p style="line-height: 2em;margin: 1em 0;">
   		        <span class="filterLabel"><i class="icon-search icon-2x"></i></span><input id="filter" class="rounded" name="filter" size="40" style="box-shadow: none;height: 60px; width:60%; font-size: 40px;border-radius: 20px;" />
            </p>
        </div>
    </div>
	<div id="barra" style="top:350px; background: #ccc;">
		<table class="ink-table ink-hover">
			<tbody>
			<tr><td id="refresh" style="text-align: center"><img id="spinner" src="/imgs/ns_spinner_small.gif" alt="Loading..." /><p class="rotate_refresh"><i class="icon-arrow-up"></i></p></td></tr>
	  		<tr id="bardivis"></tr>
	  		</tbody>
		</table>
	</div>


<div id="home_button" style="width: 150px; height: 150px;">
	<div style="padding: 42px 0px;">
	<i class="icon-home icon-4x"></i>
    </div>
</div>

<div id="marker_button" style="width: 150px; height: 150px;">
	<div style="padding: 42px 0px;">
	<i class="icon-map-marker icon-4x" style="color:#fff;"></i>
    </div>
</div>

<script>
$('body').css({'display' : 'none'});
var dist = 30000; //radius (distance in meters) of the search parties circle
var firstfilter = 1;
//get saved distance for current user

function clearMarkers() {
    if (markers) {
        for (var i=markers.length-1; i>0; i--) {
            markers[i].setMap(null);
            markers.pop();
            lat_longs.pop();
        }
    }   
}
function insertPartyMarker(markerOptions){
	var marker = createMarker(markerOptions);
	
	google.maps.event.addListener(marker, 'click', function() {
        window.location.href = '/mobile/party/' + (marker.id);
     });
	 return marker;
}

function refreshBar(){
	var checkNumParty = 0;
	$.ajax({
		type: "post",
		url: "http://quemtem-crazyshit.rhcloud.com/get_parties",
		cache: false,				
		data: "lat=" + lat + "&lon=" + lon + "&dist=" + window.dist + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
		success: function(json){						
		try{		
			var obj = jQuery.parseJSON(json);
			if(obj['error'] == '0') {
				delete obj['error'];
				$('tbody').empty();
				clearMarkers();
				$('tbody').append("<tr><td id=\"refresh\" style=\"text-align: center\"><img id=\"spinner\" class=\"shadowfilter\" src=\"/imgs/ns_spinner_small.gif\" alt=\"Loading...\" /><p class=\"rotate_refresh\"><i class=\"icon-arrow-up\"></i></p></td></tr>");
				jQuery.each(obj, function(i, val) {
					
					var tempdatahorastr = val['datahora'];
					var temp = tempdatahorastr.split(' ');
					var datahora = temp[0].split('-');
					var hora = temp[1].split(':');

					switch (datahora[1]) {
						    case '01': var month = "JAN"; break;
   							case '02': var month = "FEV"; break;
    						case '03': var month = "MAR"; break;
							case '04': var month = "ABR"; break;
   							case '05': var month = "MAI"; break;
    						case '06': var month = "JUN"; break;
							case '07': var month = "JUL"; break;
   							case '08': var month = "AGO"; break;
    						case '09': var month = "SET"; break;
							case '10': var month = "OUT"; break;
   							case '11': var month = "NOV"; break;
    						case '12': var month = "DEZ"; break;
							default: var month = "JAN";
					}
					var distkm = (val['distance'] / 1000);
					var str = distkm.toFixed(2);
					var distancetemp = str.toString();
					if(val['sponsored'] == 1){
						var nomeuser = val['sponsorfbname'];
						var linkfoto = "https://graph.facebook.com/"+val['sponsorfbid']+"/picture?width=100&height=100";
						var linkfbfoto = "window.open('https://www.facebook.com/"+val['sponsorfbid']+"')";
					} else {
						var nomeuser = val['nomeuser'];	
						var linkfoto = "https://graph.facebook.com/"+val['facebook_id']+"/picture?width=100&height=100";
						var linkfbfoto = "window.open('https://www.facebook.com/"+val['facebook_id']+"')";
					}
					if(val['Diatodo'] == 0){
						var horatemp2 = "";
						//aqui
						var horatemp = horatemp2.concat(hora[0]+':'+hora[1]);
					}else{
						var horatemp = "N/D";
					}
					
					$('#barra > table > tbody').append("<tr id=\"festaBarra\" partyid=\""+val['idfesta']+"\" data_festa=\""+temp[0]+"\" hora_festa=\""+temp[1]+"\"><td id=\"barra_festa\" style=\"width: 100%; padding: 5px 0px; border: none;\"><table style=\"font-size: 14px; line-height: 0.9em;width: 100%;\" id=\"rowParty_row\"><td style=\"width: 150px; padding: 5px 1px; text-align: center; border: none;line-height: 1;\"><h3 style=\"line-height: 0.5; font-size: 70px;\"> "+datahora[2]+"</h3><h7 style=\"line-height: 0.5; font-weight: bold; font-size: 38px;\">"+month+"</h7></td><td id=\"borderList\" style=\" border-bottom: none; padding-left: 10px;line-height: 1;\"><h5 id=\"nome_barra_main_mobile\">"+val['nome']+"</h5><h10 style=\" border: none; opacity: 0.9;font-size: 30px;\"><i class=\"icon-road\"></i> &nbsp&nbsp"+distancetemp+"&nbsp km &nbsp&nbsp<i class=\"icon-time\"></i> &nbsp&nbsp "+horatemp+"&nbsp&nbsp  <i class=\"icon-pushpin\"></i> &nbsp&nbsp "+val['local']+"</h10></td><td style=\" border: none; width: 100px; text-align: right; padding-right: 5px;font-size: 30px;\"><img id=\"accimgMain\" onClick=\""+linkfbfoto+"\" src=\""+linkfoto+"\"><div style=\"line-height: 1; text-align: center; font-size: 30px; opacity: 0.8; float: right;word-break: normal;\">"+nomeuser+"</div></td></table></td></tr>");
					if( val['icon'] == "/imgs/icon_party_oct2_2"){
						var linkicon = 	"http://www.markericons.eu/ico?file=fe7d1309bfe742b1a897ba07884cff7b.png&txt="+val['local']+"&va=top&fs=24";
					} else {
						var linkicon = val['icon']+'_mobile.png';
					}
					var markerOptions = {
						map: window.map,
						position: new google.maps.LatLng(val['lat'], val['lon']),	
						animation: google.maps.Animation.DROP,
						title:val['nome'],
						id:val['idfesta'],
						local:val['local'],
						icon: linkicon,
						iconname: linkicon
					};
					insertPartyMarker(markerOptions);
					checkNumParty++;
				});
				
				$('#barra > table > tbody').append("<tr id=\"bardivis1\"><td style=\"font-size: 10px; text-align: center;display: block;\"><p></p><p style=\"font-size: 50px;\">Nenhuma festa encontrada</p><p></p></td></tr>");
				refreshdate($('.buttonsearchselecionado').attr('time'));
				$('#barra > table > tbody').append("<tr id=\"bardivis\" style=\"border: none;\"></tr>");
				$("#bardivis").css({ height: ($(document).height() - $("#barra_festa:eq(0)").height() - 150) + 'px' }); 
				$('#barra').scrollTop($('#refresh').height() + 14);
				window.refresh_height = 20;
			}else if(obj['error'] == '2'){
				$('tbody').empty();
				clearMarkers();
				$('tbody').append("<tr><td id=\"refresh\" style=\"text-align: center\"><img id=\"spinner\" class=\"shadowfilter\" src=\"/imgs/ns_spinner_small.gif\" alt=\"Loading...\" /><p class=\"rotate_refresh\"><i class=\"icon-arrow-up\"></i></p></td></tr>");
				$('tbody').append("<tr id=\"bardivis1\"><td style=\"font-size: 10px; text-align: center;display: block;\"><p></p><p style=\"font-size: 50px;\">Nenhuma festa encontrada &nbsp </p><p></p></td></tr>");  
				$('#barra > table > tbody').append("<tr id=\"bardivis\"></tr>");
				$("#bardivis").css({ height: ($(document).height() - $("#barra_festa:eq(0)").height() - 40) + 'px' });

				$('#barra').scrollTop($('#refresh').height() + 14);
				window.refresh_height = 20;
			}else{
				noty({text: 'Pedimos desculpa, houve um erro no pedido à base de dados.<br/>Por favor tente outra vez!', type: 'warning'});
			}
			
		}catch(e) {		
			noty({text: 'Excepção no pedido AJAX', type: 'warning'});
		}		
		},
		error: function(){						
			noty({text: 'Erro no pedido AJAX', type: 'warning'});
		},
		beforeSend: function(){
			$('#refresh p:eq(0)').hide();
			$('.rotate_refresh').hide();
			$('#spinner').show();
			//$('.circle1').show();
			$('#barra').scrollTop(0);
		},
		complete: function(){
			$('#filter').css({'color': '#666'});
			window.firstfilter = 1;
			$('#filter').val("Pesquise Nomes e Locais...");
		}
	});
}

function datautcnum(datahorastr){  //return numero de segundos desde 1 jan 1970
	var datahorastr = datautc(datahorastr);
	var temp = datahorastr.split(' ');
	var datahora = temp[0].split('/');
	var hora = temp[1].split(':');
	var n = new Date(datahora[2], (datahora[1]-1), datahora[0], hora[0], hora[1], 0, 0);
    var x = n.getTime();
	x = x.toString();
	return (x);
}

function refreshdate(time){
    var d = new Date();
    var n = d.getTime();
    var b = parseInt(n.toString()) + (parseInt(time) * 86400000); //dias de procura
    var n = new Date(b);
    n.setMinutes(00);
    n.setHours(06);
    n.setMilliseconds(000);
    n.setSeconds(00);
	var tempolimite = n.getTime();
	var count = 0;
	$('#bardivis1').css({'display': 'none'});
	for (var i=markers.length-1; i>0; i--) {
		markers[i].setOptions({icon:markers[i].iconname});//"http://www.markericons.eu/ico?file=fe7d1309bfe742b1a897ba07884cff7b.png&txt="+markers[i].local+"&va=top&fs=24"});
	}
	$("tr#festaBarra").each(function () {
			var datatemp = $(this).attr('data_festa');
			datatemp = datatemp.concat(" ");
			datatemp = datatemp.concat($(this).attr('hora_festa'));
			var datafesta = datautcnum( datatemp);
			tempolimite = parseInt(tempolimite);
			datafesta = parseInt(datafesta);
            if (datafesta > tempolimite) {
                $(this).addClass("hiddentime");
				for (var i=markers.length-1; i>0; i--) {
					if(markers[i].id == $(this).attr('partyid')){
						markers[i].setOptions({icon:'/imgs/transparent.gif'});
					}
				}
            } else {
                $(this).removeClass("hiddentime");
                count++; //festas visiveis
            }
        }); 
    if(count == 0){
		$('#bardivis1').css({'display': 'block'});
	}    
  	$('#barra').scrollTop($('#refresh').height() + 14);
	return 1;
}
		
function datautc(datahorastr){   //return "YYYY/MM/DD HH:MM:SS:mm"
	var temp = datahorastr.split(' ');
	var datahora = temp[0].split('-');
	var hora = temp[1].split(':');
	var d = new Date();
	var n = d.getTimezoneOffset();
	var tempdatahora = new Date(Date.UTC(parseInt(datahora[0]),(parseInt(datahora[1])-1),parseInt(datahora[2]),parseInt(hora[0]),parseInt(hora[1]), parseInt([2])) - n*60000);
	var tempdatahorastr = tempdatahora.getUTCDate() +"/"+
  	("0" + (tempdatahora.getUTCMonth()+1)).slice(-2) +"/"+
  	tempdatahora.getUTCFullYear() + " " +
  	("0" + tempdatahora.getUTCHours()).slice(-2) + ":" +
  	("0" + tempdatahora.getUTCMinutes()).slice(-2);
	return tempdatahorastr;
}

if("ontouchstart" in window){ //ipad 
} else {
	window.location.href = "http://quemtem-crazyshit.rhcloud.com/main"; 	
}

$(document).ready(function(){
	window.lastMarker = null;
	window.direction = 1;
	window.searchtime = 0;
	//Initialization of the scroll starting at second element of the list
	$("#barra").css({ overflow: 'scroll'}); 
	$("#barra").css({ '-webkit-overflow-scrolling': 'touch'});

	//Resize function and .trigger when page loaded
	$(window).resize(function(){
		var tamanho = ($(document).height() -150);
		var tamanhoscroll = ($(document).height() - 350);
		//height() and width()
		//MAPA
			$('#map_main').width( $(document).width());
		//BARRA
			$('#searchquick').width( $(document).width());

			$('#barra').width( $(document).width()).css({ height: tamanhoscroll+'px'});

		// resize bardivis
			$("#bardivis").css({ height: ($(document).height() - 150) + 'px' }); 
		
		//RESIZE POSITION OF BARRA
			if(window.direction == 1 ){
	            $('#barra').css({left: ($(document).width()) + 'px'}); 
			} else {
	            $('#barra').css({left: '0px'}); 
			}
		
	}).trigger('resize');
	
	$('#barra').on('click','#festaBarra', function(){ //tap delegate event is not working
		window.location.href = '/mobile/party/' + $(this).attr('partyid');
	}); // close click event
	$('#searchquick').on("tap", ".buttonsearch", function(){
		$('.buttonsearch').removeClass('buttonsearchselecionado');
		$(this).addClass('buttonsearchselecionado');
		refreshdate($(this).attr("time"));
	});
	$('#searchquick > div:nth-child(1) > div:nth-child(1)').trigger('tap');
	$('#barralink').on("tap", function(){
		$('#barralink').css({ 'display': 'none' });
		$('#maplink').css({ 'display': 'inline' });
		$('#marker_button').css({ 'display': 'none' });
		$('#barra').animate({"left": "0px"}, 400);
		$('#topbarinfotext').text('Lista');
		window.direction = 0;
	});
	$('#maplink').on("tap", function(){
		$('#maplink').css({ 'display': 'none' });
		$('#barralink').css({ 'display': 'inline' });
		$('#marker_button').css({ 'display': 'inline' });
		$("#barra").animate({"left": ( $(document).width())+"px"},400);
		$('#topbarinfotext').text('Mapa');
		window.direction = 1;
	});
	$('#marker_button').on('tap', function(){
        window.map.panTo(marker_0.getPosition());
	});
	window.refresh_height = 20;
	$('#barra').scroll(function(){
    	var posTop = $('#barra').scrollTop();
		if(posTop <= 40){
			$(".rotate_refresh").rotate({
       			duration: 150,
       			animateTo: 180
      		});
			if( parseFloat(posTop) <= window.refresh_height ) {window.refresh_height = -1; refreshBar();}
		}
	});

    // PRINT QRCODES -- pôr sempre em doc ready
    //createPrintMenu();
	//search party
	$('body').css({'display' : 'block'});

	$('#filter').css({'color': '#bbb'});
	$('#filter').val("Pesquise Nomes e Locais...");	
	
	$('#filter').on("focus", function(){
		if(window.firstfilter){
			$('#filter').val("");
			$('#filter').css({'color': '#666'});
			window.firstfilter = 0;
		} else {
			$('#filter').css({'color': '#666'});
		}
	});
	
	$('#filter').on("focusout",function(){
		$('#filter').css({'color': '#bbb'});		
	});
	
	$("#filter").keyup(function () {
		var filter = $(this).val();
		for (var i=markers.length-1; i>0; i--) {
			markers[i].setOptions({icon:'/imgs/transparent.gif'});
		}
		$("#barra #borderList > h5").each(function () {
			if ($(this).text().search(new RegExp(filter, "i")) < 0) {
				if ($(this).parent().find('h10').text().search(new RegExp(filter, "i")) < 0) {
					$(this).parent().parent().parent().parent().parent().parent().addClass("hidden");
					for (var i=markers.length-1; i>0; i--) {
						if(markers[i].id == $(this).parent().parent().parent().parent().parent().parent().attr('partyid')){
							markers[i].setOptions({icon:'/imgs/transparent.gif'});
						}
					}
				} else {
					$(this).parent().parent().parent().parent().parent().parent().removeClass("hidden");
					for (var i=markers.length-1; i>0; i--) {
						if(markers[i].id == $(this).parent().parent().parent().parent().parent().parent().attr('partyid') && !($(this).parent().parent().parent().parent().parent().parent().hasClass("hiddentime"))){
							markers[i].setOptions({icon:markers[i].iconname});//"http://www.markericons.eu/ico?file=fe7d1309bfe742b1a897ba07884cff7b.png&txt="+markers[i].local+"&va=top&fs=24"});
						}
					}
				}
			} else {
				$(this).parent().parent().parent().parent().parent().parent().removeClass("hidden");
				for (var i=markers.length-1; i>0; i--) {
					if(markers[i].id == $(this).parent().parent().parent().parent().parent().parent().attr('partyid') && !($(this).parent().parent().parent().parent().parent().parent().hasClass("hiddentime"))){
						markers[i].setOptions({icon:markers[i].iconname});//"http://www.markericons.eu/ico?file=fe7d1309bfe742b1a897ba07884cff7b.png&txt="+markers[i].local+"&va=top&fs=24"});
					}
				}
			}
		});
	});
	$('.buttonsearch').css({ 'height': '100px' });
	$('#topbarinfo').css({ 'display': 'inline' });
}); // close document ready
</script>
