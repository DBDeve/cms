<?php


$method = $_SERVER['REQUEST_METHOD'];

$uri = '/admin/metadati';

$routes = [];

// REGISTRA LA ROUTE PER I METADATI
$routes['GET']['/admin/metadati'] = function () {
    include dirname(__DIR__) . '/views/admin/metadata-form.php';
};

// DISPATCH
if (isset($routes[$method][$uri])) {
    $routes[$method][$uri]();
    exit;
}

define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/src/core/metadata.php';
require_once ROOT_PATH . '/src/core/website.php';
require_once ROOT_PATH . '/src/core/database.php';
require_once ROOT_PATH . '/src/core/header.php';
require_once ROOT_PATH . '/src/core/footer.php';

$myCms = new website();
