<?php declare(strict_types=1);
namespace SimpleDingTalk;

class ContactLog{
    public static function get_department(int $dept_id){
        $uri=apiRequest::joinParams(Config::$api['contact_log']['get_department'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'dept_id'=>$dept_id
        ];
        return apiRequest::post($uri, $json);
    }
    public static function get_user(array $json){
        $uri=apiRequest::joinParams(Config::$api['contact_log']['get_user'],[
            'access_token'=>AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    public static function get_user_list(array $json){
        $uri=apiRequest::joinParams(Config::$api['contact_log']['get_user_list'],[
            'access_token'=>AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    public static function get_department_list(array $json){
        $uri=apiRequest::joinParams(Config::$api['contact_log']['get_department_list'],[
            'access_token'=>AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
    public static function get_organization(){
        $uri=apiRequest::joinParams(Config::$api['contact_log']['get_organization'],[
            'access_token'=>AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri);
    }
}