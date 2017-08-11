<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
         <link href="/Public/Admin/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/Public/Admin/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/umeditor/lang/zh-cn/zh-cn.js"></script>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/Admin/Goods/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo U('test');?>" method="post" enctype="multipart/form-data" >
            <input value="<?php echo ($data["id"]); ?>" type="hidden" name="id" />
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input value="<?php echo ($data["goods_name"]); ?>" type="text" name="goods_name" /></td>
                </tr>
                <!-- <tr>
                    <td>商品分类</td>
                    <td>
                        <select name="f_goods_category_id">
                            <option value="0">请选择</option>
                           
                        </select>
                    </td>
                </tr> -->
                <tr>
                    <td>商品品牌</td>
                    <td>
                        <select name="brand_id">

                            <option value="0">请选择</option>
                            <?php if(is_array($brand_data)): foreach($brand_data as $key=>$d): ?><option <?php if($data[brand_id] == $d[id]): ?>selected<?php endif; ?> value="<?php echo ($d["id"]); ?>"><?php echo ($d["brand_name"]); ?></option><?php endforeach; endif; ?>
                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input value="<?php echo ($data["goods_price"]); ?>" type="text" name="goods_price" /></td>
                </tr>
                <tr>
                    <td>商品封面图片</td>
                    <td><input type="file" name="goods_image" /></td>
                </tr>
                 <tr>
                    <td>商品数量</td>
                    <td><input type="text"  value="<?php echo ($data["goods_count"]); ?>"  name="goods_count" /></td>
                </tr>
                <tr>
                    <td>商品排序</td>
                    <td><input type="text" value="<?php echo ($data["goods_sort"]); ?>"  name="goods_sort" /></td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <!--<script type="text/plain" name="goods_description" id="myEditor" style="width:1000px;height:240px;">-->
                       <!---->
                       <!--</script>-->
                        <textarea name="goods_description"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>

  
</html>