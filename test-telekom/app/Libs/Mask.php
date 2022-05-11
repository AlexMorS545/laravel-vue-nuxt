<?php

namespace App\Libs;

class Mask
{
    public static function createMask(string $text): string
    {
        $str_arr = str_split($text);
        $pattern = ['/[a-z]/', '/[A-Z]/','/\d/', '/[-_@]/'];
        $replace = ['a', 'A', 'N', 'Z'];
        return implode('', preg_filter($pattern, $replace, $str_arr));
    }
}
