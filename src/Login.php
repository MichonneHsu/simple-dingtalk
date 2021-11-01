<?php declare(strict_types=1);

namespace SimpleDingTalk;




class Login
{
    private static $urls = [
        'getuserinfo_bycode' => '/sns/getuserinfo_bycode',
        'sns_authorize' => '/connect/oauth2/sns_authorize',
        'getUseridByUnionid' => '/topapi/user/getbyunionid',
    ];
    
    

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
   
}
