<?php

declare(strict_types=1);

namespace SimpleDingTalk\v2;

use SimpleDingTalk\Config;

class Badge
{

    /**
     * 创建钉工牌电子码
     *
     * @param string $requestId
     * @param string $codeIdentity
     * @param string $status
     * @param string $userCorpRelationType
     * @param string $userIdentity
     * @param string $gmtExpired
     * @param array $availableTimes
     * @param array $extInfo
     * @param string $codeValue
     * @return mixed
     */
    public static function create(string $requestId, string $codeIdentity, string $status, string $userCorpRelationType, string $userIdentity, string $gmtExpired, array $availableTimes, array $extInfo, string $codeValue = '')
    {

        $uri = Url::$api['badge'] . '/codes/userInstances';
        $body = [
            'requestId' => $requestId,
            'corpId' => Config::$app_info['CORP_ID'],
            'codeIdentity' => $codeIdentity,
            'status' => $status,
            'userCorpRelationType' => $userCorpRelationType,
            'userIdentity' => $userIdentity,
            'gmtExpired' => $gmtExpired,
            'availableTimes' => $availableTimes,
            'extInfo' => json_encode($extInfo),
            'codeValue' => $codeValue
        ];

        return ApiRequest::post($uri, $body);
    }
    /**
     * 更新钉工牌电子码
     *
     * @param string $codeId
     * @param string $codeIdentity
     * @param string $status
     * @param string $userCorpRelationType
     * @param string $userIdentity
     * @param string $gmtExpired
     * @param array $availableTimes
     * @param array $extInfo
     * @param string $codeValue
     * @return mixed
     */
    public static function update(string $codeId, string $codeIdentity, string $status, string $userCorpRelationType, string $userIdentity, string $gmtExpired, array $availableTimes, array $extInfo, string $codeValue = '')
    {

        $uri = Url::$api['badge'] . '/codes/userInstances';
        $body = [
            'codeId' => $codeId,
            'corpId' => Config::$app_info['CORP_ID'],
            'codeIdentity' => $codeIdentity,
            'status' => $status,
            'userCorpRelationType' => $userCorpRelationType,
            'userIdentity' => $userIdentity,
            'gmtExpired' => $gmtExpired,
            'availableTimes' => $availableTimes,
            'extInfo' => json_encode($extInfo),
            'codeValue' => $codeValue
        ];

        return ApiRequest::post($uri, $body);
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
        $body['corpId'] = Config::$app_info['CORP_ID'];
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
        $body['corpId'] = Config::$app_info['CORP_ID'];
        return ApiRequest::post($uri, $body);
    }
    /**
     * 同步钉工牌码验证结果
     *
     * @param string $payCode
     * @param string $userCorpRelationType
     * @param string $userIdentity
     * @param string $verifyTime
     * @param boolean $verifyResult
     * @param string $verifyLocation
     * @return mixed
     */
    public static function verifyResults(string $payCode, string $userCorpRelationType, string $userIdentity, string $verifyTime, bool $verifyResult, string $verifyLocation)
    {

        $uri = Url::$api['badge'] . '/codes/verifyResults';
        $body = [
            'payCode' => $payCode,
            'corpId' => Config::$app_info['CORP_ID'],
            'userCorpRelationType'=>$userCorpRelationType,
            'userIdentity'=>$userIdentity,
            'verifyTime'=>$verifyTime,
            'verifyResult'=>$verifyResult,
            'verifyLocation'=>$verifyLocation
        ];
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
    public static function corpInstances(string $codeIdentity,string $status,array $extInfo)
    {
        $uri = Url::$api['badge'] . '/codes/corpInstances';
        $body = [
            'codeIdentity' => $codeIdentity,
            'corpId' => Config::$app_info['CORP_ID'],
            'status'=>$status,
            'extInfo'=>json_encode($extInfo)
          
        ];
        return ApiRequest::post($uri, $body);
    }
}
