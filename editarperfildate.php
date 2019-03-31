<?php
// Puxar dados do db_projeto
require_once 'db_projeto.php';
// Sessão
session_start();
//Dados de alteraçao do Usuario
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$sql = "UPDATE users SET nome = '$nome', email = '$email', senha = '$senha' WHERE id='$id'";
$resultado = mysqli_query($connect, $sql);

if(mysqli_affected_rows($connect)){
	$_SESSION['msg']="<p>Usuario editado com sucesso!</p>";
	header("Location: home.php");
}else{
	$_SESSION['msg']="<p>Erro ao alterar usuario!</p>";
}


?>