<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>会员注册</title>
        <link href="<?php echo STATICS;?>/css/base.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/common.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATICS;?>/css/css3.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo STATICS;?>/js/jquery.js"></script>
    </head>
    <body bgcolor="#eee">
        <div class="main">
            <div class="hei10"></div>
            <form action="<?php echo U('Hld/Index/register', array('token' => $_GET['token']));?>" method="post" id="form">
                <ul class="reg_list bgfff">
                    <li class="clearfix">
                        <label class="fl c333 font15 wd20">账　　号</label>
                        <input name="username" id="username" type="text" placeholder="手机号/用户名，最少四个字符" class="borN c999 font14 fl wd70"/>
                    </li>
                    <li class="clearfix">
                        <label class="fl c333 font15 wd20">密　　码</label>
                        <input name="password" id="password" type="password" placeholder="请输入密码" class="borN c999 font14 fl wd70"/>
                    </li>
                    <li class="clearfix">
                        <label class="fl c333 font15 wd20">确认密码</label>
                        <input name="confirm_password" id="confirm_password" type="password" placeholder="请再次输入密码" class="borN c999 font14 fl wd70"/>
                    </li>
                    <li class="clearfix">
                        <label class="fl c333 font15 wd20">验&nbsp;证&nbsp;码</label>
                        <input id="verifycode" type="text" id="verifycode" name="verifycode" placeholder="请输入验证码" class="borN c999 font14 fl wd30"/>
                        <img src="<?php echo U('Home/Index/verifyLogin');?>" id="txtCheckCode" style="width:70px;margin-top:-5px"/>&nbsp;<a href="javascript:refreshImg();" style="color:#666">看不清？换一张</a>
                        <script>
                            function refreshImg() {
                                document.getElementById("txtCheckCode").src = "/index.php?g=Home&m=Index&a=verifyLogin&s=" + Math.random();
                            }
                        </script>
                    </li>
                </ul>
                <div class="agree font13 c666 on">我已阅读并同意<span id="lookMember">《会员注册协议》</span></div>
                <input type="button" value="立即注册" id="register" class="cfff font15 texC btn radius5 wd70"/>
                <!--点击后提示语 start-->
                <br/>
                <p class="texC c999 font14" style="line-height:22px;" id="binding">已经有欢乐兑账号，马上绑定>></p>
                <!--点击后提示语 end-->
            </form>
        </div>
    </body>
    <script type="text/javascript" src="/tpl/static/layer/layermobile.js"></script>
    <script type="text/javascript">
                            $(initPages);
                            function initPages() {
                                $('.agree').click(function () {
                                    $(this).toggleClass('on');
                                })

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
                                $("#confirm_password").blur(checkconfirm_password = function () {
                                    if ($("#confirm_password").val().length <= 0) {
                                        layer.open({content: '再次密码填写不能为空！'});
                                        return false;
                                    } else {
                                        return true;
                                    }
                                });
                                $("#verifycode").blur(checkverifycode = function () {
                                    if ($("#verifycode").val().length <= 0) {
                                        layer.open({content: '验证码填写不能为空！'});
                                        return false;
                                    } else {
                                        return true;
                                    }
                                });
                                $("#binding").on("click", function () {
                                    window.location.href = "<?php echo U('Hld/Index/binding',array('token' => $_GET['token']));?>";
                                });
                                $("#register").on("click", function () {
                                    if (checkusername() && checkpassword() && checkconfirm_password() && checkverifycode()) {
                                        $("form").submit();
                                    }
                                });
                                $("#lookMember").on("click", function (event) {
                                    alert("");
                                    event.stopPropagation();
                                });
                            }
    </script>
</html>