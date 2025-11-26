<?php
require_once "../classes/carrinho.php";
session_start();
$carrinho = new Carrinho();
$itens = $carrinho->listar();
$total = $carrinho->total();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../asset/styles/cart.css">
  <title>Carrinho</title>
</head>
<body>
  <div class="cart-container">
    <h1>Carrinho</h1>
    <?php if (empty($itens)): ?>
      <p>Carrinho vazio. <a href="index.php">Voltar à loja</a></p>
    <?php else: ?>
      <table>
        <thead><tr><th>Imagem</th><th>Produto</th><th>Preço</th><th>Qtd</th><th>Subtotal</th><th></th></tr></thead>
        <tbody>
        <?php foreach($itens as $item): ?>
          <tr>
            <td><img src="../assets/img/produtos/<?= htmlspecialchars($item['imagem']) ?>"></td>
            <td><?= htmlspecialchars($item['nome']) ?></td>
            <td>R$ <?= number_format($item['preco'],2,',','.') ?></td>
            <td>
              <a href="controllers/CarrinhoController.php?acao=menos&id=<?= $item['id'] ?>">-</a>
              <?= $item['quantidade'] ?>
              <a href="controllers/CarrinhoController.php?acao=mais&id=<?= $item['id'] ?>">+</a>
            </td>
            <td>R$ <?= number_format($item['preco'] * $item['quantidade'],2,',','.') ?></td>
            <td><a href="controllers/CarrinhoController.php?acao=remover&id=<?= $item['id'] ?>">Remover</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <h2>Total: R$ <?= number_format($total,2,',','.') ?></h2>
      <a href="finalizar.php" class="btn-finalizar">Finalizar Compra</a>
    <?php endif; ?>
  </div>
</body>
</html>
