<?php
/*
 * 功能:商家管理控制器
 * date:2016/07/2
 * @par 2016/07/2 Ver 1.00 Created by huangweiming
 * */

class MerchantAction extends UserAction {

    /**
     * @brief 商家展示
     * @param Null
     * @par 2016/07/2 Ver 1.00 Created by huangwieming
     */
    public function mlist() {
        $Model = M('ahld_mall');
        $token = $_GET['token'];
        $search = $this->_post('search', 'trim');
        $where = array();
        if ($search) {
            $where['title'] = array('like', '%' . $search . '%');
            $where['tel'] = array('like', '%' . $search . '%');
            $where['_logic'] = 'OR';
        } else {
            $search = '';
        }
        $count = $Model->where($where)->join(' tp_ahld_mtype ON tp_ahld_mtype.id = tp_ahld_mall.type')->count();
        $Page = new Page($count, 10);
        $data = $Model->where($where)->join(' tp_ahld_mtype ON tp_ahld_mtype.id = tp_ahld_mall.type')->field('tp_ahld_mall.id,title,addr,tel,longitude,latitude,score,type,per,tp_ahld_mtype.name')->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('tp_ahld_mall.id desc')->select();
        foreach ($data as $key => $value) {
            if (!$value['name']) {
                $data[$key]['name'] = "--";
            }
        }
        //查询商家显示距离
        $value = M("ahld_conf")->where(array("type" => 3))->find();
        $this->assign("value", $value['value']);
        $this->assign('search', $search);
        $this->assign('dat', $data);
        $this->assign('token', $token);
        $this->assign('page', $Page->show());

        $this->display();
    }

    /*
     * 功能:无限级分类
     * date:2016/06/29
     * @par: Ver 1.00 Created by huangweiming
     * */

    static public function keachdo($array, $pid = 0, $level = 0, $html = '--') {
        $arr = array();
        foreach ($array as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level + 1;
                $v['html'] = str_repeat($html, $level);
                $arr[] = $v;
                $arr = array_merge($arr, self::keachdo($array, $v['id'], $level + 1, $html));
            }
        }

        return $arr;
    }

    /**
     * @brief 添加商家
     * @param Null
     * @par 2016/07/01 Ver 1.00 Created by huangweiming
     */
    public function add() {
        $type = M('ahld_mtype')->field('id,pid,name')->order('num asc')->select();
        $type = self::keachdo($type);
        $this->assign('type', $type);
        $this->display('add');
    }

    /**
     * @brief 修改商家
     * @param Null
     * @par 2016/07/02 Ver 1.00 Created by huangweiming
     */
    public function update() {
        $data = $_GET;
        $id = $data['id'];
        $token = $data['token'];
        $Model = M('ahld_mall');
        $data = $Model->where(array('id' => $id))->find();
        $data['images'] = array();
        $data['position'] = '';
        if ($data['img']) {
            $images = explode(",", $data['img']);
            $images = array_filter($images);
            $data['images'] = $images;
        }
        if ($data['longitude'] && $data['latitude']) {
            $data['position'] = $data['latitude'] . "," . $data['longitude'];
        }
        $type = M('ahld_mtype')->field('id,pid,name')->order('num asc')->select();
        $type = self::keachdo($type);
        $this->assign("type", $type);
        $this->assign('token', $token);
        $this->assign('data', $data);
        $this->display();
    }

    //设置商家显示距离
    public function setext() {
        //获取设置
        $config_model = M('ahld_conf');
        $ext_set_info = $config_model->where(array('type' => 3))->find();
        $this->assign('data', $ext_set_info);
        $this->display('setext');
    }

    //设置商家显示距离
    public function save_set() {
        $data = $_POST;
        $config_model = M('ahld_conf');
        $sear = $config_model->where(array('type' => 3))->find();
        if (!$sear) {
            $data['type'] = 3;
            $data['name'] = "附近商家显示距离";
            $res = $ext_set_info = $config_model->data($data)->add();
        } else {
            $res = $ext_set_info = $config_model->where(array('type' => 3))->save($data);
        }
        if ($res) {
            exit(json_encode(array('error_code' => false, 'msg' => '修改成功')));
        } else {
            exit(json_encode(array('error_code' => true, 'msg' => '操作失败')));
        }
    }

    /**
     * @brief 商家地图
     * @param Null
     * @par 2016/07/05 Ver 1.00 Created by huangweiming
     */
    public function shows() {
        $data = M('ahld_mall')->field('id,title,longitude,latitude,addr')->select();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * @brief 设置商家首页轮播图片
     * @param Null
     * @par 2016/07/06 Ver 1.00 Created by huangweiming
     */
    public function banner() {
        //获取设置
        $config_model = M('ahld_conf');
        $ext_set_info = $config_model->where(array('type' => 4))->find();

        if ($ext_set_info) {
            if ($ext_set_info['value']) {
                $imgs = array_filter(explode(",", $ext_set_info['value']));

                foreach ($imgs as $key => $value) {
                    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $value)) {
                        unset($imgs[$key]);
                    }
                }

                $imgs = array_values(array_filter($imgs));
                $ext_set_info['images'] = $imgs;
                $data['value'] = implode(',', $imgs);
                $config_model->where(array('type' => 4))->save($data);
            }
        }
//        dump($ext_set_info);exit;
        $this->assign('data', $ext_set_info);
        $this->display();
    }

    /**
     * @brief 保存商家首页轮播图片
     * @param Null
     * @par 2016/07/06 Ver 1.00 Created by huangweiming
     */
    public function save_banner() {
        $data = $_POST;
//        var_dump($data);exit;
        $config_model = M('ahld_conf');
        $sear = $config_model->where(array('type' => 4))->select();
        if (!$sear) {
            $data['type'] = 4;
            $data['name'] = "商家首页轮播";
            $res = $ext_set_info = $config_model->data($data)->add();
        } else {
            $res = $ext_set_info = $config_model->where(array('type' => 4))->save($data);
        }
        if ($res) {
            exit(json_encode(array('error_code' => false, 'msg' => '修改成功')));
        } else {
            exit(json_encode(array('error_code' => true, 'msg' => '操作失败，你可能没有修改图片！')));
        }
    }

    /*
     * @brief 导出商家并下载到客户端
     * @param Null
     * @par 2016/07/06 ver 1.0 created by huangweiming
     * */

    public function excel_out() {
        //将需要导出到excel的数据查询出来
        $id = $_GET['id'];
        $where = '';
        if ($id) {
            $where[C('DB_PREFIX') . 'ahld_mall.id'] = array("in", $id);
        }

        $mdata = M('ahld_mall');
        $data = $mdata->join(C('DB_PREFIX') . "ahld_mtype on " . C('DB_PREFIX') . "ahld_mtype.id=" . C('DB_PREFIX') . "ahld_mall.type")->field(C('DB_PREFIX') . "ahld_mall.*," . C('DB_PREFIX') . "ahld_mtype.name")->where($where)->order("id desc")->select();

        //开始生成excel内容
        /** 加载IOFactory包 */
        Vendor('Excel.Classes.PHPExcel'); //Vendor路径的写法参考ThinkPHP文档

        /** 错误信息 */
        error_reporting(E_ALL);

        $objReader = PHPExcel_IOFactory::createReader('Excel5'); //在内存中建一个excel2003操作
        //加载需要读取的模板放在内存的excel中，路径一定要对啊，我在index.php中用了define(ROOT, dirname(__FILE__));所以下面这样写
        $objPHPExcel = $objReader->load(ROOT . "/excel/template.xls");

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
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $dataRow ['id']); //编号
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $dataRow ['title']); //商家名称
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $dataRow ['score']); //排序
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $dataRow ['name']); //类别
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $dataRow ['addr']); //地址
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $dataRow ['tel']); //电话
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $dataRow ['summary']); //商家简介
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $dataRow ['content']); //商家介绍
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $dataRow ['per']); //返还百分比
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $dataRow ['longitude']); //经度
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $dataRow ['latitude']); //纬度
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $dataRow ['img']); //图片
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, date("Y-m-d H:i:s", $dataRow ['create_time'])); //创建时间
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, date("Y-m-d H:i:s", $dataRow ['update_time'])); //修改时间
        }
        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1); //作用：把最顶上面的那一空白行去掉
        //---------上面的代码是从30template.php（加载模板）中copy下来自己改成我想要————————————————
        //  ----------下面的代码是从01simple-download-xls.php（下载excel表格）中copy下来的-------
        //将得到的数据导出到excel中提供给用户下载
        // 将输出重新定向到客户端浏览器的(Excel5)
        $objPHPExcel->getActiveSheet()->setTitle('商家列表'); //设置excel表内的小标签的标题
        $filename = date('Y-m-d H:i:s', time());
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="商家列表' . $filename . '.xls"'); //要下载的excel文件的文件名，这设置了用当前时间作为文件名
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //在内存中准备一个excel2003文件
        $objWriter->save('php://output');
        exit();
    }

}
?>