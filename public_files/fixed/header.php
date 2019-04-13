<?php
require_once("mostraAlerta.php");
require_once('usuariosDAO.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./public_files/style/css/reset.css">
    <link rel="stylesheet" href="./public_files/style/css/bootstrap.css">
    <link rel="stylesheet" href="./public_files/style/css/main.css">

    <script src="./public_files/style/js/jquery.js"></script>
    <script src="./public_files/style/js/bootstrap.js"></script>
    <script src="./public_files/style/js/main.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Muli:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>Perfomace Nutrition</title>
</head>
<body>
    <img class="imagemBanner" src="./public_files/imgs/topo.png"/>
    <h3 class="title">Performace Nutrition</h3>
    <nav>
        <ul class="nav nav-tabs nav-justified">
            <li role="presentation">
                <a href="index.php">
                    <span class="glyphicon glyphicon-home"></span>
                    Home
                </a>
            </li>
            <?php if(usuarioEstaLogado()) { ?>
            <li role="presentation">
                <a href="carrinhoCompras.php">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    Carrinho de Compras
                </a>
            </li>
            <?php } ?>
            <?php if(!usuarioEstaLogado()) { ?>
                <li role="presentation">
                    <a href="singin.php">
                        <span class=""></span>
                        Login
                    </a>
                </li>
                <li role="presentation">
                    <a href="cadastroUsuario.php">
                        Cadastrar
                    </a>
                </li>  
            <?php } ?>
            
            <?php if(usuarioEstaLogado()) { ?>
                <li role="presentation">
                    <a href="logoutLoja.php">
                        <span class=""></span>
                        Logout
                    </a>
                </li>
            <?php } ?>
          
        </ul>
    </nav>
    <div class="container-fluid">
