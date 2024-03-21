<?php

declare(strict_types = 1);

use App\Http\Controllers\BaseController;
use App\lib\Facades\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$request = Request::getUrl();
var_dump($request);
phpinfo();

// $hello = new BaseController();
// echo $hello->hello();