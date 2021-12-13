<?php declare(strict_types=1);
namespace SimpleDingTalk;
/**
 * 智能填表
 */
class Form{
    /**
     * 获取用户创建的填表模板
     *
     * @param string $creator
     * @param integer $biz_type
     * @param integer $offset
     * @param integer $size
     * @return mixed
     */
    public static function list(string $creator,int $biz_type=0,int $offset=0,int $size=10)
    {
        $uri = Url::$api['form']['list'];
        $json=[
            'creator'=>$creator,
            'biz_type'=>$biz_type,
            'offset'=>$offset,
            'size'=>$size
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取填表实例数据
     *
     * @param string $form_code
     * @param integer $offset
     * @param integer $size
     * @param integer $biz_type
     * @param string $action_date
     * @return mixed
     */
    public static function instance_list(string $form_code,int $offset =0,int $size=10,int $biz_type=0,string $action_date='')
    {
        $uri = Url::$api['form']['instance_list'];
        $json=[
            'form_code'=>$form_code,
            'offset'=>$offset,
            'size'=>$size,
            'biz_type'=>$biz_type,
            'action_date'=>$action_date
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取实例详情
     *
     * @param string $formInstance_id
     * @param integer $biz_type
     * @return mixed
     */
    public static function instance_get(string $formInstance_id,int $biz_type=0)
    {
        $uri = Url::$api['form']['instance_get'];
        $json=[
            'formInstance_id'=>$formInstance_id,
            'biz_type'=>$biz_type
        ];
        return ApiRequest::post($uri, $json);
    }
}