<?php
namespace Admin\Controller;

use Think\Controller;
class CommonController extends Controller
{
    public $model;
    public function __construct(){
        //实例化继承父类
        parent::__construct();
//        if (!session('?username')) {
//            $this->error('请登录后再操作!', U('login/login'),1);
//        }
        //获取实例化的类的名称
        $this->model = D(CONTROLLER_NAME);
    }
}