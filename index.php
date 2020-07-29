<?php
/**
 * 入口文件
 */

//开启调试模式
define('APP_DEBUG', false);
//入口文件目录绝对路径
define('BASEPATH', str_replace('\\', '/', __DIR__));
//数据缓存目录绝对目录
defined('DATA_PATH') or define('DATA_PATH', BASEPATH . '/data');

//设置时区
date_default_timezone_set('Asia/Chongqing');

//加载第三方类库
require_once BASEPATH.'/vendor/autoload.php';
//加载引导文件
require_once BASEPATH.'/core/core.php';