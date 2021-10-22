<?php
require_once("conexaoBD.php");
session_start();

$id = $_GET['id'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$genero = $_POST['genero'];

if($id == null || $id == 0){
    $sql = "INSERT INTO pessoas (nome, idade, email, celular, sexo) VALUES ('$nome', '$idade', '$email', '$celular', '$genero')";
    
    mysql_query($sql, $conexao) or die("Query incorreta: " . $sql . "<br>" . mysql_errno() . ": " . mysql_error());

    if (mysql_affected_rows() > 0){
        $_SESSION['alert'] = "<script>alert('Dados cadastrados com sucesso!')</script>";
        header("Location: listaPessoa.php");
    }else {
        $_SESSION['alert'] = "<script>alert('Infelizmente, não foi possível cadastrar os dados!')</script>";
        header("Location: cadastro.php");
    }
}else {
    $sql = "UPDATE pessoas SET nome = '$nome', idade = '$idade', email = '$email', celular = '$celular', sexo = '$genero' WHERE id = $id";

    mysql_query($sql, $conexao) or die("Query incorreta: " . $sql . "<br>" . mysql_errno() . ": " . mysql_error());

    if (mysql_affected_rows() > 0){
        $_SESSION['alert'] = "<script>alert('Dados alterados com sucesso!')</script>";
        header("Location: listaPessoa.php");
    }else {
        
        $_SESSION['alert'] = "<script>alert('Parece que você não alterou nenhum dado!')</script>";
        header("Location: cadastro.php?id=$id");
    }
}

?>
