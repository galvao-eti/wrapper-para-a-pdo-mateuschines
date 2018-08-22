<?php
require '../autoload.php';
use Turma3\Base;

$dados = $_POST;
$dsn = 'mysql:host=localhost;dbname=turma3';
$dbh = new PDO($dsn, 'root', '');

    $categoria = new Base($dados, $dbh);

	if (isset($_GET['id'])){
        
      $categoria->delCategoria($_GET['id']);
      echo "<script>alert('Registro excluido');location.href=\"index.php\";</script>";
      exit;

	} else {
            
        echo "<script>alert('Erro ao excluir registro');location.href=\"index.php\";</script>";
        exit;
    }