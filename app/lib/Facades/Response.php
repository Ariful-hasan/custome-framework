<?php 

namespace App\lib\Facades;

use App\lib\Facades\Facade;
use App\lib\Response as LibResponse;

class Response extends Facade
{
    /**
     * Get the registered name of the request facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): LibResponse
    {
        return new LibResponse();
    }
}