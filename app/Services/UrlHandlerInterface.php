<?php

namespace App\Services;


use App\Models\Url;

interface UrlHandlerInterface
{
    public function get(Url $urlModel);
}