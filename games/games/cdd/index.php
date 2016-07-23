<!DOCTYPE html>
<html>
		
<head>
  <meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="pragma" content="no-cache">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta charset="utf-8">

	<title>吃豆豆</title>

<!-- a_why -->
<link rel="icon" href="share.png">
<link rel="shortcut icon" href="icon.png">
<link rel="icon" href="icon.png">
<link type="text/css" href="css/common.css" rel="stylesheet" />
<script type="text/javascript" src="js/zepto.min.js"></script>
<script src="js/common.js?v=1"></script>

<!-- a_why -->

	<style>
		.body {
			overflow: hidden;
			background: #222;
			color:#cccccc;
			margin: 0px;
			padding: 0px;
			border: 0px;
		}
		#game_div {
			image-rendering: optimizeSpeed;
			-webkit-interpolation-mode: nearest-neighbor;
			margin: 0px;
			padding: 0px;
			border: 0px;
		}
		:-webkit-full-screen #game_div {
			width: 100%;
			height: 100%;
		}
		#orientation {
		margin: 0 auto;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-repeat: no-repeat;
		background-position: center;
		background-color: rgb(0, 0, 0);
		z-index: 999;
		display: none;
	}

	</style>

	<script type="text/javascript" src="js/phaser.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>

<body class="body">
<div id="wrapper">
	<div id="game_div" style="position: absolute;"></div>
</div>
		<input id="bt-game-id" type="hidden" value="3-avoider">

 

<script type="text/javascript">
	btGame.onlyVScreen();
	btGame.playLogoAdv();
</script>
<script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames/';
		window.shareData = {
		        "imgUrl": "http://www.v918.cn/vgames/icon/cdd.png",
		        "timeLineLink": "http://www.v918.cn/vgames/games/cdd/",
		        "tTitle": "吃豆豆",
		        "tContent": "吃豆豆"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("zf",1)>0){
				window.location = "http://www.v918.cn/vgames/";
			 }
			 else{
				goHome();
			 }
		}
		function dp_share(){
			document.title ="原来我这么吊，吃了"+myData.score+"分的豆豆，吊炸天是形容我的？";
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
            var myData = { gameid: "cdd" };
			//window.shareData.timeLineLink = "http://www.v918.cn/vgames/gamecenter.html?gameid=" + myData.gameid + (localStorage.myuid ? "&uid=" + localStorage.myuid : "");
			function dp_submitScore(score){
				myData.score = score;
				myData.scoreName = "吃豆豆吃了"+score+"分";
				if(score>0){
					if (confirm("吃完豆豆浑身爽，俺一口气吃了"+score+"分，叫上朋友一起吃！")){
						dp_share();
					}
				}
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("要将成绩提交到软灵通排行榜吗？")) {
                            //window.location = "http://wx.9g.com/rank/submit2.jsp?gameid=" + myData.gameid + "&uid=" + localStorage.myuid + "&score=" + myData.score + "&scorename=" + encodeURIComponent(myData.scoreName);
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
