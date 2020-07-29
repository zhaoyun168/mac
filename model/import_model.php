<?php
/**
 * mac导入
 */
class Import_model extends Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * mac导入日志列表
	 * @return
	 */
	public function list()
	{
		list($page, $limit, $sort, $order) = $this->common->getPageParam();

		$total = 0;
		$total = $this->db->fetchColumn("SELECT COUNT(*) FROM import_log");

		//如果是第一页，则可先不计算总数
		if($page == 1)
		{
			$start = 0;
		}
		else
		{
			$start = $this->common->getListStart($total,$page,$limit);
		}

		$result = $this->db->fetchAll("SELECT id,import_time,import_file,import_file_rename,import_count,import_success,import_fail,import_fail_file FROM import_log LIMIT $start,$limit");

		return [
			'total' => $total,
			'rows' => $result
		];
	}
}