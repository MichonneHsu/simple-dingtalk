<?php
declare(strict_types=1);
namespace SimpleDingTalk\util;
use Exception;
use SimpleDingTalk\Config;
use DateTime;
class Sign{

    public static function signature(): string
    {

        // $millisecond=self::getMillisecond();
        // $s = hash_hmac('sha256', $millisecond, Config::$app_info['app'][Config::$app_type]['app_info']['APP_SECRET'], true);

      
        // return [
        //     'signature'=>urlencode(base64_encode($s)),
        //     'timestamp'=>$millisecond
        // ];
        $key=Config::getApp()['app_info']['APP_SECRET'];
        $s = hash_hmac('sha256', self::getMillisecond(), $key, true);

        $signature = base64_encode($s);
     
        return $signature;
    }

    public static function getMillisecond(): string
    {
        list($s1, $s2) = explode(' ', microtime());
        return (string)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
 
}