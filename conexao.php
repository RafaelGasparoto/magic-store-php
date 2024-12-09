<?php
$host = 'localhost';
$dbname = 'magic-store';
$usuario = 'root';
$password = '';

$conn = new mysqli($host, $usuario, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " + $conn->connect_error);
}