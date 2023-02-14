<?php

require_once __DIR__ . '/router.php';

get('/', '/views/home_page.php');

get('/login', "/views/login_page.php");

if($_SESSION["user_type"] == "OWNER" || $_SESSION["user_type"] == "ADMINISTRATOR"){
    get('/payments', "/views/payments_page_owner.php");
} else {
    get('/payments', "/views/payments_page.php");
}

get("/settings", "/views/settings_page.php");

get('/tenants', "/views/tenants_page.php");

get('/chat', "/views/chat_page.php");

get('/rent', "/views/rents_page.php");

get('/chat/$chat_id', "/views/dynamic_chat_page.php");

any('/404', '/views/404.php');

