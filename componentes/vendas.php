<?php

require_once 'vendor/autoload.php';
require_once '../App/Model/Conexao.php';

$produtoDao = new App\Model\ProdutoDao();
$produtos = $produtoDao->read();

$pdo =  \App\Model\Conexao::getConn();


echo "$quantidade_total_baixa";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_produto = $_POST['id_produto'];
    $quantidade_baixa = $_POST['quantidade_baixa'];

    $stmt = $pdo->prepare('SELECT quantidade FROM estoque WHERE id=?');
    $stmt->execute([$id_produto]);
    $produto = $stmt->fetch();

    if($produto['quantidade'] < $quantidade_baixa){
        echo 'Ainda sem Vendas';
        exit;
    }
    $stmt = $pdo->prepare("UPDATE estoque SET quantidade = quantidade - ? WHERE id=?");
    $stmt->execute([$quantidade_baixa, $id_produto]);

    $stmt = $pdo->prepare ('SELECT SUM(quantidade) AS quantidade_baixada FROM estoque_baixa WHERE id_produto=?');
    $stmt->execute([$id_produto]);
    $baixas= $stmt->fetch();

    echo "<div>Quantidade de produtos baixados: " . $baixas['quantidade_baixada'] . "</div>";

    exit;

}