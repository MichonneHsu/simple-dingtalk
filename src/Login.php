<?php declare(strict_types=1);

namespace SimpleDingTalk;




class Login
{
    private static $urls = [
        'getuserinfo_bycode' => '/sns/getuserinfo_bycode',
        'sns_authorize' => '/connect/oauth2/sns_authorize',
        'getUseridByUnionid' => '/topapi/user/getbyunionid',
    ];
    
    public static function getuserinfo_bycode(string $tmp_auth_code)
    {
        return User::getuserinfo_bycode($tmp_auth_code);
    }



    public static function sns_authorize(string $tmp_auth_code)
    {
        return User::sns_authorize($tmp_auth_code);
    }

    
    private static function signature()
    {


        $s = hash_hmac('sha256', self::getMillisecond(), Config::$app_info['app'][Config::$app_type]['APP_SECRET'], true);

        $signature = base64_encode($s);

        $urlencode_signature = urlencode($signature);
        return $urlencode_signature;
    }

    private static function getMillisecond(): string
    {
        list($s1, $s2) = explode(' ', microtime());
        return (string)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
}
