<?php

define('DB', __DIR__.'/../db/deals.db');
setlocale(LC_ALL, 'fr_CH.UTF-8');


spl_autoload_register('autoload');

require dirname(__DIR__) . '/vendors/redbean/rb.php';

RedBean_ModelHelper::setModelFormatter(new lib\utils\ModelFormatter());

R::setup('sqlite:' . DB);

if (!file_exists(DB)) {
	require __DIR__ . '/setup.php';
}

function autoload($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require dirname(__DIR__) . '/' . $fileName;
}
