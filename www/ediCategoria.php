<?php
require '../autoload.php';
use Turma3\Base;

$dados = $_POST;
$dsn = 'mysql:host=localhost;dbname=turma3';
$dbh = new PDO($dsn, 'root', '');

    $categoria = new Base($dados, $dbh);

	if (isset($_GET['id'])){
		$result = $categoria->busca($_GET['id']);		
	}

	if ($_POST){
		$categoria->ediCategoria($result->id, $_POST['nome']);
		echo "<script>alert('Registro Alterado');location.href=\"index.php\";</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trabalho</title>

</head>
<body>
	<form method="POST">
        ID:
		<input type="text" name="id" readonly value="<?=$result->id;?>"><br>
		Categoria:
		<input type="text" name="nome" value="<?=$result->nome;?>"><br>
	
		<input type="submit" value="Alterar">
	</form>
</body>
</html>