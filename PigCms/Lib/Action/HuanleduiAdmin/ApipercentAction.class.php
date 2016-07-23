<?php

class ApipercentAction extends UserAction {

    /**
     * @brief 编辑分销比例
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function percentlist() {
        $percentModel = M('ahld_conf');
        $token = $_GET['token'];
        $where = array();

        $percent_info = $percentModel->field('id,name,value')->where(array('type' => 2))->select();
        $arr_point = array();
        if ($percent_info['0']['value']) {
            $arr_point = explode(",", $percent_info['0']['value']);
        }
        $this->assign('point', $arr_point);
        $this->assign('data', $percent_info['0']);
        $this->assign('token', $token);
        $this->display();
    }

    /**
     * @brief 修改比例
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function edit_percent() {
        $data = $_POST;
        $arr['value'] = $data['t1'] . "," . $data['t2'] . "," . $data['t3'];
        $percentModel = M('ahld_conf');
        $res = $percentModel->where(array('type' => 2))->save($arr);
        if ($res) {
            $this->success('比例修改成功', U('HuanleduiAdmin/Apipercent/percentlist', array('token' => $data['token'])));
        } else {
            $this->success('比例修改失败');
        }
    }

}

?>