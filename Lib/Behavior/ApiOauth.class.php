<?php
namespace Lib\Vendor;
/*
 * 功能：微信授权
* create by chenqi 2016年1月16日
* */
class ApiOauth
{
	public $appId;//应用id
	public $appSecret;//应用密钥
	public $encodingAesKey;//消息加解密密钥
	public $oauthinfo = 1;//获取信息1：snsapi_userinfo用户同意  0：snsapi_base 静默安装
	
	public $verify_ticket;
	public $component_verify_ticket;
	public $error;

	public function __construct()
	{
		$this->weixin_account();
	}
	/*
	 * 获取微信公众号信息
	 * */
	public function weixin_account()
	{		
		$this->appId = C('appid');
		$this->appSecret = C('appsecret');
	}
	
	/*
	 * 网页授权
	 * */
	public function webOauth($scope = '')
	{
		$now = time();
		$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$codeUrl = $this->get_code_url($redirect_uri, $scope, '');
		if (empty($_GET['code']) && empty($_GET['state'])) {
			header('Location: ' . $codeUrl);
			exit();
		}
		else {
			$code = $_GET['code'];

			if (!empty($code)) {
				$res = $this->get_web_access_token($code);
				if (empty($res['errcode'])) {
					$data = array('access_token' => $res['access_token'], 'openid' => $res['openid']);
					return $data;
				}
				else {
					exit('授权错误，请检查公众号权限和设置');
				}
			}
		}
	}
	
	/*
	 * 获取用户信息
	* */
	public function get_fans_info($access_token, $openid)
	{
		$url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $access_token . '&openid=' . $openid . '&lang=zh_CN';
		$res = $this->https_request($url);
		return $res;
	}
	/*
	 * 公众号调用各接口access_token
	 * */
	public function authorizer_access_token(){
		$this->checkTokenCache($this->appId);
		$cache_token = S($this->appId);		
		if (!$cache_token['authorizer_access_token']) {
			$url_get = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' .$this->appId . '&secret=' .$this->appSecret;
			$res = $this->https_request($url_get);
			
			if ($res['errcode']) {
				$this->error[-2] = '获取access_token错误:' . $res['errcode'];
			}
			else {
				$cache = array('authorizer_access_token' => $res['access_token'], 'authorizer_expires' => $res['expires_in']);
				S($this->appId, $cache, $res['expires_in']);
				$cache_token = $res['access_token'];
			}
			return $cache_token;
		}else{
			return $cache_token['authorizer_access_token'];
		}
	}
	
	public function checkTokenCache($appid)
	{
		$cache = S($appid);
		$url_get = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=' . $cache['authorizer_access_token'];
		$res = $this->https_request($url_get);
	
		if (0 < $res['errcode']) {
			S($appid, NULL);
			$this->error[-5] = '获取access_token时AppSecret错误，或者access_token无效';
		}
	}
	
	/*
	 * 获取用户信息
	 * */
	public function get_user_info($openid,$access_token){
		$url = 'https://api.weixin.qq.com/cgi-bin/user/info?openid=' . $openid . '&access_token=' . $access_token;
		$res = $this->https_request($url);
		if (empty($res['errcode'])) {
			
			return $res;
		}else {
			exit('授权错误，请检查公众号权限和设置');
		}
	}
	/*
	 * 获取code链接
	* @param  $redirect_uri 回调链接
	* @param  $scope 授权模式
	* @param  $state 状态
	* @author chenqi by 2016年1月16日
	* @return code链接
	* */
	protected function get_code_url($redirect_uri = '', $scope = '', $state = 'oauth')
	{
		if (empty($scope)) {
			$scope = $this->oauthinfo ? 'snsapi_userinfo' : 'snsapi_base';
		}
		$redirect_uri = urlencode($redirect_uri);
		$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->appId . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=' . $scope . '&state=' . $state;
		$url .= '#wechat_redirect';
		return $url;
	}
	/*
	 * 获取access_token
	 * */
	protected function get_web_access_token($code)
	{
		$tokenurl = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appId.'&secret='.$this->appSecret.'&code='.$code.'&grant_type=authorization_code';
		$res = $this->https_request($tokenurl);
		return $res;
	}
	

	protected  function https_request($url, $data = NULL)
	{
		$curl = curl_init();
		$header = 'Accept-Charset: utf-8';
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

		if (!empty($data)) {
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		$errorno = curl_errno($curl);

		if ($errorno) {
			return array('curl' => false, 'errorno' => $errorno);
		}
		else {
			$res = json_decode($output, 1);

			if ($res['errcode']) {
				return array('errcode' => $res['errcode'], 'errmsg' => $res['errmsg']);
			}
			else {
				return $res;
			}
		}

		curl_close($curl);
	}
}


?>
