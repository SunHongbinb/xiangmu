<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\detail\index.html";i:1562914381;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>产品详情</title>
<meta name="keywords"  content="DeathGhost" />
<meta name="description" content="DeathGhost" />
<meta name="author" content="DeathGhost,deathghost@deathghost.cn">
<link rel="icon" href="/static/index/images/icon/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/static/index/css/style.css" />
<script src="/static/index/js/html5.js"></script>
<script src="/static/index/js/jquery.js"></script>
<script src="/static/index/js/jquery.jqzoom.js"></script>
<script src="/static/index/js/base.js"></script>
<script>
$(document).ready(function(){
  $("nav .indexAsideNav").hide();
  $("nav .category").mouseover(function(){
    $(".asideNav").slideDown();
    });
  $("nav .asideNav").mouseleave(function(){
    $(".asideNav").slideUp();
    });
  //detail tab
  $(".product_detail_btm .item_tab a").click(function(){
     var liindex = $(".product_detail_btm .item_tab a").index(this);
     $(this).addClass("curr_li").parent().siblings().find("a").removeClass("curr_li");
       $(".cont_wrap").eq(liindex).fadeIn(150).siblings(".cont_wrap").hide();
    });
  //radio
  $(".horizontal_attr label").click(function(){
    $(this).addClass("isTrue").siblings().removeClass("isTrue");
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
    <?php endif; ?>
   <!--topRightNav-->
    <ul class="topRtNav">
     <li><a href="<?php echo url('grzx/index'); ?>">个人中心</a></li>
     <li><a href="<?php echo url('shopcar/index'); ?>" class="cartIcon">购物车<i>0</i></a></li>
    </ul>
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


  <?php foreach($array as $value): ?>
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

 </script>

 <!--导航指向-->
<aside class="wrap insideLink">
  <a href="/static/index/index.html">首页</a>
  <a href="/static/index/product_list.html">时尚女装</a>
</aside>
<section class="wrap product_detail">
 <!--img:left-->
 <div class="gallery">
  <div>
    <div id="preview" class="spec-preview" style="overflow: hidden;" > 
      <span class="jqzoom">
      <img width="420px" jqimg="/static/uploads/goods/<?php echo $pic[0]; ?>" src="/static/uploads/goods/<?php echo $pic[0]; ?>" /></span> 
    </div>
    <!--缩图开始-->
    <div class="spec-scroll"> <a class="prev">&lt;</a> <a class="next">&gt;</a>
      <div class="items">
        <ul>
          <?php foreach($pic as $v): ?>
          <li><img bimg="/static/uploads/goods/<?php echo $v; ?>" src="/static/uploads/goods/<?php echo $v; ?>" onmousemove="preview(this);"></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <!--缩图结束-->
  </div>
 </div>
 <!--text:right-->
 <div class="rt_infor">
  <!--lt_infor-->

<script>
  function sub($this){
    console.log($this.serialize());
    data=$this.serialize();
    $.ajax({
      type:"post"
      ,url:"<?php echo url('shopcar/add'); ?>"
      ,async:true
      ,data:data
      ,dataType:"json"
      ,success:function(data){
        if(data>0){
          alert('添加成功')
          location.href="<?php echo url('shopcar/index'); ?>";
        }else{
          alert('添加失败')
        }
      }
      ,error:function(data){
            // location.href='index.html'
            alert("请选择尺寸和颜色")
      }
    })
  }
</script>

  <form action="javascript:;" onsubmit="sub($(this))">
    <input type="hidden" name="picname" value="<?php echo $v; ?>">
    <input type="hidden" name="uid" value="<?php echo \think\Session::get('user.id'); ?>">
    <input type="hidden" name="id" value="<?php echo $arr['id']; ?>">
    <div class="goods_infor">
       <h2><?php echo $arr['name']; ?></h2>
       <ul>
        <li>
         <dl class="horizontal">
          <dt>价格：</dt>
          <dd><strong class="rmb_icon univalent"><?php echo $arr['price']; ?></strong>元 </dd>
         </dl>
        </li>
        <li>
         <dl class="horizontal">
          <dt>上架时间：</dt>
          <dd><time><?php echo $arr['addtime']; ?></time></dd>
         </dl>
        </li>
        <li>
         <dl class="horizontal">
          <dt>品牌：</dt>
          <dd><em><?php echo $arr['company']; ?></time></em>
         </dl>
        </li>
        <li class="statistics">
         <dl class="vertical">
          <dt>月销量</dt>
          <dd>20</dd>
         </dl>
         <dl class="vertical">
          <dt>累计评论</dt>
          <dd>198</dd>
         </dl>
         <dl class="vertical">
          <dt>关注</dt>
          <dd>230</dd>
         </dl>
        </li>
        <li>
         <dl class="horizontal horizontal_attr">
          <dt>规格：</dt>
          <dd>
           <?php foreach($size as $v): ?>
           <label><input type="radio" name="size" value="<?php echo $v; ?>"/><?php echo $v; ?></label>
           <?php endforeach; ?>
          </dd>
         </dl>
        </li>
        <li>
         <dl class="horizontal horizontal_attr">
          <dt>颜色：</dt>
          <dd>
           <?php foreach($color as $v): ?>
           <label><input type="radio" name="color" value="<?php echo $v; ?>"/><?php echo $v; ?></label>
           <?php endforeach; ?>
          </dd>
         </dl>
        </li>
        </li>
        <li>
         <dl class="horizontal horizontal_attr">
          <dt>数量：</dt>
          <dd>
           <input type="button" value="-" onclick="lbtn($(this))" class="jj_btn"/>
           <input type="text" name="num" value="1" max='<?php echo $arr['store']; ?>' readonly class="num"/>
           <input type="button" value="+" onclick="rbtn($(this))" class="jj_btn"/>
           <!-- <input type="text" value="100" onclick="nbtn($(this))" class="jj_btn"/> -->
           <span>库存：<?php echo $arr['store']; ?></span>
          </dd>
         </dl>
        </li>
        <li style="margin-top:50px;margin-left:20px; ">
           <input type="button" value="加入收藏" class="buy_btn" onclick="sc()"/>
           <input type="button" value="立即购买" class="buy_btn" onClick="javascript:location.href='cart.html'"/>
           <input type="submit" value="加入购物车" class="add_btn"/>
        </li>
       </ul>
      </div>
  </form>



<script>
    function lbtn($this){
      // alert('111')
      var num=$this.next('input').val();
      if (num==1) {
        num=1;
      }else{
        num-=1;
      }
      $this.next('input').val(num);
    }
    function sc(){
      alert(id);
    }

    function rbtn($this){
      // alert('111')
      var num=$this.prev('input').val();
      var max=$this.prev('input').attr('max');
      // alert(max)
      if (Number(num)==Number(max)) {
        num=max;
        alert('已达最大库存')
      }else{
        num++;
      }
      $this.prev('input').val(num);
    }

</script>
  <!--rt_infor-->
  <div class="shop_infor">
   <dl class="business_card">
    <dt>xx有限公司</dt>
    <dd>资质：生产商</dd>
    <dd>联系人：*先生（先生）</dd>
    <dd>邮件：******@Foxmail.com</dd>
    <dd>电话：4008-******</dd>
    <dd>所在地：陕西省西安市</dd>
    <dd>地址：陕西省西安市**区**街232号</dd>
    <dd class="center">
     <a href="/static/index/shop.html" class="link_btn">进入店铺</a>
     <a class="link_btn">收藏店铺</a>
    </dd>
   </dl>
  </div>
 </div>
</section>
<!--detail-->
<section class="wrap product_detail_btm">
 <article>
  <ul class="item_tab">
   <li><a class="curr_li">商品详情</a></li>
   <li><a>商品评价（2893）</a></li>
   <li><a>成交记录（1892）</a></li>
  </ul>
  <!--商品详情-->
  <div class="cont_wrap active">
   该商品参与了公益宝贝计划，卖家承诺每笔成交将为壹乐园计划捐赠0.02元。该商品已累积捐赠24560笔。
善款用途简介：基于游戏教育在儿童成长中的重要性，壹基金设立了“壹乐园计划”，帮助提供滑梯、攀爬架、跷跷板、秋千、乒乓球桌等，为灾后及贫困地区的孩子们搭建课<br/>
该商品参与了公益宝贝计划，卖家承诺每笔成交将为壹乐园计划捐赠0.02元。该商品已累积捐赠24560笔。
善款用途简介：基于游戏教育在儿童成长中的重要性，壹基金设立了“壹乐园计划”，帮助提供滑梯、攀爬架、跷跷板、秋千、乒乓球桌等，为灾
  <img src="/static/index/upload/goods005.jpg"/><br/>
   该商品参与了公益宝贝计划，卖家承诺每笔成交将为壹乐园计划捐赠0.02元。该商品已累积捐赠24560笔。
善款用途简介：基于游戏教育在儿童成长中的重要性，壹基金设立了“壹乐园计划”，帮助提供滑梯、攀爬架、跷跷板、秋千、乒乓球桌等，为灾后及贫困地区的孩子们搭建课<br/>
该商品参与了公益宝贝计划，卖家承诺每笔成交将为壹乐园计划捐赠0.02元。该商品已累积捐赠24560笔。
善款用途简介：基于游戏教育在儿童成长中的重要性，壹基金设立了“壹乐园计划”，帮助提供滑梯、攀爬架、跷跷板、秋千、乒乓
  </div>
  <!--商品评价-->
  <div class="cont_wrap">
   <table class="table">
    <tr>
     <td width="20%" align="center">李*锋</td>
     <td width="60%">这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦</td>
     <td width="20%" align="center"><time>2013-01-13 15:06</time></td>
    </tr>
    <tr>
     <td width="20%" align="center">彭**法</td>
     <td width="60%">这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦</td>
     <td width="20%" align="center"><time>2013-01-13 15:06</time></td>
    </tr>
    <tr>
     <td width="20%" align="center">代**彭</td>
     <td width="60%">这里是评论内容哦这里是评论内容哦这里是评论内容哦容哦这里是评论内容哦这里是评论内容哦这里是评论容哦这里是评论内容哦这里是评论内容哦这里是评论容哦这里是评论内容哦这里是评论内容哦这里是评论容哦这里是评论内容哦这里是评论内容哦这里是评论容哦这里是评论内容哦这里是评论内容哦这里是评论容哦这里是评论内容哦这里是评论内容哦这里是评论容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦这里是评论内容哦</td>
     <td width="20%" align="center"><time>2013-01-13 15:06</time></td>
    </tr>
   </table>
   <!--分页-->
   <div class="paging">
    <a>第一页</a>
    <a class="active">2</a>
    <a>3</a>
    <a>...</a>
    <a>89</a>
    <a>最后一页</a>
   </div>
  </div>
  <!--成交记录-->
  <div class="cont_wrap">
   <table class="table">
    <tr>
     <th>买家</th>
     <th>产品属性</th>
     <th>数量</th>
     <th>成交时间</th>
    </tr>
    <tr>
     <td align="center">李**强</td>
     <td>
      <p>颜色：黑色<p>
      <p>规格：M<p>
     </td>
     <td align="center"><b>1</b></td>
     <td align="center"><time>2013-01-13 15:25:39</time></td>
    </tr>
    <tr>
     <td align="center">李**强</td>
     <td>
      <p>颜色：黑色<p>
      <p>规格：L<p>
     </td>
     <td align="center"><b>1</b></td>
     <td align="center"><time>2013-01-13 15:25:39</time></td>
    </tr>
    <tr>
     <td align="center">葛**华</td>
     <td>
      <p>颜色：白色<p>
      <p>规格：XL<p>
     </td>
     <td align="center"><b>5</b></td>
     <td align="center"><time>2013-01-13 15:25:39</time></td>
    </tr>
   </table>
   <!--分页-->
   <div class="paging">
    <a>第一页</a>
    <a class="active">2</a>
    <a>3</a>
    <a>...</a>
    <a>89</a>
    <a>最后一页</a>
   </div>
  </div>
 </article>
 <aside>
  <dl class="aside_pro_list">
   <dt>
    <strong>精品推荐</strong>
    <a>更多</a>
   </dt>
   <dd>
    <a href="/static/index/#" class="goods_img"><img src="/static/index/upload/goods002.jpg"/></a>
    <div class="rt_infor">
     <h3><a href="/static/index/#">时尚女装 2019春季针织衫</a></h3>
     <p><del class="rmb_icon">1298.00</del></p>
     <p><strong class="rmb_icon">980.00</strong></p>
    </div>
   </dd>
   <dd>
    <a href="/static/index/#" class="goods_img"><img src="/static/index/upload/goods002.jpg"/></a>
    <div class="rt_infor">
     <h3><a href="/static/index/#">时尚女装 2019春季针织衫</a></h3>
     <p><del class="rmb_icon">1298.00</del></p>
     <p><strong class="rmb_icon">980.00</strong></p>
    </div>
   </dd>
   <dd>
    <a href="/static/index/#" class="goods_img"><img src="/static/index/upload/goods002.jpg"/></a>
    <div class="rt_infor">
     <h3><a href="/static/index/#">时尚女装 2019春季针织衫</a></h3>
     <p><del class="rmb_icon">1298.00</del></p>
     <p><strong class="rmb_icon">980.00</strong></p>
    </div>
   </dd>
    <dd>
    <a href="/static/index/#" class="goods_img"><img src="/static/index/upload/goods002.jpg"/></a>
    <div class="rt_infor">
     <h3><a href="/static/index/#">时尚女装 2019春季针织衫</a></h3>
     <p><del class="rmb_icon">1298.00</del></p>
     <p><strong class="rmb_icon">980.00</strong></p>
    </div>
   </dd>
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
  <dd><a href="#">17素材</a></dd>
  <dd><a href="#">HTML5模块化后台管理模板</a></dd>
  <dd><a href="#">绿色清爽后台管理系统模板</a></dd>
  <dd><a href="#">黑色的cms商城网站后台管理模板</a></dd>
  <dd><a href="#"_blank">前端博客</a></dd>
  <dd><a href="#"_blank">博客</a></dd>
  <dd><a href="#"_blank">新码笔记</a></dd>
  <dd><a href="#"_blank">DethGhost</a></dd>
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
