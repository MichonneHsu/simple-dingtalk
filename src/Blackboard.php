<?php declare(strict_types=1);
namespace SimpleDingTalk;

/**
 * 公告
 */
class Blackboard{
    /**
     * 获取公告详情
     *
     * @param string $operation_userid
     * @param string $blackboard_id
     * @return mixed
     */
    public static function get(string $operation_userid,string $blackboard_id){
        $uri=Url::$api['blackboard']['get'];
        
        $json=[
            'blackboard_id'=>$blackboard_id,
            'operation_userid'=>$operation_userid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 创建公告
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        $uri=Url::$api['blackboard']['create'];
        $pre=$json;
        $json=[
            'create_request'=>$pre
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 更新公告
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        $uri=Url::$api['blackboard']['update'];
        $pre=$json;
        $json=[
            'update_request'=>$pre
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 删除公告
     *
     * @param string $operation_userid
     * @param string $blackboard_id
     * @return mixed
     */
    public static function remove(string $operation_userid,string $blackboard_id){
        $uri=Url::$api['blackboard']['remove'];
        
        $json=[
            'blackboard_id'=>$blackboard_id,
            'operation_userid'=>$operation_userid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取用户可查看的公告
     *
     * @param string $userid
     * @return mixed
     */
    public static function listtopten(string $userid){
        $uri=Url::$api['blackboard']['listtopten'];
        $json=[
            'userid'=>$userid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取公告分类列表
     *
     * @param string $operation_userid
     * @return mixed
     */
    public static function category_list(string $operation_userid){
        $uri=Url::$api['blackboard']['category_list'];
        $json=[
            'operation_userid'=>$operation_userid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取公告ID列表
     *
     * @param string $operation_userid
     * @param string $start_time
     * @param string $end_time
     * @param integer $page
     * @param integer $page_size
     * @param string $category_id
     * @return mixed
     */
    public static function listids(string $operation_userid,string $start_time,string $end_time,int $page,int $page_size=10,string $category_id=''){
        $uri=Url::$api['blackboard']['listids'];
        
        $json=[
            'query_request'=>[
                'operation_userid'=>$operation_userid,
                'start_time'=>$start_time,
                'end_time'=>$end_time,
                'page'=>$page,
                'page_size'=>$page_size,
                'category_id'=>$category_id
            ]
           
        ];
        return ApiRequest::post($uri, $json);
    }
   
}