<nav class="nav">
    <ul>
    	<li><a href="index.php">Главная</a></li>
    	<?php
		if($autorized == 1){
		echo"
            <li><a href=\"?page=orders\">Заказы</a></li>
            <li><a href=\"?page=add_order\">Добавить заказ</a></li>
            <li><a href=\"?page=reports\">Отчёты</a></li>
            <li><a href=\"?page=price\">Прайс</a></li>
            <li><a href=\"?page=dict\">Справочники</a></li>
            <li><a href=\"?page=warehouse\">Склад</a></li>";
		}
		?>
		<li><a href="?page=reg">Регистрация</a></li>
		<li><a href="?page=login">Войти</a></li>
     </ul>
</nav>
<!-- <div class="mask-content"></div> -->
