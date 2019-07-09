<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\type\index.html";i:1562330417;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562642263;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>后台登录-X-admin2.2</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
	<link rel="stylesheet" href="/static/admin/css/xadmin.css">
    
    
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>

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
      <xblock>
        <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url('admin/type/add'); ?>?pid=0&path=0,',500)"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：  <?php echo $length; ?> 条</span>
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
              <?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",substr_count($val['path'],",")); if((in_array($val['id'],$pidarr))): ?>
              <i class="layui-icon x-show" status='true'>&#xe623;</i>
              <?php else: ?>
              <i class="layui-icon x-show" status='true'>|--</i>
              <?php endif; ?>
              <?php echo $val['name']; ?>
            </td>
            <td><input type="text" class="layui-input x-sort" name="order" value="1"></td>
            <td>
              <?php if(($val['state']==1)): ?>
              <input type="checkbox" name="switch" id="<?php echo $val['id']; ?>" lay-text="开启|停用"  checked="member_stop()" lay-filter="switchTest" lay-skin="switch">
              <?php else: ?>
              <input type="checkbox" name="switch" id="<?php echo $val['id']; ?>" lay-text="开启|停用" lay-filter="switchTest" lay-skin="switch">
              <?php endif; ?>
            </td>
            <td class="td-manage">
              <button class="layui-btn layui-btn layui-btn-xs"  onclick="x_admin_show('编辑','<?php echo url('admin/type/edit'); ?>?id=<?php echo $val['id']; ?>')" ><i class="layui-icon">&#xe642;</i>编辑</button>
              <button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="x_admin_show('编辑','<?php echo url('admin/type/add'); ?>?path=<?php echo $val['path']; ?><?php echo $val['id']; ?>,&pid=<?php echo $val['id']; ?>')" ><i class="layui-icon">&#xe642;</i>添加子栏目</button>
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
        form.on('switch(switchTest)', function(data){
            console.log(data.elem.id);
            $id=data.elem.id
            console.log(this.checked ? '1' : '0');
            $state=this.checked ? '1' : '0'
            $.ajax({
                type:'get'
                ,url:"<?php echo url('admin/type/state'); ?>"
                ,async:true
                ,data:{id:$id,state:$state}
                ,dataType:'text'
                ,success:function(data){
                    layer.msg('更改成功!',{time:1000});          
                }
                ,error:function(){
                    
                }
            })

          });   
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
                    alert('该分类有子类,无法删除');
                }
              })
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