<?php

if (isset($_SESSION) == false) {
    session_start();
}

require_once './controllers/UsuarioController.php';
$controller = new UsuarioController();

// captura a ACTION
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// Rotas usando ACTION
if (isset($_SESSION['usuario_id'])) {
    // Rotas do usuário LOGADO
    switch ($action) {
        case 'logout':
            $controller->logout();
            break;
        default:
            // Redireciona para dashboard.php
            header('Location: dashboard.php');
            break;
    }
} else {
    // Rotas do usuário NÃO LOGADO
    switch ($action) {
        case 'entrar':
            include_once './views/entrar.php';
            break;
        case 'registrar':
            include_once './views/registrar.php';
            break;
        case 'contato':
            include_once './views/contato.php';
            break;
        case 'login':
            $controller->login($_POST);
            break;
        case 'signin':
            $controller->signin($_POST);
            break;
        default:
            // echo 'Página não encontrada.';
            include_once './views/home.php';
            break;
    }

    exit;
}
