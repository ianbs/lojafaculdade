<?php 
session_start();
require_once('produtosDAO.php');
require_once('pedidoDAO.php');
require_once('./public_files/fixed/header.php');

//var_dump($_SESSION['carrinho']);


if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
 }
   
 //adiciona produto
   
 if(isset($_GET['acao'])){
      
    //ADICIONAR CARRINHO
    if($_GET['acao'] == 'add'){
        $id = intval($_GET['id']);
        if(!isset($_SESSION['carrinho'][$id])){
            $_SESSION['carrinho'][$id] = 1;
            header("location: carrinhoCompras.php");
        }else{
            $_SESSION['carrinho'][$id] += 1;
            header("location: carrinhoCompras.php");
        }
    }
      
    //REMOVER CARRINHO
    if($_GET['acao'] == 'del'){
       $id = intval($_GET['id']);
       if(isset($_SESSION['carrinho'][$id])){
          unset($_SESSION['carrinho'][$id]);
       }
    }
      
    //ALTERAR QUANTIDADE
    if($_GET['acao'] == 'up'){
       if(is_array($_POST['prod'])){
          foreach($_POST['prod'] as $id => $qtd){
             $id  = intval($id);
             $qtd = intval($qtd);
             if(!empty($qtd) || $qtd <> 0){
                $_SESSION['carrinho'][$id] = $qtd;
             }else{
                unset($_SESSION['carrinho'][$id]);
             }
          }
       }
    }

    if($_GET['acao'] == 'fim'){   
        //var_dump(serialize($_SESSION['carrinho']));
        finalizaCompras($conn,$_SESSION['total'],serialize($_SESSION['carrinho']),$_SESSION['usuario_id']);
        $_SESSION['carrinho'] = array();
        unset($_SESSION['total']);
        header('Location: painelUsuario.php');
        $_SESSION['success'] = "Compra finalizada.";
    }
   
 }    
// var_dump($_SESSION);    
?>
<div class="container">
            <header id="cabecalho">
                <div class="central">
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
                        <?php
                            if(empty($_SESSION['usuario_logado'])){
                            echo "<p><a href='login.php'>Login</a> | <a href='login.php'>Cadastre-se</a></p>";
                            }else{
                            echo "<p>Você está logado como: ".$_SESSION['usuario_logado']."</p>";
                            echo "<p><a href='pedidosUsuario.php'>Meus Pedidos</a> | <a href='painelUsuario.php'>Minha Conta</a></p>";
                            }
                            mostraAlerta("success");
                            mostraAlerta("danger");
                        ?>
                    </div>
                </div>
            </header>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <caption><h4 class=".tituloproduto"><strong>Carrinho de Compras</strong></h4></caption>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">                
                        <thead>
                            <tr>
                                <th width="244">Produto</th>
                                <th width="79">Quantidade</th>
                                <th width="89">Preço</th>
                                <th width="100">SubTotal</th>
                                <th width="64">Remover</th>
                            </tr>
                        </thead>
                        <form action="?acao=up" method="post">
                        <tfoot>
                            <div class="btn-group btn-group-justified" role="group">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-lg btn-primary">Atualizar Carrinho</button>
                                </div>
                                <div class="btn-group" role="group">
                                    <a role="button" class="btn btn-default btn-lg" href="index.php">Continuar Comprando</a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a role="button" class="btn btn-danger btn-lg" href="?acao=fim">Finalizar Pedido</a>
                                </div>
                            </div>
                            <!-- <tr>
                                <td colspan="5"><input type="submit" class="btn btn-danger " value="Atualizar Carrinho" /></td>
                                <tr>
                                <td colspan="5"><a href="index.php">Continuar Comprando</a></td> -->
                        </tfoot>
                        <tbody>
                                <?php
                                    if(count($_SESSION['carrinho']) == 0){
                                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                                    } else {
                                        $total = 0;
                                        foreach($_SESSION['carrinho'] as $id => $qtd){
                                            $sql   = "SELECT *  FROM tbl_produto WHERE produto_id= '$id'";
                                            $qr    = mysqli_query($conn, $sql) or die();
                                            $ln    = mysqli_fetch_assoc($qr);
                                                
                                            $nome  = $ln['produto_nome'];
                                            $preco = $ln['produto_preco'];
                                            $sub   = $ln['produto_preco'] * $qtd;
                                                
                                            $total += $ln['produto_preco'] * $qtd;
                                            
                                        echo '<tr>       
                                                <td>'.$nome.'</td>
                                                <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                                <td>R$ '.$preco.'</td>
                                                <td>R$ '.$sub.'</td>
                                                <td><a class="btn btn-danger" href="?acao=del&id='.$id.'">Remove</a></td>
                                            </tr>';
                                        }
                                        $total = $total;
                                        echo '<tr class="categoria">
                                                    <td colspan="4">Total</td>
                                                    <td><strong>R$ '.$total.'</strong></td>
                                            </tr>';
                                        $_SESSION['total'] = $total;
                                    }
                                ?>
                                <div >
                                    <h4>Metodos de pagamentos</h4>
                                    <select class="form-control">
                                        <?php
                                            $procurapagamentos = "SELECT * FROM tbl_pagamentos";
                                            $querypagamentos = mysqli_query($conn, $procurapagamentos) or die();
                                            $pagamentos = array();
                                            
                                            while($pagamento = mysqli_fetch_assoc($querypagamentos)) {
                                                array_push($pagamentos, $pagamento);
                                            }
                                            foreach($pagamentos as $pagamento):
                                                //var_dump($pagamento);
                                                $pg = $pagamento['pagamentos_nome'];
                                        ?>
                                            <option value=""><?=$pagamento['pagamentos_nome']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <h4>Metodos de envio</h4>
                                    <select class="form-control">
                                    <?php
                                            $procuraenvios = "SELECT * FROM tbl_envios";
                                            $queryenvios = mysqli_query($conn, $procuraenvios) or die();
                                            $envios = array();
                                            
                                            while($envio = mysqli_fetch_assoc($queryenvios)) {
                                                array_push($envios, $envio);
                                            }
                                            foreach($envios as $envio):
                                                //var_dump($pagamento);
                                                $env = $envio['envios_nome'];
                                        ?>
                                            <option value="<?=$envio['envios_id']?>"><?=$envio['envios_nome']?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php $_SESSION['envio_id'] = $envio['envios_id'];
                                    $_SESSION['pagamentos_id'] = $pagamento['pagamentos_id'];
                                    ?>
                                </div>
                        </tbody>
                </table>                    
        </div>
<?php 
require_once('./public_files/fixed/footer.php');
?>
