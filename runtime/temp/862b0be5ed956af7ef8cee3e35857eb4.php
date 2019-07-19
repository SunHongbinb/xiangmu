<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/admin\view\orders\read.html";i:1563422442;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\admin\view\base.html";i:1562921694;}*/ ?>
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
              <label class="layui-form-label">
                  <span class="x-red">*</span>订单号</label>
              <div class="layui-input-inline">
                <input type="text" readonly="" name="id" value="<?php echo $arr['id']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>订单状态
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="state" value="<?php echo $state[$arr['state']]; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>收件人
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="" name="name" value="<?php echo $arr['lxren']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>收件地址
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="" name="address" value="<?php echo $arr['address']; ?>" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label  class="layui-form-label">
                  <span class="x-red">*</span>总价
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="" name="address" value="<?php echo $arr['total']; ?>" class="layui-input">
              </div>
          </div>
          <table class="layui-table same" id="main">
                <tr>
                  <td>id</td>
                  <td>商品名</td>
                  <td>商品图片</td>
                  <td>规格</td>
                  <td>颜色</td>
                  <td>数量</td>
                  <td>单价</td>
                </tr>
          <?php foreach($goods as $k => $v): ?>
                <tr>
                  <td><?php echo $k; ?></td>
                  <td><?php echo $v['sname']; ?></td>
                  <td><img src="/static/uploads/goods/<?php echo $v['picname']; ?>" width="50px" height=""></td>
                  <td><?php echo $v['size']; ?></td>
                  <td><?php echo $v['color']; ?></td>
                  <td><?php echo $v['num']; ?></td>
                  <td><?php echo $v['price']; ?></td>
                </tr>
          <?php endforeach; ?>
          </table>
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