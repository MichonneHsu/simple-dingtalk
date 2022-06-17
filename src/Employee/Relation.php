<?php

declare(strict_types=1);

namespace SimpleDingTalk\Employee;

use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;

/**
 * 员工关系
 */
class Relation
{
   
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
        return ApiRequest::post($uri, $json);
    }
}