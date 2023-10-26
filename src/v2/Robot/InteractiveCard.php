<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Robot;

use SimpleDingTalk\Config;
use SimpleDingTalk\v2\Url;

use SimpleDingTalk\util\robot\Sign;
use SimpleDingTalk\util\Time;

class InteractiveCard
{
    private $version='v1';
    public static function create(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['instances'];
        return ApiRequest::post($uri, $body);
    }
    public static function update(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['instances'];
        return ApiRequest::put($uri, $body);
    }
    public static function deliver(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['deliver'];
        return ApiRequest::post($uri, $body);
    }
    public static function createAndDeliver(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['createAndDeliver'];
        return ApiRequest::post($uri, $body);
    }
    public static function register(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['register'];
        return ApiRequest::post($uri, $body);
    }
    public static function spaces(array $body){
        $uri = Url::$api['interactiveCard'][self::$version]['spaces'];
        return ApiRequest::put($uri, $body);
    }
}