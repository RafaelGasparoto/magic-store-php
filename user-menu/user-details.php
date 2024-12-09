<?php
require_once '../conexao.php';
require_once 'get-user-details.php';
require_once 'get-order-history.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário - Magic Cards Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../home-page.php">Magic Cards Store</a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../saller-menu/list-card.php">Menu Vendedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../home-page.php">Cartas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart/my-cart.php">Meu Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="user-details.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4>Informações Pessoais</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nome:</strong> <?php echo $name ?></li>
                            <li class="list-group-item"><strong>E-mail:</strong> <?php echo $user['email'] ?></li>
                            <li class="list-group-item"><strong>Endereço:</strong> <?php echo $complete_address ?></li>
                        </ul>
                    </div>
                    <div class="card-footer"><button class="btn btn-primary">Editar Perfil</button></div>
                </div>
                <div class="mt-5">
                    <h4 class="text-center">Histórico de Pedidos</h4>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>N° Pedido</th>
                                    <th>Data</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Endereço de Entrega</th>
                                    <th>Valor Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                    <tr>
                                        <td>#<?= $order['id'] ?></td>
                                        <td><?= $order['data'] ?></td>
                                        <td><?= $order['id_forma_pagamento'] ?></td>
                                        <td><?= $order['endereco_entrega'] ?></td>
                                        <td><?= $order['total'] ?></td>
                                        <td><a href="../user-menu/purchase-detail.php" class="btn btn-sm btn-primary">Detalhes</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>