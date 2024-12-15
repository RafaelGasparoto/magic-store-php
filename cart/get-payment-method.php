<?php
$sql = "SELECT * FROM forma_pagamento";
$result = $conn->query($sql);
$payment_methods = $result->fetch_all(MYSQLI_ASSOC);
