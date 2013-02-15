<?php
require("../controllers/controllers.php");   
$page = $_GET['page'];

$action = explode('_', $page);

$controller = ucfirst($action[1]) . "Controller";

$app = new $controller();
$app->$action[0]();