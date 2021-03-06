<p align="center">
<a href="https://developers.dingtalk.com/?spm=ding_open_doc.document.0.0.3a2565733BtFVA">
<img src="https://images.gitee.com/uploads/images/2021/1006/105453_40454723_8010855.png" alt="dingtalk" width="180"/>
</a>
</p>
<p align="center" style="font-family: Arial, Helvetica, sans-serif;">轻量级钉钉服务端PHP-SDK，简化初学者的使用难度。</p>
<p align="center">
<img src="https://img.shields.io/badge/PHP-7.3^|8^-green" />
<img src="https://img.shields.io/badge/release-1.0.7^-orange" />
<img src="https://img.shields.io/badge/license-MIT-green" />
</p>

### 介绍
这是一款PHP编写的轻量级钉钉服务端扩展包，以最简单的方式取调用、源码易懂、模块化。

### 安装方式
`composer require michonnehsu/simpledingtalk`
### 文档地址
点击访问[文档](https://gitee.com/michonnehsu/simple-dingtalk/wikis/pages)  
### 配置信息介绍
```
关键字解释：

CORP_ID：当前公司的Corp_id
app：微应用或小程序
APP_KEY：当前应用的app_key
APP_SECRET：当前应用的app_secret
access_token：当前应用的access_token信息
access_token->expires：access_token的提前超时重新获取时间，单位秒
access_token->file_path：access_token的文件路径，建议填写绝对路径
callback_info：回调信息
callback_info->aes_key：当前应用的加密
callback_info->token：当前应用的签名
login_info：扫码登录信息
login_info->authorize->redirect_uri：统一授权登录第三方网站
login_info->authorize->dingtalk_login_uri：钉钉内免登第三方网站跳转url
userAccessToken：获取用户通讯录个人信息需要的token信息
v2：新版服务端信息
robot:群聊机器人
robot->SEC：机器人的加签码，用于加密发送消息。可在群设置的智能群助手的机器人信息里查看
```
### 如何配置
```
如何配置：
$apps=[
	'miniprogram_app' => [
		'info' => [
			'AGENT_ID' => 0,
			'APP_KEY' => '',
			'APP_SECRET' => '',
		],
		'access_token' => [
			'expires' => 180,
			'file_path' => './a.json'
		],
		'login_info' => [
			'authorize' => [
				'redirect_uri' => 'https://www.dingtalk.com',
				'dingtalk_login_uri'=>'https://www.dingtalk.com'
			]
		],
		'callback_info' => [
                    'aes_key' => '',
                    'token' => ''
         ],
		'v2' => [
			'access_token' => [
				'expires' => 180,
				'file_path' => './c.json'
			]
		],
		'userAccessToken' => [
			'expires' => 180,
			'file_path' => './uat.json'
		]
	],
];

$robots=[
	'robot1' => [
		'info' => [
			'AGENT_ID' => 0,
			'APP_KEY' => '',
			'APP_SECRET' => '',
			'access_token' => '',
			'SEC' => ''
		],
		'access_token' => [
			'expires' => 180,
			'file_path' => './robot.json'
		]

	],
];
Config::setRobot($robots)->
setApp($apps)->
setAppType('miniprogram_app')->
setRobotType('robot1')->
setCorpId('dingf0xxxxx69');

```
### 例子
```
require_once './vendor/autoload.php';

use SimpleDingTalk\WorkFlow;

$json=[
    'process_instance_id'=>$process_instance_id,
    'text'=>'测试评论',
    'comment_userid'=>$userid
];
WorkFlow::add_comment($json);
```

## 使用须知
不推荐使用phpstudy,有兼容问题，推荐xampp，lnmp能正常运行代码