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

Route::get('sitemap.xml', function () {
    $documents = \App\Models\Document::where('is_active', true)->get();
    $xml = new \DOMDocument('1.0', 'UTF-8');
    $urlSet = $xml->createElement('urlset');
    $urlSet->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
    /** @var \App\Models\Document $document */
    foreach ($documents as $document) {
        $pubDate = new \DateTime($document->created_at);
        $loc = 'http://travel.zalipay.com/post' . $document->id;
        $url = $xml->createElement('url');
        $url->appendChild($xml->createElement('loc', $loc));
        $url->appendChild($xml->createElement('lastmod', $pubDate->format('Y-m-d')));
        $url->appendChild($xml->createElement('priority', 0.8));
        $url->appendChild($xml->createElement('changefreq', 'monthly'));
        $urlSet->appendChild($url);
    }
    $xml->appendChild($urlSet);
    return response($xml->saveXml(), 200)
        ->header('Content-Type', 'text/xml');
});

/**
 * Строго соблюдать последовательность роутов,
 * ибо роут /{objectId}/{objectType?} будет перекрывать роут /{objectType}{objectId}
 */

$urlCheckService = new \App\Services\UrlCheckService;
$urlCheckService->check(Request::path(), function () {
    Route::get('{url}', 'UrlController@handle')->where(['url' => '.*']);
});

/*Route::get('/{objectType}{objectId}', 'GenericController@satisfyDocument')
    ->where(['objectType' => '[\w]+', 'objectId' => '[\d]+'])
    ->name('document');*/
//Route::get('/{areaAlias}/{contentModule?}', 'GenericController@satisfyArea')->name('area');

Route::get('post{postId}', 'PostController@index')->where(['postId' => '\d+']);

Route::get('/', function () {
    return view('default.index', [
        'items' => \App\Models\Document::where('is_active', 1)->paginate(10),
    ]);
});
