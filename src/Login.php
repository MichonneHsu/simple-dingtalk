<?php declare(strict_types=1);

namespace SimpleDingTalk;




class Login
{
    private static $urls = [
        'redirect_uri' => '',
        'getuserinfo_bycode' => '/sns/getuserinfo_bycode',
        'sns_authorize' => '/connect/oauth2/sns_authorize',
        'getUseridByUnionid' => '/topapi/user/getbyunionid',
    ];
    
    public static function getuserinfo_bycode(string $tmp_auth_code)
    {
        $params = [

            'accessKey' => Config::$app_info['APP_KEY'],
            'timestamp' => self::getMillisecond(),
            'signature' => self::signature()

        ];
        $uri = self::$urls['getuserinfo_bycode'];
        $uri = apiRequest::joinParams($uri, $params);
        $json = [
            'tmp_auth_code' => $tmp_auth_code
        ];
        $http = apiRequest::post($uri,$json);
       
        
        return $http;
    }

    public static function getUseridByUnionid(string $unionid)
    {
        $access_token=AccessToken::getToken();
        $uri = self::$urls['getUseridByUnionid'];
        $params = [
            'access_token'=> $access_token
        ];
        $uri = apiRequest::joinParams($uri, $params);
        $json = [
            'unionid' => $unionid
        ];
        $http = apiRequest::post($uri,$json);
       
       
        return $http;
    }

    public static function sns_authorize(string $tmp_auth_code): string
    {

        $params = [
            'appid' => Config::$app_info['APP_KEY'],
            'response_type' => 'code',
            'scope' => 'snsapi_login',
            'state' => 'STATE',
            'redirect_uri' => self::$urls['redirect_uri'],
            'loginTmpCode' => $tmp_auth_code
        ];
        $uri = Url::$api['domain'].self::$urls['sns_authorize'];
        return apiRequest::joinParams($uri, $params);
    }
    private static function signature(): string
    {


        $s = hash_hmac('sha256', self::getMillisecond(), Config::$app_info['APP_SECRET'], true);

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
