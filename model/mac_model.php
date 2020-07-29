<?php
/**
 * mac
 */
class Mac_model extends Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * mac列表
	 * @return
	 */
	public function list()
	{
		$condition = $this->getCondition();
		$where = '';
		$params = [];
		$pre = [];
		if (!empty($condition)) {
			$where = $condition['where'];
			$params = $condition['params'];
			$pre = $condition['pre'];
		}
		list($page, $limit, $sort, $order) = $this->common->getPageParam();

		$total = 0;
		$total = $this->db->fetchColumn("SELECT COUNT(*) FROM mac ".$where, $params);

		//如果是第一页，则可先不计算总数
		if($page == 1)
		{
			$start = 0;
		}
		else
		{
			$start = $this->common->getListStart($total,$page,$limit);
		}

		$result = $this->db->fetchAll("SELECT id,code,cable_address,wireless_address,handover_date,remarks FROM mac $where LIMIT $start,$limit", $params, $pre);

		$rows = [];
		if (!empty($result) && is_array($result)) {
			foreach ($result as $key => $value) {
				$rows[$key]['id'] = $value['id'];
				$rows[$key]['code'] = htmlspecialchars($value['code']);
				$rows[$key]['cable_address'] = htmlspecialchars($value['cable_address']);
				$rows[$key]['wireless_address'] = htmlspecialchars($value['wireless_address']);
				$rows[$key]['handover_date'] = htmlspecialchars($value['handover_date']);
				$remarks = htmlspecialchars($value['remarks']);
				$rows[$key]['remarks'] = $remarks;
				$rows[$key]['remarks_small'] = mb_strlen($remarks) > 30 ? mb_substr($remarks, 0, 30).'......' : $remarks;
			}
		}

		return [
			'total' => $total,
			'rows' => $rows
		];
	}

	/**
	 * 新增保存mac数据
	 * @return
	 */
	public function insert()
	{
		$insertData = [
			'code' => isset($_POST['code']) && !empty($_POST['code']) ? $_POST['code'] : '',
			'cable_address' => isset($_POST['cable_address']) && !empty($_POST['cable_address']) ? $_POST['cable_address'] : '',
			'wireless_address' => isset($_POST['wireless_address']) && !empty($_POST['wireless_address']) ? $_POST['wireless_address'] : '',
			'handover_date' => isset($_POST['handover_date']) && !empty($_POST['handover_date']) ? $_POST['handover_date'] : '',
			'remarks' => isset($_POST['remarks']) && !empty($_POST['remarks']) ? $_POST['remarks'] : '',
		];
		
		try {
			$this->db->insert('mac', $insertData, [
				'code' => \PDO::PARAM_STR,
				'cable_address' => \PDO::PARAM_STR,
				'wireless_address' => \PDO::PARAM_STR,
				'handover_date' => \PDO::PARAM_STR,
				'remarks' => \PDO::PARAM_STR,
			]);

			$insertId = $this->db->lastInsertId();

			if ($insertId) {
				return true;
			}
		} catch (Exception $e) {
			return false;
		}

		return false;
	}

	/**
	 * 查询mac数据
	 * @return
	 */
	public function search()
	{
		$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : '';

		if (empty($id)) {
			return false;
		}

		$macInfo = $this->db->fetchAssoc("SELECT id,code,cable_address,wireless_address,handover_date,remarks FROM mac WHERE id = :id LIMIT 1", ['id' => $id], ['id' => \PDO::PARAM_INT]);

		return $macInfo;
	}

	/**
	 * 编辑保存mac数据
	 * @return
	 */
	public function update()
	{
		$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : '';

		if (empty($id)) {
			return false;
		}

		try {
			$updateData = [
				'code' => isset($_POST['code']) && !empty($_POST['code']) ? $_POST['code'] : '',
				'cable_address' => isset($_POST['cable_address']) && !empty($_POST['cable_address']) ? $_POST['cable_address'] : '',
				'wireless_address' => isset($_POST['wireless_address']) && !empty($_POST['wireless_address']) ? $_POST['wireless_address'] : '',
				'handover_date' => isset($_POST['handover_date']) && !empty($_POST['handover_date']) ? $_POST['handover_date'] : '',
				'remarks' => isset($_POST['remarks']) && !empty($_POST['remarks']) ? $_POST['remarks'] : '',
			];
			$updateFlag = $this->db->update('mac', $updateData, ['id' => $id]);

			return true;
			
		} catch (Exception $e) {
			return false;
		}

		return false;
	}


	/**
	 * 删除mac数据
	 * @return
	 */
	public function delete()
	{
		$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : '';

		if (empty($id)) {
			return false;
		}

		try {
			$this->db->delete('mac', ['id' => $id]);
			return true;
		} catch (Exception $e) {
			return false;
		}

		return false;
	}

	/**
	 * 获取搜索条件
	 * @return array 搜索条件
	 */
	public function getCondition()
	{
		$where = 'WHERE 1 = 1';
		$params = [];
		$pre = [];

		$start_date = isset($_GET['start_date']) && !empty($_GET['start_date']) ? $_GET['start_date'] : '';
		$end_date = isset($_GET['end_date']) && !empty($_GET['end_date']) ? $_GET['end_date'] : '';

		if (!empty($start_date) && empty($end_date)) {
			$where .= ' AND handover_date >= :start_date ';
			$params['start_date'] = $start_date;
			$pre['start_date'] =  \PDO::PARAM_STR;
		} elseif (!empty($end_date) && empty($start_date)) {
			$where .= ' AND handover_date <= :end_date ';
			$params['end_date'] = $end_date;
			$pre['end_date'] =  \PDO::PARAM_STR;
		} elseif (!empty($end_date) && !empty($start_date)) {
			$where .= ' AND handover_date >= :start_date AND handover_date <= :end_date ';
			$params['start_date'] = $start_date;
			$params['end_date'] = $end_date;
			$pre['start_date'] =  \PDO::PARAM_STR;
			$pre['end_date'] =  \PDO::PARAM_STR;
		}

		$code = isset($_GET['code']) && !empty($_GET['code']) ? $_GET['code'] : '';

		if (!empty($code)) {
			$where .= ' AND code = :code ';
			$params['code'] = $code;
			$pre['code'] =  \PDO::PARAM_STR;
		}

		$cable_address = isset($_GET['cable_address']) && !empty($_GET['cable_address']) ? $_GET['cable_address'] : '';

		if (!empty($cable_address)) {
			$where .= ' AND cable_address = :cable_address ';
			$params['cable_address'] = $cable_address;
			$pre['cable_address'] =  \PDO::PARAM_STR;
		}

		$wireless_address = isset($_GET['wireless_address']) && !empty($_GET['wireless_address']) ? $_GET['wireless_address'] : '';

		if (!empty($wireless_address)) {
			$where .= ' AND wireless_address = :wireless_address ';
			$params['wireless_address'] = $wireless_address;
			$pre['wireless_address'] =  \PDO::PARAM_STR;
		}

		return [
			'where' => $where,
			'params' => $params,
			'pre' => $pre
		];
	}
}