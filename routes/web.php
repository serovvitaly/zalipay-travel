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

Route::get('/', function () {
    return view('default.index', [
        'items' => \App\Models\Document::where('is_active', 1)->paginate(10),
    ]);
});

Route::get('/{objectType}{objectId}', function (string $objectType, int $objectId, \Parsedown $parsedown) {
    $data = \App\Models\Document::findOrFail($objectId)->toArray();
    $data['content'] = $parsedown->text($data['content']);
    $content = view('default.document', $data);
    $memKey = '/' . $objectType . $objectId;
    (new Memcached())->add($memKey, (string)$content);
    header('Content-Source: origin');
    return $content;
})->where([
    'objectType' => '[\w]+',
    'objectId' => '[\d]+',
]);
