<?php

declare(strict_types=1);

namespace SimpleDingTalk\DingSpace;

use SimpleDingTalk\Config;
use SimpleDingTalk\Url;

class File
{

    public static function add_to_single_chat(string $userid,string $file_name,string $media_id){
        $file_name=urlencode($file_name);
        $media_id=urlencode($media_id);
        
        $uri=Url::$api['cspace']['add_to_single_chat'];
        $json=[
            'file_name'=>$file_name,
            'media_id'=>$media_id,
            'userid'=>$userid,
            'agent_id'=>(string)Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID']
        ];
        // file_put_contents('ca.log',json_encode($json));
        return apiRequest::post($uri,$json);
    }

    public static function upload_single(string $file,int $file_size = 819200)
    {
        $uri=Url::$api['cspace']['file']['upload_single'];
        $params=[
            'agent_id'=> Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'],
            'file_size'=>$file_size
            
        ];
        return apiRequest::upload_file($uri,$params,$file);
    }



    public static function add(string $name,string $code,string $media_id,string $space_id,bool $overwrite=true,string $folder_id=''){
        $uri=Url::$api['cspace']['add'];
        $query=[
            'agent_id'=> Config::$app_info['app'][Config::$app_type]['app_info']['AGENT_ID'],
            'name'=>$name,
            'code'=>$code,
            'media_id'=>$media_id,
            'space_id'=>$space_id,
            'overwrite'=>$overwrite,
            'folder_id'=>$folder_id
        ];
        
        return apiRequest::get($uri,$query);
    }
}
