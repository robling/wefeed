<?php
define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
$spConfig = array(
    "db" => array( // 数据库设置
                    'host' => 'SAE_MYSQL_HOST_M',  // 数据库地址，一般都可以是localhost
                    'login' => 'SAE_MYSQL_USER', // 数据库用户名
                    'password' => 'SAE_MYSQL_PASS', // 数据库密码
                    'database' => 'SAE_MYSQL_DB', // 数据库的库名称
    ),	
	'launch' => array( // 加入挂靠点，以便开始使用Url_ReWrite的功能
        'router_prefilter' => array(
                        array('spUrlRewrite', 'setReWrite'),  // 对路由进行挂靠，处理转向地址
                ),
        'function_url' => array(
                        array("spUrlRewrite", "getReWrite"),  // 对spUrl进行挂靠，让spUrl可以进行Url_ReWrite地址的生成
            ),
	),
	'ext' => array(
        'spUrlRewrite' => array(
            'suffix' => '',
            'sep' => '/',
            'map' => array(
				'renew' => 'update@renew',
				'article' => 'main@article',
				'author' => 'main@authorlist',
				'a' => 'main@author',
				'feed' => 'update@feed',
				'redirect' => 'main@redirect',
            ),
            'args' => array(
				'renew' => array('id'),
				'a' => array('weid'),
				'feed' => array('weid'),
            ),
        ),
    ),
	'dispatcher_error' => "import('./public/404.php');exit();",
);
require(SP_PATH."/SpeedPHP.php");
spRun();