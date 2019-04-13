<?php 
session_start();
require_once('./public_files/fixed/header.php');
require_once('produtosDAO.php');

$produto_id = $_GET['id'];
$produto = buscaProduto($conn, $_GET['id']);
//var_dump($produto)

?>
    <div class="container">
        <div class="slideshow-container">
            <div class="mySlides">
                <div class="numbertext">1 / 2</div>
                <img style="width:100%; height: 40em; border: 1px solid;"  src="./public_files/imgs/imgs_produtos/<?=$produto['produto_foto']?>.jpg" />
                <div class="text"></div>
            </div>
            <div class="mySlides">
                <div class="numbertext">2 / 2</div>
                <img style="width:100%; height: 40em; border: 1px solid;"  src="./public_files/imgs/imgs_produtos/<?=$produto['produto_foto']?>-Nutri.jpg" />
                <div class="text"></div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
        <div class="content">
            <h3 class="tituloproduto text-center"><?=$produto['produto_nome']?></h3>
            <h4 class="categoria text-center"><?=$produto['categoria_nome']?></h4>
            <h3>
                <?php if ($produto["produto_disponivel"] != 1) { ?> 
                    <span class="label label-warning">Produto indisponível!</span> 
                <?php } else { ?>    
                    <span class="label label-info">Produto disponível!</span>
                <?php } ?>
                <span class="label label-info">FAÇA JÁ O SEU PEDIDO!!</span>
            </h3>
            <p class="descricao"><?=$produto['produto_descricao']?></p>
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <strong><p class="preco">R$ <?=$produto['produto_preco']?></p></strong>
                </div>
            </div>
            <div class="">
                <a href="carrinhoCompras.php?id=<?=$produto['produto_id']?>&&acao=add" class="botaoPedido btn btn-default">Adicionar este produto ao carrinho!</a>
            </div>
        </div>
    </div>
<?php 
require_once('./public_files/fixed/footer.php');
?>