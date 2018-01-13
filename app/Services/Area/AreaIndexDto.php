<?php

namespace App\Services\Area;


class AreaIndexDto implements AreaModuleDtoInterface
{
    protected $title;

    public function __construct(string $title)
    {
        $this->title = trim($title);
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
