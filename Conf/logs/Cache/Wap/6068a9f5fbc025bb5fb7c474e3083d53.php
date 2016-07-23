<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta name="format-detection" content="telephone=no" />
<script src="<?php echo $staticFilePath;?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/notification.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/swiper.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/main.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $staticFilePath;?>/css/touch_index.css">
<link type="text/css" rel="stylesheet" href="<?php echo $staticFilePath;?>/css/style.css" />
</head>
<body>
<div id="top"></div>
<div id="scnhtm5" class="m-body">
<div class="menu">
<a href="<?php echo U('Store/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'cid' => $cid, 'twid' => $twid));?>"><i></i>所有商品</a>
<a href="<?php echo U('Store/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid));?>"><i></i>购物车</a>
<a href="<?php echo U('Store/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid));?>"><i></i>查物流</a>
<a href="<?php echo U('Store/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid));?>"><i></i>用户中心</a>
</div>  
<!--主体-->
<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i; if ($i > 6) {$k = $i % 6;} else {$k = $i;} ?>
	<div class="m-floor">
	<ul class="ulsel" url="<?php echo ($hostlist["url"]); ?>">
	<li class="tit bgf<?php echo ($k); ?>">
	<i><?php echo ($i); ?>F</i><?php echo ($hostlist["name"]); ?>
	</li>
	<li class="img"><img src="<?php echo ($hostlist["logourl"]); ?>"/></li>
	</ul>
	</div><?php endforeach; endif; else: echo "" ;endif; ?> 
</div>

<style type="text/css">
    @charset "utf-8";
    /* CSS Document */
    .h50{height:50px;}

    /*foundation*/
    .fixed {
        width: 100%;
        left: 0;
        position: fixed;
        top: 0;
        z-index: 99; }
    .sub-nav dt,
    .sub-nav dd,
    .sub-nav li {
        float: left;
        display: inline;
        margin-left: 1rem;
        margin-bottom: 0.625rem;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        font-weight: normal;
        font-size: 0.875rem;
        color: #999999; }

    .fixed.bottom{bottom:-1px; top:auto;}

    /*--nav bottom--*/
    .icon-nav-search,
    .icon-nav-store,
    .icon-nav-bag,
    .icon-nav-heart,
    .icon-nav-cart{display:inline-block;background:url("./tpl/Wap/default/common/css/store/css/img/icon-addition.png") no-repeat;background-size:300px 300px;vertical-align:middle;}
    .icon-nav-search{background-position:-32px -36px;width:22px;height:22px;}
    .icon-nav-store{background-position:-64px -36px;width:22px;height:22px;}
    .icon-nav-bag{background-position:-154px -36px;width:22px;height:22px;}
    .icon-nav-heart{background-position:-186px -36px;width:22px;height:22px;}
    .icon-nav-cart{background-position:-94px -36px;width:22px;height:22px;}

    .sub-nav.nav-b5{height:48px;margin:0;padding:0;background:#fff;border-top:0px solid #000;box-shadow:0 -3px 3px rgba(0,0,0,.1);}
    .sub-nav.nav-b5 dd{margin:0 0 0 0;width:25%;text-align:center;border-right:0px solid #ccc;
        -moz-box-sizing:border-box;
        -webkit-box-sizing:border-box;
        -o-box-sizing:border-box;
        box-sizing:border-box;
    }
    .sub-nav.nav-b5 dd.last{border-right:0;}
    .sub-nav .nav-b5-relative{position:relative;}
    .sub-nav.nav-b5 dd a{display:block;margin:0 2px;height:48px;padding:0 0 0 0;font-size:12px;color:#333;overflow:hidden;font-style:normal;}
    .sub-nav.nav-b5 dd.active a{color:#000;border-radius:0;background:#f1f1f1;}
    .sub-nav.nav-b5 dd a:active{background:#f7f7f7;}
    .sub-nav.nav-b5 dd a.more{position:relative;}
    .sub-nav.nav-b5 dd .arrow{position:absolute;right:5px;bottom:5px;width:10px;height:10px;background:url("../images/distribution2.png") no-repeat -161px -455px;background-size:300px 1000px;}
    .sub-nav.nav-b5 dd i{display:block;margin:5px auto 0px auto;width:22px;height:22px;}
    .sub-nav.nav-b5 dd.active .icon-nav-home{background-position:0 -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-search{background-position:-32px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-store{background-position:-64px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-cart{background-position:-94px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-order{background-position:-126px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-bag{background-position:-154px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-heart{background-position:-186px -66px;}
    .sub-nav.nav-b5 dd.active .icon-nav-cart{background-position:-94px -66px;}

</style>
<div class="fixed bottom" style="display:none">

    <dl class="sub-nav nav-b5">
        <dd class="active">
            <div class="nav-b5-relative"><a href="<?php echo U('Store/select', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $_GET['twid']));?>"><i class="icon-nav-bag"></i>逛街</a></div>
        </dd>
        <?php if($allow_distribution == 1): ?><dd>
            <?php if($distributor['id'] != ''): ?><div class="nav-b5-relative"><a href="<?php echo U('DrpUcenter/drp_index');?>"><i class="icon-nav-store"></i>分销管理</a></div>
            <?php else: ?>
                <div class="nav-b5-relative"><a href="<?php echo U('DrpStore/login', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $_GET['twid']));?>"><i class="icon-nav-store"></i>申请代理</a></div><?php endif; ?>
        </dd><?php endif; ?>
        <dd>
            <div class="nav-b5-relative"><a href="<?php echo U('Store/cart', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $_GET['twid']));?>"><i class="icon-nav-cart"></i>购物车</a></div>
        </dd>
        <dd>
            <div class="nav-b5-relative"><a href="<?php echo U('Store/my', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'twid' => $_GET['twid']));?>"><i class="icon-nav-heart"></i>用户中心</a></div>
        </dd>
    </dl>

</div>


</body>
<script type="text/javascript">
$(document).ready(function(){
	$(".ulsel").click(function(){
		location.href = $(this).attr("url");
	});
});

window.shareData = {  
            "moduleName":"Store",
            "moduleID":"<?php echo ($cats[0]['id']); ?>",
            "imgUrl": "<?php echo ($cats[0]['logourl']); ?>", 
            "timeLineLink": "<?php echo C('site_url') . U('Store/index',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Store/index',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "weiboLink": "<?php echo C('site_url') . U('Store/index',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>