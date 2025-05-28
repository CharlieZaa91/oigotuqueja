<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/database.php';
require_once '../controllers/UserController.php';
//require_once '../controllers/ComplaintController.php';

$controller = new UserController();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if (in_array($action, ['login', 'register', 'registerClient', 'registerCompany', 'choosePlan', 'dashboard'])) {
        $controller->$action();
    } else {
        //$complaintController = new ComplaintController();
        //$complaintController->$action();
    }
} else {
    require_once '../views/home/index.php';
}
?>