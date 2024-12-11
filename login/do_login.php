<?php
session_start();
require_once '../conexao.php';

$password_error = '';
$email_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, nome, senha FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['nome'];

            // CRIA UM CARRINHO PARA O USUÁRIO
            // CASO JÁ EXISTA RECUPERA O ID E SALVA NA SESSION
            $sql_carrinho = "SELECT id FROM carrinho WHERE id_usuario = $user[id]";
            $result = $conn->query($sql_carrinho);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['id_carrinho'] = $row['id'];
            } else {
                $sql_carrinho = "INSERT INTO carrinho (id_usuario) VALUES ($user[id])";
                $conn->query($sql_carrinho);
                $_SESSION['id_carrinho'] = $conn->insert_id;
            }

            header("Location: ../home-page.php");
        } else {
            $password_error = "Senha incorreta.";
        }
    } else {
        $email_error = "Usuário não encontrado.";
    }
}
