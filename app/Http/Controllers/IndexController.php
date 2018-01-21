<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\UrlHandlerInterface;

class IndexController extends Controller implements UrlHandlerInterface
{
    public function get(Url $urlModel)
    {
        return view('default.index', [
            'title' => $urlModel->title,
            'metaTitle' => $urlModel->meta_title,
            'metaDescription' => $urlModel->meta_description,
        ]);
    }
}
