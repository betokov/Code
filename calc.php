<?php require_once('func.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CALCULATOR</title>
	<style>
		div{
			margin:0 auto;
			width:500px;
			text-align:center;
		}
		h1{
			text-align:left;
			margin-left:60px;
		}
	</style>
</head>
<body>
<?php
if(!isset($_POST['submit'])){
	$a = $_POST['n_1'];
	$b = $_POST['n_2'];
	$action = $_POST['action'];

	switch($action){
		case mull:
			mull($a, $b);
			break;
	}

}
?>
<div>
	<h1>Калькулятор</h1>
		<?php 	?>
	<form action="calc.php" method="post">
		<input type="text" name="n_1">
		<select name="action">
			<option value="mull">+</option>
		</select>
		<input type="text" name="n_2"><br><br>
		<input type="submit">
	</form>
</div>
</body>
</html>