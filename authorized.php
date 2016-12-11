<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AUTHORIZED</title>
</head>
<body>
	<?php 

	$dbc = mysqli_connect('localhost', 'root', '') or die('ошибка подключения к базе данных');
	mysqli_select_db($dbc, 'code-php') or die ('ошибка выбора базы данных');
		$query = "SELECT 'login', 'password' FROM authorized";
		$result = mysqli_query($dbc, $query) or die('Ошибка запроса');
		while($row = mysqli_fetch_array($result)){
			$login = $row['login'];
			$password = $row['password'];
		}
	mysqli_close($dbc);
	
	if(!isset($_SERVER['PHP_AUTH_USER']) || 
		!isset($_SERVER['PHP_AUTH_PW']) || 
		($_SERVER['PHP_AUTH_USER'] != $login) || 
		($_SERVER['PHP_AUTH_PW'] != $password)){
	header('Content-Type: text/html');
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate:Basic realm="Authorized"');
	exit('<h2>Извините, вы ввели неправильные логин или пароль</h2>');
} 
else{
	header('Content-Type:text/plain');
	header('Location: http://www.google.ru');
	header('Refresh: 5; url=http://www.google.ru');
}
?>
</body>
</html>