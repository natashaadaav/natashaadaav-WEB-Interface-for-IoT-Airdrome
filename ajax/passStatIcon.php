<?php
	require_once 'functions.php';
	$pic = 'where.png';
	if (!$enable_error){
		$passengers = useDB(1, "passengers_status", 'start_time');
		if ($passengers[0]['status']==0) $pic="passenger0.png";
		else if($passengers[0]['status']==1) $pic='passenger1.png';
	}

	$pathIMG = "./img/$pic";
	echo "<img src=\"$pathIMG\">";
?>