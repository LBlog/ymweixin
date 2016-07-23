<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>欢乐兑账号绑定</title>
        <link href="<?php echo STATICS;?>/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo STATICS;?>/js/jquery.js"></script>
    </head>
    <body bgcolor="#eee">
        <div class="main">
            <div class="hei10"></div>
            <form action="<?php echo U('Hld/Index/binding', array('token' => $_GET['token']));?>" method="post">
                <ul class="reg_list bgfff">
                    <li class="clearfix">
                        <label class="fl c333 font15 wd20">账　　号</label>
                        <input type="text" id="username" placeholder="用户名/邮箱地址/已验证手机号" class="borN c999 font14 fl wd70"/>
                    </li>
                    <li class="clearfix">
                        <label class="fl c333 font15 wd20">密　　码</label>
                        <input type="password" id="password" placeholder="请输入密码" class="borN c999 font14 fl wd70"/>
                    </li>
                </ul>
                <input type="button" value="立即绑定，参与活动" class="cfff font15 texC btn radius5 wd70" id="btn-bind"/>
                <!--点击后提示语 start-->
                <br/>
                <p class="texC c999 font14" style="line-height:22px;" id="register">没有欢乐兑账号，马上注册>></p>
                <!--点击后提示语 end-->
            </form>
        </div>
        <script type="text/javascript" src="/tpl/static/layer/layermobile.js"></script>
        <script type="text/javascript">
            $(initPages);
            function initPages() {
                $("#username").blur(checkusername = function () {
                    if ($("#username").val().length <= 0) {
                        layer.open({content: '账号填写不能为空！'});
                        return false;
                    } else {
                        return true;
                    }
                });

                $("#password").blur(checkpassword = function () {
                    if ($("#password").val().length <= 0) {
                        layer.open({content: '密码填写不能为空！'});
                        return false;
                    } else {
                        return true;
                    }
                });

                $("#btn-bind").on('click', function () {
                    if (checkusername() && checkpassword()) {
                        var index = layer.open({type: 2});
                        var data = {username: $("#username").val(), password: $("#password").val()};
                        $.ajax({
                            type: "post",
                            url: "<?php echo U('Hld/Index/binding', array('token' => $_GET['token']));?>",
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
                        });
                    }

                });
                $("#register").on("click", function () {
//                    window.location.href = "<?php echo U('Hld/Index/index',array('token' => $_GET['token']));?>";
                    window.location.href = "http://www.huanledui.cn/wap/passport-signup.html";
                });
            }
        </script>
    </body>

</html>