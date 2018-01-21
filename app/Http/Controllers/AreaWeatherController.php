<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\Area\AreaDtoService;
use App\Services\UrlHandlerInterface;
use App\Widgets\AreaMonthsGridWidget;
use Illuminate\Http\Request;

class AreaWeatherController extends Controller implements UrlHandlerInterface
{
    /**
     * @param Url $urlModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function get(Url $urlModel)
    {
        $slugs = explode('/', $urlModel->url);
        $widgetAreaMonthsGrid = new AreaMonthsGridWidget($slugs[0]);
        return view('default.area.weather', [
            'title' => $urlModel->title,
            'metaTitle' => $urlModel->meta_title,
            'metaDescription' => $urlModel->meta_description,
            'widgetAreaMonthsGrid' => $widgetAreaMonthsGrid->render()
        ]);
    }
}
