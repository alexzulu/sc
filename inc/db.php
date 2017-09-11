<?php
$db = mysqli_connect ($db_host, $db_user, $db_pass, $db_name) or die ("Невозможно подключиться к БД");
@mysqli_query ($db, 'set character_set_results = "utf8"');
$orders = mysqli_query($db, "SELECT * FROM `orders` ORDER BY `id` DESC") or die ("Проблема при подключении к БД");
$statuses = mysqli_query($db, "SELECT distinct `status` FROM `orders`") or die ("Проблема при подключении к БД");
$date_in = mysqli_query($db, "SELECT distinct `date_in` FROM `orders`") or die ("Проблема при подключении к БД");
$date_out = mysqli_query($db, "SELECT distinct `date_out` FROM `orders`") or die ("Проблема при подключении к БД");
$remonter = mysqli_query($db, "SELECT distinct `remonter` FROM `orders`") or die ("Проблема при подключении к БД");
$devices = mysqli_query($db, "SELECT distinct `device` FROM `orders`") or die ("Проблема при подключении к БД");
$companies = mysqli_query($db, "SELECT distinct `firm` FROM `orders`") or die ("Проблема при подключении к БД");
$device_list = mysqli_query($db, "SELECT * FROM `devices`") or die ("Проблема при подключении к БД");
$company_list = mysqli_query($db, "SELECT * FROM `company`") or die ("Проблема при подключении к БД");
$max_id = mysqli_query($db, "SELECT * FROM `orders` ORDER BY `id` DESC LIMIT 1") or die ("Проблема при подключении к БД");
$row = mysqli_fetch_assoc($max_id);
$max_id = $row['id'];
?>
