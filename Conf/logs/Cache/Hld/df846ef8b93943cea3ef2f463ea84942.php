<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>店铺分类</title>
        <link href="/tpl/static/hld/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="/tpl/static/hld/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="/tpl/static/hld/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="/tpl/static/hld/js/jquery.js"></script>
        <script type="text/javascript" src="/tpl/static/hld/js/TouchSlide.1.1.js"></script>
    </head>
    <body bgcolor="#eee">
        <div class="main">
            <!--banner start-->
            <div id="slideBox" class="slideBox mB10"> 
                <div class="bd">
                    <ul>
                        <?php if(is_array($banner)): foreach($banner as $key=>$vo): ?><li>
                                <a href="#"><img src="<?php echo ($vo); ?>" width="100%" /></a>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
                <div class="pageState font14"></div>
                <div class="hd" style="display:none;">
                    <ul></ul>
                </div>
            </div>
            <!--banner end-->
            <div class="class_list">
                <ul class="clearfix">
                    <?php if(is_array($mtype)): foreach($mtype as $key=>$item): ?><li class="wd50"><a href="?g=Hld&m=Mall&a=shoplist&id=<?php echo ($item["id"]); ?>&name=<?php echo ($item["name"]); ?>&token=<?php echo ($_GET['token']); ?>"><img src="<?php echo ($item["img"]); ?>" width="100%"/></a></li>
                        <input type="hidden" value="<?php echo ($item["id"]); ?>"><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
        
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
    </body>

</html>