<?php
namespace Admin\Model;

use Think\Model;
class GoodsModel extends Model
{
    //增加商品
    public function goodsAdd(){
        if($_FILES['goods_image']['name']){
            //上传图片
            $upload = new \Think\Upload();
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootpath = './Public/Uploads/'; // 设置附件上传目录
            return $upload->upload();

        }
    }
    //修改商品
    public function goodsEdit(){

    }
    public function test(){
        return 1;
    }
}