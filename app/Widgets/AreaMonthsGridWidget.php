<?php

namespace App\Widgets;


use App\Models\Document;

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

        $months = [
            'jan',
            'feb',
            'mar',
            'apr',
            'may',
            'jun',
            'jul',
            'aug',
            'sep',
            'oct',
            'nov',
            'dec',
        ];

        $uris = [];
        foreach ($months as $month) {
            $uris[] = $this->areaAlias . '/weather/' . $month;
        }

        $documents = Document::where('type', 'content')->whereIn('uri', $uris)->get();

        foreach ($documents as $document) {
            //
        }

        return view('default.widgets.area-months-grid.index', [
            'documents' => $documents,
        ]);
    }
}
