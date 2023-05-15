<?php

require_once '../vendor/autoload.php';
require_once '../App/Model/Conexao.php';

$pdo = \App\Model\Conexao::getConn();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_produto = $_POST['id_produto'];
    $quantidade_baixa = $_POST['quantidade_baixa'] ;

    $stmt = $pdo->prepare ('SELECT quantidade FROM estoque WHERE id=?');
    $stmt->execute([$id_produto]);
    $produto= $stmt->fetch();

    if($produto['quantidade'] < $quantidade_baixa){
        echo 'Não há produtos suficiente em estoque';
        exit();
    }
    $stmt = $pdo->prepare("UPDATE estoque SET quantidade = quantidade - ? WHERE id = ?");
    $stmt->execute([$quantidade_baixa, $id_produto]);

    header('Location: ../index.php');
    exit;
}