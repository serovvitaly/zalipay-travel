<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\UrlHandlerInterface;

class IndexController extends Controller implements UrlHandlerInterface
{
    public function get(Url $urlModel)
    {
        return view('default.index', [
            'items' => \App\Models\Document::where('is_active', 1)->paginate(10),
        ]);
    }
}
