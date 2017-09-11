<?php
	$id = $_GET['id'];
	$order = mysqli_query($db, "SELECT * FROM `orders` `id` WHERE `id` = $id") or die ("Проблема при подключении к БД");
	$row = mysqli_fetch_assoc($order);
	$status = $row['status'];
	$date_in = $row['date_in'];
	$remonter = $row['remonter'];
	$device = $row['device'];
	$firm = $row['firm'];
	$model = $row['model'];
	$serial_number = $row['serial_number'];
	$reason = $row['reason'];
	$equipment = $row['equipment'];
	$client_name = $row['client_name'];
	$client_phone = $row['client_phone'];
	$client_addres = $row['client_addres'];
	$notes = $row['notes'];
	$expenses = $row['expenses'];
	$cost = $row['cost'];
?>
<form method="GET" action="inc/send.php">
<!--	<input type="hidden" name="page" value="detail">-->
	<div class="detail_form">
	<fieldset>
	<legend>Подробно</legend>
	<fieldset>
	<legend>Заказ</legend>
	<div class="field">
		<label for="order_number">Заказ №</label>
		<input disabled id="order_number" name="order_number" value="<?php echo $id;?>" class="detail_form" />
	</div>
	<div class="field">
		<label for="date_in">Дата приёмки</label>
		<input disabled type="text" list="date_in" name="date_in" value="<?php echo $date_in;?>" class="detail_form" />
	</div>
	<div class="field">
		<label for="remonter">Мастер</label>
		<input type="text" list="remonter" name="remonter" class="detail_form" />
		<datalist id="remonter">
		<?php
			while ($row = mysqli_fetch_assoc($remonter))
			{
				echo'<option value="'.$row["remonter"].'"></option>';
			}
		?>
		</datalist>
	</div>
	<div class="field">
		<label for="status">Статус</label>
		<input required type="text" list="status" name="status" class="detail_form" value="<?php echo $status;?>" />
		<datalist id="status">
			<option value='Принят' />
			<option value='На согласовании' />
			<option value='Ожидание зап. частей' />
			<option value='В ремонте' />
			<option value='Готов' />
			<option value='Выдан' />
		</datalist>
	</div>
	</fieldset>
	<fieldset>
	<legend>Устройство</legend>
	<div class="field">
		<label for="device">Тип</label>
		<input disabled type="text" name="device" class="detail_form" value="<?php echo $device;?>" />
	</div>
	<div class="field">
		<label for="company">Производитель</label>
		<input disabled type="text" name="company" class="detail_form" value="<?php echo $firm;?>" />
	</div>
	<div class="field">
		<label>Модель</label>
		<input disabled type="text" name="model" class="detail_form" value="<?php echo $model;?>" />
	</div>
	<div class="field">
		<label>Серийный номер</label>
		<input disabled type="text" id="serial_number" name="serial_number" class="detail_form" value="<?php echo $serial_number;?>" />
	</div>
	<div class="field">
		<label>Заявленная неисправность</label>
		<input disabled type="text" name="reason" class="detail_form" value="<?php echo $reason;?>" />
	</div>
	</fieldset>
	<fieldset>
	<legend>Состояние и комплектность</legend>
	<div class="field">
		<label>Внешний вид</label>
		<input disabled type="text" name="review" class="detail_form" value="<?php echo $device;?>" />
	</div>
	<div class="field">
		<label>Комплектность</label>
		<input disabled type="text" name="equipment" class="detail_form" value="<?php echo $equipment;?>" />
	</div>
	</fieldset>
	<fieldset>
	<legend>Клиент</legend>
	<div class="field">
		<label>ФИО</label>
		<input disabled type="text" name="client_name" class="detail_form" value="<?php echo $client_name;?>" />
	</div>
	<div class="field">
		<label>Телефон</label>
		<input type="text" name="client_phone" class="detail_form" value="<?php echo $client_phone;?>" />
	</div>
	<div class="field">
		<label>Адрес</label>
		<input type="text" name="client_addres" class="detail_form" value="<?php echo $client_addres;?>" />
	</div>
	</fieldset>
	<fieldset>
	<legend>Примечания</legend>
	<div class="field">
		<textarea name="description" class="detail_form"><?php echo $notes;?></textarea>
	</div>
	</fieldset>
	<div align="center">
		<input class="detail_form_button" type="submit" value="Сохранить" />
		<input class="detail_form_button" type="reset" value="Очистить" />
	</div>
	</fieldset>
</form>
<?php mysqli_close ($db);?>
