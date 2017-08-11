<?php
namespace Home\Controller;

use Think\Controller;
class OrderController extends Controller
{
    public function show()
    {
        $data = I('post.');
        //根据商品的ID查询出数据
        $goods_data                         = M('Goods')->find($data['goods_id']);
        $order_data['goods_id']             = $data['goods_id'];
        $order_data['goods_attr']           = json_encode($data['attr_val']);
        $order_data['cart_mprice']          = $goods_data['goods_mprice'];
        $order_data['cart_price']           = $goods_data['goods_price'];
        $order_data['cart_goods_name']      = $goods_data['goods_name'];
        $order_data['cart_goods_small_pic'] = $goods_data['goods_small_pic'];
        $order_data['cart_count']           = $data['number'];
        //为了和购物车同用一个代码将order_data 转换成一个二维数组
        $order_goods_data[] = $order_data;

        //展示模板
        //计算总价：
        $total = 0;
        //转换属性json数据
        foreach ($order_goods_data as $key => $value) {
            $order_goods_data[$key]['goods_attr'] = json_decode($value['goods_attr'], true);
            $total += $value['cart_price'] * $value['cart_count'];
        }
        //获取当前登录用户的收货人信息
        $addr_data = M('location')->where('user_id=' . session('uid'))->select();
        $this->assign('addr_data', $addr_data);
        $this->assign('total', $total);
        $this->assign('form_goods_data', serialize($order_goods_data));
        $this->assign('order_data', $order_goods_data);
        $this->display();
    }
    //下订单操作
    public function add()
    {
        if (IS_POST) {
            //接受订单所有的数据
            $data = $_POST;

            // 订单编号= 下单时间【时分秒】+UID+随机数（4位）
            $order_data['order_number'] = date('YmdHis') . session('uid') . rand(1000, 9999);
            $order_data['user_id']      = session('uid');
            //查询收货人的信息
            $addr_data                    = M('location')->find($data['addr_id']);
            $order_data['order_name']     = $addr_data['addr_name']; //收货人
            $order_data['order_phone']    = $addr_data['addr_phone']; //联系方式
            $order_data['order_address']  = $addr_data['addr_address']; //收货地址
            $order_data['order_time']     = time();
            $order_data['order_send']     = $data['order_send'];
            $order_data['order_pay_type'] = $data['order_pay_type'];
            $order_data['order_price']    = $data['totalprice'];
            //订单入口操作
            $order_id = M('Order')->add($order_data);
            if ($order_id) {
                //写入当前订单下的所有商品，tp_goods_order
                $goods_data = unserialize($data['goods_datas']);

                foreach ($goods_data as $key => $value) {
                    # code...
                    $sub_order_data['goods_name']  = $value['cart_goods_name'];
                    $sub_order_data['goods_attr']  = serialize($value['goods_attr']); //写入数据库操作如果是数组使用serialize
                    $sub_order_data['goods_count'] = $value['cart_count'];
                    $sub_order_data['goods_price'] = $value['cart_price'];
                    $sub_order_data['order_id']    = $order_id;
                    $sub_order_data['goods_id']    = $value['goods_id'];
                    M('goods_order')->add($sub_order_data);
                }

            }
            //订单创建成功后直接跳转到订单展示页面【付款页面】
            $this->redirect('order/pay', 'oid=' . $order_id);
        }
    }
    //订单付款方法
    public function pay()
    {
        $oid = I('oid');
        //获取订单[当前下单用户的user_id]
        $model      = M('Order');
        $order_data = $model->where(array('user_id' => session('uid'), 'id' => $oid))->find();

        $this->assign('order_data', $order_data);
        $this->display();
    }
}