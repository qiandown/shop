<?php
namespace Admin\Controller;

class CateController extends CommonController
{
    public function showList(){
        $this->assign('cate_data',$this->model->select());
        $this->display();
    }
    public function add(){
        if(IS_POST){
            if($this->model->add(I('post.'))){
                $this->success('操作成功！',U('showlist'),1);exit;
            }else{
                $this->success('操作失败！');
            }
        }
        $this->display();
    }
    public function del(){
        $id = I('id');
        if($this->model->delete($id)){
            $this->success('操作成功！',U('showlist'),1);exit;
        }else{
            $this->success('操作失败！');
        }
    }
}