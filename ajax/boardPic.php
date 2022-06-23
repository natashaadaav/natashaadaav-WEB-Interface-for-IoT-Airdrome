<?php

	require_once 'functions.php';
	$boarders = false;
	if ($enables && $enables!="Fatal Error") $boarders = useDB(1, "boarders", 'time');

	$pic="boarder";//pic==boarderLRTB.png

	if (!$boarders) $pic = 'where';
	{
		if($boarders[0]['left_boarder']<10)	$pic.='1';
		else $pic.='0';
		if ($boarders[0]['right_boarder']<10) $pic.='1';
		else $pic.='0';
		if ($boarders[0]['top_boarder']<10) $pic.='1';
		else $pic.='0';
		if ($boarders[0]['bottom_boarder']<10) $pic.='1';
		else $pic.='0';
	}
	$pic.='.png';

	$pathIMG = "./img/$pic";
	echo "boardPic there"."<img src=\"$pathIMG\">";
?>