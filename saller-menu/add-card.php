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
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="nomeCarta" class="form-label">Nome da Carta</label>
                                <input type="text" class="form-control" id="nomeCarta" name="nomeCarta"
                                    placeholder="Digite o nome da carta" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="3"
                                    placeholder="Digite a descrição da carta"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="" selected>Selecione o tipo</option>
                                    <option value="Criatura">Criatura</option>
                                    <option value="Feitiço">Feitiço</option>
                                    <option value="Artefato">Artefato</option>
                                    <option value="Encantamento">Encantamento</option>
                                    <option value="Planeswalker">Planeswalker</option>
                                    <option value="Terreno">Terreno</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="estoque" class="form-label">Estoque</label>
                                <input type="number" class="form-control" id="estoque" name="estoque"
                                    placeholder="Quantidade em estoque" required>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço</label>
                                <input type="text" class="form-control" id="preco" name="preco"
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