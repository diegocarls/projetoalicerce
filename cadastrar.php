<?php
session_start();
// Puxar dados do db_projeto
require_once 'db_projeto.php';

$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$sql = "INSERT INTO users(nome, email, senha)VALUES ('$nome','$email','$senha')";
$result = mysqli_query($connect, $sql);
if(mysqli_insert_id($connect)){
	$_SESSIONN['msg']="Usuário cadastrado com sucesso.";
	header("Location: index.php");
}else{
	$_SESSIONN['msg']="Usuário não cadastrado.";
	header("Location: cadastro.php");
}