<?php 
require '../conexao.php';

$sql = "UPDATE carta SET nome = ?, descricao = ?, tipo = ?, preco = ?, quantidade = ?, imagem_url = ? WHERE id = ?";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdisi", $_POST['card_name'], $_POST['description'], $_POST['type'], $_POST['price'], $_POST['quantity'], $_POST['image_url'], $_POST['card_id']);
    $stmt->execute();
    $_SESSION['success'] = 'Carta atualizada com sucesso!';
} catch (Exception $error) {
    $_SESSION['error'] = 'Erro ao atualizar carta: ' . $error->getMessage();
}

header('location:add-card.php');
