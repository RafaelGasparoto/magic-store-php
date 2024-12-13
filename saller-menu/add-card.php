<?php
require_once '../conexao.php';
session_start();
$error_message = '';
$success_message = '';
$card;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $sql = "SELECT * FROM carta WHERE id = $_POST[id]";
        $result = $conn->query($sql);
        $card = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['error'])) {
        $error_message = $_SESSION['error'];
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        $success_message = $_SESSION['success'];
        unset($_SESSION['success']);
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
    <?php require_once '../header.php'; ?>

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
                        <?php if ($success_message): ?>
                            <p style="color: green;"><?php echo $success_message; ?></p>
                        <?php endif; ?>
                        <form action="<?php echo isset($card['id']) ? 'update-card.php' : 'create-card.php'; ?>" method="POST">
                            <div class="mb-3">
                                <label for="card_name" class="form-label">Nome da Carta</label>
                                <input type="text" class="form-control" id="card_name" name="card_name"
                                    placeholder="Digite o nome da carta" value="<?php echo isset($card['nome']) ? $card['nome'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="Digite a descrição da carta"><?php echo isset($card['descricao']) ? $card['descricao'] : ''; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="" <?= !isset($card['tipo']) ? 'selected' : '' ?>>Selecione o tipo</option>
                                    <option value="Criatura" <?= isset($card['tipo']) && $card['tipo'] === 'Criatura' ? 'selected' : '' ?>>Criatura</option>
                                    <option value="Feitiço" <?= isset($card['tipo']) && $card['tipo'] === 'Feitiço' ? 'selected' : '' ?>>Feitiço</option>
                                    <option value="Artefato" <?= isset($card['tipo']) && $card['tipo'] === 'Artefato' ? 'selected' : '' ?>>Artefato</option>
                                    <option value="Encantamento" <?= isset($card['tipo']) && $card['tipo'] === 'Encantamento' ? 'selected' : '' ?>>Encantamento</option>
                                    <option value="Planeswalker" <?= isset($card['tipo']) && $card['tipo'] === 'Planeswalker' ? 'selected' : '' ?>>Planeswalker</option>
                                    <option value="Terreno" <?= isset($card['tipo']) && $card['tipo'] === 'Terreno' ? 'selected' : '' ?>>Terreno</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantidade</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    placeholder="Quantidade" required value="<?php echo isset($card['quantidade']) ? $card['quantidade'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Imagem URL</label>
                                <input type="text" class="form-control" id="image_url" name="image_url"
                                    placeholder="URL da imagem" value="<?php echo isset($card['imagem_url']) ? $card['imagem_url'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Preço</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Preço da carta (R$)" required value="<?php echo isset($card['preco']) ? $card['preco'] : ''; ?>">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Cadastrar Carta</button>
                                <input type="hidden" name="card_id" value="<?php echo isset($card['id']) ? $card['id'] : ''; ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>