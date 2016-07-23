<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>兑换点</title>
        <link href="/tpl/static/hld/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="/tpl/static/hld/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="/tpl/static/hld/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="/tpl/static/hld/js/jquery.js"></script>
        <script type="text/javascript" src="/tpl/static/layer/layermobile.js"></script>
    </head>
    <body>
        <div class="main">
            <ul class="change_list" id="uu">

                <?php if(is_array($ext_list)): foreach($ext_list as $key=>$ext): ?><li>
                        <a href="?g=Hld&m=Ext&a=extdet&id=<?php echo ($ext["id"]); ?>">
                            <img src="<?php echo ($ext["images"]); ?>" width="100%"/>
                            <div class="clearfix c333 pLR5 mT5"><font class="font14"><?php echo ($ext["title"]); ?></font><font class="fr font13 c999"><?php echo ($ext["dis"]); ?> km</font></div>
                            <p class="font13 c999 pLR5 mB5"><?php echo ($ext["id"]); ?></p>
                        </a>
                    </li>
                    <div class="hei10"></div><?php endforeach; endif; ?>

            </ul> 
        </div>
        <div style="height:100px;width:100%;text-align:center;line-height:100px;">
            <a href="javascript:void(0)" id="<?php echo ($next); ?>" class="showmore"> 
                <span style="font-size:20px" id="span"><?php echo ($msg); ?></span>
            </a> 
            <input type='hidden' id="page" value="<?php echo ($page); ?>" >  	
            <input type='hidden' id="page_size" value="<?php echo $page_size;?>" > 	
            <input type="hidden" id="lat" value=""><!-- 用户经度 -->
            <input type="hidden" id="lng" value=""><!-- 用户纬度 -->
        </div>
    </body>
</html>
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
//                alert(JSON.stringify(res));
                $('#lat').val(res.latitude);
                $('#lng').val(res.longitude);
                var page_size = $('#page_size').val();
                var data = {page: 1, page_size: page_size, lat: res.latitude, lng: res.longitude};
                getExtInfo(data);
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
<script>
    $(function () {
        $('.showmore').live('click', '', function () {
            var next = $(this).attr('id');
            if (next != 1) {
                layer.open({content: '没有更多了', time: 2});
                $("#span").html('没有更多了');
                return false;
            } else {
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                var page = $('#page').val();
                var page_size = $('#page_size').val();
                var data = {page: page, page_size: page_size, lat: lat, lng: lng};
                getExtInfo(data);
            }
        })
    })

    function getExtInfo(data) {
        $.ajax({
            type: 'post',
            url: "?g=Hld&m=Ext&a=ajaxext",
            data: data,
            dataType: 'json',
            success: function (data) {
                layer.close(index);
                if (!data.status) {
                    layer.open({content: '加载失败,请刷新后重试!', time: 2});
                } else {
                    var html = '';
                    var msg = data.msg;
                    var next = data.next;
                    var page = data.page;
                    $("#page").val(page);
                    $("#span").html(msg);
                    $(".showmore").attr('id', next);
                    $.each(data.data, function (i, item) {
                        html = html +
                                '<li><a href="?g=Hld&m=Ext&a=extdet&id=' + item.id + '">' +
                                '<img src="' + item.images + '" width="100%"/>' +
                                '<div class="clearfix c333 pLR5 mT5"><font class="font14">' + item.title + '</font><font class="fr font13 c999">' + item.dis + 'km</font></div>' +
                                '<p class="font13 c999 pLR5 mB5">' + item.addr + '</p>' +
                                '</a></li><div class="hei10"></div>';
                    });
                    $("#uu").append(html);
                }

            }
        })
    }

</script>