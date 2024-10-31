<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

class DataCollection
{
    public static function forget($array, array $keys)
    {
        $data =  $array->transform(function ($val) use ($keys) {
            Arr::forget($val, $keys);
            return $val;
        });

        return $data;
    }
}
