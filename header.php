<?php
if (isset($_SESSION['permission']) && $_SESSION['permission'] == 1) {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
    <a class="navbar-brand" href="/magic-store-php/home-page.php">Magic Cards Store</a>
    <div>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link  ' . ($_SERVER['REQUEST_URI'] == '/magic-store-php/home-page.php' ? 'active' : '') . '" href="/magic-store-php/home-page.php">Cartas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ' . ($_SERVER['REQUEST_URI'] == '/magic-store-php/cart/my-cart.php' ? 'active' : '') . '" href="/magic-store-php/cart/my-cart.php">Meu Carrinho</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ' . ($_SERVER['REQUEST_URI'] == '/magic-store-php/user-menu/user-details.php' ? 'active' : '') . '" href="/magic-store-php/user-menu/user-details.php">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/magic-store-php/logout.php">Sair</a>
            </li>
        </ul>
    </div>
</div>
</nav>';
} else {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
    <a class="navbar-brand" href="/magic-store-php/home-page.php">Magic Cards Store</a>
    <div>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link ' . ($_SERVER['REQUEST_URI'] == '/magic-store-php/saller-menu/list-card.php' ? 'active' : '') . '" href="/magic-store-php/saller-menu/list-card.php">Cartas Cadastradas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  ' . ($_SERVER['REQUEST_URI'] == '/magic-store-php/saller-menu/add-card.php' ? 'active' : '') . '" href="/magic-store-php/saller-menu/add-card.php">Cadastrar Carta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  ' . ($_SERVER['REQUEST_URI'] == '/magic-store-php/saller-menu/sales-history.php' ? 'active' : '') . '" href="/magic-store-php/saller-menu/sales-history.php">Histórico de Vendas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/magic-store-php/logout.php">Sair</a>
            </li>
        </ul>
    </div>
</div>
</nav>';
}
