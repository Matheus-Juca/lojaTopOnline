<?php

class Carrinho {
    public function __construct() {
        if (!isset($_SESSION)) session_start();
        if (!isset($_SESSION['carrinho'])) $_SESSION['carrinho'] = [];
    }

    public function adicionar($produto) {
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $produto['id']) {
                $item['quantidade']++;
                return;
            }
        }
        $_SESSION['carrinho'][] = $produto;
    }

    public function remover($id) {
        foreach ($_SESSION['carrinho'] as $i => $item) {
            if ($item['id'] == $id) unset($_SESSION['carrinho'][$i]);
        }
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    }

    public function aumentar($id) {
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $id) $item['quantidade']++;
        }
    }

    public function diminuir($id) {
        foreach ($_SESSION['carrinho'] as $i => &$item) {
            if ($item['id'] == $id) {
                $item['quantidade']--;
                if ($item['quantidade'] <= 0) unset($_SESSION['carrinho'][$i]);
                break;
            }
        }
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    }

    public function listar() {
        return $_SESSION['carrinho'];
    }

    public function total() {
        $t = 0;
        foreach ($_SESSION['carrinho'] as $item) {
            $t += $item['preco'] * $item['quantidade'];
        }
        return $t;
    }
}
?>