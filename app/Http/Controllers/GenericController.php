<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\Area\AreaDtoService;
use App\Services\UrlHandlerInterface;

class GenericController extends Controller implements UrlHandlerInterface
{
    /**
     * @param Url $urlModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function get(Url $urlModel)
    {
        $slugs = explode('/', $urlModel->url);
        $areaAlias = $slugs[0];
        $contentModule = isset($slugs[1]) ? $slugs[1] : AreaDtoService::ALIAS;
        return (new AreaDtoService)->satisfy($contentModule, $areaAlias);
    }
}
