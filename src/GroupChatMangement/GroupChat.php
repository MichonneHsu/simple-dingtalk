<?php

declare(strict_types=1);

namespace SimpleDingTalk\GroupChatMangement;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;
use Exception;

class GroupChat
{
    public static function get_qrcode(string $chatid,string $userid)
    {
        $uri = Url::$api['groupChatMangement']['get_qrcode'];
        $json = [
            'chatid' => $chatid,
            'userid'=>$userid
        ];
        return apiRequest::post($uri, $json);
    }
}