<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 引导程序
 */


$controllerName = isset($_GET['c']) && !empty($_GET['c']) ? $_GET['c'] : 'index';
$path = BASEPATH.'/controller/'.$controllerName.'.php';
$method = isset($_GET['a']) && !empty($_GET['a']) ? $_GET['a'] : 'index';
//加载主控制器
require_once BASEPATH.'/core/controller.php';
//加载主模型
require_once BASEPATH.'/core/model.php';
require_once $path;

// 实例化控制器
$controller = new $controllerName;
$controller->$method();