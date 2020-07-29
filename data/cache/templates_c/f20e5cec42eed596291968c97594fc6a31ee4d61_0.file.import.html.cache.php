<?php
/* Smarty version 3.1.33, created on 2019-06-25 17:41:57
  from 'D:\xampp\htdocs\mac\view\import.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d11ec65174193_33200144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f20e5cec42eed596291968c97594fc6a31ee4d61' => 
    array (
      0 => 'D:\\xampp\\htdocs\\mac\\view\\import.html',
      1 => 1561450923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/head.htm' => 1,
  ),
),false)) {
function content_5d11ec65174193_33200144 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '15054660235d11ec6511e281_89133143';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $_smarty_tpl->_subTemplateRender("file:layout/head.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<link rel="stylesheet" href="./resource/css/bootstrap-datetimepicker.min.css"> 
<link rel="stylesheet" href="./resource/css/bootstrap-table.min.css">
<link rel="stylesheet" href="./resource/css/bootstrap-dialog.min.css">
<?php echo '<script'; ?>
 src="./resource/js/bootstrap-datetimepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./resource/js/bootstrap-datetimepicker.zh-CN.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./resource/js/bootstrap-table.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./resource/js/bootstrap-table-zh-CN.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./resource/js/bootstrap-dialog.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./resource/js/common.js"><?php echo '</script'; ?>
>
<body>
<!-- 新增mac -->
<div style="height: 20px;vertical-align: bottom;margin-top: 5px;">
	<button class="btn btn-primary" id="import_mac">
		mac导入
	</button>
</div>
<!-- 新增mac弹框 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					导入mac
				</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="mac_form" action="index.php?c=import&a=data_upload&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" method="POST" enctype="multipart/form-data">
					<div class="form-group">
				    	<div class="col-sm-10">
				    		<input type="file" name="file_address" id="file_address">
				    		<p class="help-block">请选择Excel文件</p>
				    	</div>
				  	</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="button" class="btn btn-primary" onclick="improt_mac(this);">
					导入
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
<table id="mytab" class="table table-hover"></table>
<?php echo '<script'; ?>
 type="text/javascript">
$(function() {
	$("#import_mac").click(function () {
	    $("#myModalLabel").text("导入mac");
	    $('#myModal').modal();
	});

	$('#mytab').bootstrapTable({
        url: 'index.php?c=import&a=list&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
',
        method: 'get', 
        queryParams: function (params) {
	        var temp = {   
	            rows: params.limit,                         //页面大小
	            page: (params.offset / params.limit) + 1,   //页码
	            sort: params.sort,      //排序列名  
	            order: params.order, //排位命令（desc，asc） 
	            //mac_id: $("#mac_id").val(),
				//code: $("#code").val(), //编码
				cable_address: $("#cable_address").val(), //有线地址
				wireless_address: $("#wireless_address").val(), //无线地址
				start_date: $("#start_date").val(), //交接日期（开始）
				end_date: $("#end_date").val(), //交接日期（结束）
				//remarks: $("#remarks").val() //备注
	        };
	        return temp;
	    },
        toolbar: "#toolbar",
        sidePagination: "server",
        striped: true, // 是否显示行间隔色
        //search : "true",
        uniqueId: "id",
        pageNumber:1,                       //初始化加载第一页，默认第一页
        pageSize: 10,                       //每页的记录行数（*）
        pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
        pagination: true, // 是否分页
        sortable: true, // 是否启用排序
        sort: "id",  //排序列名  
      	sortOrder: 'asc', //排位命令（desc，asc）
        columns: [{
                field: 'id',
                title: '导入批次'
            },
            {
                field: 'import_time',
                title: '导入时间'
            },
            {
                field: 'import_file',
                title: '导入文件名',
                formatter: function(value, rowData){
                	if (value != '') {
                		return '<a href="index.php?c=import&a=down&file='+rowData.import_file_rename+'&type=upload&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">'+value+'</a>';
                	} else {
                		return '';
                	}
                }
            },
            {
                field: 'import_count',
                title: '导入总量'
            },
            {
                field: 'import_success',
                title: '导入成功量'
            },
            {
                field: 'import_fail',
                title: '导入失败量'
            },
            {
                field: 'import_fail_file',
                title: '导入失败原因',
                formatter: function(value, rowData){
                	if (value != '') {
                		return '<a href="index.php?c=import&a=down&file='+value+'&type=fail&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">'+value+'</a>';
                	} else {
                		return '';
                	}
                }
            },
        ]
    });
});

function improt_mac(ele)
{
	if(!$("#file_address").val())
	{
		$.showErr('请选择导入数据文件！');
		return false;
	}

	if (!checkFileType()) {
		$.showErr("请上传xls/xlsx类型的文件！")
        //$('#file_address').val("");
        return false;
	}

	//保存
    $("#mac_form").submit();

    $(ele).attr('disabled', true);
    $(ele).html('正在导入，请稍后。。。');
}

function getFileType(filePath){
	var startIndex = filePath.lastIndexOf(".");
  	if(startIndex != -1)
  	{
    	return filePath.substring(startIndex+1, filePath.length).toLowerCase();
  	} else {
  		return "";
  	}
}

function checkFileType()
{
	var filevalue = $('#file_address').val();
    var fileType = getFileType(filevalue);
    if(fileType !== 'xls' && fileType !== 'xlsx'){
       return false;
    }

    return true;
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
