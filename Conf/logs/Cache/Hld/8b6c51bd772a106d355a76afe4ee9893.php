<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>推客好友</title>
        <link href="<?php echo STATICS;?>/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo STATICS;?>/js/jquery.js"></script>
    </head>
    <body>
        <div class="main">
            <div class="points_top">
                <div class="p_head radius50 fl">
                    <img src="<?php echo ($userinfo['portrait']); ?>" width="80" class="radius50"/>
                </div>
                <p class="cfff font17">累计推客：<?php echo ($count); ?>人</p>
            </div>
            <div class="hei10"></div>
            <ul class="points_list bgfff">
                <?php if(empty($twitterinfo)): ?><p class="texC c999 font14" style="line-height:22px;">暂时没有下级推客</p>
                    <?php else: ?>
                    <?php if(is_array($twitterinfo)): $i = 0; $__LIST__ = $twitterinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <p class="font15 c333"><?php echo ($vo['wechaname']); ?></p>
                            <p class="font13 c999"><?php echo ($vo['bind_time']); ?></p>
                            <span class="font14 c666" onclick="lookTwitter('<?php echo ($vo['id']); ?>')">查看下级推客>></span>
                        </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
        <script>
            function lookTwitter(id) {
                window.location.href = "<?php echo U('Hld/Index/friends', array('token' => $_GET['token']));?>&pid=" + id;
            }
        </script>
    </body>
</html>