<?php

namespace App\Services;


class GenericDocumentService implements GenericServiceInterface
{
    const ALIAS = 'post';

    public function satisfy($objectType, $objectIdentifier)
    {
        if ($objectType !== 'post') {
            abort(404);
        }

        $parsedown = new \Parsedown;

        $document = \App\Models\Document::findOrFail($objectIdentifier);
        $url = \App\Models\Url::findByUri('post'. $objectIdentifier);
        $content = view('default.document', [
            'h1' => $document->title,
            'title' => $url->title,
            'metaTitle' => $url->meta_title,
            'metaDescription' => $url->meta_description,
            'content' => $parsedown->text($document->content),
        ]);
        $memKey = '/' . $objectType . $objectIdentifier;
        (new \Memcached())->add($memKey, (string)$content);
        header('Content-Source: origin');
        return $content;
    }
}