<?php

declare(strict_types=1);

namespace SimpleDingTalk;

use SimpleDingTalk\util\encrypt\DingCallbackCrypto;

/**
 * 回调事件
 */
class CallBack
{
    /**
     * 解码加密信息
     *
     * @param string $signature
     * @param string $timeStamp
     * @param string $nonce
     * @param string $encrypt
     * @return array
     */
    public static function getEncryptedMap(string $signature,string $timeStamp,string $nonce,string $encrypt):array
    {
        $getApp=Config::getApp();
        $callback_info = $getApp['callback_info'];
        $token = $callback_info['token'];
        $encodingAesKey = $callback_info['aes_key'];
        $ownerKey = $getApp['info']['APP_KEY'];
        $crypt=(new DingCallbackCrypto($token, $encodingAesKey, $ownerKey));
        $text = $crypt->getDecryptMsg($signature, $timeStamp, $nonce, $encrypt);
        $res = $crypt->getEncryptedMap("success");
        return [
            'msg'=>json_decode($text, true),
            'map'=>json_decode($res, true)
        ];
    }

    public static function get_callback_failed_lists(){
        $uri=Url::$api['callback'];
        return ApiRequest::get($uri);
    }
}
