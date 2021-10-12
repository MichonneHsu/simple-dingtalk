<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class Url
{
    public static $api = [
        'domain' => 'https://oapi.dingtalk.com',
        'gettoken' => '/gettoken',
        'user' => [
            'getuserinfo' => '/user/getuserinfo',
            'create' => '/topapi/v2/user/create',
            'update' => '/topapi/v2/user/update',
            'remove' => '/topapi/v2/user/delete',
            'get' => '/topapi/v2/user/get',
            'listsimple' => '/topapi/user/listsimple',
            'listid' => '/topapi/user/listid',
            'list' => '/topapi/v2/user/list',
            'count' => '/topapi/user/count',
            'listadmin' => '/topapi/user/listadmin',
            'get_admin_scope' => '/topapi/user/get_admin_scope',
            'can_access_microapp' => '/user/can_access_microapp',
            'getbymobile' => '/topapi/v2/user/getbymobile',
            'getbyunionid' => '/topapi/user/getbyunionid',
            'getinactive' => '/topapi/inactive/user/get'
        ],
        'department' => [
            'create' => '/topapi/v2/department/create',
            'update' => '/topapi/v2/department/update',
            'remove' => '/topapi/v2/department/delete',
            'get' => '/topapi/v2/department/get',
            'listsub' => '/topapi/v2/department/listsub',
            'listsubid' => '/topapi/v2/department/listsubid',
            'listparentbyuser' => '/topapi/v2/department/listparentbyuser',
            'listparentbydept' => '/topapi/v2/department/listparentbydept'
        ],
        'contact_log' => [
            'get_department' => '/topapi/industry/department/get',
            'get_user_list' => '/topapi/industry/user/list',
            'get_department_list' => '/topapi/industry/department/list',
            'get_user' => '/topapi/industry/user/get',
            'get_organization' => '/topapi/industry/organization/get',
        ],
        'notification' => [
            'corpconversation' => '/topapi/message/corpconversation/asyncsend_v2',
            'update_status_bar' =>'/topapi/message/corpconversation/status_bar/update',
            'getsendprogress'=>'/topapi/message/corpconversation/getsendprogress',
            'getsendresult'=>'/topapi/message/corpconversation/getsendresult',
            'recall'=>'/topapi/message/corpconversation/recall'
        ],
        'workflow'=>[
            'save'=>'/topapi/process/save',
            'create'=>'/topapi/processinstance/create',
            'terminate'=>'/topapi/process/instance/terminate',
            'get_file'=>'/topapi/processinstance/file/url/get',
            'get_detail'=>'/topapi/processinstance/get',
            'get_list'=>'/topapi/processinstance/get',
        ]


    ];

    public static function joinParams(string $uri, array $params): string
    {


        $url = $uri . '?' . http_build_query($params);

        return urldecode($url);
    }
}
