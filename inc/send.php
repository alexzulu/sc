<?php
    $order_number = $_POST['order_number'];
    $date_in = $_POST['date_in'];
    $remonter = $_POST['remonter'];
    $status = $_POST['status'];
    $device = $_POST['device'];
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<title>Сервис-центр "Балалайка"</title>
		<meta charset="UTF-8">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/left-nav-style.css" rel="stylesheet">
		<link href="css/form.css" rel="stylesheet">
		<style>
		</style>
	</head>
	<body>
        <?php echo $order_number;?><br>
        <?php echo $date_in;?><br>
        <?php echo $remonter;?><br>
        <?php echo $status;?><br>
        <?php echo $device;?>
	</body>
</html>
