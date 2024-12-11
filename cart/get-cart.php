<?php
require_once '../conexao.php';
session_start();

// Busca itens no carrinho do usuário logado
$itens_on_cart = [];
$total = 0;
$sql = "SELECT id FROM carrinho WHERE id_usuario = $_SESSION[user_id]";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_carrinho = $row['id'];
    $sql = "SELECT item_carrinho.id, item_carrinho.id_carta, item_carrinho.quantidade, carta.preco, carta.nome, carta.imagem_url FROM item_carrinho " .
    "JOIN carrinho ON item_carrinho.carrinho_id = carrinho.id " .
    "JOIN carta ON item_carrinho.id_carta = carta.id " . 
    "WHERE carrinho.id = $id_carrinho;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $itens_on_cart = $result->fetch_all(MYSQLI_ASSOC);
    }
}

foreach ($itens_on_cart as $item) {
    $total += $item['preco'] * $item['quantidade'];
}