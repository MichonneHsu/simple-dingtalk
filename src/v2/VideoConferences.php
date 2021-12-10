<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;


/**
 * 会议
 */
class VideoConferences
{
    /**
     * 创建视频会议
     *
     * @param string $unionId
     * @param string $confTitle
     * @param array $inviteUserIds
     * @return mixed
     */
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
    /**
     * 关闭视频会议
     *
     * @param string $unionId
     * @param string $conferenceId
     * @return mixed
     */
    public static function stop(string $unionId, string $conferenceId)
    {


        $uri = Url::$api['videoConferences'] . "/{$conferenceId}?unionId={$unionId}";



        return ApiRequest::delete($uri);
    }
    /**
     * 批量查询视频会议信息
     *
     * @param array $conferenceIdList
     * @return mixed
     */
    public static function query(array $conferenceIdList)
    {


        $uri = Url::$api['videoConferences']."/query";

        $body=[
            'conferenceIdList'=>$conferenceIdList
        ];

        return ApiRequest::post($uri,$body);
    }
}
