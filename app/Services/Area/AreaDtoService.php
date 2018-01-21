<?php

namespace App\Services\Area;


class AreaDtoService implements \App\Services\GenericServiceInterface
{
    const ALIAS = 'index';

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
            case 'weather':
                return $this->getIndexModuleDto($areaName);
                break;
            case 'places':
                return $this->getIndexModuleDto($areaName);
                break;
            case 'activity':
                return $this->getIndexModuleDto($areaName);
                break;
            case 'hotels':
                return $this->getIndexModuleDto($areaName);
                break;
            default:
                abort(404);
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

        if ($objectType === self::ALIAS) {
            $urlModel = \App\Models\Url::findByUri($objectIdentifier);
        } else {
            $urlModel = \App\Models\Url::findByUri($objectIdentifier . '/' . $objectType);
        }

        $viewName = 'default.area.' . $objectType;
        return view($viewName, [
            'title' => $urlModel->title,
            'metaTitle' => $urlModel->meta_title,
            'metaDescription' => $urlModel->meta_description,
            'dto' => $areaModuleDto
        ]);
    }
}
