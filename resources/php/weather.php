<?php
global $weather;

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://weatherbit-v1-mashape.p.rapidapi.com/forecast/minutely?lat=45.815399&lon=15.966568",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: weatherbit-v1-mashape.p.rapidapi.com",
		"X-RapidAPI-Key: 0b59ede4b4msh7f5bb42f936664fp19cc76jsnaedc2252368f"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);


if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$results = json_decode($response, true);
	$weather = print_r ($results['data'][0]['temp'], true);
	echo "<p class='weather'>" . $weather . "°C</p>";

		
}

