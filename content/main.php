<table width="100%">
	<tr>
		<th>№ заказа</th>
		<th>Статус</th>
		<th>Дата приёма</th>
		<th>Дата выдачи</th>
		<th>Мастер</th>
		<th>Устройство</th>
		<th>Производитель</th>
		<th>Модель</th>
		<th>Серийный номер</th>
		<th>Поломка</th>
		<th>Комплектация</th>
		<th>Клиент</th>
	</tr>
	<?php
		while ($row = mysqli_fetch_assoc($orders))
		{
		echo'
		<tr>
			<td class="digit"><a href="?page=detail&id='.$row['id'].'">'.$row['id'].'</a></td>
			<td class="digit">'.$row['status'].'</td>
			<td class="text">'.$row['date_in'].'</td>';
			if($row['date_out'] != "0000-00-00"){
				echo'<td class="text">'.$row['date_out'].'</td>';
			} else {
				echo'<td class="text"></td>';
			};
			echo'
			<td class="text">'.$row['remonter'].'</td>
			<td class="text">'.$row['device'].'</td>
			<td class="text">'.$row['firm'].'</td>
			<td class="text">'.$row['model'].'</td>
			<td class="text">'.$row['serial_number'].'</td>
			<td class="text">'.$row['reason'].'</td>
			<td class="text">'.$row['equipment'].'</td>
			<td class="text">'.$row['client_name'].'</td>
		</tr>';
		}
	?>
</table>
