<?php

	require_once 'functions.php';
	$light = false;
	$pic="where.png";
	if ($enables && $enables!="Fatal Error") 
	{
		$light = useDB(3, "lighting_status", 'id');
		$light_cnt=0;
		for ($i=0; $i < 3; $i++) 
		{ 
			if ($light[$i]['status']==1) $light_cnt += 1;
		}
		$pic="light".$light_cnt.'.png';
	}

	$pathIMG = "./img/$pic";
	echo "<img src=\"$pathIMG\">";

?>