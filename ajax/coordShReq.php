<?php
//Надо переписать с нуля
	require_once 'functions.php';
	$coords = false;
	if (!$enable_error) $coords = useDB(5, "coords", 'time');

	$coords_hidden= '';
	if (!$coords) $coords_hidden .= "Нет доступа";
	else 
		for ($j=0; $j < count($coords) ; $j++)
			$coords_hidden .= "<div style=\"margin-left: 1%; width: 19%; float: left;\">"."x: ".$coords[$j]['x']."; </div><div style=\"width: 20%; float: left;\">y: ".$coords[$j]['y']."</div>"."<div style=\"width: 60%; float: left;\">(".$coords[$j]['time'].")</div>";
	echo $coords_hidden;
?>