<?php

namespace App\Http\Controllers;

class BaseController
{
    public function __construct()
    {
        
    }

    public function hello() : string
    {
        return 'Hello from base controller.';
    }
}