<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\orders\index.html";i:1563437842;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562921694;}*/ ?>
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
        <form class="layui-form layui-col-md12 x-so" >
          <div class="layui-input-inline">
            <select name="state">
              <option value="">订单状态</option>
              <option value="0">待确认</option>
              <option value="1">已确认</option>
              <option value="2">已发货</option>
              <option value="3">已收货</option>
              <option value="4">已完成</option>
              <option value="5">已作废</option>
            </select>
          </div>
          <input type="text" name="name"  placeholder="请输入订单号" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <span class="x-right" style="line-height:40px">共有数据：  <?php echo $length; ?> 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>订单编号</th>
            <th>收货人</th>
            <th>总金额</th>
            <th>订单状态</th>
            <th>商品</th>
            <th>下单时间</th>
            <th >状态</th>
            <th >操作</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($orders as $v): ?>
          <tr>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['lxren']; ?></td>
            <?php 
             ?>
            <td><?php echo $v['total']; ?></td>
            <td><?php echo $state[$v['state']]; ?></td>
            <td><?php echo $v['gid']; ?></td>
            <td><?php echo $v['addtime']; ?></td>
            <td class="td-status">
                <?php if($v['state']==1): ?>
                <a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"><span class="layui-btn layui-btn-normal layui-btn-mini">
                    发货
                </span></a>
                <?php else: ?>
                <span class="layui-btn layui-btn-disabled layui-btn-mini">
                   <?php echo $state[$v['state']]; ?> 
                </span>
                <?php endif; ?>
            </td>
            <td class="td-manage">
              <a title="查看"  onclick="x_admin_show('查看','<?php echo url('admin/orders/read'); ?>?id={<?php echo $v['id']; ?>}')" href="javascript:;">
                <i class="layui-icon">&#xe63c;</i>
              </a>
              <a title="删除" onclick="member_del(this,'<?php echo $v['id']; ?>')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="page">
        <div>
         <?php echo $orders->render(); ?>
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

        /*启用--停用*/
     function member_stop(obj,id){
          layer.confirm('确认要发货吗？',function(index){
            $.ajax({
                type:'get'
                ,url:"<?php echo url('admin/orders/state'); ?>"
                ,data:{id:id,state:'2'}
                ,async:true
                ,dataType:'text'
                ,success:function(data){
                    if(data>0){
                        $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已发货');
                        layer.msg('已发货!',{icon:1,time:1000});
                    }else{
                        layer.msg('修改失败!',{icon:2,time:1000});
                    }
                }
                ,error:function(){
                    alert('请求失败')
                }
            })

          });
      }
            
      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.ajax({
                    type:'get'
                    ,url:"<?php echo url('admin/orders/delete'); ?>"
                    ,data:{id,id}
                    ,async:true
                    ,dataType:'text'
                    ,success:function(data){
                        if(data>0){
                              $(obj).parents("tr").remove();
                              layer.msg('已删除!',{icon:1,time:1000});
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