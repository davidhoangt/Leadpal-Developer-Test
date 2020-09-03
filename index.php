<?php

$apiKey = "0b26cc5017624800da6d3057f5191af9";
$cityId ="1273293";
$url = 'api.openweathermap.org/data/2.5/weather?q=Brisbane&appid=0b26cc5017624800da6d3057f5191af9';
$url2 = 'pro.openweathermap.org/data/2.5/forecast/hourly?q=Brisbane&appid=0b26cc5017624800da6d3057f5191af9';

$ch_1 = curl_init('api.openweathermap.org/data/2.5/weather?q=Brisbane&appid=0b26cc5017624800da6d3057f5191af9');
$ch_2 = curl_init('api.openweathermap.org/data/2.5/forecast?q=Brisbane&appid=0b26cc5017624800da6d3057f5191af9');
curl_setopt($ch_1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_2, CURLOPT_RETURNTRANSFER, true);

$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch_1);
curl_multi_add_handle($mh, $ch_2);

$running = null;
	do {
		curl_multi_exec($mh, $running);
		}	
		while ($running);

curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);

$response_1 = curl_multi_getcontent($ch_1);
$response_2 = curl_multi_getcontent($ch_2);

$data = json_decode($response_1);
$data2 = json_decode($response_2);
//echo "$response_1"; 
?>



<!DOCTYPE HTML>
<html>
<head>
	<title>Forecast Weather - OpenWeatherMap</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<style>

.container	{
	display: flex;
	justify-content: center;
	height: 50%;
}
.forecastWeather_container	{
	display: flex;
	flex: 1;
	padding: 0;
	margin: 0;
	justify-content: space-around;
}
.currentWeather_container{
	text-align: center;
	width: 500px;
	background-color: rgba(0, 0, 0, 0.4);
	color: white;
}
.nextDay{
	background-color: rgba(0, 0, 0, 0.4);
	display: flex;
	justify-content: space-around;
}
.splitContent{
	float: left;
	color: white;
	width: 40%;
	height: 300px;
	padding: 10px;
}
#temp{
	font-size: 50px;
	padding: 0;
	margin: 0;
}
p	{
	margin: auto;
}
.currentWeather_section{
	height: 50%;
	padding: 50px 20px;
}

body{
	margin: 100px 100px;
	background-image: url('images/brisbanecity.jpg');
	background-repeat: no-repeat;
	background-size: cover; 
	vertically-align: middle;
}

</style>
<body>
		<section class="currentWeather_section">
			<div class="container">
				<div class="currentWeather_container"> 
					<h1><?php echo $data->name; ?></h1>
					<p id="temp"><i class='fas fa-cloud-sun' style='font-size:100px'></i>
					<?php echo $data->weather[0]->description; ?>
					</p><br>
					<div>
					<p id="temp"><?php echo $data->main->temp; ?>°</p> 
					<p>
					Min <?php echo $data->main->temp_min; ?><br>
					Max <?php echo $data->main->temp_max; ?></p>
					</div>
					<p>Temperature feels like: <?php echo $data->main->feels_like;; ?></p>
					<p>Sunrise and Sunset times 
						<?php echo $data->sys->sunrise; ?>
						<?php echo $data->sys->sunset; ?>
					</p>
					<p>Humidity <?php echo $data->main->humidity; ?>%</p>
				</div>
			</div>
		</section>
		
		<section>
	
		<div class="container">
			<div class="forecastWeather_container">
			
				<div class="nextDay">
				<div class="splitContent">
					<i class='fas fa-cloud-sun' style='font-size:36px'></i>
					<p> General Weather Description <?php echo $data->weather[0]->description; ?></p>
					<p>Temperature <?php echo $data->main->temp; ?></p>
					<p>Humidity <?php echo $data->main->humidity; ?></p>
				</div>
				
				<div class="splitContent"> 		
					<i class='fas fa-cloud-sun' style='font-size:36px'></i>
					<p> General Weather Description <?php echo $data->weather[0]->description; ?></p>
					<p>Temperature <?php echo $data->main->temp; ?></p>
					<p>Humidity <?php echo $data->main->humidity; ?></p>
				</div>
				</div>
			
				<div class="nextDay">
				<div class="splitContent">
					<i class='fas fa-cloud-sun' style='font-size:36px'></i>
					<p> General Weather Description <?php echo $data->weather[0]->description; ?></p>
					<p>Temperature <?php echo $data->main->temp; ?></p>
					<p>Humidity <?php echo $data->main->humidity; ?></p>
				</div>
				
				<div class="splitContent"> 		
					<i class='fas fa-cloud-sun' style='font-size:36px'></i>
					<p> General Weather Description <?php echo $data->weather[0]->description; ?></p>
					<p>Temperature <?php echo $data->main->temp; ?></p>
					<p>Humidity <?php echo $data->main->humidity; ?></p>
				</div>
				</div>
			
				<div class="nextDay">
				<div class="splitContent">
					<i class='fas fa-cloud-sun' style='font-size:36px'></i>
					<p> General Weather Description <?php echo $data->weather[0]->description; ?></p>
					<p>Temperature <?php echo $data->main->temp; ?></p>
					<p>Humidity <?php echo $data->main->humidity; ?></p>
				</div>
				
				<div class="splitContent"> 		
					<i class='fas fa-cloud-sun' style='font-size:36px'></i>
					<p> General Weather Description <?php echo $data->weather[0]->description; ?></p>
					<p>Temperature <?php echo $data->main->temp; ?></p>
					<p>Humidity <?php echo $data->main->humidity; ?></p>
				</div>
				</div>

		</div>
		</div>
	</section>
	

</body>
</html>



