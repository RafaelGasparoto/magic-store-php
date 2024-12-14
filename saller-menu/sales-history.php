<?php require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $initial_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
    $final_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
}

if ($initial_date == null) {
    $initial_date = date('Y-m-d', strtotime('-30 days'));
}
if ($final_date == null) {
    $final_date = date('Y-m-d', strtotime('now'));
}

$sql = "SELECT pedido.*, SUM(item_pedido.quantidade) AS total_quantidade FROM pedido
 JOIN item_pedido ON pedido.id = item_pedido.pedido_id
 WHERE data BETWEEN '$initial_date' AND '$final_date'
 GROUP BY pedido.id;";
$result = $conn->query($sql);
$orders = $result->fetch_all(MYSQLI_ASSOC);
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
    </style>
</head>

<body>
    <?php require_once '../header.php'; ?>

    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="card-title">Filtrar Pedidos</h5>
                <label for="filter_by">Filtar por:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="filter_by" id="filter_by_order" value="pedido">
                    <label class="form-check-label" for="filter_by_order">Pedido</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="filter_by" id="filter_by_card" value="carta">
                    <label class="form-check-label" for="filter_by_card">Carta</label>
                </div>
            </div>
            <div class="card-body">
                <form action="sales-history.php" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="start_date">Data Inicial:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="col-md-3">
                            <label for="end_date">Data Final:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                        <!-- <div class="col-md-3">
                            <label for="type">Tipo de carta:</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="" selected>Selecione o tipo</option>
                                <option value="Criatura">Criatura</option>
                                <option value="Feitiço">Feitiço</option>
                                <option value="Artefato">Artefato</option>
                                <option value="Encantamento">Encantamento</option>
                                <option value="Planeswalker">Planeswalker</option>
                                <option value="Terreno">Terreno</option>
                            </select>
                        </div> -->

                        <div class="col align-self-end">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>


        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Pedido</th>
                        <th>Data</th>
                        <th>Quantidade</th>
                        <th>Valor Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td>#<?php echo $order['id'] ?></td>
                            <td><?php echo $order['data'] ?></td>
                            <td><?php echo $order['total_quantidade'] ?></td>
                            <td class="fw-bold success">R$ <?php echo $order['total'] ?></td>
                            <td><a href="sale-detail.php" class="btn btn-primary">Detalhes</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>