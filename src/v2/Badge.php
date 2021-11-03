<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;
use SimpleDingTalk\Config;

class Badge{
   

    public static function create(string $requestId,string $codeIdentity,string $status,string $userCorpRelationType,string $userIdentity,string $gmtExpired,array $availableTimes,array $extInfo,string $codeValue='')
    {
        
        $uri = Url::$api['badge'] .'/codes/userInstances';
        $body=[
            'requestId'=>$requestId,
            'corpId'=>Config::$app_info['CORP_ID'],
            'codeIdentity'=>$codeIdentity,
            'status'=>$status,
            'userCorpRelationType'=>$userCorpRelationType,
            'userIdentity'=>$userIdentity,
            'gmtExpired'=>$gmtExpired,
            'availableTimes'=>$availableTimes,
            'extInfo'=>json_encode($extInfo),
            'codeValue'=>$codeValue
        ];
    
        return apiRequest::post($uri, $body);
    }
    public static function update(string $codeId,string $codeIdentity,string $status,string $userCorpRelationType,string $userIdentity,string $gmtExpired,array $availableTimes,array $extInfo,string $codeValue='')
    {
        
        $uri = Url::$api['badge'] .'/codes/userInstances';
        $body=[
            'codeId'=>$codeId,
            'corpId'=>Config::$app_info['CORP_ID'],
            'codeIdentity'=>$codeIdentity,
            'status'=>$status,
            'userCorpRelationType'=>$userCorpRelationType,
            'userIdentity'=>$userIdentity,
            'gmtExpired'=>$gmtExpired,
            'availableTimes'=>$availableTimes,
            'extInfo'=>json_encode($extInfo),
            'codeValue'=>$codeValue
        ];
    
        return apiRequest::post($uri, $body);
    }
    public static function decode(string $payCode,string $requestId)
    {
        
        $uri = Url::$api['badge'] .'/codes/decode';
        $body=[
            'payCode'=>$payCode,
            'requestId'=>$requestId
        ];
    
        return apiRequest::post($uri, $body);
    }
}