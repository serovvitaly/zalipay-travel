<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\UrlHandlerInterface;
use Illuminate\Http\Request;

class AreaMonthWeatherController extends Controller implements UrlHandlerInterface
{
    //
    public function get(Url $urlModel)
    {
        $document = \App\Models\Document::findByUriAndType($urlModel->url, 'content');

        $parsedown = new \Parsedown;

        return view('default.area.weather-month', [
            'title' => $urlModel->title,
            'metaTitle' => $urlModel->meta_title,
            'metaDescription' => $urlModel->meta_description,
            'h1' => $document->title,
            'content' => $parsedown->text($document->content),
        ]);
    }
}
