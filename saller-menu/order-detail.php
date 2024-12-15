<?php
require_once '../conexao.php';
if (!isset($_GET['id'])) {
    header('Location: sales-history.php');
    exit;
}

$id_order = $_GET['id'];

$sql = "SELECT pedido.*, forma_pagamento.descricao AS forma_pagamento FROM pedido JOIN forma_pagamento ON pedido.forma_pagamento_id = forma_pagamento.id WHERE pedido.id = $id_order";
$result = $conn->query($sql);
$order = $result->fetch_assoc();

if (!$order) {
    header('Location: purchase-history.php');
    exit;
}

$sql = "SELECT item_pedido.*, carta.nome, carta.imagem_url FROM item_pedido JOIN carta ON item_pedido.carta_id = carta.id WHERE pedido_id = $id_order ";
$result = $conn->query($sql);
$order_itens = $result->fetch_all(MYSQLI_ASSOC);

?>
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

        .table img {
            width: 50px;
            height: 70px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php require_once '../header.php'; ?>

    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="card-title">Pedido: <?php echo $order['id'] ?></h5>
                <div class="card-text"><span class="fw-bold">Data: </span> <?php echo date('d/m/Y', strtotime($order['data'])) ?> </div>
                <div class="card-text"><span class="fw-bold">Forma de Pagamento: </span> <?php echo $order['forma_pagamento'] ?> </div>
                <div class="card-text fw-bold"><span>Valor Total: </span> <span class="text-success">R$ <?php echo $order['total'] ?></span> </div>
                <div class="card-text"><span class="fw-bold">Endereço de Entrega: </span> <?php echo $order['endereco_entrega'] ?> </div>
            </div>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_itens as $item) : ?>
                    <tr>
                        <td><img src=<?php echo $item['imagem_url'] ?>></td>
                        <td><?php echo $item['nome'] ?></td>
                        <td><?php echo $item['quantidade'] ?></td>
                        <td>R$ <?php echo $item['valor'] ?></td>
                        <td class="fw-bold text-success">R$ <?php echo $item['valor'] * $item['quantidade'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>