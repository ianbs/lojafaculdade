<?php
require_once('usuariosDAO.php');

logout();
$_SESSION['success'] = "Usuario deslogado com sucesso!";
header("Location: index.php");
die();