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
                    <tr>
                        <td><img src="https://repositorio.sbrauble.com/arquivos/in/magic/238/5f4243882b972-7qj4bk-nvs5g0-19055be5ac0bf0e333b42e1965c78eff.jpg"
                                alt="Carta 1"></td>
                        <td>Black Lotus</td>
                        <td>1</td>
                        <td class="price">R$ 200,00</td>
                        <td class="price">R$ 200,00</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Remover</button>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://repositorio.sbrauble.com/arquivos/in/magic/316/5f4243bc98335-4i0tc6-vnmwr6-ed9993850686da44364b1bfb30061c15.jpg"
                                alt="Carta 2"></td>
                        <td>Mox Emerald</td>
                        <td>1</td>
                        <td class="price">R$ 200,00</td>
                        <td class="price">R$ 200,00</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Remover</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <h4>Total: <span class="price">R$ 400,00</span></h4>
            <button class="btn btn-success btn-lg w-100 mt-3">Confirmar Compra</button>
        </div>
    </div>

</body>

</html>