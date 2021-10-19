<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class Url
{
    public static $api = [
        'domain' => 'https://api.dingtalk.com',
        'gettoken' => '/v1.0/oauth2/accessToken',
    ];

    public static function joinParams(string $uri, array $params): string
    {


        $url = $uri . '?' . http_build_query($params);

        return urldecode($url);
    }
}
