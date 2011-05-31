<div id="resultwrapper">
  <form action="<? echo $detailspage ?>" method="get" name="form2" id="detail">
	                              
    <div id="image">
      <input id="imagelink" type="image" src="<? echo $mainimage ?>" alt="<? echo $title ?>"  >
      <div id="availability"><? echo $availability ?> </div>
      <input name="submit" id="moredetailbutton" value="Tell me more..." type="submit" />
    </div>
	    
    <div id="infowrapper">
      <span id="title"><? echo $lines ?>, <? echo $area ?>, <? echo $postcode ?></span>
      <div id="description"><? echo $description ?></div>      
      <div id="bedroomsnumber"><? echo $totalbedrooms ?> beds</div>
      <div id="rentamount">&pound;PM: <? echo $rent ?></div>
    </div>
	
    <input name="title" value="<? echo $lines ?>, <? echo $area ?>, <? echo $postcode ?>" type="hidden" />
    <input name="long_description" value="<? echo $longdescription ?>" type="hidden" />
    <input name="total_bedrooms" value="<? echo $totalbedrooms ?>" type="hidden" />
    <input name="double_bedrooms" value="<? echo $doublebedrooms ?>" type="hidden" />
    <input name="single_bedrooms" value="<? echo $singlebedrooms ?>" type="hidden" />
    <input name="available_from" value="<? echo $availablefrom ?>" type="hidden" />
    <input name="furnished" value="<? echo $furnished ?>" type="hidden" />
    <input name="long" value="<? echo $longitude ?>" type="hidden" />
    <input name="lat" value="<? echo $latitude ?>" type="hidden" />
    <input name="rent" value="<? echo $rent ?>" type="hidden" />
    <input name="availability" value="<? echo $availability ?>" type="hidden" />
    <input name="virtual_tour" value="<? echo $virtualtour ?>" type="hidden" />
    <?  foreach($features as $feature){	
      echo "<input name='feature[]' value='" . $feature . "' type='hidden' />";	
    }
	
    foreach ($images as $image){
      echo "<input name='image[]' value='" . $image . "' type='hidden' />";
    }
		?>
	</form>
</div>