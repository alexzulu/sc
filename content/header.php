<header>
<div class="top">
<?php
	if(!$_SESSION[login]){
        echo"Гость. <a href='?page=login'>Вход</a> или <a href='?page=reg'>Регистрация</a><br>";
    } else {
        echo"$_SESSION[login]. <a href='content/exit.php'>Выход</a><br>";
    }
?>
</div>
</header>
<input type="checkbox" id="nav-toggle" hidden>
<label for="nav-toggle" class="nav-toggle" onclick></label> 
