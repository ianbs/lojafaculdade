<?php 
session_start();
require_once('./public_files/fixed/header.php');
require_once("usuariosDAO.php");
require_once('produtosDAO.php');
$produtos = listaProdutos($conn);
?>
<?php
    mostraAlerta("success");
    mostraAlerta("danger");
?>
    <div class="container">
        <nav>
            <ul class="nav nav-tabs nav-justified">
                <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 'adm') { ?>
                    <li role="presentation">
                        <a href="painelProdutos.php">
                            <span class="glyphicon glyphicon-wrench"></span>
                            Painel de Administração
                        </a>
                    </li>
                <?php } else if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 'cmp') {?>
                    <li role="presentation">
                        <a href="painelUsuario.php">
                            <span class="glyphicon glyphicon-folder-close"></span>
                            Painel do Usuário
                        </a>
                    </li>
                <?php } else { ?>
                    <li role="presentation"><p class="text-center" style="margin:1.6em">Você não está logado! Faça o login ou cadastre-se:&thinsp;&thinsp;&thinsp; <a href="singin.php" class="btn btn-default">Login</a>&thinsp; <span class="glyphicon glyphicon-option-vertical"></span>&thinsp; <a href="cadastroUsuario.php" class="btn btn-default">Cadastrar</a></p></li>
                <?php }  ?>
            </ul>
        </nav>
    </div>
    <div class="container form-group">
        <form>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">Search</span>
                <input class="form-control" type="text" size="30" onkeyup="showResult(this.value)">
            </div>
            <div id="livesearch" class="panel panel-default"></div>
        </form>
    </div>
    <div class="container jumbotron text-center">
        <h4>Bem vindo à Performace Nutrition!</h4>
        <?php if(usuarioEstaLogado()) {?>
            <p>Você está logado como: <?=$_SESSION['usuario_nome']?>(<?=usuarioLogado()?>) - <a href="logoutLoja.php" class="btn btn-default">Deslogar</a></p>
        <?php } 
        ?>
    </div>
    <div class="container produtos">
        <div class="row">
        <?php 
        if($produtos != null) {
            foreach ($produtos as $produto) { ?>
            <div class="col-sm-1 col-md-3">
                <div class="thumbnail">
                    <div class="">
                        <img class="imagemprodthumb text-center" src="./public_files/imgs/imgs_produtos/<?=$produto['produto_foto']?>.jpg" alt="imagem do produto">
                    </div>
                    <div class="caption">
                        <h3><?=substr($produto["produto_nome"], 0, 15)?>...</h3>
                        <h3>
                            <?php if ($produto["produto_disponivel"] != 1) { ?> 
                                <span class="label label-warning">Produto indisponível!</span> 
                            <?php } else { ?>    
                                <span class="label label-info">Produto disponível!</span>
                            <?php } ?>
                        </h3>
                        <h4><span class="label label-success">R$ <?=$produto["produto_preco"]?></span></h4>
                        <p><?=substr($produto["produto_descricao"], 0, 50)?>...</p>
                        <p><a href="detalhe-produto.php?id=<?=$produto['produto_id']?>" class="btn btn-primary btn-lg btn-justify" role="button">Detalhes</a> 
                        <a href="carrinhoCompras.php?id=<?=$produto['produto_id']?>&&acao=add" class="btn btn-default btn-lg  btn-justify" role="button">Comprar!</a></p>
                    </div>
                </div>
            </div>
            <?php } 
        } else { ?>
            <h4 class="alert alert-warning text-center">Ocorreu um problema... Parece que não temos nenhum produtos no site! Estranho..</h4>
        <?php } ?>
        </div>
    </div>
<?php 
require_once('./public_files/fixed/footer.php');
?>