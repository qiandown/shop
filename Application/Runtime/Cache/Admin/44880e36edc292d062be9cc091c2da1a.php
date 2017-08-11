<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>商品列表</title>
        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script src="/Public/Admin/jquery-1.7.2.js" type="text/javascript"></script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('add');?>">【添加商品】</a>
                </span>
            </span>
        </div>
        <div></div>
        
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>商品名称</td>
                         <td>分类</td>
                         <td>品牌</td>
                        <td>库存</td>
                        <td>价格</td>
                        <td>缩略图</td>
                        <td>创建时间</td>
                        <td align="center" colspan="3">操作</td>
                    </tr>
                <?php if(is_array($datas)): foreach($datas as $key=>$d): ?><tr >
                        <td><?php echo ($d["id"]); ?></td>
                        <td><a href="<?php echo U('Home/Goods/detail','id='.$d['id']);?>" target="_blank"><?php echo ($d["goods_name"]); ?></a></td>
                        <td>100</td>
                        <td><?php echo ($d["brand_name"]); ?></td>
                         <td><?php echo ($d["goods_count"]); ?></td>
                        <td><?php echo ($d["goods_price"]); ?></td>
                        <td><img src="/Public/Uploads/<?php echo ($d["goods_small_pic"]); ?>"></td>
                        <td><?php echo (date('Y-m-d H:i:s',$d["goods_addtime"])); ?></td>
                         <td><a href="<?php echo U('goods/pic','id='.$d[id]);?>">相册管理</a></td>
                        <td><a href="<?php echo U('goods/edit','id='.$d[id]);?>">修改</a></td>
                        <td><a class="goods_del" data-id="<?php echo ($d["id"]); ?>" href="javascript:;" ><?php if($d["goods_status"] == 1): ?>下架  <?php else: ?>  上架<?php endif; ?></a></td>
                    </tr><?php endforeach; endif; ?>  
                   
                   
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($pages); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    <script type="text/javascript">
        $(function(){ 
            //增加点击事件
            $('.goods_del').click(function(){
                //获取商品的ID
                _this = $(this);
                id = _this.attr('data-id');//获取当前对象的属性的值
                //使用ajax的post方法
                $.post('/Admin/Goods/del',{'id':id},function(datas){
                        //注意：使用$(this) 在ajax方法中是不能直接使用的
                        _this.text(datas.info);
                },'json')
            })
        })
    </script>
</html>