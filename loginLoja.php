<?php
require_once('usuariosDAO.php');

$usuario = buscaUsuario($conn, $_POST['usuario_email'], $_POST['usuario_senha']);
$email = $usuario['usuario_email'];

if($usuario == null){
    $_SESSION['danger'] = "Erro ao tentar logar. Tente novamente. <a href='singin.php' class='btn btn-default'>LOGIN</a>";
    //header('Location: index.php');
    var_dump($usuario);
} else {
    session_start();
    $_SESSION['success'] = "Usuario logado com sucesso!";
    logaUsuario($email);
    if($usuario['usuario_nivel'] == 4){
        $adm = 'adm';
        $_SESSION['nivel'] = $adm;
    } else {
        $cmp = 'cmp';
        $_SESSION['nivel'] = $cmp;
    }
    header('Location: index.php');
    $_SESSION['usuario_id'] = $usuario['usuario_id'];
    $_SESSION['usuario_nome'] = $usuario['usuario_nome'];
    //var_dump($_SESSION);
    //var_dump($usuario);
    die();
}