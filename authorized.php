<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AUTHORIZED</title>
</head>
<body>
	<?php 



	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || 
		($_SERVER['PHP_AUTH_USER'] != $login) || ($_SERVER['PHP_AUTH_PW'] != $password)){
	header('Content-Type: text/html');
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="Authorized"');
	exit('<h2>Вы нажали отмена</h2>');
} 
	$dbc = mysqli_connect('localhost', 'root', '') or die('ошибка подключения к базе данных');
	mysqli_select_db($dbc, 'code-php') or die ('ошибка выбора базы данных');
	$login = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_USER']));
	$password = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_PW']));

	$query = "SELECT id, login FROM authorized WHERE login = '$login' AND
	 password = SHA('$password')";
	$result = mysqli_query($dbc, $query) or die('Ошибка запроса');
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_array($result);
		$id = $row['id'];
		$login = $row['login'];
	}
	else{
		header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="Authorized"');
	exit('<h2>Вы ввели не правильный логин или пароль</h2>');
	}
	mysqli_close($dbc);
echo "Вы вошли как $login";

?>
</body>
</html>