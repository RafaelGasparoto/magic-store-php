<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Vendas - Magic Cards Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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
            <a class="navbar-brand" href="../home-page.php">Magic Cards Store</a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="list-card.php">Cartas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-card.php">Adicionar Carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="sales-history.php">Histórico de Vendas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Histórico de Vendas</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Pedido</th>
                        <th>Data</th>
                        <th>Itens</th>
                        <th>Valor Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>29/11/2024</td>
                        <td>5 cartas</td>
                        <td class="price">R$ 750,00</td>
                        <td><a href="sale-detail.php" class="btn btn-primary">Detalhes</a></td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>28/11/2024</td>
                        <td>3 cartas</td>
                        <td class="price">R$ 500,00</td>
                        <td><button class="btn btn-primary">Detalhes</button></td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>27/11/2024</td>
                        <td>7 cartas</td>
                        <td class="price">R$ 1200,00</td>
                        <td><button class="btn btn-primary">Detalhes</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>