<?php
require_once '../conexao.php';
$error_message = '';
$insert_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO carta (nome, descricao, tipo, preco, quantidade, imagem_url) VALUES (?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssidis", $_POST['card_name'], $_POST['description'], $_POST['type'], $_POST['price'], $_POST['quantity'], $_POST['image_url']);
        $stmt->execute();
        $insert_message = 'Carta cadastrada com sucesso!';
    } catch (Exception $error) {
        $error_message = $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cartas - Magic Cards Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../home-page.php">Magic Cards Store</a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="list-card.php">Cartas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="add-card.php">Adicionar Carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sales-history.php">Histórico de Vendas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4>Cadastro de Cartas</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($error_message): ?>
                            <p style="color: red;"><?php echo $email_error; ?></p>
                        <?php endif; ?>
                        <?php if ($insert_message): ?>
                            <p style="color: green;"><?php echo $insert_message; ?></p>
                        <?php endif; ?>
                        <form action="add-card.php" method="POST">
                            <div class="mb-3">
                                <label for="card_name" class="form-label">Nome da Carta</label>
                                <input type="text" class="form-control" id="card_name" name="card_name"
                                    placeholder="Digite o nome da carta" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="Digite a descrição da carta"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="" selected>Selecione o tipo</option>
                                    <option value="1">Criatura</option>
                                    <option value="2">Feitiço</option>
                                    <option value="3">Artefato</option>
                                    <option value="4">Encantamento</option>
                                    <option value="5">Planeswalker</option>
                                    <option value="6">Terreno</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantidade</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    placeholder="Quantidade" required>
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Imagem URL</label>
                                <input type="text" class="form-control" id="image_url" name="image_url"
                                    placeholder="URL da imagem">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Preço</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Preço da carta (R$)" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Cadastrar Carta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>