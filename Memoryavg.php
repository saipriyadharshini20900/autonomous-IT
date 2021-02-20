<?php

$big_array = array();

for ($i = 0; $i < 1000000; $i++)
{
   $big_array[] = $i;
}

echo 'Memory status<br>';
print_mem();

unset($big_array);

echo 'Usage Memory.<br>';
print_mem();


function print_mem()
{
   /* Currently used memory */
   $mem_usage = memory_get_usage();
   
   /* Peak memory usage */
   $mem_peak = memory_get_peak_usage();

   echo 'Cpu: <strong>' . round($mem_usage / 1024) . 'KB</strong> of memory.<br>';
   echo 'Peak usage: <strong>' . round($mem_peak / 1024) . 'KB</strong> of memory.<br><br>';
}
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
		width: 320px;
		margin: 0px auto;
		padding: 10px 20px;
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
		background: orange;
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

		<p><span class="description big">🌡️ RAM Usage:</span> <span class="result big">72%</span></p>
		<p><span class="description big">🖥️ CPU Usage: </span> <span class="result big">0.05%</span></p>
		<p><span class="description">💽 Hard Disk Usage: </span> <span class="result">74%</span></p>
		<p><span class="description">🖧 Established Connections: </span> <span class="result">5</span></p>
		<p><span class="description">🖧 Total Connections: </span> <span class="result"></span>110</p>
		<hr>
		<p><span class="description">🌡️ RAM Total:</span> <span class="result">3.79 GB</span></p>
		<p><span class="description">🌡️ RAM Used:</span> <span class="result">0.59 GB</span></p>
		<p><span class="description">🌡️ RAM Available:</span> <span class="result">2.71 GB</span></p>
		<hr>
		<p><span class="description">💽 Hard Disk Free:</span> <span class="result">8 GB</span></p>
		<p><span class="description">💽 Hard Disk Used:</span> <span class="result">23 GB</span></p>
		<p><span class="description">💽 Hard Disk Total:</span> <span class="result">31 GB</span></p>
		<hr>
		
	</div>
	
</body>
</html>