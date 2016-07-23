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
    //App或平台部分接口调用
    const APP_API_URL = 'api';
    const APP_API_CODE = '50';

    private $token;
    private $username;
    private $password;
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
            $sign .= $key . (is_array($value) ? self::assemble($value) : substr($value, 0, self::APP_API_CODE));
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

    /**
     * 设置缓存，按需重载
     * @param string $cachename
     * @param mixed $value
     * @param int $expired
     * @return boolean
     */
    protected function setCache($cachename, $value, $expired) {
        F($cachename, $value);
        return true;
    }

    /**
     * 获取缓存，按需重载
     * @param string $cachename
     * @return mixed
     */
    protected function getCache($cachename) {
        return F($cachename);
    }

    /**
     * 清除缓存，按需重载
     * @param string $cachename
     * @return boolean
     */
    protected function removeCache($cachename) {
        F($cachename, null);
        return true;
    }

    /**
     * 构造url参数 
     * @param type $params
     * @return type
     */
    public function get_url_params($params) {
        $sign = self::gen_sign($params, $this->token);
        return $this->http_get('http://' . $this->ip . '/index.php/' . self::APP_API_URL . '?' . $this->params_to_str(array_merge(array('sign' => $sign), $params)));
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
