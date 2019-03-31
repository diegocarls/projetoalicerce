<?php
// Puxar dados do db_projeto
require_once 'db_projeto.php';
// Sessão
session_start();

$sql = "DELETE FROM users WHERE id='$id'";
$date=mysqli_query($connect, $sql);



