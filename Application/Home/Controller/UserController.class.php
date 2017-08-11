<?php
namespace Home\Controller;

use Think\Controller;
class UserController extends Controller
{
	public function login(){
	    if(IS_POST){
	        $data = I('post.');
            $rs = M('user')->where(array('user_name'=>$data['user_name'],'user_pwd'=>md5($data['user_pwd'])))->find();
            if($rs){
                session('uid', $rs['id']);
                session('username', $rs['user_name']);
                $this->success('OK!',U('index/index'),1);die;
            }else{
                $this->error('NO!');
            }
        }
		$this->display();
	}
    public function loginout(){
	    session(null);
	    $this->success('ok!',U('index/index'),1);
    }
	public function reg(){
	    if(IS_POST){
	        $model = D('User');
	        $data = I('post.');
	        //使用模型自动验证
            $datas = $model->create($data);
            if(!$datas){
                $this->error($model->getError());die;
            }
            if(D('User')->add()){
                $this->success('OK!',U('login'),1);die;
            }
        }
		$this->display();
	}
	public function verify(){
		$verify = new \Think\Verify();
		$verify -> entry();
	}
}
?>