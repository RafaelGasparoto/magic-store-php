<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de Usuário - Magic Cards Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="login.php">Magic Cards Store</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white text-center">
                        <h4>Cadastro de Usuário</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nome de usuário</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Digite seu nome de usuário" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Digite seu CPF" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Endereço de Entrega</label>
                            <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Digite seu endereço" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Digite seu e-mail" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Digite sua senha" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirmar Senha</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                    placeholder="Confirme sua senha" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>