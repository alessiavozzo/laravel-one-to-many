<?php

namespace App\Helpers;

class ColorGenerator{
    public static function randomColor(){
        return '#' . dechex(rand(0, 10000000));
    }
}