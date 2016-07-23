<?php
class ApirankAction extends UserAction{
	
	/**
	 * @brief 等级列表
	 * @param Null
	 * @par 2016/05/13 Ver 1.00 Created by tangmin
	 */
	public function rank() {
		$token      = $_GET['token'];
		$count		= M('zzrank')->count();
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$rank = M('zzrank')->limit($Page->firstRow.','.$Page->listRows)->order('id DESC')->select();
		foreach($rank as $key => $value){
			$rank[$key]['ctime'] = date('Y-m-d',$value['ctime']);
		}
		$this->assign('rank',$rank);
		$this->assign('token',$token);
		$this->assign('page',$Page->show());
		$this->display();
	}
	
	/**
	 * @brief 添加等级
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function add() {
		$token = $_GET['token'];
		$rank = M('zzrank');
		if(IS_POST){
			$data = $_POST;
			$arr['rankname'] = $data['rankname'];
			$arr['intergal'] = $data['intergal'];
			$arr['ctime'] = time();
			if($arr['rankname']&&$arr['ctime']){
				$res = $rank->add($arr);
				$this->redirect('Apirank/rank', array('token' => $token), 2, '添加成功,页面跳转中...');
			}
		}
		$this->display('add');
	}
	
	/**
	 * @brief 编辑等级
	 * @param Null
	 * @par 2016/03/01 Ver 1.00 Created by tangmin
	 */
	public function edit() {
		$id = $_GET['id'];
		$token = $_GET['token'];
		$rank = M('zzrank');
		$the_rank = $rank->where('id='.$id)->find();
		if($_POST){
			$data = $_POST;
			$map['id'] = intval($id);
			$arr['rankname'] = $data['rankname'];
			$arr['intergal'] = $data['intergal'];
			$arr['utime'] = time();
			if($arr['rankname']){
				$res = $rank->where($map)->save($arr);
				$this->redirect('Apirank/rank', array('token' => $token), 2, '修改成功,页面跳转中...');
			}
		}
		$this->the_id = $id;
		$this->the_rank = $the_rank;
		$this->display('edit');
	}

	/**
	 * @brief 删除等级列表记录
	 * @param Null
	 * @par 2016/03/02 Ver 1.00 Created by tangmin
	 */
	public function ajaxrank() {
		$id = $_POST['id'];
		$rankModel = M('zzrank');
		$res = $rankModel ->where("id=".$id)->delete();
		if($res){
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}
}
?>