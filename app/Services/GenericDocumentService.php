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

        $data = \App\Models\Document::findOrFail($objectIdentifier)->toArray();
        $data['content'] = $parsedown->text($data['content']);
        $content = view('default.document', $data);
        $memKey = '/' . $objectType . $objectIdentifier;
        (new \Memcached())->add($memKey, (string)$content);
        header('Content-Source: origin');
        return $content;
    }
}