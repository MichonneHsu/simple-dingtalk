<?php declare(strict_types=1);
namespace SimpleDingTalk;

class Extcontact{

    public static function create(array $contact)
    {
        $uri = Url::$api['extcontact']['create'];
        $json=$contact;
        return ApiRequest::post($uri, $json);
    }
    public static function remove(array $contact)
    {
        $uri = Url::$api['extcontact']['remove'];
        $json=$contact;
        return ApiRequest::post($uri, $json);
    }
    public static function update(array $contact)
    {
        $uri = Url::$api['extcontact']['update'];
        $json=$contact;
        return ApiRequest::post($uri, $json);
    }
    public static function list(array $contact)
    {
        $uri = Url::$api['extcontact']['list'];
        $json=$contact;
        return ApiRequest::post($uri, $json);
    }
    public static function listlabelgroups(array $contact)
    {
        $uri = Url::$api['extcontact']['listlabelgroups'];
        $json=$contact;
        return ApiRequest::post($uri, $json);
    }
    public static function get(array $contact)
    {
        $uri = Url::$api['extcontact']['get'];
        $json=$contact;
        return ApiRequest::post($uri, $json);
    }

}