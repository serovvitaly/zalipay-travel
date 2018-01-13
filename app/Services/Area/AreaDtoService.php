<?php

namespace App\Services\Area;


class AreaDtoService implements \App\Services\GenericServiceInterface
{
    const ALIAS = 'areaIndex';

    /**
     * @param string $areaName
     * @param string $moduleName
     * @return \App\Services\Area\AreaModuleDtoInterface
     * @throws \Exception
     */
    public function getModuleDto(string $moduleName, string $areaName = null): AreaModuleDtoInterface
    {
        switch ($moduleName) {
            case self::ALIAS:
                return $this->getIndexModuleDto($areaName);
                break;
            default:
                throw new \Exception('Не найден DTO модуля: ' . $moduleName);
        }
    }

    public function getIndexModuleDto(string $areaName): AreaModuleDtoInterface
    {
        $dto = new AreaIndexDto($areaName);

        return $dto;
    }

    /**
     * @param $objectType
     * @param $objectIdentifier
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function satisfy($objectType, $objectIdentifier)
    {
        $areaDtoService = new \App\Services\Area\AreaDtoService;
        $areaModuleDto = $areaDtoService->getModuleDto($objectType, $objectIdentifier);

        if ($objectType == self::ALIAS) {
            $objectType = 'index';
        }
        $viewName = 'default.area.' . $objectType;
        return view($viewName, ['dto' => $areaModuleDto]);
    }
}
