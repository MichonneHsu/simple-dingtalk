<?php

declare(strict_types=1);

namespace SimpleDingTalk;

class ContactLog
{
    /**
     * 获取部门详情
     *
     * @param integer $dept_id
     * @return mixed
     */
    public static function get_department(int $dept_id)
    {
        $uri = Url::joinParams(Config::$api['contact_log']['get_department'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'dept_id' => $dept_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门用户详情
     *
     * @param integer $json
     * @return mixed
     */
    public static function get_user(array $json)
    {
        $uri = Url::joinParams(Config::$api['contact_log']['get_user'], [
            'access_token' => AccessToken::getToken()
        ]);

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门下人员列表
     *
     * @param integer $json
     * @return mixed
     */
    public static function get_user_list(array $json)
    {
        $uri = Url::joinParams(Config::$api['contact_log']['get_user_list'], [
            'access_token' => AccessToken::getToken()
        ]);

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取部门列表
     *
     * @param integer $json
     * @return mixed
     */
    public static function get_department_list(array $json)
    {
        $uri = Url::joinParams(Config::$api['contact_log']['get_department_list'], [
            'access_token' => AccessToken::getToken()
        ]);

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取企业信息
     * 
     * @return mixed
     */
    public static function get_organization()
    {
        $uri = Url::joinParams(Config::$api['contact_log']['get_organization'], [
            'access_token' => AccessToken::getToken()
        ]);

        return apiRequest::post($uri);
    }
}
