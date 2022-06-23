<?php
	require_once "functions.php";
	$pic = "light.png";
	$light = false;
	$light_fail = '';
	$picCnt = 0;
	if (!$enable_error) $light = useDB(3, "lighting_status", 'status');
	else $light_fail = "Нет доступа";
	if (!$light) $light_fail = "Нет доступа";
	else {
		for ($i=0; $i < 3; $i++) if ($light[$i]['status']==1) $lightCnt += 1;
		if ($lightCnt==0) $light_fail='Макет не освещен.';
		else if ($lightCnt<3) $light_fail='Макет освещен частично.';
		else $light_fail='Макет полностью освещен.';
	}
	echo $light_fail;
?>