<?php declare(strict_types=1);
namespace SimpleDingTalk;


class Config{
    public static $api=[
        'domain' => 'https://oapi.dingtalk.com',
        'gettoken' => '/gettoken',
        'user'=>[
            'getuserinfo'=>'/user/getuserinfo',
            'create'=>'/topapi/v2/user/create',
            'update'=>'/topapi/v2/user/update',
            'delete'=>'/topapi/v2/user/delete',
            'get'=>'/topapi/v2/user/get',
            'listsimple'=>'/topapi/user/listsimple',
            'listid'=>'/topapi/user/listid',
            'list'=>'/topapi/v2/user/list',
            'count'=>'/topapi/user/count',
            'listadmin'=>'/topapi/v2/user/listadmin',
            'get_admin_scope'=>'/topapi/user/get_admin_scope',
            'can_access_microapp'=>'/user/can_access_microapp'
        ],
     
       
    ];
    public static $app_info=[
      
        'APP_KEY'=>'',
        'APP_SECRET'=>''
    ];
    public static $access_token=[
        'expires'=>0,
        'file_path'=>''
    ];
} 