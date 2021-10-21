<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use PDO;
use SimpleDingTalk\util\date\Time;

class Calendar
{
    private static $calendarId = 'primary';
    public static function create(array $body)
    {
        $unionId = UserInfo::$unionId;

        $uri = Url::$api['calendar'] . "{$unionId}/calendars/" . self::$calendarId . '/events';
        $time=new Time();
        if(array_key_exists('isAllDay',$body)){
            $isAllDay=$body['isAllDay'];
            if($isAllDay){
                $startDate=$body['start']['date'];
                $body['start']['date']=$time->setDate($startDate)->getDate('Y-m-d');
                $endDate=$body['end']['date'];
                $body['end']['date']=$time->setDate($endDate)->getDate('Y-m-d');
            }else{
                $star_dateTime=$body['start']['dateTime'];
                $body['start']['dateTime']=$time->setDate($star_dateTime)->getDate('c');
                $body['start']['timeZone']='Asia/Shanghai';
                $end_dateTime=$body['start']['dateTime'];
                $body['end']['dateTime']=$time->setDate($end_dateTime)->getDate('c');
                $body['end']['timeZone']='Asia/Shanghai';
            }
        }
       
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
        $time = new Time();
        $startTime=$time->setDate($startTime)->getDate('c');
        $endTime=$time->setDate($endTime)->getDate('c');
        $body = [
            'userIds' => $userIds,
            'startTime' => $startTime,
            'endTime' => $endTime
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
