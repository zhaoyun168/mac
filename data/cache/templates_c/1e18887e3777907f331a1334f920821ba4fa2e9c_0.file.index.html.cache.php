<?php
/* Smarty version 3.1.33, created on 2019-06-25 17:20:35
  from 'D:\xampp\htdocs\mac\view\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d11e763c30fb9_45594792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e18887e3777907f331a1334f920821ba4fa2e9c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\mac\\view\\index.html',
      1 => 1561429555,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/head.htm' => 1,
  ),
),false)) {
function content_5d11e763c30fb9_45594792 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17500743575d11e763bbbca6_12927757';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $_smarty_tpl->_subTemplateRender("file:layout/head.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style type="text/css">
    body {
    width: 100%;
    height: 100%;
    margin: 0;
    overflow: hidden;
    background-color: #FFFFFF;
    font-family: "Microsoft YaHei", sans-serif;
 }
 .pageSidebar{
    width: 240px;
    height:100%;
    padding-bottom: 30px;
    overflow: auto;
    background-color: #e3e3e3;
 }
 .splitter {
     width: 5px;
     height: 100%;
     bottom: 0;
     left: 240px;
     position: absolute;
     overflow: hidden;
     background-color: #fff;
 }
 .pageContent{
     height: 100%;
     min-width: 768px;
     left: 246px;
     top: 0;
     right: 0;
     z-index: 3;
     padding-bottom: 30px;
     position: absolute;
 }
 .pageContainer{
     bottom: 0;
     left:0;
     right: 0;
     top: 53px;
     overflow: auto;
     position: absolute;
     width: 100%;
 }
 .footer {
     width: 100%;
     height: 30px;
     line-height: 30px;
     margin-top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     position: absolute;
     z-index: 10;
     background-color:#DFDFDF;
 }
</style>
<body>
<!--顶部导航栏部分-->
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" title="logoTitle" href="#">MAC地址管理平台</a>
   </div>
   <div class="collapse navbar-collapse">
       <ul class="nav navbar-nav navbar-right">
           <li role="presentation">
               <a href="#">当前用户：<span class="badge">admin</span></a>
           </li>
        </ul>
   </div>
</div>      
</nav>
<!-- 中间主体内容部分 -->
<div class="pageContainer">
 <!-- 左侧导航栏 -->
 <div class="pageSidebar">
     <ul class="nav nav-stacked nav-pills">
         <li class="active" role="presentation">
             <a href="index.php?c=mac&a=index&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" target="mainFrame" >mac地址列表</a>
         </li>
         <li role="presentation">
             <a href="index.php?c=import&a=index&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" target="mainFrame">mac地址导入</a>
         </li>
     </ul>
 </div>
 <!-- 左侧导航和正文内容的分隔线 -->
 <div class="splitter"></div>
 <!-- 正文内容部分 -->
 <div class="pageContent">
     <iframe src="index.php?c=mac&a=index&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" id="mainFrame" name="mainFrame" frameborder="0" width="100%"  height="100%" frameBorder="0"></iframe>
 </div>
</div>
<!-- 底部页脚部分 -->
<div class="footer">
 <p class="text-center">
     2019 &copy; mac地址.
 </p>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
$(".nav li").click(function() {
    $(".active").removeClass('active');
    $(this).addClass("active");
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
