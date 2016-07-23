<?php
class ApiactdetailAction extends UserAction{
	
	/**
	 * @brief 参加活动情况列表
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function actdetail() {
		$actdetailModel = M('zzactdetail');
		$token      = $_GET['token'];
		$search     = $this->_post('search','trim');
		$where      = array();
		if($search){
			$where['tp_zzactivity.name']  = array('like','%'.$search.'%');
			$activity = M('zzactivity')->where(array("name"=>$search))->find();
			$count = $actdetailModel->where(array("aid"=>$activity['id']))->count();
		}else{
			$count = $actdetailModel->count();
		}
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$actdetailModel->join('LEFT JOIN tp_zzactivity on tp_zzactdetail.aid = tp_zzactivity.id')->join('LEFT JOIN tp_userinfo on tp_zzactdetail.uid = tp_userinfo.id');
		$actdetail 	= $actdetailModel->field('tp_zzactdetail.*,tp_zzactivity.name,tp_zzactivity.img,tp_userinfo.wechaname,tp_userinfo.portrait')
		->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id ASC')->select();
// 		echo "<pre/>";
// 		print_r($actdetail);exit;
		foreach($actdetail as $key => $value){
			if(!$value['img']) {
				$value['img'] = '../wx/images/default.jpg';
			}
			$images = explode(',', $value['img']);
			$images = array_filter($images);
			$actdetail[$key]['img'] = '';
			foreach($images as $k => $v) {
				$actdetail[$key]['img'] .= '<img src="'.$v.'" style="max-height:30px;padding-left:10px;"/>';
			}
			$actdetail[$key]['portrait'] = '<img src="'.$value['portrait'].'" style="max-height:30px;"/>';
		}
		$this->assign('search',$search);
		$this->assign('actdetail',$actdetail);
		$this->assign('token',$token);
		$this->assign('page',$Page->show());
		$this->display();
	}
	
	/**
	 * @brief 删除参加活动列表记录
	 * @param Null
	 * @par 2016/03/02 Ver 1.00 Created by tangmin
	 */
	public function ajaxactdetail() {
		$id = $_POST['id'];
		$actdetailModel = M('zzactdetail');
		$res = $actdetailModel ->where("id=".$id)->delete();
		if($res){
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}
}
?>