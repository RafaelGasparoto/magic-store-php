<?php
require 'get-cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (!is_null($itens_on_cart)) {
            // INICIA TRANSAÇÃO PARA EVITAR VENDA DE QUANTIDADE ACIMA DO LIMITE
            $conn->begin_transaction();

            $sql = "SELECT * FROM usuario WHERE id = $_SESSION[user_id]";
            $checkout = $_POST['checkout'];
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            $endereco_entrega = $user['endereco'] . ', ' . $user['cep'] . ', ' . $user['numero'] . ', ' . $user['bairro'] . ', ' . $user['cidade'] . ', ' . $user['estado'];

            $sql = "INSERT INTO pedido (usuario_id, endereco_entrega, total, forma_pagamento_id) VALUES ($user[id], '$endereco_entrega', $total, $checkout)";
            $conn->query($sql);
            $pedido_id = $conn->insert_id;

            // BUSCA TODAS O ID E QUANTIDADE DISPONÍVEL DE CADA CARTA INSERIDA NO CARRINHO
            $sql = "SELECT carta.id, carta.quantidade FROM carta WHERE carta.id IN (SELECT item_carrinho.id_carta FROM item_carrinho WHERE item_carrinho.carrinho_id = $_SESSION[id_carrinho])";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                // BUSCA O INDEX DA CARTA NO CARRINHO
                $index = array_search($row['id'], array_column($itens_on_cart, 'id_carta'));

                // VERIFICA SE A CARTA X TEM A QUANTIDADE NECESSÁRIA DISPONÍVEL
                if ($row['quantidade'] > $itens_on_cart[$index]['quantidade']) {
                    $item = $itens_on_cart[$index];
                    $sql = "INSERT INTO item_pedido (pedido_id, carta_id, quantidade, valor) VALUES ($pedido_id, $item[id_carta], $item[quantidade], $item[preco])";
                    $conn->query($sql);
                }
            }


            // FAZ UPDATE DE CARTAS DISPONÍVEL DE ACORDO COM A CARTA DO CARRINHO
            $sql = "UPDATE carta 
            JOIN item_carrinho ON carta.id = item_carrinho.id_carta
            SET carta.quantidade = carta.quantidade - item_carrinho.quantidade
            WHERE item_carrinho.carrinho_id = $_SESSION[id_carrinho]";

            $conn->query($sql);

            $sql = "DELETE FROM item_carrinho WHERE carrinho_id = $_SESSION[id_carrinho]";
            $conn->query($sql);

            $conn->commit();
        }
    } catch (Exception $error) {
        $conn->rollback();
        echo $error->getMessage();
        exit();
    }
}

header('location: ../user-menu/user-details.php');
