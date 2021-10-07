<?php declare(strict_types=1);
namespace SimpleDingTalk;

class User{
     /**
     * 获取用户基础信息
     *
     * @param string $code
     * @return mixed
     */
    public static function getuserinfo(string $code){
        $uri=Config::$api['user']['getuserinfo'];
        $query = [
            'code' => $code,
            'access_token'=>AccessToken::getToken()
        ];
        return apiRequest::get($uri, $query);
    }
     /**
     * 创建用户
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        $uri=apiRequest::joinParams(Config::$api['user']['create'],[
            'access_token'=>AccessToken::getToken()
        ]);
       
        return apiRequest::post($uri, $json);
    }
     /**
     * 更新用户信息
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        $uri=apiRequest::joinParams(Config::$api['user']['update'],[
            'access_token'=>AccessToken::getToken()
        ]);
        
        return apiRequest::post($uri, $json);
    }
     /**
     * 移除用户
     *
     * @param string $userid
     * @return mixed
     */
    public static function remove(string $userid){
        $uri=apiRequest::joinParams(Config::$api['user']['delete'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'userid'=>$userid
        ];
        return apiRequest::post($uri, $json);
    }
     /**
     * 根据userid获取用户详情
     *
     * @param string $userid
     * @return mixed
     */
    public static function get(string $userid){
        $uri=apiRequest::joinParams(Config::$api['user']['get'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'userid'=>$userid
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户基础信息
     *
     * @param array $json
     * @return mixed
     */
    public static function listsimple(array $json){
        $uri=apiRequest::joinParams(Config::$api['user']['listsimple'],[
            'access_token'=>AccessToken::getToken()
        ]);
      
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户userid列表
     *
     * @param integer $dept_id
     * @return mixed
     */
    public static function listid(int $dept_id){
        $uri=apiRequest::joinParams(Config::$api['user']['listid'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'dept_id'=>$dept_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户详情
     *
     * @param array $json
     * @return mixed
     */
    public static function list(array $json){
        $uri=apiRequest::joinParams(Config::$api['user']['list'],[
            'access_token'=>AccessToken::getToken()
        ]);
      
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取员工人数
     *
     * @param bool $only_active
     * @return mixed
     */
    public static function count(bool $only_active=true){
        $uri=apiRequest::joinParams(Config::$api['user']['count'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'only_active'=>$only_active
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取管理员列表
     * 
     * @return mixed
     */
    public static function listadmin(){
        $uri=apiRequest::joinParams(Config::$api['user']['listadmin'],[
            'access_token'=>AccessToken::getToken()
        ]);
      
       
        return apiRequest::post($uri);
    }
    /**
     * 获取管理员通讯录权限范围
     *
     * @param string $userid
     * @return mixed
     */
    public static function get_admin_scope(string $userid){
        $uri=apiRequest::joinParams(Config::$api['user']['get_admin_scope'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'userid'=>$userid
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取管理员的应用管理权限
     *
     * @param array $query
     * @return mixed
     */
    public static function can_access_microapp(array $query){
        $uri=Config::$api['user']['can_access_microapp'];
       $query=array_merge([
        'access_token'=>AccessToken::getToken()
       ],$query);
       
        return apiRequest::get($uri,$query);
    }
} 