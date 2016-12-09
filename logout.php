<?php
ob_start();
session_start();

if(isset($_SESSION['user_id'])){
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time - 3600);
	}
}
session_destroy();
echo '<h1>Выход произойдет через 5 секунд</h1>';
$home_url = 'http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'authorized.php';
header('Refresh: 5; url= ' . $home_url);
?>