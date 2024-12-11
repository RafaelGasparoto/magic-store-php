<?php
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "DELETE FROM item_carrinho WHERE id = $_POST[item_id]";
    $conn->query($sql);
}

header("Location: ../cart/my-cart.php");
?>