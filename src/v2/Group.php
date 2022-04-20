<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

class Group{

    public static function convertToOpenConversationId(string $chatId)
    {


        $uri = Url::$api['document'];
        $body = [
            'chatId' => $chatId,
           
        ];

        return ApiRequest::post($uri, $body);
    }
}