<?php
class LotteryAction extends LotteryBaseAction{
	public function index(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(!strpos($agent,"icroMessenger")) {
			//echo '此功能只能在微信浏览器中使用';exit;
		}
		$token		= $this->_get('token');
		$wecha_id	= $this->wecha_id;
		$id 		= $this->_get('id');
		if($id == ''){
			$this->error("不存在的活动");
		}
		$redata		= M('Lottery_record');
		$where 		= array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id);
		$record 	= $redata->where(array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id,'islottery'=>1))->find();
		if (!$record){
			$record 	= $redata->where($where)->order('id DESC')->find();
		}
		
		$Lottery 	= M('Lottery')->where(array('id'=>$id,'token'=>$token,'type'=>1,'status'=>1))->find();
		if(!($Lottery)){
			$this->error("不存在的活动");
		}

		
		if (!$Lottery['guanzhu'] && !$this->isSubscribe()) {
			//未关注不可以参与 
			
			$this->memberNotice('',1);
			
		}elseif($Lottery['needreg'] && empty($this->fans['tel'])){
			//需要完善资料
			$this->memberNotice();
		}
/*		if($Lottery['guanzhu'] == 1 && !$this->isSubscribe()){
			$this->memberNotice('',1);
		}elseif(($Lottery['needreg'] == 1 && empty($this->fans)) || ($Lottery['guanzhu'] == 0 && empty($this->wecha_id))){
			$this->memberNotice();
		}*/
		$Lottery['renametel']=$Lottery['renametel']?$Lottery['renametel']:'手机号';
		$Lottery['renamesn']=$Lottery['renamesn']?$Lottery['renamesn']:'SN码';
		$data=$Lottery;
		//1.活动过期,显示结束
		//4.显示奖项,说明,时间
		if ($Lottery['enddate'] < time()) {
			 $data['end'] = 1;
			 $data['endinfo'] = $Lottery['endinfo'];
			 $this->assign('Dazpan',$data);
			 $this->display();
			 exit();
		}
		// 1. 中过奖金	
		if ($record['islottery'] == 1) {				
			$data['end'] = 5;
			$data['sn']	 	 = $record['sn'];
			$data['uname']	 = $record['wecha_name'];
			$data['prize']	 = $record['prize'];
			$data['tel'] 	 = $record['phone'];	
		}
		//抽取次数
		$data['On'] 		= 1;
		$data['token'] 		= $token;
		$data['wecha_id']	= $wecha_id;		
		$data['lid']		= $Lottery['id'];
		$data['rid']		= intval($record['id']);
		$data['usenums'] 	= $record['usenums'];
		$data['info']=str_replace('&lt;br&gt;','<br>',$data['info']);
		$data['endinfo']=str_replace('&lt;br&gt;','<br>',$data['endinfo']);
		$this->assign('Dazpan',$data);
		$record['id']=intval($record['id']);
		$this->assign('record',$record);
		//var_dump($data);exit();
		$this->display();
	}
	
	
	
	public function getajax(){	
		
		$token 		=	$this->_get('token');
		$wecha_id	=	$this->_get('oneid');
		$id 		=	$this->_get('id');
		$rid 		= 	$this->_get('rid');
		$Lottery=M('Lottery')->where(array('id'=>$id))->find();
		$data=$this->prizeHandle($token,$wecha_id,$Lottery);
		if ($data['end']==3){
			$sn	 	 = $data['sn'];
			$uname	 = $data['wecha_name'];
			$prize	 = $data['prize'];
			$tel 	 = $data['phone'];
			$msg = "您已经中过了";
			echo '{"error":1,"msg":"'.$msg.'"}';
			exit;
		}
		if ($data['end']==-1){
			$msg = $data['winprize'];
			echo '{"error":1,"msg":"'.$msg.'"}';
			exit;
		}
		if ($data['end']==-2){
			$msg = $data['winprize'];
			echo '{"error":1,"msg":"'.$msg.'"}';
			exit;
		}
		//
		if ($data['prizetype'] >= 1 && $data['prizetype'] <= 6) {
			echo '{"success":1,"sn":"'.$data['sncode'].'","prizetype":"'.$data['prizetype'].'","usenums":"'.$data['usenums'].'"}';
		}else{
			echo '{"success":0,"prizetype":"","usenums":"'.$data['usenums'].'"}';
		}
		exit();
	}
}
	
?>