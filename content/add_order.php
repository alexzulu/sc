<?php
	$max_id =(int)$max_id;
	$max_id = $max_id + 1;
?>
<form method="POST" action="inc/send.php">
	<input type="hidden" name="page" value="add_order">
	<div class="main_form">
	<fieldset>
	<legend>Новый заказ</legend>
	<fieldset>
	<legend>Заказ</legend>
	<div class="field">
		<label for="order_number">Заказ №</label>
		<input id="order_number" name="order_number" value="<?php echo $max_id; ?>" class="main_form" />
	</div>
	<div class="field">
		<label for="date_in">Дата приёмки</label>
		<input type="text" list="date_in" name="date_in" value="<?php echo date('Y-m-d') ?>" class="main_form" />
	</div>
	<div class="field">
		<label for="remonter">Мастер</label>
		<input type="text" list="remonter" name="remonter" class="main_form" />
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
		<input type="text" name="status" class="main_form" value="Принят" />
<!--
		<input type="text" list="status" name="status" class="main_form" />
		<datalist id="status">
			<option value='Принят' />
			<option value='На согласовании' />
			<option value='Ожидание зап. частей' />
			<option value='В ремонте' />
			<option value='Готов' />
			<option value='Выдан' />
		</datalist>
-->
	</div>
	</fieldset>
	<fieldset>
	<legend>Устройство</legend>
	<div class="field">
		<label for="device">Тип</label>
		<input required type="text" list="device" name="device" class="main_form" />
		<datalist id="device">
		<?php
		while ($row = mysqli_fetch_assoc($device_list))
		{
			echo'<option value="'.$row["category"].'"></option>';
		}
		?>
		</datalist>
	</div>
	<div class="field">
		<label for="company">Производитель</label>
		<input required type="text" list="company" name="company" class="main_form" />
		<datalist id="company">
		<?php
			while ($row = mysqli_fetch_assoc($company_list))
			{
				echo'<option value="'.$row["name"].'"></option>';
			}
		?>
		</datalist>
	</div>
	<div class="field">
		<label>Модель</label>
		<input required type="text" name="model" class="main_form" />
	</div>
	<div class="field">
		<label>Серийный номер</label>
		<input required type="text" id="serial_number" name="serial_number" class="main_form" />
	</div>
	<div class="field">
		<label>Неисправность</label>
		<input required type="text" name="reason" class="main_form" />
	</div>
	</fieldset>
	<fieldset>
	<legend>Состояние и комплектность</legend>
	<div class="field">
		<label>Внешний вид</label>
		<input type="text" name="review" class="main_form" />
	</div>
	<div class="field">
		<label>Комплектность</label>
		<input required type="text" name="equipment" class="main_form" />
	</div>
<!--	<div class="field"><label>Адрес<input type="text" name="client_addres" /></input></label></div>-->
	</fieldset>
	<fieldset>
	<legend>Клиент</legend>
	<div class="field">
		<label>ФИО</label>
		<input required type="text" name="client_name" class="main_form" />
	</div>
	<div class="field">
		<label>Телефон</label>
		<input required type="text" name="client_phone" class="main_form" />
	</div>
	<div class="field">
		<label>Адрес</label>
		<input type="text" name="client_addres" class="main_form" />
	</div>
	</fieldset>
	<fieldset>
	<legend>Примечания</legend>
	<div class="field">
		<textarea name="description" class="main_form"></textarea>
	</div>
	</fieldset>
	<div align="center">
		<input class="main_form_button" type="submit" value="Сохранить" />
		<input class="main_form_button" type="reset" value="Очистить" />
	</div>
	</fieldset>
</div>
</form>
