<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\shopcar\index.html";i:1562916477;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>购物车</title>
<meta name="keywords"  content="DeathGhost" />
<meta name="description" content="DeathGhost" />
<meta name="author" content="DeathGhost,deathghost@deathghost.cn">
<link rel="icon" href="/static/index/images/icon/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/static/index/css/style.css" /><script src="/static/index/js/html5.js"></script>
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
     <li><a href="login" class="obviousText">亲，请登录</a></li>
     <li><a href="register">注册</a></li>
     <li><a href="#">移动端</a></li>
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







  <form action="">
 <table class="order_table">
    <tr>
     <th><input type="checkbox" onclick="quanxuan()"/></th>
     <th>产品</th>
     <th>名称</th>
     <th>属性</th>
     <th>单价</th>
     <th>数量</th>
     <th>小计</th>
     <th>操作</th>
    </tr>




<?php foreach($arr as $v): ?>
  <tr>
   <input type="hidden" name='id' value="<?php echo $v['id']; ?>">
   <td class="center">
    <input type="checkbox" name="mai" value='<?php echo $v['id']; ?>' class='xuan'/>
   </td>
   <td class="center"><a href="/static/index/product.html"><img src="/static/index/upload/goods.jpg" style="width:50px;height:50px;"/></a></td>
   <td><a href="/static/index/product.html"><?php echo $v['name']; ?></a></td>
   <td>
    <p>颜色：<?php echo $v['color']; ?></p>

    <p>规格：<?php echo $v['size']; ?></p>
   </td>
   <td class="center"><span class="rmb_icon" id='price' value="<?php echo $v['price']; ?>"><?php echo $v['price']; ?></span></td>
   <td class="center">
    <input type="button" value="-" onclick="lbtn($(this))" class="jj_btn" />
    <input type="text" name="num" value="<?php echo $v['num']; ?>" class="number" readonly/>
    <input type="button" value="+" onclick="rbtn($(this))" class="jj_btn"/>
   </td>
   <td class="center"><strong class="rmb_icon"><?php echo $v['price']*$v['num']; ?></strong></td>
   <td class="center"><a href="<?php echo url('index/shopcar/del'); ?>?id=<?php echo $v['id']; ?>">删除</a></td>
  </tr>
<?php endforeach; ?>



 </table>
 <div class="order_btm_btn">
  <a href="/static/index/index.html" class="link_btn_01 buy_btn"/>继续购买</a>
  <a class="link_btn_02 add_btn" id='jiesuan'/>共计金额<strong class="rmb_icon">0.00</strong>立即结算</a>
 </div>
</form>





<script>
    function lbtn($this){
      var num=$this.prev('input').val();
      var price=$this.parents('td').prev('td').children('span').html();
      // alert(num);
      var max=$this.prev('input').attr('max');
      // alert('111')
      var num=$this.next('input').val();
      if (num==1) {
        num=1;
      }else{
        num-=1;
      }
      $this.next('input').val(num);
      $all=parseInt(num)*parseInt(price);
      $this.parents('td').next('td').children('strong').html($all);
    }

    function rbtn($this){
      // alert('111')
      var num=$this.prev('input').val();
      var price=$this.parents('td').prev('td').children('span').html();
      // alert(num);
      var max=$this.prev('input').attr('max');
      // alert(max)
      if (Number(num)==Number(max)) {
        num=max;
        alert('已达最大库存')
      }else{
        num++;
      }
      $this.prev('input').val(num);
      $all=parseInt(num)*parseInt(price);
      $this.parents('td').next('td').children('strong').html($all);
    }





  //----全选 反选
      function quanxuan(){
         if ($("input[type='checkbox']").prop('checked')) {
            $("input[type='checkbox']").prop("checked",true);
            fun()
          }else{
            $("input[type='checkbox']").prop("checked",false);
            fun()
           }
      }
      var a=$('.xuan')
      var numb=$('.number')
      // 给复选框添加事件
      for (var i = 0; i < a.length; i++) {
        a[i].onclick=fun
      }
      function fun(){
        sid=[];
        num=[];
        for (var i = 0; i < a.length; i++) {
          if(a[i].checked==true){
            // alert('111')
             sid.push(a[i].value)
             num.push(numb[i].value)
             id=sid.join(',')
             shu=num.join(',')
             console.log(shu)
             $('#jiesuan').attr('href',"<?php echo url('index/order/sel'); ?>?id="+id+"&num="+shu)
          }
        }
      }

</script>


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
