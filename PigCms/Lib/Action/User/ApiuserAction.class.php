<?php
class ApiuserAction extends UserAction{
	
	/**
	 * @brief 会员列表
	 * @param Null
	 * @par 2016/02/29 Ver 1.00 Created by tangmin
	 */
	public function userinfo(){
		$token      = $_GET['token'];
		$search     = $this->_post('search','trim');
		$map      = array();	
		if($search){
			$map['truename']  = array('like','%'.$search.'%');
			$map['tel']  = array('like','%'.$search.'%');
			$map['_logic'] = 'OR';
		}
		
		if($map){
			$where['_complex'] = $map;
			$where['token']  = $token;
		}else{
			$where['token'] = $token;
		}
		
		$count		= M('ahld_user')->where($where)->count();
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$user_info 	= M('ahld_user')->field('id,wechaname,portrait,truename,tel,sex,province,city')
		->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id DESC')->select();
		foreach($user_info as $key => $value){
			if($value['sex'] == 0){
				$user_info[$key]['sex'] = '无';
			}
			if($value['sex'] == 1){
				$user_info[$key]['sex'] = '男';
			}
			if($value['sex'] == 2){
				$user_info[$key]['sex'] = '女';
			}
			if($value['sex'] == 3){
				$user_info[$key]['sex'] = '其他';
			}	
		}
		//$this->p($user_info);
		//var_dump(123);
		$this->assign('user_info',$user_info);
		$this->assign('token',$token);
		$this->assign('search',$search);
		$this->assign('page',$Page->show());
		$this->display('userinfo');
	}
	
	/**
	 * @brief 会员编辑
	 * @param Null
	 * @par 2016/02/29 Ver 1.00 Created by tangmin
	 */
	public function edit(){
		$id = $_GET['id'];
		$token = $_GET['token'];
		$userinfoModel = M('userinfo');
		$the_user_info = $userinfoModel->where('id='.$id)->find();
		$address = unserialize($the_user_info['address']);
		$area_no = $address['area_no'];
		$area_no = explode(",",$area_no);
		$the_user_info['prov'] = $address['prov'];
		$the_user_info['city'] = $address['city'];
		$the_user_info['dist'] = $address['dist'];
		$the_user_info['detial'] = $address['detial'];
		
		$areaModel = M('area');
		$area_list = $areaModel->select();
		$prov_list = $areaModel->where(array('arealevel'=>1))->select();
		$prov_areano = $area_no[0];
		$city_areano = $area_no[1];
		$city_list = $areaModel->where(array('arealevel'=>2,'parentno'=>$prov_areano))->select();
		$dist_list = $areaModel->where(array('arealevel'=>3,'parentno'=>$city_areano))->select();	
		if(IS_POST){
			$data = $_POST;
			$map['id'] = intval($id);
			$arr['truename'] = $data['truename'];
			$arr['tel'] = $data['tel'];
			$prov = $data['prov'];
			$city = $data['city'];
			$dist = $data['dist'];
			$prov = explode(",", $prov);
			$city = explode(",", $city);
			$dist = explode(",", $dist);
			$areas['area_no']= $prov[0].','.$city[0].','.$dist[0];
			$areas['prov'] = $prov[1];
			$areas['city'] = $city[1];
			$areas['dist'] = $dist[1];
			$areas['detail']= $prov[1].$city[1].$dist[1];
			$arr['address'] = serialize($areas);
			unset($data['prov']);unset($data['city']);unset($data['dist']);
			$arr['addr'] = $data['addr'];
			$arr['point'] = intval($data['point']);
			if($arr['truename']&&$arr['tel']&&$arr['address']&&$arr['point']&&$arr['addr']){
				$res = $userinfoModel->where($map)->save($arr);
				$this->redirect('Apiuser/userinfo', array('token' => $token), 2, '修改成功,页面跳转中...');
				 //$this->success('修改成功', 'User/list', array('token' => $token));
					//$this->redirect('Api/grade',5,'等级修改成功');
			}else{
				$this->redirect('Apiuser/userinfo', array('token' => $token), 2, '修改失败,页面跳转中...');
			}
		}
		$this->the_id = $id;
		$this->area_list = $area_list;
		$this->prov_list = $prov_list;
		$this->city_list = $city_list;
		$this->dist_list = $dist_list;
		$this->the_user_info = $the_user_info;
		$this->display('edit_userinfo');
	}
	
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
	 * @brief 删除会员列表记录
	 * @param Null
	 * @par 2016/03/02 Ver 1.00 Created by tangmin
	 */
	public function ajaxuserinfo() {
		$id = $_POST['id'];
		$userinfoModel = M('userinfo');
		$res = $userinfoModel ->where("id=".$id)->delete();
		if($res){
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}
}
?>