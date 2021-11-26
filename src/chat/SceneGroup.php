<?php

declare(strict_types=1);

namespace SimpleDingTalk\chat;
use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
/**
 * 场景群
 */
class SceneGroup{

    /**
     * 创建场景群
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        $uri = Url::$api['chat']['scenegroup']['create'];
      
        return ApiRequest::post($uri, $json);
    }
    /**
     * 更新场景群
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        $uri = Url::$api['chat']['scenegroup']['update'];
      
        return ApiRequest::post($uri, $json);
    }
    /**
     * 查询群信息
     *
     * @param string $open_conversation_id
     * @return mixed
     */
    public static function get(string $open_conversation_id){
        $uri = Url::$api['chat']['scenegroup']['get'];
        $json=[
            'open_conversation_id'=>$open_conversation_id
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 新增群成员
     *
     * @param string $open_conversation_id
     * @param string $user_ids
     * @return mixed
     */
    public static function add_member(string $open_conversation_id,string $user_ids){
        $uri = Url::$api['chat']['scenegroup']['add_member'];
        $json=[
            'open_conversation_id'=>$open_conversation_id,
            'user_ids'=>$user_ids
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 删除群成员
     *
     * @param string $open_conversation_id
     * @param string $user_ids
     * @return mixed
     */
    public static function remove_member(string $open_conversation_id,string $user_ids){
        $uri = Url::$api['chat']['scenegroup']['remove_member'];
        $json=[
            'open_conversation_id'=>$open_conversation_id,
            'user_ids'=>$user_ids
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 查询群成员
     *
     * @param string $open_conversation_id
     * @param string $cursor
     * @param integer $size
     * @return mixed
     */
    public static function get_member(string $open_conversation_id,string $cursor='0',int $size=10){
        $uri = Url::$api['chat']['scenegroup']['get_member'];
        $json=[
            'open_conversation_id'=>$open_conversation_id,
            'cursor'=>$cursor,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
}
