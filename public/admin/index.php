<?php


define('ROOT_PATH', dirname(__DIR__, 2));
ob_start();


require_once ROOT_PATH . '/src/core/admin.php';
require_once ROOT_PATH . '/src/core/database.php';


$admin = new admin();

?>