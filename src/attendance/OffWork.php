<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;
use SimpleDingTalk\util\date\Time;
/**
 * 考勤假勤
 */
class OffWork
{
    
    public static function approve_alert(array $json)
    {
        $uri=Url::$api['attendance']['offWork']['approve_alert'];
       
        return apiRequest::post($uri, $json);
    }
    
}