<?php declare(strict_types=1);
namespace SimpleDingTalk;

class Department{
     /**
     * 创建部门
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        $uri=Url::joinParams(Url::$api['department']['create'],[
            'access_token'=>AccessToken::getToken()
        ]);
        return apiRequest::post($uri, $json);
    }
    /**
     * 更新部门
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        $uri=Url::joinParams(Url::$api['department']['update'],[
            'access_token'=>AccessToken::getToken()
        ]);
        return apiRequest::post($uri, $json);
    }
    /**
     * 删除部门
     *
     * @param int $dept_id
     * @return mixed
     */
    public static function remove(int $dept_id){
        $uri=Url::joinParams(Url::$api['department']['remove'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'dept_id'=>$dept_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门详情
     *
     * @param array $json
     * @return mixed
     */
    public static function get(int $dept_id){
        $uri=Url::joinParams(Url::$api['department']['get'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'dept_id'=>$dept_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门列表
     *
     * @param array $json
     * @return mixed
     */
    public static function listsub(int $dept_id){
        $uri=Url::joinParams(Url::$api['department']['listsub'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'dept_id'=>$dept_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取子部门ID列表
     *
     * @param array $json
     * @return mixed
     */
    public static function listsubid(int $dept_id){
        $uri=Url::joinParams(Url::$api['department']['listsubid'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'dept_id'=>$dept_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取指定用户的所有父部门列表
     *
     * @param string $userid
     * @return mixed
     */
    public static function listparentbyuser(string $userid){
        $uri=Url::joinParams(Url::$api['department']['listparentbyuser'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'userid'=>$userid
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取指定部门的所有父部门列表
     *
     * @param int $dept_id
     * @return mixed
     */
    public static function listparentbydept(int $dept_id){
        $uri=Url::joinParams(Url::$api['department']['listparentbydept'],[
            'access_token'=>AccessToken::getToken()
        ]);
        $json=[
            'dept_id'=>$dept_id
        ];
        return apiRequest::post($uri, $json);
    }
}