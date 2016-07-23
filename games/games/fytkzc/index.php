<!DOCTYPE HTML>
<html>
<head>
    <title>飞越天空之城</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta charset="utf-8"/>
    <style type="text/css">
        *{
            margin:0;
            padding:0;
        }
        body,div{
            text-align:center;
        }
        img {
            max-width:100%;
            height:auto;
            width:auto9;
            -webkit-tap-highlight-color:rgba(0,0,0,0);
        }
    </style>
</head>
<body bgcolor = "black">
    <div>
        <section>
            <canvas id="gameCanvas" width="320" ></canvas>
        </section>
    </div>
    <script>
//        alert("width"+window.innerWidth + "height" + window.innerHeight);
       canv = document.getElementById("gameCanvas");
//        canv.setAttribute("width", window.innerWidth);
        canv.setAttribute("height", window.innerHeight);//1-150/640
    </script>
    <script src="game.min.js"></script>
    <script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames/';
		window.shareData = {
		        "imgUrl": "http://www.v918.cn/vgames/icon/fytkzc.png",
		        "timeLineLink": "http://www.v918.cn/vgames/games/fytkzc/",
		        "tTitle": "飞越天空之城",
		        "tContent": "飞越天空之城"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("zf",1)>0){
				window.location = "http://www.v918.cn/vgames/games/fytkzc/";
			 }
			 else{
				goHome();
			 }
		}
		function dp_share(){
			document.title ="我一飞冲天，竟然冲上了"+myData.score+"米高，谁敢挑战一下？";
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
			<img width=100% src="http://www.v918.cn/vgames/icon/fytkzc.png"
				style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
				ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
		<div style="display: none;">
			<script type="text/javascript">
            var myData = { gameid: "zb" };
			window.shareData.timeLineLink = "http://www.v918.cn/vgames/games/fytkzc/index.html" + myData.gameid + (localStorage.myuid ? "&uid=" + localStorage.myuid : "");
			function dp_submitScore(score){
				myData.score = score;
				myData.scoreName =score+"米";
				if(score>0){
					if (confirm("我靠，一飞冲天，冲了"+score+"米！要不要让小伙伴乐呵乐呵？")){
						dp_share();
					}
				}
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("要将成绩提交到游戏排行榜吗？")) {
                            window.location = "http://www.v918.cn/vgames/games/fytkzc" + myData.gameid + "&uid=" + localStorage.myuid + "&score=" + myData.score + "&scorename=" + encodeURIComponent(myData.scoreName);
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
