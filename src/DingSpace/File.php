<?php

declare(strict_types=1);

namespace SimpleDingTalk\DingSpace;

use SimpleDingTalk\Config;
use SimpleDingTalk\Url;
class File
{


    public static function upload_single(string $file, int $file_size = 819200)
    {
        $uri=Url::$api['cspace']['file']['upload_single'];
        $params=[
            'file_size'=>$file_size,
            'agent_id'=> Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID']
        ];
        $uri=apiRequest::joinParams($uri,$params);
        $multipart = [
            [
                'name' => 'file',
                'contents' => $file
            ]
        ];

        return apiRequest::post($uri,$multipart);
    }
}
