<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>微时代管家</title>
    <link rel="icon" type="image/GIF" href="res/favicon.ico"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="full-screen" content="yes"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <style>
        body, canvas, div {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
    </style>
</head>
<body style="padding:0; margin: 0; background: #000;">
<canvas id="gameCanvas" width="320" height="480"></canvas>

<script src="game.min.js"></script>
<script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames/index.html';
		window.shareData = {
		        "imgUrl": "http://www.v918.cn/vgames/icon/bljqzffxwz.png",
		        "timeLineLink": "http://www.v918.cn/vgames/games/bljqzffxwz/index.html",
		        "tTitle": "暴力街区之反腐小王子",
		        "tContent": "暴力街区之反腐小王子"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("f=zf",1)>0){
				window.location = "http://www.v918.cn/vgames/games/bljqzffxwz/index.html";
			 }
			 else{
				goHome();
			 }
		}
		function dp_share(){
			document.getElementById("share").style.display="";
			
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
			<img width="100%" src="http://www.v918.cn/vgames/games/bljqzffxwz/share.png"
				style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
				ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
			<script type="text/javascript">
            var myData = { gameid: "bljqzffxwz" };
			 // var domain = ["oixm.cn", "hiemma.cn", "peagame.net"][parseInt(Math.random() * 3)];
			window.shareData.timeLineLink = "http://www.v918.cn/vgames/games/bljqzffxwz/index.html";
			function dp_submitScore(score,stitle){
					if(score>0){
						myData.score = parseInt(score);
						myData.scoreName ="打了"+score+"下";	
						window.shareData.tTitle = document.title=stitle;
						game9g.utils.shareConfirm("你不错哟，竟然打了"+score+"下，快告诉你的小伙伴们吧！",function(){dp_share();});						
					}
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("要将成绩提交到软灵通排行榜吗？")) {
                            window.location = "http://www.v918.cn/vgames/games/bljqzffxwz/index.html";
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
				<script type="text/javascript" src="http://tajs.qq.com/stats?sId=36313548" charset="UTF-8"></script>
			</div>
			<script type="text/javascript" src="./js/game9g.utils.js"></script>
</body>
</html>