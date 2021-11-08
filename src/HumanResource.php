<?php declare(strict_types=1);
namespace SimpleDingTalk;

class HumanResource{
    /**
     * 获取在职员工列表
     *
     * @param string $status_list
     * @param integer $size
     * @param integer $offset
     * @return mixed
     */
    public static function queryonjob(string $status_list,int $size,int $offset=0)
    {
        $uri = Url::$api['humanResource']['queryonjob'];
        $json=[
            'status_list'=>$status_list,
            'offset'=>$offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取待入职员工列表
     *
     * @param integer $size
     * @param integer $offset
     * @return void
     */
    public static function querypreentry(int $size,int $offset=0)
    {
        $uri = Url::$api['humanResource']['querypreentry'];
        $json=[
            'offset'=>$offset,
            'size'=>$size
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取员工离职信息
     *
     * @param string $userid_list
     * @return void
     */
    public static function listdimission(string $userid_list)
    {
        $uri = Url::$api['humanResource']['listdimission'];
        $json=[
            'userid_list'=>$userid_list
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取离职员工列表
     *
     * @param integer $size
     * @param integer $offset
     * @return void
     */
    public static function querydimission(int $size,int $offset=0)
    {
        $uri =Url::$api['humanResource']['querydimission'];
        $json=[
            'offset'=>$offset,
            'size'=>$size
        ];
     
        return apiRequest::post($uri, $json);
    }
    /**
     * 添加企业待入职员工
     *
     * @param array $json
     * @return void
     */
    public static function addpreentry(array $json)
    {
        $uri = Url::$api['humanResource']['addpreentry'];
        $pre=$json;
        $json=[
            'param'=>$pre
        ];
        return apiRequest::post($uri, $json);
    }
}