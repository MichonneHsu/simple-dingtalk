<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use PDO;
use SimpleDingTalk\util\Time;
/**
 * 日程
 */
class Calendar
{   
    /**
     * 日程所属的日历ID，统一为primary，表示用户的主日历。
     *
     * @var string
     */
    private static $calendarId = 'primary';
    /**
     * 创建日程
     *
     * @param string $unionId
     * @param array $body
     * @return mixed
     */
    public static function create(string $unionId, array $body)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . '/events';
        $body = self::date_parse($body);
        
        return ApiRequest::post($uri, $body);
    }
    /**
     * 删除日程
     *
     * @param string $unionId
     * @param string $id
     * @return mixed
     */
    public static function remove(string $unionId, string $id)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";


        return ApiRequest::delete($uri);
    }
    /**
     * 修改日程
     *
     * @param string $unionId
     * @param string $id
     * @param array $body
     * @return mixed
     */
    public static function update(string $unionId, string $id, array $body)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";

        $body = self::date_parse($body);
        return ApiRequest::put($uri, $body);
    }
    /**
     * 查询单个日程详情
     *
     * @param string $unionId
     * @param string $id
     * @return mixed
     */
    public static function get_details( string $unionId,string $id)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";


        return ApiRequest::get($uri);
    }
    /**
     * 查询日程列表
     *
     * @param string $unionId
     * @param array $query
     * @return mixed
     */
    public static function get_list(string $unionId, array $query)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events";

        if (array_key_exists('timeMin', $query)) {
            $timeMin = $query['timeMin'];
            $query['timeMin'] = Time::setDate($timeMin)->format('Y-m-d\TH:i:s\Z');
        }
        if (array_key_exists('timeMax', $query)) {
            $timeMax = $query['timeMax'];
            $query['timeMax'] = Time::setDate($timeMax)->format('Y-m-d\TH:i:s\Z');
        }
        $uri = ApiRequest::joinParams($uri, $query);

        return ApiRequest::get($uri);
    }
    /**
     * 添加日程参与者
     *
     * @param string $unionId
     * @param string $id
     * @param array $attendeesToAdd
     * @return mixed
     */
    public static function add_attendees(string $unionId,string $id , array $attendeesToAdd)
    {

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/attendees";
        $body = [
            'attendeesToAdd' =>  $attendeesToAdd

        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 删除日程参与者
     *
     * @param string $unionId
     * @param string $id
     * @param array $attendeesToRemove
     * @return mixed
     */
    public static function remove_attendees(string $unionId,string $id , array $attendeesToRemove)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/attendees/batchRemove";
        $body = [
            'attendeesToRemove' =>$attendeesToRemove
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 设置日程响应邀请状态
     *
     * @param string $unionId
     * @param string $id
     * @param string $responseStatus
     * @return mixed
     */
    public static function respond(string $unionId, string $id, string $responseStatus)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/respond";
        $body = [
            'responseStatus' => $responseStatus
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 获取用户忙闲信息
     *
     * @param string $unionId
     * @param array $userIds
     * @param string $startTime
     * @param string $endTime
     * @return mixed
     */
    public static function querySchedule(string $unionId, array $userIds, string $startTime, string $endTime)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/querySchedule";

        $startTime = Time::setDate($startTime)->format('c');
        $endTime = Time::setDate($endTime)->format('c');
        $body = [
            'userIds' => $userIds,
            'startTime' => $startTime,
            'endTime' => $endTime
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 查看单个日程的签到详情
     *
     * @param string $unionId
     * @param string $id
     * @param string $maxResults
     * @param string $type
     * @param string $nextToken
     * @return mixed
     */
    public static function get_signin(string $unionId, string $id, string $maxResults, string $type, string $nextToken = '')
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/$id/signin";
        $query = [
            'maxResults' => $maxResults,
            'type' => $type,
            'nextToken' => $nextToken
        ];
        $uri = ApiRequest::joinParams($uri, $query);

        return ApiRequest::get($uri);
    }
    /**
     * 查询日历
     *
     * @param string $unionId
     * @return mixed
     */
    public static function get(string $unionId)
    {
        $uri = Url::$api['calendar'] . "{$unionId}/calendars";

        return ApiRequest::get($uri);
    }

    /**
     * 日程日期解析
     *
     * @param array $body
     * @return array
     */
    private static function date_parse(array $body)
    {

        if (array_key_exists('isAllDay', $body)) {
            $isAllDay = $body['isAllDay'];
            if ($isAllDay) {
                $startDate = $body['start']['date'];
                $body['start']['date'] = Time::setDate($startDate)->format('Y-m-d');
                $endDate = $body['end']['date'];
                $body['end']['date'] = Time::setDate($endDate)->format('Y-m-d');
            } else {
                $star_dateTime = $body['start']['dateTime'];
                $body['start']['dateTime'] = Time::setDate($star_dateTime)->format('c');
                $body['start']['timeZone'] = 'Asia/Shanghai';
                $end_dateTime = $body['end']['dateTime'];
                $body['end']['dateTime'] = Time::setDate($end_dateTime)->format('c');
                $body['end']['timeZone'] = 'Asia/Shanghai';
            }
        }
        if (array_key_exists('recurrence', $body)) {
            $recurrence_range_endDate = $body['recurrence']['range']['endDate'];
            $body['recurrence']['range']['endDate'] = Time::setDate($recurrence_range_endDate)->format('c');
        }

        return $body;
    }
}
