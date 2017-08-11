<?php
namespace Home\Controller;

use Think\Controller;
class TestController extends Controller
{
	public function test(){
		$model = D('goods');
		$data = $model->test();
		echo $data;
	}
}