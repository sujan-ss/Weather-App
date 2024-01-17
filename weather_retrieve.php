<?php
$sql = "SELECT *FROM weather_table
WHERE City = '{$_GET['City']}'
AND W_Date_And_Time >= DATE_SUB(NOW(), INTERVAL 900 SECOND)
ORDER BY W_Date_And_Time DESC limit 1";
$result = $mysqli -> query($sql);

if ($result->num_rows == 0) {
    $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $_GET['City'] . '&appid=5c6c0cbd402d0e976bb3fc360633033d&units=metric';

    $data = file_get_contents($url);
    $json = json_decode($data, true);
    date_default_timezone_set('Asia/Kathmandu');

    $city = $json['name'];
    $temperature = $json['main']['temp'];
    $condition = $json['weather'][0]['main'];
    $humidity = $json['main']['humidity'];
    $pressure = $json['main']['pressure'];
    $wind = $json['wind']['speed'];
    $w_direction = $json['wind']['deg'];
    $w_date_and_time = date("Y-m-d H:i:s");
    $dt = $json['dt'];

    $sql = "INSERT INTO weather_table(City, 
    Temperature, 
    W_Condition, 
    Humidity, 
    Pressure, 
    Wind_Speed, 
    W_Direction, 
    W_Date_And_Time, 
    Dt)

    VALUES('{$city}', 
    {$temperature}, 
    '{$condition}', 
    '{$humidity}', 
    '{$pressure}', 
    {$wind}, 
    '{$w_direction}', 
    '{$w_date_and_time}', 
    '{$dt}')";
    
    if (!$mysqli -> query($sql)) {
        echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
    }
}
?>