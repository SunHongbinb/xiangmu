<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\order\order_confirm.html";i:1562828700;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>确认订单</title>
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
         <a href="<?php echo url('grzx/index'); ?>" class=\"obviousText\">欢迎您 :<?php echo \think\Session::get('user.name'); ?></a>
     </li>
     <li>
         <!-- <?php echo \think\Session::get('user.id'); ?> -->
         <a href="<?php echo url('login/loginout'); ?>?id=<?php echo \think\Session::get('user.id'); ?>" class='obviousText'>退出</a>
     </li>
    </ul>
   <!--topRightNav-->
    <ul class="topRtNav">
     <li><a href="<?php echo url('grzx/index'); ?>">个人中心</a></li>
     <li><a href="<?php echo url('shopcar/index'); ?>" class="cartIcon">购物车<i>0</i></a></li>
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

<section class="wrap" style="margin-top:20px;overflow:hidden;">
 <table class="order_table">
  <caption>
   <strong>订单商品</strong>
  </caption>



<?php foreach($arr as $v): ?>

  <tr>
   <td class="center"><a href="/static/index/product.html"><img src="/static/index/upload/goods.jpg" style="width:50px;height:50px;"/></a></td>
   <td><a href="/static/index/product.html"><?php echo $v['name']; ?></a></td>
   <td>
    <p>颜色：<?php echo $v['color']; ?></p>

    <p>规格：<?php echo $v['size']; ?></p>
   </td>
   <td class="center"><span class="rmb_icon"><?php echo $v['price']; ?></span></td>
   <td class="center"><span><?php echo $v['num']; ?></span></td>
   <td class="center"><strong class="rmb_icon"><?php echo $v['price']*$v['num']; ?></strong></td>
  </tr>
<?php endforeach; ?>


 </table>
 <!--支付与配送-->
 <ul class="order_choice">
  <li>
   <dl>
    <dt>支付方式</dt>
    <dd>
     <label class="radio istrue"><input type="radio" name="pay"/>支付宝</label>
    </dd>
   </dl>
  </li>
  <li>



   <dl>
    <dt>收货地址</dt>
      <table class="order_table address_tbl">
       <tr>
        <th width="140">收件人</th>
        <th width="140">联系电话</th>
        <th>收件地址</th>
        <th width="240">选择</th>


    <form action="<?php echo url('order/paypage'); ?>" method="post" id="form1">
        <!-- 总价 -->
        <input type="hidden" name="WIDtotal_amount" value="<?php echo $too; ?>">
        <!-- 订单号 -->
        <input type="hidden" name="WIDout_trade_no" value="<?php echo $arr[0]['id']; ?>">
        <input type="hidden" name="WIDsubject" value="<?php echo $arr[0]['name']; ?>">
        <input type="hidden" name="WIDbody" value="好东西">
      </tr>
      <?php foreach($addre as $v): ?>

       <tr>
        <!-- 收货人 -->
        <td style="padding-left:50px;">  <input type="" value="<?php echo $v['name']; ?>" style="border-width:0;">    </td>
        <!-- 联系电话 -->
        <td style="padding-left:35px;">  <input type="" value="<?php echo $v['phone']; ?>" style="border-width:0;">    </td>
        <!-- 收货地址 -->
        <td style="padding-left:280px;">
         <address>
          <input type="" value="<?php echo $v['address']; ?>" style="border-width:0;">
         </address>
        </td>
        <td style="padding-left:114px;">
         <input type="radio" checked name="address" value="<?php echo $v['id']; ?>">
        </td>
       </tr>
      <?php endforeach; ?>
    </form>


      </table>
   </dl>
  </li>
 </ul>
 <div class="order_btm_btn">
  <a onclick="document:form1.submit()" class="link_btn_02 add_btn"/>共计金额<strong class="rmb_icon"><?php echo $too; ?></strong>提交订单</a>
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
