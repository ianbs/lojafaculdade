<?php
require_once('conectaBanco.php');

function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM tbl_produto INNER JOIN tbl_categoria WHERE tbl_categoria.categoria_id = tbl_produto.produto_categoria;");

    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado)
        values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}',
        categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
$query = "SELECT * FROM tbl_produto INNER JOIN tbl_categoria WHERE tbl_categoria.categoria_id = tbl_produto.produto_categoria AND tbl_produto.produto_id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function buscaProdutoPedido($conexao, $id) {
    $produtos = array();
    $query = "SELECT * FROM tbl_produto INNER JOIN tbl_categoria WHERE tbl_categoria.categoria_id = tbl_produto.produto_categoria AND tbl_produto.produto_id = {$id}";
    $resultado = mysqli_query($conexao, $query);

    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function buscaCarrinho($conexao, $id) {
    $query = "SELECT produto_id, produto_nome, produto_preco FROM tbl_produto WHERE produto_id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }
    