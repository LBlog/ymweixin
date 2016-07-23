<?php
class ApisignAction extends UserAction{

	/**
	 * @brief 签文列表
	 * @param Null
	 * @par 2016/03/14 Ver 1.00 Created by tangmin
	 */
	public function sign() {
		$token      = $_GET['token'];
		$search     = $this->_post('search','trim');
		$where      = array();
		if($search){
			$where['name']  = array('like','%'.$search.'%');
		}
		$count		= M('zzarticle')->where($where)->count();
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$article 	= M('zzarticle')->field('id,title,litpic,t_id,content,publish_time,create_time,click,update_time,url')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id ASC')->select();
		foreach($article as $key => $value){
			$article[$key]['publish_time'] = date('Y-m-d',$value['publish_time']);
			$article[$key]['create_time'] = date('Y-m-d',$value['create_time']);
			$article[$key]['update_time'] = date('Y-m-d',$value['update_time']);
			if(!$value['litpic']) {
				$value['litpic'] = '../wx/images/default.jpg';
			}
		}
		$this->assign('search',$search);
		$this->assign('article',$article);
		$this->assign('token',$token);
		$this->assign('page',$Page->show());
		$this->display();
	}
	
	/**
	 * @brief 添加签文
	 * @param Null
	 * @par 2016/03/14 Ver 1.00 Created by tangmin
	 */
	public function add_activity() {
		$token = $_GET['token'];
		$article = M('zzarticle');
		if(IS_POST){
			$data = $_POST;
			$arr['title'] = $data['title'];
			$arr['litpic'] = $data['litpic'];
			$arr['content'] = $data['content'];
			$arr['url'] = $data['url'];
			$arr['create_time'] = time();
			if($arr['title']&&$arr['litpic']&&$arr['url']){
				$res = $article->add($arr);
				$this->redirect('Apisign/sign', array('token' => $token), 2, '添加成功,页面跳转中...');
				 //$this->success('修改成功', 'User/list', array('token' => $token));
				//$this->redirect('Api/grade',5,'等级修改成功');
			}	
		}
		$this->display('add_sign');
	}

	/**
	 * @brief 编辑签文
	 * @param Null
	 * @par 2016/03/14 Ver 1.00 Created by tangmin
	 */
	public function edit_sign() {
		$id = $_GET['id'];
		$token = $_GET['token'];
		$article = M('zzarticle');
		$the_article = $article->where('id='.$id)->find();
		if(IS_POST){
			$data = $_POST;
			$map['id'] = intval($id);
			$arr['title'] = $data['title'];
			if(!$data['litpic']){
				$arr['litpic'] = $the_article['litpic'];
			}else{
				$arr['litpic'] = $data['litpic'];
			}
			$arr['content'] = $data['content'];
			$arr['url'] = $data['url'];
			$arr['update_time'] = $data['update_time'];
			if($arr['title']&&$arr['litpic']&&$arr['url']){
				$res = $article->where($map)->save($arr);
				$this->redirect('Apisign/sign', array('token' => $token), 2, '修改成功,页面跳转中...');
				 //$this->success('修改成功', 'User/list', array('token' => $token));
					//$this->redirect('Api/grade',5,'等级修改成功');
			}	
		}
		$this->the_id = $id;
		$this->the_article = $the_article;
		$this->display('edit_sign');
	}

	/**
	 * @brief 删除签文列表记录
	 * @param Null
	 * @par 2016/03/14 Ver 1.00 Created by tangmin
	 */
	public function ajaxsign () {
		$id = $_POST['id'];
		$articleModel = M('zzarticle');
		$res = $articleModel ->where("id=".$id)->delete();
		if($res){
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}
}
?>