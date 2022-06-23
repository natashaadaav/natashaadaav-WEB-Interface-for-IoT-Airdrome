<?php
	require_once 'functions.php';

	$passengers = false;

	if (!$enable_error) $passengers = useDB(5, "passengers_status", 'start_time');
	$passengers_count_hidden_list = '';
	$passengers_count_hidden = '';
	$count_on_b = 0;

	if (!$passengers) $passengers_count_hidden = 'Нет доступа';
	else {
		for ($j=0; $j < count($passengers); $j++) { 
			$count_on_b += $passengers[$j]['count'];
			$passengers_count_hidden_list .= "Рейс №" . $passengers[$j]['id'] .". Количество пассажиров: ".$passengers[$j]['count']."<br>";
		}
		$passengers_count_hidden .= "Общее число пассажиров последних 5 рейсов: ".$count_on_b."<br>";
	}

echo $passengers_count_hidden;
?>