<?php
//Надо переписать с нуля
	require_once 'functions.php';
	$coords = false;
	if (!$enable_error) $coords = useDB(1, "coords", 'time');

	$coords_fail = '';
	if (!$coords) $coords_fail .= "Нет доступа";
	else $coords_fail .= "x: ".$coords[0]['x']."; y: ".$coords[0]['y'];

	echo $coords_fail;
?>