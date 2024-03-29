<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\grzx\change.html";i:1562727737;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>修改密码-用户中心</title>
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
    <ul class="topLtNav">
     <li><a href="/static/index/login.html" class="obviousText">亲，请登录</a></li>
     <li><a href="/static/index/register.html">注册</a></li>
     <li><a href="/static/index/#">移动端</a></li>
    </ul>
   <!--topRightNav-->
    <ul class="topRtNav">
     <li><a href="/static/index/user.html">个人中心</a></li>
     <li><a href="/static/index/cart.html" class="cartIcon">购物车<i>0</i></a></li>
     <li><a href="/static/index/favorite.html" class="favorIcon">收藏夹</a></li>
     <li><a href="/static/index/user.html">商家中心</a></li>
     <li><a href="/static/index/article_read.html" class="srvIcon">客户服务</a></li>
     <li><a href="/static/index/union_login.html">联盟管理</a></li>
    </ul>
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
     <li id="wenku">文库</li>
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
     <a href="/static/index/#" class="advancedSearch">高级搜索</a>
    </div>
   </div>
  </div>
  <!--nav-->
  <nav>
<ul class="wrap navList">
<li class="category">
<a>全部产品分类</a>
<dl class="asideNav indexAsideNav">
<dt><a href="/static/index/channel.html">女装</a></dt>
<dd>
<a href="/static/index/#">夏装新</a>
<a href="/static/index/#">连衣裙</a>
<a href="/static/index/#">T恤</a>
<a href="/static/index/#">衬衫</a>
<a href="/static/index/#">裤子</a>
<a href="/static/index/#">牛仔裤</a>
<a href="/static/index/#">背带裤</a>
<a href="/static/index/#">短外套</a>
<a href="/static/index/#">时尚外套</a>
<a href="/static/index/#">风衣</a>
<a href="/static/index/#">毛衣</a>
<a href="/static/index/#">背心</a>
<a href="/static/index/#">吊带</a>
<a href="/static/index/#">民族服装</a>
</dd>
<dt><a href="/static/index/channel.html">男装</a></dt>
<dd>
<a href="/static/index/#">衬衫</a>
<a href="/static/index/#">背心</a>
<a href="/static/index/#">西装</a>
<a href="/static/index/#">POLO衫</a>
<a href="/static/index/#">马夹</a>
<a href="/static/index/#">皮衣</a>
<a href="/static/index/#">毛衣</a>
<a href="/static/index/#">针织衫</a>
<a href="/static/index/#">牛仔裤</a>
<a href="/static/index/#">外套</a>
<a href="/static/index/#">夹克</a>
<a href="/static/index/#">卫衣</a>
<a href="/static/index/#">风衣</a>
<a href="/static/index/#">民族风</a>
<a href="/static/index/#">原创设计</a>
<a href="/static/index/#">大码</a>
<a href="/static/index/#">情侣装</a>
<a href="/static/index/#">开衫</a>
<a href="/static/index/#">运动裤</a>
<a href="/static/index/#">工装裤</a>
</dd>
</dl>
</li>
<li>
<a href="/static/index/index.html" class="active">首页</a>
</li>
<li>
<a href="/static/index/#">时尚搭配</a>
</li>
<li>
<a href="/static/index/channel.html">原创设计</a>
</li>
<li>
<a href="/static/index/channel.html">时尚代购</a>
</li>
<li>
<a href="/static/index/channel.html">民族风</a>
</li>
<li>
<a href="/static/index/information.html">时尚搭配</a>
</li>
<li>
<a href="/static/index/library.html">搭配知识</a>
</li>
<li>
<a href="/static/index/#">促销专区</a>
</li>
<li>
<a href="/static/index/#">其他</a>
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

<section class="wrap user_center_wrap">
 <!--左侧导航-->
  <aside class="user_aside_nav">
  <dl>
   <dt>买家中心</dt>
   <dd><a href="/static/index/order_list.html">我的订单</a></dd>
   <dd><a href="/static/index/price_list.html">我的询价单</a></dd>
   <dd><a href="/static/index/favorite.html">我的收藏</a></dd>
   <dd><a href="/static/index/address.html">我的地址库</a></dd>
  </dl>
  <dl>
   <dt>商家管理中心</dt>
   <dd><a href="/static/index/authenticate.html">我要开店</a></dd>
   <dd><a href="/static/index/setting.html">店铺设置</a></dd>
   <dd><a href="/static/index/seller_product_list.html">商品列表</a></dd>
   <dd><a href="/static/index/seller_order_list.html">订单列表</a></dd>
   <dd><a href="/static/index/offer_list.html">询价单</a></dd>
  </dl>
  <dl>
   <dt>控制面板</dt>
   <dd><a href="/static/index/message.html">站内短消息</a></dd>
   <dd><a href="/static/index/account.html">资金管理</a></dd>
   <dd><a href="/static/index/profile.html">个人资料</a></dd>
   <dd><a href="/static/index/change_password.html">修改密码</a></dd>
  </dl>
 </aside>
 <!--右侧：内容区域-->
 <div class="user_rt_cont">
  <div class="top_title">
   <strong>修改密码</strong>
  </div>


  <form onsubmit='sub($(this))' action='javascript:;'>
    <table class="order_table">
     <tr>
      <input type="hidden" name="id" value="<?php echo \think\Session::get('user.id'); ?>">
      <td width="80" align="right">原始密码：</td>
      <td><input type="password" name="pass" class="textbox"/></td>
     </tr>
     <tr>
      <td width="80" align="right">设置新密码：</td>
      <td><input type="password" name="newpass" class="textbox"/></td>
     </tr>
     <tr>
      <td width="80" align="right">确认新密码：</td>
      <td><input type="password" name="newpass1" class="textbox"/></td>
     </tr>
     <tr>
      <td width="80" align="right"></td>
      <td><input type="submit" class=" group_btn" value="修改密码"/></td>
     </tr>
    </table>
  </form>




  <script>
    function sub($this){
      console.log($this.serialize());
      data=$this.serialize();
      $.ajax({
              type:'post'
              ,url:"<?php echo url('/index/grzx/update'); ?>"
              ,async:true
              ,data:data
              ,dataType:"json"
              ,success:function(data){
                // alert(data);
                if(data['code']==0){
                  alert('密码错误')
                }else if(data['code']==1){
                  alert('两次密码不一致')
                }else if(data['code']==2){
                  alert('密码修改成功')
                }else if(data['code']==3){
                  alert('密码修改失败')
                }
              }
              ,error:function(){
                    // location.href='index.html'
                    alert("连接失败")
              }
            })
    }
  </script>



 </div>
</section>
<!--footer-->
<footer>
 <!--help-->
 <ul class="wrap help">
  <li>
   <dl>
    <dt>消费者保障</dt>
    <dd><a href="/static/index/article_read.html">保障范围</a></dd>
    <dd><a href="/static/index/article_read.html">退换货流程</a></dd>
    <dd><a href="/static/index/article_read.html">服务中心</a></dd>
    <dd><a href="/static/index/article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>新手上路</dt>
    <dd><a href="/static/index/article_read.html">保障范围</a></dd>
    <dd><a href="/static/index/article_read.html">退换货流程</a></dd>
    <dd><a href="/static/index/article_read.html">服务中心</a></dd>
    <dd><a href="/static/index/article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>付款方式</dt>
    <dd><a href="/static/index/article_read.html">保障范围</a></dd>
    <dd><a href="/static/index/article_read.html">退换货流程</a></dd>
    <dd><a href="/static/index/article_read.html">服务中心</a></dd>
    <dd><a href="/static/index/article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>服务保障</dt>
    <dd><a href="/static/index/article_read.html">保障范围</a></dd>
    <dd><a href="/static/index/article_read.html">退换货流程</a></dd>
    <dd><a href="/static/index/article_read.html">服务中心</a></dd>
    <dd><a href="/static/index/article_read.html">更多服务特色</a></dd>
   </dl>
  </li>
 </ul>
 <dl class="wrap otherLink">
  <dt>友情链接</dt>
  <dd><a href="/static/index/http://www.17sucai.com" target="_blank">17素材</a></dd>
  <dd><a href="/static/index/http://www.17sucai.com/pins/24448.html">HTML5模块化后台管理模板</a></dd>
  <dd><a href="/static/index/http://www.17sucai.com/pins/15966.html">绿色清爽后台管理系统模板</a></dd>
  <dd><a href="/static/index/http://www.17sucai.com/pins/14931.html">黑色的cms商城网站后台管理模板</a></dd>
  <dd><a href="/static/index/http://www.deathghost.cn" target="_blank">前端博客</a></dd>
  <dd><a href="/static/index/http://www.deathghost.cn" target="_blank">博客</a></dd>
  <dd><a href="/static/index/http://www.deathghost.cn" target="_blank">新码笔记</a></dd>
  <dd><a href="/static/index/http://www.deathghost.cn" target="_blank">DethGhost</a></dd>
  <dd><a href="/static/index/#">当当</a></dd>
  <dd><a href="/static/index/#">优酷</a></dd>
  <dd><a href="/static/index/#">土豆</a></dd>
  <dd><a href="/static/index/#">新浪</a></dd>
  <dd><a href="/static/index/#">钉钉</a></dd>
  <dd><a href="/static/index/#">支付宝</a></dd>
 </dl>
 <div class="wrap btmInfor">
  <p>© 2013 DeathGhost.cn 版权所有 网络文化经营许可证：浙网文[2013]***-027号 增值电信业务经营许可证：浙B2-200***24-1 信息网络传播视听节目许可证：1109***4号</p>
  <address>联系地址：陕西省西安市雁塔区XXX号</address>
 </div>
</footer>
</body>
</html>