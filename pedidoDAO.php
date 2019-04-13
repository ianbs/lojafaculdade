<?php
require_once('conectaBanco.php');

function finalizaCompras($conn,$pedido_preco, $pedido_items, $pedido_usuario){
    $pedido_preco = mysqli_real_escape_string($conn, $pedido_preco);
    $pedido_items = mysqli_real_escape_string($conn, $pedido_items);
    $pedido_usuario = mysqli_real_escape_string($conn, $pedido_usuario);
    $query = "insert into tbl_pedidos (pedido_preco, pedido_items, pedido_usuario_id)
    values ({$pedido_preco}, '{$pedido_items}', {$pedido_usuario})";
    return mysqli_query($conn, $query);
}

function buscaPedidos($conn, $usuario_id){
    $pedidos = array();
    $resultado = mysqli_query($conn,"SELECT pedido_id, pedido_preco, pedido_items, pedido_usuario_id, pedido_status, pedido_tipo, pedido_entrega FROM tbl_pedidos INNER JOIN tbl_usuario WHERE tbl_usuario.usuario_id = {$usuario_id}");
    // $resultado = mysqli_query($conn, $query);
    // return mysqli_fetch_assoc($resultado);
    while($pedido = mysqli_fetch_assoc($resultado)) {
        array_push($pedidos, $pedido);
    }

    return $pedidos;
}