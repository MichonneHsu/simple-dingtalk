<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class WorkRecord
{

    
    /**
     * 获取模板code
     *
     * @param string $name
     * @return mixed
     */
    public static function get_by_name(string $name)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['get_by_name'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
          'name'=>$name
            
        ];
        return apiRequest::post($uri, $json);
    }
    public static function delete(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['delete'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre=$json;
        $json=[
            'request'=>$pre
        ];
        return apiRequest::post($uri, $json);
    }
    public static function clean(string $process_code,string $corpid)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['clean'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        $json=[
            'process_code'=>$process_code,
            'corpid'=>$corpid
        ];
        return apiRequest::post($uri, $json);
    }
    public static function create(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['create'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre=$json;
        $json=[
            'request'=>$pre
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function save(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['save'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre=$json;
        $json=[
            'saveProcessRequest'=>$pre
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function update(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['update'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre=$json;
        $json=[
            'request'=>$pre
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function batchupdate(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['batchupdate'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre=$json;
        $json=[
            'request'=>$pre
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function task_create(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['task_create'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre=$json;
        $json=[
            'request'=>$pre
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function task_query(string $userid ,int $offset=0,int $count=5,int $status=0)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['task_query'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        $json=[
           'userid'=>$userid,
           'offset'=>$offset,
           'count'=>$count,
           'status'=>$status,
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function task_update(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['task_query'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        $pre=$json;
        $json=[
            'request'=>$pre
        ];
      
        return apiRequest::post($uri, $json);
    }
    public static function cancel(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['cancel'], [
            'access_token' => AccessToken::getToken()
        ]);
       
        $pre=$json;
        $json=[
            'request'=>$pre
        ];
      
        return apiRequest::post($uri, $json);
    }
}
