<?php

declare(strict_types = 1);

use App\Http\Controllers\BaseController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

phpinfo();

// $hello = new BaseController();
// echo $hello->hello();