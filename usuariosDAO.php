<?php
require_once("conectaBanco.php");

function buscaUsuario($conn, $email, $senha){
	$senhaMd5 = md5($senha);
	$email = mysqli_real_escape_string($conn, $email);
	$query = "select * from tbl_usuario where usuario_email = '{$email}' and usuario_senha='{$senhaMd5}'";
	$resultado = mysqli_query($conn, $query);
	return mysqli_fetch_assoc($resultado);
}

function verificaUsuario(){
    if(!usuarioEstaLogado()) {
        $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
        header("Location: ../index.php");
        die();
    }
}

function criaUsuario($conn, $usuario_email, $usuario_senha, $perfil_usuario_nome, $perfil_usuario_cpf, $endereco_cep, $endereco_rua, $endereco_numero_casa, $endereco_complemento, $endereco_bairro, $endereco_cidade, $endereco_estado) {
	$usuario_email = mysqli_real_escape_string($conn, $usuario_email);
	$usuario_senha = mysqli_real_escape_string($conn, $usuario_senha);
	$perfil_usuario_nome = mysqli_real_escape_string($conn, $perfil_usuario_nome);
	$perfil_usuario_cpf = mysqli_real_escape_string($conn, $perfil_usuario_cpf);
	$endereco_cep = mysqli_real_escape_string($conn, $endereco_cep);
	$endereco_rua = mysqli_real_escape_string($conn, $endereco_rua);
	$endereco_numero_casa = mysqli_real_escape_string($conn, $endereco_numero_casa);
	$endereco_complemento = mysqli_real_escape_string($conn, $endereco_complemento);
	$endereco_bairro = mysqli_real_escape_string($conn, $endereco_bairro);
	$endereco_cidade = mysqli_real_escape_string($conn, $endereco_cidade);
	$endereco_estado = mysqli_real_escape_string($conn, $endereco_estado);
	$usuario_senhaMd5 = md5($usuario_senha);
	$query = "insert into tbl_usuario (usuario_email, usuario_senha, usuario_nivel, usuario_nome, usuario_cpf, usuario_cep, usuario_rua, usuario_numero_casa, usuario_complemento, usuario_bairro, usuario_cidade, usuario_estado) values ('{$usuario_email}', '{$usuario_senhaMd5}', 4, '{$perfil_usuario_nome}', '{$perfil_usuario_cpf}', {$endereco_cep}, '{$endereco_rua}', {$endereco_numero_casa}, '{$endereco_complemento}', '{$endereco_bairro}', '{$endereco_cidade}', '{$endereco_estado}')";
	return mysqli_query($conn, $query);
}

function updateUsuario($conn, $id, $usuario_email, $usuario_senha, $perfil_usuario_nome, $perfil_usuario_cpf, $endereco_cep, $endereco_rua, $endereco_numero_casa, $endereco_complemento, $endereco_bairro, $endereco_cidade, $endereco_estado) {
	$id = mysqli_real_escape_string($conn, $id);
	$usuario_email = mysqli_real_escape_string($conn, $usuario_email);
	$usuario_senha = mysqli_real_escape_string($conn, $usuario_senha);
	$perfil_usuario_nome = mysqli_real_escape_string($conn, $perfil_usuario_nome);
	$perfil_usuario_cpf = mysqli_real_escape_string($conn, $perfil_usuario_cpf);
	$endereco_cep = mysqli_real_escape_string($conn, $endereco_cep);
	$endereco_rua = mysqli_real_escape_string($conn, $endereco_rua);
	$endereco_numero_casa = mysqli_real_escape_string($conn, $endereco_numero_casa);
	$endereco_complemento = mysqli_real_escape_string($conn, $endereco_complemento);
	$endereco_bairro = mysqli_real_escape_string($conn, $endereco_bairro);
	$endereco_cidade = mysqli_real_escape_string($conn, $endereco_cidade);
	$endereco_estado = mysqli_real_escape_string($conn, $endereco_estado);
	$usuario_senhaMd5 = md5($usuario_senha);
	$query = "update tbl_usuario set usuario_email = '{$usuario_email}', usuario_senha = '{$usuario_senhaMd5}', usuario_nivel = 1, usuario_nome = '{$perfil_usuario_nome}', usuario_cpf = '{$perfil_usuario_cpf}', usuario_cep = {$endereco_cep}, usuario_rua = '{$endereco_rua}', usuario_numero_casa = {$endereco_numero_casa}, usuario_complemento = '{$endereco_complemento}', usuario_bairro = '{$endereco_bairro}', usuario_cidade = '{$endereco_cidade}', usuario_estado = '{$endereco_estado}' where usuario_id = {$id}";
	return mysqli_query($conn, $query);
}

function perfilUsuario($conn, $id) {
	// $email = mysqli_real_escape_string($conn, $email);
	$query = "select * from tbl_usuario where usuario_id = '{$id}'";
	$resultado = mysqli_query($conn, $query);
	// var_dump($resultado);
	return mysqli_fetch_assoc($resultado);
}

function usuarioEstaLogado(){
    return isset($_SESSION['usuario_logado']);
}

function usuarioLogado(){
    return $_SESSION["usuario_logado"];
}

function logaUsuario($email){
	$_SESSION["usuario_logado"] = $email;
}

function logout(){
	session_start();
    session_destroy();
}
