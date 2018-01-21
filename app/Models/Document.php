<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public static function findByUriAndType(string $uri, string $type)
    {
        return self::where([
            ['uri', '=', trim($uri)],
            ['type', '=', trim($type)],
        ])->first();
    }
}
