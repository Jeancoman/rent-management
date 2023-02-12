<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case "/":
        require __DIR__ . '/views/home_page.php';
        break;
    case "/login":
        require __DIR__ . '/views/login_page.php';
        break;
    case "/payments":
        require __DIR__ . '/views/payments_page.php';
        break;
    case "/settings":
        require __DIR__ . '/views/settings_page.php';
        break;
    case "/owner":
        require __DIR__ . '/views/home_page_owner.php';
        break;
    case "/owner/payments":
        require __DIR__ . '/views/payments_page_owner.php';
        break;
    case "/tenants":
        require __DIR__ . '/views/tenants_page.php';
        break;
    case "/shops":
        require __DIR__ . '/views/shops_page.php';
        break;
    case "/rent":
        require __DIR__ . '/views/rents_page.php';
        break;
}
