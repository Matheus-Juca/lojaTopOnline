<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_POST['addCarrinho'])) {
    // Valida
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $preco = isset($_POST['preco']) ? (float)str_replace(',', '.', $_POST['preco']) : 0.0;
    $imagem = isset($_POST['imagem']) ? trim($_POST['imagem']) : 'assets/img/produto-default.jpg';

    if ($id <= 0) {
        header("Location: ../index.php");
        exit();
    }

    // Verifica se já existe
    $existe = false;
    foreach ($_SESSION['carrinho'] as $idx => $item) {
        if ($item['id'] === $id) {
            $_SESSION['carrinho'][$idx]['quantidade'] += 1;
            $existe = true;
            break;
        }
    }

    // Se não existe adiciona
    if (!$existe) {
        $_SESSION['carrinho'][] = [
            'id' => $id,
            'nome' => $nome,
            'preco' => $preco,
            'imagem' => $imagem,
            'quantidade' => 1
        ];
    }

    header("Location: ../ecomerce/carrinhopg.php");
    exit();
}
