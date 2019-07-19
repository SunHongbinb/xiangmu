<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\order\index.html";i:1563355913;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>用户中心</title>
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
           <a href="<?php echo url('index/login/loginout'); ?>?id=<?php echo \think\Session::get('user.id'); ?>" class='obviousText'>退出</a>
       </li>
      </ul>
      <ul class="topRtNav">
       <li><a href="<?php echo url('index/grzx/index'); ?>">个人中心</a></li>
       <li><a href="<?php echo url('index/shopcar/index'); ?>" class="cartIcon">购物车<i><?php echo $shopnum; ?></i></a></li>
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


<?php foreach($ss as $value): ?>
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

<section class="wrap user_center_wrap">
 <!--左侧导航-->
  <aside class="user_aside_nav">




  <dl>
   <dt>买家中心</dt>
   <dd><a href="<?php echo url('order/index'); ?>">我的订单</a></dd>
   <dd><a href="<?php echo url('grzx/favorite'); ?>">我的收藏</a></dd>
  </dl>

  <dl>
   <dt>个人信息</dt>
   <dd><a href="<?php echo url('index/address/index'); ?>">我的地址库</a></dd>
   <dd><a href="<?php echo url('grzx/change'); ?>">修改密码</a></dd>
  </dl>



 </aside>
 <!--右侧：内容区域-->
 <div class="user_rt_cont">
  <div class="top_title">
   <strong>我的订单</strong>
  </div>
  <!--条件检索-->
  <div style="margin:8px 0;">
   <select class="select">
    <option>订单状态</option>
    <option>待付款</option>
    <option>待发货</option>
    <option>待确认</option>
    <option>待评价</option>
    <option>退货</option>
   </select>
   <input type="text" class="textbox textbox_225" placeholder="输入订单编号"/>
   <input type="button" value="查询" class="group_btn"/>
  </div>
  <ul class="order_li">



<?php foreach($order as $k=> $v): ?>
   <li>
    <table class="order_table">
     <caption>
      <strong class="o_id">订单编号：<span><?php echo $v['id']; ?></span></strong>
     </caption>
        <?php $__FOR_START_10987__=0;$__FOR_END_10987__=$v['length'];for($i=$__FOR_START_10987__;$i < $__FOR_END_10987__;$i+=1){ ?>
       <tr>
        <td class="center"><a href="/static/index/product.html"><img src="/static/uploads/goods/<?php echo $v[$i]['picname']; ?>" style="width:50px;height:50px;"/></a></td>
        <td><a href="/static/index/product.html"></a></td>
        <td class="center"><span class="rmb_icon"><?php echo $v[$i]['price']; ?></span></td>
        <td class="center"><b><?php echo $v[$i]['num']; ?></b></td>
        <td class="center"><strong class="rmb_icon"><?php echo $v[$i]['total']; ?></strong></td>
        <?php } if($v['state']==0): ?>
        <td class="center"><a href="<?php echo url('index/order/fukuan'); ?>?oid=<?php echo $v['id']; ?>" class="a_btn">付款</a></td>
        <?php elseif($v['state']==1): ?>
        <td class="center"><a class="a_btn">待发货</a></td>
        <?php elseif($v['state']==2): ?>
        <td class="center"><a class="a_btn" onclick="receipt($(this))">确认收货</a></td>
        <?php elseif($v['state']==3): ?>
        <td class="center" ><a href="<?php echo url('index/grzx/comment'); ?>?id=<?php echo $v['id']; ?>" class="a_btn"><span>评价</span></a></td>
        <?php elseif($v['state']==4): ?>
        <td class="center" ><span>交易成功</span></td>
        <?php endif; ?>





       </tr>

    </table>
   </li>
<?php endforeach; ?>


<script>
  function receipt($this){
    that=$this
    var a=confirm("是否确认收货")
    var o_id=$this.parents('table').children('caption').children('strong').children('span').text();

    if(a==true){
      $.ajax({
            url: "<?php echo url('index/order/receipt'); ?>",
            type: 'post',
            dataType: 'text',
            data: {id: o_id},
            async:false,//true:异步请求  false:同步请求
            success:function(data){
              if(data==1){
                that.html("评价").attr("onclick","comment($(this))")
                // location.href="<?php echo url('index/order/index'); ?>"

                alert('收货成功')
              }
            },
            error:function(){
                alert("ajax请求失败!");
            }
        });
    }
  }


  function comment($this){
    // alert('111')
    var o_id=$this.parents('table').children('caption').children('strong').children('span').text();
    // alert(o_id);
    location.href="<?php echo url('index/grzx/comment'); ?>?id="+o_id
  }
</script>


  </ul>
   <!--分页-->
   <div class="paging" style="text-align:right">
    <a>第一页</a>
    <a class="active">2</a>
    <a>3</a>
    <a>...</a>
    <a>89</a>
    <a>最后一页</a>
   </div>
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