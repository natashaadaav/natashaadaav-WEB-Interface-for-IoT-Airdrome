<?php
	require_once 'functions.php';

	$passengers = false;
	$passengers_fail = '';
	if (!$enable_error) $passengers = useDB(1, "passengers_status", 'start_time');

	if ($passengers[0]['status']==1) $passengers_fail .= "Началась посадка на рейс №".$passengers[0]['id']."<br>(<span style='color: #008110;'>".$passengers[0]['start_time']."</span>)";
	else $passengers_fail .= "Посадка на рейс №".$passengers[0]['id']. " закончилась <br>
			(<span style='color: #A60800;'>".$passengers[0]['finish_time']."</span>)";

	if (!$passengers) 
	{
		$passengers_fail = "Нет доступа";
	}

	echo $passengers_fail;
?>