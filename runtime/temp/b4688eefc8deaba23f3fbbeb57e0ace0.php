<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\user\index.html";i:1563244414;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562921694;}*/ ?>
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
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input type="text" name="name" value="" placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
        <span class="x-right" style="line-height:40px">共有数据： <?php echo $length; ?>条</span>
      <table class="layui-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>性别</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>地址</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th></tr>
        </thead>
        <tbody>
          <?php foreach($user as $v): ?>
          <tr>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['name']; ?></td>
            <td><?php echo $v['sex']; ?></td>
            <td><?php echo $v['phone']; ?></td>
            <td><?php echo $v['mailbox']; ?></td>
            <td><?php echo $v['address']; ?></td>
            <td><?php echo $v['ltime']; ?></td>
            <td class="td-status">
              <?php if($v['state']==0): ?>
              <span class="layui-btn layui-btn-disabled layui-btn-mini">已禁用</span></td>
              <?php else: ?>
              <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
              <?php endif; ?>
            <td class="td-manage">
              <?php if($v['state']==0): ?>
                <a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="启用">
                <i class="layui-icon">&#xe62f;</i>
                </a>
                <?php else: ?>
                <a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="禁用">
                <i class="layui-icon">&#xe601;</i>
                </a>
                <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="page">
        <div>
          <?php echo $user->render(); ?>
        </div>
      </div>

    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          if($(obj).attr('title')=='启用'){
            str="确认要启用吗?"
          }else{
            str='确认要停用吗?'
          }
          layer.confirm(str,function(index){

              if($(obj).attr('title')=='启用'){
                $.ajax({
                    type:'get'
                    ,url: "<?php echo url('admin/user/state'); ?>"
                    ,data:{id:id,state:1}
                    ,async:true
                    ,dataType:'text'
                    ,success:function(data){
                        $(obj).attr('title','停用')
                        $(obj).find('i').html('&#xe62f;');

                        $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').addClass('layui-btn-normal').html('已启用');
                        layer.msg('已启用!',{icon: 6,time:1000});
                    }
                    ,error:function(){
                        alert('请求失败')
                    }
                })
              }else{
                $.ajax({
                    type:'get'
                    ,url: "<?php echo url('admin/user/state'); ?>"
                    ,data:{id:id,state:0}
                    ,async:true
                    ,dataType:'text'
                    ,success:function(data){
                        $(obj).attr('title','启用')
                        $(obj).find('i').html('&#xe601;');

                        $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已禁用');
                        layer.msg('已禁用!',{icon: 5,time:1000});
                    }
                    ,error:function(){
                        alert('请求失败')
                    }
                })
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗?',function(index){
              $.ajax({
                    type:'get'
                    ,url:"<?php echo url('admin/user/delete'); ?>"
                    ,data:{id,id}
                    ,async:true
                    ,dataType:'text'
                    ,success:function(data){
                        if(data>0){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                            // 可以对父窗口进行刷新
                                xadmin.father_reload();
                        }else{
                            alert('删除失败');
                        }
                    }
                    ,error:function(){
                        alert('请求失败')
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