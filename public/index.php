<?php

declare(strict_types = 1);

use App\Http\Controllers\BaseController;
use App\lib\Database;
use App\lib\Facades\Request;

require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

include_once __DIR__ .'/../app/config/constant.php';

// $request = Request::getUrl();
// var_dump($request);
// var_dump(Request::getBody());
// var_dump(Request::except(['id']));
$db = Database::connect();
var_dump($db);
var_dump(PDO_DNS);
phpinfo();

// $hello = new BaseController();
// echo $hello->hello();