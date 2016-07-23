<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>推客积分</title>
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
                <p class="cfff font17">累计获得积分：<?php echo (($userinfo['point'])?($userinfo['point']):'0'); ?></p>
            </div>
            <div class="hei10"></div>
            <!--<input type="button" value="兑换积分" class="cfff font15 texC btn radius5 wd70" style="position: fixed;bottom: 20px;margin-left: -35%;left: 50%;z-index:999" id="btn-point"/>-->
            <ul class="points_list bgfff" id="contact">
                <?php if(is_array($points)): $i = 0; $__LIST__ = $points;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="lookDetail('<?php echo ($vo["desc"]); ?>')">
                        <p class="font15 c333"><?php echo ($vo["stage"]); ?></p>
                        <p class="font13 c999"><?php echo date("Y-m-d H:i:s", $vo['create_time'])?></p>

                    <?php if($vo['stage'] == '积分兑换'): ?><span class="font16 ff54">-<?php echo ($vo["points"]); ?></span>
                        <?php else: ?>
                        <span class="font16 ff54">+<?php echo ($vo["points"]); ?></span><?php endif; ?>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div style="height:100px;width:100%;text-align:center;line-height:100px;">
            <a href="javascript:void(0)" id="<?php echo ($next); ?>" class="showmore"> 
                <span style="font-size:20px" id="span"><?php echo ($msg); ?></span>
            </a> 
            <input type='hidden' id="page" value="1" >  	
            <input type='hidden' id="page_size" value="<?php echo C('hld_page_size');?>" >
        </div>
        <br/>        
        <br/>
        <br/>


        <script type="text/javascript" src="/tpl/static/layer/layermobile.js"></script>
        <script>
                        var index = layer.open({type: 2});
                        function lookDetail(info) {
                            layer.open({content: info, time: 2});
                        }
                        $(function () {
                            var page = $('#page').val();
                            var page_size = $('#page_size').val();
                            var data = {page: page, page_size: page_size};
                            getPointsLog(data);
                            $('.showmore').live('click', '', function () {
                                var next = $(this).attr('id');
                                if (next != 1) {
                                    layer.open({content: '没有更多了', time: 2});
                                    $("#span").html('没有更多了');
                                    return false;
                                } else {
                                    var page = $('#page').val();
                                    var page_size = $('#page_size').val();
                                    var data = {page: page, page_size: page_size};
                                    getPointsLog(data);
                                }
                            });

                            $("#btn-point").on("click", function () {
                                // 询问是否兑换积分
                                if ("<?php echo (($userinfo['point'])?($userinfo['point']):'0'); ?>" == 0) {
                                    layer.open({content: '没有更多的积分了', time: 2});
                                    return false;
                                }
                                var data = {integral: parseInt("<?php echo (($userinfo['point'])?($userinfo['point']):'0'); ?>"), token: "<?php echo ($_GET['token']); ?>"};
                                layer.open({
                                    title: '提示',
                                    content: '您确定要兑换' + parseInt("<?php echo (($userinfo['point'])?($userinfo['point']):'0'); ?>") + '积分吗？',
                                    btn: ['嗯,马上兑换', '不要，再想想'],
                                    yes: function (index) {
                                        $.ajax({
                                            type: 'post',
                                            url: "?g=Hld&m=Index&a=exchangeIntegral",
                                            data: data,
                                            dataType: 'json',
                                            success: function (data) {
                                                layer.close(index);
                                                if (data.status == 1) {
                                                    layer.open({content: data.info, time: 2});
                                                    setTimeout(function () {
                                                        window.location.href = data.url;
                                                    }, 2000);
                                                } else {
                                                    layer.open({content: data.info, time: 2});
                                                }

                                            }
                                        });
                                    }
                                });

                            });
                        })

                        function getPointsLog(data) {
                            $.ajax({
                                type: 'post',
                                url: "?g=Hld&m=Index&a=points",
                                data: data,
                                dataType: 'json',
                                success: function (data) {
                                    layer.close(index);
                                    if (!data.status) {
                                        layer.open({content: '加载失败,请刷新后重试!', time: 2});
                                    } else {
                                        var html = '';
                                        var msg = data.info.msg;
                                        var next = data.info.next;
                                        var page = data.info.page;
                                        $("#page").val(page);
                                        $("#span").html(msg);
                                        $(".showmore").attr('id', next);
                                        $.each(data.info.data, function (i, item) {
                                            html = html + '<li onclick="lookDetail(\'' + item.desc + '\')">' +
                                                    '<p class="font15 c333">' + item.stage + '</p>' +
                                                    '<p class="font13 c999">' + item.create_time + '</p>';
                                            if (item.stage == '积分兑换') {
                                                html += '<span class="font16 ff54">-' + item.points + '</span></li>';
                                            } else {
                                                html += '<span class="font16 ff54">+' + item.points + '</span></li>';
                                            }

                                        });
                                        $("#contact").append(html);
                                    }

                                }
                            })
                        }
        </script>
    </body>
</html>