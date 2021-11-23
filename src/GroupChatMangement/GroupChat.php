<?php

declare(strict_types=1);

namespace SimpleDingTalk\GroupChatMangement;
use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
use Exception;

class GroupChat
{
    public static function chat_create(array $json)
    {
        $uri = Url::$api['groupChatMangement']['chat_create'];
        // $json = [
        //     'name' => $name,
        //     'owner'=>$owner,
        //     'useridlist'=>$useridlist,
        //     'validationType'=>$validationType,
        //     'mentionAllAuthority'=>$mentionAllAuthority,
        //     'managementType'=>$managementType,
        //     'chatBannedType'=>$chatBannedType,
        //     'showHistoryType'=>$showHistoryType,
        //     'searchable'=>$searchable
        // ];
        return ApiRequest::post($uri, $json);
    }
    public static function get_qrcode(string $chatid,string $userid)
    {
        $uri = Url::$api['groupChatMangement']['get_qrcode'];
        $json = [
            'chatid' => $chatid,
            'userid'=>$userid
        ];
        return ApiRequest::post($uri, $json);
    }
}