<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>申请成为推客</title>
        <link href="<?php echo STATICS;?>/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo STATICS;?>/js/jquery.js"></script>
    </head>
    <body bgcolor="#eee">
        <div class="main">
            <div class="hei10"></div>
            <div class="font15 bgfff apply_top c333">
                <h2 class="texC">推客说明文案</h2>
                <p class="c666"><?php echo ($content['value']); ?></p>
            </div>
            <div class="hei10"></div>
            <form>
                <div class="apply_form pL5 pR5 bgfff">
                    <div class="borB clearfix">
                        <label class="fl font14 c333">姓　名：</label>
                        <input type="text" id="username" class="borAll font14 c666 fl radius5 wd70"/>
                    </div>
                    <div class="borB clearfix">
                        <label class="fl font14 c333">手机号：</label>
                        <input type="tel" id="phone" class="borAll font14 c666 fl radius5 wd70"/>
                    </div>
                    <div class="clearfix">
                        <label class="fl font14 c333">性　别：</label>
                        <span class="on font14">男</span>
                        <span class="font14">女</span>
                        <input type="hidden" id="sex" value="1">
                    </div>
                </div>
            </form>
            <input type="botton" value="提交" id="pushoff" class="cfff font15 texC btn radius5 wd50" style="margin-bottom:30px;"/>
        </div>
    </body>
    <script type="text/javascript" src="./tpl/static/layer/layermobile.js"></script>
    <script type="text/javascript">

        $(initPages);
        function initPages() {
            $("#pushoff").on('click', function () {
                var index = layer.open({type: 2});
                var data = {truename: $("#username").val(), tel: $("#phone").val(), sex: $("#sex").val()};
                console.log(data);
                $.ajax({
                    type: "post",
                    url: "<?php echo U('Hld/Index/apply', array('token' => $_GET['token']));?>",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
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
                })

            });
            $("#register").on("click", function () {
                window.location.href = "<?php echo U('Hld/Index/index',array('token' => $_GET['token']));?>";
            });
            $('.apply_form span').click(function () {
                $(this).addClass('on').siblings().removeClass('on');
                if ($(this).html() == '男') {
                    $("#sex").val('1');
                } else if ($(this).html() == '女') {
                    $("#sex").val('0');
                }
            })
        }
    </script>
</html>