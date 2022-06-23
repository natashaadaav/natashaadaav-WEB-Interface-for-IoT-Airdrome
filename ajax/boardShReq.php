<?php

	require_once 'functions.php';
	$boarders = false;
	if (!$enable_error) $boarders = useDB(1, "boarders", 'time');

	$hidden = '';
	if (!$boarders) $hidden .= "Нет доступа";
	else {
		$hidden = "Слева: ".$boarders[0]['left_boarder']."<br>";
		$hidden .= "Справа: ".$boarders[0]['right_boarder']."<br>";
		$hidden .= "Сверху: ".$boarders[0]['top_boarder']."<br>";
		$hidden .= "Снизу: ".$boarders[0]['bottom_boarder'];
	}
	echo $hidden;
?>