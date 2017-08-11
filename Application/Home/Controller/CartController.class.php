<?php
namespace Home\Controller;

use Think\Controller;
class CartController extends Controller
{
    public function showList(){
    	if(session('?username')){
    		$cart_datas = M('cart')->where('user_id='.session('uid'))->select();
    	}else{
    		$cart_datas = unserialize(cookie('cart_data'));
    	}
    	foreach($cart_datas as $key=>$value){
    			$cart_datas[$key]['goods_attr'] = json_decode($cart_datas[$key]['goods_attr'],true);}
    	$this->assign('cart_datas',$cart_datas);
        $this->display();
    }
    public function add(){
    	$datas = I('post.');
    	$goods_data = M('goods')->find($datas['goods_id']);
    	$cart_data['goods_id'] = $datas['goods_id'];
    	$cart_data['goods_price'] = $goods_data['goods_price'];
    	$cart_data['goods_mprice'] = $goods_data['goods_mprice'];
    	$cart_data['number'] = $datas['number'];
    	$cart_data['goods_attr'] = json_encode($datas['attr_val']);
    	$cart_data['goods_small_pic'] = $goods_data['goods_small_pic'];
    	if(session('?username')){
    		//用户已经登录
    		$cart_data['user_id'] = session('uid');
    		$res = M('cart')->add($cart_data);
    	}else{
    		//用户未登录
    		$old_data = cookie('cart_data');
    		if($old_data){
    			$old_cart = unserialize($old_data);
    			$old_cart[$datas['goods_id']] = $cart_data;
    			cookie('cart_data',serialize($old_cart),3600 * 24 * 3);
    		}else{
    			$new_cart[$datas['goods_id']] = $cart_data;
    			cookie('cart_data',serialize($new_cart),3600 * 24 * 3);
    		}
    	}
    	    //直接跳转到购物车列表页面
        $this->redirect('showlist');
    }
    public function del(){
    	$id = I('goods_id');
    	if(session('?username')){
    		M('cart')->where('goods_id='.$id.'and user_id='.session('uid'))->delete();
    	}else{
    		//删除cookie
    		$cart_data = unserialize(cookie('cart_data'));
    		unset($cart_data[$id]); //删除数组中的数据
    		cookie('cart_data', serialize($cart_data), 3600 * 24 * 3);
    	}
    }
        //修改方法
    public function edit()
    {
        $id          = I('id'); //商品的ID
        $goods_count = I('number'); //修改的数量
        //判断用户是否登录
        if (session('?username')) {
            M('cart')->where('goods_id=' . $id . ' and user_id=' . session('uid'))->save(array('number' => $goods_count));
        } else {
            //先取出cookie
            $cart_data = unserialize(cookie('cart_data'));
            $cart_data[$id]['number'] = $goods_count;
            cookie('cart_data', serialize($cart_data), 3600 * 24 * 3); //
        }
    }
}