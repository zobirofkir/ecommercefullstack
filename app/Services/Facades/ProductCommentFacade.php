<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class ProductCommentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProductCommentService';
    }
}