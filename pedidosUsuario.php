<?php 
session_start();
require_once('./public_files/fixed/header.php');
require_once('usuariosDAO.php');
require_once('produtosDAO.php');
require_once('pedidoDAO.php');
$pedidos = buscaPedidos($conn, $_SESSION['usuario_id']);
?>
    <div class="container">
        <h2 class="tituloproduto text-center">Painel do Usuário</h2>
        <nav>
            <ul class="nav nav-tabs nav-justified">
                    <li role="presentation">
                        <a href="painelUsuario.php">
                            Dados do Usuário
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="pedidosUsuario.php">
                            Pedidos do Usuário
                        </a>
                    </li>
            </ul>
        </nav>
        <div class="categoria panel panel-body">
            <h3>Pedidos Realizados</h3>
            <hr>
            
            <?php foreach($pedidos as $pedido): ?>
                <ul class="list-group">
                    <?php 
                    $produtos_p = unserialize($pedido['pedido_items']);
                    ?>
                    <li><p class="list-group-item-heading">Número do pedido: <?=$pedido['pedido_id']?></p></li>
                    <p>Nomes dos produtos:</p>
                    <?php foreach(array_keys($produtos_p) as $prodid) : ?>
                        <?php $prod =  buscaProdutoPedido($conn, $prodid);?>
                        
                        <?php foreach($prod as $p):?>
                            <p class="list-group-item-text"> <?=$p['produto_nome']?> - Quantidade: <?=$produtos_p[$prodid]?></p>
                        <?php endforeach ?>
                    <?php endforeach ?>
                    <p class="list-group-item-text"><?=$pedido['pedido_status']?></p>
                    <p class="list-group-item-text"><?=$pedido['pedido_tipo']?></p>
                    <p class="list-group-item-text"><?=$pedido['pedido_entrega']?></p>
                    <p class="list-group-item-text">Preço total de compra: <?=$pedido['pedido_preco']?></p>
                    <hr>
                </ul>
            <?php endforeach ?>
            
        </div>
    </div>
<?php 
require_once('./public_files/fixed/footer.php');
?>