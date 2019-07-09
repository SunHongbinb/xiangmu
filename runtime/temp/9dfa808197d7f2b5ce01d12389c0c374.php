<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\index\index.html";i:1562666607;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>首页</title>
  <meta name="keywords"  content="DeathGhost" />
  <meta name="description" content="DeathGhost" />
  <meta name="author" content="DeathGhost,deathghost@deathghost.cn">
  <link rel="icon" href="/static/index/images/icon/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="/static/index/css/style.css" /><script src="/static/index/js/html5.js"></script>
  <script src="/static/index/js/jquery.js"></script>
  <script src="/static/index/js/swiper.min.js"></script>
  <script>
  $(document).ready(function(){
    //焦点图
    var mySwiper = new Swiper('#slide',{
        autoplay:5000,
        visibilityFullFit : true,
        loop:true,
        pagination : '.pagination',
      });
  })
  </script>
</head>
<body>
<!--advertisment<div class="wrap"><img src="/static/index/upload/banner.jpg"/></div>-->
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

<!--advertisment area-->
    <section class="wrap">
     <!--ctCont-->
     <div class="IdxmainArea">
        <!--slide-->
        <div id="slide">
          <div class="swiper-wrapper">
            <?php foreach($banner as $v): ?>
            <div class="swiper-slide">
            <a href="<?php echo $v['address']; ?>">
            <img src="/static/uploads/banner/<?php echo $v['picname']; ?>"/>
            </a>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="pagination">
          </div>
        </div>
        <!--singleAd-->
        <div class="singleAd">
         <a href="#">
          <img src="/static/index/upload/sigleAd.jpg"/>
         </a>
        </div>
         <!--bestShop-->
        <dl class="bestShop">
         <dt>
          <strong>优秀商家推荐</strong>
          <a href="shop_list.html" class="fr">更多</a>
         </dt>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/001.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/002.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/003.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/004.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/005.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/006.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/007.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
         <dd>
          <a href="shop.html">
           <img src="/static/index/upload/008.jpg"/>
           <h2>DM精品女装</h2>
          </a>
         </dd>
        </dl>
     </div>
     <!--asdCont-->
     <div class="IdxAsideRt">
      <!--login-->
       <dl class="idxRtAtc">
        <dt>
         <em class="obviousText">最新公告</em>
         <a href="article_list.html">more</a>
        </dt>
        <dd><a href="article_read.html">2015年12月20日系统升级通告统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告</a></dd>
       </dl>
       <dl class="idxRtAtc">
        <dt>
         <em>质量标准技术参数</em>
         <a href="article_list.html">more</a>
        </dt>
        <dd><a href="article_read.html">2015年12月20日系统升级通告统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告</a></dd>
        <dd><a href="article_read.html">2015年12月20日系统升级通告</a></dd>
       </dl>
      </div>
    </section>
<!--productList-->
    <?php foreach($type as $k => $val): ?>
    <section class="wrap idxproLi">
     <h2>
      <strong>
       <a href="lists"><?php echo $val['name']; ?>展示区</a>
      </strong>
      <span class="classLi">
        <?php foreach($list[$k] as $v): ?>
       <a href="<?php echo url('index/lists/index'); ?>?id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a>
        <?php endforeach; ?>
      </span>
     </h2>
     <div class="ltArea">
      <!--ad:category pic-->
       <a href="product_list.html"><img src="/static/index/upload/bestCategoryPic01.jpg"/></a>
     </div>
     <div class="ctLi">
      <ul>
       <li>
        <a href="<?php echo url('detail/index'); ?>?id=22">
         <img src="/static/index/upload/goods001.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>1000.00</span></p>
        </a>
       </li>
       <li>
        <a href="<?php echo url('shopcar/index'); ?>">
         <img src="/static/index/upload/goods003.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>545.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods004.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>1000.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods003.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>1000.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods001.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>980.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods002.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>642.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods004.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>793.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods001.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>755.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods002.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>360.00</span></p>
        </a>
       </li>
       <li>
        <a href="product.html">
         <img src="/static/index/upload/goods003.jpg"/>
         <h3>2019时尚新款</h3>
         <p><span>1255.00</span></p>
        </a>
       </li>
      </ul>
      <!--bestBrand-->
      <div class="idxBrandLi">
       <a href="shop.html"><img src="/static/index/upload/brandLogo01.jpg"/></a>
       <a href="shop.html"><img src="/static/index/upload/brandLogo02.jpg"/></a>
       <a href="shop.html"><img src="/static/index/upload/brandLogo03.jpg"/></a>
       <a href="shop.html"><img src="/static/index/upload/brandLogo04.jpg"/></a>
      </div>
     </div>
    </section>
    <?php endforeach; ?>
<!--case-->
    <section class="wrap idexCase">
     <h2>
      <strong>工程案例</strong>
      <a href="#">more</a>
     </h2>
     <ul>
      <li>
       <a href="#">
        <img src="/static/index/upload/case001.jpg"/>
        <h3>时尚搭配案例</h3>
       </a>
      </li>
      <li>
       <a href="#">
        <img src="/static/index/upload/case002.jpg"/>
        <h3>时尚搭配案例</h3>
       </a>
      </li>
      <li>
       <a href="#">
        <img src="/static/index/upload/case003.jpg"/>
        <h3>时尚搭配案例</h3>
       </a>
      </li>
      <li>
       <a href="#">
        <img src="/static/index/upload/case004.jpg"/>
        <h3>时尚搭配案例</h3>
       </a>
      </li>
      <li>
       <a href="#">
        <img src="/static/index/upload/case005.jpg"/>
        <h3>时尚搭配案例</h3>
       </a>
      </li>
     </ul>
    </section>
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
     <div class="wrap btmInfor">
      <p>© 2013 DeathGhost.cn 版权所有 网络文化经营许可证：浙网文[2013]***-027号 增值电信业务经营许可证：浙B2-200***24-1 信息网络传播视听节目许可证：1109***4号</p>
      <address>联系地址：陕西省西安市雁塔区XXX号</address>
     </div>
    </footer>
</body>
</html>
