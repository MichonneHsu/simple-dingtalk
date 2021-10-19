<?php

declare(strict_types=1);

namespace SimpleDingTalk;

use SimpleDingTalk\util\encrypt\DingCallbackCrypto;
use SimpleDingTalk\Config;

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
        $callback_info = Config::$callback_info;
        $token = $callback_info['token'];
        $encodingAesKey = $callback_info['aes_key'];
        $ownerKey = Config::$app_info['APP_KEY'];
        $crypt=(new DingCallbackCrypto($token, $encodingAesKey, $ownerKey));
        $text = $crypt->getDecryptMsg($signature, $timeStamp, $nonce, $encrypt);
        $res = $crypt->getEncryptedMap("success");
        return [
            'getDecryptMsg'=>$text,
            'getEncryptedMap'=>$res
        ];
    }
}
