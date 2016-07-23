<?php
class ApiactAction extends UserAction{

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
	 * @brief 活动列表
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function activity() {
		$token      = $_GET['token'];
		$search     = $this->_post('search','trim');
		$where      = array();
		if($search){
			$where['name']  = array('like','%'.$search.'%');
		}
		$count		= M('zzactivity')->where($where)->count();
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$activity 	= M('zzactivity')->field('id,name,img,start_time,end_time,act_addr,is_hot,people_num')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id ASC')->select();
		foreach($activity as $key => $value){
			$activity[$key]['start_time'] = date('Y-m-d',$value['start_time']);
			$activity[$key]['end_time'] = date('Y-m-d',$value['end_time']);
			if(!$value['img']) {
				$value['img'] = '../wx/images/default.jpg';
			}
			$images = explode(',', $value['img']);
			$images = array_filter($images);
			$activity[$key]['img'] = '';
			foreach($images as $k => $v) {
				$activity[$key]['img'] .= '<img src="'.$v.'" style="max-height:30px;padding-left:10px;padding-bottom:10px;"/>';
			}
		}
		$this->assign('search',$search);
		$this->assign('activity',$activity);
		$this->assign('token',$token);
		$this->assign('page',$Page->show());
		$this->display();
	}
	
	/**
	 * @brief 添加活动
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function add_activity() {
		$token = $_GET['token'];
		$activity = M('zzactivity');
		$act_type = M('zzact_type');
		$act_type_list = $act_type->field('id,tname')->select();
		if(IS_POST){
			$data = $_POST;
			$arr['name'] = $data['name'];
			$arr['img'] = $data['img'];
			$arr['start_time'] = strtotime($data['start_time']);
			$arr['end_time'] = strtotime($data['end_time']);
			$arr['act_addr'] = $data['act_addr'];
			$arr['act_detail'] = $data['act_detail'];
			$arr['act_point'] = intval($data['act_point']);
			$arr['act_type'] = $data['act_type'];
			$arr['people_num'] = $data['people_num'];
			if($arr['name']&&$arr['img']&&$arr['start_time']&&$arr['end_time']&&$arr['act_addr']&&$arr['act_detail']&&$arr['act_point']&&$arr['act_type']){
				$res = $activity->add($arr);
				$this->redirect('Apiact/activity', array('token' => $token), 2, '添加成功,页面跳转中...');
				 //$this->success('修改成功', 'User/list', array('token' => $token));
				//$this->redirect('Api/grade',5,'等级修改成功');
			}	
		}
		$list = '<option value="">类别选择</option>';
		foreach($act_type_list as $k => $v) {
			$list .= '<option value="'.$v['id'].'">'.$v['tname'].'</option>';											
		}
		$this->list = $list;
		$this->act_type_list = $act_type_list;
		$this->display('add_activity');
	}

	/**
	 * @brief 编辑活动
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function edit_activity() {
		$id = $_GET['id'];
		$token = $_GET['token'];
		$activity = M('zzactivity');
		$the_activity = $activity->where('id='.$id)->find();
		$act_type = M('zzact_type');
		$act_type_list = $act_type->field('id,tname')->select();
		if(IS_POST){
			$data = $_POST;
			$map['id'] = intval($id);
			$arr['name'] = $data['name'];
			if(!$data['img']){
				$arr['img'] = $the_activity['img'];
			}else{
				$arr['img'] = $data['img'];
			}
			$arr['start_time'] = strtotime($data['start_time']);
			$arr['end_time'] = strtotime($data['end_time']);
			$arr['act_addr'] = $data['act_addr'];
			$arr['act_detail'] = $data['act_detail'];
			$arr['act_point'] = intval($data['act_point']);
			$arr['act_type'] = $data['act_type'];
			$arr['people_num'] = $data['people_num'];
			if($arr['name']&&$arr['act_addr']&&$arr['act_type']){
				$res = $activity->where($map)->save($arr);
				$this->redirect('Apiact/activity', array('token' => $token), 2, '修改成功,页面跳转中...');
				 //$this->success('修改成功', 'User/list', array('token' => $token));
					//$this->redirect('Api/grade',5,'等级修改成功');
			}	
		}
		$the_activity['start_time'] = date('Y-m-d',$the_activity['start_time']);
		$the_activity['end_time'] = date('Y-m-d',$the_activity['end_time']);
		if($the_activity['img']){
			$images = explode(',', $the_activity['img']);
			$images = array_filter($images);
			$the_activity['img'] = '';
			foreach($images as $k => $v) {
				$the_activity['img'] .= '<img src="'.$v.'" style="max-height:60px;padding-left:10px;padding-bottom:10px;"/>';
			}
		}else{
			$the_activity['img'] = '<img src="../wx/images/default.jpg" style="max-height:60px;padding-left:10px;padding-bottom:10px;"/>';
		}
		$list = '<option value="">类别选择</option>';
		foreach($act_type_list as $k => $v) {
			if($v['id'] == $the_activity['act_type']) {
				$list .= '<option value="'.$v['id'].'" selected="selected">'.$v['tname'].'</option>';
			}else {
				$list .= '<option value="'.$v['id'].'">'.$v['tname'].'</option>';
			}
		}
		$this->list = $list;
		$this->act_type_list = $act_type_list;
		$this->the_id = $id;
		$this->the_activity = $the_activity;
		$this->display('edit_activity');
	}

	/**
	 * @brief 删除活动列表记录
	 * @param Null
	 * @par 2016/03/02 Ver 1.00 Created by tangmin
	 */
	public function ajaxactivity() {
		$id = $_POST['id'];
		$activityModel = M('zzactivity');
		$res = $activityModel ->where("id=".$id)->delete();
		if($res){
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}
	
	/**
	 * @brief 设置和取消热门的ajax后台处理
	 * @param Null
	 * @par 2016/03/03 Ver 1.00 Created by tangmin
	 */
	public function act_changesta () {
		$ishot = $_POST['ishot'];
		$id = $_POST['id'];
		$count = M('zzactivity')->where(array("is_hot"=>1))->count();
		if($ishot == 0 && $count >= 3){
			echo json_encode(2);
		}else{
			if($ishot==0) { $hot = 1; }
			if($ishot==1) { $hot = 0; }
			$activityModel = M("zzactivity");
			$re = $activityModel->where(array("id"=>$id))->setField("is_hot",$hot);
			if($re){
				echo json_encode(1);
			}else{
				echo json_encode(0);
			}
		}
	}
}
?>