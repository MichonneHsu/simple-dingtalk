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

#### 安装方式`composer require michonnehsu/simpledingtalk`
#### [文档地址](https://gitee.com/michonnehsu/simple-dingtalk/wikis/pages)
#### 需要新的功能请发起 [issues](https://gitee.com/michonnehsu/simple-dingtalk/issues)  
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
#### 关于文档
文档目前真在持续更新中，请小伙伴耐心一下。
#### 关于本扩展
如果小伙伴有定制需求的话可以发[issues](https://gitee.com/michonnehsu/simple-dingtalk/issues)。