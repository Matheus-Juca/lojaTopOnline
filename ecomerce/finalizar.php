<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Finalização da Compra</title>
    <link rel="stylesheet" href="../asset/styles/finalizar.css">
</head>
<body>

<div class="container">
<?php
session_start();

if (empty($_SESSION['carrinho'])) {
    echo "<p>Carrinho vazio.</p>";
    echo '<p><a href="index.php">Voltar</a></p>';
    exit();
}

$total = 0.0;
foreach ($_SESSION['carrinho'] as $item) {
    $total += $item['preco'] * $item['quantidade'];
}


echo "<h1>Compra finalizada!</h1>";
echo "<p>Total pago: R$ " . number_format($total, 2, ',', '.') . "</p>";

// limpa carrinho
unset($_SESSION['carrinho']);

echo '<p><a href="index.php">Voltar à loja</a></p>';
?>
</div>

</body>
</html>
