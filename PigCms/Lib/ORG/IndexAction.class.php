<?php

/**
 * 推客中心开发
 * @version 1.0.0
 * @author shenyifei <809745357@qq.com>
 */
class IndexAction extends HldBaseAction {

    /**
     * 构造函数
     */
    public function _initialize() {
        parent::_initialize();
        import("@.ORG.Ym.HappyExchangeApi");
        $this->heapi = new HappyExchangeApi(C('options'));
    }

    /**
     * 推客首页
     */
    public function index() {
        $this->user_info['type'] != '0' && header("Location: " . U('Hld/Index/center', array('token' => $_GET['token'])));
        $this->display('register');
    }

    /**
     * 微信绑定功能开发
     * @access public
     */
    public function binding() {
        $this->user_info['type'] != '0' && header("Location: " . U('Hld/Index/center', array('token' => $_GET['token'])));
        if (IS_AJAX) {
            // 判断当前输入的信息是账号，昵称，手机号码
            if (isset($_POST["username"])) {
                $username = I('post.username', '', 'htmlspecialchars');
                $patternEmail = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
                $patternPhone = '/^(0|86|17951)?(13[0-9]|15[012356789]|1[78][0-9]|14[57])[0-9]{8}$/';
                if (preg_match($patternEmail, $username)) {
                    $member_email = $username;
                } else if (preg_match($patternPhone, $username)) {
                    $member_mobile = $username;
                } else {
                    $member_login = $username;
                }
            }
            $member_password = I('post.password', '', 'htmlspecialchars');
            // 判断当前输入的账号是否能够登录欢乐兑
            $res = $this->heapi->member_binding($username, $member_password, cookie("serviceopenid"));
            if (!$res) {
                $this->error('系统正在维护，稍后再试' . $this->heapi->errMsg);
            }
//            var_dump($res);echo cookie("serviceopenid");exit;
            $update = array(
                'hld_username' => $username,
                'hld_password' => md5('huanledui' . $member_password),
                'member_id' => $res['data']['member_id'],
                'type' => '1',
            );

            $res = M('userinfo')->where(array('id' => $this->user_info['id']))->save($update);
            if (!empty($res)) {
                $this->success('恭喜您绑定欢乐兑账号成功，成为推客！', U('Hld/Index/index', array('token' => $_GET['token'])));
            }
            $this->error('绑定欢乐兑账号失败！');
        }
        $this->display('binding');
    }

    /**
     * 微信会员注册
     * @access public
     */
    public function register() {
        //抛弃
        exit;
        $this->user_info['type'] != '0' && header("Location: " . U('Hld/Index/center', array('token' => $_GET['token'])));
        if (IS_POST) {
            $verifycode = $this->_post('verifycode', 'md5', 0);
            if ($verifycode != $_SESSION['loginverify']) {
//                echo $verifycode . "<br/>" . $_SESSION['loginverify'];
//                exit;
                $this->error('验证码错误', U('Hld/Index/register', array('token' => $_GET['token'])));
            }
            $member_mobile = '';
            $member_login = '';
            if (isset($_POST["username"])) {
                $username = I('post.username', '', 'htmlspecialchars');
                $patternPhone = '/^(0|86|17951)?(13[0-9]|15[012356789]|1[78][0-9]|14[57])[0-9]{8}$/';
                if (preg_match($patternPhone, $username)) {
                    $member_mobile = $username;
                } else {
                    $member_login = $username;
                }
            }
            $member_password = I("post.password", "", "htmlspecialchars");
            $confirm_password = I("post.confirm_password", "", "htmlspecialchars");
            if ($member_password != $confirm_password) {
                $this->error('两次密码输入不相等', U('Hld/Index/register', array('token' => $_GET['token'])));
            }

            $res = $this->heapi->verify_member($member_mobile, $member_login, $member_password);
            if (!$res) {
                $this->error($this->heapi->errMsg, U('Hld/Index/register', array('token' => $_GET['token'])));
            }
            $res = $this->heapi->save_member($member_mobile, $member_login, $member_password);
            if ($json['data']['status'] && $json['data']['message'] == '添加成功') {
                $update = array(
                    'hld_username' => $username,
                    'hld_password' => md5('huanledui' . $member_password),
                    'member_id' => $res['member_id'],
                    'type' => '2',
                );
                $res = M('userinfo')->where(array('id' => $this->user_info['id']))->save($update);
                if (!empty($res)) {
                    $this->success('注册欢乐兑账号完成！', U('Hld/Index/index', array('token' => $_GET['token'])));
                }
                $this->error('注册欢乐兑账号失败！');
            } else {
                $this->error($this->heapi->errMsg . $member_login . $member_mobile . $member_password, U('Hld/Index/register', array('token' => $_GET['token'])));
            }
        }

        $this->display('register');
    }

    /**
     * 个人中心页面
     * @access public
     */
    public function center() {
        $this->user_info['type'] == '0' && header("Location: " . U('Hld/Index/binding', array('token' => $_GET['token'])));
        $this->assign('userinfo', $this->user_info);
        $this->share();
        $share = array(
            'title' => $this->user_info['wechaname'] . '成为了欢乐兑的推客',
            'desc' => '成为推客赢取积分，快来参与吧！！！',
            'url' => "http://" . $_SERVER["SERVER_NAME"] . U('Hld/Index/bindTwitter', array('token' => $GET['token'], 'pid' => $this->user_info['id'], 'source' => '1')),
            'imgurl' => $this->user_info['portrait'],
        );
        $this->assign('share', $share);
        $this->display('center');
    }

    /**
     * 成为推客
     * @access public
     */
    public function apply() {
        $this->user_info['type'] != '1' && header("Location: " . U('Hld/Index/binding', array('token' => $_GET['token'])));
        if (IS_AJAX) {
            $update = I('post.');
            $update['type'] = '2';
            $where = array('id' => $this->user_info['id']);
            $res = M('userinfo')->where($where)->save($update);
            if (!empty($res)) {
                $this->success('恭喜您成为了推客！', U('Hld/Index/center', array('token' => $_GET['token'])));
            } else {
                $this->error('抱歉，请稍后再试！');
            }
        }
        $this->assign('content', M("ahld_conf")->where(array('id' => '6'))->find());
        $this->display('apply');
    }

    /**
     * 我的好友
     * @access public
     */
    public function friends($pid = '') {
        $this->user_info['type'] != '2' && header("Location: " . U('Hld/Index/binding', array('token' => $_GET['token'])));
        $pid || $pid = $this->user_info['id'];
        $where = array('pid' => $pid);
        $userinfo = M('userinfo')->where($where)->select();

        $this->assign('count', M("userinfo")->where(array('path' => array("like", $pid . '-%')))->count());
        $this->assign('twitterinfo', $userinfo);
        $this->assign('userinfo', $this->user_info);
        $this->display('friends');
    }

    /**
     * 积分管理
     * @access public
     */
    public function points() {
        $this->user_info['type'] != '2' && header("Location: " . U('Hld/Index/binding', array('token' => $_GET['token'])));
        $this->assign('userinfo', $this->user_info);
        if (IS_AJAX) {
            $pointslog = M("ahld_point_log");
            $where = array('member_id' => $this->user_info['member_id']);
            $page_size = C('hld_page_size') ? C('hld_page_size') : 10;
//            $page_size = 3;
            $page = I('post.page');
            $offset = ($page - 1) * $page_size;
            $order = 'create_time desc';
            $pointslist = $pointslog->where($where)->limit($offset, $page_size + 1)->order($order)->select();
//            var_dump($pointslist);
            foreach ($pointslist as $key => $value) {
                $pointslist[$key]['create_time'] = date("Y-m-d H:i:s", $pointslist[$key]['create_time']);
            }
            $count = count($pointslist);
            if ($count > $page_size) {
                $msg = "点击查看下一页...";
                $next = 1;
                array_pop($pointslist);
            } elseif ($count) {
                $msg = "没有更多了...";
                $next = 2;
            } else {
                $msg = "暂无数据";
                $next = 2;
            }
            $data['msg'] = $msg;
            $data['next'] = $next;
            $data['data'] = $pointslist;
            $data['page'] = $page + 1;
            $this->success($data);
        }
        $this->display('points');
    }

    public function hh() {
        // 积分划拨
        F('hhhhh','测试积分划拨' );
        $res = $this->heapi->save_integral('396', $integral = '10', $desc = '测试积分划拨');
        var_dump($res);
    }

    /**
     * 兑换积分
     * @access public
     */
    public function exchangeIntegral() {
        // 积分兑换
        if (IS_AJAX) {
            // 获取积分兑换数量，默认为当前可兑换积分去整
            $integral = I("integral", "", "htmlspecialchars");
            $integral || $integral = number_format($this->user_info['point']);

            // 减少会员积分
            M("userinfo")->where(array('id' => $this->user_info['id']))->setDec('point', $integral);

            $desc = '微信端绑定推客主动兑换积分' . $integral;
            // 积分划拨
            $res = $this->heapi->save_integral($this->user_info['member_id'], $integral, $desc);

            // 添加积分兑换记录模板消息推送
            $stage = '积分兑换';
            $twitter_id = $this->user_info['id'];
            $twitter_wechaname = $this->user_info['wechaname'];
            $res = $this->pointLog($this->user_info['id'], $integral, $desc, $stage, $twitter_id, $twitter_wechaname);
            if ($res) {
                $this->success('积分兑换成功', U('Hld/Index/points', array('token' => I("token", "", "htmlspecialchars"))));
            }
            $this->error('积分兑换失败');
        }
    }

    /**
     * 生成二维码
     * @access public
     */
    public function ewm() {
        $this->user_info['type'] != '2' && header("Location: " . U('Hld/Index/binding', array('token' => $_GET['token'])));
        // 判断当前用户是否存在二维码
        $qrcode_id = $this->user_info['qrcode_id'];
        if (empty($qrcode_id)) {
            // 添加二维码记录表返回参数记入到用户表
            $data['scene_id'] = 'binding|' . $this->user_info['id'];
            $data['keyword'] = "推客+" . $this->user_info['id'];
            $data['token'] = $_GET['token'];
            $data['attention_num'] = 0;
            $data['code_url'] = $this->qrcode('binding|' . $this->user_info['id'], 2, 604800);
            $data['status'] = 0;
            $qrcode_id = M("ahld_qrcode")->add($data);
            // 添加关键字回复表信息
            unset($data);
            $data['keyword'] = "推客+" . $this->user_info['id'];
            $data['pid'] = 0;
            $data['token'] = $_GET['token'];
            $data['module'] = "Huanledui";
            $data['precision'] = 0;
            $data['precisions'] = 0;
            M("keyword")->add($data);
            $update['qrcode_id'] = $qrcode_id;
            M("userinfo")->where(array('id' => $this->user_info['id']))->save($update);
        }
        $qrcodeArr = M("ahld_qrcode")->where(array('id' => $qrcode_id))->find();
        $this->assign('qrcode', $qrcodeArr['code_url']);

        $qrcodeBgImgArr = M('ahld_conf')->field('id,name,value')->where(array('id' => 5))->find();
        $this->assign('qrcodeBgImgArr', $qrcodeBgImgArr['value']);
        $this->display('ewm');
    }

    /**
     * 生成二维码方式
     * @param type $scene_id
     * @param type $type
     * @param type $expire
     * @return type
     */
    public function qrcode($scene_id, $type = 0, $expire = 604800) {
        $where = array('token' => $_GET['token']);
        $this->thisWxUser = M('Wxuser')->where($where)->find();
        $apiOauth = new apiOauth();
        $access_token = $apiOauth->update_authorizer_access_token($this->thisWxUser['appid']);
        $weObj = new WechatApi();
        $weObj->checkAuth($appid = '', $appsecret = '', $access_token);
        $res = $weObj->getQRCode($scene_id, $type, $expire);
        return $res = $weObj->getQRUrl($res['ticket']);
    }

    /**
     * 分享专用页面
     * @access public
     */
    public function bindTwitter() {
        $pid = I('pid', '', 'htmlspecialchars');
        $where = array('id' => $pid);
        $parent_user_info = M('userinfo')->where(array('id' => $pid))->find();
        if (empty($parent_user_info)) {
            echo '该上级推客不存在！！！';
            $this->error('该上级推客不存在！！！', U('Hld/Index/index', array('token' => $GET['token'])));
            exit;
        }
        //todo 判断当前用户是否关注这个公众账号
        // 判断当前用户是否有上级推荐人
        $id = $this->user_info['id'];
        if (empty($this->user_info['pid']) && ($this->user_info['type'] != 2)) {
            // 没有上级推广人的时候，添加该上级推广人
            $update['pid'] = $pid;
            // 获取推广人路径
            $update['path'] = empty($parent_user_info['path']) ? $pid . '-' . $id : $parent_user_info['path'] . '-' . $id;
            $update['bind_time'] = date("Y-m-d H:i:s");
            M('userinfo')->where(array('id' => $id))->save($update);
            // 发给好友
            $message = array(
                'touser' => $parent_user_info['wecha_id'],
                'template_id' => 'v-rizefc7C2rd5uCDjYVImAmy49Ll7vJ6cg6lQGJtlI',
                'url' => "http://" . $_SERVER["SERVER_NAME"] . U('Hld/Index/friends', array('token' => $GET['token'])),
                'topcolor' => '#FF0000',
                'data' => array(
                    'first' => array(
                        'value' => '您有新的好友成为你的推客，详情如下。',
                        'color' => '#173177',
                    ),
                    'keyword1' => array(
                        'value' => $this->user_info['wechaname'] . '绑定成为你的下级推客（需要下级微信号绑定欢乐兑账号才能激活）',
                        'color' => '#173177',
                    ),
                    'keyword2' => array(
                        'value' => '绑定完成，未激活',
                        'color' => '#173177',
                    ),
                    'remark' => array(
                        'value' => '您可以点击下方菜单-个人中心-推客好友，随时查询推客好友。',
                        'color' => '#173177',
                    ),
                )
            );
            $this->pushMessage($message);
            // 发给自己
            $message = array(
                'touser' => $this->user_info['wecha_id'],
                'template_id' => 'v-rizefc7C2rd5uCDjYVImAmy49Ll7vJ6cg6lQGJtlI',
                'url' => "http://" . $_SERVER["SERVER_NAME"] . U('Hld/Index/index', array('token' => $GET['token'])),
                'topcolor' => '#FF0000',
                'data' => array(
                    'first' => array(
                        'value' => '正在绑定下级推客信息，详情如下。',
                        'color' => '#173177',
                    ),
                    'keyword1' => array(
                        'value' => '扫描好友二维码主动绑定。（点我激活）',
                        'color' => '#173177',
                    ),
                    'keyword2' => array(
                        'value' => '绑定完成，未激活',
                        'color' => '#173177',
                    ),
                    'remark' => array(
                        'value' => '您可以点击下方菜单-个人中心-推客信息，激活您的账号。',
                        'color' => '#173177',
                    ),
                )
            );
            $this->pushMessage($message);
        } else if ($this->user_info['id'] == $pid) {
            header("Location: " . U('Hld/Index/index', array('token' => $_GET['token'])));
        } else if ($this->user_info['type'] == 2) {
            $this->error('您已经是推客了不能成为其他好友的推客了！！！', U('Hld/Index/index', array('token' => $GET['token'])));
            exit;
        } else {
            $this->error('您已经成为其他好友的推客了！！！', U('Hld/Index/index', array('token' => $GET['token'])));
            exit;
        }
    }

}

?>