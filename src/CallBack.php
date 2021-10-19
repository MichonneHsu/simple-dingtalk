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
     * @return mixed
     */
    public static function getEncryptedMap()
    {
        $callback_info = Config::$callback_info;
        $token = $callback_info['token'];
        $encodingAesKey = $callback_info['aes_key'];
        $ownerKey = Config::$app_info['APP_KEY'];
        return (new DingCallbackCrypto($token, $encodingAesKey, $ownerKey));
    }
}
