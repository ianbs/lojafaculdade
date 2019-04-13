<?php
require_once("produtosDAO.php");

$prods = listaProdutos($conn);

$q = $_REQUEST["q"];

$hint = "";

function disponivel($disp){
    if($disp == 1) {
        return "Produto disponível!";
    } else { 
        return "Produto indisponível"; 
    } 
}

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($prods as $name) {
        if (stristr($q, substr($name['produto_nome'], 0, $len))) {
            if ($hint === "") {
                $hint = "<div class='panel-body'><a href='detalhe-produto.php?id=".$name['produto_id']."'>" .$name['produto_nome']. " - " .$name['produto_preco']. "</a> - <strong>" .disponivel($name['produto_disponivel']). "</strong></div></br>";
            } else {
                $hint .= "<div class='panel-body'><a href='detalhe-produto.php?id=".$name['produto_id']."'>" .$name['produto_nome']. " - " .$name['produto_preco']. "</a> - <strong>".disponivel($name['produto_disponivel']). "</strong></div></br>" ;
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "<div class='panel-body'> Sem sugestão! Acho que não temos este produto...  </div>" : $hint;