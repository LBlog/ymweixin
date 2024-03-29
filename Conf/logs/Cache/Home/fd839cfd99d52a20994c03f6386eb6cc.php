<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="#" type="image/png">

        <title>Login</title>

        <link href="<?php echo RES;?>/css/style.css" rel="stylesheet">
        <link href="<?php echo RES;?>/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo RES;?>/js/html5shiv.js"></script>
        <script src="<?php echo RES;?>/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">

            <form class="form-signin" action="<?php echo U('Users/checklogin');?>" method="post" >
                <div class="form-signin-heading text-center">
                    <h1 class="sign-title">Sign In</h1>
                    <img src="<?php echo RES;?>/images/login-logo.png" alt=""/>
                </div>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="User ID" name="username" autofocus>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <input type="text" class="form-control" placeholder="Code"  name="verifycode2" autofocus maxlength="4" />&nbsp;<img src="<?php echo U('Index/verifyLogin');?>" id="txtCheckCode2" style="width:70px;margin-top:-5px"/>&nbsp;<a href="javascript:refreshImg2();" style="color:#666">看不清？换一张</a>
                    <script>
                        function refreshImg2() {
                            document.getElementById("txtCheckCode2").src = "/index.php?g=Home&m=Index&a=verifyLogin&s=" + Math.random();
                        }
                    </script>
                    <button class="btn btn-lg btn-login btn-block" type="submit">
                        <i class="fa fa-check"></i>
                    </button>

                </div>

            </form>

        </div>

        <script src="<?php echo RES;?>/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo RES;?>/js/bootstrap.min.js"></script>
        <script src="<?php echo RES;?>/js/modernizr.min.js"></script>

    </body>
</html>