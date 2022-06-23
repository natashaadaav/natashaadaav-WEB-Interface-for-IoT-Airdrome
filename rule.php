<!DOCTYPE html>
<html lang="en">
<head>
<?php 	$title = "Управление макетом";
require_once "blocks/head.php";
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$('#ranger').html($('input[type="range"]').val());
	$(document).on('input change', 'input[type="range"]', function(){
		$('#ranger').html($(this).val()+" пассажиров");
	});
</script>
</head>  
  
<body>
	<?php require_once "blocks/header.php"?>
<div id="wrapper">

<div id='lightRule'>
<p>Освещение</p>
<div class="clear"><br></div>
	<?php
	require_once 'ajax/functions.php';
$action = 'rule.php';
if (!$enable_error) 
{
  	$light = useDB(0, "lighting_status", 'id');

	if (isset($_POST['runway']) || isset($_POST['in']) || isset($_POST['out']))
	{
		foreach ($_POST as $name => $value)
		{
		if ($value==1) $value=0; 
		else $value=1;
		for ($i=0; $i < 3; $i++) 
		{ 
		 	if ($light[$i]['place']==$name) {
		 		$light[$i]['status']=$value;
		 	}
		} 
		$status="`status`=".$value;

		updateDB("lighting_status", "place='$name'", $status);
		}
	}
	
	for ($i=0; $i < 3; $i++) 
	{ 
		$place = $light[$i]['place'];
		$status = $light[$i]['status'];
		$img = "img/".$place.$status.'.png'; 
		echo <<<_END
		<form action="$action" method='post'>
		<input hidden type="text" name='$place' value='$status'>
		<input type='image' name='submit' src="$img">
		</form>
_END;
	}
	}
else echo "Нет доступа";
	?>
</div>

<div id=passenger>
<p>Посадка</p>

<div id='passengerRule0'>
<?php
require_once 'ajax/functions.php';
$action = 'rule.php';
if (!$enable_error) 
{
	$passengers = useDB(1, "passengers_status", 'id');
	
	if (isset($_POST['passengers']))
		if ($_POST['passengers']==0)
		{
			$img = 'img/passenger1.png';
			if ($passengers[0]['status']==0)
			{
				$pass_fail="<br>
				
				<form action='".$action."' method='post'>
				<div id='ranger'>100 пассажиров</div>
				<input type='range' name='passengers' min='2' max='200' value='100' step='1' style='width: 100%;'><br>
				<input type='submit' value='Начать посадку' style='width: 100%;  height: 30px;'>
				</form>
				";
			}
			else $pass_fail='<br>Невозможно выполнить, так как посадка уже началась ранее. <br><br>'."
				<form action='".$action."' method='post'>
				<input hidden type='text' name='passengers' value='".$passengers[0]['status']."'>
				<input type='image' name='submit' src='$img'>
				</form>";
		}
	else $pass_fail='';
	echo $pass_fail;
}
else echo "<br>Нет доступа";
?>
</div>

<div id='passengerRule1'>
<?php
require_once 'ajax/functions.php';
$action = 'rule.php';
if (!$enable_error) 
{
	$passengers = useDB(1, "passengers_status", 'id');
	
	if (isset($_POST['passengers']))
		if ($_POST['passengers']==1)
		{	
			$img = 'img/passenger0.png';
			if ($passengers[0]['status']==1)
			{
				$passID=$passengers[0]['id'];
				updateDB("passengers_status","id='$passID'", "`status`='0', `finish_time`=CURRENT_TIMESTAMP");
				$passengers[0]['status']=0;
				$pass_fail="<br>
				<form action='".$action."' method='post'>
				<input hidden type='text' name='passengers' value='".$passengers[0]['status']."'>
				<input type='image' name='submit' src='$img'>
				</form>";
			}
			else $pass_fail="<br>Невозможно выполнить, так как посадка уже завершилась ранее.<br><br>
				<form action='".$action."' method='post'>
				<input hidden type='text' name='passengers' value='".$passengers[0]['status']."'>
				<input type='image' name='submit' src='$img'>
				</form>";
		}
	else $pass_fail='';
	echo $pass_fail;
}
?>
</div>

<div id='passengerRuleOpt'>
<?php
require_once 'ajax/functions.php';
$action = 'rule.php';
if (!$enable_error) 
{
	$passengers = useDB(1, "passengers_status", 'id');
	
	if (isset($_POST['passengers']))
		if ($_POST['passengers']!=1 & $_POST['passengers']!=0)
		{
			$img = 'img/passenger1.png';
			if ($passengers[0]['status']==0)
			{
			$data = "1, ".$_POST['passengers'];//С этим надо осторожнее
			$field = 'status, count';
			insertDB('passengers_status', $field, $data);
			$passengers[0]['status']=1;
			$pass_fail="<br>
			<form action='".$action."' method='post'>
			<input hidden type='text' name='passengers' value='".$passengers[0]['status']."'>
			<input type='image' name='submit' src='$img'>
			</form>";
			}
			else $pass_fail="<br>Невозможно выполнить, так как посадка уже началась ранее.<br><br>
				<form action='".$action."' method='post'>
				<input hidden type='text' name='passengers' value='".$passengers[0]['status']."'>
				<input type='image' name='submit' src='$img'>
				</form>";
		}
	else $pass_fail='';
	echo $pass_fail;
}
?>
</div>

<div id='passengerRule'>
<?php
require_once 'ajax/functions.php';
$action = 'rule.php';
if (!$enable_error) 
{
	$passengers = useDB(1, "passengers_status", 'id');
	if (!isset($_POST['passengers']))
	{
		$img = 'img/passenger'.$passengers[0]['status'].'.png';
		$pass_fail="<br>
		<form action='".$action."' method='post'>
		<input hidden type='text' name='passengers' value='".$passengers[0]['status']."'>
		<input type='image' name='submit' src='$img'>
		</form>";
	}
	else $pass_fail='';
	echo $pass_fail;
}
?>
</div>
</div>

<div class="clear"><br><br></div>
</div>

	<?php require_once "blocks/footer.php"?>

</body> 
</html>  