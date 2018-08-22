<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trabalho</title>

	<style>
		#cId{
			display:none;
		}
	</style>
</head>
<body>
	<form action="index.php" method="POST">
		<input type="text" name="id" readonly id="cId"><br>
		Categoria:
		<input type="text" name="nome"><br>
	
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>