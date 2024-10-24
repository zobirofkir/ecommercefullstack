<?php

namespace App\Services\Constructor;

interface BlogConstructor
{
    public function index();

    
    public function show($slug);
}