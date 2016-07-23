<?php

/**
 * 亿盟欢乐兑接口说明
 * @author shenyifei <809745357@qq.com>
 * @version 1.0
 * @link http://www.huishuojs.com 杭州晖硕信息技术有限公司
 * 
 * $options = array(
 *     'ip' => '120.27.135.171',
 *     'token' => 'acbee97c8dbde1252df2a365ceac3100738c97b97035f7f6bb91b6e22acf0341',
 *     'username' => 'weixin',
 *     'password' => '123456',
 *     'url' => 'api',
 *     'code' => '50'
 * );
 * $heapi = new HappyExchangeAPI($options);
 * $res = $heapi->setsecretkey('zhangsan', 'zhangsan');
 */
class HappyExchangeApi {

    //代理商相关
    const METHOD_SET_SECRET_KEY = 'yytapi.agents.setsecretkey';
    const METHOD_GET_SECRET_KEY = 'yytapi.agents.getsecretkey';
    const METHOD_SET_TOKEN = 'yytapi.agents.settoken';
    const METHOD_GET_TOKEN = 'yytapi.agents.gettoken';
    const METHOD_GET_ACCESS_TOKEN = 'yytapi.agents.getaccesstoken';
    const METHOD_SIGN_IN = 'yytapi.agents.signin';
    const METHOD_AGENT_APPLYS = 'yytapi.agents.agent_applys';
    const METHOD_VERIF_AGENT = 'yytapi.agents.verif_agent';
    const METHOD_SEND_VCODE = 'yytapi.agents.sendVcode';
    const METHOD_RESET_PASSWORD = 'yytapi.agents.reset_password';
    const METHOD_AUTO_AREA = 'yytapi.agents.auto_area';
    const METHOD_AGENT_DETAIL = 'yytapi.agents.agent_detail';
    const METHOD_AGENT_POINT_LOG = 'yytapi.agents.agent_point_log';
    const METHOD_AGENT_POINT_DETAIL = 'yytapi.agents.agent_point_detail';
    const METHOD_AGENT_POINT_CONF = 'yytapi.agents.agent_point_conf';
    const METHOD_SAVE_AGENT_CREDIT = 'yytapi.agents.save_agent_credit';
    const METHOD_SAVE_AGENT_CONFIG = 'yytapi.agents.save_agent_config';
    const METHOD_SAVE_SUB_DISCOUNT = 'yytapi.agents.save_sub_discount';
    const METHOD_GET_MONEY = 'yytapi.agents.get_money';
    const METHOD_AGENT_SAVE_INTEGRAL = 'yytapi.agents.save_integral';
    const METHOD_GET_ALL_PAYMENTS = 'yytapi.agents.get_all_payments';
    const METHOD_SUB_COUNTS = 'yytapi.agents.sub_counts';
    const METHOD_SUBAGENT_LIST = 'yytapi.agents.subagent_list';
    const METHOD_SUBAGENT_DETAILS = 'yytapi.agents.subagent_details';
    const METHOD_SAVE_SUBAGENT_STATUS = 'yytapi.agents.save_subagent_status';
    const METHOD_CANCEL_AGENT = 'yytapi.agents.cancel_agent';
    const METHOD_AGENT_SUBAGENT = 'yytapi.agents.save_subagent';
    const METHOD_lOGOUT = 'yytapi.agents.logout';
    const METHOD_IMAGE_UPLOAD = 'yytapi.agents.image_upload';
    //子账号相关
    const METHOD_ACCOUNT_LIST = 'yytapi.accounts.account_list';
    const METHOD_ACCOUNT_DETAIL = 'yytapi.accounts.account_detail';
    const METHOD_ACCOUNT_MEMBER = 'yytapi.accounts.account_member';
    const METHOD_ADD_ACCOUNT = 'yytapi.accounts.add_account';
    const METHOD_VERIFY_ACCOUNT = 'yytapi.accounts.verify_account';
    const METHOD_DELETE_ACCOUNT = 'yytapi.accounts.delete_account';
    //会员相关
    const METHOD_SEACH_MEMBER = 'yytapi.members.seach_member';
    const METHOD_USER_OPENID_BINDING = 'yytapi.user.openid.binding';
    const METHOD_MEMBER_INDEX = 'yytapi.members.member_index';
    const METHOD_MEMBER_SAVE_INTEGRAL = 'yytapi.members.save_integral';
    const METHOD_VERIF_MEMBER = 'yytapi.members.verify_member';
    const METHOD_SAVE_MEMBER = 'yytapi.members.save_member';
    const METHOD_MEMBER_LIST = 'yytapi.members.member_list';
    //基本配置相关
    const METHOD_GET_AREA = 'yytapi.info.get_area';
    const METHOD_GET_AGENT_AGREEMENT = 'yytapi.info.get_agent_agreement';
    const METHOD_CHANGE_PASSWORD = 'yytapi.info.change_password';
    const METHOD_EDIT_DETAIL = 'yytapi.info.edit_detail';
    const METHOD_AUTHORITY = 'yytapi.info.authority';
    //App或平台部分接口调用
    const APP_API_URL = 'api';
    const APP_API_CODE = '50';
    //代理商接口调用
    const AGENT_HLDAPI_URL = 'hldapi';
    const AGENT_HLDAPI_CODE = '70';

    private $token;
    private $username;
    private $password;
    private $accesstoken;
    private $url;
    private $code;
    private $ip;
    public $errMsg = "";

    /**
     * 初始化
     * @param type $options
     */
    public function __construct($options) {
        $this->token = isset($options['token']) ? $options['token'] : '';
        $this->username = isset($options['username']) ? $options['username'] : '';
        $this->password = isset($options['password']) ? $options['password'] : '';
        $this->ip = isset($options['ip']) ? $options['ip'] : '';
        $this->url = isset($options['url']) ? $options['url'] : self::APP_API_URL;
        $this->code = isset($options['code']) ? $options['code'] : self::APP_API_CODE;
    }

    /**
     * 获取当前的sign
     * @param type $params
     * @param type $token
     * @return type
     */
    public function gen_sign($params = array(), $token = '') {
        if (!$token) {
            $token = $this->token;
        }
        return strtoupper(md5(strtoupper(md5(self::assemble($params))) . $token));
    }

    /**
     * 生成签名方法
     * @param type $params
     * @return string
     */
    public function assemble($params = array()) {
        if (!is_array($params)) {
            return null;
        }
        ksort($params, SORT_STRING);
        $sign = '';
        foreach ($params as $key => $value) {
            if (is_null($value)) {
                continue;
            }
            if (is_bool($value)) {
                $value = ($value) ? 1 : 0;
            }
            $sign .= $key . (is_array($value) ? self::assemble($value) : $value);
        }
        return $sign;
    }

    /**
     * yytapi.agents.setsecretkey设置验证信息，设置secret和key,设置后代理商才有权限连接api
     * @param type $username
     * @param type $password
     */
    public function setsecretkey($username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $authname = 'ym_secret_key' . self::APP_API_URL . $username;
        $this->removeCache($authname);

        $result = $this->get_url_params(array('method' => self::METHOD_SET_SECRET_KEY, 'username' => $username, 'password' => $password));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * yytapi.agents.getsecretkey代理商获取secretkey
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function getsecretkey($username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }

        $authname = 'ym_secret_key' . self::APP_API_URL . $username;
        if ($data = $this->getCache($authname)) {
            return $data;
        }
        $result = $this->get_url_params(array('method' => self::METHOD_GET_SECRET_KEY, 'username' => $username, 'password' => $password));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            $data = $json['data'];
            $this->setCache($authname, $data);
            return $data;
        }
        return false;
    }

    /**
     * yytapi.agents.settoken设置token，签名验证时使用 
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function settoken($username = '', $password = '', $token = '2d645ef8c2025499b6dd77596d7') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }

        $authname = 'ym_agents_token' . self::APP_API_URL . $username;
        $this->removeCache($authname);

        $result = $this->get_url_params(array('method' => self::METHOD_SET_TOKEN, 'username' => $username, 'password' => $password, 'token' => $token));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * yytapi.agents.gettoken代理商获取token 
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function gettoken($username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $authname = 'ym_agents_token' . self::APP_API_URL . $this->$username;
        if ($data = $this->getCache($authname)) {
            return $data;
        }
        $result = $this->get_url_params(array('method' => self::METHOD_GET_TOKEN, 'username' => $username, 'password' => $password));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            $data = $json['data'];
            $this->setCache($authname, $data);
            return $data;
        }
        return false;
    }

    /**
     * yytapi.agents.getaccesstoken代理商获取accesstoken令牌，有令牌后才能处理数据
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function getaccesstoken($username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $data = $this->getsecretkey($username, $password);
        $agentKey = $data['agentKey'];
        $agentSecret = $data['agentSecret'];

        $authname = 'ym_access_token' . self::APP_API_URL . $username;
        if ($data = $this->getCache($authname)) {
            var_dump($data);
            return $data;
        }
        $result = $this->get_url_params(array('method' => self::METHOD_GET_ACCESS_TOKEN, 'agentKey' => $agentKey, 'agentSecret' => $agentSecret));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            $data = $json['data'];
            $this->setCache($authname, $data);
            return $data;
        }
        return false;
    }

    /*     * ***************************************************
     * 代理商相关
     * **************************************************** */



    /*     * ***************************************************
     * 会员相关
     * **************************************************** */

    /**
     * yytapi.members.seach_member查找会员
     * @param type $username
     * @param type $password
     * @param type $member_login
     * @param type $member_mobile
     * @return boolean
     */
    public function seach_member($member_login = '', $member_mobile = '', $username = '', $password = '') {
        if (empty($member_login) && empty($member_mobile)) {
            return 'member_login，member_mobile必须填写一个参数，不能都为空';
        }
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $data = $this->getaccesstoken($username, $password);
        $account_id = $data['account_id'];
        $accesstoken = $data['accesstoken'];
        $result = $this->get_url_params(array('method' => self::METHOD_SEACH_MEMBER, 'account_id' => $account_id, 'accesstoken' => $accesstoken, 'member_login' => $member_login, 'member_mobile' => $member_mobile));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 会员微信绑定功能实现
     * @param type $username
     * @param type $password
     * @param type $openid
     * @param type $time
     * @return boolean|string
     */
    public function member_binding($username = '', $password = '', $openid = '', $time = '') {
        // 引入文件
        $private_key_path = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/PigCms/Lib/ORG/Ym/private_key.pem";
        $priv_key = file_get_contents($private_key_path);
        $p_key = openssl_get_privatekey($priv_key);
        $encrypted = '';
        // 加密
        openssl_private_encrypt($password, $encrypted, $p_key);
        // base64加密
        $encrypted = stripslashes(base64_encode($encrypted));
        $result = $this->get_url_params(array('method' => self::METHOD_USER_OPENID_BINDING, 'username' => $username, 'password' => $encrypted, 'openid' => $openid));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * yytapi.members.member_index我的会员首页
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function save_integral($member_id = '', $point = '', $memo = '', $username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $data = $this->getaccesstoken($username, $password);
        $account_id = $data['account_id'];

        $accesstoken = $data['accesstoken'];
        $result = $this->get_url_params(array('method' => self::METHOD_MEMBER_SAVE_INTEGRAL, 'member_id' => $member_id, 'point' => $point, 'memo' => $memo, 'account_id' => $account_id, 'accesstoken' => $accesstoken));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }
    
    /**
     * yytapi.members.member_index我的会员首页
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function member_index($username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $data = $this->getaccesstoken($username, $password);
        $account_id = $data['account_id'];
        $accesstoken = $data['accesstoken'];
        $result = $this->get_url_params(array('method' => self::METHOD_MEMBER_INDEX, 'account_id' => $account_id, 'accesstoken' => $accesstoken));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * yytapi.members.verify_member添加会员时验证
     * @param type $member_mobile
     * @param type $member_login
     * @param type $member_password
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function verify_member($member_mobile = '', $member_login = '', $member_password = '', $username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $data = $this->getaccesstoken($username, $password);
        $accesstoken = $data['accesstoken'];
        $result = $this->get_url_params(array('method' => self::METHOD_VERIF_MEMBER, 'member_mobile' => $member_mobile, 'member_login' => $member_login, 'member_password' => $member_password, 'accesstoken' => $accesstoken));
//        var_dump($result);exit;
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * yytapi.members.save_member保存会员
     * @param type $member_mobile
     * @param type $member_login
     * @param type $member_password
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function save_member($member_mobile = '', $member_login = '', $member_password = '', $username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $data = $this->getaccesstoken($username, $password);
        $account_id = $data['account_id'];
        $accesstoken = $data['accesstoken'];
        $result = $this->get_url_params(array('method' => self::METHOD_SAVE_MEMBER, 'member_mobile' => $member_mobile, 'member_login' => $member_login, 'member_password' => $member_password, 'account_id' => $account_id, 'accesstoken' => $accesstoken));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * yytapi.members.member_list我的会员列表，支持模糊搜索
     * @param type $username
     * @param type $password
     * @param type $where
     * @param type $page
     * @return boolean
     */
    public function member_list($where = '1', $page = 20, $username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }
        $data = $this->getaccesstoken($username, $password);
        $account_id = $data['account_id'];
        $accesstoken = $data['accesstoken'];
        $result = $this->get_url_params(array('method' => self::METHOD_MEMBER_LIST, 'account_id' => $account_id, 'accesstoken' => $accesstoken, 'where_key' => $where, 'page' => $page));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $json;
        }
        return false;
    }

    /**
     * 设置缓存，按需重载
     * @param string $cachename
     * @param mixed $value
     * @param int $expired
     * @return boolean
     */
    protected function setCache($cachename, $value, $expired) {
//        $Cache = Cache::getInstance();
//        $Cache->set($cachename, $value, $expired);
        return true;
    }

    /**
     * 获取缓存，按需重载
     * @param string $cachename
     * @return mixed
     */
    protected function getCache($cachename) {
//        $Cache = Cache::getInstance();
//        return $Cache->get($cachename);
        return false;
    }

    /**
     * 清除缓存，按需重载
     * @param string $cachename
     * @return boolean
     */
    protected function removeCache($cachename) {
//        $Cache = Cache::getInstance();
//        $Cache->rm($cachename);
//        return true;
        return false;
    }

    /**
     * yytapi.agents.signin 代理商登录
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function signin($username = '', $password = '') {
        if (!$username || !$password) {
            $username = $this->username;
            $password = $this->password;
        }

        $authname = 'ym_signin_access_token' . self::APP_API_URL . $username;
        if ($data = $this->getCache($authname)) {
            $this->data = $data;
            return $data;
        }
        $result = $this->get_url_params(array('method' => self::METHOD_SIGN_IN, 'username' => $username, 'password' => $password));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            $this->data = $json['data'];
            $expire = $json['data']['sess_time'];
            $this->setCache($authname, $this->data, $expire);
            return $this->data;
        }
        return false;
    }

    /**
     * yytapi.agents.logout退出
     * @param type $username
     * @param type $accesstoken
     * @return boolean
     */
    public function logout($username = '', $accesstoken = '') {

        if (!$username || !$accesstoken) {
            $username = $this->username;
            $authname = 'ym_signin_access_token' . self::APP_API_URL . $username;
            if ($data = $this->getCache($authname)) {
                $accesstoken = $data['accesstoken'];
            } else {
                return true;
            }
        }
        $this->removeCache($authname);

        $result = $this->get_url_params(array('method' => self::METHOD_lOGOUT, 'accesstoken' => $accesstoken));
        if ($result) {
            $json = json_decode($result, true);
            if (!$json || $json['rsp'] == 'fail') {
                $this->errMsg = $json['data']['message'];
                return false;
            }
            return $result;
        }
        return false;
    }

    /**
     * 构造url参数 
     * @param type $params
     * @return type
     */
    public function get_url_params($params) {
        $sign = self::gen_sign($params, $this->token);
//        echo 'http://' . $this->ip . '/index.php/' . $this->url . '?' . $this->params_to_str(array_merge(array('sign' => $sign), $params));
        return $this->http_get('http://' . $this->ip . '/index.php/' . $this->url . '?' . $this->params_to_str(array_merge(array('sign' => $sign), $params)));
    }

    /**
     * 输入处理
     * @param type $param
     * @return type
     */
    private function params_to_str($param) {
        if (is_string($param)) {
            $str = $param;
        } else {
            $a = array();
            foreach ($param as $key => $val) {
                $a[] = $key . "=" . urlencode($val);
            }
            $str = join("&", $a);
        }
        return $str;
    }

    /**
     * GET 请求
     * @param string $url
     */
    private function http_get($url) {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }

    /**
     * POST 请求
     * @param string $url
     * @param array $param
     * @param boolean $post_file 是否文件上传
     * @return string content
     */
    private function http_post($url, $param, $post_file = false) {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        if (is_string($param) || $post_file) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach ($param as $key => $val) {
                $aPOST[] = $key . "=" . urlencode($val);
            }
            $strPOST = join("&", $aPOST);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($oCurl, CURLOPT_POST, true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS, $strPOST);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }

}
