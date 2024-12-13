<?php
require_once '../conexao.php';
session_start();

$sql = "INSERT INTO carta (nome, descricao, tipo, preco, quantidade, imagem_url) VALUES (?, ?, ?, ?, ?, ?)";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdis", $_POST['card_name'], $_POST['description'], $_POST['type'], $_POST['price'], $_POST['quantity'], $_POST['image_url']);
    $stmt->execute();
    $_SESSION['success'] = 'Carta cadastrada com sucesso!';
} catch (Exception $error) {
    $_SESSION['error'] = 'Erro ao adicionar carta: ' . $erro->getMessage();
}

header('location:add-card.php');
