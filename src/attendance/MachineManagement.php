<?php

declare(strict_types=1);

namespace SimpleDingTalk\attendance;
use SimpleDingTalk\Url;
use SimpleDingTalk\apiRequest;

/**
 * 考勤机管理
 */
class MachineManagement
{
    /**
     * 查询员工智能考勤机列表
     *
     * @param string $userid
     * @param string $work_date
     * @return mixed
     */
    public static function get_by_userid(string $userid,int $offset=0,$size=10)
    {
        $uri=Url::$api['attendance']['machineManagement']['get_by_userid'];
      
        $json=[
            'param'=>[
                'offset'=>$offset,
                'size'=>$size,
                'userid'=>$userid
            ]
        ];
        return apiRequest::post($uri,$json);
    }
}