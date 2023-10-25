<p align="center" style="font-family: Arial, Helvetica, sans-serif;">轻量级钉钉服务端PHP-SDK，简化初学者的使用难度。</p>
<p align="center">
<img src="https://img.shields.io/badge/PHP-7.3^|8^-green" />
<img src="https://img.shields.io/badge/release-1.0.7^-orange" />
<img src="https://img.shields.io/badge/license-MIT-green" />
</p>

### 介绍
这是一款PHP编写的轻量级钉钉服务端扩展包，以最简单的方式取调用、源码易懂、模块化。  
用户可以自行定期更新token或应用自行判断，达到使用接口函数不需要考虑token的问题。
### 安装方式
`composer require michonnehsu/simpledingtalk`
### 文档地址
点击访问[文档](https://gitee.com/michonnehsu/simple-dingtalk/wikis/pages)  

### 配置架构
```
├─apps                                   应用目录
│  ├─app1                                第一个小程序或微应用（名字自取，app1只是解释，方便理解）  
│  |   ├─info                            应用凭证信息（必填）
│  │   |   ├─AGENT_ID        
│  │   |   ├─APP_KEY        
│  │   |   ├─APP_SECRET
│  │   |   ├─ROBOT_CODE        
│  |   ├─access_token                    API凭证信息（必填）
│  │   |   ├─expires                     凭证刷新时间（凭证默认2小时内过期，建议提前3分钟刷新，填写以秒为单位的数字就好，例如三分钟等于180）
│  │   |   ├─file_path                   凭证存储文件（该文件必须用户自己生成，名字自定义，并填入凭证存储文件的路径，建议填入绝对路径）
│  |   ├─login_info                      免登信息
│  │   |   ├─authorize                   授权地址        
│  │   │   |   ├─redirect_uri            钉钉免登跳转到第三方网站地址   
│  │   │   |   ├─dingtalk_login_uri      钉钉内免登的网站地址
│  |   ├─callback_info                   回调凭证信息
│  │   |   ├─aes_key        
│  │   |   ├─token        
│  |   ├─v2                              新版服务端
│  │   |   ├─access_token                凭证信息        
│  │   │   |   ├─expires                 凭证刷新时间（凭证默认2小时内过期，建议提前3分钟刷新，填写以秒为单位的数字就好，例如三分钟等于180）  
│  │   │   |   ├─file_path               凭证存储文件（该文件必须用户自己生成，并填入凭证存储文件的路径，建议填入绝对路径）
│  |   ├─userAccessToken                 跳转第三方的免登
│  │   |   ├─expires                     凭证刷新时间（凭证默认2小时内过期，建议提前3分钟刷新，填写以秒为单位的数字就好，例如三分钟等于180）
│  │   |   ├─file_path                   凭证存储文件（该文件必须用户自己生成，并填入凭证存储文件的路径，建议填入绝对路径）
│  ├─app2                                第二个小程序或微应用（配置内容跟上面一样，以此类推） 
├─robots                                 机器人应用目录
│  ├─robot1                              第一个机器人应用  
│  |   ├─info                            应用凭证信息（必填）
│  │   |   ├─AGENT_ID        
│  │   |   ├─APP_KEY        
│  │   |   ├─APP_SECRET        
│  │   |   ├─access_token                群token（非必填）
│  │   |   ├─SEC                         群加签 （非必填）
│  |   ├─access_token                    API凭证信息（必填）
│  │   |   ├─expires                     凭证刷新时间（凭证默认2小时内过期，建议提前3分钟刷新，填写以秒为单位的数字就好，例如三分钟等于180）
│  │   |   ├─file_path                   凭证存储文件（该文件必须用户自己生成，名字自定义，并填入凭证存储文件的路径，建议填入绝对路径）
│  ├─robot1                              第二个机器人应用（配置内容跟上面一样，以此类推） 
```
### [如何配置以及使用](https://gitee.com/michonnehsu/simple-dingtalk/wikis/%E9%85%8D%E7%BD%AE%E6%96%87%E4%BB%B6%E7%B1%BB%E6%A1%88%E4%BE%8B)