<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Venda - Magic Cards Store</title>
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

    <div class="container mt-4">
        <h1 class="text-center mb-4">Detalhes da Venda</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Pedido: #001</h5>
                <p class="card-text">
                    <strong>Data:</strong> 29/11/2024<br>
                    <strong>Valor Total:</strong> <span class="price">R$ 750,00</span>
                </p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nome da Carta</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço Unitário</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img
                                src="https://repositorio.sbrauble.com/arquivos/in/magic/238/5f4243882b972-7qj4bk-nvs5g0-19055be5ac0bf0e333b42e1965c78eff.jpg">
                        </td>
                        <td>Black Lotus</td>
                        <td>1</td>
                        <td class="price">R$ 500,00</td>
                        <td class="price">R$ 500,00</td>
                    </tr>
                    <tr>
                        <td><img
                                src="https://repositorio.sbrauble.com/arquivos/in/magic/238/5f4243882b972-7qj4bk-nvs5g0-19055be5ac0bf0e333b42e1965c78eff.jpg">
                        </td>
                        <td>Mox Sapphire</td>
                        <td>2</td>
                        <td class="price">R$ 125,00</td>
                        <td class="price">R$ 250,00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>