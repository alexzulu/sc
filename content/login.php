<?php
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])){
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result = mysqli_query($db,"SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
    $myrow = mysqli_fetch_array($result);
}
if (!isset($myrow['avatar']) or $myrow['avatar']=='') {
print <<<HERE
<div class = "form-content">
<div class="form-wrap">
<div class="profile">
    <h1>Вход</h1>
  </div>
<form class="data" action="content/testreg.php" method="post">
    <div>
        <label class="form-label">Ваш логин:<br><input name="login" type="text" required></label>
    </div>
HERE;
if (isset($_COOKIE['login'])){
    echo ' value="'.$_COOKIE['login'].'">';
}
print <<<HERE
    <div>
        <label class="form-label">Ваш пароль:<br><input name="password" type="password" required></label>
    </div>    
HERE;
if (isset($_COOKIE['password'])){
    echo ' value="'.$_COOKIE['password'].'">';
}
print <<<HERE
<!--
    <div>
        <input name="save" type="checkbox" value='0'> Запомнить меня.
    </div>
-->
    <div>
        <button type="submit">Войти</button>
    </div>
</form>
</div>
</div>
HERE;
} else {
print <<<HERE
<!-- Между оператором  "print <<<HERE" выводится html код с нужными переменными из php -->
Вы вошли на сайт, как $_SESSION[login] (<a href='content/exit.php'>выход</a>)<br>
<!-- выше ссылка на выход из аккаунта -->
<a href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только зарегистрированным пользователям</a><br>
Ваш аватар:<br>
<img alt='$_SESSION[login]' src='$myrow[avatar]'>
<!-- Выше отображается аватар. Его адрес содержит переменная $myrow[avatar] -->
<!-- Именно здесь можно добавлять формы для отправки комментариев и прочего... -->
HERE;
}
?>
