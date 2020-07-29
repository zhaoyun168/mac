<?php
/**
 * Common
 */
namespace Library;

/**
 * Class Common
 * @package Library
 */
class Common
{
	const TOKEN = 'a4b7d79d5c6f223e9e34261baf42081e';// md5(md5('abc123').'KEY')

	/**
	 * __construct
	 */
	public function __construct()
	{
		
	}

	/**
	 * 得到分页参数
	 * @return array page limit sort order
	 */
	public function getPageParam()
	{
	    $page = isset($_GET["page"]) ? $_GET["page"] : '';
	    $page = empty($page) ? 1 : $page;
	    $limit = isset($_GET["rows"]) ? $_GET["rows"] : '';
	    $limit = empty($limit) ? 10 : $limit;
	    $sort = isset($_GET["sort"]) ? $_GET["sort"] : '';
	    $sort = empty($sort) ? NULL : $sort;
	    $order = isset($_GET["order"]) ? $_GET["order"] : '';
	    $order = empty($order) ? NULL : $order;

	    return array($page, $limit, $sort, $order);
	}

	/**
	 * 计算列表开始位置
	 *
	 * @param int $total
	 * @param int $page
	 * @param int $limit
	 * @return int
	 */
	public function getListStart($total, $page, $limit)
	{
	    $total_pages = ceil($total / $limit);
	    $page = $page > $total_pages ? $total_pages : $page;
	    $start = $limit * $page - $limit;
	    $start = $start > 0 ? $start : 0;
	    return $start;
	}

	/** 

	*  数据导入 
	* @param string $file excel文件 
	* @param string $sheet 
	* @return string   返回解析数据 
	* @throws PHPExcel_Exception 
	* @throws PHPExcel_Reader_Exception 
	*/ 
	public function importExcel($file = '', $sheet = 0)
    {
    	set_time_limit(0);
		ini_set('memory_limit', '2048M');

        $file = iconv("utf-8", "gb2312", $file);   //转码
        if (empty($file) OR !file_exists($file)) {
            die('file not exists!');
        }

        $objRead = new \PHPExcel_Reader_Excel2007();   //建立reader对象
        if (!$objRead->canRead($file)) {
            $objRead = new \PHPExcel_Reader_Excel5();
            if (!$objRead->canRead($file)) {
                die('No Excel!');
            }
        }

        $obj = $objRead->load($file);  //建立excel对象
        $data = $obj->getSheet($sheet)->toArray();//获取为数组

        return $data;
    }

    /**
     * 管理员权限
     * @return
     */
    public function admin_priv()
    {
    	$token = isset($_GET['token']) && !empty($_GET['token']) ? $_GET['token'] : '';
    	if ($token != self::TOKEN) {
    		echo  'no access';
    		exit;
    	}
    }

    /**
     * 获取token
     * @return
     */
    public function getToken()
    {
    	$token = isset($_GET['token']) && !empty($_GET['token']) ? $_GET['token'] : '';

    	return $token;
    }

    public function exportExcel($title = [], $items = [], $fileName = '', $savePath = './', $type = 'xls', $isDown = false)
    {
    	set_time_limit(0);
		ini_set('memory_limit', '2048M');
		
    	$objPHPExcel = new \PHPExcel();

    	//横向单元格标识  
	    $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

	    $objActSheet = $objPHPExcel->getActiveSheet();
        //定义表头
        if (!empty($title) && is_array($title)) {
        	foreach ($title as $key => $value) {
        		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$key] . '1', $value);
        		//$objActSheet->getColumnDimension($cellName[$key])->setAutoSize(true);
        		$objActSheet->getColumnDimension($cellName[$key])->setWidth(15);
        	}
        }

        //设置内容，从第二行开始
        if (!empty($items) && is_array($items)) {
        	$i = 2;
	        foreach ($items as $itemKey => $item) {
	        	foreach ($item as $infoKey => $infoValue) {
	        		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$infoKey] . $i, $infoValue);
	        	}
	            $i++;
	        }
        }

        $time = date('YmdHis', time());

        //保存路径
		if(!is_dir($savePath))
		{
			@mkdir($savePath);
			@chmod($savePath,0777);
		}

        if ($type == 'xls') {
        	$fileName = $fileName . $time . '.xls';

        	if (!$isDown) {
	        	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	        	$objWriter->save($savePath .'/'. $fileName);
		    	return $fileName;
	        }

        	//导出Excel5 (.xls)
	        // Redirect output to a client’s web browser (Excel5)
	        header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename=' . $fileName);
	        header('Cache-Control: max-age=0');
	        // If you're serving to IE 9, then the following may be needed
	        header('Cache-Control: max-age=1');
	        
	        // If you're serving to IE over SSL, then the following may be needed
	        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	        header ('Pragma: public'); // HTTP/1.0
	        
	        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	        $objWriter->save('php://output');
        	exit;
        } else {
        	$fileName = $fileName . $time . '.xlsx';

        	if (!$isDown) {
	        	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		    	$objWriter->save($savePath .'/'. $fileName);
		    	return $fileName;
	        }

        	//导出Excel2007 (.xlsx)
	        // Redirect output to a client’s web browser (Excel2007)
	        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	        header('Content-Disposition: attachment;filename=' . $fileName);
	        header('Cache-Control: max-age=0');
	        // If you're serving to IE 9, then the following may be needed
	        header('Cache-Control: max-age=1');

	        // If you're serving to IE over SSL, then the following may be needed
	        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
	        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	        header('Pragma: public'); // HTTP/1.0

	        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	        $objWriter->save('php://output');
	        exit;
        }
    }
}
