<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
    	<title>监狱风云</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
    
        <meta name="full-screen" content="true"/>
        <meta name="screen-orientation" content="portrait"/>
        <meta name="x5-fullscreen" content="true"/>
        <meta name="360-fullscreen" content="true"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta http-equiv="Access-Control-Allow-Origin" content="*">
    	<style>
    		body {
    		    text-align: center;
    			margin: 0;
    			padding: 0;
    			border: 0;
    			background-color: #000000;
    			height: 100%;
    		}
    	</style>
    </head>
    <body>
    	<script src="js/pixi.js"></script>
    	<script src="js/game.js"></script>
    		<script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames';
var thegameurl ="http://www.v918.cn/vgames/games/jyfy2/"; 
var guanzhuurl ="http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd";
		window.shareData = {
		        "imgUrl": "http://mmbiz.qpic.cn/mmbiz/2zpp2iaH4HWEQT7mTaxRkYUk6k9OOhxchB6XJaialeFMicbWUj4tOweFL2ICR3zwaaT0COdjlgQmReR25twpK8jzg/640",
		        "timeLineLink": thegameurl,
		        "tTitle": "监狱风云",
		        "tContent": "日本右翼势力正试图为侵略历史翻案，每一个有良知的中国人都不会答应，立即阻击日本鬼子篡改历史！"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			 if((window.location+"").indexOf("f=zf",1)>0){
			 	window.location = mebtnopenurl;
			  }
			  else{
			 	goHome();
			  }
		}
		function dp_share(){
			document.title =shareData.sDesc;
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
            var myData = { gameid: "jyfy" };
			var domain = ["oixm.cn", "hiemma.cn", "peagame.net"][parseInt(Math.random() * 3)];
			window.shareData.timeLineLink = thegameurl ;
			function dp_submitScore(score){
				myData.score =parseInt(score);
				myData.scoreName = "消灭了"+score+"只鬼子";
				if(score>0){
					if (confirm("我竟然在分分钟钟间就消灭了"+score+"只鬼子，伙伴们一起来消灭鬼子吧！")){
						dp_share();
					}
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
		        	document.location.href = guanzhuurl;
				}
	        }
			</script>
			<div style="display: none;">
				<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2eac95e2df0ea5d2b0aaa92e3dbbe419' type='text/javascript'%3E%3C/script%3E"));
</script>
			</div>
	</body>
</html>
