<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * mac
 */

class Mac extends Controller
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
	 * mac首页
	 */
	public function index()
	{
		$this->smarty->assign('token', $this->common->getToken());
		$this->smarty->display('mac_list.html');
	}

	/**
	 * mac列表
	 */
	public function list()
	{
		$macModel = $this->loadModel('mac_model');
		$macList = $macModel->list();

		echo json_encode($macList);
	}

	/**
	 * 新增保存mac数据
	 */
	public function insert()
	{
		$macModel = $this->loadModel('mac_model');
		$macInsert = $macModel->insert();

		if ($macInsert) {
			echo json_encode(['error' => 0]);
		} else {
			echo json_encode(['error' => 1]);
		}
	}

	/**
	 * 查询mac数据
	 */
	public function search()
	{
		$macModel = $this->loadModel('mac_model');
		$macInfo = $macModel->search();

		if ($macInfo) {
			echo json_encode(['error' => 0, 'data' => $macInfo]);
		} else {
			echo json_encode(['error' => 1]);
		}
	}

	/**
	 * 编辑保存mac数据
	 */
	public function update()
	{
		$macModel = $this->loadModel('mac_model');
		$macUpdate = $macModel->update();

		if ($macUpdate) {
			echo json_encode(['error' => 0]);
		} else {
			echo json_encode(['error' => 1]);
		}
	}

	/**
	 * 删除mac数据
	 */
	public function delete()
	{
		$macModel = $this->loadModel('mac_model');
		$macDelete = $macModel->delete();

		if ($macDelete) {
			echo json_encode(['error' => 0]);
		} else {
			echo json_encode(['error' => 1]);
		}
	}
}