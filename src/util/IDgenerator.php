<?php

declare(strict_types=1);

namespace SimpleDingTalk\util;

use Godruoyi\Snowflake\Snowflake;

class IDgenerator
{

    public $sf = null;
    public  function __construct()
    {
        $this->sf = new Snowflake();
    }
    public function setStartTimeStamp()
    {

        $this->sf->setStartTimeStamp(time() * 1000);

        return  $this;
    }
    public function make()
    {
        return  $this->sf->id();
    }
}
