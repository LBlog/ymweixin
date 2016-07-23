<?php
class ApiacttypeAction extends UserAction{
	
	/**
	 * @brief 获取联动城市
	 * @param Null
	 * @par 2016/02/29 Ver 1.00 Created by tangmin
	 */
	public function city() {
		$data['prov'] = $_POST['prov'];
		$areaModel = M('area');
		$city_list = $areaModel->where(array('parentno'=>$data['prov'],'arealevel'=>2))->select();
		$dist_list = $areaModel->where(array('parentno'=>$city_list[0]['areano'],'arealevel'=>3))->select();
		$city ='';
		$dist = '';
		foreach($city_list as $value) {
			$city .= ' <option value="'.$value['areano'].','.$value['areaname'].'">'.$value['areaname'].'</option>';
		}
		foreach($dist_list as $value) {
			$dist .= ' <option value="'.$value['areano'].','.$value['areaname'].'">'.$value['areaname'].'</option>';
		}
		$data['city'] = $city;
		$data['dist'] = $dist;
		echo json_encode($data);
	}
	
	/**
	 * @brief 获取联动区域
	 * @param Null
	 * @par 2016/02/29 Ver 1.00 Created by tangmin
	 */
	public function dist() {
		$data['city'] = $_POST['city'];
		$areaModel = M('area');
		$dist_list = $areaModel->where(array('parentno'=>$data['city'],'arealevel'=>3))->select();
		$dist = '';
		foreach($dist_list as $value) {
			$dist .= ' <option value="'.$value['areano'].','.$value['areaname'].'">'.$value['areaname'].'</option>';
		}
		$data['dist'] = $dist;
		echo json_encode($data);
	}
	
	/**
	 * @brief 活动类别列表
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function act_type() {
		$token      = $_GET['token'];
		$count		= M('zzact_type')->count();
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$act_type 	= M('zzact_type')->field('id,tname,ctime')->limit($Page->firstRow.','.$Page->listRows)->order('id ASC')->select();
		foreach($act_type as $key => $value){
			$act_type[$key]['ctime'] = date('Y-m-d',$value['ctime']);
		}
		$this->assign('act_type',$act_type);
		$this->assign('token',$token);
		$this->assign('page',$Page->show());
		$this->display();
	}
	
	/**
	 * @brief 添加活动类别
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function add() {
		$token = $_GET['token'];
		$act_type = M('zzact_type');
		if(IS_POST){
			$data = $_POST;
			$arr['tname'] = $data['tname'];
			$arr['ctime'] = time();
			if($arr['tname']&&$arr['ctime']){
				$res = $act_type->add($arr);
				$this->redirect('Apiacttype/act_type', array('token' => $token), 2, '添加成功,页面跳转中...');
				//$this->success('修改成功', 'User/list', array('token' => $token));
				//$this->redirect('Api/grade',5,'等级修改成功');
			}
		}
		$this->display('add');
	}
	
	/**
	 * @brief 编辑活动类别
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function edit() {
		$id = $_GET['id'];
		$token = $_GET['token'];
		$act_type = M('zzact_type');
		$the_act_type = $act_type->field('id,tname')->where('id='.$id)->find();
		if($_POST){
			$data = $_POST;
			$map['id'] = intval($id);
			$arr['tname'] = $data['tname'];
			$arr['utime'] = time();
			if($arr['tname']){
				$res = $act_type->where($map)->save($arr);
				$this->redirect('Apiacttype/act_type', array('token' => $token), 2, '修改成功,页面跳转中...');
				//$this->success('修改成功', 'User/list', array('token' => $token));
				//$this->redirect('Api/grade',5,'等级修改成功');
			}
		}
		$this->the_id = $id;
		$this->the_act_type = $the_act_type;
		$this->display('edit');
	}

	/**
	 * @brief 删除活动类别列表记录
	 * @param Null
	 * @par 2016/03/02 Ver 1.00 Created by tangmin
	 */
	public function ajaxact_type() {
		$id = $_POST['id'];
		$acttypeModel = M('zzact_type');
		$res = $acttypeModel ->where("id=".$id)->delete();
		if($res){
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}
}
?>