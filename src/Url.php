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
            'update_status_bar' => '/topapi/message/corpconversation/status_bar/update',
            'getsendprogress' => '/topapi/message/corpconversation/getsendprogress',
            'getsendresult' => '/topapi/message/corpconversation/getsendresult',
            'recall' => '/topapi/message/corpconversation/recall'
        ],
        'workflow' => [
            'save' => '/topapi/process/save',
            'create' => '/topapi/processinstance/create',
            'terminate' => '/topapi/process/instance/terminate',
            'get_file' => '/topapi/processinstance/file/url/get',
            'get_detail' => '/topapi/processinstance/get',
            'get_list' => '/topapi/processinstance/listids',
            'gettodonum' => '/topapi/process/gettodonum',
            'listbyuserid' => '/topapi/process/listbyuserid',
            'space_info' => '/topapi/processinstance/cspace/info',
            'space_preview' => '/topapi/processinstance/cspace/preview',
            'condition_list' => '/topapi/process/form/condition/list',
            'add_comment' => '/topapi/process/instance/comment/add',
            'get_template' => '/topapi/process/template/manage/get',
            'execute' => '/topapi/process/instance/execute',
            'space_auth' => '/topapi/process/dentry/auth'
        ],
        'workrecord' => [
            'get_by_name' => '/topapi/process/get_by_name',
            'remove' => '/topapi/process/delete',
            'clean' => '/topapi/process/clean',
            'create' => '/topapi/process/workrecord/create',
            'save' => '/topapi/process/save',
            'update' => '/topapi/process/workrecord/update',
            'batchupdate' => '/topapi/process/workrecord/batchupdate',
            'task_create' => '/topapi/process/workrecord/task/create',
            'task_query' => '/topapi/process/workrecord/task/query',
            'task_update' => '/topapi/process/workrecord/task/update',
            'cancel' => '/topapi/process/workrecord/taskgroup/cancel',
        ],
        'humanResource' => [
            'queryonjob' => '/topapi/smartwork/hrm/employee/queryonjob',
            'querypreentry' => '/topapi/smartwork/hrm/employee/querypreentry',
            'listdimission' => '/topapi/smartwork/hrm/employee/listdimission',
            'querydimission' => '/topapi/smartwork/hrm/employee/querydimission',
            'addpreentry' => '/topapi/smartwork/hrm/employee/addpreentry',
        ],
        'normalMessage'=>[
            'send_to_conversation'=>'/message/send_to_conversation'
        ],
        'corpMessage'=>[
            'send'=>'/chat/send',
            'getReadList'=>'/chat/getReadList'
        ],
        'attendance'=>[
            'getsimplegroups'=>'/topapi/attendance/getsimplegroups',
            'getusergroup'=>'/topapi/attendance/getusergroup',
            'group_member_list'=>'/topapi/attendance/group/member/list',
            'group_member_listbyids'=>'/topapi/attendance/group/member/listbyids',
            'group_member_update'=>'/topapi/attendance/group/member/update',
            'group_memberusers_list'=>'/topapi/attendance/group/memberusers/list',
            'group_minimalism_list'=>'/topapi/attendance/group/minimalism/list',
            'group_query'=>'/topapi/attendance/group/query',
            'group_search'=>'/topapi/attendance/group/search',
            'group_wifis_add'=>'/topapi/attendance/group/wifis/add',
            'group_wifis_query'=>'/topapi/attendance/group/wifis/query',
            'group_wifis_remove'=>'/topapi/attendance/group/wifis/remove',
            'group_positions_add'=>'/topapi/attendance/group/positions/add',
            'group_positions_remove'=>'/topapi/attendance/group/positions/remove',
            'group_positions_query'=>'/topapi/attendance/group/positions/query',
            'group_add'=>'/topapi/attendance/group/add',
            'group_modify'=>'/topapi/attendance/group/modify',
            'group_remove'=>'/topapi/attendance/group/delete',
            'group_users_add'=>'/topapi/attendance/group/users/add',
            'group_users_remove'=>'/topapi/attendance/group/users/remove',
            'group_users_query'=>'/topapi/attendance/group/users/query',
            'group_get'=>'/topapi/attendance/group/get',
            'group_keytoid'=>'/topapi/attendance/groups/keytoid',
            'group_idtokey'=>'/topapi/attendance/groups/idtokey'
        ]

    ];

    public static function joinParams(string $uri, array $params): string
    {


        $url = $uri . '?' . http_build_query($params);

        return urldecode($url);
    }
}
