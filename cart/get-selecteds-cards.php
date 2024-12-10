<?php
require_once 'conexao.php';
session_start();

$sql = "SELECT * FROM carta WHERE quantidade > 0";
$result = $conn->query($sql);
$cards = [];
if ($result->num_rows > 0) {
    $cards = $result->fetch_all(MYSQLI_ASSOC);
}

// Busca itens no carrinho do usuário logado
$itens_on_cart = [];
$sql = "SELECT id FROM carrinho WHERE id_usuario = $_SESSION[user_id]";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_carrinho = $row['id'];
    $sql = "SELECT item_carrinho.id_carta, item_carrinho.quantidade FROM item_carrinho JOIN carrinho ON item_carrinho.carrinho_id = carrinho.id WHERE carrinho.id = $id_carrinho;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $itens_on_cart = $result->fetch_all(MYSQLI_ASSOC);
    }
}

// Se houver itens o carrinho atualiza a quantidade selecionada de cada item
foreach ($itens_on_cart as $item) {
    for ($i = 0; $i < count($cards); $i++) {
        if ($cards[$i]['id'] == $item['id_carta']) {
            $cards[$i]['selected_quantity'] = $item['quantidade'];
        }
    }
}
