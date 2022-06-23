<?php
	require_once 'functions.php';

	$passengers = false;
	if (!$enable_error) $passengers = useDB(5, "passengers_status", 'start_time');

	if ($passengers)
		for ($j=0; $j < count($passengers); $j++) { 
			$count_on_b += $passengers[$j]['count'];
			if ($passengers[$j]['status'] == 0) $passengers_status = "Посадка закончилась.";
			else $passengers_status = "Посадка началась.";
			$start_time = substr($passengers[$j]['start_time'], 5, 11);
			$finish_time = ($passengers[$j]['finish_time'])?(substr($passengers[$j]['finish_time'], 5, 11)):"наст. момент";
			$passengers_hidden .= "Рейс №" . $passengers[$j]['id'] . ". (" . $start_time ."  -  ". $finish_time .").<br>Состояние: ".$passengers_status."<br>";
		}
	else $passengers_hidden = "Нет доступа";

	echo $passengers_hidden;
?>