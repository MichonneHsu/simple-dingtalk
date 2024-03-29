<?php

declare(strict_types=1);

namespace SimpleDingTalk;



class Url
{
    public static $api = [
        'domain' => 'https://oapi.dingtalk.com',
        'gettoken' => '/gettoken',
        'get_jsapi_ticket' => '/get_jsapi_ticket',
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
            'getinactive' => '/topapi/inactive/user/get',
            'code_getuserinfo' => '/topapi/v2/user/getuserinfo',
            'sns_authorize' => '/connect/oauth2/sns_authorize',
            'getuserinfo_bycode' => '/sns/getuserinfo_bycode',
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
            'book'=>[
                'get'=>'/topapi/smartwork/hrm/roster/meta/get',
                'grouplist'=>'/topapi/smartwork/hrm/employee/field/grouplist',
                'list'=>'/topapi/smartwork/hrm/employee/v2/list',
                'update'=>'/topapi/smartwork/hrm/employee/v2/update'
            ]
        ],
        'normalMessage' => [
            'send_to_conversation' => '/message/send_to_conversation'
        ],
        'corpMessage' => [
            'send' => '/chat/send',
            'getReadList' => '/chat/getReadList'
        ],
        'attendance' => [
            'group_management' => [
                'getsimplegroups' => '/topapi/attendance/getsimplegroups',
                'getusergroup' => '/topapi/attendance/getusergroup',
                'group_member_list' => '/topapi/attendance/group/member/list',
                'group_member_listbyids' => '/topapi/attendance/group/member/listbyids',
                'group_member_update' => '/topapi/attendance/group/member/update',
                'group_memberusers_list' => '/topapi/attendance/group/memberusers/list',
                'group_minimalism_list' => '/topapi/attendance/group/minimalism/list',
                'group_query' => '/topapi/attendance/group/query',
                'group_search' => '/topapi/attendance/group/search',
                'group_wifis_add' => '/topapi/attendance/group/wifis/add',
                'group_wifis_query' => '/topapi/attendance/group/wifis/query',
                'group_wifis_remove' => '/topapi/attendance/group/wifis/remove',
                'group_positions_add' => '/topapi/attendance/group/positions/add',
                'group_positions_remove' => '/topapi/attendance/group/positions/remove',
                'group_positions_query' => '/topapi/attendance/group/positions/query',
                'group_add' => '/topapi/attendance/group/add',
                'group_modify' => '/topapi/attendance/group/modify',
                'group_remove' => '/topapi/attendance/group/delete',
                'group_users_add' => '/topapi/attendance/group/users/add',
                'group_users_remove' => '/topapi/attendance/group/users/remove',
                'group_users_query' => '/topapi/attendance/group/users/query',
                'group_get' => '/topapi/attendance/group/get',
                'group_keytoid' => '/topapi/attendance/groups/keytoid',
                'group_idtokey' => '/topapi/attendance/groups/idtokey'
            ],
            'checkin' => [
                'get_list' => '/attendance/list',
                'get_list_record' => '/attendance/listRecord',
                'upload' => '/topapi/attendance/record/upload',
            ],
            'shift' => [
                'add' => '/topapi/attendance/shift/add',
                'history_query' => '/topapi/attendance/shift/history/query',
                'remove' => '/topapi/attendance/shift/delete',
                'updatepunches' => '/topapi/attendance/shift/updatepunches',
                'search' => '/topapi/attendance/shift/search',
                'query' => '/topapi/attendance/shift/query',
                'list' => '/topapi/attendance/shift/list'
            ],
            'schedule' => [
                'listbyday' => '/topapi/attendance/schedule/listbyday',
                'listbyusers' => '/topapi/attendance/schedule/listbyusers',
                'set' => '/topapi/attendance/group/schedule/async',
                'listbyids' => '/topapi/attendance/schedule/result/listbyids',
                'listschedule' => '/topapi/attendance/listschedule',
                'listbydays' => '/topapi/attendance/schedule/shift/listbydays'
            ],
            'statistic' => [
                'getattcolumns' => '/topapi/attendance/getattcolumns',
                'getcolumnval' => '/topapi/attendance/getcolumnval',
                'getleavetimebynames' => '/topapi/attendance/getleavetimebynames',
                'isopensmartreport' => '/topapi/attendance/isopensmartreport',
                'getupdatedata' => '/topapi/attendance/getupdatedata'
            ],
            'machineManagement' => [
                'get_by_userid' => '/topapi/smartdevice/atmachine/get_by_userid'
            ],
            'approve' => [
                'finish' => '/topapi/attendance/approve/finish',
                'cancel' => '/topapi/attendance/approve/cancel',
                'check' => '/topapi/attendance/approve/check',
                'duration_calculate' => '/topapi/attendance/approve/duration/calculate',
                'schedule_switch' => '/topapi/attendance/approve/schedule/switch',
                'getleaveapproveduration' => '/topapi/attendance/getleaveapproveduration',
                'getleavestatus' => '/topapi/attendance/getleavestatus'
            ],
            'vacationManagement' => [
                'create' => '/topapi/attendance/vacation/type/create',
                'remove' => '/topapi/attendance/vacation/type/delete',
                'update' => '/topapi/attendance/vacation/type/update',
                'type_list' => '/topapi/attendance/vacation/type/list',
                'quota_init' => '/topapi/attendance/vacation/quota/init',
                'quota_list' => '/topapi/attendance/vacation/quota/list',
                'quota_update' => '/topapi/attendance/vacation/quota/update',
                'record_list' => '/topapi/attendance/vacation/record/list'
            ]

        ],
        'chat' => [
            'group' => [
                'create' => '/chat/create',
                'get' => '/chat/get',
                'update' => '/chat/update',
                'subadmin_update' => '/topapi/chat/subadmin/update',
                'private_chat_switch' => '/topapi/chat/member/friendswitch/update',
                'get_qrcode' => '/topapi/chat/qrcode/get',
                'updategroupnick' => '/topapi/chat/updategroupnick'
            ],
            'scenegroup' => [
                'create' => '/topapi/im/chat/scenegroup/create',
                'update' => '/topapi/im/chat/scenegroup/update',
                'get' => '/topapi/im/chat/scenegroup/get',
                'add_member' => '/topapi/im/chat/scenegroup/member/add',
                'remove_member' => '/topapi/im/chat/scenegroup/member/delete',
                'get_member' => '/topapi/im/chat/scenegroup/member/get'
            ]


        ],
        'blackboard' => [
            'create' => '/topapi/blackboard/create',
            'update' => '/topapi/blackboard/update',
            'remove' => '/topapi/blackboard/delete',
            'listtopten' => '/topapi/blackboard/listtopten',
            'category_list' => '/topapi/blackboard/category/list',
            'listids' => '/topapi/blackboard/listids',
            'get' => '/topapi/blackboard/get'
        ],

        'cspace' => [
            'add_to_single_chat' => '/cspace/add_to_single_chat',
            'add' => '/cspace/add',
            'get_custom_space' => '/cspace/get_custom_space',
            'used_info' => '/cspace/used_info',
            'grant_custom_space' => '/cspace/grant_custom_space',
            'file' => [
                'upload_single' => '/file/upload/single',
                'upload_transaction' => '/file/upload/transaction',
                'upload_chunk' => '/file/upload/chunk'
            ]
        ],
        'extcontact' => [
            'create' => '/topapi/extcontact/create',
            'remove' => '/topapi/extcontact/delete',
            'update' => '/topapi/extcontact/update',
            'list' => '/topapi/extcontact/list',
            'listlabelgroups' => '/topapi/extcontact/listlabelgroups',
            'get' => '/topapi/extcontact/get'
        ],
        'media'=>[
            'upload'=>'/media/upload'
        ],
        'checkin'=>[
            'get' => '/topapi/checkin/record/get',
            'record' => '/checkin/record'
        ],
        'form'=>[
            'list'=>'/topapi/collection/form/list',
            'instance_list'=>'/topapi/collection/instance/list',
            'instance_get'=>'/topapi/collection/instance/get'
        ],
        'callback'=>'/call_back/get_call_back_failed_result'

    ];

  
}
