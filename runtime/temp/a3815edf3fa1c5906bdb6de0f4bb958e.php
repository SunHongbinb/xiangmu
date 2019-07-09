<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\goods\add.html";i:1562308694;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562642263;}*/ ?>
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
      <div class="layui-form-item">
          <label class="layui-form-label">
              <span class="x-red">*</span>图片上传
          </label>
          <div class="layui-upload">
            <button type="file" name="image[]" class="layui-btn" id="test1">上传图片</button>
            <div class="layui-upload-list">
              <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                  预览图：
                  <div class="layui-upload-list" id="demo2" style="display: flex;"></div>
               </blockquote>
              <p id="demoText"></p>
              <button type="button" class="layui-btn" id="test9">开始上传</button>
            </div>
          </div>   
      </div>
      <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>图片名称</label>
            <div class="layui-input-inline">
              <textarea name="picname" id="picname" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>商品详情</label>
            <div class="layui-input-inline">
                <script id="text1" name="details" style="width:800px;" type="text/plain">请输入商品详情</script>
            </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">商品类别</label>
          <div class="layui-input-block">
            <select name="typeid" lay-verify="required">
              <option value="">请选择类别</option>
              <?php foreach($type as $v): ?>
              <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>商品名
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="name" value="" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>库存
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="store" value="" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>简介
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="descr" value="" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>原价
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="oldprice" value="" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>现价
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="price" value="" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">规格</label>
            <div class="layui-input-block">
              <input type="checkbox" name="size[]" value="小" title="小">
              <input type="checkbox" name="size[]" value="中" title="中" checked>
              <input type="checkbox" name="size[]" value="大" title="大">
              <input type="checkbox" name="size[]" value="特大" title="特大">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">颜色</label>
            <div class="layui-input-block">
              <input type="checkbox" name="color[]" value="特白" title="特白">
              <input type="checkbox" name="color[]" value="白" title="白" checked>
              <input type="checkbox" name="color[]" value="灰" title="灰">
              <input type="checkbox" name="color[]" value="黑" title="黑">
              <input type="checkbox" name="color[]" value="特黑" title="特黑">
            </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>状态</label>
              <div class="layui-input-block">
                <input type="radio" name="state" value="0" lay-skin="primary" title="下架" checked>
                <input type="radio" name="state" value="1" lay-skin="primary" title="在售">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
          </div>
      </form>
    </div>
    <!-- 配置文件 -->
      <script type="text/javascript" src="/static/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
      <script type="text/javascript" src="/static/utf8-php/ueditor.all.js"></script>
    <script>
        //图片上传
        layui.use('upload', function(){
          var $ = layui.jquery
          ,upload = layui.upload;
          
          //普通图片上传
          var uploadInst = upload.render({
            elem: '#test1'
            ,url: "<?php echo url('admin/goods/upload'); ?>"
            ,multiple:true
            ,auto:false
            ,bindAction:"#test9"
            ,choose: function(obj){
                var files = this.files = obj.pushFile();
              //预读本地文件示例，不支持ie8
              obj.preview(function(index, file, result){


                //$('#demo1').attr('src', result); //图片链接（base64）
                $('#demo2').append('<p style="position:relative"><img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" width="100" height="100"><i class="layui-icon demo-delete" style="position:absolute;right:0;top:0;font-size:30px;color: #FF5722;">&#x1006;</i></p>')
                $('#demo2').find('.demo-delete').on('click', function(){
                  delete files[index]; //删除对应的文件
                  $(this).parents('p').remove();
                  uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                });


              });

            }
            ,done: function(res){
                //如果上传失败
                if(res.code > 0){
                    return layer.msg('上传失败');
                 }
                //上传成功
                $("#picname").append(res.data.title+",");
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

        // function aa(aa){
        //     $(aa).parents('p').remove();
        // }
    </script>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
          //监听提交
          form.on('submit(add)', function(data){
            $.ajax({
                type:'post'
                ,url:"<?php echo url('admin/goods/insert'); ?>"
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
    <script type="text/javascript">
            var ue = UE.getEditor('text1');
    </script>

</body>
    
    
</html>