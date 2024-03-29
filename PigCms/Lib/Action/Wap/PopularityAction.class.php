<?php 
class PopularityAction extends WapAction{
	public $popularity;
	public $isamap;
		
	public function _initialize(){
		parent::_initialize();
	
		$this->popularity 	= M('Popularity')->where(array('token'=>$this->token,'id'=>$this->_get('id','intval'),'is_open'=>1))->find();

		if(empty($this->popularity)){
			$this->error('活动可能还没开启');
		}
		
		if (C('baidu_map')){
			$this->isamap=0;
		}else {
			$this->isamap=1;
			$this->amap=new amap();
		}
		
		$this->assign('info',$this->popularity);
	}

	public function index(){
		$id 		= $this->_get('id','intval');
		$prize		= $this->get_prize($id);
		$share_code = $this->_get('share_code','trim');
		$is_see 	= $this->_get('is_see','intval');
		$now 		= time();
		if($this->popularity['start']>$now){
			$is_over 	= 1;
		}else if($this->popularity['end']<$now){
			$is_over 	= 2;
		}else{
			$is_over 	= 0;
		}
		
		if(!empty($this->fans) && empty($share_code) && empty($puser) && empty($is_see)){	
			$this->add_puser($this->wecha_id);
		}

		if(($share_code && $is_see == 1) || ($share_code && empty($is_see))){
			$puser 	= M('Popularity_user')->where(array('token'=>$this->token,'share_key'=>$share_code,'pid'=>$this->popularity['id']))->find();
		}else{
			$puser 	= M('Popularity_user')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id,'pid'=>$this->popularity['id']))->find();
		}

		if($puser){
			$uinfo 	= M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$puser['wecha_id']))->field('wechaname,portrait')->find();	

			$puser['username'] 		= $uinfo['wechaname'] ? $uinfo['wechaname'] : '神秘访客';
			$puser['portrait'] 		= $uinfo['portrait'] ? $uinfo['portrait'] : $this->siteUrl.'/tpl/User/default/common/images/portrait.jpg';

			$puser['char_itme'] 	= $this->getCharItem($puser['share_count']);
			$share 	= $this->getShare($puser['share_key']);
		}	
	

		$count 	= M('Popularity_user')->where(array('token'=>$this->token,'pid'=>$this->popularity['id']))->count();

		if($this->popularity['is_attention'] == 2 && !$this->isSubscribe()) {
			$this->memberNotice('',1);
		}else if($this->popularity['is_reg'] == 1 && empty($this->fans['tel'])) {
			$this->memberNotice();
		}

		
		$this->assign('share_code',$share_code);
		$this->assign('fans',$this->fans);
		$this->assign('puser',$puser);
		$this->assign('share',$share);
		$this->assign('prize',$prize);
		$this->assign('count',$count);
		$this->assign('is_over',$is_over);
		$this->assign('is_see',$is_see);
		$this->display();
	}
	
	public function rank(){
		$id 	= $this->_get('id','intval');
		$uid 	= $this->_get('uid','intval');

		$where 	= array('token'=>$this->token,'pid'=>$id,'is_real'=>1);
		$count  = M('Popularity')->where($where)->count();
		$Page   = new Page($count,15);
		$rank 	= M('Popularity_user')->where($where)->order('share_count desc,add_time asc')->limit(30)->select();

		foreach($rank as $key=>$val){
			$user = M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$val['wecha_id']))->field('wechaname,portrait')->find();
			$rank[$key]['username']		= $user['wechaname']?$user['wechaname'] : '神秘访客';
			$rank[$key]['portrait']		= $user['portrait']?$user['portrait'] : $this->siteUrl.'/tpl/User/default/common/images/portrait.jpg';
		}
		
		$urank 	= array();
		$uinfo 	= M('Popularity_user')->where(array('token'=>$this->token,'pid'=>$id,'id'=>$uid))->field('wecha_id,share_count')->find();//自行修改 uid改为id
		$urank['count'] 	= (M('Popularity_user')->where(array('token'=>$this->token,'pid'=>$id,'is_real'=>1,'share_count'=>array('gt',$uinfo['share_count'])))->count())+1;
		$urank['username'] 	= M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$uinfo['wecha_id']))->getField('wechaname');
		
		$this->assign('uinfo',$uinfo);
		$this->assign('urank',$urank);
		$this->assign('rank',$rank);
		$this->display();
	}
	

	public function add_share(){
		$cookie 	= cookie('pop_share');
		$cookie_arr = json_decode( json_encode($cookie),true);
		$now 		= time();
		$share 	= array(
				'token' 	=> $this->token,
				'pid'		=> $this->_get('id','intval'),
				'share_key'	=> $this->_get('share_code','trim'),
				'add_time' 	=> time(),
		);

		$share_user 	= M('Popularity_user')->where(array('token'=>$this->token,'pid'=>$this->popularity['id'],'share_key'=>$share['share_key']))->find();
		
		if(empty($share_user)){
			echo json_encode(array('err'=>1,'info'=>'分享参数错误'));
			exit;
		}
		
		if($this->popularity['start']>$now){
			echo json_encode(array('err'=>3,'info'=>'活动还没开始'));
			exit;
		}
		
		if($this->popularity['end']<$now){
			echo json_encode(array('err'=>6,'info'=>'活动已结束'));
			exit;
		}

		if($share_user['wecha_id'] == $this->wecha_id){
			//echo json_encode(array('err'=>4,'info'=>'不能给自己增加人气'));
			exit;
		}

		//$is_share 	= M('Popularity_share')->where(array('token'=>$this->token,'pid'=>$share['pid'],'wecha_id'=>$this->wecha_id,'share_key'=>$share['share_key']))->count();
		
		if(empty($cookie_arr[$this->popularity['id']])){
			$cookie_arr[$this->popularity['id']] 	= array();
			$is_share	= 0;
		}
		
		if(empty($this->wecha_id)){
			$is_share 	= M('Popularity_share')->where(array('token'=>$this->token,'pid'=>$share['pid'],'wecha_id'=>array('in',$cookie_arr[$share['pid']]),'share_key'=>$share['share_key']))->count();
		}else{
			$is_share 	= M('Popularity_share')->where(array('token'=>$this->token,'pid'=>$share['pid'],'wecha_id'=>$this->wecha_id,'share_key'=>$share['share_key']))->count();
		}


		if($is_share){
			//echo json_encode(array('err'=>2,'info'=>'请不要重复给好友加人气'));
			exit;
		}else{

			if(empty($this->wecha_id)){
				$share['wecha_id'] 	= $this->getKey(32);
				$share['uid'] 		= $this->add_puser($share['wecha_id'],0);
			}else{
				$share['wecha_id'] 	= $this->wecha_id;
				$share['uid'] 		= $this->add_puser($this->wecha_id);
			}

			array_push($cookie_arr[$this->popularity['id']],$share['wecha_id']);
		}

		if(M('Popularity_share')->add($share)){
			M('Popularity_user')->where(array('token'=>$this->token,'pid'=>$this->popularity['id'],'share_key'=>$share['share_key']))->setInc('share_count',1);	
			//记录cookie
			cookie('pop_share',$cookie_arr,time()+3600*24*365);
			echo json_encode(array('err'=>0,'info'=>'你的好友成功增加了1点人气'));
		}		
	}
	
	public function add_puser($wecha_id,$is_real=1){
		$data 	= array(
			'pid' 			=> $this->popularity['id'],
			'wecha_id'		=> $wecha_id, 
			'token'			=> $this->token,
			'add_time' 		=> time(),
			'share_count' 	=> 1,
			'share_key'		=> $this->getKey(),
			'is_real' 		=> $is_real
		);
		$user = M('Popularity_user')->where(array('token'=>$this->token,'pid'=>$data['pid'],'wecha_id'=>$wecha_id,'is_real'=>$is_real))->find();
		if(empty($user)){
			return M('Popularity_user')->add($data);
		}else{
			return $user['id'];
		}
		
	}	

	public function maps(){
		$link=$this->amap->getPointMapLink($this->popularity['longitude'],$this->popularity['latitude'],$this->popularity['title']);
		header('Location:'.$link);
	}
	
	
	//进度
	public function getCharItem($share_count){
		$arr 		= array();
		$count 		= M('Popularity_prize')->where(array('token'=>$this->token,'pid'=>$this->popularity['id']))->max('count');
		$prize		= M('Popularity_prize')->where(array('token'=>$this->token,'pid'=>$this->popularity['id'],'count'=>array('gt',$share_count)))->order('count asc')->find();

		if(empty($prize)){
			$arr['is_max'] 	= 1;
		}else{
			$arr['name']	= $prize['name'];
			$arr['num']		= $prize['count']-$share_count;
		}

		$number 		= ($share_count/$count)<1?ceil($share_count/$count*100):100;
		$arr['style'] 	=  'style="width:'.sprintf ("%s%%",$number).'"';
		return $arr;
	}

	
	//分享
	public function getShare($key=""){
		$where 	= array('token'=>$this->token,'pid'=>$this->popularity['id'],'uid'=>array('neq',''));
		if($key){
			$where['share_key'] = $key;
		}
		$list = M('Popularity_share')->where($where)->limit(5)->order('add_time desc')->select();

		foreach($list as $key=>$val){
			$info = M('Popularity_user')->where(array('token'=>$this->token,'id'=>$val['uid'],'pid'=>$val['pid']))->field('wecha_id,share_key,share_count')->find();
			$user = M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$info['wecha_id']))->field('wechaname,portrait')->find();
		
			$list[$key]['share_count']	= $info['share_count'];
			$list[$key]['share_key']	= $info['share_key'];

			if(empty($user)){
				$list[$key]['username']		= '神秘访客';
				$list[$key]['portrait']		= $this->siteUrl.'/tpl/User/default/common/images/portrait.jpg';
			}else{
				$list[$key]['username']		= $user['wechaname'] ? $user['wechaname'] : '匿名';
				$list[$key]['portrait']		= $user['portrait'] ? $user['portrait'] : $this->siteUrl.'/tpl/User/default/common/images/portrait.jpg';
			}

		}
		
		return $list;
	}
	
	//分享key  最长32
	public function getKey($length=16){
		$str = substr(md5(time().mt_rand(1000,9999)),0,$length);
		return $str;
	}
	//记录奖品
	public function get_prize($id){
		$where 	= array('token'=>$this->token,'pid'=>$id,'name'=>array('neq',''),'img'=>array('neq',''),'num'=>array('neq',''),'count'=>array('neq',''));
		$data 	= M('Popularity_prize')->where($where)->order('count asc')->select();
		$sum 	= M('Popularity_prize')->where($where)->max('count');
		$count 	= count($data);
		foreach($data as $key=>$val){
			$data[$key]['unused']			= $val['num']-$val['use_num'];
			$data[$key]['list_style']		= 'style="width:'.(100/$count).'%"';
			//$data[$key]['bubble_style']		= ($key+1)==$count?'style="right:-1px"':'style="left:'.(($key+1)/$count*100-($key+1)*3).'%"';
			$data[$key]['bubble_style']		= $key<$count-1?'style="left:'.(intval($val['count']/$sum*100-($key+$count))).'%"':'style="right:-1px"';
		}
		return $data;
	}
}

?>