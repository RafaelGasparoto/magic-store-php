<?php
require_once '../conexao.php';

$id_card = $_POST['id'];
$id_user = $_SESSION['user_id'];
$quantidade = $_POST['quantidade'];
$id_carrinho = $_SESSION['id_carrinho'];

$sql = "SELECT id FROM item_carrinho WHERE id_carta = $id_card AND carrinho_id = $id_carrinho";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_item_carrinho = $row['id'];

    $sql = "UPDATE item_carrinho SET quantidade = $quantidade WHERE id = $id_item_carrinho";
    $conn->query($sql);
} else {
    $query = "INSERT INTO item_carrinho (carrinho_id, id_carta, quantidade) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iii', $id_carrinho, $id_card, $quantidade);
    $stmt->execute();
}


header('location:../home-page.php');
