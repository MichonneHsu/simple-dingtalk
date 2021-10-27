<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;
/**
 * 考勤班次
 */
class Shift
{
    /**
     * 创建班次
     *
     * @param string $op_user_id
     * @param array $shift
     * @return mixed
     */
    public static function add(string $op_user_id,array $shift)
    {
        $uri=Url::$api['attendance']['shift']['add'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift'=>$shift,
          
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 查询历史班次
     *
     * @param string $op_user_id
     * @param integer $shift_id
     * @param integer $version
     * @return mixed
     */
    public static function history_query(string $op_user_id,int $shift_id,int $version)
    {
        $uri=Url::$api['attendance']['shift']['history_query'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_id'=>$shift_id,
            'version'=>$version
          
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 删除班次
     *
     * @param string $op_user_id
     * @param integer $shift_id
     * @return mixed
     */
    public static function remove(string $op_user_id,int $shift_id)
    {
        $uri=Url::$api['attendance']['shift']['remove'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_id'=>$shift_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 修改卡点设置
     *
     * @param string $op_user_id
     * @param integer $shift_id
     * @param array $punches
     * @return mixed
     */
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
    /**
     * 按名称搜索班次
     *
     * @param string $op_user_id
     * @param string $shift_name
     * @return mixed
     */
    public static function search(string $op_user_id,string $shift_name)
    {
        $uri=Url::$api['attendance']['shift']['search'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_name'=>$shift_name
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取班次详情
     *
     * @param string $op_user_id
     * @param integer $shift_id
     * @return mixed
     */
    public static function query(string $op_user_id,int $shift_id)
    {
        $uri=Url::$api['attendance']['shift']['query'];
      
        $json = [
            'op_user_id' => $op_user_id,
            'shift_id'=>$shift_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取班次摘要信息
     *
     * @param string $op_user_id
     * @param integer $cursor
     * @return mixed
     */
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