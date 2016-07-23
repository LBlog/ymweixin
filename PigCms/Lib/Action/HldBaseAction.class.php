<?php

class HldBaseAction extends Action {

    protected function _initialize() {
        $this->user_info = M('userinfo')->where(array('wecha_id' => cookie("serviceopenid")))->find();
//        var_dump($this->user_info);exit;
        $this->authorizeRedirection();
        $this->user_info || $this->user_info = M('userinfo')->where(array('wecha_id' => cookie("serviceopenid")))->find();
        define('RES', THEME_PATH . 'common');
        define('STATICS', TMPL_PATH . 'static/hld');
    }

    /**
     * 用户授权功能实现
     * @access protected
     * @param array $this->params
     * @todo 要在授权后面添加可能用到的参数请在再数组后面添加
     */
    protected function authorizeRedirection() {
        $this->params = array(
            'pid' => isset($_GET['pid']) ? $_GET['pid'] : '',
        );
        $where = array('token' => 'plvmhl1467344437');
        $this->thisWxUser = M('Wxuser')->where($where)->find();
        $option = array(
            'appid' => $this->thisWxUser['appid'],
            'appsecret' => $this->thisWxUser['appsecret'],
            'token' => 'plvmhl1467344437',
            'encodingaeskey' => $this->thisWxUser['aeskey'],
        );
        $this->weObj = new WechatApi($option);
        $jsonAccessToken = $this->weObj->getOauthAccessToken();
        if (!$jsonAccessToken) {
            $serviceopenid = cookie("serviceopenid");
            if (empty($serviceopenid) || !$this->user_info) {
                C('JUDGE_SCOPE', 'snsapi_userinfo');
                $url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                if (is_null($this->params)) {
                    
                } else {
                    $aPOST = array();
                    foreach ($this->params as $key => $val) {
                        if (!empty($val)) {
                            $aPOST [] = $key . "&" . urlencode($val);
                        }
                    }
                    $url .= join("&", $aPOST);
                }
                $backurl = $this->weObj->getOauthRedirect($url);
                header("Location: " . $backurl);
                exit;
            }
        } else {
            $service_openid = $jsonAccessToken['openid'];
            $access_token = $jsonAccessToken['access_token'];
            $userInfo = $this->weObj->getOauthUserinfo($access_token, $service_openid);
            $user = M('userinfo');
            if (!empty($userInfo)) {
                $checkuser = $user->where(array('wecha_id' => $userInfo['openid']))->find();
                if (empty($checkuser['id'])) {
                    $data = array();
                    $data['wecha_id'] = $userInfo['openid'];
                    $data['wechaname'] = $userInfo['nickname'];
                    $data['sex'] = $userInfo['sex'];
                    $data['portrait'] = $userInfo['headimgurl'];
                    $data['token'] = 'plvmhl1467344437';
                    $data['city'] = $userInfo['city'];
                    $data['province'] = $userInfo['province'];
                    $data['create_time'] = date("Y-m-d H:i:s");
                    $data['type'] = 0; //游客
                    $user->add($data);
                }
            }
            cookie("serviceopenid", $service_openid);
        }
    }

    /**
     * 分享功能
     * @access public
     */
    public function share() {
        $where = array('token' => $_GET['token']);
        $this->thisWxUser = M('Wxuser')->where($where)->find();
        $apiOauth = new apiOauth();
        $access_token = $apiOauth->update_authorizer_access_token($this->thisWxUser['appid']);
        $weObj = new WechatApi();
        $weObj->checkAuth($appid = '', $appsecret = '', $access_token);
        $js_ticket = $weObj->getJsTicket($this->thisWxUser['appid']);
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $signPackage = $weObj->getJsSign($url, '', '', $this->thisWxUser['appid']);
        $this->assign('signPackage', $signPackage);
    }

    /**
     * 发送模版消息
     * @param type $data
     */
    public function pushMessage($data) {
        $where = array('token' => I("token", "", "htmlspecialchars"));
        $this->thisWxUser = M('Wxuser')->where($where)->find();
        $apiOauth = new apiOauth();
        $access_token = $apiOauth->update_authorizer_access_token($this->thisWxUser['appid']);
        $weObj = new WechatApi();
        $weObj->checkAuth($appid = '', $appsecret = '', $access_token);
        $weObj->sendTemplateMessage($data);
    }

    /**
     * 添加积分日志
     * @param type $integral
     */
    public function pointLog($member_id, $integral, $desc, $stage, $twitter_id, $twitter_wechaname) {
//        $member_wechanme = M('userinfo')->where(array('id' => $member_id))->getField('wechaname');
        $userinfo = M('userinfo')->field('wechaname,point,wecha_id,member_id')->where(array('id' => $member_id))->find();

        // 添加积分日志信息
        $data = array(
            'member_id' => $userinfo['member_id'],
            'member_wechaname' => $userinfo['wechaname'],
            'points' => $integral,
            'desc' => $desc,
            'stage' => $stage,
            'create_time' => time(),
            'twitter_id' => $twitter_id,
            'twitter_wechaname' => $twitter_wechaname,
            'token' => I("token", "", "htmlspecialchars"),
        );


        // 模版消息推送
        $message = array(
            'touser' => $userinfo['wecha_id'],
            'template_id' => 'remrDz2eGNZ8bHFEEkmNay8ERrK-s0whHl1sfZpFaL4',
            'url' => "http://" . $_SERVER["SERVER_NAME"] . U('Hld/Index/center', array('token' => I("token", "", "htmlspecialchars"))),
            'topcolor' => '#FF0000',
            'data' => array(
                'first' => array(
                    'value' => '您有积分变动，详情如下。',
                    'color' => '#173177',
                ),
                'account' => array(
                    'value' => $userinfo['wechaname'],
                    'color' => '#173177',
                ),
                'time' => array(
                    'value' => date("Y年m月d日 H:i:s"),
                    'color' => '#173177',
                ),
                'type' => array(
                    'value' => $desc,
                    'color' => '#173177',
                ),
                'creditChange' => array(
                    'value' => $stage,
                    'color' => '#173177',
                ),
                'number' => array(
                    'value' => abs($integral) . '积分',
                    'color' => '#173177',
                ),
                'creditName' => array(
                    'value' => '可兑换积分',
                    'color' => '#173177',
                ),
                'amount' => array(
                    'value' => $userinfo['point'] . '积分',
                    'color' => '#173177',
                ),
                'remark' => array(
                    'value' => '您可以点击下方菜单-个人中心-推客信息-推客积分，随时查询积分账户余额。',
                    'color' => '#173177',
                ),
            )
        );
        if (M('ahld_point_log')->add($data)) {
            $this->pushMessage($message);
            return true;
        }
        return false;
    }

}

?>
