<?php
require_once '../conexao.php';
$filter_by;
$selected_type = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $initial_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
    $final_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
    $filter_by = isset($_GET['filter_by']) ? $_GET['filter_by'] : 'pedido';
}

if ($initial_date == null) {
    $initial_date = date('Y-m-d', strtotime('-30 days'));
}
if ($final_date == null) {
    $final_date = date('Y-m-d', strtotime('now'));
}

if ($filter_by == 'pedido') {
    $sql = "SELECT pedido.*, SUM(item_pedido.quantidade) AS total_quantidade FROM pedido
    JOIN item_pedido ON pedido.id = item_pedido.pedido_id
    WHERE data BETWEEN '$initial_date' AND '$final_date'
    GROUP BY pedido.id;";
    $result = $conn->query($sql);
    $orders = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $sql = "SELECT item_pedido.carta_id, carta.nome, carta.imagem_url, carta.preco, SUM(item_pedido.quantidade) AS total_quantidade 
    FROM item_pedido
    JOIN carta ON item_pedido.carta_id = carta.id 
    JOIN pedido ON item_pedido.pedido_id = pedido.id
    WHERE pedido.data BETWEEN '$initial_date' AND '$final_date'
    GROUP BY carta_id";
    $result = $conn->query($sql);
    $cards = $result->fetch_all(MYSQLI_ASSOC);
}


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
            <form action="sales-history.php" method="GET">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="filter_by">Filtar por:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filter_by" id="filter_by_order" value="pedido" <?php echo $filter_by == 'pedido' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="filter_by_order">Pedido</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filter_by" id="filter_by_card" value="carta" <?php echo $filter_by == 'carta' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="filter_by_card">Carta</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="start_date">Data Inicial:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $initial_date; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">Data Final:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $final_date; ?>">
                        </div>
                    </div>
                    <div class="row text-end">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <?php if ($filter_by == 'carta') : ?>
                        <tr>
                            <th></th>
                            <th>Nome da Carta</th>
                            <th>Quantidade</th>
                            <th>Preço Unitário</th>
                            <th>Preço Total</th>
                        </tr>
                    <?php endif; ?>
                    <?php if ($filter_by == 'pedido') : ?>
                        <tr>
                            <th>Pedido</th>
                            <th>Data</th>
                            <th>Quantidade</th>
                            <th>Valor Total</th>
                            <th></th>
                        </tr>
                    <?php endif; ?>
                </thead>
                <tbody>
                    <?php if ($filter_by == 'pedido') foreach ($orders as $order) : ?>
                        <tr>
                            <td>#<?php echo $order['id'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($order['data'])) ?></td>
                            <td><?php echo $order['total_quantidade'] ?></td>
                            <td class="fw-bold text-success">R$ <?php echo $order['total'] ?></td>
                            <td>
                                <form action="order-detail.php" method="GET">
                                    <input type="hidden" name="id" value="<?php echo $order['id'] ?>">
                                    <button type="submit" class="btn btn-primary">Detalhes</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($filter_by == 'carta') foreach ($cards as $card) : ?>
                        <tr>
                            <td><img src=<?php echo $card['imagem_url'] ?>></td>
                            <td><?php echo $card['nome'] ?></td>
                            <td><?php echo $card['total_quantidade'] ?></td>
                            <td class="fw-bold text-success">R$ <?php echo $card['preco'] ?></td>
                            <td class="fw-bold text-success">R$ <?php echo $card['preco'] * $card['total_quantidade'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>