<?php

require_once "connect.php";
$functionError="";
$enable_error = true;
$enables = enableAirdrome();
if ($enables && $enables!="Fatal Error") $enable_error = false;

function enableAirdrome()
{
	global $functionError;
	global $conn;
	connectDB();
	/*$query = "SELECT * FROM `enables` WHERE TO_DAYS(NOW()) - TO_DAYS(time) <= 1 ORDER BY time DESC LIMIT 1";*/
	$query = "SELECT * FROM enables WHERE time BETWEEN DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 10 MINUTE) AND CURRENT_TIMESTAMP() ORDER BY time DESC LIMIT 1";
	$result = $conn->query($query);
	closeDB();
	if (!$result) {
		$functionError .= "Не удалось вернуть запрос к enables. ";
		return "Fatal Error";}
	else return ($result->num_rows);
}


function useDB($limit, $tableName, $order)//Получение с последней строки, подходит для всех
{
	global $functionError;
	global $conn;
	connectDB();
	if ($limit!=0)
	$query = "SELECT * FROM $tableName ORDER BY $order DESC LIMIT $limit";
	else $query = "SELECT * FROM $tableName ORDER BY $order DESC";
	$result = $conn->query($query);
	closeDB();

	if (!$result) 
		{$functionError .= "Не удалось найти подключение к $tableName. ";
		return false;}
	return resultToArray($result);
}

function updateDB($tableName, $where, $data)//только для обновления lighting_status, enables,
{
	global $functionError;
	global $conn;
	connectDB();

	$query = "UPDATE $tableName SET $data WHERE $where";
	$result = $conn->query($query);

	closeDB();
	if (!$result) {$functionError .= "Не удалось обновить $tableName. ";
		return false;}
	return true;
}

function insertDB($tableName, $field, $data)//для lighting_date, passenger_status
{
	global $functionError;
	global $conn;
	connectDB();
	$query = "INSERT INTO $tableName ($field) VALUES ($data)";
	$result = $conn->query($query);

	closeDB();
	if (!$result)
		{$functionError .= "Не удалось добавить строку к $tableName. ";
		return false;}
	return true;
}

function resultToArray($result)
{
	$array = array();
	while (($row = $result->fetch_assoc()) != false) 
		$array[] = $row;
	return $array;
}
?>