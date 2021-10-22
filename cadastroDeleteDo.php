<?php 
session_start();
require_once('conexaoBD.php');

$id = $_GET['id'];
$sql = "DELETE FROM pessoas WHERE id = $id";
mysql_query($sql, $conexao) or die('Query incorrea: ' . $sql . '<br>' . mysql_errno() . ": " . mysql_error());

if (mysql_affected_rows() > 0) {
    $_SESSION['alert'] = "<script>alert('Dados excluidos com sucesso!')</script>";
    header("Location: listaPessoa.php");
}

?>