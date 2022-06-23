<?php
	
	require_once 'functions.php';
	$passengers = false;
	$passengers_count = '';
	if (!$enable_error) $passengers = useDB(1, "passengers_status", 'start_time');
	
	if (!$passengers) $passengers_count = 'Нет доступа';
	else {
		if($passengers[0]['status']==1)	$passengers_count .= "Количество пассажиров, зарегистрированных на рейс №".$passengers[0]['id'].": ".$passengers[0]['count'];
		else $passengers_count .= "Посадки нет";
	}
	echo $passengers_count;
?>