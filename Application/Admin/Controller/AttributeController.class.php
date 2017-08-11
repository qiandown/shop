<?php
namespace Admin\Controller;

class AttributeController extends \Admin\Controller\CommonController
{
    public function showList(){
    	$id = I('id');
        $attr_data = $this->model->alias('a')->field('a.*,b.cate_name')->join('left join tp_cate as b on a.cate_id = b.id')->where('cate_id='.$id)->select();
        $this->assign('attr_data',$attr_data);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            //实例化模型
            $model = M('Attribute');
            $datas = $model->create();
            //将中文逗号切换成英文
            $datas['attr_val'] = str_replace('，', ',', $datas['attr_val']);
            $res = $model->add($datas);
            if($res){
                $this->success('操作成功！',U('showlist'),1);die;
            }else{
                $this->error('操作失败！');
            }
        }
        $this->assign('cate_data',M('cate')->select());
        $this->display();
    }
    public function getAttr(){
        $cate_id = I('cate_id');
        $datas = $this->model->where('cate_id='.$cate_id)->select();
        $this->ajaxReturn($datas);
    }
}