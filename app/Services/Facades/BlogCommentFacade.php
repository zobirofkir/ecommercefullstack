<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class BlogCommentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BlogCommentService';
    }
}