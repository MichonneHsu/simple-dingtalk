<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use PDO;
use SimpleDingTalk\util\date\Time;

class Calendar
{
    private static $calendarId = 'primary';
    public static function create(string $unionId, array $body)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . '/events';
        $body = self::date_parse($body);
        return apiRequest::post($uri, $body);
    }
    public static function remove(string $unionId, string $id)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";


        return apiRequest::delete($uri);
    }
    public static function update(string $unionId, string $id, array $body)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";

        $body = self::date_parse($body);
        return apiRequest::put($uri, $body);
    }
    public static function get_details( string $unionId,string $id)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}";


        return apiRequest::get($uri);
    }
    public static function get_list(string $unionId, array $query)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events";

        if (array_key_exists('timeMin', $query)) {
            $timeMin = $query['timeMin'];
            $query['timeMin'] = Time::setDate($timeMin)->format('c');
        }
        if (array_key_exists('timeMax', $query)) {
            $timeMax = $query['timeMax'];
            $query['timeMax'] = Time::setDate($timeMax)->format('c');
        }
        $uri = apiRequest::joinParams($uri, $query);

        return apiRequest::get($uri);
    }
    public static function add_attendees(string $unionId,string $id , array $attendeesToAdd)
    {

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/attendees";
        $body = [
            'attendeesToAdd' =>  $attendeesToAdd

        ];

        return apiRequest::post($uri, $body);
    }
    public static function remove_attendees(string $unionId,string $id , array $attendeesToRemove)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/attendees/batchRemove";
        $body = [
            'attendeesToRemove' => [
                $attendeesToRemove
            ]

        ];

        return apiRequest::post($uri, $body);
    }
    public static function respond(string $unionId, string $id, string $responseStatus)
    {


        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . "/events/{$id}/respond";
        $body = [
            'responseStatus' => $responseStatus
        ];

        return apiRequest::post($uri, $body);
    }
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

        return apiRequest::post($uri, $body);
    }
    public static function get_signin(string $unionId, string $id, string $maxResults, string $type, string $nextToken = '')
    {


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


    public static function date_parse(array $body)
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
                $end_dateTime = $body['start']['dateTime'];
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
