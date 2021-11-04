<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class Notification
{

    /**
     * 发送工作通知
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function send(array $json)
    {

        $uri = Url::$api['notification']['corpconversation'];


        $json = array_merge($json, [
            'agent_id' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID']
        ]);
        return apiRequest::post($uri, $json);
    }
    /**
     * 更新工作通知状态栏
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function update_status_bar(array $json)
    {

        $uri =Url::$api['notification']['update_status_bar'];

        $json['agent_id']=Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'];
      
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取工作通知消息的发送进度
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function getsendprogress(int $task_id)
    {

        $uri = Url::$api['notification']['getsendprogress'];


        $json = [
            'agent_id' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'],
            'task_id' => $task_id
        ];
        return apiRequest::post($uri, $json);
    }
    /**
     * 获取工作通知消息的发送结果
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function getsendresult(int $task_id)
    {

        $uri =Url::$api['notification']['getsendresult'];


        $json = [
            'agent_id' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'],
            'task_id' => $task_id
        ];

        return apiRequest::post($uri, $json);
    }
    /**
     * 撤回工作通知消息
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function recall(int $task_id)
    {

        $uri = Url::$api['notification']['recall'];


        $json = [
            'agent_id' => Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'],
            'msg_task_id' => $task_id
        ];
        return apiRequest::post($uri, $json);
    }
}
