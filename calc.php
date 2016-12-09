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
		h2{
			text-align:center;
		}
	</style>
</head>
<body>
	<div>
		<h1>Калькулятор</h1>
		<?php
		if(!isset($_POST['submit'])){
			$a = $_POST['n_1'];
			$b = $_POST['n_2'];
			$action = $_POST['action'];

			switch($action){
				case sum:
				sum($a, $b);
				break;
				
				case sub:
				sub($a, $b);
				break;

				case mul:
				mul($a, $b);
				break;

				case del:
				del($a, $b);
				break;

				case sqr:
				sqr($a, $b);
				break;

				case kvad:
				kvad($a, $b);
				break;
			}

		}
		?>
		<form action="calc.php" method="post">
			<input type="text" name="n_1" value="<?php if(!empty($a)) echo $a; ?>">
			<select name="action">
				<option value="sum" <?php if($action == 'sum') echo 'selected';?>>+</option>
				<option value="sub" <?php if($action == 'sub') echo 'selected';?>>-</option>
				<option value="mul" <?php if($action == 'mul') echo 'selected';?>>*</option>
				<option value="del" <?php if($action == 'del') echo 'selected';?>>:</option>
				<option value="sqr" <?php if($action == 'sqrt') echo 'selected';?>>&#8730;</option>
				<option value="kvad" <?php if($action == 'kvad') echo 'selected';?>>в степени</option>
			</select>
			<input type="text" name="n_2" value="<?php if(!empty($b)) echo $b; ?>"><br><br>
			<input type="submit">
		</form>
	</div>
</body>
</html>