<?php declare(strict_types=1);
namespace SimpleDingTalk;
/**
 * 外部联系人
 */
class Extcontact{
    /**
     * 添加外部联系人
     *
     * @param array $contact
     * @return mixed
     */
    public static function create(array $contact)
    {
        $uri = Url::$api['extcontact']['create'];
        $json=[
            'contact'=>$contact
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 删除外部联系人
     *
     * @param string $user_id
     * @return mixed
     */
    public static function remove(string $user_id)
    {
        $uri = Url::$api['extcontact']['remove'];
        $json=[
            'user_id'=>$user_id
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 更新外部联系人
     *
     * @param array $contact
     * @return mixed
     */
    public static function update(array $contact)
    {
        $uri = Url::$api['extcontact']['update'];
        $json=[
            'contact'=>$contact
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取外部联系人列表
     *
     * @param integer $offset
     * @param integer $size
     * @return mixed
     */
    public static function list(int $offset=0,int $size=20)
    {
        $uri = Url::$api['extcontact']['list'];
        $json=[
            'offset'=>$offset,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取外部联系人标签列表
     *
     * @param integer $offset
     * @param integer $size
     * @return mixed
     */
    public static function listlabelgroups(int $offset=0,int $size=20)
    {
        $uri = Url::$api['extcontact']['listlabelgroups'];
        $json=[
            'offset'=>$offset,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取外部联系人详情
     *
     * @param string $user_id
     * @return mixed
     */
    public static function get(string $user_id)
    {
        $uri = Url::$api['extcontact']['get'];
        $json=[
            'user_id'=>$user_id
        ];
        return ApiRequest::post($uri, $json);
    }

}