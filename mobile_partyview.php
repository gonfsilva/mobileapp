<div id="fbidSpace" style="display: none;" fbid="0"></div>
<div id="party_content" style="padding-top:150px;">
<div id="party_header">
<div class="boxe effect6">
	<?php  echo $map['html']; ?>
	<img id="festaimg" src="/imgs/ns_party_default.jpg">
    <div id="festauplover">
        <div align="center">
            <form method="post" action="" id="upload_file" enctype="multipart/form-data">
                    <input id="userfile" class="ink-button" type="file" name="userfile" size="20" style="display:none">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <div id="submitimg"><i class="icon-plus"></i> Mudar Foto</div>
            </form>
        <div id="output"></div>
     	</div>
    </div>
</div>
</div>
<div id="party_body">
<div id="partyleftcolumn" style="width:95%; padding: 0px 25px;line-height: 1.5;">
	<h4 id="nome" style="font-size: 50px;margin-bottom: 40px;"><?php echo ($party['partyid'] === FALSE) ? 'Título da festa' : $party['nome']; ?></h4>
    <div id="festainfo" style="padding: 0px 0px;">
    	<div id="info_sep" style="float: none;">
			<i class="icon-time icon-2x" style="font-size: 40px;"></i>
        	<div id="rightcompmobile"  style="font-size: 40px;">Data/Hora</div>
        	<div id="datahorafesta"  style="font-size: 50px;"></div>
        </div>
        <div id="info_sep" style="float: none;">
			<i class="icon-pushpin icon-2x" style="font-size: 40px;"></i>
        	<div id="rightcompmobile" style="font-size: 40px;">Nome do Local</div>
            <div class="editContainee" style="border: none;padding-top: 0; font-size:50px;" id="local">
                <?php echo ($party['partyid'] === FALSE) ? 'Local da Festa' : $party['local']; ?>
            </div>
        </div>
        <div id="info_sep" style="display: none; float: none;">
        	<i class="icon-male icon-2x" style="font-size: 40px;"></i>
        	<div id="rightcompmobile"  style="font-size: 40px;">Dresscode</div>
			<div dcval="<?php echo ($party['partyid'] === FALSE) ? '0' : $party['dresscode']; ?>" id="dresscode"   style="font-size: 50px;">
			<?php if($party['partyid'] !== FALSE){ switch($party['dresscode']) {case 0: echo 'Não Especificar'; break; case 1: echo 'Formal'; break; case 2: echo 'Casual'; break; case 3: echo 'Casual Chiq'; break; } }else{ echo 'Não Especificar'; } ?>
			</div>
        </div>
        <div id="info_sep" style="float: none;">
			<i class="icon-building icon-2x" style="font-size: 40px;"></i>
        	<div id="rightcompmobile"  style="font-size: 40px;">Morada</div>
        	<div id="morada" title="Arrasta o marcador no mapa para alterar a morada!"  style="font-size: 50px;"></div>
        </div>
	    <div class="buttongeneralmobile" id="googleMapsButton" style="float:none;margin-top: 40px;"><p style="font-size: 50px; font-weight: bold;margin-left:5px;margin-right:5px; line-height: 1em;"><i class="icon-map-marker"></i><span key="IrParaGoogleMaps" class="translate"> Ir para Google Maps </span></p></div>
        <div class="buttongeneralmobile" id="facebookButton" style="display:none;margin-top: 20px;margin-bottom: 40px; float:none;"><p style="font-size: 52px;margin-right:5px; line-height: 1em;"><i class="icon-facebook"></i> Ver evento no facebook</p></div>
	</div>
	<div class="editContainer" style="float: none;">
		<div id="info_sep" class="editIconContainer" style="margin-bottom: 0;position: relative; font-size: 40px; float:none;"><i class="icon-list icon-2x" style="font-size: 32px;"></i><div id="rightcompmobile"  style="font-size: 40px;">Descrição</div>
    	</div>
		<div class="collapseFix" style="margin: 0px;">
			<div class="editContainee" id="descricao"  style="margin: 0px;font-size: 50px; border:none;">
			</div>
		</div>
	</div>
    <div class="editContainer" id="convidadosContainer">
		<div id="friendsFBIcon" class="editIconContainer"><i class="icon-group"></i><span style="padding-left:4px; font-size:11px;"> AMIGOS CONVIDADOS</span></div><div class="editIconContainerArrow" style="font-size:14px"><i class="icon-chevron-down noTextCursor"></i></div>
        <div class="collapseFix" style="padding: 25px 0px;">
        <div class="noeditContainee" style="height:0"></div>
		</div>
	</div>
</div>

</div>
</div>

<script>
var d = new Date();
var n = d.getTimezoneOffset();
var tempdatahora = new Date(Date.UTC(<?php if($party['partyid'] !== FALSE){ echo $party['datahora']->format("Y").",".($party['datahora']->format("m")-1).",".$party['datahora']->format("d").",".$party['datahora']->format("H").",".$party['datahora']->format("i"); }else{ echo date("Y", time()).",".(date("m", time())-1).",".date("d", time()).",".date("H", time()).",".date("i", time()); } ?>) - n*60000);
var tempdatahorastr = tempdatahora.getUTCDate() +"/"+
  ("0" + (tempdatahora.getUTCMonth()+1)).slice(-2) +"/"+
  tempdatahora.getUTCFullYear() + " " +
  ("0" + tempdatahora.getUTCHours()).slice(-2) + ":" +
  ("0" + tempdatahora.getUTCMinutes()).slice(-2);
if(<?php echo ($party['partyid'] === FALSE) ? '0' : $party['sponsored']; ?>){
	var tempdatahorastr = "<?php echo ($party['partyid'] === FALSE) ? '0' : $party['datahora']->format('d/m/Y H:i'); ?>";
	var tempdatahorastrf = "<?php echo ($party['partyid'] === FALSE) ? '0' : $party['datahoraf']->format('d/m/Y H:i'); ?>";
	if(<?php echo ($party['partyid'] === FALSE) ? '0' : $party['Diatodo']; ?>){
		if(tempdatahorastrf != tempdatahorastr){
			var datafinal = datashowreadysemhora(tempdatahorastrf);
			var datainicio = datashowreadysemhora(tempdatahorastr);
			$('#datahorafesta').append("<span id=\"rightcompmobile\" style=\"margin-right: 5px;\">DE </span>").append(datainicio).append("<br><span id=\"rightcompmobile\" style=\"margin-right: 5px;\">ATÉ </span>").append(datafinal);
		}else{
			var datainicio = datashowreadysemhora(tempdatahorastr);
			$('#datahorafesta').append(datainicio);
		} 
	}else{
		if(tempdatahorastrf != tempdatahorastr){
			var datafinal = datashowready(tempdatahorastrf);
			var datainicio = datashowready(tempdatahorastr);
			$('#datahorafesta').append("<span id=\"rightcompmobile\" style=\"margin-right: 5px;\">DE </span>").append(datainicio).append("<br><span id=\"rightcompmobile\" style=\"margin-right: 5px;\">ATÉ </span>").append(datafinal);
		}else{
			var datainicio = datashowready(tempdatahorastr);
			$('#datahorafesta').append(datainicio);
		}
	}
}else{
	var datashowreadytemp = datashowready(tempdatahorastr);
	$('#datahorafesta').append(datashowreadytemp);
}
/* Create or Update party variables init */
var firstInsert = <?php echo ($party['partyid'] === FALSE) ? '1' : '0'; ?>;
var url = <?php echo ($party['partyid'] === FALSE) ? '\'insert\'' : '\'update\''; ?>;
var partyid = <?php echo ($party['partyid'] === FALSE) ? 'false' : $party['partyid']; ?>;
//facebookButton implementation
var checkfacebooktemp = "<?php echo ($party['partyid'] === FALSE) ? '0' : $party['fbeventid']; ?>";
var checkfacebook = parseInt(checkfacebooktemp);
if (checkfacebook){
	var str = "https://www.facebook.com/events/";
	var eventidtemp = checkfacebook.toString();
	var temp = str.concat(eventidtemp);
	$('#facebookButton').attr('data', temp);
	$('#facebookButton').css({'display': 'block'});
}
/* end block */
//function to process tooltip classes
//Copyright *http://www.alessioatzeni.com* Alessio Atzeni
function nl2br (str){
	return str.replace(/\n/g, "<br>");
}
function clean(){
	$(window).off("beforeunload");
}
//function to process party creation/update

function getAddress() {
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({'latLng': marker_0.getPosition(), 'language': 'pt-Pt'}, function(responses, status) {
		if (status == google.maps.GeocoderStatus.OK && responses.length > 0) {
	    	$('#morada').html(responses[0].formatted_address);
		} else {
	    	noty({text: 'O Google Maps não conseguiu determinar a morada do local!', type: 'error', timeout: '3000'});
		}
	});
}

function datashowreadysemhora(strtemp){
	var temp = strtemp.split(' ');
	var tempdatahora = temp[0].split('/');
	var hora = temp[1].split(':');
	switch (tempdatahora[1]) {
		case '01': var month = "Janeiro"; break;
		case '02': var month = "Fevereiro"; break;
		case '03': var month = "Março"; break;
		case '04': var month = "Abril"; break;
		case '05': var month = "Maio"; break;
		case '06': var month = "Junho"; break;
		case '07': var month = "Julho"; break;
		case '08': var month = "Agosto"; break;
		case '09': var month = "Setembro"; break;
		case '10': var month = "Outubro"; break;
		case '11': var month = "Novembro"; break;
		case '12': var month = "Dezembro"; break;
		default: var month = "JAN";
	}
	var dataobjtemp = new Date(Date.UTC(parseInt(tempdatahora[2]),parseInt(tempdatahora[1]-1),parseInt(tempdatahora[0])));
	var weekday = new Array(7);
	weekday[0] = "Domingo";
	weekday[1]=  "Segunda";
	weekday[2] = "Ter&ccedil;a";
	weekday[3] = "Quarta";
	weekday[4] = "Quinta";
	weekday[5] = "Sexta";
	weekday[6] = "S&aacute;bado";

	var diasemana = weekday[dataobjtemp.getDay()];
	var temp = diasemana;
	var temp2 = temp.concat('<span id=\"rightcompmobile\" style=\"margin-left: 0px;\">, </span>',parseInt(tempdatahora[2]),'<span id=\"rightcompmobile\" style=\"margin-left: 0px;\"> de </span>',month);
	return temp2;
}

function datashowready(strtemp){
	var temp = strtemp.split(' ');
	var tempdatahora = temp[0].split('/');
	var hora = temp[1].split(':');
	switch (tempdatahora[1]) {
		case '01': var month = "Janeiro"; break;
		case '02': var month = "Fevereiro"; break;
		case '03': var month = "Março"; break;
		case '04': var month = "Abril"; break;
		case '05': var month = "Maio"; break;
		case '06': var month = "Junho"; break;
		case '07': var month = "Julho"; break;
		case '08': var month = "Agosto"; break;
		case '09': var month = "Setembro"; break;
		case '10': var month = "Outubro"; break;
		case '11': var month = "Novembro"; break;
		case '12': var month = "Dezembro"; break;
		default: var month = "JAN";
	}
	var dataobjtemp = new Date(Date.UTC(parseInt(tempdatahora[2]),parseInt(tempdatahora[1]-1),parseInt(tempdatahora[0])));
	var weekday = new Array(7);
	weekday[0] = "Domingo";
	weekday[1]=  "Segunda";
	weekday[2] = "Ter&ccedil;a";
	weekday[3] = "Quarta";
	weekday[4] = "Quinta";
	weekday[5] = "Sexta";
	weekday[6] = "S&aacute;bado";

	var diasemana = weekday[dataobjtemp.getDay()];
	var temp = diasemana;
	var temp2 = temp.concat('<span id=\"rightcompmobile\" style=\"margin-left: 0px;\">, </span>',parseInt(tempdatahora[2]),'<span id=\"rightcompmobile\" style=\"margin-left: 0px;\"> de </span>',month,'<span id=\"rightcompmobile\" style=\"margin-left: 0px;\"> às </span>',hora[0],':',hora[1]);
	return temp2;
}

if("ontouchstart" in window){ //ipad 
} else {
	window.location.href = "http://quemtem-crazyshit.rhcloud.com/party/<?php echo $party['partyid'];?>"; 	
}

$(document).ready(function(){
	window.fbid = "<?php echo ($party['partyid'] === FALSE) ? '0' : $party['fbeventid']; ?>";
	window.fbphoto = "<?php echo ($party['partyid'] === FALSE) ? '0' : $party['fbphotourl']; ?>";
	var descricao = "<?php echo ($party['partyid'] === FALSE) ? 'Descrição da festa' : $party['descricao']; ?>";
	$('#descricao').html(nl2br(descricao));
	
	var str = "https://www.google.com/maps/dir/Current+Location/";
	var lattemp = <?php echo ($party['partyid'] === FALSE) ? '0' : $party['lat']; ?>;
	var lontemp = <?php echo ($party['partyid'] === FALSE) ? '0' : $party['lon']; ?>;
	var lattemp = lattemp.toString();
	var lontemp = lontemp.toString();
	var temp = str.concat(lattemp,",",lontemp);
	$('#googleMapsButton').attr('mapsdirection', temp);
	
	if(window.fbid != "0"){
		$('#festaimg').attr('src',window.fbphoto);
	}
	window.photoid = "<?php echo ($party['partyid'] === FALSE) ? '0' : $party['photoid']; ?>";
	if(window.photoid != "0" && window.fbid == "0"){
		$('#festaimg').attr('src','http://quemtem-crazyshit.rhcloud.com/partyimg/'+window.photoid);
	}
	$('#backlink').attr('onClick',"window.location='http://quemtem-crazyshit.rhcloud.com/mobile/main'");
	
	$('#backlink').css({ 'display': 'inline' });
	$('#maplink').css({ 'display': 'none' });
	$('#barralink').css({ 'display': 'none' });
	$('#topbarinfo').css({ 'display': 'inline' });
	$('#topbarinfotext').text('Festa');
	$('#googleMapsButton').on("click", function(){
		var temp = $(this).attr("mapsdirection");
		window.open(temp);
	});
	$('#facebookButton').on("click", function(){
		var temp = $(this).attr("data");
		window.open(temp);
	});
});

</script>

