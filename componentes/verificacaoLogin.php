<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '../vendor/autoload.php';
require_once '../App/Model/Conexao.php';
require_once '../App/Model/usuarioDao.php';

$pdo = \App\Model\Conexao::getConn();

$usuarioDao = new \App\Model\usuarioDao;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new \App\Model\Usuario;
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = $usuarioDao->getUsuarioByEmailAndPassword($email, $senha);

        if ($usuario == true) {
            var_dump($usuario);
            echo 'deu certo';
            exit;
        }
        else{
            echo 'Email ou senha invalidos';
        }
    }



}