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
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="startDate">Data Inicial:</label>
                            <input type="date" class="form-control" id="startDate" name="startDate">
                        </div>
                        <div class="col-md-3">
                            <label for="endDate">Data Final:</label>
                            <input type="date" class="form-control" id="endDate" name="endDate">
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