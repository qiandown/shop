<?php
namespace Admin\Controller;

class BrandController extends \Admin\Controller\CommonController
{
    public function showlist(){
        //生成缩略图
//        $image = new \Think\Image();
//        $image->open('./1.jpg');
//        $image->thumb(150, 150)->save('./thumb.jpg');

        //分页
        $count = $this->model->count();
        $page = new \Think\Page($count,2);
        $page->rollPage = 3;
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->lastSuffix = false;
        $show_link = $page->show();
        $this->assign('show_link',$show_link);
        $brandlist = $this->model->limit($page->firstRow,$page->listRows)->order('id')->select();
        $this->assign('brandlist',$brandlist);
        $this->display();
    }
    public function update(){
        if(IS_POST){
            $datas = I('post.');
            $model = M('brand');
            if($model->save($datas)){
                $this->success('操作成功',U('brand/showlist'),2);
            }else{
                $this->error('操作失败');
            }
        }else {
            $id = I('get.id');
//            $model = M('brand');
            $brandList = $this->model->find($id);
            $this->assign('brandList',$brandList);
            $this->display();
        }
    }
    public function delete(){
        $id = I('get.id');
//        $brandModel = M('brand');
        $this->model->delete($id);
        $this->success('OK!',U('brand/showlist'),1);
    }
    public function add(){
        if(IS_POST){
            $data = I('post.');
            $model = D('brand');
            $info = $this->upload();
//            dump($info);die;
            //生成的图片名拼接路径保存到$_POST
            $data['brand_image']=$info['brand_image']['savepath'].$info['brand_image']['savename'];
            $datas = $model->create($data); //自动创建数据对象，create 可以将数据写入到数据库中
            if(!$datas){
            	$this->error($model->getError());die;
            }
            if($model->add()){
                $this->success('操作成功',U('showlist'),1);
            }else{
                $this->error('操作失败');
            }
        }else {
            $this->display();
        }
    }
    public function upload(){
        $upload = new \Think\Upload();
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
         $upload->rootpath  =      './Public/Uploads/'; // 设置附件上传目录
        // 上传文件     
       return $info   =   $upload->upload();
    }
}