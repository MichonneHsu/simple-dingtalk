<?php
declare(strict_types=1);
namespace SimpleDingTalk\util;
use Exception;
use SimpleDingTalk\Config;
use DateTime;
class Sign{

    public static function signature(): string
    {


        $s = hash_hmac('sha256', self::getMillisecond(), Config::$app_info['app'][Config::$app_type]['APP_SECRET'], true);

        $signature = base64_encode($s);

        $urlencode_signature = urlencode($signature);
        return $urlencode_signature;
    }

    public static function getMillisecond(): string
    {
        list($s1, $s2) = explode(' ', microtime());
        return (string)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
 
}