<?php
require_once __DIR__ . '/../classes/Carrinho.php';
require_once __DIR__ . '/../classes/Produto.php';
session_start();

$carrinho = new Carrinho();
$acao = $_GET['acao'] ?? null;

if ($acao === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $p = new Produto($_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['imagem']);
    $carrinho->adicionar($p);
}

if ($acao === 'remover') $carrinho->remover($_GET['id'] ?? 0);
if ($acao === 'mais') $carrinho->aumentar($_GET['id'] ?? 0);
if ($acao === 'menos') $carrinho->diminuir($_GET['id'] ?? 0);

header('Location: ../carrinho.php');
exit();
