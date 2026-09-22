<?php

define('ROOT_PATH', dirname(__DIR__));
ob_start();


//PER AGGIUNGERE PEZZI DI ALTRE PAGINE WEB BASTA INCLUDE        
//include dirname(__DIR__) . '/views/admin/metadata-form.php';
        
    

require_once ROOT_PATH . '/src/core/metadata.php';
require_once ROOT_PATH . '/src/core/website.php';
require_once ROOT_PATH . '/src/core/database.php';
require_once ROOT_PATH . '/src/core/body.php';

$myCms = new website();
