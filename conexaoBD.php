<?php

$localhost = "db.trator.w2o";
$root = "root";
$password = "root";

$conexao = mysql_connect($localhost, $root, $password);
if (!$conexao){
    die("Não foi possível conectar ao banco: " . mysql_error());
}

$selecionar_bd = mysql_select_db('cadastro_pessoas', $conexao);
if(!$selecionar_bd){
    die("Não foi possivel selecionar o banco: " . mysql_error());
}

unset($selecionar_bd);

?>