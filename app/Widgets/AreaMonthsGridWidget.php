<?php

namespace App\Widgets;


class AreaMonthsGridWidget implements WidgetInterface
{
    protected $areaAlias;

    public function __construct(string $areaAlias)
    {
        $this->areaAlias = trim($areaAlias);
    }

    public function render(): string
    {
        $content = '112233';

        return $content;
    }
}
