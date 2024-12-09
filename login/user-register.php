<?php
require '../conexao.php';


$is_not_same_password = '';
$cpf_error = '';
$email_error = '';
$other_errors = '';
$register_success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $is_not_same_password = "As senhas não coincidem.";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (nome, endereco, cep, numero, email, permissao, cpf, senha, cidade, bairro, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $permission = 1;
        $stmt->bind_param("sssisisssss", $_POST['name'], $_POST['address'], $_POST['cep'], $_POST['number'], $_POST['email'], $permission, $_POST['cpf'], $password_hash, $_POST['city'], $_POST['district'], $_POST['state']);


        try {
            $stmt->execute();
            $register_success = "Usuário cadastrado com sucesso!";
            $_POST = array();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                if (strpos($e->getMessage(), 'cpf') !== false) {
                    $cpf_error = "O CPF informado já está cadastrado.";
                } else if (strpos($e->getMessage(), 'email') !== false) {
                    $email_error = "O email informado já está cadastrado.";
                } else {
                    $other_errors = "Erro: Ocorreu um problema ao cadastrar.";
                }
            } else {
                $other_errors = "Erro inesperado: " . $e->getMessage();
            }
        }
    }
}
?>

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
                        <?php if ($register_success): ?>
                            <p style="color: green;"><?php echo $register_success; ?></p>
                        <?php endif; ?>
                        <form action="user-register.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"
                                    placeholder="Digite seu nome completo" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"
                                    placeholder="Digite seu e-mail" required>
                            </div>
                            <?php if ($email_error): ?>
                                <p style="color: red;"><?php echo $email_error; ?></p>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo isset($_POST['cpf']) ? $_POST['cpf'] : ''; ?>"
                                    placeholder="Digite seu CPF" required>
                                <?php if ($cpf_error): ?>
                                    <p style="color: red;"><?php echo $cpf_error; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>"
                                    placeholder="Digite seu endereço" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Número</label>
                                <input type="text" class="form-control" id="number" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>"
                                    placeholder="Digite seu endereço" required>
                            </div>
                            <div class="mb-3">
                                <label for="district" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="district" name="district" value="<?php echo isset($_POST['district']) ? $_POST['district'] : ''; ?>"
                                    placeholder="Digite seu Bairro" required>
                            </div>
                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo isset($_POST['cep']) ? $_POST['cep'] : ''; ?>"
                                    placeholder="Digite seu CEP" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>"
                                    placeholder="Digite sua Cidade" required>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="state" name="state" value="<?php echo isset($_POST['state']) ? $_POST['state'] : ''; ?>"
                                    placeholder="Digite seu Estado" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"
                                    placeholder="Digite sua senha" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmar Senha</label>
                                <input type="password" class="form-control" name="confirm_password" value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ''; ?>"
                                    placeholder="Confirme sua senha" required>
                                <?php if ($is_not_same_password): ?>
                                    <p style="color: red;"><?php echo $is_not_same_password; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark" name="btn-cadastrar">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>