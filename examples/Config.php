<?php

require_once './vendor/autoload.php';
use SimpleDingTalk\Config;
// 配置信息
$apps=[
	'miniprogram_app' => [
		'info' => [
			'AGENT_ID' => 123456,
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
			'aes_key' => 'i0id7pAhp22josGT2FXuVJCI9lIHQb',
			'token' => 'TmeODpsxpWtm338QmPP0c16'
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
			'AGENT_ID' => 123456,
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
setCorpId('dasd123465');