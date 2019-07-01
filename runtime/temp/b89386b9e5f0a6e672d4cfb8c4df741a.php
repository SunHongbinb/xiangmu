<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\type\index.html";i:1561688497;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1561606428;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.2</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/erqi/public/static/admin/css/font.css">
	<link rel="stylesheet" href="/erqi/public/static/admin/css/xadmin.css">
    
    
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/erqi/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/erqi/public/static/admin/js/xadmin.js"></script>

</head>
<body>
   
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so layui-form-pane">
          <input class="layui-input" placeholder="分类名" name="cate_name">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon"></i>增加</button>
        </form>
      </div>
      <xblock>
        <span class="x-right" style="line-height:40px">共有数据 : 88 条</span>
      </xblock>
      <table class="layui-table layui-form">
        <thead>
          <tr>
            <th width="20">
            </th>
            <th width="70">ID</th>
            <th>栏目名</th>
            <th width="50">排序</th>
            <th width="50">状态</th>
            <th width="220">操作</th>
        </thead>
        <tbody class="x-cate">
          <?php foreach($type as $val): ?>
          <tr cate-id='<?php echo $val['id']; ?>' fid='<?php echo $val['pid']; ?>' >
            <td>
            </td>
            <td><?php echo $val['id']; ?></td>
            <td>
              <i class="layui-icon x-show" status='true'>&#xe623;</i>
              <?php echo $val['name']; ?>
            </td>
            <td><input type="text" class="layui-input x-sort" name="order" value="1"></td>
            <td>
              <input type="checkbox" name="switch"  lay-text="开启|停用"  checked="member_stop()" lay-skin="switch">
            </td>
            <td class="td-manage">
              <button class="layui-btn layui-btn layui-btn-xs"  onclick="x_admin_show('编辑','admin-edit.html')" ><i class="layui-icon">&#xe642;</i>编辑</button>
              <button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="x_admin_show('编辑','admin-add.html')" ><i class="layui-icon">&#xe642;</i>添加子栏目</button>
              <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'<?php echo $val['id']; ?>')" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <style type="text/css">
      
    </style>
    <script>
      layui.use(['form'], function(){
        form = layui.form;
        
      });

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗?',function(index){
              $.ajax({
                type:'get'
                ,url:"<?php echo url('admin/type/delete'); ?>"
                ,async:true
                ,data:{id,id}
                ,dataType:'json'
                ,success:function(data){
                      $(obj).parents("tr").remove();
                      layer.msg('已删除!',{icon:1,time:1000});               
                }
                ,error:function(){
                    alert('该分类有子类,无法删除')
                }
              })
          });
      }

      function member_stop(obj,id){
               layer.confirm('确认要更改吗？',function(index){

                   if($(obj).attr('title')=='停用'){
                    $.get("<?php echo url('/admin/user/update'); ?>",{id:id,state:0})
                     //发异步把用户状态进行更改
                     $(obj).attr('title','启用')
                     $(obj).find('i').html('&#xe62f;');

                     $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                     layer.msg('已停用!',{icon: 5,time:1000});

                   }else{
                    $.get("<?php echo url('/admin/user/update'); ?>",{id:id,state:1})
                     $(obj).attr('title','停用')
                     $(obj).find('i').html('&#xe601;');

                     $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                     layer.msg('已启用!',{icon: 6,time:1000});
                   }
                   
               });
           }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>

</body>
    
    
</html>