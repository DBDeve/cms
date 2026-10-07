<?php


define('ROOT_PATH', dirname(__DIR__, 2));
ob_start();



require_once ROOT_PATH . '/src/core/database.php';

require_once ROOT_PATH . '/src/admin/admin.php';


$admin = new admin();

?>