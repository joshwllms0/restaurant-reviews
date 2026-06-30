<?php
session_start();

require_once 'controllers/RestaurantController.php';
require_once 'controllers/ReviewController.php';

$controllerName = $_GET['controller'] ?? 'restaurant';
$action = $_GET['action'] ?? 'index';

if ($controllerName === 'review') {
    $controller = new ReviewController();
    $restaurantId = $_GET['restaurant_id'] ?? null;
    switch ($action) {
        case 'index':
            $controller->index($restaurantId);
            break;

        case 'create':
            $controller->create($restaurantId);
            break;

        case 'store':
            $controller->store($restaurantId);
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
            $controller->index($restaurantId);
            break;
    }
} 
else {
$controller = new RestaurantController();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'index':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'show':
        $controller->show($_GET['id']);
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
}}