<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\GenericDocumentService;
use App\Services\UrlHandlerInterface;

class PostController extends Controller implements UrlHandlerInterface
{
    public function index(int $postId)
    {
        return 'PostController-' . $postId;
    }

    public function get(Url $urlModel)
    {
        preg_match('/(\w+)(\d+)/', $urlModel->url, $matches);

        $objectType = $matches[1];
        $objectId = (int)$matches[2];

        return (new GenericDocumentService)->satisfy($objectType, $objectId);
    }
}
