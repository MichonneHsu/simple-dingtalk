<?php

declare(strict_types=1);

namespace SimpleDingTalk\Employee;

use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;

/**
<<<<<<< HEAD
 * 员工管理
=======
 * 员工关系
>>>>>>> master
 */
class Relation
{
   
    /**
     * 添加企业待入职员工
     *
     * @param array $json
     * @return mixed
     */
    public static function addpreentry(array $json)
    {
        $uri = Url::$api['humanResource']['addpreentry'];
        $pre=$json;
        $json=[
            'param'=>$pre
        ];
        return ApiRequest::post($uri, $json);
    }
}