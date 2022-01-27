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
        return ApiRequest::get($uri, $query);
    }
     /**
     * 创建用户
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        $uri=Url::$api['user']['create'];
       
        return ApiRequest::post($uri, $json);
    }
     /**
     * 更新用户信息
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        $uri=Url::$api['user']['update'];
        
        return ApiRequest::post($uri, $json);
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
        return ApiRequest::post($uri, $json);
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
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户基础信息
     *
     * @param array $json
     * @return mixed
     */
    public static function listsimple(array $json){
        $uri=Url::$api['user']['listsimple'];
      
        return ApiRequest::post($uri, $json);
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
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户详情
     *
     * @param array $json
     * @return mixed
     */
    public static function list(array $json){
        $uri=Url::$api['user']['list'];
      
        return ApiRequest::post($uri, $json);
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
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取管理员列表
     * 
     * @return mixed
     */
    public static function listadmin(){
        $uri=Url::$api['user']['listadmin'];
      
       
        return ApiRequest::post($uri);
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
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取管理员的应用管理权限
     *
     * @param array $query
     * @return mixed
     */
    public static function can_access_microapp(array $query){
        $uri=Url::$api['user']['can_access_microapp'];
       
        return ApiRequest::get($uri,$query);
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
        return ApiRequest::post($uri, $json);
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
        return ApiRequest::post($uri, $json);
    }
     /**
     * 获取未登录钉钉的员工列表
     *
     * @return mixed
     */
    public static function getinactive(array $json){
        $uri=Url::$api['user']['getinactive'];
       
        return ApiRequest::post($uri,$json);
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
        return ApiRequest::post($uri,$json);
    }
    /**
     * 获取用户基本信息
     *
     * @param string $tmp_auth_code
     * @return mixed
     */
    public static function getuserinfo_bycode(string $tmp_auth_code)
    {
        $params = [

            'accessKey' => Config::getApp()['info']['APP_KEY'],
            'timestamp' => Sign::getMillisecond(),
            'signature' => Sign::signature()

        ];
        $uri = Url::$api['user']['getuserinfo_bycode'];
        $uri = ApiRequest::joinParams($uri, $params);
        $json = [
            'tmp_auth_code' => $tmp_auth_code
        ];
        $has_token =false;

        return ApiRequest::post($uri,$json,$has_token);
    }
    /**
     *  通过sns临时根据当前应用信息组合成授权url
     *
     * @param string $tmp_auth_code
     * @return string
     */
    public static function sns_authorize(string $tmp_auth_code): string
    {
        $app=Config::getApp();
        $params = [
            'appid' => $app['info']['APP_KEY'],
            'response_type' => 'code',
            'scope' => 'snsapi_login',
            'state' => 'STATE',
            'redirect_uri' =>$app['login_info']['authorize']['redirect_uri'],
            'loginTmpCode' => $tmp_auth_code
        ];
        $uri = Url::$api['domain'].Url::$api['user']['sns_authorize'];
        return ApiRequest::joinParams($uri, $params);
    }
} 