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

        .card-item img {
            max-height: 300px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .price {
            color: #28a745;
            font-size: 1.1rem;
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
                        <a class="nav-link" href="saller-menu/list-card.php">Menu Vendedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="home-page.php">Cartas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="purchase/my-cart.php">Meu Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-menu/user-details.php">Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Cartas Disponíveis</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card card-item shadow-sm">
                    <img src="https://repositorio.sbrauble.com/arquivos/in/magic/238/5f4243882b972-7qj4bk-nvs5g0-19055be5ac0bf0e333b42e1965c78eff.jpg"
                        class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Black Lotus</h5>
                        <p class="card-text">Descrição para a carta</p>
                        <p class="card-text">Tipo carta</p>
                        <p class="price">R$ 150,00</p>
                        <a href="#" class="btn btn-primary w-100">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-item shadow-sm">
                    <img src="https://repositorio.sbrauble.com/arquivos/in/magic/316/5f4243bc98335-4i0tc6-vnmwr6-ed9993850686da44364b1bfb30061c15.jpg"
                        class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Mox Emerald</h5>
                        <p class="card-text">Descrição para a carta</p>
                        <p class="card-text">Tipo carta</p>
                        <p class="price">R$ 200,00</p>
                        <a href="#" class="btn btn-primary w-100">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-item shadow-sm">
                    <img src="https://repositorio.sbrauble.com/arquivos/in/magic/316/5f4243bc98335-4i0tc6-vnmwr6-ed9993850686da44364b1bfb30061c15.jpg"
                        class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Mox Emerald</h5>
                        <p class="card-text">Descrição para a carta</p>
                        <p class="card-text">Tipo carta</p>
                        <p class="price">R$ 200,00</p>
                        <a href="#" class="btn btn-primary w-100">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>