<?php
require_once '../conexao.php';

$selected_type = isset($_GET['type']) ? $_GET['type'] : null;
$sql = "SELECT * FROM carta" . ($selected_type !== null && $selected_type !== 'Todos' ? " WHERE tipo = '$selected_type'" : '');
$result = $conn->query($sql);
$cards = [];

if ($result->num_rows > 0) {
    $cards = $result->fetch_all(MYSQLI_ASSOC);
}

?>

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
    </style>
</head>

<body>
    <?php require_once '../header.php'; ?>

    <div class="container mt-4">
        <form action="list-card.php" method="GET">
            <div class="input-group mb-3">
                <select class="form-select" id="type" name="type">
                    <option value="Todos" <?= $selected_type === null ? 'selected' : '' ?>>Todos</option>
                    <option value="Criatura" <?= $selected_type === 'Criatura' ? 'selected' : '' ?>>Criatura</option>
                    <option value="Feitiço" <?= $selected_type === 'Feitiço' ? 'selected' : '' ?>>Feitiço</option>
                    <option value="Artefato" <?= $selected_type === 'Artefato' ? 'selected' : '' ?>>Artefato</option>
                    <option value="Encantamento" <?= $selected_type === 'Encantamento' ? 'selected' : '' ?>>Encantamento</option>
                    <option value="Planeswalker" <?= $selected_type === 'Planeswalker' ? 'selected' : '' ?>>Planeswalker</option>
                    <option value="Terreno" <?= $selected_type === 'Terreno' ? 'selected' : '' ?>>Terreno</option>
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Nome da Carta</th>
                        <th>Descrição</th>
                        <th>Tipo de Carta</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cards as $card) : ?>
                        <tr>
                            <td><img src=<?php echo $card['imagem_url']; ?>>
                            </td>
                            <td><?php echo $card['nome']; ?></td>
                            <td><?php echo $card['descricao']; ?></td>
                            <td><?php echo $card['tipo']; ?></td>
                            <td class="price">R$ <?php echo $card['preco']; ?></td>
                            <td class="stock"><?php echo $card['quantidade']; ?></td>
                            <td>
                                <form action="add-card.php" method="POST">
                                    <button type="submit" class="btn btn-warning">Editar Cadastro</button>
                                    <input type="hidden" name="id" value="<?= $card['id'] ?>">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>