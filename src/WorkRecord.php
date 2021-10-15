<?php

declare(strict_types=1);

namespace SimpleDingTalk;



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
        $uri = Url::joinParams(Url::$api['workrecord']['get_by_name'], [
            'access_token' => AccessToken::getToken()
        ]);
        $json = [
            'name' => $name

        ];
        return apiRequest::post($uri, $json);
    }
    public static function remove(string $process_code, bool $clean_running_task = false)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['remove'], [
            'access_token' => AccessToken::getToken()
        ]);



        $json = [
            'request' => [
                'agentid' => Config::$app_info['AGENT_ID'],
                'process_code' => $process_code,
                'clean_running_task' => $clean_running_task
            ]

        ];
        return apiRequest::post($uri, $json);
    }
    // public static function clean(string $process_code)
    // {
    //     $uri = Url::joinParams(Url::$api['workrecord']['clean'], [
    //         'access_token' => AccessToken::getToken()
    //     ]);

    //     $json = [
    //         'process_code' => $process_code,
    //         'corpid' => Config::$app_info['CORP_ID']
    //     ];
    //     return apiRequest::post($uri, $json);
    // }
    public static function create(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['create'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre = $json;

        $json = ['request' => array_merge($pre, [
            'agentid' => Config::$app_info['AGENT_ID']
        ])];
        return apiRequest::post($uri, $json);
    }
    public static function save(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['save'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre = $json;




        $json = ['saveProcessRequest' => array_merge($pre, [
            'agentid' => Config::$app_info['AGENT_ID']
        ])];
        return apiRequest::post($uri, $json);
    }
    public static function update(string $process_instance_id, string $status, string $result, bool $cancel_running_task = false)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['update'], [
            'access_token' => AccessToken::getToken()
        ]);

        $json = [
            'request' =>  [
                'agentid' => Config::$app_info['AGENT_ID'],
                'process_instance_id' => $process_instance_id,
                'status' => $status,
                'result' => $result,
                'cancel_running_task' => $cancel_running_task
            ]
        ];

        return apiRequest::post($uri, $json);
    }
    public static function batchupdate(string $process_instance_id, string $status, string $result)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['batchupdate'], [
            'access_token' => AccessToken::getToken()
        ]);
      
        $json = [
            'request' => [
                'process_instance_id' => $process_instance_id,
                'status' => $status,
                'result' => $result,
                'agentid' => Config::$app_info['AGENT_ID']
            ]
        ];

        return apiRequest::post($uri, $json);
    }
    public static function task_create(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['task_create'], [
            'access_token' => AccessToken::getToken()
        ]);
        $pre = $json;
        $json = ['request' => array_merge($pre, [
            'agentid' => Config::$app_info['AGENT_ID']
        ])];

        return apiRequest::post($uri, $json);
    }
    public static function task_query(string $userid, int $offset = 0,  int $status = 0, int $count = 5)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['task_query'], [
            'access_token' => AccessToken::getToken()
        ]);

        $json = [
            'userid' => $userid,
            'offset' => $offset,
            'count' => $count,
            'status' => $status,
        ];

        return apiRequest::post($uri, $json);
    }
    public static function task_update(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['task_update'], [
            'access_token' => AccessToken::getToken()
        ]);

        $pre = $json;
        $json = ['request' => array_merge($pre, [
            'agentid' => Config::$app_info['AGENT_ID']
        ])];

        return apiRequest::post($uri, $json);
    }
    public static function cancel(array $json)
    {
        $uri = Url::joinParams(Url::$api['workrecord']['cancel'], [
            'access_token' => AccessToken::getToken()
        ]);

        $pre = $json;

        $json = ['request' => array_merge($pre, [
            'agentid' => Config::$app_info['AGENT_ID']
        ])];

        return apiRequest::post($uri, $json);
    }
}
