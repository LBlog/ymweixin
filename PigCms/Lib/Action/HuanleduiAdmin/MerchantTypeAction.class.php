<?php

/*
 * 功能:商家分类管理控制器
 * date:2016/06/25
 * @par  Ver 1.00 Created by huangweiming
 * */

class MerchantTypeAction extends UserAction {

    /**
     * 商家分类模型全局变量
     * @var type 
     */
    public $_model;

    public function _initialize() {
        parent::_initialize();
        $this->_model = M('ahld_mtype');
    }

    /**
     * 列表展示分类信息
     * @access public
     * 
     */
    public function mlist() {

        // 标识所属公众账号
        $where['token'] = $this->token;
        // 判断当前用户是否点击搜索按钮进入页面
        IS_POST && $where['name'] = array("like", '%' . I('name', '', 'htmlspecialchars') . "%");

        $count = $this->_model->where($where)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $data = $this->_model->where($where)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        //查找上一类和下一类
        foreach ($data as $k => $v) {
            $up = $this->_model->where(array("id" => $v['pid']))->field("id,name")->find();
            $next = $this->_model->where(array('pid' => $v['id']))->field("id,name")->select();
            if ($next) {
                $nexts = array();
                foreach ($next as $ke => $value) {
                    $nexts[] = $value['name'];
                }
                $nexts = join(",", $nexts);
                $data[$k]['next'] = $nexts;
            } else {
                $data[$k]['next'] = '--';
            }
            if ($up) {
                $data[$k]['up'] = $up['name'];
            } else {
                $data[$k]['up'] = '--';
            }
        }
        $this->assign('page', $show);
        $this->assign('dat', $data);
        $this->display();
    }

    /*
     * 功能:添加商家分类
     * date:2016/06/29
     * @par: Ver 1.00 Created by huangweiming shenyifei
     * */

    public function add() {
        //查询类型显示当前上级分类信息
        $type = $this->_model->field('id,pid,name')->order('num asc')->select();
        $type = self::keachdo($type);
        $this->assign('type', $type);
        $this->display();
    }

    /**
     * 功能:修改商家分类
     * date:2016/06/29
     * @par: Ver 1.00 Created by huangweiming shenyifei
     * */
    public function update() {
        $id = I('id', '', 'htmlspecialchars');
        $data = $this->_model->where(array('id' => $id, 'token' => $this->token))->find();
        //查询类型
        $type = $this->_model->field('id, pid, name')->order('num asc')->select();
        $child = self::get_child($type, $id);
        foreach ($type as $key => $v) {
            if ($v['id'] == $id) {
                unset($type[$key]);
            } else {
                foreach ($child as $ke => $value) {
                    if ($value == $v['id']) {
                        unset($type[$key]);
                    }
                }
            }
        }
        $type = array_values(array_filter($type));
        $type = self::keachdo($type);
        $this->assign('data', $data);
        $this->assign('type', $type);
        $this->display();
    }

    /**
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
     * 功能:删除商家分类
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
            //删除该商家分类下的所有子类
            $data = $this->_model->field("id,pid,name")->select();
            if (is_array($id)) {
                foreach ($id as $key => $value) {
                    $child = self::get_child($data, $value);
                    if ($child) {
                        $wherec = 'id in(' . implode(',', $child) . ')';
                        $del = $this->_model->where($wherec)->delete();
                    }
                }
            } else {
                $child = self::get_child($data, $id);
                if ($child) {
                    $wherec = 'id in(' . implode(',', $child) . ')';
                    $del = $this->_model->where($wherec)->delete();
                }
            }
            $this->success('删除成功', U('HuanleduiAdmin/MerchantType/mlist', array('token' => $this->token)));
        } else {
            $this->error('删除失败', U('HuanleduiAdmin/MerchantType/mlist', array('token' => $this->token)));
        }
    }

    /*
     * @brief 导出商家分类并下载到客户端
     * @param Null
     * @par 2016/07/06 ver 1.0 created by huangweiming
     * */

    public function excel_out() {
        //将需要导出到excel的数据查询出来
        $id = $_GET['id'];
        $where = '';
        if ($id) {
            $where[C('DB_PREFIX') . 'ahld_mtype.id'] = array("in", $id);
        }

        $mdata = M('ahld_mtype');
        $data = $mdata->where($where)->order("id desc")->select();

        //开始生成excel内容
        /** 加载IOFactory包 */
        Vendor('Excel.Classes.PHPExcel'); //Vendor路径的写法参考ThinkPHP文档

        /** 错误信息 */
        error_reporting(E_ALL);

        $objReader = PHPExcel_IOFactory::createReader('Excel5'); //在内存中建一个excel2003操作
        //加载需要读取的模板放在内存的excel中，路径一定要对啊，我在index.php中用了define(ROOT, dirname(__FILE__));所以下面这样写
        $objPHPExcel = $objReader->load(ROOT . "/excel/tb_merchant_type.xls");

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
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $dataRow ['id']); //商家分类编号
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $dataRow ['name']); //商家分类名称
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $dataRow ['pid']); //父类id
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $dataRow ['level']); //类型等级0表示顶级分类
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $dataRow ['img']); //图片
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $dataRow ['num']); //序号(排列号)
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $dataRow ['token']); //返还百分比
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, date("Y-m-d H:i:s", $dataRow ['create_time'])); //创建时间
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, date("Y-m-d H:i:s", $dataRow ['update_time'])); //修改时间
        }
        $objPHPExcel->getActiveSheet()->removeRow($baseRow - 1, 1); //作用：把最顶上面的那一空白行去掉
        //---------上面的代码是从30template.php（加载模板）中copy下来自己改成我想要————————————————
        //  ----------下面的代码是从01simple-download-xls.php（下载excel表格）中copy下来的-------
        //将得到的数据导出到excel中提供给用户下载
        // 将输出重新定向到客户端浏览器的(Excel5)
        $objPHPExcel->getActiveSheet()->setTitle('商家分类列表'); //设置excel表内的小标签的标题
        $filename = date('Y-m-d H:i:s', time());
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="商家分类列表' . $filename . '.xls"'); //要下载的excel文件的文件名，这设置了用当前时间作为文件名
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //在内存中准备一个excel2003文件
        $objWriter->save('php://output');
        exit();
    }

}

?>
