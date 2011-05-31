<?php
/**
* @Version 1.0
* @Lettingweb Property Search
* @Author - Khurram Aslam
* @Copyright 2010 - EWMultimedia Ltd
*/

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class modLettingwebRssHelper{
	
	function geturl($params){
	
		$agentid = $params->get('agentid');
		$urlpage = $_GET['page'];
		$urltype = $_GET['type'];
		$urllocation = $_GET['location'];
		$urlbedrooms_min = $_GET['bedrooms_min'];
		$urlbedrooms_max = $_GET['bedrooms_max'];
		$urlrent_min = $_GET['rent_min'];
		$urlrent_max = $_GET['rent_max'];
		$urlfurnished = $_GET['furnished'];
		$urlavailable = $_GET['available'];
		
		return "http://www.lettingweb.com/search/rss/?&agent_id=" . $agentid . "&extended=1&page=1" . $urlpage . "&per_page=200&type=" . $urltype . "&location=" . $urllocation . "&bedrooms_min=" . $urlbedrooms_min . "&bedrooms_max=" . $urlbedrooms_max . "&rent_min=" . $urlrent_min . "&rent_max=" . $urlrent_max . "&furnished=" . $urlfurnished . "&available=" . $urlavailable;	
	}

	function getdetails($item, $params){
	
		$detailspage = $params->get('detailspage');
		$novirtual = $params->get('novirtual');
		$noimage = $params->get('noimage');
		$nofeatures = $params->get('nofeatures');
		
		//Use the lettingweb namespace
		$namespaces = $item->getNameSpaces(true);
		$lw = $item->children($namespaces['lw']);
		$rooms = $lw->rooms->attributes(); //getting all the attributes under <lw:rooms>
		
		//details needed for listing page
		$title = $item->title;
		$link = $item->link;
		$lines = $lw->address->lines->line;
		$area = $lw->address->area;
		$postcode = $lw->address->postcode;
		$description = $item->description;
		$image1 = $item->image->url;
		
		if($image1 == NULL){
			$image1 = $noimage;
		} else{
			$image1 = $item->image->url;
		}
		
		$mainimage = $image1;
		$rent = substr($lw->rent,0,-3); //removes .00 (pence) from the rent price
		$totalbedrooms = $rooms->total_bedrooms;
		$availability2 = $lw->availability;
		$availability = modLettingwebRssHelper::aswitch($availability2);
		
		//details needed for details page
		$longdescription = $lw->long_description;
		$singlebedrooms = $rooms->single_bedrooms;
		$doublebedrooms = $rooms->double_bedrooms;
		$twinbedrooms = $rooms->twin_bedrooms;
		$availablefrom = $lw->available_from;
		$furnished = $lw->furnished;
		
		//when virtual tour doesn't exist
		$virtualtour2 = $lw->virtual_tour;
		if($virtualtour2 == NULL){
			$virtualtour = $virtualtour2;
		} else{
			$virtualtour = $novirtual;
		}
		$longitude = $lw->location->longitude;
		$latitude = $lw->location->latitude;
		$features = $lw->features->feature;
		
		$images1 = $lw->images->image;
		if($images1 == NULL){
				$images = $noimage;
		}else { 
				$images = $images1;
		}
	
		require(JModuleHelper::getLayoutPath( 'mod_lettingweb_rss',$params->get('template','default') ) );
	}
	
	function aswitch($availability2){
	
		switch ($availability2) {
      case "available":
        return "Available";
        break;
      case "under_offer":
        return "Under Offer";
        break;
      case "reserved":
        return "Reserved";
        break;
      case "let_agreed":
      	return "Let Agreed";
      	break;
      case "coming_soon":
      	return "Coming Soon";
      	break;
      default:
      	return "N/A";
		}
	}
	
}

?>