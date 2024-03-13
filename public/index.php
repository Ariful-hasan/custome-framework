<?php

declare(strict_types = 1);

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


use App\Http\Controllers\BaseController;

require_once __DIR__ . '/../vendor/autoload.php';
// echo __DIR__ . '/../';

phpinfo();

$hello = new BaseController();
echo $hello->hello();