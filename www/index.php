<?php 
require '../autoload.php';

use Turma3\Base;

$dados = $_POST;
$dsn = 'mysql:host=localhost;dbname=turma3';
$dbh = new PDO($dsn, 'root', '');

    $categoria = new Base($dados, $dbh);
    
    //var_dump($categoria);

    $categoria->persistir();

    $categoria->selecionar();
    
?>

<a href="Addcategoria.php">Adicionar Categoria</a>

