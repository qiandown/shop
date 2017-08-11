<?php
namespace Home\Model;

use Think\Model;
class UserModel extends Model
{
    //增加自动验证
    protected $_validate = array(
        array('user_name', 'require', '用户名不能为空！'), //用户不能为空
        array('user_pwd', 'require', '用户密码不能为空！'), //验证密码不能为空
        array('user_pwd2', 'user_pwd', '两次输入的密码不一致', 1, 'confirm'), //两次密码不一致
        array('user_email', 'email', '邮箱格式不正确！'),
    );
    public function _before_insert(&$data){
        $data['user_pwd'] = md5($data['user_pwd']);
    }
}