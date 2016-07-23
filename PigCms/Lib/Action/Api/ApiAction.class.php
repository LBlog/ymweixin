<?php

/**
 * 接口
 * 提供欢乐兑接口信息
 * @author syf <809745357@qq.com>
 * 
 */
class ApiAction extends HldBaseAction {

    public function _initialize() {
        
    }

    /**
     * 1级：每天推广1人，一个月30天，一个月下来就是30*99元/件=2970*0.38=1128.6元
     * 2级：您的30个客户每天也推广30个人，一个月下来等于推广900人，900*99/件=89100*0.08=7128元
     * 3级：您的二级客户的900人，每天也推广30人，就等于27000个三级会员，27000*99/件=2673000*0.04=106920元
     * 1级+2级+3级就是收入，简单地说也就是，从头到尾只买了98元的产品，然后推广30个人，最后得到几十万的收入!
     */
    public function credits() {
        if (IS_GET) {
            // 获取当前手机号码
//            if (isset($_GET["tel"])) {
//                $member_mobile = I('get.tel', '', 'htmlspecialchars');
//                $patternPhone = '/^(0|86|17951)?(13[0-9]|15[012356789]|1[78][0-9]|14[57])[0-9]{8}$/';
//                if (!preg_match($patternPhone, $member_mobile)) {
//                    $this->ajaxReturn(array('status' => '0', 'info' => '手机号码格式错误'));
//                }
//            }
//            F('pointfrom',$_GET['pointfrom'] );
//            F('hhhhhqweqweqw','测试积分划拨' );exit;
            if(isset($_GET["token"]) && $_GET["token"] == 'weixin'){
                
                $this->ajaxReturn(array('status' => '1', 'info' => 'weixin代理商分配积分不给于积分分佣'));
            }
            F('pointfrom',$_GET['pointfrom'] );
            if (!isset($_GET["token"]) || $_GET["token"] != 'plvmhl1467344437') {
                $this->ajaxReturn(array('status' => '0', 'info' => 'token错误'));
            }
            $member_id = $_GET["account_id"];
            if (!isset($_GET["account_id"]) || !is_numeric($member_id)) {
                $this->ajaxReturn(array('status' => '0', 'info' => '用户登录id错误'));
            }
            // 获取当前传入积分
            if (isset($_GET["integral"])) {
                $integral = I('get.integral', '', 'htmlspecialchars');
                if (!is_numeric($integral)) {
                    $this->ajaxReturn(array('status' => '0', 'info' => '积分参数格式错误'));
                }
            }

            // 获取当前用户配置的参数三级分类
            $percent_info = M('ahld_conf')->field('id,name,value')->where(array('type' => 2))->select();
            if ($percent_info['0']['value']) {
                $pointArr = explode(",", $percent_info['0']['value']);
            }

            // 判断当前参数是否正确
            count($pointArr) == 3 || $this->ajaxReturn(array('status' => '0', 'info' => '积分参数格式错误'));

            // 一级推广员
            $oneIntegral = number_format($integral * number_format($pointArr['0']) / 100, 2);
            // 二级推广员
            $twoIntegral = number_format($integral * number_format($pointArr['1']) / 100, 2);
            // 三级推广员
            $threeIntegral = number_format($integral * number_format($pointArr['2']) / 100, 2);

            $User = M('userinfo');
            $path = $User->field('id,wechaname,type,path')->where(array('member_id' => $member_id))->find();
            $wechaname = $path['wechaname'];
            // 判断当前会员是否为绑定微信
            if ($path['type'] == 0 || empty($path)) {
//                var_dump($path);
                $this->ajaxReturn(array('status' => '0', 'info' => '该会员还没有绑定微信'));
            }
            $return = '';
            $User->startTrans();
            // 判断当前用户是否有上级路径
            if ($path['path'] == 0) {
                // 自己是一级推广员
                $res = $User->where(array('member_id' => $member_id))->setInc('point', $oneIntegral);
                if (!$res) {
                    $User->rollback();
                    $this->ajaxReturn(array('status' => '0', 'info' => '一级积分分配失败'));
                }
                $this->pointLog($path['id'], $oneIntegral, '一级积分分配来源于会员账号' . $wechaname . '积分' . $integral . '*' . $pointArr['0'] . '%=' . $oneIntegral, '一级分佣', $path['id'], $wechaname);
            } else {

                $arr = explode('-', $path['path']);
                if (count($arr) >= 3) {
                    $threeId = array_slice($arr, -3, 1); // 倒数3个
                    if (!empty($threeId[0])) {
                        $res = $User->where(array('id' => $threeId[0]))->setInc('point', $threeIntegral);
                    }
                    if (!$res) {
                        $User->rollback();
                        $this->ajaxReturn(array('status' => '0', 'info' => '三级积分分配失败'));
                    }
                    $this->pointLog($threeId[0], $threeIntegral, '三级积分分配来源于会员账号' . $wechaname . '积分' . $integral . '*' . $pointArr['2'] . '%=' . $threeIntegral, '三级分佣', $path['id'], $wechaname);
                }
                if (count($arr) >= 2) {
                    $twoId = array_slice($arr, -2, 1); // 倒数2个
                    if (!empty($twoId[0])) {
                        $res = $User->where(array('id' => $twoId[0]))->setInc('point', $twoIntegral);
                    }
                    if (!$res) {
                        $User->rollback();
                        $this->ajaxReturn(array('status' => '0', 'info' => '二级积分分配失败'));
                    }
                    $this->pointLog($twoId[0], $twoIntegral, '二级积分分配来源于会员账号' . $wechaname . '积分' . $integral . '*' . $pointArr['1'] . '%=' . $twoIntegral, '二级分佣', $path['id'], $wechaname);
                }
                if (count($arr) >= 1) {
                    $oneId = array_slice($arr, -1, 1); // 倒数1个
                    if (!empty($oneId[0])) {
                        $res = $User->where(array('id' => $oneId[0]))->setInc('point', $oneIntegral);
                    }
                    if (!$res) {
                        $User->rollback();
                        $this->ajaxReturn(array('status' => '0', 'info' => '一级积分分配失败'));
                    }
                    $this->pointLog($oneId[0], $oneIntegral, '一级积分分配来源于会员账号' . $wechaname . '积分' . $integral . '*' . $pointArr['0'] . '%=' . $oneIntegral, '一级分佣', $path['id'], $wechaname);
                }
            }
            $User->commit();

            // 推送消息
            $this->pushMessage();
            $this->ajaxReturn(array('status' => '1', 'info' => '积分分配成功'));
        }
        header("HTTP/1.0 404 Not Found");
        exit;
    }

    

}
