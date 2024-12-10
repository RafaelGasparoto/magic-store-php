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


$sql_item_carrinho = "INSERT INTO item_carrinho (id_carrinho, id_card, quantidade) VALUES ($id_carrinho, $id_card, $quantidade)";
$conn->query($sql_item_carrinho);

header('location:home-page.php');
