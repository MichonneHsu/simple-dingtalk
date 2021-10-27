<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;

class Shift
{
    public static function add(string $op_user_id,array $shift)
    {
        $uri=Url::$api['attendance']['shift']['add'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift'=>$shift,
          
        ];
        return apiRequest::post($uri, $json);
    }
    public static function history_query(string $op_user_id,int $shift_id,int $version)
    {
        $uri=Url::$api['attendance']['shift']['add'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_id'=>$shift_id,
            'version'=>$version
          
        ];
        return apiRequest::post($uri, $json);
    }
    public static function remove(string $op_user_id,int $shift_id)
    {
        $uri=Url::$api['attendance']['shift']['remove'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_id'=>$shift_id
        ];
        return apiRequest::post($uri, $json);
    }
    public static function updatepunches(string $op_user_id,int $shift_id,array $punches=[])
    {
        $uri=Url::$api['attendance']['shift']['remove'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_id'=>$shift_id,
            'punches'=>$punches
        ];
        return apiRequest::post($uri, $json);
    }
    public static function search(string $op_user_id,string $shift_name)
    {
        $uri=Url::$api['attendance']['shift']['search'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_name'=>$shift_name
        ];
        return apiRequest::post($uri, $json);
    }
    public static function query(string $op_user_id,int $shift_id)
    {
        $uri=Url::$api['attendance']['shift']['query'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_name'=>$shift_id
        ];
        return apiRequest::post($uri, $json);
    }
    public static function list(string $op_user_id,int $cursor=0)
    {
        $uri=Url::$api['attendance']['shift']['list'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'cursor'=>$cursor
        ];
        return apiRequest::post($uri, $json);
    }
}