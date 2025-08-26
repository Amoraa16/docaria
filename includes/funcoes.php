<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = [];
}

function adicionarAoCarrinho($id_produto) {
  if (!isset($_SESSION['carrinho'][$id_produto])) {
    $_SESSION['carrinho'][$id_produto] = 1;
  } else {
    $_SESSION['carrinho'][$id_produto]++;
  }
}

function removerDoCarrinho($id_produto) {
  if (isset($_SESSION['carrinho'][$id_produto])) {
    $_SESSION['carrinho'][$id_produto]--;
    if ($_SESSION['carrinho'][$id_produto] <= 0) {
      unset($_SESSION['carrinho'][$id_produto]);
    }
  }
}

function avaliarProduto($conn, $id_produto) {
  $conn->query("UPDATE produtos SET avaliacao = avaliacao + 1 WHERE id = $id_produto");
}
