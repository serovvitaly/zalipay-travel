<?php

namespace App\Http\Controllers;

use App\Services\Area\AreaDtoService;
use App\Services\GenericService;

class GenericController extends Controller
{
    /**
     * @param $objectType
     * @param $objectId
     * @param GenericService $genericService
     * @return mixed
     * @throws \Exception
     */
    public function satisfyDocument(string $objectType, int $objectId, GenericService $genericService)
    {
        return $genericService
            ->serviceFactory($objectType)
            ->satisfy($objectType, $objectId);
    }

    /**
     * @param $areaAlias
     * @param string $contentModule
     * @param GenericService $genericService
     * @return mixed
     * @throws \Exception
     */
    public function satisfyArea(string $areaAlias, string $contentModule = AreaDtoService::ALIAS, GenericService $genericService)
    {
        return $genericService
            ->serviceFactory($contentModule)
            ->satisfy($contentModule, $areaAlias);
    }
}
