<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>信息提示</title>
        <link href="<?php echo STATICS;?>/css/base.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div class="main texC">
            <div style="margin-top:30%;">
                <img src="<?php echo STATICS;?>/img/wrong.png" width="90" style="margin-bottom:15px;"/><br />
                <font class="font14 c999"><?php if(isset($message)): echo($message); else: echo($error); endif; ?><br/><br/>页面自动&nbsp;&nbsp;<span><a id="href" href="<?php echo($jumpUrl); ?>">跳转</a></span>&nbsp;&nbsp;等待<span id="wait"><?php echo($waitSecond); ?></span>秒</font>
            </div>
<!--            <div style="line-height: 1.8em; font-size: 23px ;text-align: center;"></div>-->
        </div>
        <script type="text/javascript">
            (function () {
                var wait = document.getElementById('wait'), href = document.getElementById('href').href;
                var interval = setInterval(function () {
                    var time = --wait.innerHTML;
                    if (time == 0) {
                        location.href = href;
                        clearInterval(interval);
                    }
                    ;
                }, 1000);
            })();
        </script>
    </body>

</html>