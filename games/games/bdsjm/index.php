<!DOCTYPE html>
<html>
<head>
    <title>暴打神经猫- 微信朋友圈在线游戏</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, width=device-width,target-densitydpi=device-dpi"/>
	  <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/createjs.js"></script>
    <script type="text/javascript">
    var i = new Date().getTime() % 5;
    var isDesktop = navigator['userAgent'].match(/(ipad|iphone|ipod|android|windows phone)/i) ? false : true;
    	var fontunit        = isDesktop ? 20 : ((window.innerWidth>window.innerHeight?window.innerHeight:window.innerWidth)/320)*10;
    	document.write('<style type="text/css">'+
    		'html,body {font-size:'+(fontunit<30?fontunit:'30')+'px;}'+
    		(isDesktop?'#welcome,#GameTimeLayer,#GameLayerBG,#GameScoreLayer.SHADE{position: absolute;}':
    		'#welcome,#GameTimeLayer,#GameLayerBG,#GameScoreLayer.SHADE{position:fixed;}@media screen and (orientation:landscape) {#landscape {display: box; display: -webkit-box; display: -moz-box; display: -ms-flexbox;}}')+
    		'</style>');
    </script>
    <style type="text/css">
    body {font-family: "Helvetica Neue", Helvetica, STHeiTi, sans-serif; margin: 0; padding: 0;}
    .loading {background-image: url("images/loding.gif");
    	background-repeat: no-repeat;
    	background-position: center center;
    	background-size: auto 60%; 
	}
    .SHADE {top: 0; left:0; width:100%; height: 100%; bottom:0; z-index: 11;}
    .BOX-V {box-orient: vertical;-webkit-box-orient: vertical; -moz-box-orient: vertical;-ms-flex-direction:column;}
	.BOX-D {box-align: end; box-pack: center -webkit-box-align: end; -webkit-box-pack: center; -ms-flex-align:end; -ms-flex-pack:center;}
	.BOX-M {box-align: center;box-pack: center; -webkit-box-align: center; -webkit-box-pack: center; -ms-flex-align:center; -ms-flex-pack:center;}
	.BOX-S {display:block; box-flex:1; -webkit-box-flex:1; -moz-box-flex:1;-ms-flex:1;}
	.BOX   ,.BOX-V,.BOX-D,.BOX-M, .FOOTER{display: box; display: -webkit-box; display: -moz-box; display: -ms-flexbox;}
	.BBOX  ,.BOX,.APP-STAGE,.INSET-STAGE,.STAGE,.PAGE-STAGE,.PAGE,.PAGE-BOX,.INSET-PAGE,.FOOTER{box-sizing:border-box; -webkit-box-sizing:border-box; -moz-box-sizing:border-box;}

    #welcome { background-color:rgba(0,0,0,.8); text-align: center; font-weight: bold;overflow: hidden;}
    .welcome-bg {position:absolute;top:0;left:0;right:0;bottom:0; background: url(images/bing.jpg) center center no-repeat; background-size:100% 100%; opacity: .4;overflow: hidden;}
    #GameTimeLayer {top:1em; left: 0; width:100%; text-align: center; color:#f00; font-size: 4em; text-shadow:0 0 3px #fff,0 0 3px #fff,0 0 3px #fff;overflow: hidden;}
    #GameLayerBG {top:0;left:0;right:0;bottom:0;overflow:hidden;background:#fff;}
    .GameLayer {position:absolute;bottom:0;left:0;}
    .block {position:absolute;border-top:1px solid #333; background-repeat: no-repeat; background-position: center;}

    .block{background-image:url(images/em.jpg);}
    .t1,.t2,.t3,.t4,.t5 { background-size:auto 98%;background-image:url(images/tt0.jpg);}
    
    .t3,.t4 {background-image:url(images/tt1.jpg);}
    .t5 {background-image:url(images/tt2.jpg);}
    
    .tt1,.tt2,.tt3,.tt4,.tt5 { background-size:auto 96%;background-image:url(images/jiao.jpg);}
    .tt1,.tt2{background-image:url(images/j1.jpg);}
    .tt3,.tt4{background-image:url(images/j2.jpg);}
    .bt{display:block;padding:20px;background:#999;color:#000;text-decoration:none;margin:25px;}
    a.bt{background:#FC0;}
    .bl {border-left:1px solid #333;}
    @-ms-keyframes flash {
    	0% { opacity: 1; }
    	50% { opacity: 0; }
    	100% { opacity: 1; }
    }
    @-webkit-keyframes flash {
    	0% { opacity: 1; } 
    	50% { opacity: 0; }
    	100% { opacity: 1; }
    }
  	.flash {-webkit-animation: flash .2s 3;animation: flash .2s 3;}
    .bad {background-color:#000;background-size:90%;background-image:url(images/bad.jpg); -webkit-animation: flash .2s 3;animation: flash .2s 3;}
    *    {-webkit-tap-highlight-color: rgba(0,0,0,0);-ms-tap-highlight-color: rgba(0,0,0,0); tap-highlight-color: rgba(0,0,0,0); -ms-user-select: none;}

    #GameScoreLayer {background-position:center .5em; background-size: auto 4em; padding-top:3em; font-size:2em; font-weight: bold; color:#fff; text-align: center;overflow: hidden;}
    .bgc1 { background-color: #23378B;}
    .bgc2 { background-color: #009FE3;}
    .bgc3 { background-color: #E42313;}
    .bgc4 { background-color: #FCBD1B;}
    .bgc5 { background-color: #34002A;}

    .share-icon {width:1.7em; background-repeat:no-repeat; background-size: auto 100%;}

    #GameScoreLayer-btn .btn,#GameScoreLayer-share .btn {text-align: center;font-size:1.1em; background-color: rgba(0,0,0,.3); height:2em; line-height:2em;}

    .btn:active {opacity: 0.2;}
    #landscape {display: none;}


	#gameBody {position: relative; width: 640px; margin: 0 auto; height: 100%;}
#share-wx {
background: rgba(0,0,0,0.8);
position: absolute;
top: 0px;
left: 0px;
width: 100%;
height: 100%;
z-index: 10000;
display: none;
}
    </style>
</head>
<body>
	<script type="text/javascript">
	window.shareData = {
      "imgUrl": "http://www.v918.cn/vgames/games/bdsjm/images/dbsjm.jpg",
      "timeLineLink": "http://www.v918.cn/vgames/games/bdsjm/",
      "tTitle": "暴打神经猫",
      "tContent": "朋友圈被神经猫刷屏？快来暴打神经猫！"
  };

	if (isDesktop)
		document.write('<div id="gameBody">');

	var body, blockSize, GameLayer = [], GameLayerBG, touchArea = [], GameTimeLayer;
	var transform, transitionDuration;

	function init (argument) {
		showWelcomeLayer();
		body = document.getElementById('gameBody') || document.body;
		body.style.height = window.innerHeight+'px';
		transform = typeof(body.style.webkitTransform) != 'undefined' ? 'webkitTransform' : (typeof(body.style.msTransform) != 'undefined'?'msTransform':'transform');
		transitionDuration = transform.replace(/ransform/g, 'ransitionDuration');

		GameTimeLayer = document.getElementById('GameTimeLayer');
		GameLayer.push( document.getElementById('GameLayer1') );
		GameLayer[0].children = GameLayer[0].querySelectorAll('div');
		GameLayer.push( document.getElementById( 'GameLayer2' ) );
		GameLayer[1].children = GameLayer[1].querySelectorAll('div');
		GameLayerBG = document.getElementById( 'GameLayerBG' );
		if( GameLayerBG.ontouchstart === null ){
			GameLayerBG.ontouchstart = gameTapEvent;
		}else{
			GameLayerBG.onmousedown = gameTapEvent;
			document.getElementById('landscape-text').innerHTML = '点我开始玩耍';
			document.getElementById('landscape').onclick = winOpen;
		}
		gameInit();
		window.addEventListener('resize', refreshSize, false);

		setTimeout(function(){
			var btn = document.getElementById('ready-btn');
			btn.className = 'btn';
			btn.innerHTML = ' 预备，上！'
			btn.style.backgroundColor = '#F00';
			btn.onclick = function(){
				closeWelcomeLayer();
			} 

		}, 500);
	}
	function winOpen() {
		window.open(location.href+'?r='+Math.random(), 'nWin', 'height=500,width=320,toolbar=no,menubar=no,scrollbars=no');
		var opened=window.open('about:blank','_self'); opened.opener=null; opened.close();
	}
	var refreshSizeTime;
	function refreshSize(){
		clearTimeout(refreshSizeTime);
		refreshSizeTime = setTimeout(_refreshSize, 200);
	}
	function _refreshSize(){
		countBlockSize();
		for( var i=0; i<GameLayer.length; i++ ){
			var box = GameLayer[i];
			for( var j=0; j<box.children.length; j++){
				var r = box.children[j],
					rstyle = r.style;
				rstyle.left = (j%4)*blockSize+'px';
				rstyle.bottom = Math.floor(j/4)*blockSize+'px';
				rstyle.width = blockSize+'px';
				rstyle.height = blockSize+'px';
			}
		}
		var f, a;
		if( GameLayer[0].y > GameLayer[1].y ){
			f = GameLayer[0];
			a = GameLayer[1];
		}else{
			f = GameLayer[1];
			a = GameLayer[0];
		}
		var y = ((_gameBBListIndex)%10)*blockSize;
		f.y = y;
		f.style[transform] = 'translate3D(0,'+f.y+'px,0)';

		a.y = -blockSize*Math.floor(f.children.length/4)+y;
		a.style[transform] = 'translate3D(0,'+a.y+'px,0)';

	}
	function countBlockSize(){
		blockSize = body.offsetWidth/4;
		body.style.height = window.innerHeight+'px';
		GameLayerBG.style.height = window.innerHeight+'px';
		touchArea[0] = window.innerHeight-blockSize*0;
		touchArea[1] = window.innerHeight-blockSize*3;
	}
	var _gameBBList = [], _gameBBListIndex = 0, _gameOver = false, _gameStart = false, _gameTime, _gameTimeNum, _gameScore;
	function gameInit(){
        createjs.Sound.registerSound( {src:"audio/nima.mp3", id:"err"} );
        createjs.Sound.registerSound( {src:"audio/end.mp3", id:"end"} );
        createjs.Sound.registerSound( {src:"audio/type.mp3", id:"tap"} );
		gameRestart();
	}
	function gameRestart(){
		console.log('gameRestart');
		_gameBBList = [];
		_gameBBListIndex = 0;
		_gameScore = 0;
		_gameOver = false;
		_gameStart = false;
		_gameTimeNum = 3000;
		GameTimeLayer.innerHTML = creatTimeText(_gameTimeNum);
		countBlockSize();
		refreshGameLayer(GameLayer[0]);
		refreshGameLayer(GameLayer[1], 1);
	}
	function gameStart(){
		_gameStart = true;
		_gameTime = setInterval(gameTime,30);
	}
	function gameOver(){
		_gameOver = true;
		clearInterval(_gameTime);
		setTimeout(function(){
			GameLayerBG.className = '';
			showGameScoreLayer();
		}, 1500);
	}
	function gameTime(){
		_gameTimeNum --;
		if( _gameTimeNum <= 0){
			GameTimeLayer.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;时间到！';
			gameOver();
			GameLayerBG.className += ' flash';
			createjs.Sound.play("end");
		}else{
			GameTimeLayer.innerHTML = creatTimeText(_gameTimeNum);
		}
	}
	function creatTimeText( n ){
		var text = (100000+n+'').substr(-4,4);
		text = '&nbsp;&nbsp;'+text.substr(0,2)+"'"+text.substr(2)+"''"
		return text;
	}
	var _ttreg = / t{1,2}(\d+)/, _clearttClsReg = / t{1,2}\d+| bad/;
	function refreshGameLayer( box, loop, offset ){
		var i = Math.floor(Math.random()*1000)%4+(loop?0:4);
		for( var j=0; j<box.children.length; j++){
			var r = box.children[j],
				rstyle = r.style;
			rstyle.left = (j%4)*blockSize+'px';
			rstyle.bottom = Math.floor(j/4)*blockSize+'px';
			rstyle.width = blockSize+'px';
			rstyle.height = blockSize+'px';
			r.className = r.className.replace(_clearttClsReg, '');
			if( i == j ){
				_gameBBList.push( {cell:i%4, id:r.id} );
				r.className += ' t'+(Math.floor(Math.random()*1000)%5+1);
				r.notEmpty = true;
				i = ( Math.floor(j/4)+1)*4+Math.floor(Math.random()*1000 )%4;
			}else{
				r.notEmpty = false;
			}
		}
		if( loop ){
			box.style.webkitTransitionDuration = '0ms';
			box.style.display          = 'none';
			box.y                      = -blockSize*(Math.floor(box.children.length/4)+(offset||0))*loop;
			setTimeout(function(){
				box.style[transform] = 'translate3D(0,'+box.y+'px,0)';
				setTimeout( function(){
					box.style.display     = 'block';
				}, 100 );
			}, 200 );
		} else {
			box.y = 0;
			box.style[transform] = 'translate3D(0,'+box.y+'px,0)';
		}
		box.style[transitionDuration] = '150ms';
	}
	function gameLayerMoveNextRow(){
		for(var i=0; i<GameLayer.length; i++){
			var g = GameLayer[i];
			g.y += blockSize;
			if( g.y > blockSize*(Math.floor(g.children.length/4)) ){
				refreshGameLayer(g, 1, -1);
			}else{
				g.style[transform] = 'translate3D(0,'+g.y+'px,0)';
			}
		}
	}
	function gameTapEvent(e){
		if (_gameOver) {
			return false;
		}
		var tar = e.target;
		var y = e.clientY || e.targetTouches[0].clientY,
			x = (e.clientX || e.targetTouches[0].clientX)-body.offsetLeft,
			p = _gameBBList[_gameBBListIndex];
		if ( y > touchArea[0] || y < touchArea[1] ) {
			return false;
		}
		if( (p.id==tar.id&&tar.notEmpty) || (p.cell==0&&x<blockSize) || (p.cell==1&&x>blockSize&&x<2*blockSize) || (p.cell==2&&x>2*blockSize&&x<3*blockSize) || (p.cell==3&&x>3*blockSize) ){
			if( !_gameStart ){
				gameStart();
			}
        	createjs.Sound.play("tap");
			tar = document.getElementById(p.id);
			tar.className = tar.className.replace(_ttreg, ' tt$1');
			_gameBBListIndex++;
			_gameScore ++; 
			gameLayerMoveNextRow();
		}else if( _gameStart && !tar.notEmpty ){
			createjs.Sound.play("err");
			gameOver();
			tar.className += ' bad';
		}
		return false;
	}
	function createGameLayer(){
		var html = '<div id="GameLayerBG">';
		for(var i=1; i<=2; i++){
			var id = 'GameLayer'+i;
			html += '<div id="'+id+'" class="GameLayer">';
			for(var j=0; j<10; j++ ){
				for(var k=0; k<4; k++){
					html += '<div id="'+id+'-'+(k+j*4)+'" num="'+(k+j*4)+'" class="block'+(k?' bl':'')+'"></div>';
				}
			}
			html += '</div>';
		}
		html += '</div>';

		html += '<div id="GameTimeLayer"></div>';

		return html;
	}
	function closeWelcomeLayer(){
		var l = document.getElementById('welcome');
		l.style.display = 'none';
	}
	function showWelcomeLayer(){
		var l = document.getElementById('welcome');
		l.style.display = 'block';
	}
	function showGameScoreLayer(){
		var l = document.getElementById('GameScoreLayer');
		var c = document.getElementById(_gameBBList[_gameBBListIndex-1].id).className.match(_ttreg)[1];
		l.className = l.className.replace(/bgc\d/, 'bgc'+c);
		document.getElementById('GameScoreLayer-text').innerHTML = shareText(_gameScore);
		document.getElementById('GameScoreLayer-score').innerHTML = '得分&nbsp;&nbsp;'+_gameScore;
		var bast = cookie('bast-score');
		if( !bast || _gameScore > bast ){
			bast = _gameScore;
			cookie('bast-score', bast, 100);
		}
		document.getElementById('GameScoreLayer-bast').innerHTML = '最佳&nbsp;&nbsp;'+bast;
		l.style.display = 'block';

    window.shareData.tTitle = '我打爆'+_gameScore+'只神经猫，不服来挑战！！！';
    
    var l = document.getElementById('adhtml').innerHTML;
    document.getElementById('ad').innerHTML = l;
    document.getElementById('ad1').innerHTML = l;
  
	}


	function showEnd(){
		var l = document.getElementById('GameScoreLayer-share');
		l.style.display = 'block';
		document.getElementById('share-wx').style.display = 'none';
	}
  
  
	function hideGameScoreLayer(){
		var l = document.getElementById('GameScoreLayer');
		l.style.display = 'none';
	}
	function replayBtn(){
		gameRestart();
		hideGameScoreLayer();
	}
	function backBtn(){
		gameRestart();
		hideGameScoreLayer();
		showWelcomeLayer();
	}
	var mebtnopenurl = 'http://www.v918.cn/vgames';
	function shareText( score ){
    var num = parseInt(Math.random()*100) ;
    var percent = parseInt(score/1.2);
    if(percent > 100 ) percent = 99;
    
    var txt1 = "排名第"+ num +"位，击败了"+ percent + "% 的人";
		if( score <= 69 )
			return '呵呵！打爆'+score+'只神经猫！<br/>'+txt1+ '<br/>亲，得加油哦。朋友圈神经猫已经泛滥了！';
		if( score <= 269 )
			return '酷！打爆'+score+'只神经猫！<br/>'+txt1+ '<br/>亲,你好棒哦。';
		if( score <= 319 )
			return '帅呆了！打爆'+score+'只神经猫！<br/>'+txt1+ '<br/>爱死你了，朋友圈终于清净了！';
		if( score <= 400 )
			return '太牛了！打爆'+score+'只神经猫！<br/>'+txt1+ '<br/>你是我见过最棒的，你击败了全国百分之99的蛇精病，奥巴马和金正恩都惊呆了！';
		return '膜拜ing！打爆'+score+'只神经猫！<br/> 战胜了神经病院 99% 的人，全球排名第1 <br/>你是宇宙第一强人，再也没人能超越你了！';
	}
	
	function toStr(obj) {
		if ( typeof obj == 'object' ) {
			return JSON.stringify(obj);
		} else {
			return obj;
		}
		return '';
	}
	function cookie(name, value, time) {
		if (name) {
			if (value) {
				if (time) {
					var date = new Date();
					date.setTime(date.getTime() + 864e5 * time), time = date.toGMTString();
				}
				return document.cookie = name + "=" + escape(toStr(value)) + (time ? "; expires=" + time + (arguments[3] ? "; domain=" + arguments[3] + (arguments[4] ? "; path=" + arguments[4] + (arguments[5] ? "; secure" : "") : "") : "") : ""), !0;
			}
			return value = document.cookie.match("(?:^|;)\\s*" + name.replace(/([-.*+?^${}()|[\]\/\\])/g, "\\$1") + "=([^;]*)"), value = value && "string" == typeof value[1] ? unescape(value[1]) : !1, (/^(\{|\[).+\}|\]$/.test(value) || /^[0-9]+$/g.test(value)) && eval("value=" + value), value;
		}
		var data = {};
		value = document.cookie.replace(/\s/g, "").split(";");
		for (var i = 0; value.length > i; i++) name = value[i].split("="), name[1] && (data[name[0]] = unescape(name[1]));
		return data;
	}
	document.write(createGameLayer());
	
	function share(){
		document.getElementById('share-wx').style.display = 'block';
		document.getElementById('share-wx').onclick = function(){
			this.style.display = 'none';
		};
	}
	
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	    
	    WeixinJSBridge.on('menu:share:appmessage', function(argv) {
	        WeixinJSBridge.invoke('sendAppMessage', {
	            "img_url": window.shareData.imgUrl,
	            "link": window.shareData.timeLineLink,
	            "desc": window.shareData.tContent,
	            "title": window.shareData.tTitle
	        }, function(res) {
	        	showEnd();
	        })
	    });

	    WeixinJSBridge.on('menu:share:timeline', function(argv) {
	        WeixinJSBridge.invoke('shareTimeline', {
	            "img_url": window.shareData.imgUrl,
	            "img_width": "640",
	            "img_height": "640",
	            "link": window.shareData.timeLineLink,
	            "desc": window.shareData.tContent,
	            "title": window.shareData.tTitle
	        }, function(res) {	 
          showEnd();
	        });
	    });
	}, false);
</script>

	<div id="GameScoreLayer" class="BBOX SHADE bgc1" style="display:none;">
		<div style="padding:0 5%;">
			<div id="GameScoreLayer-text"></div>
			<div> </div>
      <br /><div>
      <span id="GameScoreLayer-score" style="margin-bottom:1em;">得分</span>
			<span id="GameScoreLayer-bast">最佳</span>
			</div><br />
			<div id="GameScoreLayer-btn" class="BOX">
				<div class="btn BOX-S" onClick="replayBtn()">重来</div>&nbsp;
				<div class="btn BOX-S" onClick="share()">分享到朋友圈</div>&nbsp;
			</div>
			<br/>
      <a class="bt" href="http://www.v918.cn/vgames/">更多游戏</a>
			<br/> 
        <div style="clear:both;" id="ad" ></div>
		</div>
	</div>
  <div id="GameScoreLayer-share" class="BBOX SHADE" style="font-size: 30px;
font-weight: bold;display:none;z-index:100;position:absolute;background:#ccc;">

<div style="padding:40% 5%;text-align:center;"> 
    
    <a class="bt"  href="http://game.apiwck.com/">
      更多游戏..
    </a>    
	<br>

    </div>
	
    

	 </div>
  </div>

	<div id="welcome" class="SHADE BOX-M">
		<div class="welcome-bg FILL"></div>
		<div class="FILL BOX-M" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:5;">
			<div style="margin:0 8% 0 9%;">
				<div style="font-size:2.6em; color:#FEF002;">暴打神经猫</div><br/>
				<div style="font-size:2.2em; color:#fff; line-height:1.5em;">被神经猫刷屏了吧<br/>30秒内看你能打爆几只神经猫</div><br/><br/>
				<div id="ready-btn" class="btn loading" style="display:inline-block; margin:0 auto; width:8em; height:1.7em; line-height:1.7em; font-size:2.2em; color:#fff;"></div>
			</div>
		</div>
	</div>

	<div id="landscape" class="SHADE BOX-M" style="background:rgba(0,0,0,.9);">
		<div class="welcome-bg FILL"></div>
		<div id="landscape-text" style="color:#fff;font-size:3em;">请竖屏玩耍</div>
	</div>



	<div id="share-wx"><p style="text-align: right; padding-left: 10px;"><img src="images/2000.png" id="share-wx-img"  style="width:100%;"></p></div>

<script type="text/javascript">
	if (isDesktop)
		document.write('</div>');
  init();
</script>


<div id=share style="display:none"><img src="http://img.tongji.linezing.com/3455448/tongji.gif"></div>

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=36313548" charset="UTF-8"></script></body>
</html>
>