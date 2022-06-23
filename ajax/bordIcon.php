<?php

	require_once 'functions.php';
	$boarders = false;
	if ($enables && $enables!="Fatal Error") $boarders = useDB(1, "boarders", 'time');

	$pic="boarder";//pic==boarderLRTB.png

	if (!$boarders) $pic = 'where';
	else{
		if($boarders[0]['left_boarder']<10)	$pic.='0';
		else $pic.='1';
		if ($boarders[0]['right_boarder']<10) $pic.='0';
		else $pic.='1';
		if ($boarders[0]['top_boarder']<10) $pic.='0';
		else $pic.='1';
		if ($boarders[0]['bottom_boarder']<10) $pic.='0';
		else $pic.='1';
	}
	$pic.='.png';

	$pathIMG = "./img/$pic";
	echo "<img src=\"$pathIMG\">";
?>