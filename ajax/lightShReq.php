<?php
	require_once "functions.php";
	$light = false;
	$light_fail = '';
	if (!$enable_error) $light = useDB(3, "lighting_status", 'id');
	else $light_fail = "Нет доступа";
		if (!$light) $light_fail = "Нет доступа";
		else {
				if ($light[2]['status']==1) {
					$light_fail .= "Освещение взлетно-посадочной полосы <span style='color: #008110;'>включено<br></span>";
				}
				else $light_fail .= "Освещение взлетно-посадочной полосы <span style='color: #A60800;'>отключено<br></span>";

				if ($light[1]['status']==1) {
					$light_fail .= "Освещение в здании аэропорта <span style='color: #008110;'>включено<br></span>";
				}
				else $light_fail .= "Освещение в здании аэропорта <span style='color: #A60800;'>отключено<br></span>";

				if ($light[0]['status']==1) {
					$light_fail .= "Уличное освещение <span style='color: #008110;'>включено<br></span>";
				}
				else $light_fail .= "Уличное освещение <span style='color: #A60800;'>отключено<br></span>";
			}
	echo $light_fail;
?>