<?php
namespace  Home\Controller;

use Think\Controller;
class GoodsController extends \Home\Controller\CommonController
{
    public function detail(){
    	$goods_id = I('id');
    	$datas = M('goods')->field('a.*,b.brand_name')->alias('a')->join('tp_brand as b on a.brand_id=b.id')->where('a.id='.$goods_id)->find();
    	$attr_data = M('goodsattr')->alias('a')->join('left join tp_attribute as b on a.attr_id=b.id')->where('a.goods_id='.$goods_id)->select();
    	foreach($attr_data as $key=>$value){
    		$attr_data[$key]['val_attr'] = explode(',',$attr_data[$key]['attr_val']);
    	}
    	//相册查询
    	$pic_data = M('pic')->where('goods_id='.$goods_id)->select();
    	$this->assign('pic_data',$pic_data);
    	$this->assign('datas',$datas);
    	$this->assign('attr_data',$attr_data);
    	$this->display();
    }
    public function showlist()
    {
        $brand_id = !empty($_GET[brand_id]) ? $_GET[brand_id] : 0;
        $price = empty(I('price')) ? 0 : $_GET['price'];
        $brand_datas = M('brand')->select();
        $this->assign('brand_datas',$brand_datas);
        $price_data = getPrice();
        $this->assign('price_data',$price_data);
        $where = ' goods_status=1';
        if ($brand_id) {
            $where .= ' and brand_id=' . $brand_id;
        }
        //获取商品信息
        $datas = M('goods')->where($where)->select();
        $this->assign('datas', $datas);
        $this->display();
    }
}