<table class="order_list">
	<tr>
		<th>№ заказа</th>
		<th>Статус</th>
		<th>Дата приёма</th>
		<th class="date_out">Дата выдачи</th>
<?php
if($autorized == 1){
    echo"        <th>Мастер</th>\n";
}
?>
		<th>Устройство</th>
		<th>Производитель</th>
		<th>Модель</th>
<?php
if($autorized == 1){
    echo"        <th>Серийный номер</th>\n";
}
?>
		<th>Поломка</th>
<?php
if($autorized == 1){
    echo"        <th>Комплектация</th>\n";
}
?>
		<th>Клиент</th>
	</tr>
<?php
while ($row = mysqli_fetch_assoc($orders))
{
	echo"	<tr>\n";
    if($autorized == 1){
        echo'       <td class="digit"><a href="?page=detail&id='.$row['id'].'">'.$row['id'].'</a></td>';
    }else{
        echo'       <td class="digit">'.$row['id'].'</a></td>';
    }
	echo'
        <td class="digit">'.$row['status'].'</td>
		<td class="text">'.$row['date_in'].'</td>';
    if($row['date_out'] != "0000-00-00"){
        echo'<td class="date_out">'.$row['date_out'].'</td>';
	} else {
        echo'<td class="date_out">&nbsp;</td>';
	};
    if($autorized == 1){
        echo'<td class="text">'.$row['remonter'].'</td>';
    }
    echo'
        <td class="text">'.$row['device'].'</td>
        <td class="text">'.$row['firm'].'</td>
        <td class="text">'.$row['model'].'</td>';
	if($autorized == 1){
        echo'<td class="text">'.$row['serial_number'].'</td>';
    }
    echo'
        <td class="text">'.$row['reason'].'</td>';
	if($autorized == 1){
        echo'<td class="text">'.$row['equipment'].'</td>';
    }
    echo'
        <td class="text">'.$row['client_name'];
    echo"</td>\n";
    echo"	</tr>\n";
}
?>
</table>
