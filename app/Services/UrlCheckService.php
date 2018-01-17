<?php

namespace App\Services;


class UrlCheckService
{
    public function check($url, \Closure $closure)
    {
        $closure->call($this);
    }
}