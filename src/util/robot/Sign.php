<?php
declare(strict_types=1);
namespace SimpleDingTalk\util\robot;

use SimpleDingTalk\Config;

class Sign{

    public static function signature()
    {   
        
        $APP_SECRET=Config::getRobot()['info']['SEC'];
        
        $getMillisecond=self::getMillisecond();
        $sign_raw=$getMillisecond."\n".$APP_SECRET;
        $s = hash_hmac('sha256', $sign_raw, $APP_SECRET, true);

        $signature = base64_encode($s);

       
        return [
            'sign'=>$signature,
            'timestamp'=>$getMillisecond
        ];
    }

    public static function getMillisecond(): string
    {
        list($s1, $s2) = explode(' ', microtime());
        return (string)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
 
}