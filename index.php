<?php
    session_start();
    if(!$_SESSION[login]){
        $autorized = 0;
    } else {
        $autorized = 1;
	}
    include 'inc/config.php';
	if($_GET['page']){
		$page = $_GET['page'];
	}
    include 'inc/db.php';
	if (!empty($_SESSION['login']) and !empty($_SESSION['password'])){
        //если существет логин и пароль в сессиях, то проверяем их и извлекаем аватар
        $login = $_SESSION['login'];
        $password = $_SESSION['password'];
        $result = mysqli_query($db, "SELECT id,avatar FROM users WHERE login='$login' AND password='$password'"); 
        $myrow = mysqli_fetch_array($result);
        //извлекаем нужные данные о пользователе
    }
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<title><?php echo $site_title; ?></title>
		<meta charset="UTF-8">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/left-nav-style.css" rel="stylesheet">
		<link href="css/form.css" rel="stylesheet">
		<style>
		</style>
	</head>
	<body>
        <?php include 'content/header.php'?>
		<?php include 'content/nav_menu.php'?>
		<main role="main">
		<?php
			if(!$page){
				$page = "main";
			}
			include "content/$page.php";
		?>
		</main>
		<footer>
			<?php include 'content/footer.php'?>
		</footer>
	</body>
</html>
