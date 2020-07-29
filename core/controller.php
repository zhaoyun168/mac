<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
use Library\MysqlClient;
use Library\LoggerClient;
use Library\Common;
use Symfony\Component\Yaml\Yaml;

class Controller {
	//database conn
	public $db;
	//logger
	public $logger;
	//smarty
	public $smarty;
	//config
	public $config;
	//common
	public $common;
	
	/**
	 * construct
	 */
	public function __construct()
	{
		$arr = Yaml::parse(file_get_contents(BASEPATH.'/config.yml'));
		$config = $arr['parameters'];
		$this->config = $config;

		$loggerClient = new LoggerClient($config);
		$this->logger = $loggerClient->getMonolog('mac', date('Y-m-d').'.log', 0);

		$mysqlClient = new MysqlClient($config);
		$this->db = $mysqlClient->getdbConn();

		$this->common = new Common();

		//smarty实例化
		$this->smarty = new \Smarty;
		$this->smarty->left_delimiter = "<{";
		$this->smarty->right_delimiter = "}>";
		$this->smarty->setTemplateDir(BASEPATH . '/view/'); //设置模板目录
		$this->smarty->setCompileDir(BASEPATH . '/data/cache/templates_c/');
		$this->smarty->setConfigDir(BASEPATH . '/views/smarty_configs/');
		$this->smarty->setCacheDir(BASEPATH . '/data/cache/smarty_cache/');
		$this->smarty->force_compile = true;
		if (APP_DEBUG) {
			$this->smarty->debugging      = true;
			$this->smarty->caching        = false;
			$this->smarty->cache_lifetime = 0;
		} else {
			$this->smarty->debugging      = false;
			$this->smarty->caching        = true;
			$this->smarty->cache_lifetime = 120;
		}

		include(BASEPATH.'/library/PHPExcel.php');  //引入PHP EXCEL类
	}

	/**
	 * 实例化模型
	 * @param  string $modelName 模型名称
	 * @return object
	 */
	public function loadModel($modelName)
	{
		require_once BASEPATH.'/model/'.$modelName.'.php';

		$model = new $modelName();

		return $model;
	}
}