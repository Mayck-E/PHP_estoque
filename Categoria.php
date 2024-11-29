<?php
// Verificar se o usuário está logado
require_once './utils/auth.php';
checkLogin();

if (isset($_SESSION) == false) {
    session_start();
}

require_once './controllers/CategoriaController.php';

$controller = new CategoriaController();

$action = 'listar';
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}

// AÇÕES
switch ($action) {
    case 'listar':
        $controller->selectAll();
        break;
        case 'editando':
            if (isset($_GET['id'])) {
                $controller->selectById($_GET['id']);
            }
            break;
    case 'insert':
        $controller->insert($_POST);
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;
    case 'update':
        if (isset($_POST['id'])) {
            $controller->update($_POST);
        }
        break;
    default:
        echo 'Erro 404: Página não encontrada.';
        break;
}