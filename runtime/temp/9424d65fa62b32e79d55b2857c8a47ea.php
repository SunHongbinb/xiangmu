<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\banner\add.html";i:1562643843;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562642263;}*/ ?>
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
            <form class="layui-form" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>轮播图
                    </label>
                    <div class="layui-upload">
                      <button type="file" name="file" class="layui-btn" id="test1">上传图片</button>
                      <div class="layui-upload-list">
                        <img class="layui-upload-img" id="demo1" value="" width="500">
                        <p id="demoText">
                        <input type="hidden" id="image" name="picname" readonly value="">
                        </p>
                      </div>
                    </div>  
                </div>
                <div class="layui-form-item">
                    <label  class="layui-form-label">
                    </label>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>链接
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="address" required="" lay-verify="required" value="#"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="descr" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
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
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8">
        </script>
        <script>
        layui.use('upload', function(){
          var $ = layui.jquery
          ,upload = layui.upload;
          
          //普通图片上传
          var uploadInst = upload.render({
            elem: '#test1'
            ,url: "<?php echo url('admin/banner/upload'); ?>"
            ,before: function(obj){
              obj.preview(function(index, file, result){
                $('#demo1').attr('src', result); //图片链接（base64）
              });
            }
            ,done: function(res){
              //如果上传失败
              if(res.code > 0){
                return layer.msg('上传失败');
              }
              //上传成功
              $('#image').val(res.data.title);
            }
            ,error: function(){
              //演示失败状态，并实现重传
              var demoText = $('#demoText');
              demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
              demoText.find('.demo-reload').on('click', function(){
                uploadInst.upload();
              });
            }
          });
        });
        </script>    
        <script>
        layui.use(['form','layer'], function(){
               $ = layui.jquery;
              var form = layui.form
              ,layer = layui.layer;

              //监听提交
              form.on('submit(add)', function(data){
                console.log($('form').serialize());
                $.ajax({
                    type:'post'
                    ,url:"<?php echo url('/admin/banner/insert'); ?>"
                    ,data:$('form').serialize()
                    ,dataType:'text'
                    ,success:function(data)
                        {
                          layer.alert("添加成功", {icon: 6},function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                              });

                        }
                    ,error:function()
                        {
                          alert('添加失败')
                        }

                    });
                    return false;
              });
            });

        </script>
        <script>
        var _hmt = _hmt || [];(function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>

</body>
    
    
</html>