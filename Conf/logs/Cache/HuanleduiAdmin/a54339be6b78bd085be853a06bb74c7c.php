<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> <?php echo ($f_siteTitle); ?> <?php echo ($f_siteName); ?></title>
        <meta name="keywords" content="<?php echo ($f_metaKeyword); ?>" />
        <meta name="description" content="<?php echo ($f_metaDes); ?>" />
        <meta http-equiv="MSThemeCompatible" content="Yes" />
        <script>var SITEURL = '';</script>

        <script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
    </head>
    <body id="nv_member" class="pg_CURMODULE">

        <div id="wp" class="wp">
            <?php if($usertplid == 0): ?><link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style.css?id=103" rel="stylesheet" type="text/css" />
                <?php else: ?>
                <link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" /><?php endif; ?>
            <link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style_2_common.css?BPm" />
            <style>
                a.a_upload,a.a_choose{border:1px solid #3d810c;box-shadow:0 1px #CCCCCC;-moz-box-shadow:0 1px #CCCCCC;-webkit-box-shadow:0 1px #CCCCCC;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;vertical-align:middle;background-color:#f1f1f1;background-image: -webkit-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -moz-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -ms-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); color:#000;border:1px solid #AAA;padding:2px 8px 2px 8px;text-shadow: 0 1px #FFFFFF;font-size: 14px;line-height: 1.5;
                }

                .pages{padding:3px;margin:3px;text-align:center;}
                .pages a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
                .pages a:hover{border:#999 1px solid;color:#666;}
                .pages a:active{border:#999 1px solid;color:#666;}
                .pages .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
                .pages .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
            </style>
            <script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
            <?php if(session('isQcloud') == true): ?><link type="text/css" rel="stylesheet" href="http://qzonestyle.gtimg.cn/qcloud/app/open/v1/css/wxcloud.min.css" />


                <style>
                    .px {
                        background:#fff;

                        border-color:#c9c9c9;

                    }


                    input[type=radio] {

                        border-radius:55px;

                        border: none;

                    }
                    .btnGreen {
                        border:1px solid #FFFFFF;
                        box-shadow:0 1px 1px #0A8DE4;
                        -moz-box-shadow:0 1px 1px #0A8DE4;
                        -webkit-box-shadow:0 1px 1px #0A8DE4;
                        padding:5px 20px;
                        cursor:pointer;
                        display:inline-block;
                        text-align:center;
                        vertical-align:bottom;
                        overflow:visible;
                        border-radius:3px;
                        -moz-border-radius:3px;
                        -webkit-border-radius:3px;
                        *zoom:1;
                        background-color:#5ba607;
                        background-image:linear-gradient(bottom, #107BAD  3%, #18C2D1 97%, #18C2D1 100%);
                        background-image:-moz-linear-gradient(bottom, #107BAD  3%, #0A8DE40 97%, #18C2D1 100%);
                        background-image:-webkit-linear-gradient(bottom, #107BAD  3%,#0A8DE4 97%, #18C2D1 100%);
                        color:#fff; font-size:14px; line-height: 1.5;
                    }
                    .btnGreen:hover {
                        background-color:#5ba607;
                        background-image:linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
                        background-image:-moz-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
                        background-image:-webkit-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
                        color:#fff
                    }
                    .btnGreen:active {
                        background-color:#5ba607;
                        background-image:linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
                        background-image:-moz-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
                        background-image:-webkit-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
                        color:#fff
                    }

                    .btnGreen{border:1px solid #3d810c;box-shadow:0 1px 1px #aaa;-moz-box-shadow:0 1px 1px #aaa;-webkit-box-shadow:0 1px 1px #aaa;padding:5px 20px;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;*zoom:1;background-color:#5ba607;background-image:linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);color:#fff;font-size:14px;line-height:1.5;}.btnGreen:hover{background-color:#5ba607;background-image:linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);color:#fff}.btnGreen:active{background-color:#5ba607;background-image:linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);color:#fff}

                </style><?php endif; ?>
            <?php
 if (!isset($_SESSION['isQcloud']) && (!isset($_SESSION['role_name']) || $_SESSION['role_name'] != 'staff')){ ?>
            <div class="topbg">
<div class="top">
<div class="toplink">
<style>
<?php if($usertplid == 1): ?>.topbg{background:url(<?php echo ($staticPath); ?>/tpl/static/newskin/images/top.gif) repeat-x; height:101px; /*box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;*/}
.top {
    margin: 0px auto; width: 988px; height: 101px;
}

.top .toplink{ height:30px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {width: 990px; color: #333; height:70px; font-size:16px;}
.top h1{ font-size:25px;float:left; width:230px; margin:0; padding:0; margin-top:6px; }
.top .navr {WIDTH:750px; float:right; overflow:hidden;}
.top .navr ul{ width:850px;}
.navr li {text-align:center; float: left; height:70px; font-size:1em; width:103px; margin-right:5px;}
.navr li a {width:103px; line-height:70px; float: left; height:100%; color: #333; font-size: 1em; text-decoration:none;}
.navr li a:hover { background:#ebf3e4;}
.navr li.menuon {background:#ebf3e4; display:block; width:103px;}
.navr li.menuon a{color:#333;}
.navr li.menuon a:hover{color:#333;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
<?php else: ?>

.topbg{BACKGROUND-IMAGE: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/top.png);BACKGROUND-REPEAT: repeat-x; height:124px; box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;}
.top {
	MARGIN: 0px auto; WIDTH: 988px; HEIGHT: 124px;
}

.top .toplink{ height:27px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {WIDTH: 990px;COLOR: #333; height:70px;  FONT-SIZE:16px; PADDING-TOP:25px}
.top h1{ font-size:25px; margin-top:20px; float:left; width:230px; margin:0; padding:0;}
.top .navr {WIDTH:750px; float:right; overflow:hidden; margin-top:10px;}
.top .navr ul{ width:850px;}
.navr LI {TEXT-ALIGN:center;FLOAT: left;HEIGHT:32px;FONT-SIZE:1em;width:103px; margin-right:5px;}
.navr LI A {width:103px;TEXT-ALIGN:center; LINE-HEIGHT:30px; FLOAT: left;HEIGHT:32px;COLOR: #333; FONT-SIZE: 1em;TEXT-DECORATION: none
}
.navr LI A:hover {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navhover.gif) center no-repeat;color:#009900;}
.navr LI.menuon {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navon.gif) center no-repeat; display:block;width:103px;HEIGHT:32px;}
.navr LI.menuon a{color:#FFF;}
.navr LI.menuon a:hover{BACKGROUND: url(img/navon.gif) center no-repeat;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}<?php endif; ?>
</style>
<div class="welcome">欢迎使用多用户微信营销服务平台!</div>
    <div class="memberinfo"  id="destoon_member">	
		<?php if($_SESSION[uid]==false): ?><a href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo U('Index/login');?>">注册</a>
			<?php else: ?>
			你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo (session('uid')); ?>）
			<a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a><?php endif; ?>	
	</div>
</div>
<!--    <div class="logo">
        <div style="float:left"></div>
            <h1><a href="/" title="多用户微信营销服务平台"><img src="<?php echo ($f_logo); ?>" height="55" /></a></h1>
            <div class="navr">
        <ul id="topMenu">           
            <li <?php if((ACTION_NAME == 'index') and (GROUP_NAME == 'Home')): ?>class="menuon"<?php endif; ?> ><a href="/">首页</a></li>
                <li <?php if((ACTION_NAME) == "fc"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/fc');?>">功能介绍</a></li>
                <li <?php if((ACTION_NAME) == "about"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/about');?>">关于我们</a></li>
                <li <?php if((ACTION_NAME) == "price"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/price');?>">资费说明</a></li>
                <li <?php if((ACTION_NAME) == "common"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/common');?>">微信导航</a></li>
                <li <?php if((GROUP_NAME) == "User"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('User/Index/index');?>">管理中心</a></li>
                <li <?php if((ACTION_NAME) == "help"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li>
            
            </ul>
        </div>
        </div>-->
    </div>
</div>
            <div id="aaa"></div>
            <?php
 }else{ ?>
            
            <?php } ?>
            <!--中间内容-->

            <div class="contentmanage"<?php if (isset($_SESSION['isQcloud'])){?> style="width:100%"<?php }?>>
                 <?php
 if (!isset($_SESSION['isQcloud'])){ if(!isset($_SESSION['role_name']) || $_SESSION['role_name'] != 'staff'){ ?>
                 <div class="developer">
                    <div class="appTitle normalTitle2">
                        <div class="vipuser">


                            <div class="logo">
                                <a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><img src="<?php echo ($wecha["headerpic"]); ?>" width="100" height="100" /></a>
                            </div>

                            <div id="nickname">
                                <strong><a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><?php echo ($wecha["wxname"]); ?></a></strong><a href="#" target="_blank" class="vipimg vip-icon<?php echo $userinfo['taxisid']-1; ?>" title=""></a></div>
                            <div id="weixinid">微信号:<?php echo ($wecha["weixin"]); ?></div>
                        </div>

                        <div class="accountInfo">
                            <table class="vipInfo" width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><strong>VIP有效期：</strong><?php echo (date("Y-m-d",$thisUser["viptime"])); ?></td>
                                    <td><strong>图文自定义：</strong><?php echo ($thisUser["diynum"]); ?>/<?php echo ($userinfo["diynum"]); ?></td>
                                    <td><strong>活动创建数：</strong><?php echo ($thisUser["activitynum"]); ?>/<?php echo ($userinfo["activitynum"]); ?></td>
                                    <td><strong>请求数：</strong><?php echo ($thisUser["connectnum"]); ?>/<?php echo ($userinfo["connectnum"]); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>请求数剩余：</strong><?php echo ($userinfo['connectnum']-$_SESSION['connectnum']); ?></td>
                                    <td><strong>已使用：</strong><?php echo $_SESSION['diynum']; ?></td>
                                    <td><strong>当月赠送请求数：</strong><?php echo ($userinfo["connectnum"]); ?></td>
                                    <td><strong>当月剩余请求数：</strong><?php echo $userinfo['connectnum']-$_SESSION['connectnum']; ?></td>
                                </tr>

                            </table>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <!--左侧功能菜单-->

                    <?php } ?>
                    <style type="text/css">
                        #sideBar{
                            border-right: 0px solid #D3D3D3 !important;
                            float: left;
                            padding: 0 0 10px 0;
                            width: 170px;
                            background: #fff;
                        }
                        .tableContent {
                            background: none repeat scroll 0 0 #f5f6f7;
                            padding: 0;
                        }
                        .tableContent .content {
                            border-left: 1px solid #D7DDE6 !important;
                        }
                        ul#menu, ul#menu ul {
                            list-style-type:none;
                            margin: 0;
                            padding: 0;
                            background: #fff;
                        }

                        ul#menu a {
                            display: block;
                            text-decoration: none;
                        }

                        ul#menu li {
                            margin: 1px;
                        }
                        ul#menu li ul li{
                            margin: 1px 0;
                        }
                        ul#menu li a {
                            background: #EBEEF1;
                            color: #464D6A;
                            padding: 0.5em;
                        }
                        ul#menu li .nav-header{
                            font-size:14px;
                            border-bottom: 1px solid #D7DDE6;
                        }
                        ul#menu li .nav-header:hover {
                            background: #DDE4EB;
                        }

                        ul#menu li ul li a {
                            background: #FCFCFC;
                            color: #8288A4;
                            padding-left: 20px;
                        }
                        ul#menu li ul li:last-child {
                            border-bottom: 1px solid #D7DDE6;
                        }
                        ul#menu li ul li a:hover {
                            background: #fff;
                            border-left: 5px #4A98E0 solid;

                        }
                        ul#menu li.selected a{
                            background: #fff;
                            border-left: 5px #4A98E0 solid;
                            padding-left: 15px;
                            color: #4A98E0;
                        }
                        .code { border: 1px solid #ccc; list-style-type: decimal-leading-zero; padding: 5px; margin: 0; }
                        .code code { display: block; padding: 3px; margin-bottom: 0; }
                        .code li { background: #ddd; border: 1px solid #ccc; margin: 0 0 2px 2.2em; }
                        .indent1 { padding-left: 1em; }
                        .indent2 { padding-left: 2em; }
                        .tableContent .content{min-height: 1328px;}

                        a.nav-header{background:url(/tpl/static/images/arrow_click.png) center right no-repeat;cursor:pointer}
                        a.nav-header-current{background:url(/tpl/static/images/arrow_unclick.png) center right no-repeat;}
                    </style>
                    <?php
 } ?>
                    <div class="tableContent">
                        <?php
 if (!isset($_SESSION['isQcloud'])){ ?>
                        <!--左侧功能菜单-->
                        <div  class="sideBar" id="sideBar">
                            <div class="catalogList">
                                <ul id="menu">
<?php
$menus = array( array( 'name' => '基础设置', 'iconName' => 'base', 'display' => 0, 'subs' => array( array('name' => '关注时回复与帮助', 'link' => U('User/Areply/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Areply')), array('name' => '微信－文本回复', 'link' => U('User/Text/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Text')), array('name' => '微信－图文回复', 'link' => U('User/Img/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Img', 'a' => 'index')), array('name' => '微信－多图文回复', 'link' => U('User/Img/multi', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Img', 'a' => 'multi')), array('name' => '微信－语音回复', 'link' => U('User/Voiceresponse/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Voiceresponse')), array('name' => '微信－群发消息', 'link' => U('User/Message/sendHistory', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Message')), array('name' => '微信－模板消息', 'link' => U('User/TemplateMsg/index', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'TemplateMsg')), array('name' => '自定义菜单', 'link' => U('User/Diymen/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Diymen')), array('name' => '自动获取粉丝信息', 'link' => U('User/Auth/index', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Auth')), array('name' => '回答不上来的配置', 'link' => U('User/Other/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Other')), )), array( 'name' => '微客服', 'iconName' => 'service', 'display' => 0, 'subs' => array( array('name' => '人工客服', 'link' => U('User/ServiceUser/wechatService', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'ServiceUser')), )), array( 'name' => '推客管理', 'iconName' => 'ditch', 'display' => 0, 'subs' => array( array('name' => '推客列表', 'link' => U('HuanleduiAdmin/Twitter/lists', array( 'token' => $token )), 'new' => 0, 'selectedCondition' => array('m' => 'Twitter', 'a' => 'lists')), array('name' => '背景设置', 'link' => U('HuanleduiAdmin/Twitter/qrcode', array( 'token' => $token )), 'new' => 0, 'selectedCondition' => array('m' => 'Twitter', 'a' => 'bgset')), )), array( 'name' => '商家管理', 'iconName' => 'ditch', 'display' => 0, 'subs' => array( array('name' => '首页管理', 'link' => U('HuanleduiAdmin/Merchant/banner', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'banner')), array('name' => '添加商家', 'link' => U('HuanleduiAdmin/Merchant/add', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'add')), array('name' => '商家列表', 'link' => U('HuanleduiAdmin/Merchant/mlist', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'mlist')), array('name' => '显示范围', 'link' => U('HuanleduiAdmin/Merchant/setext', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'setext')), array('name' => '商家地图', 'link' => U('HuanleduiAdmin/Merchant/shows', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'shows')), )), array( 'name' => '分类管理', 'iconName' => 'ditch', 'display' => 0, 'subs' => array( array('name' => '分类导航', 'link' => U('HuanleduiAdmin/MerchantType/mlist', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'MerchantType', 'a' => 'addext')), array('name' => '添加分类', 'link' => U('HuanleduiAdmin/MerchantType/add', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'MerchantType', 'a' => 'add')) )), array( 'name' => '营销活动', 'iconName' => 'ditch', 'display' => 0, 'subs' => array( array('name' => '营销推广列表', 'link' => U('HuanleduiAdmin/Apispread/spreadlist', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'spreadlist')), array('name' => '增加营销推广', 'link' => U('HuanleduiAdmin/Apispread/add_spread', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'add_spread')), )), array( 'name' => '积分管理', 'iconName' => 'ditch', 'display' => 0, 'subs' => array( array('name' => '比例设置', 'link' => U('HuanleduiAdmin/Apipercent/percentlist', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Apipercent', 'a' => 'percentlist')), )), array( 'name' => '兑换点管理', 'iconName' => 'ditch', 'display' => 0, 'subs' => array( array('name' => '兑换点列表', 'link' => U('HuanleduiAdmin/Apiext/extlist', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'addext')), array('name' => '兑换点设置', 'link' => U('HuanleduiAdmin/Apiext/setext', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'setext')), )), ); ?>
                                    <?php
 foreach ($menus as $mk => $mv){ if(C('router_key') != ''&&$mv['iconName']=='hardware'){ unset($mv['subs'][0]); } foreach ($mv['subs'] as $mvk => $mvv){ if ($mvv['f'] != NULL && !in_array($mvv['f'], $Allfunc)) { unset($menus[$mk]['subs'][$mvk]); } if ($mvv['selectedCondition']['m'] == 'Web') { $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'Web'.DIRECTORY_SEPARATOR; if (!file_exists($path.'Web_indexAction.class.php')) { unset($menus[$mk]); } } if(isset($group_func) && $_SESSION['role_name'] != '' && $_SESSION['role_name'] == 'staff'){ if(!in_array($mvv['selectedCondition']['m'],$group_func) || !in_array($mvv['f'],$group_func)){ unset($menus[$mk]['subs'][$mvk]); } } if(in_array($mvv['selectedCondition']['m'],$not_exist) || in_array($mvv['f'],$not_exist)){ if($mvv['selectedCondition']['m'] == 'Home'){ unset($menus[$mk]); }else{ if ($mvv['f'] != NULL) { unset($menus[$mk]['subs'][$mvk]); } } }elseif($mvv['selectedCondition']['m'] == 'Business'){ if($mvv['selectedCondition']['type'] == 'wedding') $mvv['selectedCondition']['type'] = 'buswedd'; if(in_array(ucfirst($mvv['selectedCondition']['type']),$not_exist)){ unset($menus[$mk]['subs'][$mvk]); } } if($menus[$mk]['subs'] == NULL){ unset($menus[$mk]); } } } $i=0; $parms=$_SERVER['QUERY_STRING']; $parms1=explode('&',$parms); $parmsArr=array(); if ($parms1){ foreach ($parms1 as $p){ $parms2=explode('=',$p); $parmsArr[$parms2[0]]=$parms2[1]; } } $subMenus=array(); $t=0; $currentMenuID=0; $currentParentMenuID=0; foreach ($menus as $m){ $loopContinue=1; if ($m['subs']){ $st=0; foreach ($m['subs'] as $s){ $includeArr=1; if ($s['selectedCondition']){ foreach ($s['selectedCondition'] as $condition){ if (!in_array($condition,$parmsArr)){ $includeArr=0; break; } } } if ($includeArr){ if ($s['exceptCondition']){ foreach ($s['exceptCondition'] as $epkey=>$eptCondition){ if ($epkey=='a'){ $parm_a_values=explode(',',$eptCondition); if ($parm_a_values){ if (in_array($parmsArr['a'],$parm_a_values)){ $includeArr=0; break; } } }else { if (in_array($eptCondition,$parmsArr)){ $includeArr=0; break; } } } } } if ($includeArr){ $currentMenuID=$st; $currentParentMenuID=$t; $loopContinue=0; break; } $st++; } if ($loopContinue==0){ break; } } $t++; } foreach ($menus as $m){ $displayStr=''; if ($currentParentMenuID!=0||0!=$currentMenuID){ $m['display']=0; } if (!$m['display']){ $displayStr=' style="display:none"'; } if ($currentParentMenuID==$i){ $displayStr=''; } $aClassStr=''; if ($displayStr){ $aClassStr=' nav-header-current'; } if($i == 0){ echo '<a class="nav-header'.$aClassStr.'" style="border-top:none !important;"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>'; }else{ echo '<a class="nav-header'.$aClassStr.'"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>'; } if(C('router_key') == ''&&$m['iconName']=='hardware'){ unset($m['subs'][0]); } if ($m['subs']){ $j=0; foreach ($m['subs'] as $s){ $selectedClassStr='subCatalogList'; if ($currentParentMenuID==$i&&$j==$currentMenuID){ $selectedClassStr='selected'; } $newStr=''; if ($s['test']){ $newStr.='<span class="test"></span>'; }else { if ($s['new']){ $newStr.='<span class="new"></span>'; } } if ($s['name']!='微信墙'&&$s['name']!='摇一摇'&&$s['name']!='现场活动'){ $target=''; if ($s['blank']){ $target=' target="_blank"'; } if ($s['notinpigcms']&&C('server_topdomain')=='pigcms.cn'){ }else { echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'"'.$target.'>'.$s['name'].'</a>'.$newStr.'</li>'; } }else { switch ($s['name']){ case '微信墙': case '摇一摇': case '现场活动': $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR; if (file_exists($path.'WallAction.class.php')&&file_exists($path.'ShakeAction.class.php')){ echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>'; } break; } } if ($s['name']=='模板管理'&&is_dir($_SERVER['DOCUMENT_ROOT'].'/cms')&&!strpos($_SERVER['HTTP_HOST'],'pigcms')){ echo '<li class="subCatalogList"> <a href="/cms/manage/index.php">高级模板</a><span class="new"></span></li>'; } $j++; } } echo '</ul>'; $i++; } ?>

                                    <div style="clear:both"></div>
                                </ul>
                            </div>
                        </div>
                        <?php
 } ?>
                        <script type="text/javascript">

            $(document).ready(function () {
                $(".nav-header").mouseover(function () {
                    $(this).addClass('navHover');
                }).mouseout(function () {
                    $(this).removeClass('navHover');
                }).click(function () {
                    $(this).toggleClass('nav-header-current');
                    $(this).next('.ckit').slideToggle();
                })
            });

                        </script>
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>

<script type="text/javascript" src="/tpl/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/tpl/static/ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="/tpl/static/ueditor/lang/zh-cn/zh-cn.js"></script>  
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=JYTBZ-6GD3V-ZTZPJ-U35RX-EZMGQ-45BTF"></script>
<script>
    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('#intro', {
            resizeType: 1,
            allowPreviewEmoticons: false,
            allowImageUpload: true,
            uploadJson: '/index.php?g=User&m=Upyun&a=kindedtiropic',
            items: [
                'source', 'undo', 'clearhtml', 'hr',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'unlink', 'baidumap', 'lineheight', 'table', 'anchor', 'preview', 'print', 'template', 'code', 'cut', 'music', 'video', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'hr', 'fontname', 'fontsize'],
            afterBlur: function () {
                this.sync();
            }
        });
    });
</script>
<div class="content"> 
    <div class="cLineB"> 
        <h4>添加商家</h4> 
        <a href="<?php echo U('Merchant/mlist',array('token'=>$token));?>" class="right  btnGreen" style="margin-top:-27px">返回</a>
    </div>
    <div style="background:#fefbe4;border:1px solid #f3ecb9;color:#993300;padding:10px;margin-top:5px;">
        <span>温馨提示：请按要求填写</span>
    </div>
    <style>
        #pimg_div li{float:left;position:relative;}
        #pimg_div li div{position:absolute;top:0px;right:5px;width:134px;background:#646464;opacity: 0.5;display:none;}
        #pimg_div li a{color:white;padding-top:5px;padding-bottom:5px;padding-right:5px;float:right;cursor:pointer;font-weight:bold;}
        #pimg_div li a:hover{
            font-weight:bold;
            color:blue;
        }
    </style>
    <form method="post" action="" id="formID">
        <div class="msgWrap bgfc"> 
            <table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%"> 
                <tbody> 
                    <tr>
                        <th>商家图片：</th>
                        <td>
                            <div class="col-sm-3"> 

                                <ul id="pimg_div"></ul>
                                <div style="clear:both;">
                                    <input  type="button" class="datepicker" onclick="upImage('pimg', '1');" style="background:#44b549;display:inline-block;width:55px;height:30px;border-radius:5px;color:#fff;cursor:pointer;" value="上传图片" />
                                    <span style="color:red;">（最多上传6张图片,请上传合适的尺寸）</span>
                                    <input type="hidden" class="form-control" id="pimg" name="img">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr> 
                        <th><span class="red">*</span>商家名称：</th> 
                        <td>
                            <!--   <input type="hidden" name="pid" id="pid" value=""/> -->
                            <input type="text" name="title" id="title" value="<?php echo ($item["title"]); ?>" class="px" placeholder="请输入..." style="width:400px;" />
                        </td> 
                    </tr> 

                    <tr> 
                        <th><span class="red">*</span>商家电话：</th> 
                        <td>
                            <!-- <input type="hidden" name="pid" id="pid" value=""/> -->
                            <input type="text" name="tel" id="tel" value="<?php echo ($item["tel"]); ?>" class="px"  placeholder="请输入..." style="width:200px;" />
                        </td> 
                    </tr> 

                    <tr> 
                        <th>商家分类：</th> 
                        <TD>
                            <input type="hidden" id="type" name="type" value="<?php echo ($data['pid']); ?>"/>
                            <select style="width:200px;" class="fenlei" id="shoptype">
                                <option value="" >请选择...</option>
                                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option level="<?php echo ($vo['level']); ?>" <?php if($data['pid'] == $vo['id'] ): ?>selected<?php endif; ?> value="<?php echo ($vo['id']); ?>"><?php echo ($vo['html']); echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </TD>
                    </tr>
                    <tr> 
                        <th>积分返还比例：</th> 
                        <td><input type="text" id="per" name="per" placeholder="请输入..." value="<?php echo ($item["score"]); ?>" class="px" style="width:100px;" />  %</td> 
                    </tr>
                    <tr> 
                        <th>排序：</th> 
                        <td><input type="text" id="score" name="score" placeholder="请输入..." value="<?php echo ($item["score"]); ?>" class="px" style="width:100px;" />  数字越小排再越前（大于等于0的整数）</td> 
                    </tr>
                    <tr>
                        <th valign="top"><span class="red">*</span><label for="info">商家简介：</label></th>
                        <td><textarea name="summary" id="summary" rows="2"  style="border:1px solid #999;width:500px;height:100px"></textarea></td>
                    </tr>
                    <tr>
                        <th valign="top"><span class="red">*</span><label for="info">商家详情：</label></th>
                        <td  style="width:800px;height:600px"><script type="text/javascript" id="container"></script></td>
                    </tr>
                    <tr>
                        <th valign="top"><span class="red">*</span><label for="info">商家地址：</label></th>
                        <td>
                            <input type="text" id="address" name="address" value="" class="px" style="width:200px;" /> <a href="javascript:void(0)" class="btnGray" onclick="searchSom(this)">搜索</a><br>
                        </td>
                    </tr>
                    <tr>
                        <th valign="top"><span class="red">*</span><label for="info">商家经纬度：</label></th>
                        <td>
                            <input type="text" id="coordinate" name="coordinate" value="" class="px" style="width:200px;" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th valign="top"><span class="red">*</span><label for="info">商家区域：</label></th>
                        <td>
                            <input type="text" id="areas" name="areas" value="" class="px" style="width:200px;" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="info">地图显示：</label></th>
                        <td>
                            <div id="map"style="width:800px;height:400px"></div>
                        </td>
                    </tr>

                    <tr>         
                        <th>&nbsp;</th>
                        <td>
                            <button type="button" name="button" class="btnGreen" id="save">保存</button> &nbsp; <a href="<?php echo U('Merchant/mlist',array('token'=>$token, 'a' => mlist));?>" class="btnGray vm">取消</a></td> 
                    </tr> 
                </tbody> 
            </table> 
        </div>
    </form>
</div>
<script type="text/javascript" id="j_ueditorupload"></script>
<script type="text/javascript">
    var geocoder, map, marker = null, markersArray = [];
    var init = function () {
        var center = new qq.maps.LatLng(39.916527, 116.397128);
        map = new qq.maps.Map(document.getElementById('map'), {
            center: center,
            zoom: 13
        });

        //地址和经纬度之间进行转换服务
        geocoder = new qq.maps.Geocoder();
        //获取城市列表接口设置中心点
        citylocation = new qq.maps.CityService({
            complete: function (result) {
                map.setCenter(result.detail.latLng);
            }
        });
        //调用searchLocalCity();方法    根据用户IP查询城市信息。
        citylocation.searchLocalCity();
        qq.maps.event.addDomListener(map, 'click', function (event) {
            //获取经纬度数值   按照,分割字符串 取出前两位 解析成浮点数
            var lat = parseFloat(event.latLng.getLat());
            var lng = parseFloat(event.latLng.getLng());
            var latLng = new qq.maps.LatLng(lat, lng);
            //调用获取位置方法
            geocoder.getAddress(latLng);
            geocoder.setComplete(function (result) {
                console.log(result);
                map.setCenter(result.detail.location);
                clearOverlays();
                var marker = new qq.maps.Marker({
                    map: map,
                    position: result.detail.location
                });
                markersArray.push(marker);
                $("#address").val(result.detail.address);
                $("#coordinate").val(result.detail.location);
                $("#areas").val(result.detail.addressComponents.city);
            });
        });

    }
    init();
    //清除覆盖层
    function clearOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
        }
    }
    function searchSom(obj) {
        var address = $("#address").val();
        //对指定地址进行解析
        geocoder.getLocation(address);
        //设置服务请求成功的回调函数
        geocoder.setComplete(function (result) {
            map.setCenter(result.detail.location);
            var marker = new qq.maps.Marker({
                map: map,
                position: result.detail.location
            });
            $("#coordinate").val(result.detail.location);
            $("#areas").val(result.detail.addressComponents.city);
//            $("#position").val(result.detail.location);
            //点击Marker会弹出反查结果
            qq.maps.event.addListener(marker, 'click', function () {
                $("#coordinate").val(result.detail.location);
                $("#address").val(result.detail.address)
                $("#areas").val(result.detail.addressComponents.city);
//                $("#position").val(result.detail.location);
                alert("坐标地址为： " + result.detail.location);
            });
        });
        //若服务请求失败，则运行以下函数
        geocoder.setError(function () {
            alert("出错了，请输入正确的地址！！！");
        });

    }
    var gimgid = '';
    var gis_more = '';

    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('container', {initialFrameWidth: 800, initialFrameHeight: 400});

    //实例化编辑器
    var o_ueditorupload = UE.getEditor('j_ueditorupload');
    o_ueditorupload.ready(function () {
        o_ueditorupload.hide();//隐藏编辑器     
        //监听图片上传
        o_ueditorupload.addListener('beforeInsertImage', function (t, arg) {
            if (gis_more == '0') {
                $("#" + gimgid).val(arg[0].src);
                $("#" + gimgid + '_url').attr('src', arg[0].src);
            } else {
                var html = '';
                var img_value = '';
                var num = arg.length;
                //统计之前上传的数量
                var pre_num = $("#" + gimgid + "_div li").length;
                if (num + pre_num > 6) {
                    if (pre_num > 0) {
                        if (pre_num == 6) {
                            art.dialog({
                                title: '消息提示',
                                content: "您之前上传了6张图片,不能再上传了!",
                                lock: true,
                                time: 3
                            });
                        } else {
                            art.dialog({
                                title: '消息提示',
                                content: "您之前上传了" + pre_num + "张图片,现在只能上传" + (6 - pre_num) + "张图片!",
                                lock: true,
                                time: 3
                            });
                        }

                    } else {
                        art.dialog({
                            title: '消息提示',
                            content: "您只能上传6张!",
                            lock: true,
                            time: 3
                        });
                    }
                    //删除图片
                    var imgs = [];
                    for (i = 0; i < num; i++) {
                        imgs[i] = arg[i]['src'];
                    }
                    $.ajax({
                        type: 'post',
                        url: "<?php echo U('Api/Img/imgs_del',array('token'=>$token));?>",
                        data: {imgs: imgs},
                        dataType: 'json',
                        success: function (re) {
                            console.log(re);
                        }

                    });
                    return false;
                } else {
                    var pre = $("#" + gimgid).val();
                    for (var i = 0; i < num; i++) {
                        img_value += arg[i].src + ',';
                        html += '<li><img src="' + arg[i].src + '" style="max-height:100px;width:134px; margin-bottom:0.5rem;margin-right:0.3rem;"/><div><a href="javascript:void(0);">删除</a></div></li>';
                    }
                    if (pre) {
                        img_value = pre + img_value;
                    }
                }
                $("#" + gimgid + "_div").append(html);
                $("#" + gimgid).val(img_value);
            }
        });
        /* 文件上传监听
         * 需要在ueditor.all.min.js文件中找到
         * d.execCommand("insertHtml",l)
         * 之后插入d.fireEvent('afterUpfile',b)
         */
        o_ueditorupload.addListener('afterUpfile', function (t, arg) {

        });
    });

    //弹出图片上传的对话框
    function upImage(imgid, is_more) {
        gimgid = imgid;
        gis_more = is_more;
        var myImage = o_ueditorupload.getDialog("insertimage");
        myImage.open();
    }
    //弹出文件上传的对话框
    function upFiles() {
        var myFiles = o_ueditorupload.getDialog("attachment");
        myFiles.open();
    }
    $(function () {
        $("#pimg_div img").live("mouseover mouseout ", function (event) {
            if (event.type == "mouseover") {
                $(this).siblings("div").show();
            } else {
                $(this).siblings("div").hide();
            }
        });
        $("#pimg_div div").live("mouseover mouseout", function (event) {
            if (event.type == "mouseover") {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        //ajax 删除图片
        $("#pimg_div a").live("click", function () {
            var ind = $(this).parents("li").index();
            var pimg = $("#pimg").val();
            var pimg = pimg.split(",");
            var img = pimg[ind];
            pimg.splice(ind, 1);
            pimg.join(",");
            id = $("#cid").val();
            $.ajax({
                type: 'get',
                url: 'index.php?g=Api&m=Img&a=del_img&img=' + img + '&id=' + id + '&model=ahld_mall&token=<?php echo ($token); ?>',
                dataType: 'json',
                success: function (re) {
                    if (re.error_code == 0) {//删除成功
                        $("#pimg").val(pimg);
                        $("#pimg_div li").eq(ind).remove();
                    } else {
                        alert("操作失败");
                    }
                }
            })

        });
    });
</script>




<script type="text/javascript">
    $(document).ready(function () {

        $("#save").click(function () {
            var title = $('#title').val();
            var tel = $('#tel').val();
            var img = $("#pimg").val();
            var addr = $("#addr").val();
            var type = $("#shoptype").val();
            var summary = $("#summary").val();
            var position = $("#position").val();
            var content = $("#content").val();
            var score = $("#score").val();
            var per = $("#per").val();
            var position = $("#coordinate").val();
            var city = $("#areas").val();
            if (img == null || img == '') {
                art.dialog({
                    title: '消息提示',
                    content: '商家图片不能为空！',
                    lock: true,
                    time: 2
                });
                return;
            }
            if (title == null || title == '') {
                art.dialog({
                    title: '消息提示',
                    content: '商家名称不能为空！',
                    lock: true,
                    time: 2
                });
                return;
            }
            if (tel == null || tel == '') {
                art.dialog({
                    title: '消息提示',
                    content: '商家联系方式不能为空！',
                    lock: true,
                    time: 2
                });
                return;
            }

            if (type == null || type == '') {
                art.dialog({
                    title: '消息提示',
                    content: '商家分类不能为空！',
                    lock: true,
                    time: 2
                });
                return;
            }
            if (per == null || per == '') {
                art.dialog({
                    title: '消息提示',
                    content: '积分返还比例不能为空',
                    lock: true,
                    time: 2
                });
                return;
            } else if (isNaN(per) | per < 0) {

                art.dialog({
                    title: '消息提示',
                    content: '积分返还比例必须大于0',
                    lock: true,
                    time: 2
                });
                return;
            }
            if (score == null || score == '') {
                art.dialog({
                    title: '消息提示',
                    content: '商家排序不能为空',
                    lock: true,
                    time: 2
                });
                return;
            }
            if (summary == null || summary == '') {
                art.dialog({
                    title: '消息提示',
                    content: '商家介绍不能为空',
                    lock: true,
                    time: 2
                });
                return;
            }
            if (position == null || position == '') {
                art.dialog({
                    title: '消息提示',
                    content: '商家经纬度不能为空,请在地图上点选商家的位置以确定商家的经纬度！',
                    lock: true,
                    time: 3
                });
                return;
            }

            var data = {
                title: title,
                tel: tel,
                img: img,
                addr: addr,
                area: city,
                position: position,
                summary: summary,
                content: content,
                score: score,
                per: per,
                type: type,
                token: '<?php echo ($token); ?>',
            };
            $.post('index.php?g=Api&m=Merchant&a=add_merchant', data, function (response) {
                if (response.status == false) {
                    art.dialog({
                        title: '消息提示',
                        content: response.info,
                        lock: true,
                        cancelVal: '关闭'
                    });
                    setInterval(function () {
                        location.href = response.url;
                    }, 2000);
                } else {
                    art.dialog({title: '消息提示', time: 2, content: response.msg});
                }

            }, 'json');
        })
    });
</script>
</div>
</div>
</div>

<style>
.IndexFoot {
	BACKGROUND-COLOR: #333; WIDTH: 100%; HEIGHT: 39px
}
.foot{ width:988px; margin:0px auto; font-size:12px; line-height:39px;}
.foot .foot_page{ float:left; width:600px;color:white;}
.foot .foot_page a{ color:white; text-decoration:none;}
#copyright{ float:right; width:380px; text-align:right; font-size:12px; color:#FFF;}
</style>
<div class="IndexFoot" style="height:120px;clear:both">
<div class="foot" style="padding-top:20px;">
<div class="foot_page" >
<a href="<?php echo ($f_siteUrl); ?>"><?php echo ($f_siteName); ?>,微信公众平台营销</a><br/>
帮助您快速搭建属于自己的营销平台,构建自己的客户群体。
</div>
<div id="copyright" style="color:white;">
	<?php echo ($f_siteName); ?>(c)版权所有 <?php echo C('ipc');?>
<br/>
	技术支持：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo ($f_qq); ?>:51" alt="联系我吧" title="联系我吧"/></a>

</div>
    </div>
</div>
<!-- 帮助悬浮开始 -->
<?php $data_g=GROUP_NAME; if(C('close_help')){ $data_g='notingh'; }else{ $textHelp=1; $users=M('Users')->where(array('id'=>$_SESSION['uid']))->find(); if (C('server_topdomain')=='pigcms.cn' || $users['sysuser']){ $textHelp=0; } } $data = array( 'key' => C('server_key'), 'domain' => C('server_topdomain'), 'is_text' => $textHelp, 'data_g' => $data_g, 'data_m' => MODULE_NAME, 'data_a' => ACTION_NAME ); if(function_exists('curl_init')){ $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, 'http://up.pigcms.cn/oa/admin.php?m=help&c=view&a=get_list&'.http_build_query($data)); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_HEADER, 0); $content = curl_exec($ch);curl_close($ch); }else{ $content = file_get_contents('http://up.pigcms.cn/oa/admin.php?m=help&c=view&a=get_list&'.http_build_query($data)); } $content = json_decode($content,true); ?>
<?php if(!empty($content)): ?><link href="<?php echo ($staticPath); ?>/tpl/static/help_xuanfu/css/zuoce.css" type="text/css" rel="stylesheet"/>
	<div class="zuoce zuoce_clear">
		<div id="Layer1">
			<a href="javascript:"><img src="<?php echo ($staticPath); ?>/tpl/static/help_xuanfu/images/ou_03.png"/></a>
		</div>
		<div id="Layer2" style="display:none;">
			<p class="xiangGuan zuoce_clear">相关帮助</p>
			<?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><p class="lianjie zuoce_clear"><a href="javascript:openwin('/index.php?g=User&m=Index&a=help&helpParm=/oa/admin_help_<?php echo ($list['id']); ?>.html',768,960)" <?php if($list['is_video'] == 1): ?>class="video"<?php else: ?>class="writing"<?php endif; ?>><?php echo ($list["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
			<!--p class="anNiuo clear"><a href="#">进入帮助中心</a></p-->
			<p class="anNiut zuoce_clear"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes" target="_blank">在线客服</a></p>
		</div>
	</div>
	<script type="text/javascript">
		window.onload = function(){
			var oDiv1 = document.getElementById('Layer1');
			var oDiv2 = document.getElementById('Layer2');
			oDiv1.onclick = function(){
				oDiv2.style.display = oDiv2.style.display == 'block' ? 'none' : 'block';
			}
		}
		function openwin(url,iHeight,iWidth){
			var iTop = (window.screen.availHeight-30-iHeight)/2,iLeft = (window.screen.availWidth-10-iWidth)/2;
			window.open(url, "newwindow", "height="+iHeight+", width="+iWidth+", toolbar=no, menubar=no,top="+iTop+",left="+iLeft+",scrollbars=yes, resizable=no, location=no, status=no");
		}
	</script><?php endif; ?>
<!-- 帮助悬浮结束 -->
<div style="display:none">
<?php echo ($alert); ?> 
<?php echo base64_decode(C('countsz'));?>
</div>

</body>

<?php if(MODULE_NAME == 'Function' && ACTION_NAME == 'welcome'){ ?>
<script src="<?php echo ($staticPath); ?>/tpl/static/myChart/js/echarts-plain.js"></script>

<script type="text/javascript">


    var myChart = echarts.init(document.getElementById('main')); 
   

    var option = {
        title : {
            text: '<?php if($charts["ifnull"] == 1): ?>本月关注和文本请求数据统计示例图(您暂时没有数据)<?php else: ?>本月关注和文本请求数据统计<?php endif; ?>',
            x:'left'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['文本请求数','关注数'],
            x: 'right'
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: false},
                dataView : {show: false, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: false} ,
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : [<?php echo ($charts["xAxis"]); ?>]
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'文本请求数',
                type:'line',
                tiled: '总量',
                data: [<?php echo ($charts["text"]); ?>]
            },    
            {
                "name":'关注数',
                "type":'line',
                "tiled": '总量',
                data:[<?php echo ($charts["follow"]); ?>]
            }
       

        ]

    };                   

    myChart.setOption(option); 


    var myChart2 = echarts.init(document.getElementById('pieMain')); 
               
    var option2 = {
        title : {
            text: '<?php if($pie["ifnull"] == 1): ?>7日内粉丝行为分析示例图(您暂时没有数据)<?php else: ?>7日内粉丝行为分析<?php endif; ?>',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'粉丝行为统计',
                type:'pie',
                radius : ['50%', '70%'],
                itemStyle : {
                    normal : {
                        label : {
                            show : false
                        },
                        labelLine : {
                            show : false
                        }
                    },
                    emphasis : {
                        label : {
                            show : true,
                            position : 'center',
                            textStyle : {
                                fontSize : '18',
                                fontWeight : 'bold'
                            }
                        }
                    }
                },
                data:[ 
                    <?php echo ($pie["series"]); ?>
                
                ]
            }
        ]
    };
     myChart2.setOption(option2,true); 


    var myChart3 = echarts.init(document.getElementById('pieMain2')); 
    var option3 = {
        title : {
            text: '<?php if($sex_series["ifnull"] == 1): ?>会员性别统计示例图(您暂时没有数据)<?php else: ?>会员性别统计<?php endif; ?>',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'会员性别统计',
                type:'pie',
                radius : ['50%', '70%'],
                itemStyle : {
                    normal : {
                        label : {
                            show : false
                        },
                        labelLine : {
                            show : false
                        }
                    },
                    emphasis : {
                        label : {
                            show : true,
                            position : 'center',
                            textStyle : {
                                fontSize : '18',
                                fontWeight : 'bold'
                            }
                        }
                    }
                },
                data:[
                  <?php echo ($sex_series['series']); ?>
                ]
            }
        ]
    };                     

  myChart3.setOption(option3,true); 



    </script>
<?php } ?>
</html>