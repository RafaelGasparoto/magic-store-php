<?php

if (!isset($_SESSION)) {
    session_start();
}

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM usuario WHERE id = '$user_id'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$user = $stmt->get_result()->fetch_assoc();

$complete_address = $user['endereco'] . ', ' . $user['cep'] . ', ' . $user['numero'] . ', ' . $user['bairro'] . ', ' . $user['cidade'] . ', ' . $user['estado'];
