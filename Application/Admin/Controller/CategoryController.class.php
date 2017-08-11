<?php
namespace Admin\Controller;

class CategoryController extends \Admin\Controller\CommonController
{
    public function showlist(){
        $data = $this->model->select();
        $datas = getTree($data,'pid');
//        dump($datas);die;
        $this->assign('datas',$datas);
        $modelData = $this->model->order('id')->select();
        $this->assign('modelData',$modelData);
        $this->display();
    }

}