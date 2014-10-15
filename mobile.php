<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('googlemaps');
		$this->load->database();
		$this->load->model('party_model');
	}

	public function main()
	{
		$data['tab'] = "main";
		
		//boolean to print to the page js code necessary to manage google maps
		$data['mapneed'] = TRUE;
	
		///////////////////////////////////////////
		/*Config block for googlemaps API library*/
		$config = array();
		$config['center'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
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
			festasCircle.bindTo(\'center\', marker_0, \'position\');
			refreshBar();
		} centreGot = true;';
		$config['zoom'] = 'auto';
		$config['disableScaleControl'] = TRUE;
		$config['disablePanControl'] = TRUE;
		$config['disableZoomControl'] = TRUE;
		//$config['minzoom'] = '18';
		$config['geocodeCaching'] = TRUE;
		$config['loadAsynchronously'] = TRUE;
		$config['minifyJS'] = FALSE;
		$config['map_div_id'] = 'map_main';
		$config['map_height'] = '100%';
		//$config['cluster'] = TRUE;
		
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['draggable'] = TRUE;
		$marker['ondragend'] = 'window.lat = event.latLng.lat(); window.lon = event.latLng.lng(); refreshBar();';
		$marker['zindex'] = 1000;
		$marker['icon'] = '/imgs/icon_me_mobile.png';
		$marker['animation'] = 'DROP';
		$this->googlemaps->add_marker($marker);
		
		$this->googlemaps->initialize($config);
		/*End of block*/
		///////////////////////////////////////////
		
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('mobile_topbar', $data);
		$this->load->view('mobile_mainview', $data);
	}
	
	public function party($partyid = FALSE)
	{
		$data['tab'] = "party";
		
		//boolean to print to the page js code necessary to manage google maps
		$data['mapneed'] = TRUE;
		
		if($partyid !== FALSE) {
			$data['party'] = $this->party_model->get_party_id($partyid);
			if($data['party'] === FALSE){
				redirect('mobile/main', 'refresh');
				exit();
			}
			$tempdh = new DateTime($data['party']['datahora'], new DateTimeZone('UTC'));
			$tempdh->setTimezone(new DateTimeZone('UTC'));
			$tempdhf = new DateTime($data['party']['datahoraf'], new DateTimeZone('UTC'));
			$tempdhf->setTimezone(new DateTimeZone('UTC'));
			$data['party']['datahoraf'] = $tempdhf;
			$data['party']['datahora'] = $tempdh;
			$data['party']['partyid'] = $partyid;
			if(!array_key_exists('fbeventid', $data['party'])){ $data['party']['fbeventid'] = 0; }
		}else{
			$data['party']['partyid'] = FALSE;
			$data['party']['fbeventid'] = 0;
		}
		
		
		///////////////////////////////////////////
		/*Config block for googlemaps API library*/
		$config = array();
		$config['center'] = ($partyid !== FALSE) ? $data['party']['lat'].', '.$data['party']['lon'] : 'auto';
		$config['onboundschanged'] = ($partyid !== FALSE) ? 'if (!centreGot) {
				var mapCentre = map.getCenter();
				window.lat = mapCentre.lat();
				window.lon = mapCentre.lng();
				getAddress();
			}
			centreGot = true;'
			:
			'if (!centreGot) {
				var mapCentre = map.getCenter();
				window.lat = mapCentre.lat();
				window.lon = mapCentre.lng();
				marker_0.setOptions({ 
					position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
				});
				getAddress();
			}
			centreGot = true;';
		$config['zoom'] = ($partyid !== FALSE) ? '14' : 'auto';
		//$config['minzoom'] = '18';
		/*$config['disableScaleControl'] = TRUE;
		$config['disablePanControl'] = TRUE;
		$config['disableZoomControl'] = TRUE;*/
		$config['geocodeCaching'] = TRUE;
		$config['loadAsynchronously'] = TRUE;
		$config['minifyJS'] = FALSE;
		$config['map_div_id'] = 'map_party';
		$config['map_height'] = '360px';
		//$config['cluster'] = TRUE;
		
		// set up the marker ready for positioning 
		// once we know the user's location
		$marker = array();
		if($partyid !== FALSE) {
			$marker['position'] = $data['party']['lat'].', '.$data['party']['lon'];
			$marker['icon'] = $data['party']['icon'].'_mobile.png';
		}else{
			$marker['draggable'] = TRUE;
			$marker['ondragend'] = 'window.lat = event.latLng.lat(); window.lon = event.latLng.lng(); getAddress();';
			$marker['icon'] = '/imgs/icon_party_mobile.png';
		}
		$this->googlemaps->add_marker($marker);
		
		$this->googlemaps->initialize($config);
		/*End of block*/
		///////////////////////////////////////////
		
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('mobile_topbar', $data);
		$this->load->view('mobile_partyview', $data);
	}
}