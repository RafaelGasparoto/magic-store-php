<?php
$sql = "SELECT pedido.*, forma_pagamento.descricao AS forma_pagamento FROM pedido JOIN forma_pagamento ON pedido.forma_pagamento_id = forma_pagamento.id WHERE usuario_id = $_SESSION[user_id]";
$result = $conn->query($sql);
$orders = $result->fetch_all(MYSQLI_ASSOC);
