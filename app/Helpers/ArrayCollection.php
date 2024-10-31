<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

class ArrayCollection
{
    function array_filter_recursive($array)
    {
        foreach ($array as $key => &$value)
        {
            if (empty($value))
            {
                unset($array[$key]);
            }
        }
        return $array;
    }
}
