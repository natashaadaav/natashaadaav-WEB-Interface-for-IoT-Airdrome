<?php
	require_once "functions.php";
	$enables_fail = '';
	if ($enable_error) $enables_fail .= "Макет не подготовлен. Запуск демонстрации невозможен. ";
	else  {
		$enables_fail .= "Макет готов. ";
	}
	echo $enables_fail;
?>