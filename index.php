<?php
//API Key and OpenWeatherMap APIs to receive data
//php script retrieves data from OpenWeathermp API and decodes into a JSON for use in HTML code
$apiKey = "0b26cc5017624800da6d3057f5191af9";
$ch_1 = curl_init('api.openweathermap.org/data/2.5/weather?q=Brisbane&mode=json&units=metric&appid=0b26cc5017624800da6d3057f5191af9');
$ch_2 = curl_init('api.openweathermap.org/data/2.5/forecast?q=Brisbane&mode=json&units=metric&&appid=0b26cc5017624800da6d3057f5191af9');

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
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Brisbane Weather- OpenWeatherMap</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
</head>
<style>
.container	{
	display: flex;
	justify-content: center;
	padding: 70px 20px;
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
	width: 800px;
	background-color: rgba(0, 0, 0, 0.6);
	color: white;
	height: 500px;
}
.nextDay{
	background-color: rgba(0, 0, 0, 0.6);
	display: flex;
	justify-content: space-around;
	width: 500px;
	align-items: center;
}
.splitContent{
	float: left;
	color: white;
	margin: 50px;
	text-align: center;
}
#temp{
	font-size: 80px;
	padding: 0;
	margin: 0;
}
p	{
	margin: auto;
}
body{
	margin: 100px 100px;
	background-image: url('images/brisbanecity.jpg');
	background-repeat: no-repeat;
	background-size: cover; 
	vertically-align: middle;
	font-family: 'Roboto Slab', serif;
}
</style>
<body>

	<section>
		<div class="container">
			<div class="currentWeather_container"> 
				<h1 style="font-size: 40px; padding: 0; margin: 10px;"><?php echo $data->name; ?></h1>
				<p id="temp"><i class='fas fa-cloud-sun' style='font-size:150px'></i></p>
				<p><?php echo $data->weather[0]->description; ?></p>
					<div>
						<p id="temp"><?php echo $data->main->temp; ?>°C</p> 
						<p>Min <?php echo $data->main->temp_min; ?>
						<br>Max <?php echo $data->main->temp_max; ?></p>
					</div>
				<p>Temperature feels like: <?php echo $data->main->feels_like;; ?></p>
				<p>Sunrise Time: <?php echo $data->sys->sunrise; ?> </p>
				<p>Sunset Time: <?php echo $data->sys->sunset; ?></p>
				<p>Humidity: <?php echo $data->main->humidity; ?>%</p>
			</div>
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="forecastWeather_container">
				<div class="nextDay">
					<div class="splitContent">
						<h2 style="text-align:left;">Tomorrow</h2>
						<p>9am</p><br>
						<i class='fas fa-sun' style='font-size:70px'></i>
						<p><?php echo $data2->list[7]->weather[0]->description ?></p><br>
						<p>Temperature: <?php echo $data2->list[7]->main->temp; ?>°C</p>
						<p>Humidity: <?php echo $data2->list[7]->main->humidity; ?>%</p>
					</div>
					<div class="splitContent">
						<br><br><br><p>3pm</p>
						<br><i class='fas fa-sun' style='font-size:70px'></i>
						<p><?php echo $data2->list[9]->weather[0]->description ?></p><br>
						<p>Temperature: <?php echo $data2->list[9]->main->temp; ?>°C</p>
						<p>Humidity: <?php echo $data2->list[9]->main->humidity; ?>%</p>
					</div>
				</div>
				<div class="nextDay">
					<div class="splitContent">
						<h2 style="text-align:left;">In 2 Days</h2>
						<p>9am</p><br>
						<i class='fas fa-cloud-sun' style='font-size:70px'></i>
						<p><?php echo $data2->list[17]->weather[0]->description ?></p><br>
						<p>Temperature: <?php echo $data2->list[17]->main->temp; ?>°C</p>
						<p>Humidity: <?php echo $data2->list[17]->main->humidity; ?>%</p>
					</div>
				
					<div class="splitContent"> 		
						<br><br><br><p>3pm</p><br>
						<i class='fas fa-cloud-sun' style='font-size:70px'></i>
						<p><?php echo $data2->list[19]->weather[0]->description ?></p><br>
						<p>Temperature: <?php echo $data2->list[19]->main->temp; ?>°C</p>
						<p>Humidity: <?php echo $data2->list[19]->main->humidity; ?>%</p>
					</div>
				</div>
				<div class="nextDay">
					<div class="splitContent">
						<h2 style="text-align:left;">In 3 Days</h2>
						<p>9am</p><br>
						<i class='fas fa-cloud-rain' style='font-size:70px'></i>
						<p><?php echo $data2->list[27]->weather[0]->description ?></p><br>
						<p>Temperature: <?php echo $data2->list[27]->main->temp; ?>°C</p>
						<p>Humidity: <?php echo $data2->list[27]->main->humidity; ?>%</p>
					</div>
				
					<div class="splitContent"> 		
						<br><br><br><p>3pm</p><br>
						<i class='fas fa-sun' style='font-size:70px'></i>
						<p><?php echo $data2->list[29]->weather[0]->description ?></p><br>
						<p>Temperature: <?php echo $data2->list[29]->main->temp; ?>°C</p>
						<p>Humidity: <?php echo $data2->list[29]->main->humidity; ?>%</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>



