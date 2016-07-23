<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>店铺详情</title>
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
                        <?php if(is_array($shop['images'])): foreach($shop['images'] as $key=>$banner): ?><li>
                                <a href="javascript:void(0)"><img src="<?php echo ($banner); ?>" /></a>
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
            <ul class="det_list">
                <li>
                    <a href="##">
                        <img src="/tpl/static/hld/img/det_ico_03.png" width="26" class="fl"/>
                        <p class="c333 font14"><?php echo ($shop["title"]); ?></p>
                    </a>
                </li>
                <li>
                    <a href="http://apis.map.qq.com/uri/v1/marker?marker=coord:<?php echo ($shop['latitude']); ?>,<?php echo ($shop['longitude']); ?>;title:<?php echo ($shop['title']); ?>;addr:<?php echo ($shop['addr']); ?>&referer=huanledui">
                        <img src="/tpl/static/hld/img/det_ico_06.png" width="26" class="fl"/>
                        <p class="c333 font14"><?php echo ($shop["addr"]); ?></p>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="/tpl/static/hld/img/det_ico_08.png" width="26" class="fl"/>
                        <p class="c333 font14">返还消费金额<?php echo ($shop["per"]); ?>%积分</p>
                    </a>
                </li>
                <li>
                    <a href="tel:<?php echo ($shop["tel"]); ?>">
                        <img src="/tpl/static/hld/img/det_ico_10.png" width="26" class="fl"/>
                        <p class="c333 font14">一键拨号</p>
                    </a>
                </li>
            </ul>
            <div class="hei10"></div>
            <div class="det_intro font14 c666">
                <?php echo ($shop["summary"]); ?>
            </div>
            <div class="det_intro font14 c666">
                <?php echo ($shop["content"]); ?>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        TouchSlide({
            slideCell: "#slideBox",
            titCell: ".hd ul",
            mainCell: ".bd ul",
            effect: "leftLoop",
            autoPage: true, //自动分页
            autoPlay: true //自动播放
        });
    </script>
</html>