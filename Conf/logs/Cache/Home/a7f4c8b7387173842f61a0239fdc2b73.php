<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title><?php echo ($f_siteTitle); ?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>"/>
<meta name="description" content="<?php echo ($f_metaDes); ?>"/>
<script type="text/javascript">
function banner(){  
    var bn_id = 0;
    var bn_id2= 1;
    var speed33=5000;
    var qhjg = 1;
    var MyMar33;
    $("#banner .d1").hide();
    $("#banner .d1").eq(0).fadeIn("slow");
    if($("#banner .d1").length>1)
    {
        $("#banner_id li").eq(0).addClass("nuw");
        function Marquee33(){
            bn_id2 = bn_id+1;
            if(bn_id2>$("#banner .d1").length-1)
            {
                bn_id2 = 0;
            }
            $("#banner .d1").eq(bn_id).css("z-index","2");
            $("#banner .d1").eq(bn_id2).css("z-index","1");
            $("#banner .d1").eq(bn_id2).show();
            $("#banner .d1").eq(bn_id).fadeOut("slow");
            $("#banner_id li").removeClass("nuw");
            $("#banner_id li").eq(bn_id2).addClass("nuw");
            bn_id=bn_id2;
        };
    
        MyMar33=setInterval(Marquee33,speed33);
        
        $("#banner_id li").live('click',function(){
            var bn_id3 = $("#banner_id li").index(this);
            if(bn_id3!=bn_id&&qhjg==1)
            {
                qhjg = 0;
                $("#banner .d1").eq(bn_id).css("z-index","2");
                $("#banner .d1").eq(bn_id3).css("z-index","1");
                $("#banner .d1").eq(bn_id3).show();
                $("#banner .d1").eq(bn_id).fadeOut("slow",function(){qhjg = 1;});
                $("#banner_id li").removeClass("nuw");
                $("#banner_id li").eq(bn_id3).addClass("nuw");
                bn_id=bn_id3;
            }
        })
        $("#banner_id").hover(
            function(){
                clearInterval(MyMar33);
            }
            ,
            function(){
                MyMar33=setInterval(Marquee33,speed33);
            }
        )   
    }
    else
    {
        $("#banner_id").hide();
    }
}
</script>

    </head>
        
    <body>
<!--startof header-->
    

            <!--banner-->
            <div class="banner" id="banner" >
            	<div id="agin">
                <?php if($banner == ''): ?><a href="javascript:void(0)" class="d1" style="background:url(<?php echo RES;?>/images/bann.jpg) center no-repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;"></a>
                    <a href="javascript:void(0)" class="d1" style="background:url(<?php echo RES;?>/images/ban.jpg) center no-repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;"></a>
                <?php else: ?>
                    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>" class="d1" style="background:url(<?php echo ($vo["img"]); ?>) center no-repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;"></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
                <div class="d2" id="banner_id">
                    <ul id="ll">
                    </ul>
                </div>
            </div>
            <script type="text/javascript">banner()</script>
            <!--end banner-->
        
        <!--startof content-->
        <div class="contents clr">
        	<div class="chengZhang clr" style="margin-top:120px;">
            	<div class="daZi">
                	<p class="Dazi clr">功能更新进程</p>
                    <p class="Xiaozi clr">无与伦比的更新进度 让您的微信营销领先一步</p>
                </div>
                <!-- 更新进程-内容 -->
                <div class="fivePhoto">
            		<ul>
                    <div class="rendv">
                    <?php if($renew == ''): ?><li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo RES;?>/images/images/datu_03.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo RES;?>/images/images/tupian_03.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr">仿拼好货商城新版</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2015年9月6日</p>  
                            </a>
                        </li>  
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo RES;?>/images/images/datu_05.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo RES;?>/images/images/tupian_05.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr">微信签到新改版</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2013年9月2日</p>  
                            </a>
                        </li> 
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo RES;?>/images/images/datu_07.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo RES;?>/images/images/tupian_07.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr">图文投票V7.0</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2015年8月29日</p>  
                            </a>
                        </li>  
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo RES;?>/images/images/datu_09.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo RES;?>/images/images/tupian_09.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr">H5动态自定义模板</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2015年8月14日</p>  
                            </a>
                        </li>   
                        <li class="tuPian" id="ren">
                            <a href="javascript:void(0)">
                                <P class="tubiao" id="wz" style="background:url(<?php echo RES;?>/images/images/datu_11.png) no-repeat center; height:120px;"></P>
                                <P class="tubiao1" id="xz" style="background:url(<?php echo RES;?>/images/images/tupian_11.png) no-repeat center; height:120px;display:none"></P>
                                <p class="xiaoZhu clr">图文投票V6.0</p>
                                <p class="weizhi clr"></p>
                                <p class="hengXian clr"></p>
                                <p class="sixth clr">2015年8月9日</p>  
                            </a>
                        </li>          
                    <?php else: ?>
                		<?php if(is_array($renew)): $i = 0; $__LIST__ = $renew;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="tuPian" id="ren">
        	                    	<a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>">
        	                        	<P class="tubiao" id="wz" style="<?php if($vo["img_w"] == ''): ?>background:url(<?php echo ($vo["img_x"]); ?>)<?php else: ?>background:url(<?php echo ($vo["img_w"]); ?>)<?php endif; ?> no-repeat center; height:120px;"></P>
                                        <P class="tubiao1" id="xz" style="<?php if($vo["img_x"] == ''): ?>background:url(<?php echo ($vo["img_w"]); ?>)<?php else: ?>background:url(<?php echo ($vo["img_x"]); ?>)<?php endif; ?> no-repeat center; height:120px;display:none"></P>
        	                            <p class="xiaoZhu clr"><?php echo ($vo["name"]); ?></p>
        	                            <p class="weizhi clr"></p>
        	                            <p class="hengXian clr"></p>
        	                            <p class="sixth clr"><?php echo ($vo["time"]); ?></p>  
        	                        </a>
        	                    </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div> 
                    </ul>
                </div>
            </div>
            <!---->
            
            </div>
            
            <!---->
            <div class="baokuo clr">
                <div class="fuWu clr">
                    <div class="daZi">
                        <p class="Dazi clr">功能模块</p>
                        <p class="Xiaozi clr"><?php echo ($f_siteName); ?>系统内置100多项应用，涵盖近30个行业的垂直领域应用</p>
                    </div>
                    <div class="diaoYan clr">
                        <div class="diaoYtupian1 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                    <p class="beiJingtu clr"></p>
                                    <p class="words clr">微调研</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian2 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                    <p class="beiJingtu clr"></p>
                                    <p class="words clr">微信墙</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian3 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">摇一摇</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian4 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微社区</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian5 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微群发</p>
                                </div>
                            </a>
                        </div>
                        <!---->
                        <div class="diaoYtupian6 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微美容</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian7 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微健身</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian8 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微政务</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian9 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微食品</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian10 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微装修</p>
                                </div>
                            </a>
                        </div>
                        <!---->
                        <div class="diaoYtupian11 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">会员卡支付</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian12 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微城市</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian13 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微团购</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian14 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">微订餐</p>
                                </div>
                            </a>
                        </div>
                        <div class="diaoYtupian15 clr">
                            <a href="javascript:void(0)">
                            	<div class="kuangxian clr">
                                <p class="beiJingtu clr"></p>
                                <p class="words clr">超级商城</p>
                                </div>
                            </a>
                        </div>
                        <!---->
                    </div>
                    <p class="anniu clr"><a href="<?php echo U('Home/Index/fc');?>">更多功能...</a></p>
                </div>
            </div>
            <!---->
            <div class="anLie clr">
            	<div class="daZi">
                	<p class="Dazi clr">案例展示</p>
                    <p class="Xiaozi clr">深入了解我们客户的案例以及我们能做什么</p>
                </div>
                <div style="width:1050px; margin:0 auto">
                    <div class="mr_frbox">
                          <img class="mr_frBtnL prev" src="<?php echo RES;?>/images/mfrL.png" width="28" height="46" />
                          <div class="mr_frUl">
                          		<!---->
                              <div class="section">
                                    <ul class="clearfix">
                                        <?php if($case == ''): ?><li>
                                                <div class="photo"><img  src="<?php echo RES;?>/images/1_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="photo"><img  src="<?php echo RES;?>/images/2_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="photo"><img  src="<?php echo RES;?>/images/3_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="photo"><img  src="<?php echo RES;?>/images/4_03.png"></div>
                                                <div class="rsp"></div>
                                                <div class="text">
                                                    <p class="weiXin clr"><img src="<?php echo C('site_twm');?>" /></p>
                                                    <p class="chakanX clr"><a href="javascript:void(0)">查看详情</a></p>
                                                </div>
                                            </li>

                                        <?php else: ?>
                                        	<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i < 11): ?><li>
    		                                            <div class="photo"><img  src="<?php echo ($vo["img"]); ?>"></div>
    		                                            <div class="rsp"></div>
    		                                            <div class="text">
    		                                                <p class="weiXin clr"><img src="<?php echo ($vo["timg"]); ?>"  style="height:102px"/></p>
    		                                                <p class="chakanX clr"><a href="<?php if($vo["url"] == ''): ?>javascript:void(0)<?php else: echo ($vo["url"]); endif; ?>"><?php if($vo["name"] == ''): ?>微信扫一扫<?php else: echo ($vo["name"]); endif; ?></a></p>
    		                                            </div>
    		                                        </li><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
								<!---->
                                <script type="text/javascript">
									$(document).ready(function(){	
										$(".section ul li .rsp").hide();	
										$(".section	 ul li").hover(function(){
											$(this).find(".rsp").stop().fadeTo(500,0.7)
											$(this).find(".text").stop().animate({left:'0'}, {duration: 500})
										},
										function(){
											$(this).find(".rsp").stop().fadeTo(500,0)
											$(this).find(".text").stop().animate({left:'300'}, {duration: "fast"})
											$(this).find(".text").animate({left:'-300'}, {duration: 0})
										});
									});
								</script>
                          </div>
                          <img class="mr_frBtnR next" src="<?php echo RES;?>/images/mfrR.png" width="28" height="46" />
                    </div>
                    <script language="javascript">
                    $(".mr_frUl ul li img").hover(function(){$(this).css("border-color","#A0C0EB");},function(){$(this).css("border-color","#d8d8d8")});
                    jQuery(".mr_frbox").slide({titCell:"",mainCell:".mr_frUl ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:4});
                    </script>
                    </div>
                </div>
            </div>
            <!---->
            <div class="aboutUs clr">
                <div class="zhongXin clr">
                    <?php if($info == ''): ?><div class="zuoBian clr">
                            <h4>产品动态</h4>
                            <ul>
                                <li><a href="#">双应用助兴圣诞元旦双节 节日气氛嗨起</a></li>
                                <li><a href="#">一周新功能回顾之12月22日篇</a></li>
                                <li><a href="#">微助力活动上线了</a></li>
                                <li><a href="#">人气冲榜活动上线了</a></li>
                                <li><a href="#">人气冲榜活动上线了</a></li>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                            <h4>微信百科</h4>
                            <ul>
                                <li><a href="#">如何做好粉丝互动营销?</a></li>
                                <li><a href="#">朋友圈营销如何用内容去打动用户</a></li>
                                <li><a href="#">营销者看过来：微信营销全新解读</a></li>
                                <li><a href="#">微信公众号搜素排名优化方法分享</a></li>
                                <li><a href="#">细分行业行业微信运营方法谈之餐饮</a></li>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                            <h4>行业动态</h4>
                            <ul>
                                <li><a href="#">FB股价创新高：受益移动业务及Instagra</a></li>
                                <li><a href="#">我们听懂张小龙的微信八条了吗</a></li>
                                <li><a href="#">微信开启“声音登录”功能</a></li>
                                <li><a href="#">央行松绑二维码支付还得跨过三重门</a></li>
                                <li><a href="#">微信支付开大门 公众号App都可发现金红包</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                    	<div class="zuoBian clr">
                        	<h4><?php echo ($info['name1']); ?></h4>
                            <ul>
                            	<?php if(is_array($title1)): $i = 0; $__LIST__ = $title1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php if ($vo['url']){ echo ($vo["url"]); }else{ ?>index.php?g=Home&m=Index&a=about&iid=<?php echo ($vo["id"]); }?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                        	<h4><?php echo ($info['name2']); ?></h4>
                            <ul>
                            	<?php if(is_array($title2)): $i = 0; $__LIST__ = $title2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php if ($vo['url']){ echo ($vo["url"]); }else{ ?>index.php?g=Home&m=Index&a=about&iid=<?php echo ($vo["id"]); }?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="zuoBian clr">
                        	<h4><?php echo ($info['name3']); ?></h4>
                            <ul>
                            	<?php if(is_array($title3)): $i = 0; $__LIST__ = $title3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php if ($vo['url']){ echo ($vo["url"]); }else{ ?>index.php?g=Home&m=Index&a=about&iid=<?php echo ($vo["id"]); }?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div><?php endif; ?>
                </div>   
            </div>            
        <!-- footer -->
        
        
        
        <script type="text/javascript">
         window.onload=function(){
			var a = document.getElementById("agin").getElementsByTagName("a");
			var len = a.length;
			for(var i=0;i<len;i++){
				$("#ll").append("<li></li>");
			}
		}
		</script>
    </body>
</html>