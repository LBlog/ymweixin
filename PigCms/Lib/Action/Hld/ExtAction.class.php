<?php

/**
 * 兑换站点
 * @author shenyifei <809745357@qq.com>
 * @version 1.0.0
 */
class ExtAction extends HldBaseAction {

    public function _initialize() {
        parent::_initialize();
        $this->ext = M('ahld_ext');
        $this->config = M('ahld_conf');
        $this->user = M('userinfo');
        //获取附近兑换点显示距离
        $distance_info = $this->config->field('value')->where(array('type' => 1))->find();
        $this->distance = $distance_info['value'] * 1000;
    }

    /**
     * 兑换站点首页管理
     * @access public
     */
    public function index() {
        $this->assign('page', C('hld_page'));
        $this->assign('page_size', C('hld_page_size'));
        $this->share();
        $this->display();
    }

    /**
     * ajax 兑换点分页
     * @access public
     */
    public function ajaxext() {
        $data = $_POST;
        $lng = $data['lng'];
        $lat = $data['lat'];
        $page = $data['page'];
        $page_size = $data['page_size'];
        $new_page = intval($page);
        $offset = ($new_page - 1) * $page_size;
        $response = array();
        $map = array();
        $field = "id,title,addr,img,ROUND(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000) as distance ";
        $map = "round(6378.138*2*ASIN(SQRT(POW(SIN(('$lat'*PI()/180-latitude*PI()/180)/2),2)+COS('$lat'*PI()/180)*COS(latitude*PI()/180)*POW(SIN(('$lng'*PI()/180-longitude*PI()/180)/2),2)))*1000) <($this->distance)";
        $order = "score asc";
        $ext_list = $this->ext->field($field)->where($map)->limit($offset, $page_size+1)->order($order)->select();

        if (!$ext_list) {
            $response['status'] = 0;
        } else {
            $response['status'] = 1;
            $count = count($ext_list);
            if ($count > $page_size) {
                $msg = "点击查看下一页...";
                $next = 1;
                array_pop($ext_list);
            } else {
                $msg = "没有更多了...";
                $next = 2;
            }
            foreach ($ext_list as $ke => $ve) {
                $images = explode(',', $ve['img']);
                $ext_list[$ke]['images'] = $images['0'];
                $ext_list[$ke]['dis'] = $ve['distance'] / 1000;
            }

            $response['next'] = $next;
            $response['msg'] = $msg;
            $response['page'] = $new_page + 1;
            $response['data'] = $ext_list;
        }
        echo json_encode($response);
    }

    /**
     * 兑换点详细todo
     * @access public
     */
    public function extdet() {
        $data = $_GET;
        $id = $data['id'];
        $ext_info = $this->ext->where(array('id' => $id))->find();
        $images_array = explode(',', $ext_info['img']);
        array_pop($images_array);
        $ext_info['images'] = $images_array;
        $this->assign('ext', $ext_info);
        $this->display();
    }

}

?>