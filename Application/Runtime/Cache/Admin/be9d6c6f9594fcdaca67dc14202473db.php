<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="../../../../Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <style>
            .current{display:inline-block;width:20px;height: 20px;font-weight: bold;}
            .num{display:inline-block;width:20px;height: 20px;border:solid 1px gray;color:blue;margin:5px;}
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
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                <tr style="font-weight: bold;">
                    <td>序号</td>
                    <td>商品名称</td>
                    <td>排序</td>
                    <td>图片</td>
                    <td align="center">操作</td>
                </tr>
            <?php if(is_array($brandlist)): $i = 0; $__LIST__ = $brandlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr id="product<?php echo ($row["id"]); ?>">
                    <td><?php echo ($row["id"]); ?></td>
                    <td><?php echo ($row["brand_name"]); ?></td>
                    <td><?php echo ($row["brand_sort"]); ?></td>
                    <td><img src="/Public/Uploads/<?php echo ($row["brand_image"]); ?>" width="60" height="60" /></td>
                    <td>
                        <a href="/Admin/Brand/update/id/<?php echo ($row["id"]); ?>">修改</a>
                        <a href="javascript:if(confirm('删除？'))window.location.href='/Admin/Brand/delete/id/<?php echo ($row["id"]); ?>'">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <?php echo ($show_link); ?>
        </div>
    </body>
</html>