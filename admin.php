<?php
/**
 * 管理页面
 */
use Library\MysqlClient;
use Library\LoggerClient;
use Symfony\Component\Yaml\Yaml;

$arr = Yaml::parse(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'config.yml'));
$config = $arr['parameters'];

$loggerClient = new LoggerClient($config);
$logger = $loggerClient->getMonolog('mac', date('Y-m-d').'.log', 0);
$mysqlClient = new MysqlClient($config);

$dbConn = $mysqlClient->getdbConn();

$result = $dbConn->fetchAll("SELECT id FROM mac");

//smarty实例化
$smarty = new \Smarty;
$smarty->left_delimiter = "{#";
$smarty->right_delimiter = "#}";
$smarty->setTemplateDir(BASEPATH . '/view/'); //设置模板目录
$smarty->setCompileDir(BASEPATH . '/data/cache/templates_c/');
$smarty->setConfigDir(BASEPATH . '/views/smarty_configs/');
$smarty->setCacheDir(BASEPATH . '/data/cache/smarty_cache/');
$smarty->force_compile = true;
if (APP_DEBUG) {
	$smarty->debugging      = true;
	$smarty->caching        = false;
	$smarty->cache_lifetime = 0;
} else {
	$smarty->debugging      = false;
	$smarty->caching        = true;
	$smarty->cache_lifetime = 120;
}
$smarty->assign('title', '标题');
$smarty->display('index.html');

