<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>戳泡泡</title>

    <meta name="keywords" content="games, online games, mobile games, html5 games" />

    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

    <link rel="stylesheet" href="css/pop.css" />
    <!--<link rel="stylesheet" href="fonts/fonts.css" />-->

    <script src="js/Stats.js"></script>
    <script src="js/buzz.js"></script>

    <style type="text/css">
    iframe {position: absolute; bottom: 0; left: center; }
    </style>
	
	<link rel="shortcut icon" href="icon.png">
<link rel="icon" href="icon.png">
<link type="text/css" href="css/common.css" rel="stylesheet" />
<script type="text/javascript" src="js/zepto.min.js"></script>
<script src="js/common.js?v=1"></script>


</head>

<body>

<div id="SF_Game">
    <canvas></canvas>
    <div id="textLayer">
        <p>
           火爆朋友圈
        </p>
    </div>
    <div id="inputBox">
		<a href="#" id="playAgain">
			再来一次
		</a>
		<a href="#" id="shareGame">
			炫耀一下
		</a>
		<a href="www.v918.cn/vgames" onClick="clickMore();">
			>更多游戏<
		</a>
    </div>
			<input id="bt-game-id" type="hidden" value="3-pop">


</div>

<script src="js/pop.base.js"></script>
<script src="js/pop.ua.js"></script>
<script src="js/pop.input.js"></script>
<script src="js/pop.scoreboard.js"></script>
<script src="js/pop.draw.js"></script>
<script src="js/pop.collision.js"></script>
<script src="js/pop.form.js"></script>
<script src="js/pop.explosion.js"></script>
<script src="js/pop.bubble.js"></script>
<script src="js/pop.touch.js"></script>
<script src="js/pop.starfish.js"></script>
<script src="js/pop.router.js"></script>
<script src="js/pop.init.js"></script>

<script type="text/javascript">

    function SF_gameStart() {
        if (!!document.createElement('canvas').getContext === false) {

            document.writeln('<h1>对不起，您的浏览器不支持html5！</h1>');
            document.writeln('<h2>请更换浏览器继续玩游戏！</h2>');

        }
        else {
            POP.init();
        }
    }

	$(function(){
		$("#playAgain").on("click", function(){
			POP.againGame();
			//return false;
		});
		$("#shareGame").on("click", function(){
			//btGame.playShareTip();
			//return false;
			dp_share();
		});
	});
	btGame.onlyVScreen(false, function(count){
		if(count > 0){
			location.reload();
		}
	});
	btGame.resizePlayArea($("#SF_Game"), 320, 480, "center", "center");
	$("#SF_Game").on("resizePlayArea", function(){
		SF_gameStart();
		SF_gameStart = function(){};
	});
</script>
<script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames';
		window.shareData = {
		        "imgUrl": "http://www.v918.cn/vgames/icon/cpp.png",
		        "timeLineLink": "http://www.v918.cn/vgames/games/cpp/",
		        "tTitle": "戳泡泡",
		        "tContent": "戳泡泡"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("zf",1)>0){
				window.location = "http://www.v918.cn/vgames";
			 }
			 else{
				goHome();
			 }
		}
		function dp_share(){
			document.title ="泡泡一戳即破，我拿了"+myData.score+"分，大家一起戳一把！";
			document.getElementById("share").style.display="";
			window.shareData.tTitle = document.title;
		}
		function dp_Ranking(){
			window.location=mebtnopenurl;
		}

		function showAd(){
		}
		function hideAd(){
		}
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		    
		    WeixinJSBridge.on('menu:share:appmessage', function(argv) {
		        WeixinJSBridge.invoke('sendAppMessage', {
		            "img_url": window.shareData.imgUrl,
		            "link": window.shareData.timeLineLink,
		            "desc": window.shareData.tContent,
		            "title": window.shareData.tTitle
		        }, onShareComplete);
		    });

		    WeixinJSBridge.on('menu:share:timeline', function(argv) {
		        WeixinJSBridge.invoke('shareTimeline', {
		            "img_url": window.shareData.imgUrl,
		            "img_width": "640",
		            "img_height": "640",
		            "link": window.shareData.timeLineLink,
		            "desc": window.shareData.tContent,
		            "title": window.shareData.tTitle
		        }, onShareComplete);
		    });
		}, false);
		</script>
		<div id=share style="display: none">
			<img width=100% src="share.png"
				style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
				ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
		<div style="display: none;">
			<script type="text/javascript">
            var myData = { gameid: "cpp" };
			window.shareData.timeLineLink = "http://www.v918.cn/vgames/index.html" + myData.gameid + (localStorage.myuid ? "&uid=" + localStorage.myuid : "");
			function dp_submitScore(score){
				myData.score = score;
				myData.scoreName = "戳了"+score+"分";
				if(score>0){
					if (confirm("你就是戳泡泡达人！拿了"+score+"分,你的小伙伴知道吗？")){
						dp_share();
					}
				}
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("要将成绩提交到游戏排行榜吗？")) {
                            window.location = "http://www.v918.cn/vgames.com/index.html" + myData.gameid + "&uid=" + localStorage.myuid + "&score=" + myData.score + "&scorename=" + encodeURIComponent(myData.scoreName);
                        }
                        else {
                            document.location.href = mebtnopenurl;
                        }
                    }, 500);
                }
				else {
		        	document.location.href = mebtnopenurl;
				}
	        }
			</script>
			<div style="display: none;">
			 
			</div>
</body>
</html>
