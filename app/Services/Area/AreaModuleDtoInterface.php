<?php

namespace App\Services\Area;


interface AreaModuleDtoInterface
{
    public function getTitle(): string;

    public function toArray(): array;
}
