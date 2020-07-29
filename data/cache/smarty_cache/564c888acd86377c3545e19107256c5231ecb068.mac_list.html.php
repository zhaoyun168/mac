<?php
/* Smarty version 3.1.33, created on 2020-07-06 17:18:33
  from 'F:\xampp\htdocs\mac\view\mac_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f02ec6924e454_91445782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87199bd7367965faafdbe878cc557900865177ba' => 
    array (
      0 => 'F:\\xampp\\htdocs\\mac\\view\\mac_list.html',
      1 => 1564449794,
      2 => 'file',
    ),
    '870119fe30c09c6a0a8751be5ef2d014a8524e0b' => 
    array (
      0 => 'F:\\xampp\\htdocs\\mac\\view\\layout\\head.htm',
      1 => 1560996409,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5f02ec6924e454_91445782 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>mac管理平台</title>
    <link rel="stylesheet" href="./resource/css/bootstrap.min.css">  
	<script src="./resource/js/jquery.min.js"></script>
	<script src="./resource/js/bootstrap.min.js"></script>
</head><link rel="stylesheet" href="./resource/css/bootstrap-datetimepicker.min.css"> 
<link rel="stylesheet" href="./resource/css/bootstrap-table.min.css">
<link rel="stylesheet" href="./resource/css/bootstrap-dialog.min.css">
<link rel="stylesheet" href="./resource/css/bootstrapValidator.min.css">
<script src="./resource/js/bootstrap-datetimepicker.min.js"></script>
<script src="./resource/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="./resource/js/bootstrap-table.min.js"></script>
<script src="./resource/js/bootstrap-table-zh-CN.min.js"></script>
<script src="./resource/js/bootstrap-dialog.min.js"></script>
<script src="./resource/js/bootstrapValidator.min.js"></script>
<script src="./resource/js/bootstrapValidator-zh_CN.js"></script>
<script src="./resource/js/common.js"></script>
<body>
<div class="btn btn-default" style="text-align:left;width: 100%;">
	<form class="form-inline" role="form">
		<div class="form-group">
			<label for="code" style="margin-left: 28px;">编码</label>
		    <input type="text" class="form-control" id="code" placeholder="请输入编码">
		</div>
		<div class="form-group">
		    <label for="cable_address" style="margin-left: 8px;">有线地址</label>
		    <input type="text" class="form-control" id="cable_address" placeholder="请输入有线地址">
		</div>
		<div class="form-group">
		    <label for="wireless_address" style="margin-left: 8px;">无线地址</label>
		    <input type="text" class="form-control" id="wireless_address" placeholder="请输入无线地址">
	  	</div>
	    <div style="height: 8px;"></div>
	    <div class="form-group">
        	<label for="dtp_input1" >交接日期</label>
	    	<div class="input-group date form_date col-md-1" data-date="" data-date-format="'yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
            	<input class="form-control"  type="text" id="start_date" value="" style="width:200px" placeholder="开始时间" readonly>
            	<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
        	</div>
        	<div class="input-group date form_date col-md-1" data-date="" data-date-format="'yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            	<input class="form-control"  type="text" id="end_date" value="" style="width:200px" placeholder="结束时间" readonly>
            	<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
        	</div>
        </div>
	  	<button type="button" style="margin-left: 8px;" class="btn btn-primary" onclick="search_mac();">搜索</button>
	</form>
</div>
<!-- 新增mac -->
<div style="height: 20px;vertical-align: bottom;margin-top: 5px;">
<button class="btn btn-primary" id="btn_add">
	+新增mac
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
					新增mac
				</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="mac_form">
					<div class="form-group">
						<label for="code_add" class="col-sm-2 control-label">编码</label>
						<div class="col-sm-10">
							<input type="hidden" id="mac_id" value="">
							<input type="text" class="form-control" id="code_add" name="code_add" placeholder="请输入编码">
						</div>
					</div>
					<div class="form-group">
						<label for="cable_address_add" class="col-sm-2 control-label">有线地址</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="cable_address_add" name="cable_address_add"
								   placeholder="请输入有线地址">
						</div>
					</div>
					<div class="form-group">
						<label for="wireless_address_add" class="col-sm-2 control-label">无线地址</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="wireless_address_add" name="wireless_address_add"
								   placeholder="请输入无线地址">
						</div>
					</div>
					<div class="form-group">
						<label for="dtp_input3" class="col-sm-2 control-label">交接日期</label>
						<div class="col-sm-10">
							<div class="input-group date form_date col-md-1" data-date="" data-date-format="'yyyy-mm-dd" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd" id="handover_date_div">
					            <input class="form-control"  type="text" id="handover_date" value="" style="width:200px" placeholder="交接日期" readonly>
					            <span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
					        </div>
						</div>
					</div>
					<div class="form-group">
						<label for="remarks" class="col-sm-2 control-label">备注</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="6" id="remarks"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="button" id="save_mac" class="btn btn-primary">
					保存
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
<table id="mytab" class="table table-hover"></table>
<script>
    $('#mytab').bootstrapTable({
        url: 'index.php?c=mac&a=list&token=a4b7d79d5c6f223e9e34261baf42081e',
        method: 'get', 
        queryParams: function (params) {
	        var temp = {   
	            rows: params.limit,                         //页面大小
	            page: (params.offset / params.limit) + 1,   //页码
	            sort: params.sort,      //排序列名  
	            order: params.order, //排位命令（desc，asc） 
	            //mac_id: $("#mac_id").val(),
				code: $("#code").val(), //编码
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
                field: 'code',
                title: '编码'
            },
            {
                field: 'cable_address',
                title: '有线地址'
            },
            {
                field: 'wireless_address',
                title: '无线地址'
            },
            {
                field: 'handover_date',
                title: '交接日期'
            },
            {
                field: 'remarks',
                width: '300px',
                title: '备注',
                formatter: function(value, rowData){
                	if (value != '') {
                		return '<span title="'+value+'">'+rowData.remarks_small+'</span>';
                	} else {
                		return '';
                	}
                }
            },
            {
                field: 'id',
                title: '操作',
                width: 120,
                align: 'center',
                valign: 'middle',
                formatter: actionFormatter,
            },

        ]
    });
    //操作栏的格式化
    function actionFormatter(value, row, index) {
        var id = value;
        var result = "";
        //result += "<a href='javascript:;' class='btn btn-xs green' onclick=\"EditViewById('" + id + "', view='view')\" title='查看'><span class='glyphicon glyphicon-search'></span></a>";
        result += "<a href='javascript:;' class='btn btn-xs blue' onclick=\"edit_mac('" + id + "')\" title='编辑'><span class='glyphicon glyphicon-pencil'></span></a>";
        result += "<a href='javascript:;' class='btn btn-xs red' onclick=\"delete_mac('" + id + "')\" title='删除'><span class='glyphicon glyphicon-remove'></span></a>";
        return result;
    }
</script>
<script type="text/javascript">
$(function() {
	$('.form_date').datetimepicker({
	    minView: "month", //选择日期后，不会再跳转去选择时分秒 
	    language:  'zh-CN',
	    format: 'yyyy-mm-dd',
	    todayBtn:  1,
	    autoclose: 1,
	});
	$('.form_date').datetimepicker('update', new Date());
	$('#start_date').val('');
	$('#end_date').val('');

    $("#btn_add").click(function () {
        $("#myModalLabel").text("新增mac");
        $('#myModal').modal();
        $("#mac_id").val();
        $('#handover_date_div').datetimepicker({
		    minView: "month", //选择日期后，不会再跳转去选择时分秒 
		    language:  'zh-CN',
		    format: 'yyyy-mm-dd',
		    todayBtn:  1,
		    autoclose: 1,
		});
		$('#handover_date_div').datetimepicker('update', new Date());
		$('#handover_date').val('');
		document.getElementById("mac_form").reset();
    });

    formValidator();

    $("#save_mac").click(function () {//非submit按钮点击后进行验证，如果是submit则无需此句直接验证
        $("#mac_form").bootstrapValidator('validate');//提交验证
        if ($("#mac_form").data('bootstrapValidator').isValid()) {//获取验证结果，如果成功，执行下面代码
            save_mac();
        }
    });

    $('#myModal').on('hidden.bs.modal', function() {
        $("#mac_form").data('bootstrapValidator').destroy();
        $('#mac_form').data('bootstrapValidator', null);
        formValidator();
    });
});

//保存mac
function save_mac()
{
	var params = {};
	var mac_id = $("#mac_id").val();
	var code_add = $("#code_add").val(); //编码
	var cable_address_add = $("#cable_address_add").val(); //有线地址
	var wireless_address_add = $("#wireless_address_add").val(); //无线地址
	var handover_date = $("#handover_date").val(); //交接日期
	var remarks = $("#remarks").val(); //备注
	params.id = mac_id;
	params.code = code_add;
	params.cable_address = cable_address_add;
	params.wireless_address = wireless_address_add;
	params.handover_date = handover_date;
	params.remarks = remarks;

	if (!mac_id) {
		//新增保存mac
	    $.ajax({
	        type:"POST",
	        url:'index.php?c=mac&a=insert&token=a4b7d79d5c6f223e9e34261baf42081e',
	        data:params,
	        dataType:'json',
	        success:function (responce) {
	            if (responce['error'] == 0) {
					$.showSuccessTimeout('保存成功', close_modal);
	            } else {
	                $.showErr('保存失败');
	            }
	        }
	    });
	} else {
		//编辑保存mac
	    $.ajax({
	        type:"POST",
	        url:'index.php?c=mac&a=update&token=a4b7d79d5c6f223e9e34261baf42081e',
	        data:params,
	        dataType:'json',
	        success:function (responce) {
	            if (responce['error'] == 0) {
					$.showSuccessTimeout('保存成功', close_modal);
	            } else {
	                $.showErr('保存失败');
	            }
	        }
	    });
	}

	$('#mytab').bootstrapTable('refresh');
}

function close_modal()
{
    $('#myModal').modal('hide');
}

//编辑mac
function edit_mac(id)
{
	$("#myModalLabel").text("编辑mac");
    $('#myModal').modal();
    $('#handover_date_div').datetimepicker({
	    minView: "month", //选择日期后，不会再跳转去选择时分秒 
	    language:  'zh-CN',
	    format: 'yyyy-mm-dd',
	    todayBtn:  1,
	    autoclose: 1,
	});
	$('#handover_date_div').datetimepicker('update', new Date());

	//查询mac数据
    $.ajax({
        type:"POST",
        url:'index.php?c=mac&a=search&token=a4b7d79d5c6f223e9e34261baf42081e',
        data:{'id':id},
        dataType:'json',
        success:function (responce) {
            if (responce['error'] == 0) {
            	$("#mac_id").val(responce['data']['id']);
            	$("#code_add").val(responce['data']['code']); //编码
				$("#cable_address_add").val(responce['data']['cable_address']); //有线地址
				$("#wireless_address_add").val(responce['data']['wireless_address']); //无线地址
				$("#handover_date").val(responce['data']['handover_date']); //交接日期
				$("#remarks").val(responce['data']['remarks']); //备注
            } else {
                $.showErr('查询mac数据失败');
            }
        }
    });
}

function delete_mac(id)
{
	$.showConfirm('确定要删除此mac数据吗？', function () {
		//删除mac数据
	    $.ajax({
	        type:"POST",
	        url:'index.php?c=mac&a=delete&token=a4b7d79d5c6f223e9e34261baf42081e',
	        data:{'id':id},
	        dataType:'json',
	        success:function (responce) {
	            if (responce['error'] == 0) {
	            	$.showSuccessTimeout('删除成功');
					$('#mytab').bootstrapTable('refresh');
	            } else {
	                $.showErr('删除mac数据失败');
	            }
	        }
	    });
	});
}

function search_mac()
{
	$('#mytab').bootstrapTable('refresh');
}

function formValidator()
{
	$("#mac_form").bootstrapValidator({
        live: 'enabled',//验证时机，enabled是内容有变化就验证（默认），disabled和submitted是提交再验证
        excluded: [':disabled', ':hidden', ':not(:visible)'],//排除无需验证的控件，比如被禁用的或者被隐藏的
        submitButtons: '#btn-test',//指定提交按钮，如果验证失败则变成disabled，但我没试成功，反而加了这句话非submit按钮也会提交到action指定页面
        message: '通用的验证失败消息',//好像从来没出现过
        feedbackIcons: {//根据验证结果显示的各种图标
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            code_add: {
                validators: {
                    notEmpty: {//检测非空
                        message: '请输入编码'
                    },
                }
            },
            cable_address_add: {
                validators: {
                    notEmpty: {//检测非空
                        message: '请输入有线地址'
                    },
                    stringLength: {//检测长度
                        min: 12,
                        max: 12,
                        message: '长度必须12位'
                    },
                }
            },
            wireless_address_add: {
                validators: {
                    notEmpty: {//检测非空
                        message: '请输入无线地址'
                    },
                    stringLength: {//检测长度
                        min: 12,
                        max: 12,
                        message: '长度必须12位'
                    },
                }
            },
        }
    });
}
</script>
</body><?php }
}