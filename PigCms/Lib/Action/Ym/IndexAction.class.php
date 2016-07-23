<?php

/**
 * 测试亿盟接口文件不能用于生产环境
 * @author shenyifei <809745357@qq.com>
 * @version 1.0
 */
class IndexAction extends Action {

    /**
     * 导入相关文件
     */
    public function _initialize() {
//        parent::_initialize();
        import("@.ORG.Ym.HappyExchangeApi");
    }

    /**
     * 测试入口
     * @link http://syf.pigcms.local/index.php?g=Ym&m=Index&a=index 测试入口
     * @access public
     */
    public function index() {
        $options = array(
            'ip' => '120.27.135.171',
            'token' => 'acbee97c8dbde1252df2a365ceac3100738c97b97035f7f6bb91b6e22acf0341',
            'username' => 'weixin',
            'password' => '123456',
            'url' => 'api',
            'code' => '50',
        );
        $heapi = new HappyExchangeApi($options);
//        $res = $heapi->settoken();
//        $res = $heapi->setsecretkey();
        $res = $heapi->getsecretkey();
//        var_dump($res);
        $res = $heapi->save_member('18367831980', '809745357@qq.com', '@syfily4er');
//        $options = array(
//            'ip' => '120.27.135.171',
//            'token' => $res['token'],
//            'username' => 'weixin',
//            'password' => '123456',
//            'url' => 'hldapi',
//            'code' => '50',
//        );
//        $hehldapi = new HappyExchangeApi($options);
//        $res = $hehldapi->getaccesstoken();
        
        if (!$res) {
            echo $heapi->errMsg;
        }else{
            var_dump($res);
        }
    }

}
