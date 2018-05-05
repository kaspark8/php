<?php
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
require APP . 'config/config.php';

session_start();

require APP . 'core/application.php';
require APP . 'core/controller.php';

$app = new Application();