<?php

class ApispreadAction extends UserAction {

    //继承函数
    public function __construct() {
        parent::__construct();
        $this->spread_model = M('ahld_spread'); //$this==对象自身,$this->spread=  对象自身的一个变量
    }

    /**
     * @brief 营销活动展示
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function spreadlist() {
        //$spread_model = M('ahld_spread');
        $token = $_GET['token'];
        $search = $this->_post('search', 'trim');
        $where = array();
        if ($search) {
            $where['title'] = array('like', '%' . $search . '%');
            //$where['tel']  = array('like','%'.$search.'%');
            //$where['_logic'] = 'OR';
        }
        $count = $this->spread_model->count();
        $Page = new Page($count, 15);
        $show = $Page->show();
        $spread_list = $this->spread_model->field('tp_ahld_spread.id,tp_ahld_qrcode.code_url,title,point,is_perment,times,sweep_number,giving_points,start_time,end_time')->join(' tp_ahld_qrcode ON tp_ahld_qrcode.id = tp_ahld_spread.qrcode_id')->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('tp_ahld_qrcode.id ASC')->select();
//        var_dump($spread_list);
        foreach ($spread_list as $key => $value) {
            $spread_list[$key]['start_date'] = date('Y-m-d H:i', $value['start_time']);
            $spread_list[$key]['end_date'] = date('Y-m-d H:i', $value['end_time']);
            $spread_list[$key]['summary'] = mb_substr($value['content'], 0, 18) . "...";
            if ($value['is_perment'] == 1) {
                $spread_list[$key]['is_perment_ch'] = '永久';
            } else {
                $spread_list[$key]['is_perment_ch'] = '临时';
            }
        }

        $this->assign('search', $search);
        $this->assign('spread_list', $spread_list);
        $this->assign('token', $token);
        $this->assign('page', $Page->show());

        $this->display();
    }

    /**
     * @brief 删除营销活动
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function del_apispread() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $id = $data['id'];
        $model = M("ahld_spread");
        if (is_array($id)) {
            $where = 'id in(' . implode(',', $id) . ')';
        } else {
            $where = 'id=' . $id;
        }
        $del = $model->where($where)->delete();
        if ($del) {
            $this->success('删除成功', U('HuanleduiAdmin/Apispread/spreadlist', array('token' => I('post.token'))));
        } else {
            $this->error('删除失败');
        }
    }

    /**
     * @brief 添加营销活动
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function add_spread() {
        $this->display('add');
    }

    /**
     * @brief 保存营销活动
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function save_spread() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $arr['title'] = $data['title'];
        $arr['point'] = $data['point'];
        $arr['content'] = $_POST['content'];;
        $arr['score'] = $data['score'];
        $arr['is_perment'] = $data['is_perment'];
        $arr['start_time'] = strtotime($data['start']);
        $arr['end_time'] = strtotime($data['end']);
        $arr['create_time'] = time();
        $arr['update_time'] = time();

        $spreadModel = M('ahld_spread');
        $res = $spreadModel->add($arr);

        if ($res) {
            //生成二维码信息
//            $update['qrcode'] = $this->qrcode($res, $arr['is_perment'], $data['times'] * 86400);
            // 添加二维码记录表返回参数记入到用户表
            $data['scene_id'] = $res;
            $data['keyword'] = "活动+" . $res;
            $data['token'] = I('post.token');
            $data['attention_num'] = 0;
            $data['code_url'] = $this->qrcode($res, $arr['is_perment'], $data['times'] * 86400);
            $data['status'] = 0;
            $qrcode_id = M("ahld_qrcode")->add($data);
            // 添加关键字回复表信息
            unset($data);
            $data['keyword'] = "活动+" . $res;
            $data['pid'] = 0;
            $data['token'] = I('post.token');
            $data['module'] = "Huanledui";
            $data['precision'] = 0;
            $data['precisions'] = 0;
            M("keyword")->add($data);
            $update['qrcode_id'] = $qrcode_id;
//            M("userinfo")->where(array('id' => $this->user_info['id']))->save($update);
            
            $spreadModel->where(array('id' => $res))->save($update);
            $this->success('营销活动添加成功', U('HuanleduiAdmin/Apispread/spreadlist', array('token' => I('post.token'))));
        } else {
            $this->error('营销活动添加失败');
        }
    }

    /**
     * @brief 修改营销活动
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function edit() {
        $data = I('get.');
        $id = $data['id'];
        $token = $data['token'];
        $spreadModel = M('ahld_spread');
        $spread_info = $spreadModel->where(array('id' => $id))->find();
        if ($spread_info['start_time']) {
            $spread_info['start'] = date("Y-m-d H:i:s", $spread_info['start_time']);
        }
        if ($spread_info['end_time']) {
            $spread_info['end'] = date("Y-m-d H:i:s", $spread_info['end_time']);
        }

        $this->assign('token', $token);
        $this->assign('item', $spread_info);
        $this->display('edit');
    }

    /**
     * @brief 修改保存营销管理
     * @param Null
     * @par 2016/06/23 Ver 1.00 Created by Pine
     */
    public function edit_spread() {
        IS_POST || $this->error('非法操作，请返回重试！！！');
        $data = I('post.');
        $id = $data['id'];

        $arr['title'] = $data['title'];
        $arr['point'] = $data['point'];
        $arr['content'] = $_POST['content'];
        $arr['score'] = $data['score'];
        $arr['is_perment'] = $data['is_perment'];
        $arr['times'] = $data['times'];
        $arr['start_time'] = strtotime($data['start']);
        $arr['end_time'] = strtotime($data['end']);
        $arr['update_time'] = time();


        //查看该id下的原来的营销管理的信息
        $spreadModel = M('ahld_spread');
        $spread_info = $spreadModel->where(array('id' => $id))->find();
        //检测该二维码是否与原来的二维码的永久性相同
        if($spread_info['is_perment'] != $arr['is_perment'] || is_null($spread_info['qrcode'])){
            // 判断生成二维码类型是否和上次相等，或者判断二维码是否存在
            $arr['qrcode'] = $this->qrcode($id, $arr['is_perment'], $data['times'] * 86400);
        }else if( $arr['is_perment'] == 0 && $spread_info['times'] != $arr['times']){
            // 若是临时二维码则判断时间是否相等
            $arr['qrcode'] = $this->qrcode($id, $arr['is_perment'], $arr['times'] * 86400);
        }
        $res = $spreadModel->where(array('id' => $id))->save($arr);
        if ($res) {
            $this->success('营销活动修改成功', U('HuanleduiAdmin/Apispread/spreadlist', array('token' => I('post.token'))));
        } else {
            $this->error('营销活动修改失败');
        }
    }

    /**
     * 生成二维码方式
     * @param type $scene_id
     * @param type $type
     * @param type $expire
     * @return type
     */
    public function qrcode($scene_id, $type = 0, $expire = 604800) {
        $where = array('token' => $this->token);
        $this->thisWxUser = M('Wxuser')->where($where)->find();
        $apiOauth = new apiOauth();
        $access_token = $apiOauth->update_authorizer_access_token($this->thisWxUser['appid']);
        $weObj = new WechatApi();
        $weObj->checkAuth($appid = '', $appsecret = '', $access_token);
        $res = $weObj->getQRCode($scene_id, $type, $expire);
        return $res = $weObj->getQRUrl($res['ticket']);
    }

    /**
     * @brief 导出对营销活动列表并下载到客户端
     * @param Null
     * @par 2016/07/06 ver 1.0 created by shenyifei
     * */
    public function excel_out() {
        //将需要导出到excel的数据查询出来
        $id = $_GET['id'];
        $where = '';
        if ($id) {
            $where['id'] = array("in", $id);
        }
        $mdata = M('ahld_spread');
        $data = $mdata->where($where)->order("id desc")->select();

        //开始生成excel内容
        /** 加载IOFactory包 */
        Vendor('Excel.Classes.PHPExcel'); //Vendor路径的写法参考ThinkPHP文档

        /** 错误信息 */
        error_reporting(E_ALL);

        $objReader = PHPExcel_IOFactory::createReader('Excel5'); //在内存中建一个excel2003操作
        //加载需要读取的模板放在内存的excel中，路径一定要对啊，我在index.php中用了define(ROOT, dirname(__FILE__));所以下面这样写
        $objPHPExcel = $objReader->load(ROOT . "/excel/tb_ahld_spread.xls");

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
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $dataRow ['title']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $dataRow ['content']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $dataRow ['point']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $dataRow ['qrcode']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $dataRow ['is_perment']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $dataRow ['score']); //排序
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $dataRow ['sweep_number']); //详细内容
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $dataRow ['giving_points']); //图片链接
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, date("Y-m-d H:i:s", $dataRow ['create_time'])); //创建时间
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, date("Y-m-d H:i:s", $dataRow ['update_time'])); //修改时间
        }
        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1); //作用：把最顶上面的那一空白行去掉
        //---------上面的代码是从30template.php（加载模板）中copy下来自己改成我想要————————————————
        //  ----------下面的代码是从01simple-download-xls.php（下载excel表格）中copy下来的-------
        //将得到的数据导出到excel中提供给用户下载
        // 将输出重新定向到客户端浏览器的(Excel5)
        $objPHPExcel->getActiveSheet()->setTitle('营销活动列表'); //设置excel表内的小标签的标题
        $filename = date('Y-m-d H:i:s', time());
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="营销活动列表' . $filename . '.xls"'); //要下载的excel文件的文件名，这设置了用当前时间作为文件名
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //在内存中准备一个excel2003文件
        $objWriter->save('php://output');
        exit();
    }

}

?>