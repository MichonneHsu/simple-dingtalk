<?php

declare(strict_types=1);

namespace SimpleDingTalk\util;

class Random
{
    public $str = '';
    public  function alpabets(bool $capital = false)
    {
        if ($capital) {
            $this->str = implode('', range('A', 'Z'));
        } else {
            $this->str = implode('', range('a', 'z'));
        }

        return $this;
    }
    public function numbers(){
        $this->str = implode('', range(0, 9999));
    }
    public  function generate(int $length)
    {
        return mb_substr($this->str,0,$length);
    }
}
