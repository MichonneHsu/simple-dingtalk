<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;



class VideoConferences
{
    public static function start(string $unionId, string $confTitle, array $inviteUserIds)
    {


        $uri = Url::$api['videoConferences'];
        $body = [
            'userId' => $unionId,
            'confTitle' => $confTitle,
            'inviteUserIds' => $inviteUserIds
        ];


        return ApiRequest::post($uri, $body);
    }
    public static function stop(string $unionId, string $conferenceId)
    {


        $uri = Url::$api['videoConferences'] . "/{$conferenceId}?unionId={$unionId}";



        return ApiRequest::delete($uri);
    }
}
