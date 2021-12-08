<?php

declare(strict_types=1);

namespace SimpleDingTalk;
use SimpleDingTalk\DingSpace\ApiRequest;
use CURLFile;
/**
 * 文件存储
 */
class Media
{
    /**
     * 上传媒体文件
     *
     * @param string $file
     * @param string $type
     * @return mixed
     */
    public static function upload(string $file,string $type)
    {
        $uri = Url::$api['media']['upload'];
      
        $file_infos=['media' => new CURLFILE($file),'type'=>$type];
        return ApiRequest::upload_file($uri, [], $file_infos);
    }
}