<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class Auth
{


    public static function getConfig($href)
    {
        $app_info = Config::$app_info;
        $corpId = $app_info['CORP_ID'];
        $agentId = $app_info[Config::$app_type]['AGENT_ID'];
        $nonceStr = self::getRandomAlphabet();
        $timeStamp = time();
        $url = urldecode($href);
       
        $ticket = JsapiTicket::getToken();
        $signature = self::sign($ticket, $nonceStr, $timeStamp, $url);

        $config = array(
            'url' => $url,
            'nonceStr' => $nonceStr,
            'agentId' => $agentId,
            'timeStamp' => $timeStamp,
            'corpId' => $corpId,
            'signature' => $signature
        );
        return $config;
    }
    public static function sign($ticket, $nonceStr, $timeStamp, $url)
    {
        $plain = 'jsapi_ticket=' . $ticket .
            '&noncestr=' . $nonceStr .
            '&timestamp=' . $timeStamp .
            '&url=' . $url;
        return sha1($plain);
    }
    function curPageURL()
    {
        $pageURL = 'http';

        if (array_key_exists('HTTPS',$_SERVER)&&$_SERVER["HTTPS"] == "on")
        {
            $pageURL .= "s";
        }
        $pageURL .= "://";

        if ($_SERVER["SERVER_PORT"] != "80")
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        }
        else
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    public static function getRandomAlphabet(int $count = 5)
    {
        $alphabet = range('a', 'z');
        $alphabets = '';
        for ($i = 0; $i < $count; $i++) {
            $alphabets .= $alphabet;
        }

        return str_shuffle($alphabets);
    }
}
