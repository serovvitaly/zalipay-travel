<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WeatherHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $year = 2017;

        for ($month = 1; $month <= 12; $month++) {
            for ($day = 1; $day <= 31; $day++) {

                sleep(1);

                $dateStr = $year . ($month<10?'0':'') . $month . ($day<10?'0':'') . $day;

                $url = 'http://api.wunderground.com/api/df601c57e18f1b91/history_'.$dateStr.'/q/EG/Hurghada.json';

                $this->info($dateStr);

                $dataContent = file_get_contents($url);
                $dataJson = json_decode($dataContent);
                $dateMix = $dataJson->history->date;
                $observationAt = $dateMix->year . $dateMix->mon . $dateMix->mday;

                try {
                    $weather = new \App\Models\Weather;
                    $weather->country_iso = 'EG';
                    $weather->city_name = 'Hurghada';
                    $weather->observation_at = $observationAt;
                    $weather->data = $dataContent;
                    $weather->save();
                } catch (\Exception $e) {
                    continue;
                }
            }
        }
    }
}
