<?php
if (isset($_POST)) {
  

  $cn_url = 'http://www.hko.gov.hk/wxinfo/dailywx/wxwarntoday_uc.htm';
  $en_url = 'http://www.hko.gov.hk/wxinfo/dailywx/wxwarntoday.htm';
  
  // url check Tropical : http://www.hko.gov.hk/textonly/warning/ca_uc.htm
  // url check Rainstorm: http://www.hko.gov.hk/textonly/warning/ec.htm
  
  $raw_data =  file_get_contents($cn_url);
  
  $cn_badWeatherArray = array("紅色暴雨警告信號","黑色暴雨警告信號",
 						   "八號東南烈風或暴風信號","八號西南烈風或暴風信號",
 						   "八號東北烈風或暴風信號","八號西北烈風或暴風信號",
 						   "九號烈風或暴風風力增強信號","十號颶風信號");

  $en_badWeatherArray = array("Red Rainstorm Warning Signal","Black Rainstorm Warning Signal",
  							  "No. 8 Southeast Gale or Storm Signal","No. 8 Southwest Gale or Storm Signal",
  							  "No. 8 Northeast Gale or Storm Signal","No. 8 Northwest Gale or Storm Signal",
  							  "Increasing Gale or Storm Signal No. 9","Hurricane Signal No. 10");
	
	$lines = split("\n", $raw_data);
	$idx = 0;
	$isBadWeather = false;
	foreach ($lines as $line) {
	  //do stuff
	  if (strpos($line, 'images_e')){
	  	$isBadWeather = checkBadWeather($line,$cn_badWeatherArray); // weather line.
	    if($isBadWeather){
	  		echo 'TRUE';
	  		break;
	  	}
	  }
	}
	if(!$isBadWeather){
		echo 'FALSE';
	}

 }
 




 function checkBadWeather($line,$badWeatherArray){
	
	$arrlength = count($badWeatherArray);
	for($x = 0; $x < $arrlength; $x++) {
	    
	    if (strpos($line, $badWeatherArray[$x])){
	    	
	    	$noWork_weather =  $line;
	    	if(strpos($line, 'grey')){
	    		// echo $badWeatherArray[$x].' 未有生效. <br/>';
	    		// return true;
	    	}
	    	else{
	    		// echo $badWeatherArray[$x].' 現正生效. <br/>';
	    		return true;
	    	}
		}
	    
	}
 }




?>