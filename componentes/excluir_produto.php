<?php

require_once '../vendor/autoload.php';
require_once '../App/Model/Conexao.php';

$pdo = \App\Model\Conexao::getConn();

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
    $id_produto=$_GET['id'];

    $stmt=$pdo->prepare('DELETE FROM estoque WHERE id=?');
    $stmt->execute([$id_produto]);
    $produto= $stmt->fetch();
    
    header('Location: ../index.php');
    exit;
}