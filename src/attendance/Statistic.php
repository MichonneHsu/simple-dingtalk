<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;

/**
 * 考勤统计
 */
class Statistic
{
    /**
     * 获取考勤报表列定义
     *
     * @return mixed
     */
    public static function getattcolumns()
    {
        $uri=Url::$api['attendance']['statistic']['getattcolumns'];
      
      
        return apiRequest::post($uri);
    }
    /**
     * 获取考勤报表列值
     *
     * @param string $userid
     * @param string $column_id_list
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public static function getcolumnval(string $userid,string $column_id_list,string $from_date,string $to_date)
    {
        $uri=Url::$api['attendance']['statistic']['getcolumnval'];
      
        $json=[
            'userid'=>$userid,
            'column_id_list'=>$column_id_list,
            'from_date'=>$from_date,
            'to_date'=>$to_date
        ];
        return apiRequest::post($uri,$json);
    }
    /**
     * 获取报表假期数据
     *
     * @param string $userid
     * @param string $leave_names
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public static function getleavetimebynames(string $userid,string $leave_names,string $from_date,string $to_date)
    {
        $uri=Url::$api['attendance']['statistic']['getleavetimebynames'];
      
        $json=[
            'userid'=>$userid,
            'leave_names'=>$leave_names,
            'from_date'=>$from_date,
            'to_date'=>$to_date
        ];
        return apiRequest::post($uri,$json);
    }
    /**
     * 查询是否启用智能统计报表
     *
     * @return mixed
     */
    public static function isopensmartreport()
    {
        $uri=Url::$api['attendance']['statistic']['isopensmartreport'];
    
        return apiRequest::post($uri);
    }
    /**
     * 获取用户考勤数据
     *
     * @param string $userid
     * @param string $work_date
     * @return mixed
     */
    public static function getupdatedata(string $userid,string $work_date)
    {
        $uri=Url::$api['attendance']['statistic']['getupdatedata'];
      
        $json=[
            'userid'=>$userid,
            'work_date'=>$work_date
        ];
        return apiRequest::post($uri,$json);
    }
}