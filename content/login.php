<?php
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])){//если существет логин и пароль в сессиях, то проверяем их и извлекаем аватар
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $result = mysql_query("SELECT id,avatar FROM users WHERE login='$login' AND password='$password'",$db); 
    $myrow = mysql_fetch_array($result);
    //извлекаем нужные данные о пользователе
}
if (!isset($myrow['avatar']) or $myrow['avatar']=='') {//проверяем, не извлечены ли данные пользователя из базы. Если нет, то он не вошел, либо пароль в сессии неверный. Выводим окно для входа. Но мы не будем его выводить для вошедших, им оно уже не нужно.
print <<<HERE
<div class = "form-content">
<div class="form-wrap">
<center>
<div class="profile"><img src="https://html5book.ru/wp-content/uploads/2016/10/profile-image.png">
    <h1>Вход</h1>
  </div>
<form action="content/testreg.php" method="post">
    <div>
        <label>Логин<br><input name="login" type="text" required></label>
    </div>
HERE;
if (isset($_COOKIE['login'])) //есть ли переменная с логином в COOKIE. Должна быть, если пользователь при предыдущем входе нажал на чекбокс "Запомнить меня"
{//если да, то вставляем в форму ее значение. При этом пользователю отображается, что его логин уже вписан в нужную графу
    echo ' value="'.$_COOKIE['login'].'">';
}
print <<<HERE
    <div>
        <label>Пароль<br><input name="password" type="password" required></label>
    </div>    
HERE;
if (isset($_COOKIE['password']))//есть ли переменная с паролем в COOKIE. Должна быть, если пользователь при предыдущем входе нажал на чекбокс "Запомнить меня"
{//если да, то вставляем в форму ее значение. При этом пользователю отображается, что его пароль уже вписан в нужную графу
    echo ' value="'.$_COOKIE['password'].'">';
}
print <<<HERE
    <div>
        <input name="save" type="checkbox" value='0'> Запомнить меня.
    </div>

    <div>
        <button type="submit">Войти</button>
    </div>
</form>
</center>
</div>
</div>
HERE;
} else {
print <<<HERE
<!-- Между оператором  "print <<<HERE" выводится html код с нужными переменными из php -->
Вы вошли на сайт, как $_SESSION[login] (<a href='exit.php'>выход</a>)<br>
<!-- выше ссылка на выход из аккаунта -->
<a href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только зарегистрированным пользователям</a><br>
Ваш аватар:<br>
<img alt='$_SESSION[login]' src='$myrow[avatar]'>
<!-- Выше отображается аватар. Его адрес содержит переменная $myrow[avatar] -->
<!-- Именно здесь можно добавлять формы для отправки комментариев и прочего... -->
HERE;
}
?>
