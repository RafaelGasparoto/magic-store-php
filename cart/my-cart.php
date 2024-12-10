<?php require_once 'get-cart.php'; ?>

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home-page.php">Magic Cards Store</a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../saller-menu/list-card.php">Menu Vendedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../home-page.php">Cartas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="my-cart.php">Meu Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user-menu/user-details.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Meu Carrinho</h1>
        <div class="mb-3">
            <label for="tipo" class="form-label">Forma de Pagamento</label>
            <select class="form-select" id="tipo" name="tipo" required>
                <option value="" selected>Selecione a Forma de Pagamento</option>
                <option value="Criatura">Boleto</option>
                <option value="Feitiço">Pix</option>
                <option value="Artefato">Cartão</option>
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
                            <td class="price"><?= $item['preco'] ?></td>
                            <td class="price"><?= $item['preco'] * $item['quantidade'] ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <h4>Total: <span class="price">R$ <?= $total ?></span></h4>
            <button class="btn btn-success btn-lg w-100 mt-3">Confirmar Compra</button>
        </div>
    </div>

</body>

</html>