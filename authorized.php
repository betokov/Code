<?php 
ob_start();
session_start();
$error = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<style type="text/css">
		div{
			text-align:center;
		}
		span{
			color:red;
			font-size:19px;
		}
		a{
			text-decoration:none;
			font-size:18px;
		}
		a:hover{
			color:green;
		}
	</style>
</head>
<body>
	<?php 
	if(!isset($_SESSION ['user_id'])){
		if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])){
			$_SESSION['user_id'] = $_COOKIE['user_id'];
			$_SESSION['username'] = $_COOKIE['username'];
		}
	}
	?>
	<?php
	if(!isset($_SESSION['id'])){
		if(isset($_POST['submit'])){
			$dbc = mysqli_connect('localhost', 'root', '') or die('Ошибка подключения к базе данных');
			mysqli_select_db($dbc, 'Code');
			$login = mysqli_real_escape_string($dbc, trim($_POST['login']));
			$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
			if(!empty($login) && !empty($password)){
				$query = "SELECT id, login FROM auth WHERE login = '$login' AND password = SHA('$password')";
				$result = mysqli_query($dbc, $query) or die('Ошибка запроса');
				if(mysqli_num_rows($result) == 1){
					$row  = mysqli_fetch_array($result);
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['username'] = $row['login'];
					setcookie('user_id', $row['id'], time() + (60 * 60 * 24 * 7));
					setcookie('username', $row['login'], time() + (60 * 60 * 24 * 7));
					$home_url = 'http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'authorized.php';
					header('Refresh: 5; url=' . $home_url);
				}
				else{
					$error = 'Введите правильные логин и пароль<br><br>';
				}
			}
			else{
				$error = 'Заполните все поля <br><br>';
			}
			mysqli_close($dbc);
		}
	}
	?>
	<div>
		<h1>Авторзация</h1>
		<?php 
		if(empty($_SESSION['user_id'])){
			?>
			<?php echo $error; ?>
			<form action="authorized.php" method="post">
				<label for="login">Login</label>&nbsp;&nbsp;<input type="text" name="login" 
				value="<?php if(!empty($login)) echo $login; ?>"><br>
				<label for="password">Password</label>&nbsp;&nbsp;
				<input type="text" name="password" value="<?php if(!empty($login)) echo $password; ?>"><br><br>
				<input type="submit" name="submit" value="submit">
			</form>
		</div>
		<?php
	}
	else{
		echo 'Вы вошли как <span>'.$_SESSION['username'].'</span>';
		echo '<br><br><a href="logout.php"> >> Выйти << </a>';
	}
	?>
</body>
</html>