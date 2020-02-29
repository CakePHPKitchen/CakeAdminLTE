<?php

namespace AdminLTE\Utility;

class Colors
{
    public static function getRandomBGColor()
    {
        $colors = [
            'bg-aqua',
            'bg-black',
            'bg-blue',
            'bg-danger',
            'bg-fuchsia',
            'bg-green',
            'bg-info',
            'bg-yellow',
            'bg-red',
            'bg-gray',
            'bg-light-blue',
            'bg-maroon',
            'bg-navy'
        ];

        shuffle($colors);

        return $colors[0];
    }
}
