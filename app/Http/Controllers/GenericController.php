<?php

namespace App\Http\Controllers;

use App\Services\Area\AreaDtoService;

class GenericController extends Controller
{
    /**
     * @param $objectType
     * @param $objectId
     * @return mixed
     * @throws \Exception
     */
    public function satisfyDocument(string $objectType, int $objectId)
    {
        return (new \App\Services\GenericDocumentService)->satisfy($objectType, $objectId);
    }

    /**
     * @param $areaAlias
     * @param string $contentModule
     * @return mixed
     * @throws \Exception
     */
    public function satisfyArea(string $areaAlias, string $contentModule = AreaDtoService::ALIAS)
    {
        return (new \App\Services\Area\AreaDtoService)->satisfy($contentModule, $areaAlias);
    }
}
