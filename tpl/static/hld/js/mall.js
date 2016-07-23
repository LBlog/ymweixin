//点击出现分类
$(function () {
    $('.shop_tab li:first-child').live('click', '', function () {
        $('.list1').stop().animate({'left': '0'}, 500);
        $('.screen').fadeIn(500);
    });
    $('.list1 li').live('click', '', function () {
        $(this).addClass('on').siblings().removeClass('on');
        $('.list2').stop().animate({'left': '33%'}, 500);
    });
    $('.list2 li').live('click', '', function () {
        $(this).addClass('on').siblings().removeClass('on');
        $('.list3').stop().animate({'left': '66%'}, 500);
    });
    $('.screen').live('click', '', function () {
        $('.hide_list').stop().animate({'left': '-100%'}, 500);
        $(this).fadeOut(500);
    });
});
//点击出现分类
$(function () {
    $('.level2').live('click', '', function () {
        var that = this;
        var id = $(that).attr('id');
        var data = {id: id};
        var html = '';
        $.ajax({
            type: 'post',
            url: "?g=Hld&m=Mall&a=ajaxlevel2",
            async: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                $(".list2").html('<div><a href="javascript:void(0)" class="all2" >全部</a></div>');
                $(".list3").html('');
                if (data.status) {
                    $.each(data.data, function (i, item) {
                        html = html + '<li><a class="level3" href="javascript:void(0)" id="' + item.id + '" >' + item.name + '</a></li>';
                    })
                }
                $(".list2").append(html);
            }
        });
    });
});

//点击出现分类
$(function () {
    $('.level3').live('click', '', function () {
        var that = this;
        var id = $(that).attr('id');
        var data = {id: id};
        var html = '';
        $.ajax({
            type: 'post',
            url: "?g=Hld&m=Mall&a=ajaxlevel3",
            async: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                $(".list3").html('<div><a href="javascript:void(0)" class="all3" >全部</a></div>');
                if (data.status) {
                    $.each(data.data, function (i, item) {
                        html = html + '<li><a class="level4" href="javascript:void(0)" id="' + item.id + '" >' + item.name + '</a></li>';
                    })
                }

                $(".list3").append(html);
            }
        })
    })

})



$(function () {
    //等级1的(左侧)全部选择动作
    $('.all1').live('click', '', function () {
        var id = $('.list1').find('.getid').val();     //获取所选的类型id
        var name = $('.list1').find('.getname').val(); //获取所选的类型名称
        var way = $('.lasttype').val();			//获取所选得排序方式
        $('.lastid').val(id);                           //把所选的类型id上传到顶部hidden表单中
        $('.lastname').val(name);			//把所选的类型name上传到顶部hidden表单中
        $('#last').html('<a href="javascript:void(0)">' + name + '</a>');                           //改变顶部表单的名称
        $(".method").val('');
        //todo函数										
        showgoods(id, way);//ajax 产生商品
        $('.hide_list').stop().animate({'left': '-100%'}, 500);
        $('.screen').fadeOut(500);								//消除页面上的拉出框
    })

    //等级2的(中间)全部选择动作
    $('.all2').live('click', '', function () {
        //首先观察等级1选择了什么
        var li = $(".list1").find(".on");
        var id = $(li).find('.level2').attr('id');
        var name = $(li).find('.level2').html();
        var way = $('.lasttype').val();					//获取所选得排序方式
        $('.lastid').val(id);                           //把所选的类型id上传到顶部hidden表单中
        $('.lastname').val(name);
        $('#last').html('<a href="javascript:void(0)">' + name + '</a>');
        $(".method").val('');
        //todo函数												//ajax 产生商品
        showgoods(id, way);
        $('.hide_list').stop().animate({'left': '-100%'}, 500);
        $('.screen').fadeOut(500);								//消除页面上的拉出框
    });
    //等级3的(右边)全部选择动作
    $('.all3').live('click', '', function () {
        //首先观察等级2选择了什么
        var li = $(".list2").find(".on");
        var id = $(li).find('.level3').attr('id');
        var name = $(li).find('.level3').html();
        var way = $('.lasttype').val();					//获取所选得排序方式
        $('.lastid').val(id);                           //把所选的类型id上传到顶部hidden表单中
        $('.lastname').val(name);
        $('#last').html('<a href="javascript:void(0)">' + name + '</a>');
        $(".method").val('');
        //todo函数												//ajax 产生商品
        showgoods(id, way);
        $('.hide_list').stop().animate({'left': '-100%'}, 500);
        $('.screen').fadeOut(500);								//消除页面上的拉出框

    });

    $('.level4').live('click', '', function () {
        var id = $(this).attr('id');
        var name = $(this).html();
        var way = $('.lasttype').val();					//获取所选得排序方式	
        $('.lastid').val(id);                           //把所选的类型id上传到顶部hidden表单中
        $('.lastname').val(name);
        $('#last').html('<a href="javascript:void(0)">' + name + '</a>');
        $(".method").val('');
        //todo函数  ajax 产生商点
        showgoods(id, way);
        $('.hide_list').stop().animate({'left': '-100%'}, 500);
        $('.screen').fadeOut(500);								//消除页面上的拉出框

    });
    $('.chosetype').live('click', '', function () {
        var way = $(this).parent().attr('id');   //获取所选得排序方式	
        var id = $('.lastid').val();  			 //获取所选得类型
        $(".method").val(1);		 //把最新所选的排序方式上传到顶部hidden表单中
        $('.lasttype').val(way);  //把所选的排序方式上传到顶部hidden表单中
        //todo函数  ajax 产生商点
        showgoods(id, way);

    });
    $('.showmore').live('click', '', function () {
        var next = $(this).attr('id');
        var lng = $(".lng").val();
        var lat = $(".lat").val();
        if (next != 1) {
            layer.open({
                content: '没有更多了...',
                time: 2
            });
            $("#span").html('没有更多了...');
            return false;
        } else {
            var page = $('#page').val();
            var page_size = $('#page_size').val();
            var type = $('.lastid').val();  //选择商店类型
            var way = $('.lasttype').val();  //选择商店类型
            //var data={page:page,page_size:page_size,type:type,way:way};
            var data = {id: type, page: page, page_size: page_size, type: type, way: way, lng: lng, lat: lat};
            console.log(data);
            $.ajax({
                type: 'post',
                url: "?g=Hld&m=Mall&a=ajax_showmore",
                data: data,
                dataType: 'json',
                success: function (data) {
                    //	console.log(data);
                    //	return false;
                    var method = $('.method').val();
                    if (method) {
                        if (way == 1) {
                            $('#last,2').removeClass('on');
                            $("#1").addClass('on');
//                            $("#2").removeClass('on');
                        } else if (way == 2) {
                            $('#last,1').removeClass('on');
//                            $("#1").removeClass('on');
                            $("#2").addClass('on');
                        }
                    } else {
                        $('#last').addClass('on');
                        $("#1,2").removeClass('on');
//                        $("#2").removeClass('on');
                    }


                    if (!data.status) {
                        layer.open({content: '加载失败,请刷新后重试!', time: 2});
                    } else {
                        var html = '';
                        var msg = data.msg;
                        var next = data.next;
                        var page = data.page;
                        $("#page").val(page);
                        $("#spn").html(msg);
                        $(".showmore").attr('id', next);
                        $.each(data.data, function (id, item) {
//                            html = html +
//                                    '<div class="hei10"></div><li>' +
//                                    '<p class="texR c999 font13">距您' + item.dis + '公里 积分' + item.per + '</p>' +
//                                    '<a href="?g=Hld&m=Mall&a=shop_det&id=' + item.id + '" class="clearfix">' +
//                                    '<img src="' + item.image + '" width="50px" height="100px" class="fl radius5"/>' +
//                                    '<h2 class="font14 c333">' + item.title + '</h2>' +
//                                    '<h3 class="font13 c666">' + item.sum + '...</h3>' +
//                                    '</a>' +
//                                    '<p class="texL c999 font13">地址：' + item.addr + '</p>' +
//                                    '</li>';
                            html = html +
                                    '<li><a href="?g=Hld&m=Mall&a=shop_det&id=' + item.id + '">' +
                                    '<img src="' + item.image + '" width="90%"/>' +
                                    '<div class="clearfix c333 pLR5 mT5"><font class="font14">' + item.title + '</font><font style="padding-right: 5%;" class="fr font13 c999">' + item.dis + 'km积分返还' + item.per + '%</font></div>' +
                                    '<p class="font13 c999 pLR5 mB5">地址：' + item.addr + '</p>' +
                                    '</a></li><div class="hei10"></div>';
                        });
                        $('#shop_list').append(html);
                    }
                }
            })
        }
    });
})

//由获取的类型id name 来处理页面 ajax 产生商品
function showgoods(id, way) { //如果在这里给type 一个默认值(=0),好像手机就没法点击了 method确定点击的是第一个tab(0) 还是后两个tap(1)
    var page = $('#page').val();
    var page_size = $('#page_size').val();
    var lng = $(".lng").val();
    var lat = $(".lat").val();
    var method = $('.method').val();
    console.log(method);
    if (method) {
        if (way == 1) {
            $('#last,2').removeClass('on');
            $("#1").addClass('on');
//            $("#2").removeClass('on');
        } else if (way == 2) {
            $('#last,1').removeClass('on');
            $("#1").removeClass('on');
//            $("#2").addClass('on');
        }
    } else {
        $('#last').addClass('on');
        $("#1,2").removeClass('on');
//        $("#2").removeClass('on');
    }

    var data = {id: id, page: page, page_size: page_size, type: id, way: way, lng: lng, lat: lat};

    var html = "";
    $.ajax({
        type: "post",
        url: "index.php?g=Hld&m=Mall&a=ajax_show_mall",
        data: data,
        dataType: 'json',
        success: function (data) {
            var method = $('.method').val();
            if (method) {
                if (way == 1) {
                    $('#last,2').removeClass('on');
                    $("#1").addClass('on');
//                    $("#2").removeClass('on');
                } else if (way == 2) {
                    $('#last,1').removeClass('on');
//                    $("#1").removeClass('on');
                    $("#2").addClass('on');
                }
            } else {
                $('#last').addClass('on');
                $("#1,2").removeClass('on');
//                $("#2").removeClass('on');
            }

            if (data.status == 0) {
//                alert('该分类下暂无店铺');
            } else {
                var msg = data.msg;
                var next = data.next;
                var page = data.page;
                $("#page").val(page);
                $("#span").html(msg);
                $(".showmore").attr('id', next);
                $.each(data.data, function (id, item) {
//                    html = html +
//                            '<div class="hei10"></div><li>' +
//                            '<p class="texR c999 font13">距您' + item.dis + '公里 积分' + item.per + '</p>' +
//                            '<a href="?g=Hld&m=Mall&a=shop_det&id=' + item.id + '" class="clearfix">' +
//                            '<img src="' + item.image + '" width="50px" height="100px" class="fl radius5"/>' +
//                            '<h2 class="font14 c333">' + item.title + '</h2>' +
//                            '<h3 class="font13 c666">' + item.sum + '...</h3>' +
//                            '</a>' +
//                            '<p class="texL c999 font13">地址：' + item.addr + '</p>' +
//                            '</li>';
                    html = html +
                            '<li><a href="?g=Hld&m=Mall&a=shop_det&id=' + item.id + '">' +
                            '<img src="' + item.image + '" width="90%"/>' +
                            '<div class="clearfix c333 pLR5 mT5"><font class="font14">' + item.title + '</font><font style="padding-right: 5%;" class="fr font13 c999">' + item.dis + 'km积分返还' + item.per + '%</font></div>' +
                            '<p class="font13 c999 pLR5 mB5">地址：' + item.addr + '</p>' +
                            '</a></li><div class="hei10"></div>';
                });
            }
            $('.shop_list').html(html);
        }
    })
    //alert(id);
}


