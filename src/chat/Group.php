<?php

declare(strict_types=1);

namespace SimpleDingTalk\chat;
use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
/**
 * 群会话
 */
class Group{
    /**
     * 创建群会话
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        $uri = Url::$api['chat']['group']['create'];
       
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取群会话信息
     *
     * @param string $chatid
     * @return mixed
     */
    public static function get(string $chatid){
        $uri = Url::$api['chat']['group']['get'];
        $query=[
            'chatid'=>$chatid
        ];
        return ApiRequest::get($uri, $query);
    }
   /**
    * 修改群会话
    *
    * @param array $json
    * @return mixed
    */
    public static function update(array $json){
        $uri = Url::$api['chat']['group']['update'];
      
        return ApiRequest::post($uri, $json);
    }
    /**
     * 设置群管理员
     *
     * @param string $chatid
     * @param string $userids
     * @param integer $role
     * @return mixed
     */
    public static function subadmin_update(string $chatid,string $userids,int $role){
        $uri = Url::$api['chat']['group']['subadmin_update'];
        $json=[
            'chatid'=>$chatid,
            'userids'=>$userids,
            'role'=>$role
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 设置禁止群成员私聊
     *
     * @param string $chatid
     * @param boolean $is_prohibit
     * @return mixed
     */
    public static function private_chat_switch(string $chatid,bool $is_prohibit){
        $uri = Url::$api['chat']['group']['private_chat_switch'];
        $json=[
            'chatid'=>$chatid,
            'is_prohibit'=>$is_prohibit
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 设置群成员昵称
     *
     * @param string $chatid
     * @return mixed
     */
    public static function updategroupnick(string $chatid){
        $uri = Url::$api['chat']['group']['updategroupnick'];
        $json=[
            'chatid'=>$chatid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取入群二维码链接
     *
     * @param string $chatid
     * @param string $userid
     * @return mixed
     */
    public static function get_qrcode(string $chatid,string $userid)
    {
        $uri = Url::$api['chat']['group']['get_qrcode'];
        $json = [
            'chatid' => $chatid,
            'userid'=>$userid
        ];
        return ApiRequest::post($uri, $json);
    }
}
