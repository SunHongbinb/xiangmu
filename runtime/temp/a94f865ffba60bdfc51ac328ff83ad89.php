<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\login\register.html";i:1563337030;s:65:"D:\phpStudy\PHPTutorial\WWW\erqi\application\index\view\Base.html";i:1563336630;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>文章详情</title>
<meta name="keywords"  content="DeathGhost" />
<meta name="description" content="DeathGhost" />
<meta name="author" content="DeathGhost,deathghost@deathghost.cn">
<link rel="icon" href="/static/index/images/icon/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/static/index/css/style.css" />
<script src="/static/index/js/html5.js"></script>
<script src="/static/index/js/jquery.js"></script>
<script>
$(document).ready(function(){
  $("nav .indexAsideNav").hide();
  $("nav .category").mouseover(function(){
    $(".asideNav").slideDown();
    });
  $("nav .asideNav").mouseleave(function(){
    $(".asideNav").slideUp();
    });
});
</script>
</head>
<body>
<!--header-->
<header>
  <!--topNavBg-->
  <div class="topNavBg">
   <div class="wrap">
   <!--topLeftNav-->
   <!-- 判断是否已登录 -->
   <?php if(\think\Session::get('user.name')==null): ?>
    <ul class="topLtNav">
     <li>
         <a href="<?php echo url('login/index'); ?>" class=\"obviousText\">请登录</a>
     </li>
     <li>
        <a href="<?php echo url('register/index'); ?>" class='obviousText'>注册</a>
     </li>
    </ul>
    <?php else: ?>
    <ul class="topLtNav">
     <li>
         <a href="<?php echo url('index/grzx/index'); ?>" class=\"obviousText\">欢迎您 :<?php echo \think\Session::get('user.name'); ?></a>
     </li>
     <li>
         <!-- <?php echo \think\Session::get('user.id'); ?> -->
         <a href="<?php echo url('index/login/loginout'); ?>?id=<?php echo \think\Session::get('user.id'); ?>" class='obviousText'>退出</a>
     </li>
    </ul>
   <!--topRightNav-->
    <ul class="topRtNav">
     <li><a href="<?php echo url('index/grzx/index'); ?>">个人中心</a></li>
     <li><a href="<?php echo url('index/shopcar/index'); ?>" class="cartIcon">购物车<i>0</i></a></li>
    </ul>
    <?php endif; ?>
   </div>
  </div>
  <!--logoArea-->
  <div class="wrap logoSearch">
   <!--logo-->
   <div class="logo">
    <h1><a href="index"><img src="/static/index/images/logo.png"/></a></h1>
   </div>
   <!--search-->
   <div class="search">
    <ul class="switchNav">
     <li class="active" id="chanpin">产品</li>
     <li id="shangjia">商家</li>
     <li id="zixun">搭配</li>
    </ul>
    <div class="searchBox">
     <form action="<?php echo url('index/lists/index'); ?>" method="get">
      <div class="inputWrap">
      <input type="text" name="name" value="" placeholder="输入产品关键词"/>
      </div>
      <div class="btnWrap">
      <input type="submit" value="搜索"/>
      </div>
     </form>
    </div>
   </div>
  </div>
  <!--nav-->
  <nav>
<ul class="wrap navList">
<li class="category">
<a>全部产品分类</a>
<dl class="asideNav indexAsideNav">


<?php foreach($arr as $value): ?>
  <dt><a href="channel.html"><?php echo $value['name']; ?></a></dt>
  <dd>
    <?php foreach($value['zi'] as $val): ?>
      <a href="<?php echo url('index/lists/index'); ?>?id=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a>
    <?php endforeach; ?>
  </dd>
<?php endforeach; ?>

</dl>
</li>
<li>
<a href="#" class="active">首页</a>
</li>
<li>
<a href="#">时尚搭配</a>
</li>
<li>
<a href="#">原创设计</a>
</li>
<li>
<a href="#">时尚代购</a>
</li>
<li>
<a href="#">促销专区</a>
</li>
<li>
<a href="#">其他</a>
</li>
</ul>
</nav>

 </header>
 <script>
 $(document).ready(function(){
   //测试效果，程序对接如需变动重新编辑
   $(".switchNav li").click(function(){
     $(this).addClass("active").siblings().removeClass("active");
     });
   $("#chanpin").click(function(){
     $(".inputWrap input[type='text']").attr("placeholder","输入产品关键词或货号");
     });
   $("#shangjia").click(function(){
     $(".inputWrap input[type='text']").attr("placeholder","输入商家店铺名");
     });
   $("#zixun").click(function(){
     $(".inputWrap input[type='text']").attr("placeholder","输入关键词查找文章内容");
     });
   $("#wenku").click(function(){
     $(".inputWrap input[type='text']").attr("placeholder","输入关键词查找文库内容");
     });
   });
   
 </script>

<section class="wrap user_form">
 <div class="lt_img">
  <img src="/static/index/images/form_bg.jpg"/>
 </div>
 <div class="rt_form">
  <form action='javascript:;' onsubmit='sub($(this))' method="post">
  <h2>会员注册</h2>
  <ul>
    <li class="user_icon">
    <input type="text" name="username" value="" class="textbox" placeholder="用户名" required/>
   </li>
   <li class="user_icon">
    <input type="text" name="name" value="" class="textbox" placeholder="姓名" required/>
   </li>
   <li class="user_icon">
    <input type="text" id="phone" name="phone" class="textbox" placeholder="手机号码" required/>
   </li>
   <li class="link_li">
    <input type="button" id="yanzheng" value="获取手机校验码" class="sbmt_btn" required/>
   </li>
   <li class="user_cc">
    <input type="text" class="textbox" name="yan" placeholder="手机校验码" required/>
    <input type="hidden" id="zheng" name="zheng" placeholder="手机校验码" required/>
   </li>
   <li class="user_pwd">
    <input type="password" name="pass" class="textbox" placeholder="设置密码" required/>
   </li>
   <li class="user_pwd">
    <input type="password" name="pass1" class="textbox" placeholder="确认密码" required/>
   </li>
   <li class="link_li">
    <label><input type="checkbox" checked required/><a>阅读注册协议</a></label>
    <a href="<?php echo url('index/login/index'); ?>" title="登录账号" class="fr">已有账号，立即登录？</a>
   </li>
   <li class="link_li">
    <input type="submit" value="立即注册" class="sbmt_btn" >
   </li>
  </ul>
 </div>
 </form>
</section>
<script type="text/javascript">
    var phoneReg = /^[1][3,4,5,7,8,9][0-9]{9}$/;
    $('#yanzheng').click(function(){
        if (!phoneReg.test($('#phone').val())) {
          alert("请输入有效的手机号码");
        }else{
          $phone=$('#phone').val();
        }
        $.ajax({
            type:'post'
            ,url:"<?php echo url('index/login/yanzheng'); ?>"
            ,data:{phone:$phone}
            ,async:true
            ,dataType:'text'
            ,success:function(data){
              $('#zheng').val(data);
            }
            ,error:function(){
              alert('请求失败');
            }
        })
    })
    // 提交
    function sub($this){
         data=$this.serialize();
        $.ajax({
          type:'post'
          ,url:"<?php echo url('index/login/insert'); ?>"
          ,async:true
          ,data:data
          ,dataType:"json"
          ,success:function(data){
            alert(data.info);
            location.href="<?php echo url('login/index'); ?>";
          }
          ,error:function(data){
                // location.href='index.html'
                alert("连接失败");
          }
        })
      };

</script>

    <footer>
     <!--help-->
     <ul class="wrap help">
      <li>
       <dl>
        <dt>消费者保障</dt>
        <dd><a href="<?php echo url('index/index/read'); ?>">保障范围</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">退换货流程</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">服务中心</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">更多服务特色</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt>新手上路</dt>
        <dd><a href="<?php echo url('index/index/read'); ?>">保障范围</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">退换货流程</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">服务中心</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">更多服务特色</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt>付款方式</dt>
        <dd><a href="<?php echo url('index/index/read'); ?>">保障范围</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">退换货流程</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">服务中心</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">更多服务特色</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt>服务保障</dt>
        <dd><a href="<?php echo url('index/index/read'); ?>">保障范围</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">退换货流程</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">服务中心</a></dd>
        <dd><a href="<?php echo url('index/index/read'); ?>">更多服务特色</a></dd>
       </dl>
      </li>
     </ul>
     <div class="wrap btmInfor">
      <p>© 2013 DeathGhost.cn 版权所有 网络文化经营许可证：浙网文[2013]***-027号 增值电信业务经营许可证：浙B2-200***24-1 信息网络传播视听节目许可证：1109***4号</p>
      <address>联系地址：陕西省西安市雁塔区XXX号</address>
     </div>
    </footer>
</body>


</html>
