<?php
namespace Admin\Controller;

use Think\Controller;
class SystemController extends Controller
{
    public function menuList(){
        $datas = M('menu')->select();
        $datas = getTree($datas,'pid');
        $this->assign('datas',$datas);
        $this->display();
    }
    public function menuAdd(){
        $this->display();
    }
    public function roleList(){
        $datas = M('role')->select();
        $this->assign('datas',$datas);
        $this->display();
    }
    public function roleAdd(){
        if(IS_POST){
            $data = I('post.');
            if(M('role')->add($data)){
                $this->success('操作成功',U('roleList'),1);
            }else{
                $this->error('操作失败');
            }
        }else{
            $this->display();
        }
    }
    public function accessList(){
            //权限菜单
            $datas = M('menu')->select();
            $menu_datas = list_to_tree($datas);
            //角色
            $role_id = I('id');
            $adatas = M('access')->where('role_id='.$role_id)->select();
            foreach($adatas as $value){
                $access_datas[]=$value['menu_id'];
            }
            $this->assign('access_datas',$access_datas);
            $datas = M('role')->find($role_id);
            $this->assign('datas',$datas);
            $this->assign('menu_datas',$menu_datas);
            $this->display();
    }
    //权限更新操作
    public function accessEdit(){
        $model = M('access');
        //接受数据
        $menu_id         = I('menu_id');
        $role_id = I('role_id');
        $data['role_id']         = $role_id;
        //增加权限到数据库中去
        foreach ($menu_id as $key => $value) {
            $data['menu_id'] = $value;
            $res             = $model->add($data);
        }
        if ($res) {
            $this->success('操作成功!', U('accessList', array('id' => $role_id)));
        } else {
            $this->error('操作失败');
        }
    }
}