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
        return view('default.area.weather-month');
    }
}
