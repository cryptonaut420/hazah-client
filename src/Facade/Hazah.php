<?php

namespace Cryptonaut420\HazahClient\Facade;

use Exception;
use Illuminate\Support\Facades\Facade;

/**
* 
*/
class Hazah extends Facade
{
    
    protected static function getFacadeAccessor() { 
        return '\Cryptonaut420\HazahClient\Hazah';
    }

}
