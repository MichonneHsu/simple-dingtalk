<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

class Group{

      /**
     * 把chatId变为OpenConversationId
     *
     * @param string $chatId
     * @return mixed
     */
    public static function convertToOpenConversationId(string $chatId)
    {


        $uri = Url::$api['group']['convertToOpenConversationId'].'/'.$chatId.'/convertToOpenConversationId';
       
        return ApiRequest::post($uri);
    }
}