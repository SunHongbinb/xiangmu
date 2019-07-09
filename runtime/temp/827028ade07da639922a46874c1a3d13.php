<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\banner\bannerlist.html";i:1562029940;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
 <title>
     X-admin v1.0
 </title>
 <meta name="renderer" content="webkit">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <meta name="viewport" content="width=device-width, initial-scmaximum-scale=1">
 <meta name="apple-mobile-web-app-status-bar-style" content="black">
 <meta name="apple-mobile-web-app-capable" content="yes">
 <meta name="format-detection" content="telephone=no">
 <link rel="stylesheet" href="/erqi/public/static/admin/css/x-admin.css" media="all">
 <link rel="stylesheet" href="/erqi/public/static/admin/lib/bootstrap/css/bootstrap.min.css" media="all">
 <script src="/erqi/public/static/admin/jquery-1.8.3.min.js"></script>
  <script>
      $(function(){
          $("#myform").hide();
          $("#myform1").hide();
          $("#myform2").hide();
         $("#btn").click(function(event) {
             /* Act on the event */
             $("#myform").fadeIn("slow");
             $(".same").fadeOut("slow");
         });
          //单个删除
         $("#del").live('click', function(event) {
             /* Act on the event */
             var id = $(this).parent().siblings('td').eq(0).html();
             if(confirm("确定删除?")){
               $.post("<?php echo url('admin/banner/del'); ?>", {id: id}, function(data) {
                   /*optional stuff to do after success */
                   if(data){
                      alert("删除成功");
                      location = "<?php echo url('banner/bannerlist'); ?>";
                   }else{
                       alert("删除失败");
                   }
               },"text");
             }else{
              return false;
             }
         });
          //状态的转换
          $("#change").live('click', function(event) {
            /* Act on the event */
             var id = $(this).parent().siblings('td').eq(0).html();
             $.post("<?php echo url('admin/banner/sta'); ?>", {id: id}, function(data) {
               /*optional stuff to do after success */
               if(data){
                alert("转化成功");
                location = "<?php echo url('admin/banner/bannerlist'); ?>";
               }else{
                alert("转换失败");
               }
             },"json");
          });
         //修改图片
         $("#editimg").live('click', function(event) {
             /* Act on the event */
               $("#myform1").fadeIn("slow");
             $(".same").fadeOut("slow");
             var id = $(this).parent().siblings('td').eq(0).html();
             $.post("<?php echo url('admin/banner/find'); ?>", {id: id}, function(data) {
                 /*optional stuff to do after success */
                for (var i = 0; i < data.length; i++) {
                    $("input[name=descr]").val(data[i].descr);
                }
             },"json");
         });
         //修改图片
         $("#editdescr").live('click', function(event) {
             /* Act on the event */
               $("#myform2").fadeIn("slow");
             $(".same").fadeOut("slow");
             var id = $(this).parent().siblings('td').eq(0).html();
             $.post("<?php echo url('admin/banner/find'); ?>", {id: id}, function(data) {
                 /*optional stuff to do after success */
                for (var i = 0; i < data.length; i++) {
                    $("input[name=descr]").val(data[i].descr);
                }
             },"json");
         });

         $("#myform2").submit(function(event) {
           /* Act on the event */
           var data=$(this).serialize();
           $.post("<?php echo url('banner/editdescr'); ?>", {data: data}, function(data) {
             /*optional stuff to do after success */
             //alert(data);
             if (data) {
                alert("修改成功");
                location="<?php echo url('banner/bannerlist'); ?>";
             }else{
                alert("修改失败");
             }
           });
           return false;
         });

      });
  </script>
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
        <div class="x-body">
            <xblock class="same"><button class="layui-btn" id="btn"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：<?php echo $num; ?> 条</span></xblock>
            <table class="layui-table same">
                <thead>
                    <tr>
<!--                         <th>
                            <input type="checkbox" name="" value="">
                        </th> -->
                        <th>
                            ID
                        </th>
                        <th>
                            缩略图
                        </th>
                        <th>
                            添加时间
                        </th>
                        <th>
                            描述
                        </th>
                        <th>
                            显示状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-img">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$banner): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td>
                            <?php echo $banner['id']; ?>
                        </td>
                        <td>
                            <img src="/erqi/public/uploads/<?php echo $banner['picname']; ?>" width="200" alt="">
                        </td>
                        <td >
                            <?php echo $banner['addtime']; ?>
                        </td>
                        <td >
                            <?php echo $banner['descr']; ?>
                        </td>
                        <td class="td-status">
                            <span class="layui-btn layui-btn-normal layui-btn-mini">
                                <?php echo $banner['state']; ?>
                            </span>
                        </td>
                        <td class="td-manage">
                            <a href="javascript:;" title="禁用" id="change">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="修改图片" href="javascript:;"  id="editimg">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="修改描述信息" href="javascript:;"  id="editdescr">
                                <i class="layui-icon">✎</i>
                            </a>
                            <a title="删除" href="javascript:;" style="text-decoration:none" id="del">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
                    <form enctype="multipart/form-data" action="<?php echo url('admin/banner/add'); ?>" method="post" id="myform">
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>轮播图
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">
                        <input id="test" type="file" class="file" name="image">
                      </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link" name="descr" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="role" class="layui-form-label">
                        <span class="x-red">*</span>显示状态
                    </label>
                   <div class="layui-input-inline">
                      <select name="state">
                        <option value="">--请选择--</option>
                        <option value="1">启用</option>
                        <option value="0">禁用</option>
                      </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="" id="addbtn">
                        增加
                    </button>
                </div>
            </form>
            <form enctype="multipart/form-data" action="<?php echo url('admin/banner/edit'); ?>" method="post" id="myform1">
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>轮播图
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">
                        <input id="test" type="file" class="file" name="image">
                      </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <input type="submit" value='修改' class="layui-btn">
                </div>
            </form>
            <form enctype="multipart/form-data" action="#" method="post" id="myform2">
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link" name="descr" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <input type="submit" value='修改' class="layui-btn">
                </div>
            </form>
            <div class="same"><?php echo $list->render(); ?></div>
        </div>
        <script src="/erqi/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/erqi/public/static/admin/js/x-layui.js" charset="utf-8"></script>
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

            //批量删除提交

             /*停用*/
            // function banner_stop(obj,id){
            //     layer.confirm('确认不显示吗？',function(index){
            //         //发异步把用户状态进行更改
            //         $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_start(this,id)" href="javascript:;" title="显示"><i class="layui-icon">&#xe62f;</i></a>');
            //         $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">不显示</span>');
            //         $(obj).remove();
            //         layer.msg('不显示!',{icon: 5,time:1000});
            //     });
            // }

            // 启用
            // function banner_start(obj,id){
            //     layer.confirm('确认要显示吗？',function(index){
            //         //发异步把用户状态进行更改
            //         $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_stop(this,id)" href="javascript:;" title="不显示"><i class="layui-icon">&#xe601;</i></a>');
            //         $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已显示</span>');
            //         $(obj).remove();
            //         layer.msg('已显示!',{icon: 6,time:1000});
            //     });
            // }
            // 编辑
              function banner_edit (title,url,id,w,h) {
                  x_admin_show(title,url,w,h);
              }
              /*删除*/
              function banner_del(obj,id){
                  layer.confirm('确认要删除吗？',function(index){
                      //发异步删除数据
                      $(obj).parents("tr").remove();
                      layer.msg('已删除!',{icon:1,time:1000});
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