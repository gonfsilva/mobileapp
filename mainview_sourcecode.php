<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content = "user-scalable = no">
    <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="google-site-verification" content="RYjIl3WW93ZAZgyPDolFoYF3NPOenfOOvzd0A2DEr3g" />
    <html itemscope itemtype="http://schema.org/Other">
    <meta itemprop="name" content="nextstop.pt">
	<meta itemprop="description" content="A tua festa! Encontra uma festa perto de ti.">
	<meta itemprop="image" content="https://plus.google.com/u/2/117431947481999930682/about?pid=6059986107271460418&amp;oid=117431947481999930682">
    <meta name="msvalidate.01" content="B06D57398B163B00F6BC6B51E1DCF32A" />
   		<!-- Run in full-screen mode. -->
        <meta name="apple-mobile-web-app-capable" content="yes">
 
        <!-- Make the status bar black with white text. -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
 
        <!-- Customize home screen title. -->
        <meta name="apple-mobile-web-app-title" content="Web App">
 
        <!-- Disable phone number detection. -->
        <meta name="format-detection" content="telephone=no">
 
        <!-- Set viewport. -->
       <!-- <meta name="viewport" content="initial-scale=1"> -->
 
        <!-- Prevent text size adjustment on orientation change. -->
        <style>html { -webkit-text-size-adjust: 100%; }</style>
 
    <title>NextStop | A tua festa!</title>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/jquery.slimscroll.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/jquery.unveil.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/mobiscroll.custom-2.5.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/jQueryRotate.2.2.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/jquery.ui.touch-punch.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/tap/jquery.tap.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/noty/jquery.noty.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/noty/layouts/bottomCenter.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://quemtem-crazyshit.rhcloud.com/js/noty/themes/default.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js" charset="UTF-8"></script>
<link type="text/css" rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" media="screen" />
<link type="text/css" rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://quemtem-crazyshit.rhcloud.com/css/ink.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://quemtem-crazyshit.rhcloud.com/css/account.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://quemtem-crazyshit.rhcloud.com/css/main.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://quemtem-crazyshit.rhcloud.com/css/main2.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://quemtem-crazyshit.rhcloud.com/css/mobiscroll.custom-2.5.0.min.css" media="screen" />
<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" media="screen" />

	<!--[if IE ]>
	<link rel="stylesheet" href="/ink-v1/css/ink-ie.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<![endif]-->
	
	<!--GoogleAnalytics-->
    
    
			<script type="text/javascript">
			//<![CDATA[
			
			var map; // Global declaration of the map
			//var iw = new google.maps.InfoWindow(); // Global declaration of the infowindow
			var lat_longs = new Array();
			var markers = new Array();
			function initialize() {
				
				 
				var myOptions = {
			  		zoom: 13,
			  		mapTypeId: google.maps.MapTypeId.ROADMAP,
					zoomControl: false,
					panControl: false,
					scaleControl: false}
				map = new google.maps.Map(document.getElementById("map_main"), myOptions);
				
				// Try W3C Geolocation (Preferred)
				if(navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function(position) {
						map.setCenter(new google.maps.LatLng(position.coords.latitude,position.coords.longitude));
					}, function() { alert("O Servi�o de Localiza��o falhou. Se se encontra num dispositivo com iOS por favor verifique que tem o servi�o de localiza��o activado."); });
				// Browser doesn't support Geolocation
				}else{
					alert('Your browser does not support geolocation.');
				}
			google.maps.event.addListener(map, "bounds_changed", function(event) {
    			if (!centreGot) {
			var mapCentre = map.getCenter();
			window.lat = mapCentre.lat();
			window.lon = mapCentre.lng();
			marker_0.setOptions({ position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) });
			var fcircleOptions = {
		    	  strokeColor: "#FF0000",
		    	  strokeOpacity: 0.4,
		    	  strokeWeight: 0.8,
		    	  fillColor: "#FFFFFF",
		    	  fillOpacity: 0.2,
		    	  radius: window.dist,
		    	  map: map
			};
			window.festasCircle = new google.maps.Circle(fcircleOptions);
			festasCircle.bindTo('center', marker_0, 'position');
			refreshBar();
		} centreGot = true;
  			});
				
			var markerOptions = {
				map: map,
				draggable: true,
				icon: "/imgs/icon_me_mobile.png",
				animation:  google.maps.Animation.DROP		
			};
			marker_0 = createMarker(markerOptions);
			
				google.maps.event.addListener(marker_0, "dragend", function(event) {
					window.lat = event.latLng.lat(); window.lon = event.latLng.lng(); refreshBar();
				});
				
			fitMapToBounds();
			
			
			}
		
		
		function createMarker(markerOptions) {
			var marker = new google.maps.Marker(markerOptions);
			markers.push(marker);
			lat_longs.push(marker.getPosition());
			return marker;
		}
		
			function fitMapToBounds() {
				var bounds = new google.maps.LatLngBounds();
				if (lat_longs.length>0) {
					for (var i=0; i<lat_longs.length; i++) {
						bounds.extend(lat_longs[i]);
					}
					map.fitBounds(bounds);
				}
			}
			
			function loadScript() {
				var script = document.createElement("script");
  				script.type = "text/javascript";
  				script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
  				document.body.appendChild(script);
			}
			window.onload = loadScript;
			
			//]]>
			</script>    
</head>
<body>
<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-40119296-1', 'nextstop.pt');ga('send', 'pageview');
		var centreGot = false;
		$('body').delay('1000').animate({ scrollTop: '0px' }, 'slow'); //simple trick for ios chrome users with fullscreen functionality to see the whole pageh
	</script>
    
<div id="topbar" style="height: 150PX">
	<nav class="ink-navigation ink-collapsible ink-container" style="padding:none;">
		<ul class="menu horizontal flat black" style="width: 100%;text-align: center;">
        	<li id="maplink" style="display:none; float: left;">
            	<div style="padding-top: 42px;height: 108px;">
            		<i class="icon-map-marker icon-4x" style="color:#fff;"></i> <span style="font-size: 50px;"><!--&nbsp Mapa --></span>
                </div>
            </li>
             <li id="backlink" style="display:none; float: left;">
            	<div style="padding-top: 42px;height: 108px;">
            		<i class="icon-chevron-left icon-4x" style="color:#fff;"></i> <span style="font-size: 50px;"><!--&nbsp Mapa --></span>
                </div>
            </li>
			<li id="logoOnBar" style="position: fixed; left:0; display:none;">
				<a href="/mobile/main"><img id="logoNS" src="/imgs/ns_logo.gif" style="height: 150px;" /><span style="color: #fff; font-size: 50px;">&nbsp; Mapa</span></a>
			</li>
            <li id="topbarinfo" style="position: fixed; left:42%; display:none;">
	            <div style="padding-top: 70px;height: 108px;padding-right: 100px;">
				&nbsp;<span id="topbarinfotext" style="color: #fff; font-size: 50px;">Mapa</span></a>
                </div>
			</li>
            <li id="barralink" style="float: right;">
            	<div style="padding-top: 42px;height: 108px;padding-right: 100px;">
            		<span style="font-size: 50px; color:#fff;"><!--Lista &nbsp --></span> <i class="icon-list icon-4x" style="color:#fff;"></i>
                </div>
            </li>
		</ul>
	</nav>
</div>
<div id="map_wrap">
<div id="map_main" style="width:100%; height:100%;"></div></div>


	<div id="searchquick" style="height: 200px;postition:fixed; top: 150px; left:0px; position: fixed; width:100%;">
		<div style="background: #ccc;height: 100px; text-overflow: ellipsis;overflow: hidden; white-space: nowrap;">
            <div style="height: 100px;" class="buttonsearch" time="1" class="buttonsearchselecionado"><p style="line-height: 2em;margin: 0.25em 0;font-size: 40px;">Hoje</p></div>
            <div style="height: 100px;" class="buttonsearch" time="2"><p style="line-height: 2em;margin: 0.25em 0;font-size: 40px;border-left: solid 1px #999;">Amanh�</p></div>
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
		url: "http://quemtem-crazyshit.rhcloud.com/api/parties?lat=" + lat + "&lon=" + lon + "&dist=" + window.dist,
		cache: false,				
		success: function(json){						
		try{		
			var obj = jQuery.parseJSON(json);
			if(obj['error'] == '0') {
				delete obj['error'];
				$('tbody').empty();
				clearMarkers();
				$('tbody').append("<tr><td id=\"refresh\" style=\"text-align: center\"><img id=\"spinner\" class=\"shadowfilter\" src=\"/imgs/ns_spinner_small.gif\" alt=\"Loading...\" /><p class=\"rotate_refresh\"><i class=\"icon-arrow-up\"></i></p></td></tr>");
				jQuery.each(obj['data'], function(i, val) {
					
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
				noty({text: 'Pedimos desculpa, houve um erro no pedido � base de dados.<br/>Por favor tente outra vez!', type: 'warning'});
			}
			
		}catch(e) {		
			noty({text: 'Excep��o no pedido AJAX', type: 'warning'});
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
	//window.location.href = "http://quemtem-crazyshit.rhcloud.com/main"; 	
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

    // PRINT QRCODES -- p�r sempre em doc ready
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