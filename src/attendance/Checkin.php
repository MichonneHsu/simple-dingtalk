<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\AccessToken;
use SimpleDingTalk\apiRequest;
class Checkin
{
    public static function list(int $offset=0,int $size=10)
    {
        $uri=Url::$api['attendance']['getsimplegroups'];
      
        $json = [
            'offset' => $offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
}