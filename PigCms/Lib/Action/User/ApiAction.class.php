<?php
class ApiAction extends UserAction{
	public function index(){
		$this->canUseFunction('api');
		$data=D('Api');
		$this->assign('api',$data->where(array('token'=>session('token'),'uid'=>session('uid')))->select());
		if(IS_POST){
			$_POST['uid']=SESSION('uid');
			$_POST['token']=SESSION('token');
			if($data->create()){				
				if($data->add()){
					$this->success('操作成功');					
				}else{
					$this->error('服务器繁忙，请稍候再试');
				}			
			}else{			
				$this->error($data->getError());
			}
		}else{
			$this->display();
		}
	}

	public function add(){
		$data=D('Api');
		if(IS_POST){
			$_POST['uid']=SESSION('uid');
			$_POST['token']=SESSION('token');
			if (!isset($_POST['is_colation'])){
				$_POST['is_colation']=0;
			}
			//if(empty($_POST['home']))unset($_POST['home']);
			if($data->create()){				
				if($data->add()){
					$this->success('操作成功',U('User/Api/index'));					
				}else{
					$this->error('服务器繁忙，请稍候再试');
				}			
			}else{			
				$this->error($data->getError());
			}
		
		}else{
			$this->display();
		}
	}

	public function edit(){
		$data=D('Api');
		if(IS_POST){
			$_POST['token']=session('token');
			$_POST['uid']=session('uid');
			$_POST['id']=$this->_get('id','intval');
			if (!isset($_POST['is_colation'])){
				$_POST['is_colation']=0;
			}
			if($data->create()){
				if($data->save()!=false){
					$this->success('操作成功',U('User/Api/index'));					
				}else{
					$this->error('没做任何修改');
				}			
			}else{			
				$this->error($data->getError());
			}
		}else{
			$api=$data->where(array('token'=>session('token'),'uid'=>session('uid'),'id'=>$this->_get('id','intval')))->find();
			if($api==false){$this->error('非法操作');}
			$this->assign('api',$api);
			$this->display('add');	
		}
	}

	public function setInc(){
		if($this->_get('id')==true){
			$data=D('Api');
			$vo['id']=$this->_get('id','intval');
			$vo['token']=session('token');
			$set=$data->where($vo)->find();
			if($set!=false){
				$type=$this->_get('type','intval');
				if($type==2){
					$back=$data->where($vo)->save(array('status'=>2));
					if($back!=false){
						$this->success('操作成功');
					}else{
						$this->error('操作失败');
					}
				}else{
					$back=$data->where($vo)->save(array('status'=>1));
					if($back!=false){
						$this->success('操作成功');
					}else{
						$this->error('操作失败');
					}
				}
			}else{
				$this->error('无权限修改');
			}
		}else{
			$this->error('非法操作');
		}
	
	}

	public function del(){
		$data['id']=$this->_get('id','intval');
		$data['token']=session('token');
		$re=M('Api')->where($data)->find();
		if($re==false){
			$this->error('非法操作');
		}else{
			$del=M('Api')->where($data)->delete();
			if($del==false){
				$this->error('没做任何修改');
			}else{
				$this->success('删除成功');
			}
		}
	}


	function addFileToZip($path,$zip,$foldertime){
		//dump($path);
		//$path = 'C:/wamp/www/jjifen/Pigcms/qrcode/yd_point';
	    $handler=opendir($path); //打开当前文件夹由$path指定。
	    
	    while(($filename=readdir($handler))!==false){
	    	

	        if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
	            if(is_dir($path.$filename)){// 如果读取的某个对象是文件夹，则递归
	                self::addFileToZip($path.'/'.$filename,$zip,$foldertime);
	            }else{ 
	            	//dump($filename);
	            	//dump(readdir($handler));
	            //将文件加入zip对象
	                $zip->addFile($path.'/'.$filename,$filename);
	            }
	        }
	    }
	    @closedir($path);
	}

	/**
	 * @brief 二维码生成
	 * @param Null
	 * @par 2015/1/22 Ver 1.00 Created by Pine
	 */
	Public function create()
	{
		//echo phpversion();
		$foldertime = time();
		$shopf="yd_".$foldertime;
 		$qr_url=substr($_SERVER['DOCUMENT_ROOT'],-1)=="/"?((substr(C('qr_url'),0,1)=="/")?substr(C('qr_url'),1):C('qr_url')):C('qr_url');
 	 	$path = $_SERVER['DOCUMENT_ROOT'].$qr_url.$shopf;
		if(IS_POST)
		{
			//$this->display('creating');
			$max = intval($_POST['max']);
			$min = intval($_POST['min']);
			$num = intval($_POST['num']);
			$detail = $_POST['detail'] ? $_POST['detail'] : '';
			/*将文件下载到服务器上,并将文件名上传到数据库中*/
			if($max&&$min&&$num)
			{
				for($i=0;$i<$num;$i++)
				{
					$sole1 = rand(1,100*$num);
					$sole2 = self::creatLetter1(2);
					$sole3 = self::creatLetter2(2);
					$sole4 = time();
					$sole = $sole1.$sole2.$sole3.$sole4;
					$file = self::qrcode($sole,$foldertime);
					$img = M('Zzimg');
					$arr['imgcode'] = $sole;
					$arr['url'] = $file;
					$arr['flag'] = 0;
					$arr['ctime'] =time();
					$arr['detail'] = $detail;
					$arr['print'] = 0;
					$arr['max'] = $max;
					$arr['min'] = $min;
					$res = $img->add($arr);
				}
				$zip=new ZipArchive();
			//	$crtime = time();
				if($zip->open("C:\yd_".$foldertime.".zip", ZipArchive::OVERWRITE)=== TRUE)
				{
					self::addFileToZip($path,$zip,$foldertime); 
					//调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
			   		 $zip->close(); //关闭处理的zip文件
				}
				self::addFileToZip($path,$zip,$foldertime);
				}

				//文件打包下载到本地后,将服务器上的该文件夹删掉
				self::deldir($path);
				
								
			
		}
		$this->display('create');
	}



	public function qrcode($tid,$foldertime){
		$shopf="yd_".$foldertime;
		$qr_url=substr($_SERVER['DOCUMENT_ROOT'],-1)=="/"?((substr(C('qr_url'),0,1)=="/")?substr(C('qr_url'),1):C('qr_url')):C('qr_url');
		//echo $qr_url;exit;
		$save_path = $_SERVER['DOCUMENT_ROOT'].$qr_url.$shopf."/";  //图片存储的绝对路径
		//echo $save_path;exit;
 
 		// echo $web_path;exit;
 		 $base_url=substr(C('base_url'),0,1)=="/"?rtrim(C('base_url'),"/"):C('base_url');
 	
 		//exit;
    	//$qr_data="http://".$base_url."/Home/index/index?shopid=".$shopid."&tid=".$tid;
    	//$qr_data="http://www.baidu.com".$shopid."&tid=".$tid;
    	$qr_data=U('')."?tid=".$tid;
    	 //dump($qr_data); exit;
    	 $qr_level ='H';
     	$qr_size ='5';
  		$save_prefix ='YD_';
  		$filename = createQRcode($save_path,$qr_data,$qr_level,$qr_size,$save_prefix);
  			dump($qr_data);
 		dump($save_path);
 		dump($qr_level);
 		dump($qr_size);
 		dump($save_prefix);
  		dump($filename);
  		exit;
  		return $shopf."/".$filename;
      
    }
    
    public function imgdown(){
    	$img=I('url');
    	
    	$qr_url=substr($_SERVER['DOCUMENT_ROOT'],-1)=="/"?((substr(C('qr_url'),0,1)=="/")?substr(C('qr_url'),1):C('qr_url')):C('qr_url');
    	
    	$img=$_SERVER['DOCUMENT_ROOT']."/".$qr_url.$img;
    	
      if(!filedown($img)){
      	$this->error("此文件不存在");

      }	
	
    }


	public function creatLetter1($len=2)
	{
		$chars='ABDEFGHJKLMNPQRSTVWXY'; // characters to build the password from   
		mt_srand((double)microtime()*1000000*getmypid()); // seed the random number generater (must be done)   
		$password='';   
		while(strlen($password)<$len)   
		$password.=substr($chars,(mt_rand()%strlen($chars)),1);   
		return $password;   
	}

	public function creatLetter2($len=2)
	{
		$chars='abcdefghijklmnopqrstuvwxyz'; // characters to build the password from   
		mt_srand((double)microtime()*1000000*getmypid()); // seed the random number generater (must be done)   
		$password='';   
		while(strlen($password)<$len)   
		$password.=substr($chars,(mt_rand()%strlen($chars)),1);   
		return $password;   
	}
    
	public function creatNum($len=2)
	{
		$chars='0123456789'; // characters to build the password from   
		mt_srand((double)microtime()*1000000*getmypid()); // seed the random number generater (must be done)   
		$password='';   
		while(strlen($password)<$len)   
		$password.=substr($chars,(mt_rand()%strlen($chars)),1);   
		return $password;   
	}



	//删除文件夹和该文件夹下所有文件
	public function deldir($dir) {
	  //先删除目录下的文件：
	  $dh=opendir($dir);
	  while ($file=readdir($dh)) {
	    if($file!="." && $file!="..") {
	      $fullpath=$dir."/".$file;
	      if(!is_dir($fullpath)) {
	          unlink($fullpath);
	      } else {
	          deldir($fullpath);
	      }
	    }
	  }
	 
	  closedir($dh);
	  //删除当前文件夹：
	  if(rmdir($dir)) {
	    return true;
	  } else {
	    return false;
	  }
	}




//*等级列表*//
	public function grade(){
		$token      = $_GET['token'];
		$count		= M('Zzgrade')->count();
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$grade 		= M('Zzgrade')->limit($Page->firstRow.','.$Page->listRows)->order('id ASC')->select();
		$this->assign('grade',$grade);
		$this->assign('token',$token);
		$this->assign('page',$Page->show());
		$this->display();
	}

	//*修改等级*//
	public function edit_grade()
	{

		$id = $_GET['id'];
		$token = $_GET['token'];
		$grade = M('Zzgrade');
		$the_grade = $grade->where('id='.$id)->find();
		if(IS_POST)
		{
			$data = $_POST;
			$map['id'] = intval($id);
			$arr['name'] = $data['name'];
			$arr['point'] = intval($data['point']);
			$arr['reccode'] = intval($data['reccode']);
			$arr['scancode'] = intval($data['scancode']);
	
			if($arr['name']&&$arr['point']&&$arr['reccode']&&$arr['scancode'])
			{
				//$grade = M('Zzgrade');
				$res = $grade->where($map)->save($arr);
				$this->redirect('Api/grade', array('token' => $token), 2, '修改成功,页面跳转中...');
				 //$this->success('修改成功', 'User/list', array('token' => $token));
					//$this->redirect('Api/grade',5,'等级修改成功');
			}	
		}
		$this->the_id = $id;
		$this->the_grade = $the_grade;
		$this->display('edit_grade');
	}

	//*新增等级*//
/*	public function add_grade(){

		$id = $_GET['id'];
		
		$this->display('edit_grade');
	}*/


//*积分列表*//
	public function user_point(){
		$token      = $_GET['token'];
		$count		= M('Zzuserinfo')->count();
		$Page       = new Page($count,15);
		$show       = $Page->show();
		$userpoint 	= M('Zzuserinfo')->field('id,tel,grade,point')->limit($Page->firstRow.','.$Page->listRows)->order('id ASC')->select();
		foreach ($userpoint as $ku => $vu) {
			$user_grade = $vu['grade'];
			if($user_grade=='3'){
				$userpoint[$ku]['user_grade_name'] = '首席会员';
			}
			elseif ($user_grade=='2') {
				$userpoint[$ku]['user_grade_name'] = '高级会员';
			}
			elseif ($user_grade=='1') {
				$userpoint[$ku]['user_grade_name'] = '初级会员';
			}
		}
		//dump($userpoint);
		$this->assign('userpoint',$userpoint);
		$this->user_grade_name = $user_grade_name;
		$this->assign('token',$token);
		$this->assign('page',$Page->show());
		$this->display('user_point');
	}



	//*修改积分*//
	public function edit_user_point()
	{

		$id = $_GET['id'];
		$token = $_GET['token'];
		$userinfo = M('Zzuserinfo');
		$the_user_info = $userinfo->where('id='.$id)->find();

		if(IS_POST)
		{
			$data = $_POST;
			$map['id'] = intval($id);
			//$arr['truename'] = $data['truename'];
			$arr['point'] = intval($data['point']);
			$arr['grade'] = intval($data['grade']);
			$arr['inpoint'] = intval($data['inpoint']);
			$arr['outpoint'] = intval($data['outpoint']);

			if($arr['point']&&$arr['grade']&&$arr['inpoint']&&$arr['outpoint'])
			{
				//$grade = M('Zzgrade');
				$res = $userinfo->where($map)->save($arr);
				$this->redirect('Api/user_point', array('token' => $token), 2, '修改成功,页面跳转中...');
				 //$this->success('修改成功', 'User/list', array('token' => $token));
					//$this->redirect('Api/grade',5,'等级修改成功');
			}	
			else
			{
				$this->redirect('Api/user_point', array('token' => $token), 2, '修改失败,页面跳转中...');
			}
		}
		$this->the_id = $id;

		$this->the_user_info = $the_user_info;
		$this->display('edit_point');
	}

	public function ajaxpoint()
	{
		$id = $_POST['id'];
		$userpoint = M('Zzuserinfo');
		$res = $userpoint ->where("id=".$id)->delete();
		if($res)
		{
			echo json_encode(1);
		}
		else
		{
			echo json_encode(0);
		}
	}

}


?>