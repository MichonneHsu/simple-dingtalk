<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;

use SimpleDingTalk\apiRequest;
class VacationManagement
{
    public static function list(int $offset=0,int $size=10)
    {
        $uri=Url::$api['attendance']['vacationManagement']['getsimplegroups'];
      
        $json = [
            'offset' => $offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
}