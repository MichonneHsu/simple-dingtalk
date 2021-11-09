<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class User
{
    public static function get(string $unionId)
    {
        $uri = Url::$api['user']['get']."users/$unionId";
      
        return apiRequest::userGetReq($uri);
    }
}