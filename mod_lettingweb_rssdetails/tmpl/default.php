<head>
<script src="http://maps.google.com/maps?file=api&v=2&key=<? echo $googlemapid ?>" type="text/javascript"></script>

<script type="text/javascript">   
function initialize() {
  if (GBrowserIsCompatible()) {
    var map = new GMap2(document.getElementById("map"));
	map.addControl(new GSmallMapControl());
	map.addControl(new GMapTypeControl());
    map.setCenter(new GLatLng(<? echo $latitude ?>, <? echo $longitude ?>), 13);
	var marker = new GMarker(new GLatLng(<? echo $latitude ?>, <? echo $longitude ?>));
	map.addOverlay(marker);
	GEvent.addListener(marker, "click", function() {
	marker.openInfoWindowHtml(WINDOW_HTML);
	  });
	marker.openInfoWindowHtml(WINDOW_HTML);			
  }
}
</script>

<script type="text/javascript">
var gal = {
init : function() {
if (!document.getElementById || !document.createElement || !document.appendChild) return false;
if (document.getElementById('gallery')) document.getElementById('gallery').id = 'jgal';
var li = document.getElementById('jgal').getElementsByTagName('li');
li[0].className = 'active';
for (i=0; i<li.length; i++) {
li[i].style.backgroundImage = 'url(' + li[i].getElementsByTagName('img')[0].src + ')';
li[i].title = li[i].getElementsByTagName('img')[0].alt;
gal.addEvent(li[i],'click',function() {
var im = document.getElementById('jgal').getElementsByTagName('li');
for (j=0; j<im.length; j++) {
im[j].className = '';
}
this.className = 'active';
});
}
},
addEvent : function(obj, type, fn) {
if (obj.addEventListener) {
obj.addEventListener(type, fn, false);
}
else if (obj.attachEvent) {
obj["e"+type+fn] = fn;
obj[type+fn] = function() { obj["e"+type+fn]( window.event ); }
obj.attachEvent("on"+type, obj[type+fn]);
}
}
}
gal.addEvent(window,'load', function() {
gal.init();
});
</script>

<link rel="stylesheet" href="modules/mod_lettingweb_rss/style.css" type="text/css">
<!--[if lt IE 7]><link rel="stylesheet" href="modules/mod_lettingweb_rssdetails/ie6.css" type="text/css"><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="modules/mod_lettingweb_rssdetails/ie7.css" type="text/css"><![endif]-->
</head>

<body onLoad="initialize()" onUnload="GUnload()">  

<div id="listing">

	<div id="listingheader">Property Details...</div>
	
	<div id="greybardetail">
    <div id="particularavailability"><? echo $availability ?>:</div>
    <div id="title2"><? echo $title ?></div>
    <div id="rentarea">&pound;PM: <? echo $rent ?></div>               
    <div id="rentbedroomno"><? echo $totalbedrooms ?></div>                
    <div id="sqmfurnishing"><? echo $furnished ?> Furnished</div>	       
  </div>
    
  <div id="clear1"></div>
    
  <div id="imagewrapper">    		
    <ul id="gallery">
      <? if ($images == NULL){
          
        $image = $params->get('noimage');
			
				echo "<li><img src='" . $image . "' /></li>";
			   
      } else{

        foreach ($images as $image){
				  echo "<li><img style='width:383px; height:245px;' src='" . $image . "' /></li>";
        }
        
			}
			?>
    </ul>
	</div>
    
  <div id="buttons">
    <span id="contact"><a href="<? echo $contactbranch ?>" target="_parent">Contact Branch</a> | <a href="<? echo $virtualtour ?>"  title="Visit the Virtual Tour">View Virtual Tour</a> |</span>	
    <span id="floorplanbutton"><!--Floor plan-->                                                                                                     
      <!-- AddThis Button BEGIN -->
      <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=xa-4adc7c686e33689e"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pub=xa-4adc7c686e33689e"></script>
    <!-- AddThis Button END -->                                      
    </span>		
  </div>
   
	<!--[if IE 7]><div id="clear1"></div><![endif]-->    
  <div id="detailgreybar">Details:</div>

	<div id="mapwrapper">
			<div id="map" style="width: 284px; height: 224px"></div>
	</div>

  <div id="specwrapper">  
    <div id="specwrapperint"></div>
    <div id="clear1"></div>                
    <div id="features">       
      <ul>
      <? if($features == NULL){
						
		    $feature = $params->get('nofeatures');
						
		    echo "<li>" . $feature . "</li>";	
						
		  } else{
					
				foreach ($features as $feature){
				  echo "<li>" . $feature . "</li>";
		    }
							
      }
      ?>
      </ul>
    </div> 
  </div>
  
  <div id="descriptiongreybar">Description:</div>	

  <div id="description2"><? echo $longdescription ?></div>	
    
  <div id="backlink">
    <form><input type="button" value="<< Back to property list" onClick="history.go(-1);return true;"></form>
  </div>
    
</div>    

</body>	