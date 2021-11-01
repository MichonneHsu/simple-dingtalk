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
        $params = [

            'accessKey' => Config::$app_info['app'][Config::$app_type]['APP_KEY'],
            'timestamp' => self::getMillisecond(),
            'signature' => self::signature()

        ];
        $uri = self::$urls['getuserinfo_bycode'];
        $uri = apiRequest::joinParams($uri, $params);
        $json = [
            'tmp_auth_code' => $tmp_auth_code
        ];
        $has_token =false;
        $http = apiRequest::post($uri,$json,$has_token);
       
        
        return $http;
    }



    public static function sns_authorize(string $tmp_auth_code): string
    {
        $app=Config::$app_info['app'][Config::$app_type];
        $params = [
            'appid' => $app['APP_KEY'],
            'response_type' => 'code',
            'scope' => 'snsapi_login',
            'state' => 'STATE',
            'redirect_uri' =>$app['scan_info']['redirect_uri'],
            'loginTmpCode' => $tmp_auth_code
        ];
        $uri = Url::$api['domain'].self::$urls['sns_authorize'];
        return apiRequest::joinParams($uri, $params);
    }
    private static function signature(): string
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
