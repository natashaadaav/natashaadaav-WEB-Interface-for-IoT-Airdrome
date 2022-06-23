<?php
	require_once 'functions.php';
	$boarders = false;
	if (!$enable_error) $boarders = useDB(1, "boarders", 'time');

	$boarders_fail = '';
	if (!$boarders) $boarders_fail .= "Нет доступа";
	else {
		if ($boarders[0]['left_boarder']<10)	$boarders_fail .= "Осторожно! ".$boarders[0]['left_boarder']." до левого края полосы. ";
		if ($boarders[0]['right_boarder']<10) $boarders_fail .= "Осторожно! ".$boarders[0]['right_boarder']." до правого края полосы. ";
		if ($boarders_fail=='')	$boarders_fail = "Препятствий слева и справа нет.";
	}
	echo $boarders_fail;
?>