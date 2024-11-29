<?php
//rota perfil
// Verificar se o usuário está logado
require_once './utils/auth.php';
checkLogin();

if (isset($_SESSION) == false) {
    session_start();
}

require_once './controllers/UsuarioController.php';

$controller = new UsuarioController();


$action = 'listar';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// AÇÕES
switch ($action) {
    // case 'editar':
    //     if (isset($_GET['id'])) {
    //         $controllerPro->editar($_GET['id']);
    //     }
    //     break;
    case 'listar':
        // $controller->selectAll();
        // include_once('./views/perfil.php');
        $controller->selectById($_SESSION['usuario_id']);
        break;


    // case 'editar':
    //     if (isset($_GET['id'])) {
    //         $controllerPro->editar($_GET['id']);
    //     }
    //     break;
    case 'update':
        $controller->update($_POST);
        break;
    // case 'delete':
    //     if (isset($_GET['id'])) {
    //         $controllerPro->delete($_GET['id']);
    //     }
    //     break;
    // case 'update':
    //     if (isset($_POST['id'])) {
    //         $controllerPro->update($_POST);
    //     }
    //     break;
    default:
        echo 'Erro 404: Página não encontrada.';
        break;
}


?>