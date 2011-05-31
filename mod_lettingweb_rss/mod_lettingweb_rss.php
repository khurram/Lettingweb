<?php
/**
* @Version 1.0
* @Lettingweb RSS
* @Author - Khurram Aslam
* @Copyright 2010 - EWMultimedia Ltd
*/

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once(dirname(__FILE__).DS.'helper.php');

$url = modLettingwebRssHelper::geturl($params);
$rss = simplexml_load_file($url);

if($rss){

	$items = $rss->channel->item;
  $results = 0;
  	
	foreach($items as $item){
		$results += 1;
	}

	require(JModuleHelper::getLayoutPath( 'mod_lettingweb_rss',$params->get('template','default2') ) );
	
} else{
	
  echo "0 Results"; // error - rss link is not correct
}

?>
