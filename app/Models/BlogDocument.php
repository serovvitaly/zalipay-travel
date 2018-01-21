<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDocument extends Model
{
    public static function getPaginateDocuments(int $paginate = 10)
    {
        //$blogDocuments = self::paginate($paginate);

        return \DB::table('blog_documents')
            ->join('documents', 'documents.id', '=', 'blog_documents.document_id')
            ->join('urls', 'urls.url', '=', 'documents.uri')
            ->simplePaginate($paginate);
    }
}
