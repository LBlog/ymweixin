
<!DOCTYPE html>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport"
			content="width=device-width,user-scalable=no,initial-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<title>一个都不能掉  微信朋友圈在线游戏</title>
		<link type="text/css" href="css/game_base.css" rel="stylesheet" />
		<!--<script type="text/javascript">document.write('<script type="text/javascript" src="/js/resource_loader.js?ver=' + Math.random() + '"><\/script>')</script>-->
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
		<script type="text/javascript" src="js/game_base.js"></script>
       <!-- <script src="js/game_index.js"></script>-->
		<script type="text/javascript" src="js/createjs-2013.12.12.min.js"></script>
		<script type="text/javascript" src="js/createjs_game.js"></script>
		<script type="text/javascript" src="js/jquery.cookie.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<style type="text/css">
.follow {
	z-index: 100;
	position: absolute;
	left: -500px;
	bottom: 0px;
	width: 20%;
	opacity: 0;
}

.follow img {
	width: 100%
}

.moreGames {
	z-index: 100;
	position: absolute;
	bottom: 10px;
	margin-left: auto;
	margin-right: auto;
	width: 100%;
	text-align: center;
}

.moreGames a {
	font: 11px Arial;
	text-decoration: none;
	background-color: #C0C0C0;
	color: #FFFFFF;
	padding: 2px 10px 2px 10px;
	border-radius: 8px;
	-webkit-border-radius: 8px;
}
</style>
	</head>
	<body>
		<canvas id="stage">
		您的浏览器不支持html5, 请换用支持html5的浏览器
		</canvas>
		<script language=javascript>
		
		    window.shareData = {
		        "imgUrl": "http://www.v918.cn/vgames/games/pigbaby/img/pigbaby.jpg",
		        "timeLineLink": "http://www.v918.cn/vgames/games/pigbaby/",
		        "tTitle": "一个都不能丢",
		        "tContent": "小猪宝宝都要被我玩坏了！你们能像我一样和他快乐的玩耍吗？"
		    };

		    function goHome() {
		        window.location = mebtnopenurl;
		    }
		    function dp_share() {
		       
		        myscore = $("#scorehide").val();
		        window.shareData.tTitle = "" + myscore + "分！一个都不能丢，你看过我的小猪吗?一起来快乐的玩吧！";
		        //document.title = "" + myscore + "分！一个都不能丢，你看过我的小猪吗?一起来快乐的玩吧！";
		        document.getElementById("share").style.display = "";
		        //window.shareData.tTitle = document.title;
		    }
		    function dp_Ranking() {
		        //alert("到更多");
		        window.location = mebtnopenurl;
		    }
		    function showAd() {
		    }
		    function hideAd() {
		    }

		    var mebtnopenurl = 'http://www.v918.cn/vgames/';
		    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		        WeixinJSBridge.on('menu:share:appmessage', function(argv) {
		            WeixinJSBridge.invoke('sendAppMessage', {
		                "img_url": window.shareData.imgUrl,
		                "link": window.shareData.timeLineLink,
		                "desc": window.shareData.tContent,
		                "title": window.shareData.tTitle
		            }, function(res) {
		                document.location.href = mebtnopenurl;
		            })
		        });

		        WeixinJSBridge.on('menu:share:timeline', function(argv) {
		            WeixinJSBridge.invoke('shareTimeline', {
		                "img_url": window.shareData.imgUrl,
		                "img_width": "640",
		                "img_height": "640",
		                "link": window.shareData.timeLineLink,
		                "desc": window.shareData.tContent,
		                "title": window.shareData.tTitle
		            }, function(res) {
		                document.location.href = mebtnopenurl;
		            });
		        })});
	</script>
         
	<input type="hidden" id="scorehide" />
<div id=share style="display: none">
	<img width=100% src="img/xuanyao.png"
	style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
	ontouchstart="document.getElementById('share').style.display='none';">
</div>
			<script type="text/javascript">
			    var myData = {};
			    var myscore = 0;
</script>
	<div class="scoreinfo">
        	<div class="holder">
        		<div class="head">
        		<!--	<img src="img/showtop.png" />-->
        			<!--<hr>-->
        		</div>
        		<div class="record">
        			<div class="nowrecord"><span class="num"></span>分</div>
        			<div class="bestrecord">榜单最佳：<span class="num"></span>分</div>
        		</div>
        	<!--	<div class="foot">
        			<div class="btngrp"><span class="return"><img src="img/showreturn.png" /></span><span class="xuyao"><img src="img/showweixin.png" /></span></div>
        		</div>-->
        	</div>
        </div>
        <div class="weixinshare"></div>

</body>



 <div style="display:none">

</div>
<img src="http://img.tongji.linezing.com/3455448/tongji.gif">

</div>
</html>