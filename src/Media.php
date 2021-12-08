<?php

declare(strict_types=1);

namespace SimpleDingTalk;
use SimpleDingTalk\DingSpace\ApiRequest;
use CURLFile;

class Media
{
    public static function upload(string $file)
    {
        $uri = Url::$api['media']['upload'];
      
        $file_infos=['media' => new CURLFILE($file),'type'=>'file'];
        return ApiRequest::upload_file($uri, [], $file_infos);
    }
}