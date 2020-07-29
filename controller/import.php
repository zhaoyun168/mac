<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * mac导入
 */
use Library\FileUpload;

class Import extends Controller
{
	private $macTitle = [
		'code' => '编码',
		'cable_address' => '有线地址',
		'wireless_address' => '无线地址',
		'handover_date' => '交接日期',
		'remarks' => '备注'
	];
	/**
	 * construct
	 */
	public function __construct()
	{
		parent::__construct();
        //$this->common->admin_priv();
	}

	public function test()
	{
		$str = '[["2019-10-30",6,12,18],["2019-10-31",0,0,0],["2019-11-01",0,4,4],["2019-11-02",0,0,0],["2019-11-03",0,0,0],["2019-11-04",0,0,0],["2019-11-05",0,0,0],["2019-11-06",0,0,0],["2019-11-07",0,0,0],["2019-11-08",0,1,1],["2019-11-09",0,0,0],["2019-11-10",0,1,1],["2019-11-11",0,20,20],["2019-11-12",0,37,37],["2019-11-13",0,2,2],["2019-11-14",0,8,8],["2019-11-15",0,0,0],["2019-11-16",0,0,0],["2019-11-17",0,0,0],["2019-11-18",0,0,0],["2019-11-19",1,0,1],["2019-11-20",2,0,2],["2019-11-21",0,0,0],["2019-11-22",1,0,1],["2019-11-23",0,0,0],["2019-11-24",0,0,0],["2019-11-25",1,3,4],["2019-11-26",37,9,46],["2019-11-27",382,17,399],["2019-11-28",159,8,167],["2019-11-29",13,4,17],["2019-11-30",26,2,28],["2019-12-01",15,2,17],["2019-12-02",30,8,38],["2019-12-03",15,5,20],["2019-12-04",19,4,23],["2019-12-05",22,6,28],["2019-12-06",27,11,38],["2019-12-07",36,5,41],["2019-12-08",32,4,36],["2019-12-09",20,19,39],["2019-12-10",32,15,47],["2019-12-11",32,2,34],["2019-12-12",22,11,33],["2019-12-13",16,11,27],["2019-12-14",22,54,76],["2019-12-15",38,96,134],["2019-12-16",21,163,184],["2019-12-17",29,183,212],["2019-12-18",10,163,173],["2019-12-19",17,159,176],["2019-12-20",22,158,180],["2019-12-21",17,161,178],["2019-12-22",28,144,172],["2019-12-23",17,146,163],["2019-12-24",31,146,177],["2019-12-25",18,131,149],["2019-12-26",18,160,178],["2019-12-27",16,169,185],["2019-12-28",21,206,227],["2019-12-29",22,98,120],["2019-12-30",32,97,129],["2019-12-31",25,86,111],["2020-01-01",18,40,58],["2020-01-02",18,63,81],["2020-01-03",17,66,83],["2020-01-04",23,61,84],["2020-01-05",28,81,109],["2020-01-06",18,59,77],["2020-01-07",23,72,95],["2020-01-08",26,79,105],["2020-01-09",21,66,87],["2020-01-10",36,82,118],["2020-01-11",33,71,104],["2020-01-12",31,68,99],["2020-01-13",39,78,117],["2020-01-14",30,84,114],["2020-01-15",24,86,110],["2020-01-16",28,88,116],["2020-01-17",40,95,135],["2020-01-18",31,91,122],["2020-01-19",49,65,114],["2020-01-20",53,128,181],["2020-01-21",67,158,225],["2020-01-22",69,131,200],["2020-01-23",62,153,215],["2020-01-24",18,41,59],["2020-01-25",20,53,73],["2020-01-26",33,67,100],["2020-01-27",19,62,81],["2020-01-28",34,66,100],["2020-01-29",35,81,116],["2020-01-30",39,78,117],["2020-01-31",26,58,84],["2020-02-01",42,87,129],["2020-02-02",18,45,63],["2020-02-03",34,62,96],["2020-02-04",18,47,65],["2020-02-05",23,46,69],["2020-02-06",18,63,81],["2020-02-07",22,37,59],["2020-02-08",8,40,48],["2020-02-09",25,29,54],["2020-02-10",27,55,82],["2020-02-11",20,36,56],["2020-02-12",14,52,66],["2020-02-13",23,43,66],["2020-02-14",14,31,45],["2020-02-15",9,31,40],["2020-02-16",16,22,38],["2020-02-17",22,46,68],["2020-02-18",13,36,49],["2020-02-19",15,41,56],["2020-02-20",18,52,70],["2020-02-21",19,50,69],["2020-02-22",13,55,68],["2020-02-23",21,58,79],["2020-02-24",13,66,79],["2020-02-25",18,54,72],["2020-02-26",24,47,71],["2020-02-27",38,47,85],["2020-02-28",23,62,85],["2020-02-29",24,65,89],["2020-03-01",33,76,109],["2020-03-02",23,56,79],["2020-03-03",16,50,66],["2020-03-04",21,65,86],["2020-03-05",23,75,98],["2020-03-06",17,74,91],["2020-03-07",33,81,114],["2020-03-08",27,85,112],["2020-03-09",25,86,111],["2020-03-10",36,78,114],["2020-03-11",30,97,127],["2020-03-12",37,76,113],["2020-03-13",33,112,145],["2020-03-14",31,84,115],["2020-03-15",35,101,136],["2020-03-16",31,77,108],["2020-03-17",38,103,141],["2020-03-18",46,98,144],["2020-03-19",43,96,139],["2020-03-20",48,123,171],["2020-03-21",22,94,116],["2020-03-22",33,103,136],["2020-03-23",50,133,183],["2020-03-24",10,13,23],["2020-03-25",0,0,0],["2020-03-26",0,0,0],["2020-03-27",0,0,0],["2020-03-28",0,0,0],["2020-03-29",0,0,0],["2020-03-30",0,0,0],["2020-03-31",0,0,0],["2020-04-01",435,1324,1759],["2020-04-02",75,173,248],["2020-04-03",43,156,199],["2020-04-04",63,177,240],["2020-04-05",48,168,216],["2020-04-06",57,161,218],["2020-04-07",74,185,259],["2020-04-08",56,154,210],["2020-04-09",77,268,345],["2020-04-10",42,284,326],["2020-04-11",60,244,304],["2020-04-12",65,213,278],["2020-04-13",61,263,324],["2020-04-14",45,239,284],["合计",4892,12672,17564]]';

		$array = json_decode($str, true);
		$this->common->exportExcel(['日期','支付宝','微信','合计'],$array,'省医保推单统计');
	}

	public function import()
	{
		$result = [];

		$fileData = $this->common->importExcel('省中科室.xlsx');

		unset($fileData[0]);
		foreach ($fileData as $key => $value) {
			$result[$value[0]]['hospital_code'] = $value[0];
			$result[$value[0]]['hospital_name'] = $value[1];
			$result[$value[0]]['dept'][$value[2]]['dept_code'] = $value[2];
			$result[$value[0]]['dept'][$value[2]]['dept_name'] = $value[3];
			$result[$value[0]]['dept'][$value[2]]['child'][$key]['dept_code'] = $value[4];
			$result[$value[0]]['dept'][$value[2]]['child'][$key]['dept_name'] = $value[5];
		}

		print_r($result);
	}

	/**
	 * 导入列表
	 */
	public function index()
	{
		$this->smarty->assign('token', $this->common->getToken());
		$this->smarty->display('import.html');
	}

	/**
	 * 导入处理
	 */
	public function data_upload()
	{
		if(empty($_FILES['file_address']['name']))
		{
			echo '上传错误';
			exit;
		}

		//上传路径
		$filepath = $this->config['upload_path'];
		if(!is_dir($filepath))
		{
			@mkdir($filepath);
			@chmod($filepath,0777);
		}

		//开始上传
		$up = new FileUpload;
	    //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
	    $up -> set("path", $filepath);
	    $up -> set("maxsize", 2000000);
	    $up -> set("allowtype", array("xls", "xlsx"));
	    $up -> set("israndname", true);
	  
	    //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
	    if($up->upload("file_address")) {
	       $fileName = $up->getFileName();
	       $fileOriginName = $up->getFileOriginName();

	       $fileData = $this->common->importExcel($filepath.'/'.$fileName);

	       $title = $fileData[0];
	       $title = array_filter($title);
	       $titleCount = count($title);

	       //$titleValue = [];
	       //标题获取对应列数据（硬写）
	       $titleValue = [
	       		'code' => 0, //编码
				'cable_address' => 1, //有线地址
				'wireless_address' => 2, //无线地址
				'handover_date' => 6, //交接日期
				'remarks' => 5 //备注
	       ];
	       $repeat = []; //重复的数据
	       if (!empty($title) && is_array($title)) {
	       		//匹配标题
	       		/*foreach ($title as $key => $value) {
	       			if (in_array(trim($value), $this->macTitle)) {
	       				$titleValue[array_search(trim($value), $this->macTitle)] = $key;
	       			}
	       		}*/

	       		unset($fileData[0]);
	       		$count = 0;
	       		$noRepeatCode = []; //code
	       		$noRepeatCable = []; //cable_address
	       		$noRepeatWireless = []; //wireless_address

	       		try {

	       			$this->db->beginTransaction();
	       			foreach ($fileData as $key => $value) {
	       				$value = array_slice($value, 0, $titleCount);
	       				$code = isset($value[$titleValue['code']]) && !empty($value[$titleValue['code']]) ? $value[$titleValue['code']] : '';
	       				$code = (string) $code;
	       				$cable_address = isset($titleValue['cable_address']) && isset($value[$titleValue['cable_address']]) && !empty($value[$titleValue['cable_address']]) ? $value[$titleValue['cable_address']] : '';
	       				$wireless_address = isset($titleValue['wireless_address']) && isset($value[$titleValue['wireless_address']]) && !empty($value[$titleValue['wireless_address']]) ? $value[$titleValue['wireless_address']] : '';

	       				if (empty($code)) {
	       					continue;
	       				}

	       				if (array_key_exists($code, $noRepeatCode)) {
	       					$value[] = '编码与excel中的内容重复';
	       					$repeat[] = $value;
	       					continue;
	       				} elseif (array_key_exists($cable_address, $noRepeatCable)) {
	       					$value[] = '有线地址与excel中的内容重复';
	       					$repeat[] = $value;
	       					continue;
	       				} elseif (array_key_exists($wireless_address, $noRepeatWireless)) {
	       					$value[] = '无线地址与excel中的内容重复';
	       					$repeat[] = $value;
	       					continue;
	       				}

	       				$noRepeatCode[$code] = $key;
	       				$noRepeatCable[$cable_address] = $key;
	       				$noRepeatWireless[$wireless_address] = $key;

	       				//重复验证(code)
                        $chenkNum = $this->db->fetchColumn('SELECT id FROM mac WHERE code = :code LIMIT 1', array('code' => $code), 0, array('code' => \PDO::PARAM_STR));
                        $chenkNumFlag = empty($chenkNum) ? false : true;
                        if ($chenkNumFlag) {
                        	$value[] = '编码与数据库中的内容重复';
                        	$repeat[] = $value;
                        	continue;
                        } else {
	                        //重复验证(cable_address)
	                        $chenkNum = $this->db->fetchColumn('SELECT id FROM mac WHERE cable_address = :cable_address LIMIT 1', array('cable_address' => $cable_address), 0, array('cable_address' => \PDO::PARAM_STR));
	                        $chenkNumFlag = empty($chenkNum) ? false : true;
	                        if ($chenkNumFlag) {
	                        	$value[] = '有线地址与数据库中的内容重复';
	                        	$repeat[] = $value;
	                        	continue;
	                        } else {
		                        //重复验证(wireless_address)
		                        $chenkNum = $this->db->fetchColumn('SELECT id FROM mac WHERE wireless_address = :wireless_address LIMIT 1', array('wireless_address' => $wireless_address), 0, array('wireless_address' => \PDO::PARAM_STR));
		                        $chenkNumFlag = empty($chenkNum) ? false : true;
		                        if ($chenkNumFlag) {
		                        	$value[] = '无线地址与数据库中的内容重复';
		                        	$repeat[] = $value;
		                        	continue;
		                        }
	                        }
                        }

		       			$insertData = [
		       				'code' =>$code ,
							'cable_address' => $cable_address,
							'wireless_address' => $wireless_address,
							'handover_date' => isset($titleValue['handover_date']) && isset($value[$titleValue['handover_date']]) && !empty($value[$titleValue['handover_date']]) ? $value[$titleValue['handover_date']] : '',
							'remarks' => isset($titleValue['remarks']) && isset($value[$titleValue['remarks']]) && !empty($value[$titleValue['remarks']]) ? $value[$titleValue['remarks']] : '',
		       			];
		       			$this->db->insert('mac', $insertData, [
							'code' => \PDO::PARAM_INT,
							'cable_address' => \PDO::PARAM_STR,
							'wireless_address' => \PDO::PARAM_STR,
							'handover_date' => \PDO::PARAM_STR,
							'remarks' => \PDO::PARAM_STR,
						]);
						$count++;
	       			}

	       			$this->db->commit();

	       			$title[] = '失败原因';
	       			$failFileName = $this->common->exportExcel($title, $repeat, 'mac地址导入失败数据', $this->config['fail_path'], $type = 'xlsx', false);
	       			$repeatNum = count($repeat);
	       			$this->db->insert('import_log', [
	       				'import_time' => date('Y-m-d H:i:s'),
	       				'import_file' => $fileOriginName,
	       				'import_file_rename' => $fileName,
	       				'import_count' => $count  + $repeatNum,
	       				'import_success' => $count,
	       				'import_fail' => $repeatNum,
	       				'import_fail_file' => $failFileName
	       			]);
	       		} catch (Exception $e) {
	       			$this->db->rollBack();
	       			$this->logger->error(sprintf('导入发生错误[%s]', $e->getMessage()));
	       		}

	       		unset($fileData);
	       		unset($repeat);
	       }
	       $this->smarty->assign('token', $this->common->getToken());
	       $this->smarty->display('import.html');
	    } else {
	        //获取上传失败以后的错误提示
	       echo $up->getErrorMsg();
	    }
	}

	/**
	 * mac导入日志列表
	 */
	public function list()
	{
		$importModel = $this->loadModel('import_model');
		$importList = $importModel->list();

		echo json_encode($importList);
	}

	/**
	 * 下载文件
	 * @return
	 */
	public function down()
	{
		ob_clean();
		$filename = $_GET['file'];
		switch ($_GET['type']) {
			case 'upload':
				$downPath = $this->config['upload_path'];
				break;
			case 'fail':
				$downPath = $this->config['fail_path'];
				break;
			default:
				$downPath = $this->config['upload_path'];
				break;
		}
		$filepath = $downPath . '/' . $filename;
		if (!file_exists($filepath)) {
			echo '文件不存在';
			exit;
		}
		$fp = fopen($filepath,"r");
		$filesize = filesize($filepath);
		header("Content-type:application/octet-stream");
		header("Accept-Ranges:bytes");
		header("Accept-Length:".$filesize);
		header("Content-Disposition: attachment; filename=".$filename);
		$buffer = 1024;
		$buffer_count = 0;
		while (!feof($fp) && $filesize-$buffer_count > 0) {
			$data = fread($fp, $buffer);
			$buffer_count += $buffer;
			echo $data;
		}
		fclose($fp);
	}
}