<?php declare(strict_types=1);
namespace SimpleDingTalk;

class Blackboard{
    
    public static function get(string $blackboard_id,string $operation_userid){
        $uri=Url::$api['blackboard']['get'];
        
        $json=[
            'blackboard_id'=>$blackboard_id,
            'operation_userid'=>$operation_userid
        ];
        return apiRequest::post($uri, $json);
    }
    public static function create(array $json){
        $uri=Url::$api['blackboard']['create'];
        $pre=$json;
        $json=[
            'create_request'=>$pre
        ];
        return apiRequest::post($uri, $json);
    }
    public static function update(array $json){
        $uri=Url::$api['blackboard']['update'];
        $pre=$json;
        $json=[
            'update_request'=>$pre
        ];
        return apiRequest::post($uri, $json);
    }
    public static function remove(string $blackboard_id,string $operation_userid){
        $uri=Url::$api['blackboard']['remove'];
        
        $json=[
            'blackboard_id'=>$blackboard_id,
            'operation_userid'=>$operation_userid
        ];
        return apiRequest::post($uri, $json);
    }
    public static function listtopten(string $userid){
        $uri=Url::$api['blackboard']['listtopten'];
        $json=[
            'userid'=>$userid
        ];
        return apiRequest::post($uri, $json);
    }
    public static function category_lsit(string $operation_userid){
        $uri=Url::$api['blackboard']['category_lsit'];
        $json=[
            'operation_userid'=>$operation_userid
        ];
        return apiRequest::post($uri, $json);
    }
    public static function listids(string $operation_userid,string $start_time,string $end_time,int $page,int $page_size=10,string $category_id=''){
        $uri=Url::$api['blackboard']['listids'];
        
        $json=[
            'query_request'=>[
                'operation_userid'=>$operation_userid,
                'start_time'=>$start_time,
                'end_time'=>$end_time,
                'page'=>$page,
                'page_size'=>$page_size,
                'category_id'=>$category_id
            ]
           
        ];
        return apiRequest::post($uri, $json);
    }
   
}