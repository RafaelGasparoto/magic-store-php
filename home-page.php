<?php
require_once 'cart/get-selecteds-cards.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Cards Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .price {
            color: #28a745;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .imagem {
            margin: auto;
            object-fit: cover;
            height: 200px;
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color: #f7f7f7;
        }
    </style>
</head>

<body>
    <?php require_once 'header.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <?php foreach ($cards as $card) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card card-item shadow-sm">
                        <img src=<?= $card['imagem_url'] ?>
                            class="imagem">
                        <div class="card-body">
                            <h3 class="fw-bold"><?= $card['nome'] ?></h3>
                            <div><span class="fw-medium">Tipo: </span><span class="fw-small"><?= $card['tipo'] ?></span></div>
                            <div style="font-size: small;"><?= $card['descricao'] ?></div>
                            <div class="price">R$ <?= $card['preco'] ?></div>
                            <form action="cart/add-to-cart.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Disponível: <?= $card['quantidade'] ?></label>
                                    <input type="number" class="form-control"
                                        name="quantidade" placeholder="Quantidade" min="0" max="<?= $card['quantidade'] ?>" required value=<?= isset($card['selected_quantity']) ? $card['selected_quantity'] : 0 ?>>
                                </div>
                                <input type="hidden" name="id" value="<?= $card['id'] ?>">
                                <input type="hidden" name="nome" value="<?= $card['nome'] ?>">
                                <input type="hidden" name="preco" value="<?= $card['preco'] ?>">
                                <button type="submit" class="btn btn-primary w-100">Adicionar ao Carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>