<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('post1', function () {
    return redirect('/egypt/weather/jul');
});

$urlService = new \App\Services\UrlService;
$urlService->check(Request::path(), function (\App\Models\Url $urlModel) {
    Route::get('{slugs}', function ($slugs = '/') use ($urlModel) {
        if ($slugs !== $urlModel->url) {
            abort(500);
        }
        return  $this->handle($urlModel);
    })
        ->where(['slugs' => '.*'])
    ;
});
