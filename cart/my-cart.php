<?php
require_once 'get-cart.php';
require_once 'get-payment-method.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Carrinho - Magic Cards Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table img {
            width: 50px;
            height: 70px;
            object-fit: cover;
        }

        .price {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php require_once '../header.php'; ?>
    <form action="../cart/checkout-purchase.php" method="POST">
        <div class="container mt-4">
            <div class="mb-3">
                <label for="checkout" class="form-label">Forma de Pagamento</label>
                <select class="form-select" id="checkout" name="checkout" required>
                    <option value="" selected>Selecione a Forma de Pagamento</option>
                    <?php foreach ($payment_methods as $payment_method) : ?>
                        <option value="<?= $payment_method['id'] ?>"><?= $payment_method['descricao'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Endereço de entrega:</label>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th></th>
                            <th>Nome da Carta</th>
                            <th>Quantidade</th>
                            <th>Preço Unitário</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($itens_on_cart as $item) : ?>
                            <tr>
                                <td><img
                                        src="<?= $item['imagem_url'] ?>"></td>
                                <td><?= $item['nome'] ?></td>
                                <td><?= $item['quantidade'] ?></td>
                                <td>R$ <?= $item['preco'] ?></td>
                                <td class="price">R$ <?= $item['preco'] * $item['quantidade'] ?></td>
                                <td>
                                    <form action="../cart/remove-from-cart.php" method="POST">
                                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                        <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <h4>Total: <span class="price">R$ <?= $total ?></span></h4>
                <button type="submit" class="btn btn-success btn-lg w-100 mt-3">Confirmar Compra</button>
            </div>
        </div>
    </form>
</body>

</html>