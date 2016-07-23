<?php
/**
 * Created by PhpStorm.
 * User: huangweiming
 * Date: 2016/6/27
 * Time: 17:44
 */
class ImgAction extends Action {
   
    public function  __construct(){
      
    }
     /**
     * 获取根目录
     * @return type
     */
    public static function getRootDir() {
        return dirname(dirname(dirname(dirname(dirname(__FILE__)))));
    }
    /**
     * Created by PhpStorm.
     * User: huangweiming
     * 功能:保存商家分类
     * Date: 2016/6/29
     * Time: 8:44
     */
    public function del_img(){
        $src=$_GET['img'];
        $img=self::getRootDir().$src;
        $result=unlink($img);
        $res=array(
            'error_code'=>0,
            'msg'=>'已删除',
            'data'=>$result
        );
        if(!$result){
             $res['error_code']=1;
             $res['msg']="操作失败";
        }else{
            $model=$_GET['model'];
            if(isset($model)){
                $field="img";
                $model=M($model);
                $id=$_GET['id'];

                $detail=$model->where(array("id"=>$id))->field($field)->find();
              
                   $res['detail']=$detail['img'];
                if($detail['img']){
                    $img=explode(",",$detail['img']);
                    foreach($img as $key=>$value){
                        if($value==$src){
                            unset($img[$key]);
                        }
                    }
                   $img=join(",",array_values($img));
                   $data['img']=$img;
                     $res['img']=$img;
                     $res['model']=$model;
               
            
                   $model->where(array("id"=>$id))->save($data);
                   $res['sql']=$model->_sql();
                   
                  
                }
            }
        }
        echo json_encode($res);
    }
   /**
     * Created by PhpStorm.
     * User: huangweiming
     * 功能:删除上传的图片
     * Date: 2016/7/5
     * Time: 8:44
     */
     public function imgs_del(){
        $src=$_POST['imgs'];
        if($src){
            $root=self::getRootDir();
            if(is_array($src)){
                 foreach($src as $key=>$value){
                     $result=unlink($root.$value);
                 }
            }else{
                  $img=$root.$src;
                  $result=unlink($img);
            }
            $res=array(
                'error_code'=>0,
                'msg'=>'已删除',
                'data'=>$result
            );
            if(!$result){
                $res['error_code']=1;
                $res['msg']="操作失败";
            }
        }else{
            $res=array(
            'error_code'=>-1,
                'msg'=>'操作失败',
                'data'=>''
             );
        } 

        echo json_encode($res);
    }
    /**
     * Created by PhpStorm.
     * User: huangweiming
     * 功能:删除上传的图片
     * Date: 2016/7/5
     * Time: 8:44
     */
    
}