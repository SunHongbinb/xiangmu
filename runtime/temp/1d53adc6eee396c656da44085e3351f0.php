<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\comment\index.html";i:1563331160;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562921694;}*/ ?>
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
              <a><cite>评论列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            用户名
                        </th>
                        <th>
                            商品名
                        </th>
                        <th>
                            评分
                        </th>
                        <th>
                            评论
                        </th>
                        <th>
                            回复人
                        </th>
                        <th>
                            回复内容
                        </th>
                        <th>
                            回复时间
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-link">
                <?php foreach($comment as $v): ?>
                    <tr>

                        <td>
                            <?php echo $v['id']; ?>
                        </td>
                        <td >
                           <?php echo $user[$v['uid']]; ?> 
                        </td>
                        <td >
                           <?php echo $goods[$v['gid']]; ?> 
                        </td>
                        <td >
                            <?php echo $v['level']; ?>
                        </td> 
                        <td>
                            <?php echo $v['content']; ?>
                        </td>
                        <td>
                            
                        </td>
                        <td id="reply" >
                            <?php echo !empty($v['reply'])?$v['reply']:'';; ?>
                        </td>
                        <td id="rtime">
                            <?php echo !empty($v['rtime'])?$v['rtime']:'';; ?>
                        </td>
                        <td class="td-manage">
                            <?php if($v['state']==0): ?>
                            <a title="回复"  onclick="x_admin_show('回复','<?php echo url('admin/comment/add'); ?>?id=<?php echo $v['id']; ?>',500)" href="javascript:;">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <?php else: endif; ?>
                            <a title="删除" href="javascript:;" onclick="commemt_del(this,'1')" 
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="page"><?php echo $comment->render(); ?></div>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8">
        </script>
        <script>

            /*删除*/
            function commemt_del(obj,id){
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