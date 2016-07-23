<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>疯狂挠一挠——艾玛，手指痒死了</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="status">
   <p class="fen">你挠了 <span id="num">0</span> 下呦~</p>
   <p class="fen" style="font-size: 24px;">剩余 <span id="second">10</span> s</p>

</div>
<div id="nao-box">挠我，挠我</div>

<div id="mask"  style="display: none"></div>
<div id="share" style="display: none">
    <p id="share-btn">分享一下</p>
    <p id="again-btn">再玩一次</p>
</div>
<img id="share-img" src="share.png" alt="" style="display:none; position: absolute; right: 0;top: 0;z-index: 1111;"/>

<div class="ads" style="position: absolute; bottom: 20px;padding-left: 20px; width: 100%;z-index: 11111;">
    <a align="center" style="color:white; position:absolute; bottom: 0; left: 10px; " href="http://www.v918.cn/vgames">更多游戏</a>
    <a align="center" style="color:white; position:absolute; bottom: 0; right: 30px;" href="http://www.v918.cn/vgames/games/dianji">疯狂点击</a>
</div>

</body>

<script type="text/javascript" src="zepto.min.js"></script>
<script type="text/javascript">
    document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    $(function() {
        var  can = true;
        var total = 10;
        var init = true ;
        var sec = function() {
            total = total - 1;
            $("#second").text(total);
            console.log(total)
            if(total == 0) {
                can = false;
                clearInterval(timer);
                $("#share,#mask").show();
            }
        }


        $("body").swipe(function() {
            if(init == true) {
                timer = setInterval(sec, 1000);
                init = false;
            }
            if(can === true) {
                var n = Number($("#num").text());
                var m = n + 1;
                $("#num").text(m);
            }
        });

        $("#share-btn").tap(function() {
            $("#share-img").show().off("click").tap(function() {
                $(this).hide();
            });
            var nn = $("#num").text();
            document.title = '艾玛，10秒,我玩命挠了'+ nn + '下,你们快也挠挠~';
        });
        $("#again-btn").tap(function() {
            $("#share,#mask").hide();
            $("#second").text('10');
            $("#num").text('0');
            total = 10;
            init = true;
            can = true;
        });
    })
</script>
<img src="http://img.tongji.linezing.com/3455448/tongji.gif">
</html>