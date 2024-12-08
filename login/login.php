<?php
require "do_login.php"
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Magic Cards Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="login.php">Magic Cards Store</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Digite seu e-mail"
                                    required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                                <?php if ($email_error): ?>
                                    <p style="color: red;"><?php echo $email_error; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Digite sua senha" required value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                                <?php if ($password_error): ?>
                                    <p style="color: red;"><?php echo $password_error; ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" name="btn-entrar" class="btn btn-dark">Entrar</button>
                            </div>
                            <p class="text-center">
                                <a href="user-register.php" class="text-decoration-none">Cadastre-se aqui</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>