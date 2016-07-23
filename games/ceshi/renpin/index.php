
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<title>测测你的人品值多少钱</title>
<meta name="keywords" content="测测你的人品值多少钱" />
<meta name="description" content="测测你的人品值多少钱" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jQueryRotate.2.2.js"></script>
<script type="text/javascript" src="jquery.easing.min.js"></script>
<link rel="stylesheet" href="zp.css" />
<style>
#disk{background:url(wenzhangku.gif) no-repeat }
</style>

<script type="text/javascript">
var info=new Array()
info[0]="1毛钱"
info[1]="五万两黄金"
info[2]="1000万"
info[3]="817193891元"
info[4]="300万美元"
info[5]="1亿人民币"
info[6]="10万人民币"
info[7]="5000元"
info[8]="599万"
info[9]="100元"
info[10]="900万"
info[11]="数百亿"


function choujiang(){
	if($("#name").val()==""){
		alert("请输入名字");
		$("#name").focus();
		return false;
	}
	
	$.post("do.php", { name: $("#name").val()},function(data){
		var a = data*30+15;
		$("#startbtn").rotate({
			duration:6000,
			angle: 0, 
			animateTo:2880+a,
			easing: $.easing.easeOutSine,
			callback: function(){
							
				var infos="'"+$("#name").val()+"'的人品值"+info[data]+"。";
				$(document).attr('title',infos+"测测你的人品值多少钱");
				var infos="<font color=orange><b>【测试结果】</b></font><br />"+infos;
				$("#tip").html(infos);
				$("#info").css({display:""});
			}
		});
				 
	});
				 
}

function retry(){
	$("#info").css({display:"none"});
}

</script>
</head>

<body>



<div id="main">
	<h1>测测你的人品值多少钱</h1>


   <div class="demo">
        <div id="disk"></div>
        <div id="start"><img src="start.png" id="startbtn" onClick="choujiang()"></div>
   </div>

	<div class="shuru">请输入您的名字：<input value="" id="name"></div>
   
</div>

<div id="info" style="display:none;">
	<div id="tip"></div>
	
	<div class="retry">
	<button onClick="retry()">重新测试</button>
	<button onClick="location.href='http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd'">关注我们</button>
	　<button onclick="location.href='http://www.v918.cn/vgames/'">更多好玩测试</button>
	</div>

</div>


<div id="footad">
	</div>


<div class="more_test_list" id="more_test">
<dt><h2>↓ 更多好玩测试 ↓</h2></dt>
<dd><a href="../huihuang/"><li>测测你一生中最辉煌的年龄</li></a><a href="../nianxin/"><li>测测年薪多少才配得上你？</li></a><a href="../kaiche/"><li>测你五年内会开什么车</li></a><a href="../tiansheng/"><li>测测你天生是什么命</li></a><a href="../qianshi/"><li>测测你前世是什么人</li></a><a href="../chuanyue/"><li>穿越回古代你会是谁？</li></a><a href="../ceo/"><li>测你会成为哪家公司总裁。</li></a><a href="../qianshi/"><li>测测你前世是什么人</li></a></dd>
</div>

<footer style="margin-top:10px; font-size:10px; color:#bbb; text-align:center;">
郑重承诺：本页面为纯静态HTML制作，绝不收集任何用户信息!
</footer>

<textarea id="adhtml" style="display:none">
	
<button onClick="location.href='http://mp.weixin.qq.com/s?__biz=MjM5MTYzNTg1MA==&mid=200926016&idx=1&sn=e48ddb1d423728fd30cf174f382dd932#rd'">关注我们</button>
<button onClick="location.href='http://www.v918.cn/vgames/'">智力游戏</button>
	</textarea>


<script>
	infos=$("#adhtml").val();
	$("#footad").append(infos);
	</script>
<div style="display:none">
<script language="javascript" type="text/javascript" src="http://js.users.51.la/15858550.js"></script>
</div>

</body>
</html>
