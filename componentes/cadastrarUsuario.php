<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../App/Model/Conexao.php';

$pdo = \App\Model\Conexao::getConn();

$usuarioDao = new \App\Model\usuarioDao();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = new \App\Model\Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuarioDao->create($usuario);

    header('Location: ../pag/login/login.php');
}


