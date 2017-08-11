<?php
namespace Admin\Controller;

use Think\Controller;

header('content-type:text/html;charset=utf-8');

class LoginController extends Controller
{
    public function login()
    {   
        if(IS_POST){
//            $ip = get_client_ip();
//            //类初始化操作，一定要指定IP数据库文件
//            $location = new \Org\Net\IpLocation('qqwry.dat');
//            //根据IP地址来获取地理信息
//            $data = $location->getlocation($ip);
//            dump($data);exit;

            $data = I('post.');
            $captcha = I('captcha');
            $username = I('username');
            $password = md5(I('password'));
            //验证码检验
            $verify = new \Think\Verify();
            if($verify->check($captcha)){
            //用户名和密码检验
            $checkUP = M('admin')->where(array('username'=>$username,'password'=>$password))->find();
                if($checkUP){
                    session('role_id', $checkUP['id']);
                    session('username', $checkUP['username']);
                    $this->success('操作成功',U('index/index'),1);
                }else{
                    $this->error('用户名或密码错误');
                }
            }else{
                $this->error('验证码错误！');
            }
        }else{
        $this->display();
        }
    }
    public function captcha(){
    	$config = array(
    		'fontSize' => 50,
    		'length'   => 2,
    		'fontttf'  => '4.ttf',
    		'useNoise' => false
    	);
        $verify = new \Think\Verify($config);
        $verify->entry();
    }
    public function test(){
        $arr = array();
        if($arr==null && $arr==false && empty($arr) && isset($arr)){
            echo 1;
        }else{
            echo 2;//2
        }
    }
}