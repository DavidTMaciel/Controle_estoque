<?php

require_once '../../vendor/autoload.php';
include '../../componentes/cadastrarUsuario.php';

?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style1.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
    <style>
        .container-cadastro p {
            margin-top: 5px;
            color: #ffffff;
            
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            background-color: #8f3d8f;}

        .popup-content h3 {
            margin-bottom: 10px;
        }

        .popup-content form {
            display: flex;
            flex-direction: column;
        }

        .popup-content button {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container text-center container-login">
        <h2>LOGIN</h2>
        <form method="post" action="../../componentes/verificacaoLogin.php" class="login">
            <label>Email</label>
            <input type="email" id="email" name="email">
            <label>Senha</label>
            <input type="password" id="password" name="password">
            <label>Esqueci a senha</label>
            <button type="submit" class="btn btn-info">Logar</button>
        </form>

        <div class="container-cadastro">
            <p>Ainda não tem cadastro?</p>
            <button class="cadastro">Cadastro</button>
        </div>
    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <h3>Cadastro</h3>
            <form action="../../componentes/cadastrarUsuario.php" method="POST" class="cadastro">
                <input type="text" name="nome" placeholder="Nome">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="senha" placeholder="Senha">
                <button type="submit" class="envio">Enviar</button>
            </form>
            <button id="btn-fechar">Fechar</button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var btnCadastrar = document.querySelector(".cadastro");
            var btnFechar = document.getElementById("btn-fechar");
            var popup = document.getElementById("popup");

            btnCadastrar.addEventListener("click", function () {
                popup.style.display = "block";
            });

            btnFechar.addEventListener("click", function () {
                popup.style.display = "none";
            });
        });





    </script>

</body>

</html>