<?php
namespace Admin\Controller;

class GoodsController extends \Admin\Controller\CommonController
{
    public function showList(){
        $datas = $this->model->field('a.*,b.brand_name,c.category_name')->alias('a')->join('left join tp_brand as b on a.brand_id=b.id')->join('left join tp_category as c on a.cate_id=c.id')->select();
        $this->assign('datas',$datas);
        $this->display();
    }
    public function pic(){
        $id = I('id');
        if(IS_POST){
           if($_FILES['image']['name'][0]){
            $infos = $this->upload();
            $image = new  \Think\Image();
            //批量增加图片
            foreach($infos as $key=>$value){
                //原图
                $data[$key]['pic_big'] = $value['savepath'].$value['savename'];
                $data[$key]['goods_id'] = $id;
                //缩略图
                $imgpath = UPLOAD . $data[$key]['pic_big'];
                $image->open($imgpath);
                $imgname = UPLOAD . $value['savepath'].'thumb_'.$value['savename'];
                $image->thumb(100, 100)->save($imgname);
                $data[$key]['pic_small'] = $value['savepath'].'thumb_'.$value['savename'];
            }
                //批量增加操作
                $res = M('pic')->addAll($data);
           }
        }
        $datas= M('pic')->where('goods_id='.$id)->select();
        $this->assign('datas',$datas);
        $this->display();
    }
    public function edit(){
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $goods_data = I('post.');
            if($_FILES['goods_image']['name']){
            //上传图片
            $info = $this->upload();
            $goods_data['goods_big_pic'] = $info['goods_image']['savepath'].$info['goods_image']['savename'];
            //缩略图
            $image = new  \Think\Image();
            $imgpath = UPLOAD . $goods_data['goods_big_pic'];
            $image->open($imgpath);
            $imgname = UPLOAD . $info['goods_image']['savepath'].'thumb_'.$info['goods_image']['savename'];
            $image->thumb(100, 100)->save($imgname);
            $goods_data['goods_small_pic'] = $info['goods_image']['savepath'].'thumb_'.$info['goods_image']['savename'];
            }
            //添加时间
            $goods_data['goods_addtime'] = time();
            //添加到表
            $goods_id = $this->model->add($goods_data);
            //图片添加到相册
            M('pic')->pic_big = $goods_data['goods_big_pic'];
            M('pic')->pic_small = $goods_data['goods_small_pic'];
            M('pic')->goods_id = $goods_id;
            $rs = M('pic')->add();
            if($rs){
            	foreach($goods_data['goods_attr'] as $key=>$value){
            		$value_data['goods_id'] = $rs;
            		$value_data['attr_id'] = $key;
            		$value_data['goods_attr_val'] = implode(',',$value);
            		M('goodsattr')->add($value_data);
            	}
                $this->success('OK!',U('showlist'),1);die;
            }else{
                $this->error('NO');die;
            }
        }
        $brand_data = M('brand')->select();
        $this->assign('brand_data',$brand_data);
        $cate_data = M('cate')->select();
        $this->assign('cate_data',$cate_data);
        $this->display();
    }
    public function del(){
        $id = I('post.id');
        $model = M('goods');
        $data = $model->find($id);
        if($data['goods_status'] == 1){
            $data['goods_status']=0;
            $model->save($data);
            $msg = array('goods_status' => 0, 'info' => '上架');
            $this->ajaxReturn($msg);
        }else{
            $data['goods_status']=1;
            $model->save($data);
            $msg = array('goods_status' => 1, 'info' => '下架');
            $this->ajaxReturn($msg);
        }
    }
    public function upload()
    {
        $upload = new \Think\Upload();
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootpath = './Public/Uploads/'; // 设置附件上传目录
        // 上传文件
        return $upload->upload();
    }

     public function picdel(){
        $id = I('pic_id');
        $pic_data = M('pic')->find($id);
        if ($pic_data) {
            //执行文件删除操作
            //  //D:/itcast/php10/tp_shop/Public/Upload/
            $del_big = UPLOAD . $pic_data['pic_big'];
            $del_small = UPLOAD . $pic_data['pic_small'];
            unlink($del_big);
            unlink($del_small);
            //unlink(绝对路径)
            $res = M('pic')->delete($id);
            if ($res) {
                $msg = array('status' => 1, 'msg' => '删除成功!');
                $this->ajaxReturn($msg);

            } else {
                $msg = array('status' => 0, 'msg' => '删除失败!');
                $this->ajaxReturn($msg);
            }
        }
    }
    public function test(){
        $data = I('goods_description');
        $data = htmlPurifier($data);
        dump($data);die;
    }
}