<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\goods\edit.html";i:1562569994;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562642263;}*/ ?>
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
                  <div class="layui-upload-list" id="demo2" style="display: flex;">
                    <?php $__FOR_START_29629__=0;$__FOR_END_29629__=$pl-1;for($i=$__FOR_START_29629__;$i < $__FOR_END_29629__;$i+=1){ ?>
                    <p style="position:relative">
                    <img src="/static/uploads/goods/<?php echo $picname[$i]; ?>" width="100px" height="100px" class="layui-upload-img" alt=""><i class="layui-icon demo-delete" style="position:absolute;right:0;top:0;font-size:30px;color: #FF5722;">&#x1006;</i>
                    </p>
                    <?php } ?>
                  </div>
               </blockquote>
              <p id="demoText"></p>
              <button type="button" class="layui-btn" id="test9">开始上传</button>
            </div>
          </div>   
      </div>
      <form class="layui-form">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>图片名称</label>
            <div class="layui-input-inline">
                <textarea name="picname" id="picname" class="layui-textarea"><?php echo $arr['picname']; ?></textarea>
            </div>
        </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>商品名
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="" name="name" value="<?php echo $arr['name']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>库存
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="store" value="<?php echo $arr['store']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>简介
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="descr" value="<?php echo $arr['descr']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>原价
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="oldprice" value="<?php echo $arr['oldprice']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>现价
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="price" value="<?php echo $arr['price']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">规格</label>
            <div class="layui-input-block">
              <?php $__FOR_START_20244__=0;$__FOR_END_20244__=$sl;for($i=$__FOR_START_20244__;$i < $__FOR_END_20244__;$i+=1){ ?>
              <input type="checkbox" name="size" value="<?php echo $size[$i]; ?>" title="<?php echo $size[$i]; ?>" checked>
              <?php } ?>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">颜色</label>
            <div class="layui-input-block">
              <?php $__FOR_START_13671__=0;$__FOR_END_13671__=$cl;for($i=$__FOR_START_13671__;$i < $__FOR_END_13671__;$i+=1){ ?>
              <input type="checkbox" name="color" value="<?php echo $color[$i]; ?>" title="<?php echo $color[$i]; ?>" checked>
              <?php } ?>
            </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>状态</label>
              <div class="layui-input-block">
                <?php if($arr['state']=="0"): ?>
                <input type="radio" name="state" value="0" lay-skin="primary" title="下架">
                <input type="radio" name="state" value="1" lay-skin="primary" title="在售">
                <?php else: ?>
                <input type="radio" name="state" value="0" lay-skin="primary" title="下架">
                <input type="radio" name="state" value="1" lay-skin="primary" title="在售" checked>
                <?php endif; ?>
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改
              </button>
          </div>
      </form>
    </div>
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
                ,url:"<?php echo url('admin/goods/update'); ?>"
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