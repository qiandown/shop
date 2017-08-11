<?php
namespace Admin\Model;

use Think\Model;
class BrandModel extends Model
{
    protected $_validate = array(
        array('brand_name','require','不能为空！'),
    );//自动验证定义
    protected $_map = array(
    	'name' => 'brand_name',
    );
}