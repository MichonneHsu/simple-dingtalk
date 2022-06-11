<?php

require_once '../Config.php';

use SimpleDingTalk\Department;
// 无限极循环找出部门的子部门
function getDepts($dept_id)
{
    $result = json_decode(Department::listsub($dept_id), true)['result'];
    $break = false;
    if (empty($result)) {
        $break = true;
    }
    if (!$break) {
        for ($p = 0; $p < count($result); $p++) {




            $result[$p]['subs'] = getDepts($result[$p]['dept_id']);
        }
    }
    return $result;
}
//把查询的结果保存到jsonw文件里
file_put_contents('dept.json', json_encode(getDepts(1)));
// 并且把结果从文件里输出出来
$a = json_decode(file_get_contents('dept.json'), true);
// 打印结果
print_r($a);
