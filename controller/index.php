<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 首页
 */

class Index extends Controller
{

	/**
	 * construct
	 */
	public function __construct()
	{
		parent::__construct();
        $this->common->admin_priv();
	}

	/**
	 * 首页
	 */
	public function index()
	{
		$this->smarty->assign('token', $this->common->getToken());
		$this->smarty->display('index.html');
	}
}