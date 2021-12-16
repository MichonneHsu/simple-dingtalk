<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;


/**
 * 服务群
 */
class ServiceGroup
{
    public static function create(array $body)
    {
        $uri = Url::$api['serviceGroup'].'/groups';
        return ApiRequest::post($uri, $body);
    }
}