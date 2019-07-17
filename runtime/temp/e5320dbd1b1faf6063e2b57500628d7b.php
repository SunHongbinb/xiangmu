<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\login\find.html";i:1563276132;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>找回密码</title>
<meta name="keywords"  content="DeathGhost" />
<meta name="description" content="DeathGhost" />
<meta name="author" content="DeathGhost,deathghost@deathghost.cn">
<link rel="icon" href="/static/index/images/icon/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/static/index/css/style.css" /><script src="/static/index/js/html5.js"></script>
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
   <?php if(\think\Session::get('user.name')==null): ?>
           <ul class="topLtNav">
            <li>
                <a href="<?php echo url('login/index'); ?>" class=\"obviousText\">请登录</a>
            </li>
            <li>
               <a href="<?php echo url('register/index'); ?>" class='obviousText'></a>
            </li>
           </ul>
           <?php else: ?>
           <ul class="topLtNav">
            <li>
                <a href="<?php echo url('grzx/index'); ?>" class=\"obviousText\"><?php echo \think\Session::get('user.name'); ?></a>
            </li>
            <li>
               <a href="<?php echo url('login/loginout'); ?>" class='obviousText'>退出</a>
            </li>
           </ul>
         <?php endif; ?>
   </div>
  </div>
  <!--logoArea-->
  <div class="wrap logoSearch">
   <!--logo-->
   <div class="logo">
    <h1><img src="/static/index/images/logo.png"/></h1>
   </div>
   <!--search-->
   <div class="search">
    <ul class="switchNav">
     <li class="active" id="chanpin">产品</li>
     <li id="shangjia">商家</li>
     <li id="zixun">搭配</li>
    </ul>
    <div class="searchBox">
     <form>
      <div class="inputWrap">
      <input type="text" placeholder="输入产品关键词或货号"/>
      </div>
      <div class="btnWrap">
      <input type="submit" value="搜索"/>
      </div>
     </form>
     <a href="#" class="advancedSearch">高级搜索</a>
    </div>
   </div>
  </div>
  <!--nav-->
  <nav>
<ul class="wrap navList">
<li class="category">
<a>全部产品分类</a>
</li>
<li>
<a href="index.html" class="active">首页</a>
</li>
<li>
<a href="#">时尚搭配</a>
</li>
<li>
<a href="channel.html">原创设计</a>
</li>
<li>
<a href="channel.html">时尚代购</a>
</li>
<li>
<a href="channel.html">民族风</a>
</li>
<li>
<a href="information.html">时尚搭配</a>
</li>
<li>
<a href="library.html">搭配知识</a>
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
   });
   
 </script>
 
<section class="wrap user_form">
 <div class="lt_img">
  <img src="/static/index/images/form_bg.jpg"/>
 </div>
 <div class="rt_form">
  <form action='javascript:;' onsubmit='sub($(this))' method="post">
  <h2>找回密码</h2>
  <ul>
    <li class="user_icon">
    <input type="text" name="username" class="textbox" value="" placeholder="用户名" required/>
    </li>
   <li class="user_icon">
    <input type="text" class="textbox" id="phone" value="" name="phone" placeholder="手机号码" required/>
   </li>
   <li class="link_li">
    <input type="button" id="yanzheng" value="获取手机校验码" class="sbmt_btn"/>
   </li>
   <li class="user_cc">
    <input type="text" name="yan" value="" class="textbox" placeholder="手机校验码" required/>
    <input type="hidden" id="zheng" name="zheng" value="" placeholder="手机校验码" required/>
   </li>
   <li class="user_pwd">
    <input type="password" name="pass" value="" class="textbox" placeholder="设置新密码" required/>
   </li>
   <li class="user_pwd">
    <input type="password" name="pass1" value="" class="textbox" placeholder="确认新密码" required/>
   </li>
   <li class="link_li">
    <input type="submit" value="找回密码" class="sbmt_btn"/>
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
        ,url:"<?php echo url('login/update'); ?>"
        ,data:data
        ,async:true
        ,dataType:"json"
        ,success:function(data){
          alert(data.info);
          location.href="<?php echo url('login/index'); ?>";
        }
        ,error:function(data){
              alert("连接失败");
        }
      })
    };
</script>
<!--footer-->
<footer>
 <!--help-->
 <ul class="wrap help">
  <li>
   <dl>
    <dt>消费者保障</dt>
    <dd><a href="article_read.html">保障范围</a></dd>
    <dd><a href="article_read.html">退换货流程</a></dd>
    <dd><a href="article_read.html">服务中心</a></dd>
    <dd><a href="article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>新手上路</dt>
    <dd><a href="article_read.html">保障范围</a></dd>
    <dd><a href="article_read.html">退换货流程</a></dd>
    <dd><a href="article_read.html">服务中心</a></dd>
    <dd><a href="article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>付款方式</dt>
    <dd><a href="article_read.html">保障范围</a></dd>
    <dd><a href="article_read.html">退换货流程</a></dd>
    <dd><a href="article_read.html">服务中心</a></dd>
    <dd><a href="article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>服务保障</dt>
    <dd><a href="article_read.html">保障范围</a></dd>
    <dd><a href="article_read.html">退换货流程</a></dd>
    <dd><a href="article_read.html">服务中心</a></dd>
    <dd><a href="article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
 </ul>
 <dl class="wrap otherLink">
  <dt>友情链接</dt>
  <dd><a href="http://www.17sucai.com" target="_blank">17素材</a></dd>
  <dd><a href="http://www.17sucai.com/pins/24448.html">HTML5模块化后台管理模板</a></dd>
  <dd><a href="http://www.17sucai.com/pins/15966.html">绿色清爽后台管理系统模板</a></dd>
  <dd><a href="http://www.17sucai.com/pins/14931.html">黑色的cms商城网站后台管理模板</a></dd>
  <dd><a href="http://www.deathghost.cn" target="_blank">前端博客</a></dd>
  <dd><a href="http://www.deathghost.cn" target="_blank">博客</a></dd>
  <dd><a href="http://www.deathghost.cn" target="_blank">新码笔记</a></dd>
  <dd><a href="http://www.deathghost.cn" target="_blank">DethGhost</a></dd>
  <dd><a href="#">当当</a></dd>
  <dd><a href="#">优酷</a></dd>
  <dd><a href="#">土豆</a></dd>
  <dd><a href="#">新浪</a></dd>
  <dd><a href="#">钉钉</a></dd>
  <dd><a href="#">支付宝</a></dd>
 </dl>
 <div class="wrap btmInfor">
  <p>© 2013 DeathGhost.cn 版权所有 网络文化经营许可证：浙网文[2013]***-027号 增值电信业务经营许可证：浙B2-200***24-1 信息网络传播视听节目许可证：1109***4号</p>
  <address>联系地址：陕西省西安市雁塔区XXX号</address>
 </div>
</footer>
</body>
</html>
