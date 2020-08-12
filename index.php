<?php
session_unset();
require_once  'Controller/LoginController.php';
$controller = new LoginController();
$controller->mvcHandler();
