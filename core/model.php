<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
use Library\MysqlClient;
use Library\LoggerClient;
use Library\Common;
use Symfony\Component\Yaml\Yaml;

class Model {
	//database conn
	public $db;
	//logger
	public $logger;
	//common
	public $common;
	
	/**
	 * construct
	 */
	public function __construct()
	{
		$arr = Yaml::parse(file_get_contents(BASEPATH.'/config.yml'));
		$config = $arr['parameters'];

		$loggerClient = new LoggerClient($config);
		$this->logger = $loggerClient->getMonolog('mac', date('Y-m-d').'.log', 0);

		$mysqlClient = new MysqlClient($config);
		$this->db = $mysqlClient->getdbConn();

		$this->common = new Common();
	}
}