<?php

$menus = array(
    array(
        'name' => '基础设置',
        'iconName' => 'base',
        'display' => 0,
        'subs' => array(
            //array('name'=>'功能管理','link'=>U('Function/index',array('token'=>$token,'id'=>session('wxid'))),'new'=>0,'selectedCondition'=>array('m'=>'Function','a'=>'index')),
            array('name' => '关注时回复与帮助', 'link' => U('Areply/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Areply')),
            array('name' => '微信－文本回复', 'link' => U('Text/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Text')),
            array('name' => '微信－图文回复', 'link' => U('Img/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Img', 'a' => 'index')),
            array('name' => '微信－多图文回复', 'link' => U('Img/multi', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Img', 'a' => 'multi')),
            array('name' => '微信－语音回复', 'link' => U('Voiceresponse/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Voiceresponse')),
            array('name' => '微信－群发消息', 'link' => U('Message/sendHistory', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Message')),
            array('name' => '微信－模板消息', 'link' => U('TemplateMsg/index', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'TemplateMsg')),
            array('name' => 'LBS商家连锁', 'link' => U('Company/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Company')),
            array('name' => '自定义菜单', 'link' => U('Diymen/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Diymen')),
            array('name' => '自动获取粉丝信息', 'link' => U('Auth/index', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Auth')),
            //array('name'=>'店员管理','link'=>U('Assistente/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Assistente')),
            array('name' => '回答不上来的配置', 'link' => U('Other/index', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'Other')),
        )),
    array(
        'name' => '兑换点管理',
        'iconName' => 'secondary',
        'display' => 0,
        'subs' => array(
            array('name' => '兑换点列表', 'link' => U('Apiext/extlist', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'addext')),
            array('name' => '兑换点设置', 'link' => U('Apiext/setext', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'setext')),
        )),
    array(
        'name' => '附近商家管理',
        'iconName' => 'secondary',
        'display' => 0,
        'subs' => array(
            array('name' => '商家首页管理', 'link' => U('Merchant/banner', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'banner')),
            array('name' => '添加商家', 'link' => U('Merchant/add', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'add')),
            array('name' => '商家列表', 'link' => U('Merchant/mlist', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'mlist')),
            array('name' => '附近商家显示范围', 'link' => U('Merchant/setext', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'setext')),
            array('name' => '商家地图', 'link' => U('Merchant/shows', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'merchant', 'a' => 'shows')),
        )),
    array(
        'name' => '商家分类管理',
        'iconName' => 'secondary',
        'display' => 0,
        'subs' => array(
            array('name' => '商家首页分类导航', 'link' => U('MerchantType/mlist', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'MerchantType', 'a' => 'addext')),
            array('name' => '添加商家分类', 'link' => U('MerchantType/add', array('token' => $token)), 'new' => 0, 'selectedCondition' => array('m' => 'MerchantType', 'a' => 'add'))
        )),
    array(
        'name' => '微信营销活动',
        'iconName' => 'secondary',
        'display' => 0,
        'subs' => array(
            array('name' => '营销推广列表', 'link' => U('Apispread/spreadlist', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'spreadlist')),
            array('name' => '增加营销推广', 'link' => U('Apispread/add_spread', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Apiext', 'a' => 'add_spread')),
        )),
    array(
        'name' => '积分比例管理',
        'iconName' => 'secondary',
        'display' => 0,
        'subs' => array(
            array('name' => '积分比例设置', 'link' => U('Apipercent/percentlist', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'Apipercent', 'a' => 'percentlist')),
        )),
    array(
        'name' => '微客服',
        'iconName' => 'service',
        'display' => 0,
        'subs' => array(
            array('name' => '人工客服', 'link' => U('ServiceUser/wechatService', array('token' => $token)), 'new' => 1, 'selectedCondition' => array('m' => 'ServiceUser')),
        )),
);


