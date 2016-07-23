<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>中秋传说</title>
	<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no,target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="full-screen" content="true">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="360-fullscreen" content="true">
     
    <style>
        body {
            text-align: center;
            background: #000000;
            padding: 0;
            border: 0;
            margin: 0;
            height: 100%;
        }
        html {
            -ms-touch-action: none; /* Direct all pointer events to JavaScript code. */
        }
    </style>	
</head>
<body style="padding: 0px; border: 0px; margin: 0px;">
<div style="display:inline-block;width:100%; height:100%;margin: 0 auto; background: black; position:relative;" id="gameDiv">
    <canvas id="gameCanvas" width="480" height="800" style="width: 480px; height: 800px; background-color: rgb(0, 0, 0);"></canvas>
</div>
<script>var document_class = "GameApp";</script>
<script src="js/egret_loader.js"></script>
<script src="js/game-min.js"></script> 

<script>
    egret_h5.startGame();
</script>
<script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames';
var thegameurl ="http://www.v918.cn/vgames/games/zqcs/"; 
var guanzhuurl ="http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd";
		window.shareData = {
		        "imgUrl": "http://mmbiz.qpic.cn/mmbiz/2zpp2iaH4HWGLukSxlQu0sTSOwwCVp8g73y2YDOwso8gXBCzk49TicnyTunpiaGibwiceYAvhibTzicicBKlRQCDibn0Jgg/640",
		        "timeLineLink": thegameurl,
		        "tTitle": "中秋传说",
		        "tContent": "叫上小伙伴，一起来看月亮咯！"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("f=zf",1)>0){
				window.location =mebtnopenurl;
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
			<img width="100%" src="share.png"
				style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
				ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
			<script type="text/javascript">
            var myData = { gameid: "zqcs" };
			 var domain = ["oixm.cn", "hiemma.cn", "peagame.net"][parseInt(Math.random() * 3)];
			window.shareData.timeLineLink = thegameurl;
			function dp_submitScore(score){
					if(score>0){
						myData.score = parseInt(score);
						myData.scoreName ="跳了"+score+"米";		
						document.title = window.shareData.tTitle = "我在【中秋传说】中一口气跳到了"+score+"米，你也来试试吧！";
					}
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("？")) {
                            window.location = mebtnopenurl;
                        }
                        else {
                            document.location.href = mebtnopenurl;
                        }
                    }, 500);
                }
				else {
		        	document.location.href = guanzhuurl ;
				}
	        }
			</script>
			<div style="display: none;">
			
			</div>
</body></html>