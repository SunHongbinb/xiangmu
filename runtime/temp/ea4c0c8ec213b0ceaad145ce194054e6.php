<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\goods\index.html";i:1563422764;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            X-admin v2.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/static/admin/css/xadmin.css" media="all">
        <link rel="stylesheet" href="/static/admin/lib/bootstrap/css/bootstrap.min.css" media="all">
        <script src="/static/admin/jquery-1.8.3.min.js"></script>
        <script>
        </script>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>商品管理</cite></a>
              <a><cite>商品列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form x-center same" action="" style="width:800px" id='formsousuo'>
                <div class="layui-form-pane" style="margin-top: 15px;">
                  <div class="layui-form-item">
                    <div class="layui-input-inline">
                      <input type="text" name="name" id='goods' placeholder="请输入商品名" autocomplete="off" class="layui-input">
                    </div>
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                  </div>
                </div>
            </form>
            <xblock>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url('admin/goods/add'); ?>')"><i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">共有数据：  <?php echo $length; ?> 条</span>
            </xblock>
            <table class="layui-table same" id="main">
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>类别ID</th>
                        <th>商品名</th>
                        <th>图片</th>
                        <th>简介</th>
                        <th>原价</th>
                        <th>单价</th>
                        <th>库存</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data as $v): ?>
                <tr class='tr'>
                <td class="id"><?php echo $v['id']; ?></td>
                <td><?php echo $v['typeid']; ?></td>
                <td><?php echo $v['name']; ?></td>
                <td>
                  <?php 
                   $arr=explode(",",$v['picname']);
                   $pl=count($arr);
                   $__FOR_START_12322__=0;$__FOR_END_12322__=$pl-1;for($i=$__FOR_START_12322__;$i < $__FOR_END_12322__;$i+=1){ ?>
                  <img src="/static/uploads/goods/<?php echo $arr[$i]; ?>" width="50px" alt="">
                  <?php } ?>
                </td>
                <td><?php echo $v['descr']; ?></td>
                <td><?php echo $v['oldprice']; ?></td>
                <td><?php echo $v['price']; ?></td>
                <td><?php echo $v['store']; ?></td>
                <td class='td-status'>
                    <?php if($v['state']=="0"): ?>
                    <span class='layui-btn layui-btn-disabled layui-btn-mini'>已下架</span>
                    <?php else: ?>
                    <span class='layui-btn layui-btn-normal layui-btn-mini'>在售中</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($v['state']=="0"): ?>
                    <a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="上架"><i class="layui-icon">&#xe62f;</i></a>
                    <?php else: ?>
                    <a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="下架"><i class="layui-icon">&#xe601;</i></a>
                    <?php endif; ?>
                    <a title="编辑"  onclick="x_admin_show('编辑','<?php echo url('admin/goods/edit'); ?>?id=<?php echo $v['id']; ?>')" href="javascript:;">
                      <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" onclick="goods_del(this,'<?php echo $v['id']; ?>')" href="javascript:;">
                      <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
                </tr>
                <?php endforeach; ?>
            </table>
            </tbody>

            <div class="page"><?php echo $data->render(); ?></div>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

              //以上模块根据需要引入

                layer.ready(function(){ //为了layer.ext.js加载完毕再执行
                  layer.photos({
                    photos: '#x-img'
                    //,shift: 5 //0-6的选择，指定弹出图片动画类型，默认随机
                  });
                }); 
              
            });
             /*添加*/
            function goods_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }
             /*上架--下架*/
            function member_stop(obj,id){
                if($(obj).attr('title')=='上架'){
                  str="确认要上架吗?"
                }else{
                  str='确认要下架吗?'
                }
                layer.confirm(str,function(index){
                    if($(obj).attr('title')=='上架'){
                      $.ajax({
                          type:'get'
                          ,url: "<?php echo url('admin/goods/state'); ?>"
                          ,data:{id:id,state:'1'}
                          ,async:true
                          ,dataType:'text'
                          ,success:function(data){
                              $(obj).attr('title','下架')
                              $(obj).find('i').html('&#xe601;');

                              $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').addClass('layui-btn-normal').html('在售中');
                              layer.msg('已上架!',{icon: 6,time:1000});
                          }
                          ,error:function(){
                              alert('请求失败')
                          }
                      })
                    }else{
                      $.ajax({
                          type:'get'
                          ,url: "<?php echo url('admin/goods/state'); ?>"
                          ,data:{id:id,state:0}
                          ,async:true
                          ,dataType:'text'
                          ,success:function(data){
                              $(obj).attr('title','上架')
                              $(obj).find('i').html('&#xe62f;');

                              $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已下架');
                              layer.msg('已下架!',{icon: 5,time:1000});
                          }
                          ,error:function(){
                              alert('请求失败')
                          }
                      })
                    }
                    
                });
            }


            // 编辑
            function goods_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
            /*删除*/

            function goods_del(obj,id){
                layer.confirm('确认要删除吗？',function(index){
                    $.ajax({
                        type:'get' 
                        ,url:"<?php echo url('admin/goods/delete'); ?>"
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
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                        }
                    })
                    
                });
            }
            </script>  
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>