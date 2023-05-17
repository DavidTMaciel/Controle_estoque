<?php

require_once '../vendor/autoload.php';
require_once '../App/Model/Conexao.php';

$pdo = \App\Model\Conexao::getConn();


$erro = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_produto = $_POST['id_produto'];
    $quantidadeBaixa = $_POST['quantidade_baixa'] ;

    $stmt = $pdo->prepare ('SELECT quantidade FROM estoque WHERE id=?');
    $stmt->execute([$id_produto]);
    $produto= $stmt->fetch();

    if($quantidadeBaixa > $produto['quantidade']){
       
            $erro = true;
    }
    else{
        $stmt = $pdo->prepare("UPDATE estoque SET quantidade = quantidade - ? WHERE id = ?");
        $stmt->execute([$quantidadeBaixa, $id_produto]);
    }



    header('Location: ../index.php' . ($erro ? '?error=1' : ''));
    exit;
}