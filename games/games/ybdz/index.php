<!DOCTYPE HTML>
<html>
<head>
    <title>月饼大战</title>
    <meta http-equiv="content" content="text/html" charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0;" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

<body>
<div class="bg_music">
    <audio id="bg_music" autoplay="autoplay" loop src="apple.mp3"></audio>
    <a href="javascript:;" onClick="playOrPaused(this)">播放</a>
</div>


        <div id="contentdiv">
                    <div id="startdiv">
                    <div class="start_wp"><button onClick="begin()">开始游戏</button></div>
            </div>
            <div id="maindiv">
                    <div id="scorediv">
                    <label>分数：</label>
            <label id="label">0</label>
            </div>
            <div class="sus_wp">
                    <div id="suspenddiv">
                    <button>继续</button><br/>
                    <button>重新开始</button>
            </div>
            </div>
            <div class="end_wp">
                    <div id="enddiv">
                    <p class="plantext">得分</p>
            <p id="planscore">0</p>
            <div class="btn_wp">
                    <!--<p><button class="dh_btn">兑换月饼</button></p>-->
            <p><button onClick="jixu()">再打一次</button></p>
            <p><button class="zf_bt"><b>分享朋友圈</b></button></p>
            </div>
            </div>
            </div>
            </div>
            </div>
            <div class="mask"></div>
            <div class="mooncake_wp">
                    <div class="mn_wp">
                    <a class="go_back" href="javascript:;">再打一次</a>
          
            </div>
            </div>

            <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script>
    var audio;
    $(function(){
        initAudio();
        audio.play();
    });
    var initAudio = function(){
        audio = document.getElementById('bg_music');
    };
    function playOrPaused(obj){
        if(audio.paused){
            audio.play();
            obj.innerHTML='暂停';
            obj.className='';
            return;
        }
        audio.pause();
        obj.innerHTML='播放';
        obj.className='music_pause';
    }

    $(function(){
        var _n = $(window).width()/$(window).height();
        if(_n < 1){
            $('.roll_tips').hide();
        }
        else{
            $('.roll_tips').show();
        };

        $(".fz_btn").click(function(){
            location.reload();
        });

        $(".zf_bt").click(function(){
            $(".mask").show();
        });
        $(".mask").click(function(){
            $(this).hide();
        });
        $(".dh_btn").click(function(){
            $(".mooncake_wp").show();
        });
        $(".go_back").click(function(){
            jixu();
        });
    });
</script>

<script>
    $(".zf_bt").click(function(){
        scores = $("#planscore").text();
		var mebtnopenurl = 'http://www.v918.cn/vgames';
var thegameurl ="http://www.v918.cn/vgames/games/ybdz/"; 
var guanzhuurl ="http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd";
        dataForWeixin={
            appId:"",
            MsgImg:"http://mmbiz.qpic.cn/mmbiz/2zpp2iaH4HWFokcxP1RNheFgMB3UtGvYjElQicZzOtiaXF2ib6jZPP8l87KZoKKEp4yuDN0xRsv54wRKrctSrOHfSw/640",
            TLImg:"http://mmbiz.qpic.cn/mmbiz/2zpp2iaH4HWFokcxP1RNheFgMB3UtGvYjElQicZzOtiaXF2ib6jZPP8l87KZoKKEp4yuDN0xRsv54wRKrctSrOHfSw/640",
            url:thegameurl,
            title:"我在月饼大战中得了"+scores+"分，不服来战吧！有神秘大礼哦！",
            desc:"我在月饼大战中得了"+scores+"分，赢取中秋月饼大礼包！",
            fakeid:"",
            callback:function(
                //这里是分享成功后的回调功能
                    ){}
        };
    });

    (function(){


        var onBridgeReady=function(){


            //发送给朋友


            WeixinJSBridge.on('menu:share:appmessage', function(argv){


                WeixinJSBridge.invoke('sendAppMessage',{


                    "appid":dataForWeixin.appId,


                    "img_url":dataForWeixin.MsgImg,


                    "img_width":"120",


                    "img_height":"120",


                    "link":dataForWeixin.url,


                    "desc":dataForWeixin.desc,


                    "title":dataForWeixin.title


                }, function(res){document.location.href = guanzhuurl });


            });


            //发送到朋友圈


            WeixinJSBridge.on('menu:share:timeline', function(argv){

                WeixinJSBridge.invoke('shareTimeline',{

                    "img_url":dataForWeixin.TLImg,


                    "img_width":"120",


                    "img_height":"120",


                    "link":dataForWeixin.url,


                    "desc":dataForWeixin.desc,


                    "title":dataForWeixin.title


                },function(res){document.location.href = guanzhuurl });});


            //分享到微博


            WeixinJSBridge.on('menu:share:weibo', function(argv){


                WeixinJSBridge.invoke('shareWeibo',{


                    "content":dataForWeixin.title,


                    "url":dataForWeixin.url


                }, function(res){document.location.href =guanzhuurl });


            });


            //分享到facebook


            WeixinJSBridge.on('menu:share:facebook', function(argv){


                (dataForWeixin.callback)();


                WeixinJSBridge.invoke('shareFB',{


                    "img_url":dataForWeixin.TLImg,


                    "img_width":"120",


                    "img_height":"120",


                    "link":dataForWeixin.url,


                    "desc":dataForWeixin.desc,


                    "title":dataForWeixin.title


                }, function(res){document.location.href = guanzhuurl });


            });


        };


        if(document.addEventListener){


            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);


        }else if(document.attachEvent){


            document.attachEvent('WeixinJSBridgeReady'   , onBridgeReady);


            document.attachEvent('onWeixinJSBridgeReady' , onBridgeReady);


        }


    })();
</script>



</body>
</html>