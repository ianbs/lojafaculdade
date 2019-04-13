<?php
require_once("usuariosDAO.php");

$usuario = criaUsuario($conn, $_POST['usuario_email'], $_POST['usuario_senha'], $_POST['usuario_nome'], $_POST['usuario_cpf'], $_POST['usuario_cep'], $_POST['usuario_rua'], $_POST['usuario_numero_casa'], $_POST['usuario_complemento'], $_POST['usuario_bairro'], $_POST['usuario_cidade'], $_POST['usuario_estado']);

if($usuario == null){
    $_SESSION['danger'] = "Algo deu errado...Tente novamente!";
    header("Location: ../cadastroUsuario.php");
} else {
	$_SESSION['success'] = "Usuário criado com sucesso. <a href='singin.php'>Faça o login!</a>";
	header("Location: ../index.php");
}
die();