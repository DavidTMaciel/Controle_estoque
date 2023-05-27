<?php

require_once 'vendor/autoload.php';
include 'componentes/calcular_total.php';



$produtoDao = new \App\Model\ProdutoDao();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = new \App\Model\Produto();
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produtoDao->create($produto);
}

$produtos = $produtoDao->read();

$error = false;
$erro = isset($_GET['error']) && $_GET['error'] == 1;

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
</head>

<body>
    <div class="ajuste">
        <div>
            <h1>DASHBOARD ESTOQUE</h1>
        </div>

        <section>
            <div class="menu">
                <h2>Controll</h2>
                <img src="assets/teste.jpg" alt='avatar' class="avatar">
                <ul>
                    <span class="material-symbols-outlined home">
                        home
                    </span>
                    <span class="material-symbols-outlined conta">
                        view_cozy
                    </span>
                    <span class="material-symbols-outlined sair">
                        login
                    </span>
                    <li><a href="#">Home</a></li>
                    <li><a href="pag/conta/conta.php">Conta</a></li>

                    <li><a href="#">Sair</a></li>
                </ul>
            </div>
        </section>
        <div class="fundo limitador">
            <div class="container-lg text-center container-visual">
                <div class="row align-items-start dashboard">
                    <div class="col-2 controle-visual shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <h2>Entradas</h2>
                        <p></p>

                    </div>
                    <div class="col-2 controle-visual shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <h2>Estoque</h2>
                        <p> R$:
                            <?php echo number_format($total, 2, ',', '.') ?>
                        </p>

                    </div>
                    <div class="col-2 controle-visual shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <h2>Devoluções</h2>
                        <p class="producao">Em Breve</p>

                    </div>
                    <div class="col-2 controle-visual shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <h2>vendas</h2>


                    </div>

                </div>
                <div class="limitador-filtro-cadastrar">
                    <div class="col estilo-container-maiores shadow-lg p-3 mb-5 bg-body-tertiary rounded cadastrar">
                        <h2>Cadastrar item</h2>
                        <form action="index.php" method="POST">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                            <label>Preço</label>
                            <input type="text" name="preco" class="form-control" required>
                            <label>Quantidade</label>
                            <input type="number" name="quantidade" class="form-control" required>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>

                        </form>
                    </div>
                    <div
                        class="col-5 controle-visual-filtro shadow-lg p-3 mb-5 bg-body-tertiary rounded estilo-container-maiores">
                        <h2>Filtro</h2>
                        <p></p>

                    </div>
                </div>
            </div>

            <div class="container text-center limitador container-estoque">
                <div class="row align-items-start ">
                    <div class="col estoque shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Total R$</th>
                                    <th scope="col">Baixar</th>
                                    <th scope="col">Devolução</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $quantidade_total_baixa = 0; ?>
                                <?php foreach ($produtos as $produto): ?>
                                    <input type="hidden" name="quantidade_atual" value="<?php $produto['quantidade'] ?>" ;>
                                    <tr>
                                        <td>
                                            <?php echo $produto['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $produto['nome'] ?>
                                        </td>
                                        <td>
                                            <?php echo "R$" . $produto['preco'] ?>
                                        </td>
                                        <td>
                                            <?php echo $produto['quantidade'] ?>
                                        </td>
                                        <td>
                                            <?php echo $produto['preco'] * $produto['quantidade'] ?>
                                        </td>
                                        <td>
                                            <form method="post" action="componentes/baixa_produto.php">
                                                <input type="hidden" name="id_produto" value="<?php echo $produto['id'] ?>">
                                                <input type="number" name="quantidade_baixa" value="0">
                                                <button type="submit" class="btn btn-primary"
                                                    class="button-estoque">Baixar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="componentes/devolucoes.php">
                                                <input type="hidden" name="id_produto" value="<?php echo $produto['id'] ?>">
                                                <input type="number" name="quantidade_devolucao" value="0">
                                                <button type="submit" class="btn btn-info"
                                                    class="button-estoque">Devolução</button>
                                        </td>
                                        <td><a href="componentes/excluir_produto.php?id=<?php echo $produto['id'] ?>"
                                                class="btn btn-danger" class="button-estoque">Excluir</a></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div id="popup" class="popup">
                            <div class="popup-content">
                                <span class="close" onclick="closePopup()">&times;</span>
                                <p id="popup-message">Quantidade superior a quantidade em estoque</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
        <script>
            
            function closePopup() {
                document.getElementById("popup").style.display = "none";
            }
            document.addEventListener("DOMContentLoaded", function() {
            <?php if($erro) : ?>
                
                document.getElementById("popup-message").textContent = "Não há produtos suficientes em estoque";
                document.getElementById("popup").style.display = "block";
            <?php endif; ?>
            });
        </script>
</body>

</html>