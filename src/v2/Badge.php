<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;

class Badge
{

    /**
     * 创建钉工牌电子码
     *
     * @param array $body
     * @return mixed
     */
    public static function create(array $body)
    {

        $uri = Url::$api['badge'] . '/codes/userInstances';
        $body['corpId']=Config::getCorpId();
        

        return ApiRequest::post($uri, $body);
    }
    /**
     * 更新钉工牌电子码
     *
     * @param array $body
     * @return mixed
     */
    public static function update(array $body)
    {

        $uri = Url::$api['badge'] . '/codes/userInstances';
        $body['corpId']=Config::getCorpId();
       

        return ApiRequest::put($uri, $body);
    }
    /**
     * 解码钉工牌电子码
     *
     * @param string $payCode
     * @param string $requestId
     * @return mixed
     */
    public static function decode(string $payCode, string $requestId)
    {

        $uri = Url::$api['badge'] . '/codes/decode';
        $body = [
            'payCode' => $payCode,
            'requestId' => $requestId
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 通知支付结果
     *
     * @param array $body
     * @return mixed
     */
    public static function payResults(array $body)
    {

        $uri = Url::$api['badge'] . '/codes/payResults';
        $body['corpId'] = Config::getCorpId();
        $extInfo= json_encode($body['payChannelDetailList'][0]['fundToolDetailList'][0]['extInfo']);
        $body['payChannelDetailList'][0]['fundToolDetailList'][0]['extInfo']=$extInfo;
        $extInfo=json_encode($body['extInfo']);
        $body['extInfo']=$extInfo;
        return ApiRequest::post($uri, $body);
    }
    /**
     * 通知退款结果
     *
     * @param array $body
     * @return mixed
     */
    public static function refundResults(array $body)
    {

        $uri = Url::$api['badge'] . '/codes/refundResults';
        $body['corpId'] = Config::getCorpId();
        $extInfo= json_encode($body['payChannelDetailList'][0]['fundToolDetailList'][0]['extInfo']);
        $body['payChannelDetailList'][0]['fundToolDetailList'][0]['extInfo']=$extInfo;
       
        return ApiRequest::post($uri, $body);
    }
    /**
     * 同步钉工牌码验证结果
     *
     * @param array $body
     
     * @return mixed
     */
    public static function verifyResults(array $body)
    {

        $uri = Url::$api['badge'] . '/codes/verifyResults';
        $body['corpId'] = Config::getCorpId();
      
        return ApiRequest::post($uri, $body);
    }
    /**
     * 配置企业钉工牌
     *
     * @param string $codeIdentity
     * @param string $status
     * @param array $extInfo
     * @return mixed
     */
    public static function corpInstances(string $codeIdentity,string $status,array $extInfo=[])
    {
        $uri = Url::$api['badge'] . '/codes/corpInstances';
        $body = [
            'codeIdentity' => $codeIdentity,
            'corpId' => Config::getCorpId(),
            'status'=>$status,
            'extInfo'=>$extInfo
          
        ];
        return ApiRequest::post($uri, $body);
    }
}
