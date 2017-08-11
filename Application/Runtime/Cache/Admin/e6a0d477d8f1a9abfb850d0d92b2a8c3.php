<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>相册列表</title>

        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script src="/Public/Admin/jquery-1.7.2.js" type="text/javascript"></script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：相册管理-》XX的相册列表</span>
              
            </span>
        </div>
        <div></div>
        
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>大图</td>
                        <td>缩略图</td>
                        <td align="center">操作</td>
                    </tr>
        <?php if(is_array($datas)): foreach($datas as $key=>$d): ?><tr >
                        <td><?php echo ($d["id"]); ?></td>
                        <td><img src="/Public/Uploads/<?php echo ($d["pic_big"]); ?>" height="60" width="60"></td>
                        <td><img src="/Public/Uploads/<?php echo ($d["pic_small"]); ?>" height="40" width="40"></td>
                   
                        <td><a href="javascript:void(0);" data-id='<?php echo ($d["id"]); ?>' class="del">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
         <form action="<?php echo U('goods/pic');?>" method="post" enctype="multipart/form-data" >
         <input name="id" type="hidden" value="<?php echo ($_GET['id']); ?>"/>
         <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
             
                    <tr style="font-weight: bold;">
                        <td>选择图片<a href="javascript:void(0);" id='add'>[+]</a></td>
                       
                    </tr>
                  <tbody id="img_files">
                    <tr>
                        <td><input type="file" name='image[]'/></td>
                    </tr>
                </tbody>

            </table>
             <input type="submit" value="确认保存">
         </div>
         </form>
    </body>
    <script type="text/javascript">
    $(function(){
        //增加点击事件
        $("#add").click(function(){
            str = "<tr><td><input type='file' name='image[]'/><a class='pic_del' href='javascript:void(0);'>[-]</a></td></tr>";
            $("#img_files").append(str);
        });
        //动态绑定事件
        $(".pic_del").live('click',function(){
            $(this).parents('tr').remove();
        });
        //ajax删除图片
        $('.del').click(function(){
                    //获取要删除的图片的ID
                     _this = $(this);
                   id =  _this.attr('data-id');
                    //发送ajax请求
                 $.post('/Admin/Goods/picdel',{'pic_id':id},function(data){

                    if(data.status==1){
                       _this.parents('tr').remove();
                     }
                    },'json');

               })
    });
    </script>
   
</html>