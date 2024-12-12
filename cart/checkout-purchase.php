<?php 
require 'get-cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (!is_null($itens_on_cart)) {
            $sql = "SELECT * FROM usuario WHERE id = $_SESSION[user_id]";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            $endereco_entrega = $user['endereco'] . ', ' . $user['cep'] . ', ' . $user['numero'] . ', ' . $user['bairro'] . ', ' . $user['cidade'] . ', ' . $user['estado'];
            
            $sql = "INSERT INTO pedido (usuario_id, endereco_entrega, total, id_forma_pagamento) VALUES ($user[id], '$endereco_entrega', $total, 1)";
            $conn->query($sql);
    
            $sql = "SELECT id FROM pedido WHERE usuario_id = $user[id] ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);
            $pedido_id = $result->fetch_assoc()['id'];
    
            foreach ($itens_on_cart as $item) {
                $sql = "INSERT INTO item_pedido (pedido_id, carta_id, quantidade, valor) VALUES ($pedido_id, $item[id_carta], $item[quantidade], $item[preco])";
                $conn->query($sql);
            }
        }
    } catch (Exception $error) {
        echo $error->getMessage();
        exit();
    }
}

header('location: ../user-menu/user-details.php');