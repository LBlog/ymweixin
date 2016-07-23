<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>店铺列表</title>
        <link href="/tpl/static/hld/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="/tpl/static/hld/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="/tpl/static/hld/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="/tpl/static/hld/js/jquery.js"></script>
        <script type="text/javascript" src="/tpl/static/layer/layermobile.js"></script>
    </head>

    <body>
        <div class="main">
            <ul class="shop_tab font16">
                <li class="wd33 texC fl on" id="last" ><a href="javascript:void(0)"><?php echo ($name); ?></a></li>   	
                <li class="wd33 texC fl" id="1" ><a href="javascript:void(0)"  class="chosetype">距离最近</a></li>
                <li class="wd34 texC fl" id="2"  ><a href="javascript:void(0)" class="chosetype">积分最多</a></li>
                <input type="hidden" class="lastid" value="<?php echo ($id); ?>"></input>    <!-- 商店类型id -->
                <input type="hidden" class="lasttype" value="0"></input>			 <!-- 排序方式id -->
                <input type="hidden" class="lastname" value="<?php echo ($name); ?>"></input> <!-- 商店类型名称 -->
                <input type="hidden" class="lat" value="<?php echo ($lat); ?>"></input> <!-- 用户经度 -->
                <input type="hidden" class="lng" value="<?php echo ($lng); ?>"></input> <!-- 用户纬度 -->
                <input type="hidden" class="method" value=""></input> <!-- 记忆用户最近一次选择的类型 -->
            </ul>
            <!--隐藏分类 start-->
            <div class="screen"></div>
            <ul class="fl texC wd33 hide_list list1 font14">
                <div><a href="javascript:void(0)" class="all1">全部</a></div>
                <input type="hidden" class="getid" value="<?php echo ($id); ?>"></input>
                <input type="hidden" class="getname" value="<?php echo ($name); ?>"></input>
                <?php if(is_array($level2)): foreach($level2 as $key=>$item): ?><li><a href="javascript:void(0)" class="level2" id="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
            <ul class="fl hide_list list2 wd33 texC list2 font14">
                <div><a href="javascript:void(0)" class="all2" >全部</a></div>

            </ul>
            <ul class="fl hide_list list3 wd34 texC list3 font14">
                <div><a href="#">全部</a></div>
            </ul>
            <!--隐藏分类 end-->

            <div></div>
            <ul class="shop_list" id="shop_list">
                <?php if(is_array($shop)): foreach($shop as $key=>$shop): ?><div class="hei10"></div> 
                    <li>
                        <p class="texR c999 font13">距您<?php echo ($shop["dis"]); ?>公里  积分返还比例<?php echo ($shop["per"]); ?></p>
                        <a href="?g=Hld&m=Mall&a=shop_det&id=<?php echo ($shop["id"]); ?>" class="clearfix">
                            <img src="<?php echo ($shop["image"]); ?>" width="50px" height="100px" class="fl radius5"/>
                            <h2 class="font14 c333"><?php echo ($shop["title"]); ?></h2>
                            <h3 class="font13 c666"><?php echo ($shop["sum"]); ?>...</h3>
                        </a>
                        <p class="texL c999 font13">地址：<?php echo ($shop["addr"]); ?></p>
                    </li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div style="height:100px;width:100%;text-align:center;line-height:100px;">
            <a href="javascript:void(0)" id="<?php echo ($next); ?>" class="showmore"> 
                <span style="font-size:20px" id="span"><?php echo ($msg); ?></span>
            </a> 
            <input type='hidden' id="page" value="<?php echo ($page); ?>" ></input>  	
            <input type='hidden' id="page_size" value="<?php echo ($page_size); ?>" ></input>  	
        </div>

    </body>
    <script type="text/javascript" src="/tpl/static/layer/layermobile.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        var index;
        index = layer.open({type: 2});
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
                'getLocation',
            ]
        });
        wx.ready(function () {
            wx.getLocation({
                success: function (res) {
//                    alert(JSON.stringify(res));
                    $('.lat').val(res.latitude);
                    $('.lng').val(res.longitude);
                    var lng = $(".lng").val();
                    layer.close(index);
//                    var page_size = $('#page_size').val();
//                    var data = {page: 1, page_size: page_size, lat: res.latitude, lng: res.longitude};
//                    getExtInfo(data);
                    var id = $('.list1').find('.getid').val();
                    var way = $('.lasttype').val();
                    //todo函数										
                    showgoods(id, way);
                },
                cancel: function (res) {
                    alert('用户拒绝授权获取地理位置');
                }
            });
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

    <script type="text/javascript" src="/tpl/static/hld/js/mall.js"></script>
</html>