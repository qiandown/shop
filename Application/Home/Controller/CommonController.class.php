<?php
namespace Home\Controller;

use Think\Controller;
class CommonController extends Controller
{
    public $model;
    public function __construct(){
        //实例化继承父类
        parent::__construct();
        //获取实例化的类的名称
        $this->model = D(CONTROLLER_NAME);
    }
}