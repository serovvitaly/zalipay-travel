<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function handle(Request $request)
    {
        return 22;

        $controller = app()->make(App\Http\Controllers\PostController::class);
        $arguments = [2];
        return  app()->call([$controller, 'index'], $arguments);
    }
}
