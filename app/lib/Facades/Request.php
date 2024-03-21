<?php 

namespace App\lib\Facades;

use App\lib\Request as LibRequest;

class Request extends Facade
{
     /**
     * Get the registered name of the request facade.
     *
     * @return string
     */
   protected static function getFacadeAccessor(): LibRequest
   {
       return new LibRequest();
   }
}