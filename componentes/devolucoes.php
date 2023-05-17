<?php

require_once '../vendor/autoload.php';
require_once '../App/Model/Conexao.php';

$pdo = \App\Model\Conexao::getConn();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_produto = $_POST['id_produto'];
    $quantidade_devolucao = $_POST['quantidade_devolucao'];

    $stmt = $pdo->prepare('SELECT quantidade FROM estoque WHERE id=? ');
    $stmt->execute([$id_produto]);
    $produto = $stmt->fetch();

    $stmt =  $pdo->prepare('UPDATE estoque set  quantidade = quantidade + ? WHERE id = ? ');
    $stmt->execute([$quantidade_devolucao, $id_produto]);

    header('location: ../index.php');
}

