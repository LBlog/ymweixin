<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body style="background:none">
<div class="content">
<div class="box">
	<h3>晖硕微信系统GopeSystem说明</h3>
    <div class="con dcon">
    <div class="update">
    <p>服务器环境：[<?php echo PHP_OS; ?>]<?php echo $_SERVER[SERVER_SOFTWARE];?> MySql:<?php echo mysql_get_server_info(); ?> php:<?php echo PHP_VERSION; ?>&nbsp;&nbsp;&nbsp;Zend版本：<?php $zend_version = zend_version();if(empty($zend_version)){echo '<font color=red>×</font>';}else{echo $zend_version;}?></p>

    <p>服务器IP：<?php echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT']; ?></p>
  
    <p>当前网站语言：<?php echo getenv("HTTP_ACCEPT_LANGUAGE"); ?></p>

    <p>被屏蔽的函数：<?php echo get_cfg_var("disable_functions")?get_cfg_var("disable_functions"):"无" ; ?></p>
    <p><span class="black"><strong>升级日期：</strong><font color="red"><?php echo ($release); ?></font></span></p>
    <p class="black"><strong>您的程序版本为：</strong><font color="red"><?php echo ($vername); ?> v<?php echo ($ver); ?>&nbsp;&nbsp;&nbsp;<a href="http://www.gope.cn/" target="_blank"><strong>检查更新</strong></a></font>    </p>
    <p><a href="?g=System&m=System&a=repairTable" class="blue" style="color:green">系统反应慢，关键词没响应，请点击这里删除一下缓存</a></p>
    </div>
     <ul class="myinfo">
        <li>
          <p class="black">晖硕致力于降低中小站长建站成本！</p> 
        </li>
	</ul>
    </div>
</div>
<!--/box-->
<div class="box">
	<h3><?php echo C('site_name');?>更新消息</h3>
    <div class="con dcon">

	
    <ul class="myinfo kjinfo">
       <script type="text/javascript" src="http://www.gope.cn/ads/new10.js" charset='gbk'></script>
	</ul>
    </div>
</div>

<!--/box-->
</div>
<script>
function systemupdatecheck(){
	$.ajax({
		type: "GET",
		url: "Services/EFService.svc/Members",
		data: "{}",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		success: function (data) {
			if (data.success == true) {
				setTimeout("window.location.href = location.href",2000);
			} else {
				alert(data.msg);
			}
		},
		error: function (msg) {
			alert(msg);
		}
	});
}
</script>
</body>
</html>