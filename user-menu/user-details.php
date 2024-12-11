<?php
require_once '../conexao.php';

if (!isset($_SESSION)) {
    session_start();
}

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM usuario WHERE id = '$user_id'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$user = $stmt->get_result()->fetch_assoc();

$complete_address = $user['endereco'] . ', ' . $user['cep'] . ', ' . $user['numero'] . ', ' . $user['bairro'] . ', ' . $user['cidade'] . ', ' . $user['estado'];
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
                    <h4 class="text-center">Histórico de Compras</h4>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>N° Pedido</th>
                                    <th>Data</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade de Itens</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>15/11/2024</td>
                                    <td>R$ 120,00</td>
                                    <td>5</td>
                                    <td>
                                        <a href="../user-menu/purchase-detail.php"
                                            class="btn btn-sm btn-primary">Detalhes</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>20/11/2024</td>
                                    <td>R$ 200,00</td>
                                    <td>8</td>
                                    <td>
                                        <a href="../user-menu/purchase-detail.php"
                                            class="btn btn-sm btn-primary">Detalhes</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>