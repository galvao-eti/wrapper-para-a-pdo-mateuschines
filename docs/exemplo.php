<?php
require '../autoload.php';
use Turma3\Config;
use Turma3\Base;

$config = new Config('mysql', 'localhost', 3306, 'turma3', 'root', 'minhasenha');
$dbh = new Base($config);

$stmt = $dbh->preparar(sprintf("INSERT INTO categoria (nome) VALUES ('%s')", $_POST['nome']));
$stmt->execute();

$dbh->desconectar();
