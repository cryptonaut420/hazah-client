<?php

namespace Tokenly\HazahClient\Facade;

use Exception;
use Illuminate\Support\Facades\Facade;

/**
* 
*/
class Hazah extends Facade
{
    
    protected static function getFacadeAccessor() { 
        return '\Tokenly\HazahClient\Hazah';
    }

}
