<?php

require_once 'controllers/UserController.php';

// Create userController object
$userController = new UserController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $userController->index();
        break;
    case 'view':
        $userController->view();
        break;
    default:
        echo "Error: Invalid action.";
        break;
}

