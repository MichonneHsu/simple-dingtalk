<?php declare(strict_types=1);
namespace SimpleDingTalk;
use SimpleDingTalk\util\Sign;
class User{
     /**
     * 获取用户基础信息
     *
     * @param string $code
     * @return mixed
     */
    public static function getuserinfo(string $code){
        $uri=Url::$api['user']['getuserinfo'];
        $query = [
            'code' => $code
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
        $uri=Url::$api['user']['create'];
       
        return apiRequest::post($uri, $json);
    }
     /**
     * 更新用户信息
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        $uri=Url::$api['user']['update'];
        
        return apiRequest::post($uri, $json);
    }
     /**
     * 移除用户
     *
     * @param string $userid
     * @return mixed
     */
    public static function remove(string $userid){
        $uri=Url::$api['user']['remove'];
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
        $uri=Url::$api['user']['get'];
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
        $uri=Url::$api['user']['listsimple'];
      
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户userid列表
     *
     * @param integer $dept_id
     * @return mixed
     */
    public static function listid(int $dept_id){
        $uri=Url::$api['user']['listid'];
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
        $uri=Url::$api['user']['list'];
      
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取员工人数
     *
     * @param bool $only_active
     * @return mixed
     */
    public static function count(bool $only_active=true){
        $uri=Url::$api['user']['count'];
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
        $uri=Url::$api['user']['listadmin'];
      
       
        return apiRequest::post($uri);
    }
    /**
     * 获取管理员通讯录权限范围
     *
     * @param string $userid
     * @return mixed
     */
    public static function get_admin_scope(string $userid){
        $uri=Url::$api['user']['get_admin_scope'];
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
        $uri=Url::$api['user']['can_access_microapp'];
       
        return apiRequest::get($uri,$query);
    }
    /**
     * 根据手机号获取userid
     *
     * @param string $mobile
     * @return mixed
     */
    public static function getbymobile(string $mobile){
        $uri=Url::$api['user']['getbymobile'];
        $json=[
            'mobile'=>$mobile
        ];
        return apiRequest::post($uri, $json);
    }
     /**
     * 根据unionid获取用户userid
     *
     * @param string $unionid
     * @return mixed
     */
    public static function getbyunionid(string $unionid){
        $uri=Url::$api['user']['getbyunionid'];
        $json=[
            'unionid'=>$unionid
        ];
        return apiRequest::post($uri, $json);
    }
     /**
     * 获取未登录钉钉的员工列表
     *
     * @return mixed
     */
    public static function getinactive(array $json){
        $uri=Url::$api['user']['getinactive'];
       
        return apiRequest::post($uri,$json);
    }
    /**
     * 通过免登码获取用户信息
     *
     * @param string $code
     * @return mixed
     */
    public static function code_getuserinfo(string $code){
        $uri=Url::$api['user']['code_getuserinfo'];
        $json=[
            'code'=>$code
        ];
        return apiRequest::post($uri,$json);
    }
    /**
     * 根据sns临时授权码获取用户信息
     *
     * @param string $tmp_auth_code
     * @return mixed
     */
    public static function getuserinfo_bycode(string $tmp_auth_code)
    {
        $params = [

            'accessKey' => Config::$app_info['app'][Config::$app_type]['APP_KEY'],
            'timestamp' => Sign::getMillisecond(),
            'signature' => Sign::signature()

        ];
        $uri = Url::$api['user']['getuserinfo_bycode'];
        $uri = apiRequest::joinParams($uri, $params);
        $json = [
            'tmp_auth_code' => $tmp_auth_code
        ];
        $has_token =false;
        $http = apiRequest::post($uri,$json,$has_token);
       
        
        return $http;
    }
    
} 