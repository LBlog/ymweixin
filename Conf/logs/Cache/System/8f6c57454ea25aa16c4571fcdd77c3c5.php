<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo ($f_siteName); ?>-后台管理系统</title>
	<meta name="keywords" content="<?php echo ($f_siteName); ?>-后台管理系统" />
	<meta name="description" content="<?php echo ($f_siteName); ?>-后台管理系统" />
	<link href="<?php echo RES;?>/images/style.css" type="text/css" rel="stylesheet">
	<meta http-equiv="x-ua-compatible" content="ie=7" />
	<script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
	<script src="<?php echo RES;?>/js/frame.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo STATICS;?>/artDialog/jquery.artDialog.js?skin=default"></script>
	<script type="text/javascript" src="<?php echo STATICS;?>/artDialog/plugins/iframeTools.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.body_nbsp').height($(window).height()-$('#header').height()-30);
			$(window).resize(function(){
				$('.body_nbsp').height($(window).height()-$('#header').height()-30);
			});
		});
	</script>
	<style type="text/css">
		.top{background:url(<?php echo ($staticPath); ?>/tpl/System/common/images/topbg.png) 20px center no-repeat;height:92px;}
	</style>
</head>
<body class="showmenu" style="overflow:hidden;">
	<table width="100%" height="100%" border=0 cellpadding="0" cellSpacing=0>
		<tr>
			<td>
				<div id="header">
					<div class="top">
						<a href="/index.php?g=System&m=System&a=index" class="logo" title="首页">首页</a>
						 <div class="login">
							<li>您好：<b><?php echo (session('username')); ?></b> ，欢迎使用GopeSystem！</li>	
							<li><a href="/index.php" target="_blank"> 访问首页</a></li>
							<li><a href="/index.php?g=User&m=Index&a=index" target="_blank">用户中心</a></li>
							<li><a href="<?php echo U('Admin/logout');?>">[退出]</a></li>
						</div>
					</div>
					<div class="tm">
						<ul>
							<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav_val): $mod = ($i % 2 );++$i;?><li class="nav" id="link<?php echo ($nav_val['id']); ?>">
									<a href="#" onClick="JumpleftFrame('<?php echo U('System/menu',array('pid'=>$nav_val['id'],'level'=>2,'title'=>rawurlencode($nav_val['title'])));?>',<?php echo ($nav_val['id']); ?>);"><?php echo ($nav_val['title']); ?></a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div class="topnav"><p><a href="#" id="togglemenu">隐藏菜单</a>&nbsp;<span class="fr"><a href="http://www.gope.cn" target="_blank" style="color:red">程序不断升级中，更多升级请访问：狗扑源码社区 或者关注微信公众号：gope</a></span>                    					</div>
					<div class="fr"></div>
				</div>
				<i class="tico"></i>
			</td>
		</tr>
		<tr>
			<td height="100%" bgcolor="#ffffff">
				<table width="100%" height="100%" cellpadding="0" cellSpacing="0" border="0" borderColor="#ff0000">
					<tr>
						<td noWrap id="frmTitle" bgcolor="#ff0000" width="226" height="100%" style="padding-right:0px;border-right:none;">
							<iframe class="body_nbsp" frameBorder="0" id="left" name="left" scrolling="auto" src="<?php echo U('System/menu');?>" style="HEIGHT:100%;VISIBILITY:inherit;width:200px;Z-INDEX:2" allowtransparency="true"></iframe>
						</td>
						<td class="body_nbsp"></td>
						<td width="100%">
							<table height="100%" cellSpacing="0" cellPadding="0" width="100%" align="right" border="0">
								<tr>
									<td align="right"><iframe class="body_nbsp" id="main" name="main" style="width: 100%; HEIGHT: 100%" src="<?php echo U('System/main');?>" frameBorder=0></iframe></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<div id="footer">
					<i class="tico" style="left:211px;"></i>
					<p class="fr"> Copyright &copy; 2014-2015 <script language=javascript>

window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x77\x72\x69\x74\x65\x6c\x6e"]("\x3c\x61 \x68\x72\x65\x66\x3d\"\x68\x74\x74\x70\x3a\/\/\x62\x62\x73\x2e\x67\x6f\x70\x65\x2e\x63\x6e\/\" \x74\x61\x72\x67\x65\x74\x3d\"\x5f\x62\x6c\x61\x6e\x6b\" \x73\x74\x79\x6c\x65\x3d\"\x63\x6f\x6c\x6f\x72\x3a\x23\x30\x30\x30\x30\x43\x44\x3b\" \x3e\x3c\x62\x3e\u72d7\u6251\u6e90\u7801\u793e\u533a\x3c\/\x62\x3e\x3c\/\x61\x3e");

</script> 版权所有  </p>
				</div>
			</td>
		</tr>
	</table>
	<?php if(!empty($content)): ?><!--ad start-->
		<div id="ad1" style="width: 100%; height: 100%; position: fixed; z-index: 1997; top: 0px; left: 0px; overflow: hidden;">
			<div style="height: 100%; background: none repeat scroll 0% 0% rgb(0, 0, 0); opacity: 0.65;filter:alpha(opacity=65);"></div>
		</div>
		<div id="ad2" style="position:fixed; text-align:center; width:100%; top:140px; z-index:30001">
			<a href="http://up.pigcms.cn/oa/admin.php?m=notice&c=view&a=index&id=<?php echo ($content["id"]); ?>" target="_blank"><img src="<?php echo ($content["image"]); ?>" /></a>
		</div>
		<div id="ad3" style="position:fixed; text-align:center; width:100%; top:140px;z-index:30012; background:#f80; opacity:0;filter:alpha(opacity=0);">
			<div style="height:40px;width:700px;margin:0 auto;z-index:30012;">
				<div onclick="closeAD()" style="height:45px;width:45px;margin:0 0 0 655px;cursor:pointer;"></div>
			</div>
		</div>
		<script>
			function closeAD(){
				$('#ad1').animate({opacity: "hide"}, "slow");
				$('#ad2').animate({opacity: "hide"}, "slow");
				$('#ad3').animate({opacity: "hide"}, "slow");
				$.ajax({url: "?g=System&m=System&a=closeAD&id=<?php echo ($content["id"]); ?>",dataType: "json"});
			}
		</script>
		<!--ad end--><?php endif; ?>
</body>
</html>