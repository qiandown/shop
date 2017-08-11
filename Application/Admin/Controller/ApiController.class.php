<?php
namespace Admin\Controller;
use Think\Controller;
class ApiController extends Controller
{
	public function get_location(){
		$url = 'https://www.kuaidi100.com/query?type=jd&postid=VC34438354672';
		$content = file_get_contents($url);
		$arr = json_decode($content,true);
		dump($arr);
	}
	//发送邮件
	public function active(){
		$res = send_mail('592942997@qq.com','测试','测试');
	}
}