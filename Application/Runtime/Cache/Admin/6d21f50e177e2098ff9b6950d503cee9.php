<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>权限列表</title>

        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
         <script src="/Public/Admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：角色管理-》权限列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('rolelist');?>">【返回角色管理】</a>
                </span>
            </span>
        </div>
        <div></div>
      
        <div style="font-size: 13px; margin: 10px 5px;">
        <form action="<?php echo U('accessEdit');?>" method="post" name='access'>
         <input type="hidden" value="<?php echo ($_GET['id']); ?>" name="role_id">
            <table id="menu_list" class="table_a" border="1" width="100%">
                <tbody>
                      <tr>
                        <td>当前角色：</td>
                         <td>
                           <?php echo ($datas["role_name"]); ?>
                         </td>
                       
                    </tr>
                    <?php if(is_array($menu_datas)): foreach($menu_datas as $key=>$d): ?><tr >

                        <td><input <?php if(in_array($d[id],$access_datas)): ?>checked<?php endif; ?> data-id='<?php echo ($d["id"]); ?>' value="<?php echo ($d["id"]); ?>" name="menu_id[]" class="checkpart"  type="checkbox" ><?php echo ($d["menu_name"]); ?></td>

                         <td id="checkbox_<?php echo ($d["id"]); ?>">
                         <?php if(is_array($d[_child])): foreach($d[_child] as $key=>$dd): ?><div  style="width:100px;float:left;"><input <?php if(in_array($dd[id],$access_datas)): ?>checked<?php endif; ?>  value="<?php echo ($dd["id"]); ?>" name="menu_id[]"   type="checkbox"/><?php echo ($dd["menu_name"]); ?></div><?php endforeach; endif; ?>
                         </td>
                       
                    </tr><?php endforeach; endif; ?>
                  
               
                  
                    
                </tbody>
            </table>
            <table class="table_a" border="1" width="100%">
                <tbody>
                     <tr >
                        <td  style="text-align: center;"><input class="checkall" type="checkbox" /> 全选/反选</td>
                        <td>&nbsp <input type="submit" name="保存"/>
                         </td>
                       
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
        
    </body>
    <script type="text/javascript">
        $(function(){
            //全选、全不选
            $('.checkall').click(function(){
                //遍历所有的选择框
                $('#menu_list :checkbox').each(function(){
                   //全选升级版本
                   $(this).attr('checked',!$(this).attr('checked'));

                })

            })
            //分组选择
            $('.checkpart').click(function(){
                //获取是点击的哪一个父类菜单
                id = $(this).attr('data-id');
                $("#checkbox_"+id+" :checkbox").each(function(){
                     $(this).attr('checked',!$(this).attr('checked'));
                })
            })
        })
    </script>
   
</html>