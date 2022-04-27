<?php

declare(strict_types=1);

namespace SimpleDingTalk\util;

class Random
{
    public static $str = '';
    public static function alpabets(bool $capital = false)
    {
        if ($capital) {
            self::$str  = implode('', range('A', 'Z'));
        } else {
            self::$str  = implode('', range('a', 'z'));
        }

        return new self;
    }
   
    public static function generate(int $length=6)
    {
        return mb_substr(self::$str,0,$length);
    }
}
