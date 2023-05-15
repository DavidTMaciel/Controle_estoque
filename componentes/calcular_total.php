<?php

require_once 'vendor/autoload.php';

$produtoDao = new App\Model\ProdutoDao();
$produtos = $produtoDao->read();

$total= 0;

foreach($produtos as $produto){
    $quantidade = $produto['quantidade'];
    $preco = $produto['preco'];
    $total += $quantidade * $preco;
}