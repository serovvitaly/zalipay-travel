<?php

namespace App\Services;


class GenericService
{
    /**
     * @param $serviceAlias
     * @return GenericServiceInterface
     * @throws \Exception
     */
    public function serviceFactory($serviceAlias): GenericServiceInterface
    {
        switch ($serviceAlias) {
            case \App\Services\Area\AreaDtoService::ALIAS:
                return new \App\Services\Area\AreaDtoService;
            case \App\Services\GenericDocumentService::ALIAS:
                return new \App\Services\GenericDocumentService;
        }
        throw new \Exception('Служба не найдена, ' . $serviceAlias);
    }
}
