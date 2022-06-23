<?php

	require_once 'functions.php';
	$enable_error = true;
	$pic="enableOFF.png";
	$enables_fail = '';

	if ($enables && $enables!="Fatal Error") $enable_error = false;

	if (!$enable_error) $pic="enableON.png";

	$pathIMG = "./img/$pic";
	echo "<img src=\"$pathIMG\">";
?>