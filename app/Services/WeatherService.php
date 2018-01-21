<?php

namespace App\Services;


class WeatherService
{
    public function getChartData(int $month)
    {
        $monthStr = $month<10?'0'.$month:(string)$month;

        $history = \App\Models\Weather::where([
            ['observation_at', '>=', '2017'.$monthStr.'01'],
            ['observation_at', '<=', '2017'.$monthStr.'32'],
        ])->get();

        $labels = [];
        $datasets = [];
        $dataMix = [['День', 'Температура']];
        foreach ($history as $item) {
            $data = json_decode($item->data);
            $dailySummary = $data->history->dailysummary[0];
            $labels[] = $dailySummary->date->mday;
            $datasets[] = (int)$dailySummary->meantempm;
            $dataMix[] =[
                (int)$dailySummary->date->mday,
                (int)$dailySummary->meantempm,
            ];
        }

        return [
            'labels' => json_encode($labels),
            'datasets' => json_encode($datasets),
            'data' => json_encode($dataMix),
        ];
    }
}
