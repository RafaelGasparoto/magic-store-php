<?php 
require 'get-cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_null($itens_on_cart)) {
        // Criar pedido
        foreach ($itens_on_cart as $item) {
            // Salvar cada item do carrinho no pedido
        }
    }
}

header('location: ../user-menu/user-details.php');