<?php
/**
* @Version 1.0
* @Lettingweb RSS
* @Author - Khurram Aslam
* @Copyright 2010 - EWMultimedia Ltd
*/

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class modLettingwebRssDetailsHelper{
	
	function getstuff($params){
		$googlemapid = $params->get('googlemaps');
		$contactbranch = $params->get('contactbranch');
		$availability = $_GET['availability'];
		$title = $_GET['title'];
		$rent = $_GET['rent'];
		$totalbedrooms = $_GET['total_bedrooms'];
		$furnished = $_GET['furnished'];
		$longitude = $_GET['long'];
		$latitude = $_GET['lat'];
		$images = $_GET['image'];
		$features = $_GET['feature'];
		$virtualtour = $_GET['virtual_tour'];
		$longdescription = $_GET['long_description'];
		
		require(JModuleHelper::getLayoutPath('mod_lettingweb_rssdetails'));
	}
}
?>