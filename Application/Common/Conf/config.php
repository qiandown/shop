<?php
return array(
	//'配置项'=>'配置值'
	
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'php10_shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀

    'SHOW_PAGE_TRACE'       =>   true,    //加载文件的跟踪信息
    
    'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称

    //自定义模板常量
        'TMPL_PARSE_STRING' => array(
        '__ADMIN__'   => __ROOT__ . '/Public/Admin/',
        '__HOME__'    => __ROOT__ . '/Public/Home/',
        '__COMMON__'  => __ROOT__ . '/Public/Common/',
        '__UPLOAD__'  => __ROOT__ . '/Public/Uploads/'
    ),
        //短信发送配置
    'SEND_MSG'          => array(
        //主帐号,对应开官网发者主账号下的 ACCOUNT SID
        'accountSid'   => '8a216da85d793b69015d7a78326e0049',

//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        'accountToken' => '22871fb4840148cf819c04dda861b466',

//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
        //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        'appId'        => '8a216da85d793b69015d7a783682004f',

//请求地址
        //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
        //生产环境（用户应用上线使用）：app.cloopen.com
        'serverIP'     => 'sandboxapp.cloopen.com',

//请求端口，生产环境和沙盒环境一致
        'serverPort'   => '8883',

//REST版本号，在官网文档REST介绍中获得。
        'softVersion'  => '2013-12-26',
    ),
      'SEND_EMAIL'        => array(
        'Host'     => 'smtp.163.com',
        'Username' => 'pds592942997@163.com',
        'Password' => 'pds599323',
        'FromName' => 'PHP10-test',
        'From'     => 'pds592942997@163.com',
    ),
);