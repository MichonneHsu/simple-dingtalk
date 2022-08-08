<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2\Attendance;

use SimpleDingTalk\Config;
use SimpleDingTalk\v2\Url;
use SimpleDingTalk\v2\ApiRequest;

class Rule
{
    /**
     * 分页获取加班规则列表
     *
     * @param integer $pageNumber
     * @param integer $pageSize
     * @return mixed
     */
    public static function get(int $pageNumber, int $pageSize)
    {

        $uri = Url::$api['attendance'] . '/overtimeSettings';

        $params = [
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 分页获取补卡规则列表
     *
     * @param integer $pageNumber
     * @param integer $pageSize
     * @return mixed
     */
    public static function adjustments(int $pageNumber, int $pageSize)
    {

        $uri = Url::$api['attendance'] . '/adjustments';

        $params = [
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize
        ];
        $uri = ApiRequest::joinParams($uri, $params);
        return ApiRequest::get($uri);
    }
    /**
     * 批量获取加班规则设置
     *
     * @param array $overtimeSettingIds
     * @return mixed
     */
    public static function batchGet(array $overtimeSettingIds)
    {

        $uri = Url::$api['attendance'] . '/overtimeSettings/query';

        $body = [
            'overtimeSettingIds' => $overtimeSettingIds
        ];

        return ApiRequest::post($uri, $body);
    }
}
