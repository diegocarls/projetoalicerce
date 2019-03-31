<?php
session_start();
// Puxar dados do db_projeto
require_once 'db_projeto.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);

$sql = "INSERT INTO postagens(descricao, imagem)VALUES ('$descricao','$imagem')";
$result = mysqli_query($connect, $sql);
if(mysqli_insert_id($connect)){
	$_SESSIONN['msg']="-Postado com sucesso.";
	header("Location: home.php");
}else{
	$_SESSIONN['msg']="Falha ao postar.";
	header("Location: home.php");
}
?>