<?php

declare(strict_types=1);

namespace SimpleDingTalk;

/**
 * 官方工作流
 */

class WorkFlow
{

    /**
     * 创建或更新审批模板
     *
     * @param array $json
     * @return mixed
     */
    public static function save(array $json)
    {
        $uri = Url::$api['workflow']['save'];

        $json['agentid'] = Config::getApp()['info']['AGENT_ID'];
        $json = ['saveProcessRequest' => $json];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 发起审批实例
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json)
    {
        $uri = Url::$api['workflow']['create'];
        $json['agent_id'] = Config::getApp()['info']['AGENT_ID'];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 撤销审批实例
     *
     * @param string $operating_userid
     * @param string $process_instance_id
     * @param boolean $is_system
     * @param string $remark
     * @return mixed
     */
    public static function terminate(string $operating_userid,string $process_instance_id,bool $is_system,string $remark='')
    {
        $uri = Url::$api['workflow']['terminate'];

        $json = [
            'request' => [
                'operating_userid'=>$operating_userid,
                'process_instance_id'=>$process_instance_id,
                'is_system'=>$is_system,
                'remark'=>$remark
            ]
        ];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 下载审批附件
     *
     * @param string $process_instance_id
     * @param string $file_id
     * @return mixed
     */
    public static function get_file(string $process_instance_id, string $file_id)
    {
        $uri = Url::$api['workflow']['get_file'];

        $json = [
            'request' => [
                'process_instance_id' => $process_instance_id,
                'file_id' => $file_id
            ]

        ];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取审批实例详情
     *
     * @param string $process_instance_id
     * @param string $file_id
     * @return mixed
     */
    public static function get_detail(string $process_instance_id)
    {
        $uri = Url::$api['workflow']['get_detail'];

        $json = [
            'process_instance_id' => $process_instance_id,

        ];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取审批实例ID列表
     *
     * @param array $json
     * @return mixed
     */
    public static function get_list(array $json)
    {
        $uri = Url::$api['workflow']['get_list'];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取用户待审批数量
     *
     * @param string $userid
     * @return mixed
     */
    public static function gettodonum(string $userid)
    {
        $uri = Url::$api['workflow']['gettodonum'];
        $json = [
            'userid' => $userid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取指定用户可见的审批表单列表
     *
     * @param array $json
     * @return mixed
     */
    public static function listbyuserid(array $json)
    {
        $uri = Url::$api['workflow']['listbyuserid'];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取审批钉盘空间信息
     *
     * @param string $user_id
     * @return mixed
     */
    public static function space_info(string $user_id)
    {
        $uri = Url::$api['workflow']['space_info'];
        $json = [
            'user_id' => $user_id,
            'agent_id' => Config::getApp()['info']['AGENT_ID']
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 授权预览审批附件
     *
     * @param array $json
     * @return mixed
     */
    public static function space_preview(array $json)
    {
        $uri = Url::$api['workflow']['space_preview'];
        $pre = $json;
        $pre['agentid'] = Config::getApp()['info']['AGENT_ID'];
        $json = [
            'request' => $pre
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 查询已设置为条件的表单组件
     *
     * @param string $process_code
     * @return mixed
     */
    public static function condition_list(string $process_code)
    {
        $uri = Url::$api['workflow']['condition_list'];

        $json = [
            'request' => [
                'process_code' => $process_code,
                'agentid' => Config::getApp()['info']['AGENT_ID']
            ]
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 添加审批评论
     *
     * @param array $json
     * @return mixed
     */
    public static function add_comment(array $json)
    {
        $uri = Url::$api['workflow']['add_comment'];
        $pre = $json;
        $json = ['request' => $pre];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 获取当前企业所有可管理的模版
     *
     * @param string $userid
     * @return mixed
     */
    public static function get_template(string $userid)
    {
        $uri = Url::$api['workflow']['get_template'];
        $json = [
            'userid' => $userid
        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 同意或拒绝审批任务
     *
     * @param array $json
     * @return mixed
     */
    public static function execute(array $json)
    {
        $uri = Url::$api['workflow']['execute'];
        $pre = $json;
        $json = ['request' => $pre];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 授权下载审批钉盘文件
     *
     * @param integer $space_id
     * @param string $file_id
     * @param string $userid
     * @return mixed
     */
    public static function space_auth(int $space_id, string $file_id, string $userid)
    {
        $uri = Url::$api['workflow']['space_auth'];
        $json = [
            'request' => [
                'userid' => $userid,
                'file_infos' => [
                    'space_id' => $space_id,
                    'file_id' => $file_id
                ]
            ],

        ];

        return ApiRequest::post($uri, $json);
    }
}
