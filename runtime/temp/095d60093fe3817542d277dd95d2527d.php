<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\type\add.html";i:1563249777;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562921694;}*/ ?>
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
   
    <div class="x-body">
        <form class="layui-form">
          <div class="layui-form-item">
          	<input type="hidden" name="path" value="<?php echo $_GET['path']; ?>">
          	<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>分类名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="name" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请输入分类名
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
          </div>
      </form>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;

          //监听提交
          form.on('submit(add)', function(data){
            $.ajax({
                type:'post'
                ,url:'insert'
                ,data:$('form').serialize()
                ,dataType:'text'
                ,success:function(data)
                {
                  layer.alert("添加成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    // 关闭当前frame
                    parent.layer.close(index);
                    $("html").load("index.html");
                  });
                }
                ,error:function()
                {
                  alert('失败')
                }
            });
            return false;
          });
          
          
        });
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();
    </script>

</body>
    
    
</html>