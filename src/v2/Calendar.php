<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\util\date\Time;

class Calendar
{
    private static $calendarId = 'primary';
    public static function create(array $body)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . '/events';


        return apiRequest::post($uri, $body);
    }
    public static function remove(string $id)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";


        return apiRequest::delete($uri);
    }
    public static function update(string $id, array $body)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";


        return apiRequest::put($uri, $body);
    }
    public static function get_details(string $id)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars" . self::$calendarId . "/events/{$id}";


        return apiRequest::get($uri);
    }
    public static function get_list(array $query)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events";
        $uri = apiRequest::joinParams($uri, $query);

        return apiRequest::get($uri);
    }
    public static function add_attendees(string $id, array $attendeesToAdd)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/attendees";
        $body = [
            'attendeesToAdd' => [
                $attendeesToAdd
            ]

        ];

        return apiRequest::post($uri, $body);
    }
    public static function remove_attendees(string $id, array $attendeesToRemove)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/attendees/batchRemove";
        $body = [
            'attendeesToRemove' => [
                $attendeesToRemove
            ]

        ];

        return apiRequest::post($uri, $body);
    }
    public static function respond(string $id, string $responseStatus)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/respond";
        $body = [
            'responseStatus' => $responseStatus
        ];

        return apiRequest::post($uri, $body);
    }
    public static function querySchedule(array $userIds, string $startTime, string $endTime)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/querySchedule";
        $date = Time::get_calandar_date($startTime, $endTime);
        $body = [
            'userIds' => $userIds,
            'startTime' => $date['startTime'],
            'endTime' => $date['endTime']
        ];

        return apiRequest::post($uri, $body);
    }
    public static function get_signin(string $id, string $maxResults, string $type, string $nextToken = '')
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/$id/signin";
        $query = [
            'maxResults' => $maxResults,
            'type' => $type,
            'nextToken' => $nextToken
        ];
        $uri = apiRequest::joinParams($uri, $query);

        return apiRequest::get($uri);
    }

    public static function get(string $unionId)
    {
        $uri = Url::$api['calendar'] . "{$unionId}/calendars";

        return apiRequest::get($uri);
    }
}
