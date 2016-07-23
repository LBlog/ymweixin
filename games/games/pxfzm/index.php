<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <title>泼醒小房子</title>
<script type="text/javascript">
	isShouJi();
</script>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
	html,body{margin:0;height:100%;overflow:hidden;user-select:none;-webkit-user-select:none}
	canvas{position:fixed;top:0;left:0;display:block;height:100%;margin:auto}
	.board{position:fixed;left:0;width:100%;height:95%;display:none;text-align:center}
	.board-img{height:100%}.board-btn{position:absolute;width:67%;left:17%;height:10%;top:47%;cursor:pointer}
	.board-text{position:absolute;width:80%;max-height:30%;overflow:hidden;top:22%;left:10%;font-size:34px;color:#2860ad}
	.share-tip{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:url(vapp/share_tip.png) 50% 0 rgba(0,0,0,.6) no-repeat;background-size:80% auto}
	.loading{position:fixed;top:0;left:0;background:rgba(0,0,0,.6);width:100%;height:100%}
	.loading-text{color:#fff;position:absolute;top:40%;width:100%;text-align:center}
	.start{position:fixed;left:0;width:100%;height:95%;background:url(vapp/start.jpg) 50% 50% no-repeat;background-size:auto 100%}
	.start-btn{position:absolute;width:100%;left:0;top:50%;height:50%;cursor:pointer;-webkit-tap-highlight-color:transparent;tap-highlight-color:transparent}
	#share-wx{
		background:rgba(0,0,0,0.8);
		position:absolute;top:0px;
		left:0px;
		width:100%;
		height:100%;
		z-index:10000;
		display:none;
	}
	#wx-qr{
		background:rgba(0,0,0,0.8);
		position:absolute;top:0px;
		left:0px;
		width:100%;
		height:100%;
		z-index:10000;
		display:none;
	}
.lis{overflow: hidden;width: 100%;z-index: 99999;position: absolute;top:0px;}
.lis a{display: block;width:99.9%;color:#ffffff;font-size:14px;text-decoration: none;background:#606783;text-align: center;opacity: 0.5;line-height:30px;font-weight: bold;font-family:"微软雅黑"}
.lis a img{position: relative;top: 1px;}
    </style>
</head>
<body>

		<canvas id="canvas" width="640" height="960">alternate content</canvas>
		<div id="start" class="start">
			<div id="start-btn" class="start-btn">
			</div>
		</div>
		<div id="loading" class="loading">
			<div class="loading-text">
				疯狂载入中... [<span id="loading-progress">0</span>%]
			</div>
		</div>
		<div id="board" class="board">
			<img class="board-img" src="vapp/board2.png">
			<div id="board-text" class="board-text">
			</div>
			<div class="board-btn" data-action="retry">
			</div>
			<div class="board-btn" style="top:65%" data-action="share">
			</div>
		</div>
		<div id="share-tip" class="share-tip">
		</div>
		<script type="text/javascript" src="js/create.js"></script>
		<script type="text/javascript" src="js/game.js"></script>
    <script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames';
var thegameurl ="http://www.v918.cn/vgames/games/pxfzm/"; 
var guanzhuurl ="http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd";
		dataForWeixin = {
			"appId": "",
			"imgUrl": "http://mmbiz.qpic.cn/mmbiz/2zpp2iaH4HWHkW7ics48LZtfNichlUU0xvVqEdVvWYP27xyJy3GNfL7YXBFs9Z4THy4qFjx3ODNUkPI12eqD0ppCQ/640",
			"url": thegameurl,
			"tTitle": "泼醒小房子",
			"tContent": "泼醒小房子"
		};	
				
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			goHome();
		}
		function dp_share(){
			document.title ="我给小房子泼了"+myData.score+"桶冰水，超过了"+myData.percent+"%的挑战者！你也来试试吧！";
			document.getElementById("share").style.display="";
			dataForWeixin.tTitle = document.title;
		}
		function dp_Ranking(){
			window.location=mebtnopenurl;
		}

		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		WeixinJSBridge.on('menu:share:appmessage', function(argv) {
				WeixinJSBridge.invoke('sendAppMessage', {
				   "appid": dataForWeixin.appId,
					"img_url": dataForWeixin.imgUrl,
					"link": dataForWeixin.url,
					"desc": dataForWeixin.tContent,
					"title": dataForWeixin.tTitle
				});
				setTimeout(function () {location.href = mebtnopenurl;}, 1500);
			});

			WeixinJSBridge.on('menu:share:timeline', function(argv) {
				WeixinJSBridge.invoke('shareTimeline', {
				   "appid": dataForWeixin.appId,
					"img_url": dataForWeixin.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": dataForWeixin.url,
					"desc": dataForWeixin.tContent,
					"title": dataForWeixin.tTitle
				});
				setTimeout(function () {location.href = guanzhuurl;}, 1500);
			});
		}, false);
		</script>
		<div id=share style="display: none">
			<img width=100% src="share.png" style="position: fixed; z-index: 9999; top: 0; left: 0; display: " ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
		<script type="text/javascript">
		var myData = { };
		function dp_submitScore(score,percent){
			myData.score = score;
			myData.percent=percent;
			myData.scoreName = "倒了"+score+"桶";
			if(score>0){
				if (confirm("你泼了"+score+"桶冰水，终于唤醒了小房子，超过了"+percent+"%的挑战者！友情提示大家珍爱生命远离毒品！")){
					dp_share();
				}
			}
		}
		</script>
	
	<div>
	</div>
<div style="display:none;">
	<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2eac95e2df0ea5d2b0aaa92e3dbbe419' 

type='text/javascript'%3E%3C/script%3E"));
</script>
	
	</div>
</body>
</html>