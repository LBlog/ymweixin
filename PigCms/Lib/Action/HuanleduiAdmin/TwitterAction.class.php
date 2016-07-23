<?php

/**
 * 功能:推客管理
 * @author shenyifei 809745357@qq.com
 * @version 1.0.0
 * */
class TwitterAction extends UserAction {

    /**
     * 会员表
     * @var type 
     */
    public $userinfo;

    public function _initialize() {
        parent::_initialize();
        $this->_model = M('userinfo');
    }

    /**
     * 二维码背景颜色
     * @access public
     */
    public function qrcode() {
        $conf = M('ahld_conf');
        if (IS_AJAX) {
            $res = $conf->where(array('id' => 5))->save(array('value' => I('qrcode', '', 'htmlspecialchars')));
            if ($res) {
                $this->success('二维码背景修改成功', U('HuanleduiAdmin/Twitter/qrcode', array('token' => $_GET['token'])));
            } else {
                $this->error('二维码背景修改失败' . I('qrcode', '', 'htmlspecialchars'));
            }
        }

        $qrcodeArr = $conf->field('id,name,value')->where(array('id' => 5))->find();
        $this->assign('qrcode', $qrcodeArr['value']);
        $this->display();
    }

    /**
     * 列表展示相关的推客信息
     * @access public
     */
    public function lists() {
        // 标识所属公众账号
        $where['token'] = $this->token;
        // 判断当前用户是否点击搜索按钮进入页面
        $pid = I('pid', '', 'htmlspecialchars');
        if (!empty($pid)) {
            $where['pid'] = $pid;
        }
        $count = $this->_model->where($where)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $data = $this->_model->where($where)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('dat', $data);
        $this->display();
    }

    /**
     * 推客协议
     * @access public
     */
    public function twitter() {

        if (IS_AJAX) {
            $percentModel = M('ahld_conf');
            $update = array('value', I("value"));
            $res = $percentModel->where(array('type' => 6))->save($update);
            if ($res) {
                $this->success('推客协议修改成功', U('HuanleduiAdmin/Twitter/twitter', array('token' => $data['token'])));
            } else {
                $this->success('推客协议修改失败');
            }
        }
        $this->assign("content", M("ahld_conf")->where(array('id' => '6'))->find());
        $this->display();
    }

    /**
     * 列表展示相关的积分
     * @access public
     */
    public function lookpoints() {
        // 标识所属公众账号
        $where['token'] = $this->token;
        $this->_model = M('ahld_point_log');
        // 判断当前用户是否点击搜索按钮进入页面
        $member_id = I('id', '', 'htmlspecialchars');
        if (!empty($member_id)) {
            $where['member_id'] = $member_id;
        }
        $twitter_wechaname = I('twitter_wechaname', '', 'htmlspecialchars');
        if (!empty($twitter_wechaname)) {
            $where['twitter_wechaname'] = $twitter_wechaname;
        }

        $count = $this->_model->where($where)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $data = $this->_model->where($where)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('dat', $data);
        $this->display();
    }

    /**
     * 功能:修改会员信息
     * date:2016/06/29
     * @par: Ver 1.00 Created by huangweiming shenyifei
     * */
    public function edit() {
        $id = I('id', '', 'htmlspecialchars');
        if (IS_AJAX) {
            $update = I("post.");
            unset($update['id']);
            $res = $this->_model->where(array('id' => $id, 'token' => $this->token))->save($update);
            if ($res) {
                $this->success("修改会员信息成功", U('HuanleduiAdmin/Twitter/lists', array('token' => $this->token)));
            } else {
                $this->error("修改会员信息出错，请重试！");
            }
        }
        $data = $this->_model->where(array('id' => $id, 'token' => $this->token))->find();
        //查询类型
//        var_dump($data);exit;
        $this->assign('data', $data);
        $this->assign('type', $type);
        $this->display();
    }

    /**
     * 功能:删除会员信息
     * date:2016/06/29
     * @par: Ver 1.00 Created by huangweiming
     * */
    public function del() {
        $id = I('id', '', 'htmlspecialchars');
        if (is_array($id)) {
            $where = 'id in(' . implode(',', $id) . ')';
        } else {
            $where = 'id=' . $id;
        }
        # todo 使用事务完成这个功能
        $del = $this->_model->where($where)->delete();
        if ($del) {
            $this->success('删除成功', U('HuanleduiAdmin/Twitter/lists', array('token' => $this->token)));
        } else {
            $this->error('删除失败', U('HuanleduiAdmin/Twitter/lists', array('token' => $this->token)));
        }
    }

    /**
     * @brief 导出积分信息并下载到客户端
     * @param Null
     * @par 2016/07/06 ver 1.0 created by huangweiming
     * */
    public function excel_out_lookpoints() {
        //将需要导出到excel的数据查询出来
        $id = $_GET['id'];
        $where = '';
        if ($id) {
            $where[C('DB_PREFIX') . 'ahld_point_log.id'] = array("in", $id);
        }

        $mdata = M('ahld_point_log');
        $data = $mdata->where($where)->order("id desc")->select();

        //开始生成excel内容
        /** 加载IOFactory包 */
        Vendor('Excel.Classes.PHPExcel'); //Vendor路径的写法参考ThinkPHP文档

        /** 错误信息 */
        error_reporting(E_ALL);

        $objReader = PHPExcel_IOFactory::createReader('Excel5'); //在内存中建一个excel2003操作
        //加载需要读取的模板放在内存的excel中，路径一定要对啊，我在index.php中用了define(ROOT, dirname(__FILE__));所以下面这样写
        $objPHPExcel = $objReader->load(ROOT . "/excel/tb_ahld_point_log.xls");

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
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $dataRow ['member_id']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $dataRow ['member_wechaname']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $dataRow ['points']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $dataRow ['desc']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $dataRow ['stage']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $dataRow ['twitter_wechaname']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, date("Y-m-d H:i:s", $dataRow ['create_time']));
        }
        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1); //作用：把最顶上面的那一空白行去掉
        //---------上面的代码是从30template.php（加载模板）中copy下来自己改成我想要————————————————
        //  ----------下面的代码是从01simple-download-xls.php（下载excel表格）中copy下来的-------
        //将得到的数据导出到excel中提供给用户下载
        // 将输出重新定向到客户端浏览器的(Excel5)
        $objPHPExcel->getActiveSheet()->setTitle('积分记录表'); //设置excel表内的小标签的标题
        $filename = date('Y-m-d H:i:s', time());
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="积分记录表' . $filename . '.xls"'); //要下载的excel文件的文件名，这设置了用当前时间作为文件名
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //在内存中准备一个excel2003文件
        $objWriter->save('php://output');
        exit();
    }

    /**
     * @brief 导出会员信息并下载到客户端
     * @param Null
     * @par 2016/07/06 ver 1.0 created by huangweiming
     * */
    public function excel_out_lists() {
        //将需要导出到excel的数据查询出来
        $id = $_GET['id'];
        $where = '';
        if ($id) {
            $where[C('DB_PREFIX') . 'userinfo.id'] = array("in", $id);
        }

        $mdata = M('userinfo');
        $data = $mdata->where($where)->order("id desc")->select();

        //开始生成excel内容
        /** 加载IOFactory包 */
        Vendor('Excel.Classes.PHPExcel'); //Vendor路径的写法参考ThinkPHP文档

        /** 错误信息 */
        error_reporting(E_ALL);

        $objReader = PHPExcel_IOFactory::createReader('Excel5'); //在内存中建一个excel2003操作
        //加载需要读取的模板放在内存的excel中，路径一定要对啊，我在index.php中用了define(ROOT, dirname(__FILE__));所以下面这样写
        $objPHPExcel = $objReader->load(ROOT . "/excel/tb_userinfo.xls");

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
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $dataRow ['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $dataRow ['portrait']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $dataRow ['wechaname']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $dataRow ['truename']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $dataRow ['hld_username']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $dataRow ['point']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $dataRow ['type']);
        }
        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1); //作用：把最顶上面的那一空白行去掉
        //---------上面的代码是从30template.php（加载模板）中copy下来自己改成我想要————————————————
        //  ----------下面的代码是从01simple-download-xls.php（下载excel表格）中copy下来的-------
        //将得到的数据导出到excel中提供给用户下载
        // 将输出重新定向到客户端浏览器的(Excel5)
        $objPHPExcel->getActiveSheet()->setTitle('会员信息表'); //设置excel表内的小标签的标题
        $filename = date('Y-m-d H:i:s', time());
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="会员信息表' . $filename . '.xls"'); //要下载的excel文件的文件名，这设置了用当前时间作为文件名
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //在内存中准备一个excel2003文件
        $objWriter->save('php://output');
        exit();
    }

}

?>
