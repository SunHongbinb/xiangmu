<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\login\index.html";i:1563363460;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"/>
  <title>登录</title>
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
     <!--topRightNav-->
      <ul class="topRtNav">
       <li><a href="<?php echo url('index/index'); ?>">查看商品</a></li>
      </ul>
     </div>
    </div>
    <!--logoArea-->
    <div class="wrap logoSearch">
     <!--logo-->
     <div class="logo">
      <h1><a href="<?php echo url('index/index'); ?>"><img src="/static/index/images/logo.png"/></a></h1>
     </div>
     <!--search-->
     <div class="search">
      <ul class="switchNav">
       <li class="active" id="chanpin">产品</li>
       <li id="shangjia">商家</li>
       <li id="zixun">搭配</li>
       <li id="wenku">文库</li>
      </ul>

      <!-- 搜索 -->
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


  <!-- 分类遍历 -->
  <?php foreach($arr as $value): ?>
    <dt><a href="javascript:;"><?php echo $value['name']; ?></a></dt>
    <dd>
      <?php foreach($value['zi'] as $val): ?>
        <a href="<?php echo url('index/lists/index'); ?>?id=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a>
      <?php endforeach; ?>
    </dd>
  <?php endforeach; ?>





  </dl>
  </li>
  <li>
  <a href="<?php echo url('index/index'); ?>" class="active">首页</a>
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
  <a href="#">民族风</a>
  </li>
  <li>
  <a href="#">时尚搭配</a>
  </li>
  <li>
  <a href="#">搭配知识</a>
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
    <h2>会员登录</h2>
        <script>
              function sub($this){
                 // console.log($this.serialize());
                 data=$this.serialize();
                $.ajax({
                  type:'get'
                  ,url:"<?php echo url('index/login/dologin'); ?>"
                  ,async:true
                  ,data:data
                  ,dataType:"json"
                  ,success:function(data){
                    if (data['code']==1) {
                        location.href="<?php echo url('index/index'); ?>";
                        // alert('111')
                    }else if(data['code']==0){
                        // location.href="<?php echo url('index/login/index'); ?>";
                        alert('登录失败,账号或密码错误')
                    }else if(data['code']==2){
                      alert('登录失败,账号已被封禁')
                    }
                  }
                  ,error:function(data){
                        // location.href='index.html'
                        alert("连接失败")
                  }
                })
                // layer.msg(JSON.stringify("aaaa"),function(){
                //     location.href='index.html'
                // });
                // return false;
              };

    </script>
    <form id="login" method="post" onsubmit='sub($(this))' action='javascript:;'>
      <ul>
       <li class="user_icon">
        <input type="text" name="username" class="textbox" placeholder="手机号"/ required>
       </li>
       <li class="user_pwd">
        <input type="password" name="pass" class="textbox" placeholder="密码"/ required>
       </li>
       <li class="link_li">
        <a href="<?php echo url('register/index'); ?>" title="注册新用户" class="fl">注册新用户</a>
        <a href="<?php echo url('register/find'); ?>" title="忘记密码" class="fr">忘记密码？</a>
       </li>
       <li class="link_li">
        <input type="submit" value="立即登录" class="sbmt_btn"/>
       </li>
      </ul>
    </form>
   </div>
  </section>
  <!--footer-->
  <footer>
   <!--help-->
   <ul class="wrap help">
    <li>
     <dl>
    <dt>消费者保障</dt>
    <dd><a href="#">保障范围</a></dd>
    <dd><a href="#">退换货流程</a></dd>
    <dd><a href="#">服务中心</a></dd>
    <dd><a href="#">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>新手上路</dt>
    <dd><a href="#">保障范围</a></dd>
    <dd><a href="#">退换货流程</a></dd>
    <dd><a href="#">服务中心</a></dd>
    <dd><a href="#">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>付款方式</dt>
    <dd><a href="#">保障范围</a></dd>
    <dd><a href="#">退换货流程</a></dd>
    <dd><a href="#">服务中心</a></dd>
    <dd><a href="#">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>服务保障</dt>
    <dd><a href="#">保障范围</a></dd>
    <dd><a href="#">退换货流程</a></dd>
    <dd><a href="#">服务中心</a></dd>
    <dd><a href="#">更多服务特色</a></dd>
   </dl>
  </li>
 </ul>
 <dl class="wrap otherLink">
  <dt>友情链接</dt>
  <dd><a href="#" target="_blank">17素材</a></dd>
  <dd><a href="#">HTML5模块化后台管理模板</a></dd>
  <dd><a href="#">绿色清爽后台管理系统模板</a></dd>
  <dd><a href="#">黑色的cms商城网站后台管理模板</a></dd>
  <dd><a href="#" target="_blank">前端博客</a></dd>
  <dd><a href="#" target="_blank">博客</a></dd>
  <dd><a href="#" target="_blank">新码笔记</a></dd>
  <dd><a href="#" target="_blank">DethGhost</a></dd>
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