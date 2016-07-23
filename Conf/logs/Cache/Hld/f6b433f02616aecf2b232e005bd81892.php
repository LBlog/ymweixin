<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>个人中心</title>
        <link href="<?php echo STATICS;?>/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo STATICS;?>/js/jquery.js"></script>
        <style>
            #share {
                background: url(<?php echo STATICS;?>/img/share.png) top right no-repeat;
                background-size: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                display: none;
                z-index: 1000;
            }
        </style>
    </head>
    <body bgcolor="#eee">
        <div class="main">
            <div class="center_top">
                <div class="cen_head radius50">
                    <img src="<?php echo ($userinfo['portrait']); ?>" width="78" class="radius50"/>  
                </div>
                <p class="texC cfff font17"><?php echo ($userinfo['wechaname']); ?></p>
            </div>
            <div class="hei10"></div>
            <ul class="det_list center_list bgfff">

                <?php if($userinfo['type'] == 1 ): ?><li>
                        <a href="<?php echo U('Hld/Index/apply', array('token' => $_GET['token']));?>">
                            <img src="<?php echo STATICS;?>/img/center_03.png" width="26" class="fl"/>
                            <p class="c333 font14">成为推客</p>
                        </a>
                    </li>
                    <?php elseif($userinfo['type'] == 2): ?>
                    <li>
                        <a href="<?php echo U('Hld/Index/ewm', array('token' => $_GET['token']));?>">
                            <img src="<?php echo STATICS;?>/img/center_06.png" width="26" class="fl"/>
                            <p class="c333 font14">二维码</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Hld/Index/points', array('token' => $_GET['token']));?>">
                            <img src="<?php echo STATICS;?>/img/center_08.png" width="26" class="fl"/>
                            <p class="c333 font14">推客积分</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Hld/Index/friends', array('token' => $_GET['token']));?>">
                            <img src="<?php echo STATICS;?>/img/center_10.png" width="26" class="fl"/>
                            <p class="c333 font14">推客好友</p>
                        </a>
                    </li><?php endif; ?>

            </ul>
            <?php if($userinfo['type'] == 2 ): ?><input type="button" value="马上推广好友，成为我的下级" class="cfff font15 texC btn radius5 wd70" id="btn-share"/>
                <div id="share" onclick="javascript:$('#share').hide();"></div>
                <script type="text/javascript">
                    $("#btn-share").on('click', function () {
                        $('#share').show();
                    });
                </script><?php endif; ?>
        </div>
        <script type="text/javascript" src="/tpl/static/layer/layermobile.js"></script>

        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <script type="text/javascript">
                    wx.config({
                        debug: false,
                        appId: "<?php echo ($signPackage["appId"]); ?>",
                        timestamp: "<?php echo ($signPackage["timestamp"]); ?>",
                        nonceStr: "<?php echo ($signPackage["nonceStr"]); ?>",
                        signature: "<?php echo ($signPackage["signature"]); ?>",
                        jsApiList: [
                            'checkJsApi',
                            'chooseImage',
                            'uploadImage',
                            'onMenuShareTimeline',
                            'onMenuShareAppMessage',
                            'onMenuShareQQ',
                            'onMenuShareWeibo',
                            'hideMenuItems',
                        ]
                    });
                    wx.ready(function () {
                        wx.onMenuShareAppMessage({
                            title: '<?php echo ($share["title"]); ?>',
                            desc: '<?php echo ($share["desc"]); ?>',
                            link: '<?php echo ($share["url"]); ?>',
                            imgUrl: '<?php echo ($share["imgurl"]); ?>',
                            trigger: function (res) {
                            },
                            success: function (res) {
                                setTimeout("$('#share').hide();", 100);
                            },
                            cancel: function (res) {
                                setTimeout("$('#share').hide();", 100);
                            },
                            fail: function (res) {
                                setTimeout("$('#share').hide();", 100);
                            }
                        });
                        wx.onMenuShareTimeline({
                            title: '<?php echo ($share["title"]); ?>',
                            link: '<?php echo ($share["url"]); ?>',
                            imgUrl: '<?php echo ($share["imgurl"]); ?>',
                            trigger: function (res) {
                            },
                            success: function (res) {
                                setTimeout("$('#share').hide();", 100);
                            },
                            cancel: function (res) {
                                setTimeout("$('#share').hide();", 100);
                            },
                            fail: function (res) {
                                setTimeout("$('#share').hide();", 100);
                            }
                        });
                    });
        </script>
    </body>
</html>