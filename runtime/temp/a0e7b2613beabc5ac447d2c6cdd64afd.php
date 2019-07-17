<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\lists\index.html";i:1562895187;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>分类列表</title>
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
  //冒泡
  $(".favorite_list li .shop_collect_goods").click(function(){
  alert("收藏产品");
  event.stopPropagation();
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
    <?php if(empty($_SESSION['think']['user'])): ?>
     <ul class="topLtNav">
      <li>
          <a href="<?php echo url('login/index'); ?>" class=\"obviousText\">请登录</a>
      </li>
      <li>
         <a href="<?php echo url('register/index'); ?>" class='obviousText'>注册</a>
      </li>
     </ul>
     <ul class="topRtNav">
      <li><a href="<?php echo url('index/login/index'); ?>">个人中心</a></li>
      <li><a href="<?php echo url('index/login/index'); ?>" class="cartIcon">购物车<i>0</i></a></li>
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
     <ul class="topRtNav">
      <li><a href="<?php echo url('index/grzx/index'); ?>">个人中心</a></li>
      <li><a href="<?php echo url('index/shopcar/index'); ?>" class="cartIcon">购物车<i>0</i></a></li>
     </ul>
     <?php endif; ?>
    <!--topRightNav-->
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
      <li id="wenku">文库</li>
     </ul>
     <div class="searchBox">
      <form action="<?php echo url('index/lists/index'); ?>" method="get">
       <div class="inputWrap">
       <input type="text" name="name" placeholder="输入产品关键词或货号"/>
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


        <?php foreach($type as $value): ?>
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
    document.oncontextmenu=new Function("event.returnValue=false;");
    document.onselectstart=new Function("event.returnValue=false;");
  </script>

<section class="wrap list_class_page">
 <div class="lt_area">
  <div class="attr_filter">
     <h2>属性筛选</h2>
     <ul>
      <li>
       <dl>
        <dt>按品牌筛选：</dt>
        <dd>
         <a>品牌A</a>
         <a>品牌B</a>
         <a>品牌C</a>
         <a>品牌D</a>
         <a>品牌E</a>
         <a>品牌F</a>
         <a>品牌G</a>
         <a>品牌H</a>
         <a>品牌I</a>
         <a>品牌J</a>
        </dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt>按价格筛选：</dt>
        <dd>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
         <a>0~300元</a>
        </dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt>按上架时间筛选：</dt>
        <dd>
         <a>今天</a>
         <a>昨天</a>
         <a>本周</a>
         <a>本月</a>
        </dd>
       </dl>
      </li>
     </ul>
  </div>
  <!--产品列表-->
    <section class="shop_goods_li">
     <h2>店铺产品</h2>
      <ul class="favorite_list">
        <?php foreach($arr as $val): ?>
       <li>
          <a href="<?php echo url('index/detail/index'); ?>?id=<?php echo $val['id']; ?>">
           <img src="/static/uploads/goods/<?php echo substr($val['picname'],0,strpos($val['picname'],',')); ?>"/>
           <h3><?php echo $val['name']; ?></h3>
           <p class="price"><span class="rmb_icon"><?php echo $val['price']; ?></span></p>
          </a>
           <a href="<?php echo url('index/grzx/addfavorite'); ?>?id=<?php echo $val['id']; ?>"><p class="shop_collect_goods" title="收藏该产品"><span>&#115;</span></p></a>
       </li>
       <?php endforeach; ?>
       
      </ul>
       <!--分页-->
       <div class="paging">
        <?php echo $arr->render(); ?>
       </div>
    </section>

 </div>
 <aside class="rtWrap">
  <dl class="rtLiTwoCol">
   <dt>热门推荐</dt>
   <?php foreach($s as $v): ?>
   <dd>
    <a href="<?php echo url('index/detail/index'); ?>?id=<?php echo $v['id']; ?>">
     <img src="/static/uploads/goods/<?php echo substr($v['picname'],0,strpos($v['picname'],',')); ?>"/>
     <p><?php echo $v['price']; ?></p>
    </a>
   </dd>
   <?php endforeach; ?>
  </dl>
 </aside>
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
