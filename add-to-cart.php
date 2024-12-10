<?php
require_once 'conexao.php';
session_start();

$id_card = $_POST['id'];
$id_user = $_SESSION['user_id'];
$quantidade = $_POST['quantidade'];
$id_carrinho = null;

$sql_carrinho = "SELECT id FROM carrinho WHERE id_usuario = $id_user";

$result = $conn->query($sql_carrinho);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_carrinho = $row['id'];
} else {
    $sql_carrinho = "INSERT INTO carrinho (id_usuario) VALUES ($id_user)";
    $conn->query($sql_carrinho);
    $id_carrinho = $conn->insert_id;
}

$sql = "SELECT quantidade FROM item_carrinho WHERE id = $id_card AND carrinho_id = $id_carrinho";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "UPDATE item_carrinho SET quantidade = $quantidade WHERE id = $id_card AND carrinho_id = $id_carrinho";
    $conn->query($sql);
} else {
    $query = "INSERT INTO item_carrinho (carrinho_id, id_carta, quantidade) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iii', $id_carrinho, $id_card, $quantidade);
    $stmt->execute();
}


header('location:home-page.php');
