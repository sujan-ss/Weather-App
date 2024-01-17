<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$mysqli = new mysqli("sql300.epizy.com","epiz_32400276","gn6iQAo4CD");
if ($mysqli -> connect_errno) {
echo "Connection Failed!!: " . $mysqli -> connect_error;
exit();
}

$db = "CREATE DATABASE IF NOT EXISTS epiz_32400276_2226673";
$mysqli -> query ($db);

$mysqli -> select_db("epiz_32400276_2226673");

$table = "CREATE TABLE IF NOT EXISTS weather_table ( City varchar(100) NOT NULL, 
Temperature float NOT NULL,
W_Condition varchar(100) NOT NULL, 
Humidity float NOT NULL, 
Pressure float NOT NULL, 
Wind_Speed float NOT NULL, 
W_Direction float NOT NULL,
W_Date_And_Time datetime NOT NULL, 
Dt int(11) NOT NULL)";

$mysqli -> query ($table);

include('weather_retrieve.php');

$sql = "SELECT * FROM weather_table
WHERE City = '{$_GET['City']}'
AND W_Date_And_Time >= DATE_SUB(NOW(), INTERVAL 900 SECOND)
ORDER BY W_Date_And_Time DESC limit 1";

// echo $sql;
$result = $mysqli -> query($sql);
$row = $result -> fetch_assoc();
print json_encode($row);
$result -> free_result();
$mysqli -> close();

?>