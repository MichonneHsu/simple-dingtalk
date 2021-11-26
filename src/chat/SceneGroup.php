<?php

declare(strict_types=1);

namespace SimpleDingTalk\chat;
use SimpleDingTalk\Url;
use SimpleDingTalk\ApiRequest;
/**
 * 场景群
 */
class SceneGroup{
    public static function create(array $json){
        $uri = Url::$api['chat']['scenegroup']['create'];
      
        return ApiRequest::post($uri, $json);
    }
    public static function update(array $json){
        $uri = Url::$api['chat']['scenegroup']['update'];
      
        return ApiRequest::post($uri, $json);
    }
    public static function get(string $open_conversation_id){
        $uri = Url::$api['chat']['scenegroup']['get'];
        $json=[
            'open_conversation_id'=>$open_conversation_id
        ];
        return ApiRequest::post($uri, $json);
    }
    public static function add_member(string $open_conversation_id,string $user_ids){
        $uri = Url::$api['chat']['scenegroup']['add_member'];
        $json=[
            'open_conversation_id'=>$open_conversation_id,
            'user_ids'=>$user_ids
        ];
        return ApiRequest::post($uri, $json);
    }
    public static function remove_member(string $open_conversation_id,string $user_ids){
        $uri = Url::$api['chat']['scenegroup']['remove_member'];
        $json=[
            'open_conversation_id'=>$open_conversation_id,
            'user_ids'=>$user_ids
        ];
        return ApiRequest::post($uri, $json);
    }
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
