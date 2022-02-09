<?php

require_once '../Config.php';

use SimpleDingTalk\v2\Authentication\Authorize;
use SimpleDingTalk\v2\AccessToken;
use SimpleDingTalk\v2\Contact;
// 通过Authorize类去获取统一第三方免登链接
$url=Authorize::assemble_url();
// 结果：https://login.dingtalk.com/oauth2/auth?client_id=APP_KEY&response_type=code&scope=openid&state=123aawq&prompt=consent&redirect_uri=https%3A%2F%2Fwww.dingtalk.com/login/authPage.html
// 会跳转在配置里设置好的`·`redirect_uri`参数
// 钉钉会返回一个`authCode`的参数
// 设置一下userAccessToken的 获取个授权人信息的Token配置
$authCode=$_GET['authCode'];
AccessToken::setCode($authCode);
// 最后Contact类调用getPersonalInfo并设置 me 为参数
$userinfo=Contact::getPersonalInfo('me');
// 打印结果出来
print_r($userinfo);
