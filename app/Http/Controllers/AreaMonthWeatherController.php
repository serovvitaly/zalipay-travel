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

        $weatherService = new \App\Services\WeatherService;

        $monthStr = substr($urlModel->url, -3);
        
        $months = [
            'jan' => 1,
            'feb' => 2,
            'mar' => 3,
            'apr' => 4,
            'may' => 5,
            'jun' => 6,
            'jul' => 7,
            'aug' => 8,
            'sep' => 9,
            'oct' => 10,
            'nov' => 11,
            'dec' => 12,
        ];

        return view('default.area.weather-month', [
            'title' => $urlModel->title,
            'metaTitle' => $urlModel->meta_title,
            'metaDescription' => $urlModel->meta_description,
            'h1' => $document->title,
            'content' => $parsedown->text($document->content),
            'chartData' => $weatherService->getChartData($months[$monthStr]),
        ]);
    }
}
