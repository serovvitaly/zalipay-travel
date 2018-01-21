<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Url
 * @property $url
 * @property $handler
 * @package App\Models
 */
class Url extends Model
{
    public static function findByUri(string $uri)
    {
        return self::where('url', trim($uri))->first();
    }
}
