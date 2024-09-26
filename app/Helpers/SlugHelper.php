<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SlugHelper
{
    public static function generateSlug($string, $separator = '-')
    {
        $slug = Str::slug($string, '-');
        return $slug;
    }
}
