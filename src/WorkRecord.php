<?php

declare(strict_types=1);

namespace SimpleDingTalk;

/**
 * 自有工作流
 */

class WorkRecord
{


    /**
     * 获取模板code
     *
     * @param string $name
     * @return mixed
     */
    public static function get_by_name(string $name)
    {
        $uri = Url::$api['workrecord']['get_by_name'];
        $json = [
            'name' => $name

        ];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 删除模板
     *
     * @param string $process_code
     * @param bool $clean_running_task
     * @return mixed
     */
    public static function remove(string $process_code, bool $clean_running_task = false)
    {
        $uri = Url::$api['workrecord']['remove'];

        $json = [
            'request' => [
                'agentid' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'],
                'process_code' => $process_code,
                'clean_running_task' => $clean_running_task
            ]

        ];
        return ApiRequest::post($uri, $json);
    }
    // public static function clean(string $process_code)
    // {
    //     $uri = Url::joinParams(Url::$api['workrecord']['clean'], [
    //         'access_token' => AccessToken::getToken()
    //     ]);

    //     $json = [
    //         'process_code' => $process_code,
    //         'corpid' => Config::$app_info['app'][Config::$app_type]['app_info']['CORP_ID']
    //     ];
    //     return ApiRequest::post($uri, $json);
    // }
    /**
     * 创建实例
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json)
    {
        $uri = Url::$api['workrecord']['create'];
        $pre = $json;
        $pre['agentid']=Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'];
        $json = ['request' => $pre];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 创建或更新审批模板
     *
     * @param array $json
     * @return mixed
     */
    public static function save(array $json)
    {
        $uri = Url::$api['workrecord']['save'];
        $pre = $json;
        $pre['agentid']=Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'];
        $json = ['saveProcessRequest' => $pre];
        return ApiRequest::post($uri, $json);
    }
    /**
     * 更新实例状态
     *
     * @param string $process_instance_id
     * @param string $status
     * @param string $result
     * @param boolean $cancel_running_task
     * @return mixed
     */
    public static function update(string $process_instance_id, string $status, string $result, bool $cancel_running_task = false)
    {
        $uri =Url::$api['workrecord']['update'];

        $json = [
            'request' =>  [
                'agentid' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'],
                'process_instance_id' => $process_instance_id,
                'status' => $status,
                'result' => $result,
                'cancel_running_task' => $cancel_running_task
            ]
        ];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 批量取消待办
     *
     * @param string $process_instance_id
     * @param string $status
     * @param string $result
     * @return mixed
     */
    public static function batchupdate(string $process_instance_id, string $status, string $result)
    {
        $uri =Url::$api['workrecord']['batchupdate'];

        $json = [
            'request' => [
                'instances' => [
                    'process_instance_id' => $process_instance_id,
                    'status' => $status,
                    'result' => $result,
                ],
                'agentid' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID']
            ]
        ];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 创建待办事项
     *
     * @param array $json
     * @return mixed
     */
    public static function task_create(array $json)
    {
        $uri = Url::$api['workrecord']['task_create'];
        $pre = $json;
        $pre['agentid']=Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'];
        $json = ['request' => $pre];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 查询待办列表
     *
     * @param string $userid
     * @param integer $offset
     * @param integer $status
     * @param integer $count
     * @return mixed
     */
    public static function task_query(string $userid, int $offset = 0,  int $status = 0, int $count = 5)
    {
        $uri = Url::$api['workrecord']['task_query'];

        $json = [
            'userid' => $userid,
            'offset' => $offset,
            'count' => $count,
            'status' => $status,
        ];

        return ApiRequest::post($uri, $json);
    }
    /**
     * 更新待办状态
     *
     * @param string $process_instance_id
     * @param array $tasks
     * @return mixed
     */
    public static function task_update(string $process_instance_id, array $tasks)
    {
        $uri = Url::$api['workrecord']['task_update'];


        $json = [
            'request' => [
                'process_instance_id'=>$process_instance_id,
                'tasks'=>$tasks,
                'agentid' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID']
            ]
        ];

        return ApiRequest::post($uri, $json);
    }
    public static function cancel(array $json)
    {
        $uri = Url::$api['workrecord']['cancel'];

        $pre = $json;
        $pre['agentid']=Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'];
        $json = ['request' => $pre];

        return ApiRequest::post($uri, $json);
    }
}
