<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0">
<title>小青蛙过河</title>
       <style>
            div,p,span,img {display: inline-block;}
            body{text-align: center;background: -webkit-gradient(radial, center center, 620, center center, 10, from(#bbb), to(#f7f7f7) );padding: 0 0 0 0;}
            .box{overflow:hidden; margin: 10px;width:300px;min-height: 44px;background: #fafafa;border: #aaa solid 1px;border-radius: 5px;}
            .text_info{width: 100%;}
            .text_info p{font-size: 16px;line-height: 18px;color: #505050;padding:10px;display: block;}
            .text_info img{max-width:300px;height: auto;}
            .weather{position: relative;width: 100%;height: 180px;overflow: hidden;}
            .weather p{color: #303030;font-size: 14px;margin: 0;left: 10px;text-align: center;text-shadow: #fff 0 1px 0;position: absolute;}
            p.icon {position: relative;width: 100%;height: 100%;left: 0px;}
            p.icon img {width: auto;height: 180px;position: absolute;}
            p.icon img.day{left:-15px;top:-40px;}
            p.icon img.night{right:-25px;bottom:-30px;opacity: 0.9;}
            p.info{top: 15px;font-size: 45px;}
            p.temp{top: 65px;font-size: 18px;}
            p.temp span{font-size: 24px;}
            p.kongzhi{top: 105px;font-size: 18px;}
            p.city{bottom: 10px;left: auto;right: 10px;}
            #infotext{width: 260px;color: #808080;font-size: 14px;padding: 0;margin: 10px 0 10px 20px;text-align: right;}
            #loading{width: 260px;font-weight: bold;color: #505050;font-size: 24px;padding: 0;margin: 60px 0 0 40px;}
            #loading a{color: #505050;}
            .ad_info{text-align: center;text-shadow: rgba(0, 0, 0, 0.5) 0 -3px 30px;font-size: 16px;color: #888;padding:5px 0 5px 0;width: 100%;margin:0;}
            .ad_info a{width:100px;margin: 0;color: #505050;background: #fafafa;
                       background: -webkit-gradient(linear, 0 0, 0 100%,from(#f9f9f9),to(#ffffff));
                       border: #aaa solid 1px;border-style: solid solid solid none;padding: 4px 0px;
                       font-size: 14px;text-shadow: #fff 0 1px 0;text-decoration: none;float: left;
                       border-radius: 0;font-weight: bolder;position:relative;display: inline-block;}
            .ad_info a span{padding: 7px 0 7px 22px;background-repeat: no-repeat;background-position: left center;background-size: 20px 20px;line-height:18px;}
            a.right{border-radius: 0 22px 22px 0;border-style: solid solid solid none;}
            a.left{border-radius: 22px 0 0 22px;border-style: solid;}
            a.one{border-radius: 22px;border-style: solid;padding: 4px 15px;}
            .ad_info a:ACTIVE{background:-webkit-gradient(linear,0 0,0 100%, from(rgb(198, 40, 0)),to(rgb(128, 30, 0)));color: #e0e0e0;text-shadow:rgba(0, 0, 0, 0.75) 0 -1px 0;}
            a.download{padding: 4px 0px 4px 4px;}
            .hideshare{position: absolute;top:45px;left:-5px; height: 0px;width: 0px;display: inline-block;}
            .new{position:absolute;background: -webkit-gradient(linear,50% 20%,50% 80%,from(#faa),to(#e00));
                 padding:0px 3px;border-radius:18px;right:-5px;font-weight:bolder;top:-15px;line-height: 18px;
                 color:#fff;text-shadow:rgba(0,0,0,0.7) 0 -1px 0;border: #fff 2px solid;box-shadow:#000 0 1px 2px;z-index: 100;}
            </style>
<script type="text/javascript" src="http://www.v918.cn/vgames/" charset="UTF-8"></script>
    <script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('showOptionMenu');
});
new Image().src = 'http://www.v918.cn/vgames/';
       function isua(str) {
                return navigator.userAgent.match(str);
            }
            var isIphone = isua(/^(.*)(ipod|iphone|ipad)(.*)/i);
            var isMac = isua(/^(.*)(Macintosh)(.*)/i);
            var isAndroid = isua(/^(.*)(android)(.*)/i);
            function trackEvent(event) {
                _hmt.push(['_setCustomVar', 1, 'share_page', ((isIphone || isMac) ? 'iphone_' : 'android_') + event, 1]);
                //_hmt.push(['_trackEvent','share_page',event]);
            }
            function setCookie(c_name, value, exdays) {
                var exdate = new Date();
                exdate.setDate(exdate.getDate() + exdays);
                var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
                document.cookie = c_name + "=" + c_value
            }
            function getCookie(name) {
                var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
                if (arr != null)
                    return unescape(arr[2]);
                return null
            }
            var qingwa = function() {
                var l = 'leftqw';
                var r = 'rightqw';
                var maxqw = 6;
                var maxmove = 2;
                function setdock(list) {
                    var dlist = $('.game_box .dock');
                    for (var i = dlist.length; i <= maxqw; i++)
                        $(".game_box").append('<div class="dock"><div class="qw"></div></div>');
                    dlist = $('.game_box .dock');
                    for (var i = 0; i < list.length; i++) {
                        var d = $(dlist[i])
                        d.attr('class', 'dock');
                        d.addClass(list[i]);
                    }
                    var qw = $('.dock .qw');
                    var s = {'class': 'qw', 'height': qw.height()};
                    qw.attr(s);
                }
                function reset() {
                    setdock([l, l, l, 0, r, r, r]);
                    $('#game .share_rank,.share_waring').hide();
                    clearTimer();
                }
                reset();

                var dlist = $('.game_box .dock');
                function isnulldock(i) {
                    if (i < 0 || i > maxqw)
                        return false;
                    return !getDockList()[i];
                }
                function getDockList() {
                    var list = [];
                    for (var i = 0; i < dlist.length; i++) {
                        var t = $(dlist[i]);
                        var c = 0;
                        if (t.hasClass(l))
                            c = l;
                        else if (t.hasClass(r))
                            c = r;
                        list[i] = c;
                    }
                    return list;
                }
                var fuck_365Rili = function(e) {
                    var t = $(this);
                    var isleft = false;
                    if (t.hasClass(l))
                        isleft = true;
                    else if (t.hasClass(r)) {
                    } else
                        return;

                    var index = 0;
                    for (; index < dlist.length; index++) {
                        if (dlist[index] == this)
                            break;
                    }
                    var move = 0;
                    if (isleft)
                        for (var i = 1; i <= maxmove; i++) {
                            if (isnulldock(index + i)) {
                                move = i;
                                break;
                            }
                        }
                    else
                        for (var i = -1; i >= 0 - maxmove; i--) {
                            if (isnulldock(index + i)) {
                                move = i;
                                break;
                            }
                        }
                    if (!move)
                        return;
                    var list = getDockList();
                    list[index] = 0;
                    index += move;
                    list[index] = isleft ? l : r;
                    setdock(list);
                    var d = $(dlist[index]).find('.qw');
                    d.addClass((isleft ? 'leftanim' : 'rightanim') + Math.abs(move));


                    //var frog_sound = $('#frog_sound')[0];
                    //frog_sound.play();
                };
                var startDate = new Date();
                var palyTimer = 0;
                function clearTimer() {
                    clearInterval(palyTimer);
                    palyTimer = 0;
                    $('.game_time').hide();
                }
                function win() {
                    var list = getDockList();
                    for (var i in list) {
                        var t = list[i];
                        if (i <= 2) {
                            if (t != r)
                                return;
                        } else if (i == 3) {
                            if (t != 0)
                                return;
                        } else if (i <= 6) {
                            if (t != l)
                                return;
                        }
                    }
                    clearInterval(palyTimer);
                    $('#game .share_rank').show();
                    $('.win_info').html('哇!你用了<span style="color:#f30">' + getUserTime() + '</span>通过了游戏,赶快分享到朋友圈，和朋友们PK一下吧！');
					$('#infos').html('哇!我用了' + getUserTime() + '通过了小青蛙过河，求超越!');
                    var g = $('.share_rank .g_sharebtn');
                    var title = getUserTime() + '!青蛙过河!智商大挑战!我仅用了' + getUserTime() + ',快来挑战!';
                    window.shareData.tTitle = title;
                    g.attr({'d-title': title});
                    document.title = title;
                    $('.game_time').text('用时: ' + getUserTime());
                    g.click(shareToFriend);
                    setCookie('qingwa_game_share', 'ok', 100000)
                }
                var s = $(".sharebtn,.g_sharebtn");
                s.attr({'d-title': '小青蛙过河!智商大挑战!敢来挑战吗?',
                    'd-link': '',
                    'd-desc': '',
                    'd-img': ''});
                s.unbind();
                s.click(function() {
                    this.share = shareToFriend;
                    this.share(function(co) {
                        if (co) {
                            setCookie('qingwa_game_share', 'ok', 100000)
                            $(".share_waring").hide();
                        }
                    });
                });
                function getUserTime() {
                    var time = (+new Date() - startDate) / 1000;
                    return time.toFixed(2) + '秒';
                }
                var click_qw = function() {
                    if (!palyTimer) {
                        reset();
                        startDate = +new Date();
                        palyTimer = setInterval(function() {
                            $('.game_time').text('用时: ' + getUserTime());
                        }, 601);
                        $('.game_time').show();
                    }
                    this.fuck_365Rili = fuck_365Rili;
                    this.fuck_365Rili();
                    setTimeout(win, 350)
                };
                dlist.live({'touchend': click_qw, 'mouseup': click_qw});
                $('#replay').click(reset);

                var autoplay = 0;
                var autoA = [3, 5, 6, 4, 2, 1, 3, 5, 7, 6, 4, 2, 3, 5, 4];
                var autoB = [5, 3, 2, 4, 6, 7, 5, 3, 1, 2, 4, 6, 5, 3, 4];
                var auto;
                function autojump() {
                    if (autoplay < auto.length) {
                        var s = dlist[auto[autoplay] - 1];
                        s.fuck_365Rili = fuck_365Rili;
                        s.fuck_365Rili();
                    } else {
                        clearTimer();
                        //win();
                    }
                    autoplay++;
                }
                $('#autoplayA,#autoplayB').click(function() {
                    auto = $(this).attr('id') == 'autoplayA' ? autoA : autoB;
                    reset();
                    autoplay = 0;
                    palyTimer = setInterval(autojump, 750);
                    autojump();
                });
            };

            function shareToFriend(res_fun) {
                var b = $(this);
                if (!res_fun || typeof res_fun != 'function')
                    res_fun = function(e) {
                    };
                var d = {"title": b.attr('d-title'), "link": b.attr('d-link'), "desc": b.attr('d-desc'), "img_url": b.attr('d-img')};
                try {
                    WeixinJSBridge.invoke('shareTimeline', d, function(res) {
                        WeixinJSBridge.log(res.err_msg);
                        // alert('分享状态'+res.err_msg);
                        if (res.err_msg == 'share_timeline:confirm' || res.err_msg == 'share_timeline:ok') {
                            res_fun(true);
                        } else {
                            res_fun(false);
                        }
                        trackEvent('weixin_' + res.err_msg);
                    });
                } catch (e) {
                    res_fun(false);
                }
            }
            function setShareButton(t, d, l, i) {
                var share = $('.sharebtn');
                share.click(shareToFriend);
                setTimeout(function() {
                    doSetShareButton(t, d, l, i)
                }, 1500);
            }
            function doSetShareButton(t, d, l, i) {
                var sub = $('.subscribe');
                var share = $('.sharebtn');
                share.attr({'d-title': t, 'd-desc': d, 'd-link': l, 'd-img': i});
                share.hide();
                if (typeof WeixinJSBridge != "undefined" || location.host == "test.iweek.me") {
                    sub.show();
                    if (t || l)
                        share.show();
                }
                var link = $('.ad_info_content a:visible');
                link.removeClass('one');
                link.removeClass('left');
                link.removeClass('right');
                if (link.length != 1) {
                    $(link[0]).addClass('left');
                    $(link[link.length - 1]).addClass('right');
                } else
                    link.addClass('one');
            }
            var iweek_share_page = function() {
                var reminds = null;
                var weather = "";
                function setText(text, id) {
                    $('#' + id).html(text);
                }
                var loadi = 0;
                var loading = function() {
                    var texts = ['', '.', '. .', '. . .', '. . . .', '. . . . .',
                        '. . . . .', '', ''];
                    setText("请稍等 " + texts[loadi], "loading");
                    loadi++;
                    if (loadi > 7)
                        loadi = 0;
                };

                function load_text() {
                    var t = '';
                    t = getQuery('text');
                    var b = $('.box');
                    b.html('<div class="text_info">' + t + '</div>');
                }
                function getQuery(n) {
                    if (n == 'text') {
                        return "";
                    } else {
                        var hide = "";
                        if (hide.length)
                            return hide;
                    }
                    return '';
                }
                function load() {
                    $(document).ready(function() {
                        setTimeout(function() {
                            load_text();
                            qingwa();
                        }, 500);
                    });
                }
                load();
            }();
			
            document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            	var domains = ['app.wenzhangku.com/','http://www.v918.cn/vgames/'];
            	var domain = domains[new Date().getTime()%4];
                window.shareData = {
                    "imgUrl": "./460.jpg",
                    "timeLineLink": "http://www.v918.cn/vgames/qingwa/",
                    "tTitle": "经典的小青蛙过河",
                    "tContent": "一款很经典的过河游戏。7块石头，6只青蛙要过河，最终3只公的和3只母的换个位置和方向。"
                };
                WeixinJSBridge.on('menu:share:appmessage', function(argv) {
                    WeixinJSBridge.invoke('sendAppMessage', {
                        "img_url": window.shareData.imgUrl,
                        "link": window.shareData.timeLineLink,
                        "desc": window.shareData.tContent,
                        "title": window.shareData.tTitle
                    }, function(res) {
                        _report('send_msg', res.err_msg);
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
                        _report('timeline', res.err_msg);
                    });
                });


                WeixinJSBridge.on('menu:share:weibo', function(argv) {
                    WeixinJSBridge.invoke('shareWeibo', {
                        "content": window.shareData.tContent,
                        "url": window.shareData.timeLineLink,
                    }, function(res) {
                        _report('weibo', res.err_msg);
                    });
                });
            	
            }, false)
            

      </script>
	    <style>
            #game div,#game {
                display: inline-block;
            }

            #game {
                width: 320px;
                height: 300px;
                position: relative;
				padding: 0 0 10px 0;
				border-bottom: 1px solid #DCDCDC;
				margin:0 auto;
				display: block;
            }
            #game .bg {
                width: 320px;
                height: 260px;
                background: #ccc;
                position: absolute;
                top: 0px;
                left: 0px;
                background:url(2000.jpg);
                background-size:100% auto;
            }
            #game .game_box{
                position: absolute;
                height:40px;
                bottom:55px;
                left:1%;
                width: 100%;
            }
            #game .game_time{
                position: absolute;
                color:white;
                font-size: 12px;
                padding:3px 5px;
                right: 15px;
                top: 45px;
                border-radius: 10px;
                background:rgba(0,0,0,0.5);
            }
            #game .power{
                position: absolute;
                font-size: 10px;
                color:#FFFFFF;
                text-decoration:none;
                width:150px;
                z-index:9999;
                right: 0px;
                text-align:right;
                top: 303px;
                border-radius: 10px;
            }
            .power a{ text-decoration:none; color:#FFF;}
            #game .dock{
                position: relative;
                height: 29px;
                width: 14%;
                background:url("1.png") no-repeat;
                background-size:35px auto;
                background-position:5px 0%;
            }
            #game .qw{
                width:100%;
                height:45px;
                position: absolute;
                bottom: 130%;
                left: 3px;
                -webkit-animation-duration: 0.3s;
                -webkit-animation-iteration-count: 1; 
                -webkit-animation-timing-function: linear;
            }

            #game .leftqw .qw,#game .rightqw .qw{
                background:url("2.png") no-repeat;
                position: relative;
                background-size:300% auto;
            }
            #game .rightqw .qw{
                background-position: 0 100%;
            }

            #game .handle{
                position: absolute;
                height:40px;
                bottom:11px;
                left:0px;
                width: 100%;
            }
            #game .g_button{width:159px;height:40px;margin: 0;color: #505050;background: #fafafa;
                            float:left;font-size: 14px;line-height:40px;text-shadow: #fff 0 1px 0;
                            text-align:center;
                            border-radius: 0;font-weight: bolder;position:relative;display:inline-block;}
            .rightborder{
                border:#888 1px;
                border-style:none solid none none;
            }
            @-webkit-keyframes rightanim1{
                0% {-webkit-transform:translate(100%,0);background-position:100% 100%;}
            15%{background-position:100% 100%;}
            15.1%{background-position:50% 100%;}
            50% {-webkit-transform:translate(50%,-40%);background-position:50% 100%;}
            75%{background-position:50% 100%;}
            75.1%{background-position:0 100%;}
            100% {-webkit-transform:translate(0,0);background-position: 0 100%;}
            }
            .rightanim1{
                -webkit-animation-name: rightanim1;
            }
            @-webkit-keyframes rightanim2{
                0% {-webkit-transform:translate(200%,0);background-position:100% 100%;}
            15%{background-position:100% 100%;}
            15.1%{background-position:50% 100%;}
            50% {-webkit-transform:translate(100%,-110%);background-position:50% 100%;}
            75%{background-position:50% 100%;}
            75.1%{background-position:0 100%;}
            100% {-webkit-transform:translate(0,0);background-position: 0 100%;}
            }
            .rightanim2{
                -webkit-animation-name: rightanim2;
            }
            @-webkit-keyframes leftanim1{
                0% {-webkit-transform:translate(-100%,0);background-position:100% 0;}
            15%{background-position:100% 0;}
            15.1%{background-position:50% 0;}
            50% {-webkit-transform:translate(-50%,-40%);background-position:50% 0;}
            75%{background-position:50% 0;}
            75.1%{background-position:0 0;}
            100% {-webkit-transform:translate(0,0);background-position: 0 0;}
            }
            @-webkit-keyframes leftanim2{
                0% {-webkit-transform:translate(-200%,0);background-position:100% 0;}
            15%{background-position:100% 0;}
            15.1%{background-position:50% 0;}
            50% {-webkit-transform:translate(-100%,-110%);background-position:50% 0;}
            75%{background-position:50% 0;}
            75.1%{background-position:0 0;}
            100% {-webkit-transform:translate(0,0);background-position: 0 0;}
            }
            .leftanim1{
                -webkit-animation-name: leftanim1;
            }
            .leftanim2{
                -webkit-animation-name: leftanim2;
            }
            #game .boss{
                position: absolute;
                width: 80%;
                left:5%;
                top:15%;
                font-size:12px;
                color: #888;
                line-height: 18px;
            }
            #game .share_rank,#game .share_waring{
                position: absolute;
                width: 100%;
                height: 320px;
                text-align: center;
            }
            #game .mask{
                width: 100%;
                height: 100%;
                background: #fff;
                position: absolute;
                left:0;
                top:0;
                opacity:0.8;
            }
            #game .win_info{
                position: absolute;
                width: 80%;
                left: 5%;
                top:30%;
                background: #fff;
                border: #AAA solid 1px;
                color: #505050;
                border-radius:5px;
                padding:10px 5%;
                box-shadow:rgba(0,0,0,0.8) 0 0 10px;
            }
            .frend_sharebtn span{
                font-size:18px;
                color: #f00;
                padding-left:20px;
                font-weight: bolder;
                background:url(3.png) center right no-repeat;
                height:29px;
            }
            #game .frend_sharebtn{
                position: fixed;
                right:3px;
                top:3px;
                box-shadow:rgba(0,0,0,0.8) 0 0 30px;
                color: #505050;
                background: #FAFAFA;
                border: #fff solid 1px;
                padding: 15px;
                font-size: 16px;
                text-shadow: white 0 1px 0;
                text-decoration: none;
                float: left;
                border-radius: 0;
                font-weight: bolder;
                border-radius:3px;
                z-index: 101;
				width:100%;
            }

        </style>


</head>
<body>

        <div id="game">
            <div class="bg"></div>
            <div class="game_time" style="display: none;"></div>
            <div class="power"></div>
            <div class="game_box"><div class="dock leftqw"><div class="qw" height="45"></div></div><div class="dock leftqw"><div class="qw" height="45"></div></div><div class="dock leftqw"><div class="qw" height="45"></div></div><div class="dock"><div class="qw" height="45"></div></div><div class="dock rightqw"><div class="qw" height="45"></div></div><div class="dock rightqw"><div class="qw" height="45"></div></div><div class="dock rightqw"><div class="qw" height="45"></div></div></div>
            <div class="handle"><div class="g_button rightborder" id="replay">重新开始</div>
                <div class="g_button" id="autoplayA">查看正确答案</div>
            </div>
            <div class="share_waring" style="display: none;">
                <div class="mask"></div>
                <div class="win_info">哇!你用了<span style="color:#f30"></span>解开了游戏,赶快跟朋友挑战!</div>
                <a class="g_sharebtn" href="javascript:void(0);" d-title="小青蛙过河!智商大挑战!敢来挑战吗?" ><span>分享</span></a>
            </div>
            <div class="boss">游戏规则:<br>1.点击青蛙跳动<br>2.青蛙不能向后跳,最多只能跳过1个青蛙.<br>3.使左右两边青蛙交换位置即可胜利!</div>
            <div class="share_rank" style="display: none;">
                <div class="mask"></div>
                <div class="win_info">哇!你用了<span style="color:#f30"></span>解开了游戏,赶快跟朋友挑战!</div>
                <a class="frend_sharebtn" href="javascript:void(0);">点击上面的按钮分享给朋友 <span>　　</span> </a>
            </div>
            
        </div>

<div id="infos" style="color: #505050;font-size: 14px;text-shadow: #fff 0 1px 0;text-align: center;font-weight: bolder;margin:20px auto;"><a href="http://www.dwz.cn/qZ3Ug" style="color: #505050;text-decoration:none;">关注我们，点这里！</a></div>
    
<a href="http://www.v918.cn/vgames/" style="color: #505050;text-decoration:none;">想玩更多游戏，点这里！</a>
<script type="text/javascript" src="http://tajs.qq.com/stats?sId=36313548" charset="UTF-8"></script></body>
</html>
