<p align="center" style="color:gray;font-family: Arial, Helvetica, sans-serif; margin:150px 0;">钉钉服务端API</p>
<p align="center">
<a href="https://developers.dingtalk.com/?spm=ding_open_doc.document.0.0.3a2565733BtFVA">
<img src="https://images.gitee.com/uploads/images/2021/1006/105453_40454723_8010855.png" alt="dingtalk" width="180"/>
</a>
</p>
<p align="center" style="font-family: Arial, Helvetica, sans-serif;">钉钉服务端PHP-API，简化初学者的使用难度。</p>
<p align="center">
<img src="https://img.shields.io/badge/PHP-7.3+-green" />
<img src="https://img.shields.io/badge/release-1.0.1-orange" />
<img alt="GitHub" src="https://img.shields.io/github/license/MichonneHsu/simple-dingtalk">
</p>

#### 安装方式
`composer require michonnehsu/simpledingtalk`
#### [文档地址](https://gitee.com/michonnehsu/simple-dingtalk/wikis/pages)
**需要新的功能请发起** [issues](https://gitee.com/michonnehsu/simple-dingtalk/issues)  
#### 配置
```
$app_info=[
    'CORP_ID'=>'',企业唯一corpid
    'AGENT_ID' => '',应用的agentId
    'APP_KEY'=>'',应用的唯一标识key
    'APP_SECRET'=>''应用的密钥
];
$access_token=[
    'expires'=>0,提前过期时间，主要用于接口返回的token日期减去已设的秒数是否大于当前时间,然后提前去生成token;单位：秒
    'file_path'=>''凭证文件的绝对路径   例如：/usr/local/xxxx/public/access_token.json
];
$callback_info=[
     'aes_key'=>'',事件订阅生成的aes_key
     'token'=>''事件订阅生成的token
];
#修改方式：
use SimpleDingTalk\Config;
Config::$app_info = [
    'CORP_ID'=>'',
    'AGENT_ID' => '',
    'APP_KEY'=>'',
    'APP_SECRET'=>''
];
Config::$access_token=[
    'expires'=>0,
    'file_path'=>''
];
Config::$callback_info=[
     'aes_key'=>'',
     'token'=>''
];
新版服务端-API配置
use SimpleDingTalk\v2\Config as v2_config;

v2_config::$access_token = [
    'expires' => 0,
    'file_path' => ''
];


```
#### 案例
```
use SimpleDingTalk\WorkFlow;

$json=[
    'process_instance_id'=>$process_instance_id,
    'text'=>'测试评论',
    'comment_userid'=>$userid
];
WorkFlow::add_comment($json);
```
#### 函数定义规则
1. 如果接口需要的参数复杂并且有必填和非必填的话，函数需要的参数需要开发者自行组装参数。
2. 如果接口需要的参数不复杂并且有必填和非必填，则只需要按照函数所需填入即可。
3. 如果接口需要的参数全是必填的话则函数需要的参数不需要完全自行组装参数，按照函数所需的参数填入即可。

#### 关于本扩展
如果小伙伴有定制需求的话可以发[issues](https://gitee.com/michonnehsu/simple-dingtalk/issues)。