<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\UrlHandlerInterface;

class SitemapController extends Controller implements UrlHandlerInterface
{
    public function get(Url $urlModel)
    {
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
    }
}
