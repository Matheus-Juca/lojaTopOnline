<?php
session_start();
include_once("../database/conexaop.php");


// busca produtos cadastrados no database
$sql = "SELECT * FROM produtos";
$result = mysqli_query($conexao, $sql);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lojinha</title>
        <link rel="stylesheet" href="../asset/styles/pagina.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="header">
    <p class="logo">Top Online</p>
    <nav class="menu">
    <ul>
        <li><a href="../cadastros/cadastro.php">Login</a></li>
        <li><a href="../ecomerce/carrinhopg.php">Meu carrinho</a></li>
        <li><a href="#">logout</a></li>
    </ul>
</nav>
    <div class="cart">
        <p><i class= "fa fa-shopping-cart"></i> 
        <?php echo isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0; ?>
        </p>
    </div>
</div>
<div class="container">
    <div class="linha-produtos">

        <?php while($produto = mysqli_fetch_assoc($result)): ?>
        
        <form action="filtros.php" method="post">
            <div class="corpoProduto">

                <div class="imgProduto">
                    <img src="../assets/img/produtos/<?= $produto['imagem'] ?>" class="produtoMiniatura">

                </div>

                <div class="titulo">
                    <p><?= $produto['nome'] ?></p>
                    <h2>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></h2>

                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                    <input type="hidden" name="nome" value="<?= $produto['nome'] ?>">
                    <input type="hidden" name="preco" value="<?= $produto['preco'] ?>">
                    <input type="hidden" name="imagem" value="<?= $produto['imagem'] ?>">


                    <button type="submit" class="buttonAdd" name="addCarrinho">Comprar</button>
                </div>
            </div>
        </form>

        <?php endwhile; ?>

    </div>


</body>
</html>