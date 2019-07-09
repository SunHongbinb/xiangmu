<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\banner\index.html";i:1562672838;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562642263;}*/ ?>
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
          <a><cite>首页</cite></a>
          <a><cite>会员管理</cite></a>
          <a><cite>轮播列表</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="xbody">
        <xblock>
            <button class="layui-btn" onclick="banner_add('添加用户','<?php echo url('admin/banner/add'); ?>','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：<?php echo $length; ?> 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>缩略图</th>
                    <th>添加时间</th>
                    <th>描述</th>
                    <th>链接</th>
                    <th>显示状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="x-img">
                <?php foreach($banner as $v): ?>
                <tr>
                    <td>
                        <?php echo $v['id']; ?>
                    </td>
                    <td>
                        <img  src="/static/uploads/banner/<?php echo $v['picname']; ?>" width="200" alt="">
                    </td>
                    <td >
                        <?php echo $v['addtime']; ?>
                    </td>
                    <td >
                        <?php echo $v['descr']; ?>
                    </td>
                    <td >
                        <?php echo $v['address']; ?>
                    </td>
                    <td class="td-status">
                        <?php if($v['state']==0): ?>
                        <span class="layui-btn layui-btn-disabled layui-btn-mini">
                            不显示
                        </span>
                        <?php else: ?>
                        <span class="layui-btn layui-btn-normal layui-btn-mini">
                            已显示
                        </span>
                        <?php endif; ?>
                    </td>
                    <td class="td-manage">
                        <?php if($v['state']==0): ?>
                        <a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="启用"><i class="layui-icon">&#xe62f;</i></a>
                        <?php else: ?>
                        <a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="禁用"><i class="layui-icon">&#xe601;</i></a>
                        <?php endif; ?>
                        <a title="编辑"  onclick="x_admin_show('编辑','<?php echo url('admin/banner/edit'); ?>?id=<?php echo $v['id']; ?>')" href="javascript:;">
                          <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a title="删除" onclick="banner_del(this,'<?php echo $v['id']; ?>')" href="javascript:;">
                          <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="page"><?php echo $banner->render(); ?></div>
    </div>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
    </script>
    <script src="/static/admin/js/x-layui.js" charset="utf-8">
    </script>
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
        function banner_add(title,url,w,h){
            x_admin_show(title,url,w,h);
        }
         /*启用--停用*/
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
                      ,url: "<?php echo url('admin/banner/state'); ?>"
                      ,data:{id:id,state:'1'}
                      ,async:true
                      ,dataType:'text'
                      ,success:function(data){
                          $(obj).attr('title','停用')
                          $(obj).find('i').html('&#xe62f;');

                          $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-normal').html('已启用');
                          layer.msg('已启用!',{icon: 6,time:1000});
                      }
                      ,error:function(){
                          alert('请求失败')
                      }
                  })
                }else{
                  $.ajax({
                      type:'get'
                      ,url: "<?php echo url('admin/banner/state'); ?>"
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


        // 编辑
        function banner_edit (title,url,id,w,h) {
            x_admin_show(title,url,w,h); 
        }
        /*删除*/
        function banner_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    type:'get' 
                    ,url:"<?php echo url('admin/banner/delete'); ?>"
                    ,data:{id,id}
                    ,async:true
                    ,dataType:'text'
                    ,success:function(data){
                        if(data>0){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                            location.reload(true);
                        }else{
                            alert('删除失败');
                        }
                    }
                    ,error:function(){
                        alert("请求失败")
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