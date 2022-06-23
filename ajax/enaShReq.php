<?php
	require_once "functions.php";
	$hidden = '';
	$activity_time = useDB(1, "enables", 'time')[0]['time'];
	$functionError = '';

	if (!$activity_time) $last_activity = "никогда";
	else $last_activity = $activity_time;

	if ($enable_error)
		$functionError.="Нет доступа к макету. ";

	else  
		$hidden.="Последний отклик:<br>". $last_activity;

	if ($functionError) $functionError="Проблемы: ".$functionError." <br>Последний отклик макета: <br>".$last_activity;

echo <<<_END
	$hidden
	$functionError
_END;
?>