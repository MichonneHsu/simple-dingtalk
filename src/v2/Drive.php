<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class Drive
{
    public static function get_custom_space(string $chatid,array $msg)
    {
        $uri=Url::$api['Cspace']['get_custom_space'];
       


        $query =[
            'access_token' => AccessToken::getToken(),
            ''
        ];
        return apiRequest::get($uri, $query);
    }
}
