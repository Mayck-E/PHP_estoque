<?php
//valida.php
if (isset($_SESSION) == false) {
    session_start();
}

require_once '../controllers/UsuarioControler.php';

$controller = new UsuarioController();

$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (isset($_SESSION['id_usuario']) || $action == 'login') {
    switch ($action) {
        case 'logout':
            $controller->logout();
            break;
        case 'login':
            if (isset($_POST['email']) && isset($_POST['senha'])) {
                $controller->login($_POST);
                $_SESSION['usuario_logado'] = true;
            }
            break;
        default:
            header('Location: ../index.php');
            break;
    }
} else {
    header('Location: ../entrar.php');
    exit;
}
?>