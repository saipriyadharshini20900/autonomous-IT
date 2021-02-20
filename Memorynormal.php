<?php

function onRequestStart() {
  $dat = getrusage();
  define('PHP_TUSAGE', microtime(true));
  define('PHP_RUSAGE', $dat["ru_utime.tv_sec"]*1e6+$dat["ru_utime.tv_usec"]);
}
 
function getCpuUsage() {
    $dat = getrusage();
    $dat["ru_utime.tv_usec"] = ($dat["ru_utime.tv_sec"]*1e6 + $dat["ru_utime.tv_usec"]) - PHP_RUSAGE;
    $time = (microtime(true) - PHP_TUSAGE) * 1000000;
 
    // cpu per request
    if($time > 0) {
        $cpu = sprintf("%9.1f", ($dat["ru_utime.tv_usec"] / $time) * 100);
    } else {
        $cpu = '25.50';
    }
 
    return $cpu;
}
 
 
onRequestStart();

$a = 'Test';

for($i=0; $i<10000; $i++) {
  for($j=0; $j<1000; $j++) {
    $a = md5($a);
  }
}

$microtime=microtime(true)-PHP_TUSAGE;
$cpuusage=getCpuUsage();
echo "<pre>
Microtime: ".round($microtime,8)."
CPU usage: $cpuusage
Calculated time: ".round($microtime*$cpuusage/100,8)."
";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ServerCheck</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	html {
		background: #FFF;
	}
	body {
		background: #FFF;
		font-family: Arial,sans-serif;
		margin: 0;
		padding: 0;
		color: #333;
	}
	#container {
		width: 440px;
		//height:100px;
		margin: -180px 0% 0% 25%;
		padding: 0px 19px 0px 0px;
		background: #EFEFEF;
		border-radius: 5px;
		box-shadow: 0 0 5px #AAA;
		-webkit-box-shadow: 0 0 5px #AAA;
		-moz-box-shadow: 0 0 5px #AAA;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
	}
	.description {
		font-weight: bold;
	}
	#trafficlight {
		float: right;
		margin-top: 15px;
		width: 50px;
		height: 50px;
		border-radius: 50px;
		background: green;
		border: 3px solid #333;
		
	}
	#details {
		font-size: 0.8em;
	}
	hr {
		border: 0;
		height: 1px;
		background-image: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0));
	}
	.big {
		font-size: 1.2em;
	}
	
	.dark {
		background: #000;
		filter: invert(1) hue-rotate(180deg);
	}
	</style>
</head>
<body>
	<div id="container">
		<div id="trafficlight" class="nodark"></div>

		<span class="description big">🌡️ RAM Usage:</span> <span class="result big">50%</span>
		<span class="description big">🖥️ CPU Usage: </span> <span class="result big">0.1%</span>
		<span class="description">💽 Hard Disk Usage: </span> <span class="result">44%</span>
		<span class="description">🖧 Established Connections: </span> <span class="result">5</span>
		<span class="description">🖧 Total Connections: </span> <span class="result">10</span>
		<hr>
		<span class="description">🌡️ RAM Total:</span> <span class="result">12.79 GB</span>
		<span class="description">🌡️ RAM Used:</span> <span class="result">5.59 GB</span>
		<span class="description">🌡️ RAM Available:</span> <span class="result">7.71 GB</span>
		<hr>
		<span class="description">💽 Hard Disk Free:</span> <span class="result">20 GB</span>
		<span class="description">💽 Hard Disk Used:</span> <span class="result">20 GB</span>
		<span class="description">💽 Hard Disk Total:</span> <span class="result">40 GB</span>
		<hr>
		
	</div>
	
</body>
</html>