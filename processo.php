<?php

session_start();
include_once("conexao.php")
;

$nome = filter_input
(INPUT_POST, 'nome', 
FILTER_SANITIZE_STRING);
$email = filter_input
(INPUT_POST, 'email', 
FILTER_SANITIZE_EMAIL);
$senha = filter_input
(INPUT_POST,'senha');
$dataNascimento = filter_input
(INPUT_POST,'dataNascimento');


$result_usuario = "INSERT 
INTO usuarios (nome, 
email, senha, dataNascimento) VALUES 
('$nome', '$email','$senha, '$dataNascimento')
";
$resultado_usuario = 
mysqli_query($conn, 
$result_usuario);

if(mysqli_insert_id($conn))
{
	$_SESSION['msg'] = "<p 
style='color:green;
'>Usuário cadastrado 
com sucesso</p>";
	header("Location: 
index.php");
}else{
	$_SESSION['msg'] = "<p 
style='color:red;
'>Usuário não foi 
cadastrado com 
sucesso</p>";
	header("Location: 
index.php");
}