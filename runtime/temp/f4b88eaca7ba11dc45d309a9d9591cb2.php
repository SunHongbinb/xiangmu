<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\orders\edit.html";i:1563414642;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562921694;}*/ ?>
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
        <input type="text" name="id" value="<?php echo $_GET['id']; ?>">
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
              <?php $__FOR_START_14645__=0;$__FOR_END_14645__=$sl;for($i=$__FOR_START_14645__;$i < $__FOR_END_14645__;$i+=1){ ?>
              <input type="checkbox" name="size" value="<?php echo $size[$i]; ?>" title="<?php echo $size[$i]; ?>" checked>
              <?php } ?>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">颜色</label>
            <div class="layui-input-block">
              <?php $__FOR_START_24428__=0;$__FOR_END_24428__=$cl;for($i=$__FOR_START_24428__;$i < $__FOR_END_24428__;$i+=1){ ?>
              <input type="checkbox" name="color" value="<?php echo $color[$i]; ?>" title="<?php echo $color[$i]; ?>" checked>
              <?php } ?>
            </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>状态</label>
              <div class="layui-input-block">
               
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


    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();
    </script>

</body>
    
    
</html>