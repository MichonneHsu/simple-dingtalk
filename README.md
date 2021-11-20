<p align="center" style="color:gray;font-family: Arial, Helvetica, sans-serif; margin:150px 0;">钉钉服务端API</p>
<p align="center">
<a href="https://developers.dingtalk.com/?spm=ding_open_doc.document.0.0.3a2565733BtFVA">
<img src="https://images.gitee.com/uploads/images/2021/1006/105453_40454723_8010855.png" alt="dingtalk" width="180"/>
</a>
</p>
<p align="center" style="font-family: Arial, Helvetica, sans-serif;">钉钉服务端PHP-API，简化初学者的使用难度。</p>
<p align="center">
<img src="https://img.shields.io/badge/PHP-7.3+-green" />
<img src="https://img.shields.io/badge/release-1.0.2-orange" />
<img src="https://img.shields.io/badge/license-MIT-green" />
</p>

### 安装方式
`composer require michonnehsu/simpledingtalk`
### 文档地址
点击访问[文档](https://gitee.com/michonnehsu/simple-dingtalk/wikis/pages)  

### 配置
预先配置多个应用后，只修改app_type 进行切换。  
预先配置多个机器人后，只修改robot_type 进行切换。
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
scan_info：扫码登录信息
scan_info->redirect_uri：跳转url
userAccessToken：
v2：新版服务端信息
robot:群聊机器人
robot->SEC：机器人的加签码，用于加密发送消息。可在群设置的智能群助手的机器人信息里查看
robot->access_token：机器人的发送群消息token
配置格式：
Config::$app_type = 'miniprogram_app';
Config::$robot_type = 'robot1';
Config::$app_info = [
	'CORP_ID' => '',
    'app' => [
		'miniprogram_app' => [
			 'app_info'=>[
                'AGENT_ID' => 0,
    		    'APP_KEY' => '',
    		    'APP_SECRET' => '',
            ],
			'access_token' => [
				'expires' => 0,
				'file_path' => './a.json'
			],
            'callback_info'=>[
                'aes_key' => '',
                'token' => ''
            ],
            'scan_info'=>[
                 'redirect_uri'=>''
            ],
			'v2' => [
				'access_token' => [
					'expires' => 180,
					'file_path' => './c.json'
				]
			],
             'userAccessToken'=>[
				'expires' => 180,
				'file_path' => './user.json'
			]
		],
		'micro_app'=>[
			 'app_info'=>[
                'AGENT_ID' => 0,
    		    'APP_KEY' => '',
    		    'APP_SECRET' => '',
            ],
			'access_token'=>[
				'expires' => 0,
				'file_path' => './a.json'
			],
            'callback_info'=>[
                'aes_key' => '',
                'token' => ''
            ],
            'scan_info'=>[
                'redirect_uri'=>''
            ],
			'v2'=>[
				'access_token'=>[
					'expires' => 0,
					'file_path' => './c.json'
				]
			],
             'userAccessToken'=>[
				'expires' => 180,
				'file_path' => './user.json'
			]
		]
],
'robot'=>[
            'robot1' => [
                'info' => [
                    'AGENT_ID' => 0,
                    'APP_KEY' => '',
                    'APP_SECRET' => '',
                    'access_token'=>'',
                    'SEC'=>''
                ],
                'access_token' => [
                    'expires' => 0,
                    'file_path' => './robot1.json'
                ]
                
            ],
            'robot2' => [
                'info' => [
                    'AGENT_ID' => 0,
                    'APP_KEY' => '',
                    'APP_SECRET' => '',
                    'access_token'=>'',
                     'SEC'=>''
                ],
                'access_token' => [
                    'expires' => 0,
                    'file_path' => './robot2.json'
                ]
        ],
    ]
];
```
### 用法
#### 基础用法
```
use SimpleDingTalk\WorkFlow;

$json=[
    'process_instance_id'=>$process_instance_id,
    'text'=>'测试评论',
    'comment_userid'=>$userid
];
WorkFlow::add_comment($json);
```
### 函数定义规则
1. 如果接口需要的参数复杂并且有必填和非必填的话，函数需要的参数需要开发者自行组装参数。
2. 如果接口需要的参数不复杂并且不多、有必填和非必填，则只需要按照函数所需填入即可。
3. 如果接口需要的参数全是必填的话则函数需要的参数不需要完全自行组装参数，按照函数所需的参数填入即可。