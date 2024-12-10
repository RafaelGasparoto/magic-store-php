<?php
require_once 'conexao.php';
session_start();

// Busca todas as cartas disponiveis
$sql = "SELECT * FROM carta WHERE quantidade > 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $cards = $result->fetch_all(MYSQLI_ASSOC);
}

// Busca itens no carrinho do usuário logado
$cards = [];
$itens_on_cart = [];
$sql = "SELECT id FROM carrinho WHERE id_usuario = $_SESSION[user_id]";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_carrinho = $row['id'];
    $sql = "SELECT item_carrinho.id_carta, item_carrinho.quantidade FROM item_carrinho JOIN carrinho ON item_carrinho.carrinho_id = carrinho.id WHERE carrinho.id = $id_carrinho;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $itens_on_cart = $result->fetch_all(MYSQLI_ASSOC);
    }
}

// Se houver itens o carrinho atualiza a quantidade selecionada de cada item
foreach ($itens_on_cart as $item) {
    for ($i = 0; $i < count($cards); $i++) {
        if ($cards[$i]['id'] == $item['id_carta']) {
            $cards[$i]['selected_quantity'] = $item['quantidade'];
        }
    }
}
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
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Cartas Disponíveis</h1>
        <div class="row">
            <?php foreach ($cards as $card) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-item shadow-sm">
                        <img src=<?= $card['imagem_url'] ?>
                            class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"><?= $card['nome'] ?></h5>
                            <p class="card-text"><?= $card['descricao'] ?></p>
                            <p class="card-text">Tipo: <?= $card['tipo'] ?></p>
                            <p class="card-text">Quantidade: <?= $card['quantidade'] ?></p>
                            <p class="price">R$ <?= $card['preco'] ?></p>
                            <form action="add-to-cart.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Quantidade</label>
                                    <input type="number" class="form-control"
                                        name="quantidade" placeholder="Quantidade" min="1" max="<?= $card['quantidade'] ?>" required value=<?= $card['selected_quantity'] ? $card['selected_quantity'] : 1 ?>>
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