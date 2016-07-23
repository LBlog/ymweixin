<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
<title>兑换点详情</title>
<link href="/tpl/static/hld/css/base.css" type="text/css" rel="stylesheet"/>
<link href="/tpl/static/hld/css/common.css" type="text/css" rel="stylesheet"/>
<link href="/tpl/static/hld/css/css3.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="/tpl/static/hld/js/jquery.js"></script>
<script type="text/javascript" src="/tpl/static/hld/js/TouchSlide.1.1.js"></script>
</head>
<body>
    <div class="main">
    	<!--banner start-->
        <div id="slideBox" class="slideBox"> 
            <div class="bd">
                <ul>
                <?php if(is_array($ext['images'])): foreach($ext['images'] as $key=>$banner): ?><li>
                        <a href="#"><img src="<?php echo ($banner); ?>" /></a>
                    </li><?php endforeach; endif; ?>
                   
                </ul>
            </div>
            <div class="pageState font14"></div>
            <div class="hd" style="display:none;">
                <ul></ul>
            </div>
		</div>
        <!--banner end-->
        <div class="hei10"></div>
        <ul class="det_list change_det">
        	<li>
            	<a href="##">
                	<img src="/tpl/static/hld/img/det_ico_03.png" width="26" class="fl"/>
                    <p class="c333 font14"><?php echo ($ext["title"]); ?></p>
                </a>
            </li>
            <li>
            	<a href="http://apis.map.qq.com/uri/v1/routeplan?type=bus&from=&fromcoord=&to=西湖&tocoord=119.546,35.4469&policy=1&referer=myapp">
                	<img src="/tpl/static/hld/img/det_ico_06.png" width="26" class="fl"/>
                    <p class="c333 font14"><?php echo ($ext["addr"]); ?></p>
                </a>
            </li>
            <li>
            	<a href="tel:<?php echo ($ext["tel"]); ?>">
                	<img src="/tpl/static/hld/img/det_ico_10.png" width="26" class="fl"/>
                    <p class="c333 font14">一键拨号</p>
                </a>
            </li>
        </ul>
        <div class="hei10"></div>
        <div class="det_intro font14 c666">
    <?php echo ($ext["content"]); ?>
        </div>
    </div>
</body>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#slideBox",
		titCell:".hd ul", 
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPage:true,//自动分页
		autoPlay:true //自动播放
	});
</script>
</html>