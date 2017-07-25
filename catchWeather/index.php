<?php 
// Cross-Origin Resource Sharing Header
header('Access-Control-Allow-Origin: http://base.com');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="UTF-8">
	<title>誠仔監視器 - 下載</title>
</head>

<body>

<div id="weatherResult"></div>
<hr>
<div>
    下載誠仔監視器:
    <hr>
    <li>
        <a href="shingjai_apk/shingjai_isWatchingYou_V1.0(beta).apk" download>誠仔監視器 1.0 (Beta版) - (Stable for Samsung S7)</a>
    </li>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>


$.ajax({
    url: 'catchWeather.php',
    async:false,
    type: "POST",
    success: function (result) {
    	console.log(result);
    	if(result=="FALSE"){
            result = "力場正在保護香港.";
        }
        document.getElementById("weatherResult").innerHTML = result;

    },
    error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr);
    }
});
</script>



</html>