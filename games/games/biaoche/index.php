
<!doctype html>
<html dir="ltr" lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
<meta name="screen-orientation" content="portrait">
<meta charset="utf-8">
<title>飙车追妹子</title>
<link rel="stylesheet" href="./static/83a3be90ad264dab/game.css">
<script>var gConfig={wxDesc:"\u6211\u8981\u9a7e\u8c6a\u8f66\u8ffd\u4e0a210\u4e2a\u59b9\u5b50\uff0c\u6253\u7834\u6700\u9ad8\u8bb0\u5f55\uff0c\u6c42\u56f4\u89c2\uff01",wxData:{appId:"",imgUrl:"http://www.v918.cn/vgames/t017bbde5550e655af3.png",link:'http://www.v918.cn/vgames/games/biaoche/index.html',desc:"",title:"\u98d9\u8f66\u8ffd\u59b9\u5b50"},activeId:"ac174b",sApi:"http://sehd.360.cn/turntable/base/draw"}</script>
</head>
<body>
<div id="main">
    <div id="guidePanel"></div>
    <div id="gamePanel">
        <div class="score-wrap">
            <div class="heart"></div>
            <span id="score">000000</span>
        </div>

        <canvas id="stage">
            <span>Browser does not support the canvas.</span>
        </canvas>
    </div>

    <div id="gameoverPanel"></div>

    <div id="resultPanel">
        <div class="weixin-share"></div>
        <a href="javascript:void(0)" class="replay">再玩一次</a>

        <div id="scoreBoard" class="panel">
            <div class="rank">
                <h4>追妹排行榜</h4>
                <ul>
                    <li class="gold">210</li>
                    <li class="silver">190</li>
                    <li class="bronze">189</li>
                </ul>
            </div>

            <div class="score-result score-1">
                <p class="tips">你木有追到一个妹纸哦~</p>
                <a href="javascript:void(0)" class="share" data-desc="我开豪车一路狂飙，被妹纸们华丽丽的无视，心塞！">向基友们求人品！</a>
            </div>
            <div class="score-result score-2">
                <p class="tips">矮油，成功追到<span>7</span>个妹纸</p>
                <a href="javascript:void(0)" class="share" data-desc="喜讯：我开豪车成功追到{x}个妹纸！吼吼，请为我点赞！">向小伙伴炫耀！</a>
            </div>
            <div class="score-result score-3">
                <p class="tips">哇噢，成功追到<span>20</span>个妹纸！<br>获得了一个爱心礼盒</p>
                <a href="javascript:void(0)" class="lottery">打开礼盒</a>
            </div>
        </div>

        <div id="prize" class="panel">
            <div class="prize-default">
                <img src="about:blank" class="random-prize"></img>
                <a href="javascript:void(0)" class="share" data-desc="我开豪车搭{x}个妹纸回家~获赠平安符，好人一生平安|我开豪车搭{x}个妹纸回家~桃花运从天而降，再接再厉">向小伙伴炫耀！</a>
            </div>
            <div id="prizeResult" class="panel">
                <div class="scroll-rst">
                    <!-- <div class="prize-content">
                        <p>恭喜您获得了（<span></span>）</p>
                        <img src="about:blank">
                        <div class="yards">兑奖码：<span></span><br><strong>请截屏保存兑奖码哦</strong></div>
                    </div>
                    <div class="intro">
                        <h2>查看优惠码使用规则</h2>
                        <div class="down"></div>
                        <p>详细兑奖规则：</p>
                        <ol>
                            <li>请及时截屏保存兑奖码，由于误操作没有保存兑奖码，将无法兑奖，一个兑奖码仅限一人使用，转发多人无效。</li>
                            <li>中国方程式大奖赛北京站地址：北京金港赛车场。</li>
                            <li>获得赛车激情体验资格的幸运网友，请在8月30日15：30前到赛场联系工作人员（手机号：18911209831）凭电子码兑票，激情体验方程式赛车15分钟。</li>
                            <li>获得赛道狂飙体验特权的幸运网友，请在8月31日8：30前到赛场联系工作人员凭电子码兑票，激情体验方程式赛道20分钟。</li>
                            <li>获得大赛普通门票的幸运网友，请在8月31日13：00前到赛场联系工作人员凭电子码兑票入场。</li>
                            <li>另外，获得“赛车激情体验资格”和“赛道狂飙体验特权”的用户，请最晚于8月29日前提供姓名、身份证号、手机号至邮箱：tuxueliang@360.cn，组委会将提前给大家购买50元保险（无保险不允许进赛道），费用由用户现场支付。</li>
                            <li>赛场详细位置如图：</li>
                        </ol>
                        <img src="./t01446f068c0ca06efa.png" class="map">
                        <a href="javascript:void(0)" class="share" data-desc="喜讯：我开豪车搭{x}个妹纸回家~成功闯入方程式大赛！"></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./lib/1102.js" ></script>
<script src="./static/ba89b0f0490cebba/jquery-md5-1.2.1.js" ></script>
<script src="./static/d644f4156b92b763/Game.js" ></script>
<script src="./static/cbb66382ea62c0cb/cookie.js" ></script>
<script src="./static/d75c975aec34b3b2/weixin-api.js" ></script>
<script src="./static/2af522d526e9fb8d/iscroll.js" ></script>
<script src="./static/aef84362543b5a7a/resource.js" ></script>
<script src="./static/f2479112e123da44/main.js" ></script>
</body>
</html>