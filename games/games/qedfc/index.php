<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <title>企鹅的复仇</title>
		 
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/createjs.min.js"></script>
	<script type="text/javascript" src="js/zepto.min.js"></script>
	<script src="js/common.js"></script>
    <style>
body,html{padding:0;margin:0;width:100%;height:100%;background:#000;-webkit-tap-highlight-color:transparent;}
canvas{width:100%;height:100%;}#container{position:absolute;bottom:0;left:0;width:100%;height:100%;}.bt-animation{-webkit-transition:all 200ms;-moz-transition:all 200ms;-ms-transition:all 200ms;-o-transition:all 200ms;transition:all 200ms;}.bt-advertisement,.bt-h-scrren,.bt-v-scrren,.bt-play-logo-adv,.bt-play-share-tip{position:absolute;top:0;left:0;z-index:6000;width:100%;height:100%;text-align:center;font-size:16px;color:#fff;}#bt-play-logo-adv{z-index:9001;}#bt-play-logo-adv-lock{z-index:9000;}.bt-play-share-tip{text-align:right;}.bt-play-share-tip-img{margin:10px 2%0 0;width:60%;max-width:180px;}.bt-h-scrren,.bt-v-scrren{background:#fff;}.bt-h-scrren table,.bt-h-scrren tr,.bt-h-scrren td,.bt-v-scrren table,.bt-v-scrren tr,.bt-v-scrren td{width:100%;height:100%;padding:0;margin:0;}.bt-h-screen-img,.bt-v-screen-img{margin:10px 1%;max-width:98%;}.bt-lock-screen{position:absolute;top:0;left:0;z-index:5000;width:100%;height:100%;opacity:0.4;background:#000;}#bt-hide-lock{z-index:-1;}.bt-game-loading{position:fixed;position:absolute;top:0;left:0;width:100%;height:100%;font-size:1.6rem;text-align:center;color:gray;background:#fff;}.bt-game-loading table,.bt-game-loading tr,.bt-game-loading td{height:100%;width:100%;padding:0;margin:0;}.bt-game-loading.bt-img{width:452px;max-width:70%;}.bt-game-loading.bt-text{padding-top:30px;}.bt-hide{overflow:hidden!important;width:0!important;height:0!important;opacity:0!important;margin:0!important;padding:0!important;}
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
.lis{overflow: hidden;width: 100%;z-index: 99999;position: absolute;top:0;}
.lis a{display: block;width:99.9%;color:#ffffff;font-size:14px;text-decoration: none;background:#606783;text-align: center;opacity: 0.5;line-height:30px;font-weight: bold;font-family:"微软雅黑"}
.lis a img{position: relative;top: 1px;}
    </style>
	
</head>
<body>
	<script type="text/javascript" src="http://game.2sky.cn/js/code.js"></script>
	<div class="lis">
		<div style="float: left;width:33%;"><a style="border-bottom: 3px solid #fd6766;" href="/">游戏列表</a></div>
		<div style="float: left;width:34%;"><a style="border-bottom: 3px solid #04fece;" href="http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd">关注收藏</a></div>
		<div style="float: left;width:33%;"><a style="width:100%;margin:0;border-bottom: 3px solid #fdcd01;" onclick="location.href=location.href;" href="javascript:;" ><img width="15" src="vapp/4.png">重玩</a></div>
	</div>
<div id="container">
	<canvas id="canvas"></canvas>
</div>

<div style="display: none;">
</div>
<script src="js/index.js"></script>
<script src="js/flyline.js"></script>
<script language=javascript>
		var mebtnopenurl = 'http://www.v918.cn/vgames/';
		var rankurl = mebtnopenurl;
		dataForWeixin = {
			"appId": "",
			"imgUrl": "http://www.v918.cn/vgames/icon/qedfc.png",
			"url": "http://www.v918.cn/vgames/games/qedfc",
			"tTitle": "企鹅的复仇"
			"tContent": "企鹅的复仇"
		};	
		function goHome(){
			window.location=mebtnopenurl;
		}
		function clickMore(){
			if((window.location+"").indexOf("zf",1)>0){
				window.location = mebtnopenurl;
			 }
			 else{
				goHome();
			 }
		}
		function dp_Ranking() {
			window.location = rankurl;
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
				 setTimeout(function () {location.href = mebtnopenurl;}, 1500); 
			});
		}, false);
		function dp_share(){
			document.title ="总算复仇了，把大笨熊射出"+myData.scoreName+"，我真是吊炸天！";
			document.getElementById("share").style.display="";
			dataForWeixin.tTitle = document.title;
		}
		</script>
		 <div id="share" style="display: none">
			<img width="100%" src="/shares.png" style="position: fixed; z-index: 9999; top: 0; left: 0;" ontouchstart="document.getElementById('share').style.display='none';">
		</div>
		<div style="display: none;">
			<script type="text/javascript">
            var myData = {};
			function dp_submitScore(score){
				myData.score = score*10;
				myData.scoreName = score+"米";
				if(score>0){
					if (confirm("企鹅你太强悍了，把伦家熊熊射出"+score+"米！要不要通知一下小伙伴")){
						dp_share();
					}
				}
			}
			</script>
		</div>
	<script type="text/javascript" src="js/config.main.js"></script>
 
<div style="display:none;">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?fa356a94bf5ae253b76fefa953bb56e4";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</div>
</body>
</html>