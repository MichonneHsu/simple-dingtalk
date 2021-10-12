<?php

declare(strict_types=1);

namespace SimpleDingTalk;



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
        $uri = Url::joinParams(Url::$api['workflow']['save'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre = $json;
        $json['saveProcessRequest'] = array_merge($pre, [
            'agent_id' => Config::$app_info['AGENT_ID']
        ]);
        return apiRequest::post($uri, $json);
    }
    /**
     * 发起审批实例
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json)
    {
        $uri = Url::joinParams(Url::$api['workflow']['create'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = array_merge($json, [
            'agent_id' => Config::$app_info['AGENT_ID']
        ]);
        return apiRequest::post($uri, $json);
    }
    /**
     * 终止审批流程
     *
     * @param array $json
     * @return mixed
     */
    public static function terminate(array $json)
    {
        $uri = Url::joinParams(Url::$api['workflow']['terminate'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre = $json;
        $json['request'] = $pre;

        return apiRequest::post($uri, $json);
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
        $uri = Url::joinParams(Url::$api['workflow']['get_file'], [
            'access_token' => AccessToken::getToken()
        ]);

        $json = [
            'request' => [
                'process_instance_id' => $process_instance_id,
                'file_id' => $file_id
            ]

        ];

        return apiRequest::post($uri, $json);
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
        $uri = Url::joinParams(Url::$api['workflow']['get_detail'], [
            'access_token' => AccessToken::getToken()
        ]);

        $json = [
            'process_instance_id' => $process_instance_id,

        ];

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取审批实例ID列表
     *
     * @param array $json
     * @return mixed
     */
    public static function get_list(array $json)
    {
        $uri = Url::joinParams(Url::$api['workflow']['get_list'], [
            'access_token' => AccessToken::getToken()
        ]);

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取用户待审批数量
     *
     * @param string $userid
     * @return mixed
     */
    public static function gettodonum(string $userid)
    {
        $uri = Url::joinParams(Url::$api['workflow']['gettodonum'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'userid' => $userid
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取指定用户可见的审批表单列表
     *
     * @param array $json
     * @return mixed
     */
    public static function listbyuserid(array $json)
    {
        $uri = Url::joinParams(Url::$api['workflow']['listbyuserid'], [
            'access_token' => AccessToken::getToken()
        ]);

        return apiRequest::post($uri, $json);
    }
    /**
     * 获取审批钉盘空间信息
     *
     * @param string $user_id
     * @return mixed
     */
    public static function space_info(string $user_id)
    {
        $uri = Url::joinParams(Url::$api['workflow']['space_info'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'user_id' => $user_id,
            'agent_id' => Config::$app_info['AGENT_ID']
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 授权预览审批附件
     *
     * @param array $json
     * @return mixed
     */
    public static function space_preview(array $json)
    {
        $uri = Url::joinParams(Url::$api['workflow']['space_preview'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre = $json;
        $pre['agentid'] = Config::$app_info['AGENT_ID'];
        $json = [
            'request' => $pre
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 查询已设置为条件的表单组件
     *
     * @param string $process_code
     * @return mixed
     */
    public static function condition_list(string $process_code)
    {
        $uri = Url::joinParams(Url::$api['workflow']['condition_list'], [
            'access_token' => AccessToken::getToken()
        ]);

        $json = [
            'request' => [
                'process_code' => $process_code,
                'agentid' => Config::$app_info['AGENT_ID']
            ]
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 添加审批评论
     *
     * @param array $json
     * @return mixed
     */
    public static function add_comment(array $json)
    {
        $uri = Url::joinParams(Url::$api['workflow']['add_comment'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre=$json;
        $json = [
            'request' => [
                $pre
            ]
        ];
        return apiRequest::post($uri, $json);
    }
}
