<!doctype html>
<?php
	include 'inc/config.php';
	if($_GET['page']){
		$page = $_GET['page'];
	}
?>
<html>
	<head>
		<title>Service Center</title>
		<meta charset="UTF-8">
		<link href="css/style.css" rel="stylesheet">
		<style>
		</style>
	</head>
	<?php include 'inc/db.php'?>
	<body>
		<header></header>
		<?php include 'content/nav_menu.php'?>
		<main>
<!--		<div class="content">-->
		<?php
			if(!$page){
				$page = "main";
			}
			if($page == "main"){
//				include 'content/find.php';
			}
			include "content/$page.php";
		?>
<!--		</div>-->
		</main>
		<footer>
			<?php include 'content/footer.php'?>
		</footer>
	</body>
</html>
