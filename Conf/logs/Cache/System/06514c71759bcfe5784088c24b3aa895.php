<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站点配置</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="./tpl/static/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="./tpl/static/artDialog/jquery.artDialog.js?skin=default" type="text/javascript"></script>
<script>
var dialog;
function showSetting(module,text){
	dialog = $.dialog({
		title:text+' 支付配置：',
		content:document.getElementById(module+'_setting'),
		lock:true,
		ok:function(){
			dialog.close();
			$('.form').submit();
		}
	});
}
</script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<style>
.set_top{background:url('<?php echo RES;?>/images/set_top.png');height:60px;}
.set_top li{font-weight: bold;float:left;width:98px;line-height:60px;text-align: center;background:url('<?php echo RES;?>/images/set_top_li.png');}
#set_top_li_bg{background:url('<?php echo RES;?>/images/set_top_li_hover.png');}

.pay_setting{margin:10px 0;padding:10px;border: 1px solid #ccc;}
#addn{margin:0 auto;padding: 20px;}
.setting_rows p{margin-top:10px;}
.setting_rows span{width:100px;display:inline-block;_display:inline;text-align:right;}
.setting_rows input{width:250px;}
.hidden{display:none;}
#artlist td img{vertical-align:middle;border:1px solid #ccc;width:60px;height:30px;margin-right:10px;}
.a_choose{
margin-left:20px;
border: 1px solid #3d810c;
box-shadow: 0 1px #CCCCCC;
-moz-box-shadow: 0 1px #CCCCCC;
-webkit-box-shadow: 0 1px #CCCCCC;
cursor: pointer;
display: inline-block;
text-align: center;
vertical-align: bottom;
overflow: visible;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
vertical-align: middle;
background-color: #f1f1f1;
background-image: -webkit-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%);
background-image: -moz-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%);
background-image: -ms-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%);
color: #000;
border: 1px solid #AAA;
padding: 2px 8px 2px 8px;
text-shadow: 0 1px #FFFFFF;
font-size: 14px;
line-height: 1.5;
}
#artlist{background:white;}
.px{height:17px;line-height:17px;padding:2px 4px;background-color: #ffffff;border-radius: 2px 2px 2px 2px;border: 1px solid;border-color: #848484 #E0E0E0 #E0E0E0 #848484;}
</style>
<div class="set_top">
	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(ACTION_NAME == $vo['name']): ?>id="set_top_li_bg"<?php endif; ?>><a href="<?php echo U($action.'/'.$vo['name'],array('pid'=>6,'level'=>3));?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div id="artlist">
<form id="myform" action="<?php echo U('Site/insert');?>" method="post" class="form">
	<table width="80%" border="0" cellspacing="0" cellpadding="0" id="addn">
		<tr> 
			<td  height="48" align="left"><strong>平台支付：</strong></td>
			<td>
				<select name="platform_open" id="pay_type">
					<option value="1"<?php if (C('platform_open')==1){echo ' selected';}?>>开启</option>
					<option value="0"<?php if (C('platform_open')==0){echo ' selected';}?>>关闭</option>
				</select>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开启后，若公众号没有开通此支付方式。用户将可以使用此方法进行支付。</span>
			</td>
		</tr>
		<tr> 
			<td align="left"><strong><img src="<?php echo ($staticPath); ?>/tpl/static/pay_icon/alipay.png"/>支付宝：</strong></td>
			<td>
				<div class="pay_setting">
					<div>
						<input type="radio" name="platform_alipay_open" id="open_alipay_yes" value="1" <?php if(C('platform_alipay_open') == 1): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_alipay_yes">开启</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="platform_alipay_open" id="open_alipay_no" value="0" <?php if(C('platform_alipay_open') == 0): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_alipay_no">关闭</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="###" onclick="showSetting('alipay','支付宝');" class="a_choose">配置信息</a>
					</div>
					<div class="hidden" id="alipay_setting">
						<div class="setting_rows">
							<p><span>帐号：</span><input type="text" name="platform_alipay_name" value="<?php echo C('platform_alipay_name');?>" class="px" /></p>
							<p><span>PID：</span><input type="text" name="platform_alipay_pid" value="<?php echo C('platform_alipay_pid');?>" class="px" /></p>
							<p><span>KEY：</span><input type="text" name="platform_alipay_key" value="<?php echo C('platform_alipay_key');?>" class="px" /></p>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td><strong><img src="<?php echo ($staticPath); ?>/tpl/static/pay_icon/tenpay.png"/>财付通(WAP手机)：</strong></td>
			<td>
				<div class="pay_setting">
					<div>
						<input type="radio" name="platform_tenpay_open" id="open_tenpay_yes" value="1" <?php if(C('platform_tenpay_open') == 1): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_tenpay_yes">开启</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="platform_tenpay_open" id="open_tenpay_no" value="0" <?php if(C('platform_tenpay_open') == 0): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_tenpay_no">关闭</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="###" onclick="showSetting('tenpay','财付通(WAP手机)');" class="a_choose">配置信息</a>
					</div>
					<div class="hidden" id="tenpay_setting">
						<div class="setting_rows">
							<p><span>partnerId：</span><input type="text" name="platform_tenpay_partnerid" value="<?php echo C('platform_tenpay_partnerid');?>" class="px" /></p>
							<p><span>partnerKey：</span><input type="text" name="platform_tenpay_partnerkey" value="<?php echo C('platform_tenpay_partnerkey');?>" class="px" /></p>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td><strong><img src="<?php echo ($staticPath); ?>/tpl/static/pay_icon/tenpay.png"/>财付通(即时到帐)：</strong></td>
			<td>
				<div class="pay_setting">
					<div>
						<input type="radio" name="platform_tenpayComputer_open" id="open_tenpaycomputer_yes" value="1" <?php if(C('platform_tenpayComputer_open') == 1): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_tenpaycomputer_yes">开启</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="platform_tenpayComputer_open" id="open_tenpaycomputer_no" value="0" <?php if(C('platform_tenpayComputer_open') == 0): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_tenpaycomputer_no">关闭</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="###" onclick="showSetting('tenpaycomputer','财付通(即时到帐)');" class="a_choose">配置信息</a>
					</div>
					<div class="hidden" id="tenpaycomputer_setting">
						<div class="setting_rows">
							<p><span>partnerId：</span><input type="text" name="platform_tenpayComputer_partnerid" value="<?php echo C('platform_tenpayComputer_partnerid');?>" class="px" /></p>
							<p><span>partnerKey：</span><input type="text" name="platform_tenpayComputer_partnerkey" value="<?php echo C('platform_tenpayComputer_partnerkey');?>" class="px" /></p>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td><strong><img src="<?php echo ($staticPath); ?>/tpl/static/pay_icon/allinpay.png"/>通联支付：</strong></td>
			<td>
				<div class="pay_setting">
					<div>
						<input type="radio" name="platform_allinpay_open" id="open_allinpay_yes" value="1" <?php if(C('platform_allinpay_open') == 1): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_allinpay_yes">开启</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="platform_allinpay_open" id="open_allinpay_no" value="0" <?php if(C('platform_allinpay_open') == 0): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_allinpay_no">关闭</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="###" onclick="showSetting('allinpay','通联支付');" class="a_choose">配置信息</a>
					</div>
					<div class="hidden" id="allinpay_setting">
						<div class="setting_rows">
							<p><span>商户号：</span><input type="text" name="platform_allinpay_merchantId" value="<?php echo C('platform_allinpay_merchantId');?>" class="px" /></p>
							<p><span>MD5 KEY：</span><input type="text" name="platform_allinpay_merchantKey" value="<?php echo C('platform_allinpay_merchantKey');?>" class="px" /></p>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td><strong><img src="<?php echo ($staticPath); ?>/tpl/static/pay_icon/yeepay.png"/>易宝支付：</strong></td>
			<td>
				<div class="pay_setting">
					<div>
						<input type="radio" name="platform_yeepay_open" id="open_yeepay_yes" value="1" <?php if(C('platform_yeepay_open') == 1): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_yeepay_yes">开启</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="platform_yeepay_open" id="open_yeepay_no" value="0" <?php if(C('platform_yeepay_open') == 0): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_yeepay_no">关闭</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="###" onclick="showSetting('yeepay','易宝支付');" class="a_choose">配置信息</a>
					</div>
					<div class="hidden" id="yeepay_setting">
						<div class="setting_rows">
							<p><span>商户编号：</span><input type="text" name="platform_yeepay_merchantaccount" value="<?php echo C('platform_yeepay_merchantaccount');?>" class="px" /></p>
							<p><span>商户私钥：</span><input type="text" name="platform_yeepay_merchantPrivateKey" value="<?php echo C('platform_yeepay_merchantPrivateKey');?>" class="px" /></p>
							<p><span>商户公钥：</span><input type="text" name="platform_yeepay_merchantPublicKey" value="<?php echo C('platform_yeepay_merchantPublicKey');?>" class="px" /></p>
							<p><span>易宝公钥：</span><input type="text" name="platform_yeepay_yeepayPublicKey" value="<?php echo C('platform_yeepay_yeepayPublicKey');?>" class="px" /></p>
							<p><span>商品类别码：</span><input type="text" name="platform_yeepay_product_catalog" value="<?php echo C('platform_yeepay_product_catalog');?>" class="px" /></p>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td><strong><img src="<?php echo ($staticPath); ?>/tpl/static/pay_icon/chinabank.png"/>网银在线：</strong></td>
			<td>
				<div class="pay_setting">
					<div>
						<input type="radio" name="platform_chinabank_open" id="open_chinabank_yes" value="1" <?php if(C('platform_chinabank_open') == 1): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_chinabank_yes">开启</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="platform_chinabank_open" id="open_chinabank_no" value="0" <?php if(C('platform_chinabank_open') == 0): ?>checked="checked"<?php endif; ?>/>&nbsp;<label for="open_chinabank_no">关闭</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="###" onclick="showSetting('chinabank','网银在线');" class="a_choose">配置信息</a>
					</div>
					<div class="hidden" id="chinabank_setting">
						<div class="setting_rows">
							<p><span>商户号：</span><input type="text" name="platform_chinabank_account" value="<?php echo C('platform_chinabank_account');?>" class="px" /></p>
							<p><span>MD5私钥：</span><input type="text" name="platform_chinabank_key" value="<?php echo C('platform_chinabank_key');?>" class="px" /></p>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<input type="hidden" name="files" value="platform.php" />
		<tr> 
			<td height="48" colspan="2">
				<div id="addkey"></div>
				<div style="padding-left:100px;">
					<input type="submit" value="保存设置" />
				</div>
			</td>
		</tr>
	</table>
</form>
<br />
<br />
<br />

</div>
</body>
</html>