<?php
require_once "autoload.php";
session_start();

$gestor = new GestorPrendas();
$controller = new ControllerPrendas($gestor);
$usuarioController = new UsuarioController($gestor);

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {
    case 'login':
        $usuarioController->login();
        break;
    case 'registro':
        $usuarioController->registro();
        break;
    case 'logout':
        $usuarioController->logout();
        break;
    case 'crear':
    case 'editar':
    case 'eliminar':
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?accion=login');
            exit;
        }
        if ($accion === 'crear') $controller->crear();
        if ($accion === 'editar') $controller->editar();
        if ($accion === 'eliminar') $controller->eliminar();
        break;
    case 'cambiar_color':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['fondo'] = $_POST['color'] ?? '#ffffff';
    }
    header("Location: index.php?accion=index");
    exit;
    break;
    default:
        $controller->index();
}