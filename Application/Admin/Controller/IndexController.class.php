<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function __construct(){
    //实例化继承父类
    parent::__construct();
    if (!session('?username')) {
        $this->error('请登录后再操作!', U('login/login'),1);
    }
}
    public function index(){
        $this->display();
    }
    public function left(){
        //实例化模型
        $model     = M('Access');
        $menu_data = $model->alias('a')->join('LEFT JOIN tp_menu AS b ON a.menu_id = b.id')->where(array('a.role_id' => session('role_id'), 'is_show' => 1))->select();
        //生成树状结构
        $menu_data = list_to_tree($menu_data);
        $this->assign('menu_data', $menu_data);
        $this->display();
    }
    public function right(){
        $this->display();
    }
    public function head()
    {
        $this->display();
    }
    public function test(){
      $this->display();
    }
    public function test1()
    {
      $ph = I('ph');
      $code = rand(10000, 99999);
       $res = sendTemplateSMS($ph, array($code, '5'), '1');
        $this->ajaxReturn($res);
    }
}