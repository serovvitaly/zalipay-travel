<?php

namespace App\Services\Area;


class AreaIndexDto implements AreaModuleDtoInterface
{
    protected $title;

    public function __construct(string $areaName)
    {
        if (!in_array($areaName, ['egypt'])) {
            abort(404);
        }

        $this->title = trim($areaName);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function toArray(): array
    {
        return [];
    }
}
