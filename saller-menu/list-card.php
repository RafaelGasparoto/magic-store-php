<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cartas - Magic Cards Store</title>
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

        .stock {
            font-size: 0.9rem;
            color: #6c757d;
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
                        <a class="nav-link active" href="list-card.php">Cartas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-card.php">Adicionar Carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sales-history.php">Histórico de Vendas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Cartas Cadastradas</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Nome da Carta</th>
                        <th>Descrição</th>
                        <th>Tipo de Carta</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img
                                src="https://repositorio.sbrauble.com/arquivos/in/magic/238/5f4243882b972-7qj4bk-nvs5g0-19055be5ac0bf0e333b42e1965c78eff.jpg">
                        </td>
                        <td>Black Lotus</td>
                        <td>Descrição</td>
                        <td>Tipo de Carta</td>
                        <td class="price">R$ 150,00</td>
                        <td class="stock">5 unidades</td>
                        <td>
                            <button type="submit" class="btn btn-warning">Editar Cadastro</button>
                        </td>
                    </tr>
                    <tr>
                        <td><img
                                src="https://repositorio.sbrauble.com/arquivos/in/magic/316/5f4243bc98335-4i0tc6-vnmwr6-ed9993850686da44364b1bfb30061c15.jpg">
                        </td>
                        <td>Mox Emerald</td>
                        <td>Descrição</td>
                        <td>Tipo de Carta</td>
                        <td class="price">R$ 200,00</td>
                        <td class="stock">3 unidades</td>
                        <td>
                            <button type="submit" class="btn btn-warning">Editar Cadastro</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>