<?php
$sql = "SELECT * FROM pedido WHERE usuario_id = $_SESSION[user_id]";
$result = $conn->query($sql);
$orders = $result->fetch_all(MYSQLI_ASSOC);
