<form method="GET" width="100%">
	<input type="hidden" name="page" value="main">
	<fieldset>
		<legend>Поиск</legend>
		<table width="100%" cellpadding="3px" cellspacing="0px">
		<tr align="center">
				<td>Статус</td>
				<td>Дата приёма</td>
				<td>Дата выдачи</td>
				<td>Мастер</td>
				<td>Устройство</th>
				<td>Производитель</td>
				<td>№ заказа</td>
				<td>Клиент</td>
				<td></td>
			</tr>
			<tr align="center">
				<td>
					<input list="statuses" name="statuses" size="11" />
					<datalist id="statuses">
					<?php
						while ($row = mysqli_fetch_assoc($statuses))
						{
							echo'<option value="'.$row["status"].'"></option>';
						}
					?>
					</datalist>
				</td>
				<td>
					<input list="date_in" name="date_in" size="11" />
					<datalist id="date_in">
					<?php
						while ($row = mysqli_fetch_assoc($date_in))
						{
							echo'<option value="'.$row["date_in"].'"></option>';
						}
					?>
					</datalist>
				</td>
				<td>
					<input list="date_out" name="date_out" size="11" />
					<datalist id="date_out">
					<?php
						while ($row = mysqli_fetch_assoc($date_out))
						{
							echo'<option value="'.$row["date_out"].'"></option>';
						}
					?>
					</datalist>
				</td>
				<td>
					<input list="remonter" name="remonter" />
					<datalist id="remonter">
					<?php
						while ($row = mysqli_fetch_assoc($remonter))
						{
							echo'<option value="'.$row["remonter"].'"></option>';
						}
					?>
					</datalist>
				</td>
				<td>
					<input list="devices" name="devices" />
					<datalist id="devices">
					<?php
						while ($row = mysqli_fetch_assoc($devices))
						{
							echo'<option value="'.$row["device"].'"></option>';
						}
					?>
					</datalist>
				</td>
				<td>
					<input list="companies" name="companies" />
					<datalist id="companies">>
					<?php
						while ($row = mysqli_fetch_assoc($companies))
						{
							echo'<option value="'.$row["firm"].'"></option>';
						}
					?>
					</datalist>
				</td>
				<td>
					<input id="order_number" name="order_number" ></input>
				</td>
				<td>
					<input id="client" name="client" /></input>
				</td>
				<td>
					<input type="submit"></input>
				</td>
				<td>
					<input type="reset"></input>
				</td>
			</tr>
		</table>
	</fieldset>
</form>
