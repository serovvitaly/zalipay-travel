<?php

namespace App\Http\Controllers;

use App\Services\UrlHandlerInterface;

class BlogController extends Controller implements UrlHandlerInterface
{
    public function get(\App\Models\Url $urlModel)
    {
        return view('default.blog');
    }
}
