<?php

class ApiextAction extends UserAction {

    /**
     * @brief 兑换点展示
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function extlist() {
        $extModel = M('ahld_ext');
        $token = $_GET['token'];
        $search = $this->_post('search', 'trim');
        $where = array();
        if ($search) {
            $where['title'] = array('like', '%' . $search . '%');
            $where['tel'] = array('like', '%' . $search . '%');
            $where['_logic'] = 'OR';
        }
        $count = $extModel->count();
        $Page = new Page($count, 15);
        $show = $Page->show();
        $ext_list = $extModel->field('id,title,addr,tel,longitude,latitude')->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('id ASC')->select();
        foreach ($ext_list as $key => $value) {
            /* if(!$value['img']) {
              $value['img'] = '../wx/images/default.jpg';
              }
              $images = explode(',', $value['img']);
              $images = array_filter($images);
              $actdetail[$key]['img'] = '';
              foreach($images as $k => $v) {
              $actdetail[$key]['img'] .= '<img src="'.$v.'" style="max-height:30px;padding-left:10px;"/>';
              }
              $actdetail[$key]['portrait'] = '<img src="'.$value['portrait'].'" style="max-height:30px;"/>'; */
        }
        $this->assign('search', $search);
        $this->assign('ext_list', $ext_list);
        $this->assign('token', $token);
        $this->assign('page', $Page->show());
        $this->display();
    }

    /**
     * @brief 删除兑换点
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function del_apiext() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $id = $data['id'];
        $model = M("ahld_ext");
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
            $this->success('删除成功', U('HuanleduiAdmin/Apiext/extlist', array('token' => I('post.token'))));
        } else {
            $this->error('删除失败');
        }
    }

    /**
     * @brief 添加兑换点
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function add_ext() {
        $this->display('add');
    }

    /**
     * 获取根目录
     * @return type
     */
    public static function getRootDir() {
        return dirname(dirname(dirname(dirname(dirname(__FILE__)))));
    }

    /**
     * @brief 添加兑换点
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function save_ext() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $position = $data['position'];
        $data['content'] = $_POST['content'];
        unset($data['token']);
        unset($data['position']);
        if ($position) {
            $arr_position = explode(',', $position);
            $data['longitude'] = $arr_position['1'];
            $data['latitude'] = $arr_position['0'];
        }
        $data['create_time'] = time();
        $data['update_time'] = time();
        $extModel = M('ahld_ext');
        $res = $extModel->add($data);
        if ($res) {
            $this->success('兑换站点添加成功！', U('HuanleduiAdmin/Apiext/extlist', array('token' => I('post.token'))));
        } else {
            $this->error('兑换站点添加失败！');
        }
    }

    /**
     * @brief 修改兑换点
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function edit() {
        $data = $_GET;
        $id = $data['id'];
        $token = $data['token'];
        $extModel = M('ahld_ext');
        $ext_info = $extModel->where(array('id' => $id))->find();
        $ext_info['images'] = array();
        $ext_info['position'] = '';
        if ($ext_info['img']) {
            $images = explode(",", $ext_info['img']);
            array_pop($images);
            $ext_info['images'] = $images;
        }
        if ($ext_info['longitude'] && $ext_info['latitude']) {
            $ext_info['position'] = $ext_info['latitude'] . "," . $ext_info['longitude'];
        }
        $this->assign('token', $token);
        $this->assign('item', $ext_info);
        $this->display('edit');
    }

    /**
     * @brief 修改兑换点
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function edit_ext() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $id = $data['id'];
        $position = $data['position'];
        $data['content'] = $_POST['content'];
        unset($data['token']);
        unset($data['position']);
        if ($position) {
            $arr_position = explode(',', $position);
            $data['longitude'] = $arr_position['1'];
            $data['latitude'] = $arr_position['0'];
        }
        if (!$data['img']) {
            unset($data['img']);
        }
        $data['update_time'] = time();
        $extModel = M('ahld_ext');
        $res = $extModel->where(array('id' => $id))->save($data);
        if ($res) {
            $this->success('兑换点修改成功！', U('HuanleduiAdmin/Apiext/extlist', array('token' => I('post.token'))));
        } else {
            $this->error('兑换点修改失败！');
        }
    }

    //设置兑换点距离
    public function setext() {
        //获取设置
        $config_model = M('ahld_conf');
        $ext_set_info = $config_model->where(array('type' => 1))->find();
        $this->assign('data', $ext_set_info);
        $this->display('setext');
    }

    //设置兑换点距离
    public function save_set() {
        $data = $_POST;
        $arr['value'] = $data['value'];
        $config_model = M('ahld_conf');
        $res = $ext_set_info = $config_model->where(array('type' => 1))->save($arr);
        if ($res) {
            exit(json_encode(array('error_code' => false, 'msg' => '兑换点设置修改成功')));
        } else {
            exit(json_encode(array('error_code' => false, 'msg' => '兑换点设置修改失败')));
        }
    }

    /**
     * @brief 导出对换点列表并下载到客户端
     * @param Null
     * @par 2016/07/06 ver 1.0 created by huangweiming
     * */
    public function excel_out() {
        //将需要导出到excel的数据查询出来
        $id = $_GET['id'];
        $where = '';
        if ($id) {
            $where['id'] = array("in", $id);
        }
        $mdata = M('ahld_ext');
        $data = $mdata->where($where)->order("id desc")->select();

        //开始生成excel内容
        /** 加载IOFactory包 */
        Vendor('Excel.Classes.PHPExcel'); //Vendor路径的写法参考ThinkPHP文档

        /** 错误信息 */
        error_reporting(E_ALL);

        $objReader = PHPExcel_IOFactory::createReader('Excel5'); //在内存中建一个excel2003操作
        //加载需要读取的模板放在内存的excel中，路径一定要对啊，我在index.php中用了define(ROOT, dirname(__FILE__));所以下面这样写
        $objPHPExcel = $objReader->load(ROOT . "/excel/temp.xls");

        //设置excel格式
        //$objPHPExcel->getActiveSheet ()->setCellValue ( 'B1', '统计表' ); //在B位置显示标题,可以动态添加，这个例子中我是在母版中写死了的
        $objPHPExcel->getActiveSheet()->setCellValue('E1', date('Y-m-d H:i:s', time())); //在E位置显示时间

        /*         * 将数据用循环放进表格相对应位置S */
        $baseRow = 4; //数据从3-1行开始往下输出，具体数据看你的模板了

        foreach ($data as $r => $dataRow) {
            $row = $baseRow + $r;
            $objPHPExcel->getActiveSheet()->insertNewRowBefore($row, 1); //插入新的行
            //将数据填充到相对应的位置
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $r + 1); //序号
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $dataRow ['id']); //对换点id
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $dataRow ['title']); //兑换的名称
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $dataRow ['tel']); //对话点电话
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $dataRow ['addr']); //对话点地址
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $dataRow ['longitude']); //经度
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $dataRow ['latitude']); //纬度
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $dataRow ['score']); //排序
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $dataRow ['content']); //详细内容
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $dataRow ['img']); //图片链接
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, date("Y-m-d H:i:s", $dataRow ['create_time'])); //创建时间
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, date("Y-m-d H:i:s", $dataRow ['update_time'])); //修改时间
        }
        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1); //作用：把最顶上面的那一空白行去掉
        //---------上面的代码是从30template.php（加载模板）中copy下来自己改成我想要————————————————
        //  ----------下面的代码是从01simple-download-xls.php（下载excel表格）中copy下来的-------
        //将得到的数据导出到excel中提供给用户下载
        // 将输出重新定向到客户端浏览器的(Excel5)
        $objPHPExcel->getActiveSheet()->setTitle('兑换点列表'); //设置excel表内的小标签的标题
        $filename = date('Y-m-d H:i:s', time());
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="兑换点列表' . $filename . '.xls"'); //要下载的excel文件的文件名，这设置了用当前时间作为文件名
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //在内存中准备一个excel2003文件
        $objWriter->save('php://output');
        exit();
    }

}
?>