
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="-1">
    <link rel="stylesheet" type="text/css" href="js/m.min.css">
    <title>微时代管家</title>
</head>
<body>
<script src="jquery/2.0.0/jquery.min.js"></script>
<script src="underscore/1.3.3/underscore-min.js"></script>
<div id="layout">
    <div id="loading" class="page show hide">loading</div>
    <div id="index" class="page show">
        <div class="app_name">美女啵一个</div>
        <div class="p_btns">
            <span class="btn_start_game js_start_game">开始游戏</span>
        </div>
        <div class="p_btns"><a href="javascript:void(0);" onClick="clickMore();" class="btn_download_game js_download_game">更多游戏</a></div>
    </div>
    <div id="game" class="page hide">
        <div id="game_header">
            <span class="score">得分：<span>0</span></span>
            <span class="count_down"></span>
            <!-- 
            <span class="btn_pause js_pause_game">暂停</span>
             --> 
        </div>
        <div id="box">
            <div class="inner">
                <div class="hole" id="hole1">
                    <div class="meizi" data-id="0"></div>
                </div>
                <div class="hole" id="hole2">
                    <div class="meizi" data-id="1"></div>
                </div>
                <div class="hole" id="hole3">
                    <div class="meizi" data-id="2"></div>
                </div>
                <div class="hole" id="hole4">
                    <div class="meizi" data-id="3"></div>
                </div>
                <div class="hole" id="hole5">
                    <div class="meizi" data-id="4"></div>
                </div>
                <div class="hole" id="hole6">
                    <div class="meizi" data-id="5"></div>
                </div>
                <div class="hole" id="hole7">
                    <div class="meizi" data-id="6"></div>
                </div>
                <div class="hole" id="hole8">
                    <div class="meizi" data-id="7"></div>
                </div>
                <div class="hole" id="hole9">
                    <div class="meizi" data-id="8"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="gameover" class="page hide"></div>
    <div id="game_pause" class="page hide">
        <div class="share">
            <img src="mblogpic/9a866dde2f32e54090b0/460.jpg" width="160">
        </div>
        <div class="pause_txt">游戏暂停</div>
        <div class="p_btns">
            <span class="btn_continue js_game_continue">继续</span>
        </div>
        <div class="p_btns"><a href="javascript:void(0);" onClick="clickMore();" class="btn_download_game js_download_game">更多游戏</a></div>
       
    </div>
</div>
<script type="text/html" id="tpl_gameover">
    <div class="share">
        <img src="mblogpic/9a866dde2f32e54090b0/460.jpg" width="160">
    </div>
    <div class="score">
        <p class="result">亲到 <%= score %> 个美女堪称：</p>
        <p class="name"><%= name %></p>
        <p class="congratulation"><%= congratulation %></p>
    </div>

    <div class="pic"><img src="<%= img %>" alt=""></div>
    <div class="msg"><%= desc %></div>

    <div class="do_more"><%= doMore %></div>

    <div class="p_btns">
        <span class="btn_play_again js_game_again">再来一次</span>
    </div>
    <div class="p_btns">
        <a href="javascript:void(0);" onclick="clickMore();" class="btn_download_game js_download_game">更多游戏</a>
    </div>

</script>
<script src="js/libs.min.js"></script>
<script src="js/main.min.js"></script>
<script language=javascript>
		var mebtnopenurl = 'http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd';
		window.shareData = {
		        "imgUrl": "http://www.v918.cn/vgames/games/mnbyg/icon.png",
		        "timeLineLink": "http://www.v918.cn/vgames/games/mnbyg/index.html",
		        "tTitle": "美女啵一个-软灵通",
		        "tContent": "美女啵一个-软灵通"
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
			document.title ="万千美女从中过，偏偏眼瞎啵如花！啵了"+myData.score+"个美女也算值得了！求超越！";
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
			<img width=100% src="http://www.v918.cn/vgames/games/mnbyg/share.png"
				style="position: fixed; z-index: 9999; top: 0; left: 0; display: "
				ontouchstart="document.getElementById('share').style.display='none';" />
		</div>
		<div style="display: none;">
			<script type="text/javascript">
            var myData = { gameid: "mnbyg" };
			//window.shareData.timeLineLink = "http://www.v918.cn/vgames/games/";
			function dp_submitScore(score){
				myData.score = score;
				myData.scoreName = "啵了"+score+"个美女";
				if(score>0){
					if (confirm("哇塞你居然啵了"+myData.score+"个美女，不过如花才是你的真爱！")){
						dp_share();
					}
				}
			}
			function onShareComplete(res) {
                if (localStorage.myuid && myData.score != undefined) {
                    setTimeout(function(){
                        if (confirm("要将成绩提交到软灵通排行榜吗？")) {
                            window.location = "http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd";
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
			
</body></html>