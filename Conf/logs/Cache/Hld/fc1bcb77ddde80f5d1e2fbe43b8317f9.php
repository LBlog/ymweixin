<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
<title>二维码</title>
<link href="<?php echo STATICS;?>/css/base.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS;?>/css/common.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS;?>/css/css3.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS;?>/js/jquery.js"></script>
</head>
<body bgcolor="#f7f7f7">
    <div class="main">
    	<div class="ewm">
            <img src="<?php echo (($qrcodeBgImgArr)?($qrcodeBgImgArr):'/tpl/static/hld/img/ewm.png'); ?>" width="200" alt="二维码背景"/>
            <img src="<?php echo ($qrcode); ?>" width="110" alt="后台传入二维码" class="ewm_img radius5"/>
        </div>
    </div>
</body>
</html>