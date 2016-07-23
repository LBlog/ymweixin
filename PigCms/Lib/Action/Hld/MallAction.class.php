<?php

class MallAction extends HldBaseAction {

    private $randstr = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public function _initialize() {
        parent::_initialize();
        $this->mall = M('ahld_mall');
        $this->mtype = M('ahld_mtype');
        $this->config = M('ahld_conf');
        $this->user = M('userinfo');
        //获取附近商家显示距离
        $distance_info = $this->config->field('value')->where(array('type' => 3))->find();
        $this->distance = $distance_info['value'] * 1000;
    }

    /**
     * 商家分类列表
     */
    public function index() {
        //获取分类的banner;
        $banner_list = $this->config->where(array('type' => 4))->find();
        if ($banner_list['value']) {
            $arr_banner = explode(',', $banner_list['value']);
            // 判断数量是否大于1条，是则删除最后面一条记录
            count($arr_banner) > 1 && array_pop($arr_banner);
        } else {
            $arr_banner = array('1' => '/tpl/static/hld/img/banner.png');
        }
//        var_dump($arr_banner);exit;
        $this->assign('banner', $arr_banner);
        $map['level'] = 1;
        //展示全部的内容
        $mtype_list = $this->mtype->field('id,name,pid,img,num')->where($map)->select();
        //echo $this->mtype->getLastSql();
        //var_dump($mtype_list);
        $this->assign('mtype', $mtype_list);
        $this->display();
    }

    /**
     * 普通商家列表
     */
    public function shoplist() {
        $this->share();
        $page_size = C('hld_page_size') ? C('hld_page_size') : 1;
        $page = 1;
        $offset = ($page - 1) * $page_size;

        $data = $_GET;
        $id = $data['id'];

        $name = $data['name'];
        //获取所有类型为id下的所有类型

        $all_info = $this->mtype->field('id,name,level,pid')->select();
        $all_type = self::get_child($all_info, $id);

        array_push($all_type, $id);  //把自己本身的类型放进去

        $str_type = join(",", $all_type);
        //获取我的经纬度
        $lng = $this->user_info['longitude'];
        $lat = $this->user_info['latitude'];

        //两种获取位置的方法,第一种不准确的貌似是距离的两倍

        $field = "tp_ahld_mall.*,ROUND(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000) as distance ";

        $map = "round(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000) <($this->distance) and type in " . "($str_type)";
        $order = "score asc";
        $shop_info = $this->mall->field($field)->where($map)->limit($offset, $page_size + 1)->order($order)->select();
        //看看是否有下一页
        $count = count($shop_info);
        if ($count > $page_size) {
            $msg = "点击查看下一页...";
            $next = 1;
            array_pop($shop_info);
        } elseif ($count) {
            $msg = "没有更多了...";
            $next = 2;
        } else {
            $msg = "暂无数据";
            $next = 2;
        }

        foreach ($shop_info as $ks => $vs) {
            $arr_images = explode(",", $vs['img']);
            $shop_info[$ks]['image'] = $arr_images['0'];
            $shop_info[$ks]['sum'] = mb_substr($vs['summary'], 0, 12);
            $shop_info[$ks]['dis'] = $vs['distance'] / 1000;
        }


        $where_mtype['pid'] = $id;
        $level2_list = $this->mtype->field('id,name')->where($where_mtype)->select();

        $this->assign('shop', $shop_info);
        $this->assign('page', $page);
        $this->assign('msg', $msg);
        $this->assign('page_size', $page_size);
        $this->assign('next', $next);


        $this->assign('name', $name);

        $this->assign('lng', $lng);   //用户经度
        $this->assign('lat', $lat); //用户纬度	

        $this->assign('id', $id);
        $this->assign('level2', $level2_list);
        $this->display();
    }

    /*
     * ajax 兑换点分页
     * 
     * */

    public function ajaxlevel2() {
        $data = $_POST;
        $id = $data['id'];
        //获取所有分类和他们的父id
        //获取该id下级的类型
        $where_mtype['pid'] = $id;
        $level3_list = $this->mtype->field('id,name')->where($where_mtype)->select();
        $response = array();

        if (!$level3_list) {
            $response['status'] = 0;
        } else {
            $response['status'] = 1;
            $response['data'] = $level3_list;
        }
        echo json_encode($response);
    }

    /*
     * ajax 兑换点分页
     *
     * */

    public function ajaxlevel3() {
        $data = $_POST;
        $id = $data['id'];
        //获取该id下级的类型
        $where_mtype['pid'] = $id;
        $level4_list = $this->mtype->field('id,name')->where($where_mtype)->select();
        $response = array();

        if (!$level4_list) {
            $response['status'] = 0;
        } else {
            $response['status'] = 1;
            $response['data'] = $level4_list;
        }
        echo json_encode($response);
    }

    //ajax 展示具体类型下面的商店
    public function ajax_show_mall() {

        $data = $_POST;
        $type = $data['id'];  //获得上传过来的typeid
        $way = $data['way'];  //获取排序方式
        $lng = $data['lng'];
        $lat = $data['lat'];
        #分页数据
        $page = 1;
        $page_size = $data['page_size'];
        $new_page = intval($page) + 1;
        $offset = ($page - 1) * $page_size;

        $response = array();
        /*         * *由上传过来额type_id获取所有的其下面的type** */
        //获取所有分类和他们的父id
        $all_info = $this->mtype->field('id,name,level,pid')->select();

        $all_type = self::get_child($all_info, $type);
        array_push($all_type, $type);
        $str_type = join(",", $all_type);

        //获取对应type下面的所有类型的商店
        //两种获取位置的方法,第一种不准确的貌似是距离的两倍
        //$field = "tp_ahld_mall.*,sqrt(((('$lng'-longitude)*PI()*12656*cos((('$lat'+latitude)/2)*PI()/180)/180)*(('$lng'-longitude)*PI()*12656*cos ((('$lat'+latitude)/2)*PI()/180)/180))+((('$lat'-latitude)*PI()*12656/180)*(('$lat'-latitude)*PI()*12656/180))) as distance ";
        //$field = "tp_ahld_mall.*,`ROUND(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000)` as distance1";
        //$map = "sqrt(((('".$lng.".'-longitude)*PI()*12656*cos((('".$lat."'+latitude)/2)*PI()/180)/180)*(('".$lng."'-longitude)*PI()*12666*cos ((('".$lat."'+latitude)/2)*PI()/180)/180))+((('".$lat."'-latitude)*PI()*12656/180)*(('".$lat."'-latitude)*PI()*12656/180))) <5 and type in "."($str_type)";
        //$map = "type in ($str_type) and round(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000) <($this->distance)";
        //$map['type']  = array('in',$all_type);
        $order = "score asc";
        $distance = "ROUND(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000)";
        if ($way == 1) {
            $order = $distance . " asc,score desc";
        }
        if ($way == 2) {
            $order = "per desc,score asc";
        }

        $sql = "select tp_ahld_mall.*," . $distance . " as distance from tp_ahld_mall where " . $distance . " < " . $this->distance . " and type in (" . $str_type . ")  order by " . $order . " limit " . $offset . "," . (intval($page_size) + 1);
        $Model = new Model(); // 实例化一个model对象 没有对应任何数据表
        $shop_info = $Model->query($sql);
        //$shop_info = mysql_query($sql);
        //	$shop_info = $this->mall->field($field)->where($map)->limit($offset,$page_size+1)->order($order)->select();
        //echo  $this->mall->getLastSql();
        //看看是否有下一页
        $count = count($shop_info);
        if ($count > $page_size) {
            $msg = "点击查看下一页...";
            $next = 1;
            array_pop($shop_info);
        } else {
            $msg = "没有更多了...";
            $next = 2;
        }

        foreach ($shop_info as $ks => $vs) {
            $arr_images = explode(",", $vs['img']);
            $shop_info[$ks]['image'] = $arr_images['0'];
            $shop_info[$ks]['sum'] = mb_substr($vs['summary'], 0, 12);
            $shop_info[$ks]['dis'] = $vs['distance'] / 1000;
        }
        if (!$shop_info) {
            $response['status'] = 0;
        } else {
            $response['msg'] = $msg;
            $response['next'] = $next;
            $response['status'] = 1;
            $response['data'] = $shop_info;
            $response['page'] = 1;
        }
        echo json_encode($response);
    }

    //ajax 分页展示更多商店
    public function ajax_showmore() {

        $data = $_POST;

        $type = $data['type'];  //获得上传过来的typeid
        $page = $data['page'];
        $way = $data['way'];
        $lng = $data['lng'];
        $lat = $data['lat'];
        #分页数据
        $page_size = $data['page_size'];
        $new_page = intval($page) + 1;
        $offset = ($page) * $page_size;

        $response = array();
        /*         * *由上传过来额type_id获取所有的其下面的type** */
        //获取所有分类和他们的父id
        $all_info = $this->mtype->field('id,name,level,pid')->select();
        $all_type = self::get_child($all_info, $type);
        array_push($all_type, $type);
        $str_type = join(",", $all_type);

        //获取对应type下面的所有类型的商店
        //获取对应type下面的所有类型的商店
        $order = "score asc";
        $distance = "ROUND(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000)";
        if ($way == 1) {
            $order = $distance . " asc,score desc";
        }
        if ($way == 2) {
            $order = "per desc,score asc";
        }

        $sql = "select tp_ahld_mall.*," . $distance . " as distance from tp_ahld_mall where " . $distance . " < " . $this->distance . " and type in (" . $str_type . ")  order by " . $order . " limit " . $offset . "," . (intval($page_size) + 1);
        $Model = new Model(); // 实例化一个model对象 没有对应任何数据表
        $shop_info = $Model->query($sql);

        //看看是否有下一页
        $count = count($shop_info);
        if ($count > $page_size) {
            $msg = "点击查看下一页...";
            $next = 1;
            array_pop($shop_info);
        } else {
            $msg = "没有更多了...";
            $next = 2;
        }

        foreach ($shop_info as $ks => $vs) {
            $arr_images = explode(",", $vs['img']);
            $shop_info[$ks]['image'] = $arr_images['0'];
            $shop_info[$ks]['sum'] = mb_substr($vs['summary'], 0, 12);
            $shop_info[$ks]['dis'] = $vs['distance'] / 1000;
        }
        if (!$shop_info) {
            $response['status'] = 0;
        } else {
            $response['msg'] = $msg;
            $response['next'] = $next;
            $response['status'] = 1;
            $response['data'] = $shop_info;
            $response['page'] = $new_page;
            ;
        }
        echo json_encode($response);
    }

    //商店详细
    public function shop_det() {
        $id = $_GET['id'];
        $shop_info = $this->mall->where(array('id' => $id))->find();
        $arr_image = explode(',', $shop_info['img']);
        array_pop($arr_image);
        $shop_info['images'] = $arr_image;


        $this->assign('shop', $shop_info);

        $this->display();
    }

    //获得该分类下面的所有分类id //这个还没完成,心累,一个小小的无限极分类都搞不定,以后怎么办啊
    /* 	public function getAllType($data,$id)
      {
      $arr = array();
      foreach($data as $kd=>$vd)
      {
      array_push($arr, $vd['id']);
      $pid = $vd['id'];
      $flag = true;
      do{
      //$pid = $vd['id'];      //找改id的上级id
      if($pid==$id||$pid=='0')
      {
      if($pid==$id)
      {
      array_push($arr, $vd['id']);
      }
      $flag===false;
      }
      else
      {
      $pid = $vd[$pid];
      }

      }while($flag===true);
      }
      return $arr;

      } */

    /*
     * 功能:获取某一类下的所有子元素
     * date:2016/06/29
     * @par: Ver 1.00 Created by huangweiming
     * */
    public function get_child($data, $fid) {
        $result = array();
        $fids = array($fid);
        do {
            $cids = array();
            $flag = false;
            foreach ($fids as $fid) {
                for ($i = count($data) - 1; $i >= 0; $i--) {
                    $node = $data[$i];
                    if ($node['pid'] == $fid) {
                        array_splice($data, $i, 1);
                        $result[] = $node['id'];
                        $cids[] = $node['id'];
                        $flag = true;
                    }
                }
            }
            $fids = $cids;
        } while ($flag === true);

        return $result;
    }

}

?>