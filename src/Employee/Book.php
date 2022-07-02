<?php

declare(strict_types=1);

namespace SimpleDingTalk\Employee;

use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
use SimpleDingTalk\Config;
/**
 * 花名册
 */
class Book
{
    /**
     * 获取花名册元数据
     * @return mixed
     */
    public static function get()
    {
        $uri = Url::$api['humanResource']['book']['get'];
        $json=[
            'agentid'=>Config::getApp()['agentid'],
           
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取花名册字段组详情
     * @return mixed
     */
    public static function grouplist()
    {
        $uri = Url::$api['humanResource']['book']['grouplist'];
        $json=[
            'agentid'=>Config::getApp()['agentid'],
           
        ];
        return ApiRequest::post($uri, $json);
    }
     /**
      * 获取员工花名册字段信息
      *
      * @param string $userid_list
      * @param string $field_filter_list
      * @return mixed
      */
    public static function list(string $userid_list,string $field_filter_list)
    {
        $uri = Url::$api['humanResource']['book']['list'];
        $json=[
            'agentid'=>Config::getApp()['agentid'],
            'userid_list'=>$userid_list,
            'field_filter_list'=>$field_filter_list
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
      * 更新员工花名册信息
      *
      * @param string $userid
      * @param array $groups
      * @return mixed
      */
      public static function update(string $userid,array $groups)
      {
          $uri = Url::$api['humanResource']['book']['update'];
          $json=[
              'agentid'=>Config::getApp()['agentid'],
              'param'=>[
                'groups'=>$groups,
                'userid'=>$userid
              ],
          ];
          return ApiRequest::post($uri, $json);
      }
}