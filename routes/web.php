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

Route::get('/', function () {
    return view('default.index', [
        'items' => \App\Models\Document::where('is_active', 1)->paginate(10),
    ]);
});

Route::get('/{objectType}{objectId}', function (string $objectType, int $objectId, \Parsedown $parsedown) {
    $data = \App\Models\Document::findOrFail($objectId)->toArray();
    $data['content'] = $parsedown->text($data['content']);
    return view('default.document', $data);
})->where([
    'objectType' => '[\w]+',
    'objectId' => '[\d]+',
]);
