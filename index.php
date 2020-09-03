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
}
.nextDay{
	background-color: red;
	display: flex;
	justify-content: space-around;
}
.splitContent{
	float: left;
	width: 40%;
	height: 300px;
	padding: 10px;
}
#temp{
	font-size: 50px;
	padding: 0;
	margin: 0;
}
</style>
<body>
	<section>
	<div>
		<h1> <?php echo $data->name; ?> Weather Status </h1>
	</div>
	
	</section>

		<section>
			<div class="container">
				<div class="currentWeather_container"> 
					<p><?php echo $data->name; ?></p>
					<p><i class='fas fa-cloud-sun' style='font-size:36px'></i>
					<?php echo $data->weather[0]->description; ?>
					</p>
					<p id="temp"><?php echo $data->main->temp; ?>°</p>
					<p>Temp min <?php echo $data->main->temp_min; ?></p>
					<p>Temp max <?php echo $data->main->temp_max; ?></p>
					<p>Temperature feels like <?php echo $data->main->feels_like;; ?></p>
					<p>Sunrise and Sunset times 
						<?php echo $data->sys->sunrise; ?>
						<?php echo $data->sys->sunset; ?>
					</p>
					<p>Humidity <?php echo $data->main->humidity; ?></p>
				</div>
			</div>
		
	
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
	</section>
	</div>

</body>
</html>



