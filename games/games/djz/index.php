
<!DOCTYPE HTML>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content = "width=320, maximum-scale=1.0, user-scalable=no" />
<head>
<title>打击者-微时代管家</title>
<link rel="stylesheet" href="css/css.css" type="text/css"/>
</head>
<body>
<div id="game"  style="width:100%; height:100%;position:absolute;overflow:hidden;-webkit-transform:translate3d(0px, 0px, 0px);left:0px;top:0px;-moz-user-select:none; -webkit-user-select:none;">
  <canvas unselectable="on" style="position:absolute;overflow:visible;-webkit-transform:translate3d(0px, 0px, 0px);left:0px;top:0;width:100%;-moz-user-select:none; -webkit-user-select:none;" id="myCanvas" width="320" height="570" > Your browser does not support the canvas element. </canvas>
  <canvas unselectable="on" style="-moz-user-select:none; display:none; -webkit-user-select:none;" id="myCanvas4" width="144" height="28"> Your browser does not support the canvas element. </canvas>
  <canvas unselectable="on" style="-moz-user-select:none; display:none; -webkit-user-select:none;" id="myCanvas5" width="120" height="74"> Your browser does not support the canvas element. </canvas>
</div>

<script src="js/easyGame.js" type="text/javascript"></script> 
<script type="text/javascript">	
var score = $("myCanvas4");
var hit = $("myCanvas5");
var gameEnter = $("game");
var Attack = new game($("myCanvas"));
	 Attack.init();
     Attack.loading(); 

</script>
<script language=javascript>
		var mebtnopenurl = 'http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd';
		window.shareData = {
		        "imgUrl": "http://www.v918.cn/vgames/games/djz/icon.png",
		        "timeLineLink": "http://www.v918.cn/vgames/games/djz/index.html",
		        "tTitle": "打击者",
		        "tContent": "打击者"
		};
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("f=zf",1)>0){
				window.location = "http://www.v918.cn/vgames/index.html";
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
			<img width="100%" src="./share.png"
				style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
				ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
			<script type="text/javascript">
            var myData = { gameid: "djz" };
			 // var domain = ["oixm.cn", "hiemma.cn", "peagame.net"][parseInt(Math.random() * 3)];
			window.shareData.timeLineLink = "http://www.v918.cn/vgames/games/djz/index.html";
			function dp_submitScore(score){
						myData.score = parseInt(score);
						myData.scoreName ="获得了"+score+"分";		
						document.title = window.shareData.tTitle =game.prototype.getItext();
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("要将成绩提交到微时代游戏排行榜吗？")) {
                            window.location = "http://www.v918.cn/vgames/games/djz/index.html";
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