<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;
use SimpleDingTalk\Config;
use SimpleDingTalk\util\IDgenerator;
class Badge{
   

    public static function create(string $codeIdentity,string $status,string $userCorpRelationType,string $userIdentity,string $gmtExpired,array $availableTimes,string $codeValue='')
    {
        $IDgenerator=new IDgenerator();
        $requestId=$IDgenerator->make();
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
            'codeValue'=>$codeValue
        ];
    
        return apiRequest::post($uri, $body);
    }
}