<?php

require_once 'controllers/RestaurantController.php';

$controller = new RestaurantController();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'index':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;

    case 'update':
        $controller->update($_GET['id']);
        break;

    case 'delete':
        $controller->delete($_GET['id']);
        break;

    default:
        $controller->index();
        break;
}