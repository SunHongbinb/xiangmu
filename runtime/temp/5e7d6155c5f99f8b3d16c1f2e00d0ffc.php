<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\banner\edit.html";i:1562674390;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562642263;}*/ ?>
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
                    <div class="layui-upload">
                      <button type="file" name="file" class="layui-btn" id="test1">上传图片</button>
                      <div class="layui-upload-list">
                        <img class="layui-upload-img" src="/static/uploads/banner/<?php echo $arr['picname']; ?>" id="demo1" value="" width="500">
                        <p id="demoText">
                        </p>
                      </div>
                    </div> 
            <form class="layui-form"  enctype="multipart/form-data">
                <input type="hidden" id="image" name="picname" readonly value="">
                <input type="hidden" name="id" readonly value="<?php echo $_GET['id']; ?>">
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>轮播图
                    </label>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="descr"  lay-verify="required" value="<?php echo $arr['descr']; ?>" 
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>链接
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="address" required="" lay-verify="required" value="<?php echo $arr['address']; ?>"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>添加时间
                    </label>
                    <div class="layui-input-inline">
                        <label for="desc" class="layui-form-label">
                        <span><?php echo $arr['addtime']; ?></span>
                        </label>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>状态
                    </label>
                    <?php if($arr['state']==0): ?>
                        <div class="layui-input-block">
                          <input type="radio" name="state" value="1" title="启用">
                          <input type="radio" name="state" value="0" title="禁用" checked>
                        </div>
                    <?php else: ?>
                        <div class="layui-input-block">
                          <input type="radio" name="state" value="1" title="启用" checked>
                          <input type="radio" name="state" value="0" title="禁用">
                        </div>
                    <?php endif; ?>
                </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        修改
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
                    ,url:"<?php echo url('/admin/banner/update'); ?>"
                    ,data:$('form').serialize()
                    ,dataType:'text'
                    ,success:function(data)
                        {
                          layer.alert("修改成功", {icon: 6},function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                              });

                        }
                    ,error:function()
                        {
                          alert('修改失败')
                        }

                    });
                    return false;
              });
            });

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