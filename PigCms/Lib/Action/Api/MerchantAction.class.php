<?php

/**
 * Created by PhpStorm.
 * User: huangweiming
 * Date: 2016/6/27
 * Time: 17:44
 */
class MerchantAction extends Action {

    public function __construct() {
        $this->mtype_model = M('ahld_mtype');
    }

    /**
     * 保存商家分类功能
     * @access public
     */
    public function save_mtype() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $update = I('post.');
        $update['img'] = I('post.share_pic', '', 'htmlspecialchars');
        $update['update_time'] = time();
        $where['id'] = I('post.id', '', 'htmlspecialchars');
        $result = $this->mtype_model->where($where)->save($update);
        if ($result) {
            $this->success('保存分类成功，稍后为您跳转', U('HuanleduiAdmin/MerchantType/mlist', array('token' => I('post.token'))));
        } else {
            $this->error('保存分类失败，请重试。');
        }
    }

    /**
     * Created by PhpStorm.
     * User: huangweiming
     * 功能:添加商家分类
     * Date: 2016/6/30
     * Time: 8:44
     */
    public function add_mtype() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $data['img'] = $data['share_pic'];
        $data['create_time'] = time();
        if ($this->mtype_model->data($data)->add()) {
            $this->success('添加成功，稍后为您跳转', U('HuanleduiAdmin/MerchantType/mlist', array('token' => I('post.token'))));
        } else {
            $this->error('添加失败，请重试。');
        }
    }

    /**
     * Created by PhpStorm.
     * User: huangweiming
     * 功能:删除商家分类
     * Date: 2016/6/30
     * Time: 8:44
     */
    public function del_mtype() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.', '', 'htmlspecialchars');
        $id = $data['id'];
        if (is_array($id)) {
            $where = 'id in(' . implode(',', $id) . ')';
        } else {
            $where = 'id=' . $id;
        }

        $del = $this->mtype_model->where($where)->delete();
        $sql = $this->mtype_model->_sql();
        if ($del) {
            //删除该商家分类下的所有子类
            $data = $this->mtype_model->field("id,pid,name")->select();
            if (is_array($id)) {
                foreach ($id as $key => $value) {
                    $child = self::get_child($data, $value);
                    if ($child) {
                        $wherec = 'id in(' . implode(',', $child) . ')';
                        $del = $this->mtype_model->where($wherec)->delete();
                    }
                }
            } else {
                $child = self::get_child($data, $id);
                if ($child) {
                    $wherec = 'id in(' . implode(',', $child) . ')';
                    $del = $this->mtype_model->where($wherec)->delete();
                }
            }
            $this->success('已删除', U('HuanleduiAdmin/MerchantType/mlist', array('token' => I('post.token'))));
        } else {
            $this->error('删除失败', U('HuanleduiAdmin/MerchantType/mlist', array('token' => I('post.token'))));
        }
    }

    /**
     * 获取根目录
     * @return type
     */
    public static function getRootDir() {
        return dirname(dirname(dirname(dirname(dirname(__FILE__)))));
    }

    /**
     * Created by PhpStorm.
     * User: huangweiming
     * 功能:删除商家
     * Date: 2016/7/5
     * Time: 8:44
     */
    public function del_merchant() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $id = $data['id'];
        $model = M("ahld_mall");
        if (is_array($id)) {
            $where = 'id in(' . implode(',', $id) . ')';
        } else {
            $where = 'id=' . $id;
        }
        $img = $model->where($where)->field("img")->select();
        $del = $model->where($where)->delete();
        if ($del) {
            $root = self::getRootDir();
            foreach ($img as $key => $value) {
                $imgs = array_filter(explode(',', $value['img']));
                if ($imgs) {
                    //删除图片
                    foreach ($imgs as $key => $value) {
                        if (file_exists($root . $value)) {
                            unlink($root . $value);
                        }
                    }
                }
            }
            $this->success('删除成功', U('HuanleduiAdmin/Merchant/mlist', array('token' => I('post.token'))));
        } else {
            $this->error('删除失败');
        }
    }

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

    /**
     * @brief 添加商家
     * @param Null
     * @par 2016/07/01 Ver 1.00 Created by Huangweiming
     */
    public function add_merchant() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $position = $data['position'];
        $data['content'] = $_POST['content'];
        unset($data['token']);
        //unset($data['position']);
        if ($position) {
            $arr_position = explode(',', $position);
            $data['latitude'] = $arr_position['0'];
            $data['longitude'] = $arr_position['1'];
        }
        if (!$data['img']) {
            unset($data['img']);
        }
        $data['update_time'] = $data['create_time'] = time();
//        var_dump($data);exit;
        $Model = M('ahld_mall');
        $res = $Model->data($data)->add();
        if ($res) {
            $this->success('添加成功，稍后为您跳转！', U('HuanleduiAdmin/Merchant/mlist', array('token' => I('post.token'))));
        } else {
            $this->error('添加失败，请稍后重试！');
        }
    }

    /**
     * @brief 保存商家
     * @param Null
     * @par 2016/07/04 Ver 1.00 Created by Huangweiming
     */
    public function edit_merchant() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $position = $data['position'];
        $data['content'] = $_POST['content'];
        unset($data['token']);
        //unset($data['position']);
        if ($position) {
            $arr_position = explode(',', $position);
            $data['latitude'] = $arr_position['0'];
            $data['longitude'] = $arr_position['1'];
        }
        if (!$data['img']) {
            unset($data['img']);
        }
        $data['update_time'] = time();
        $Model = M('ahld_mall');
//        var_dump($data);exit;
        $res = $Model->where(array("id" => $data['id']))->save($data);
        if ($res) {
            $this->success('保存成功，稍后为您跳转！', U('HuanleduiAdmin/Merchant/mlist', array('token' => I('post.token'))));
        } else {
            $this->error('保存失败，请稍后重试！');
        }
    }

}
