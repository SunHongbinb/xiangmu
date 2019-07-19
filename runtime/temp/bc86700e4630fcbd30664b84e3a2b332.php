<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\shopcar\index.html";i:1563356148;}*/ ?>
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




<?php foreach($ar as $value): ?>
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
   <td class="center"><a href="<?php echo url('index/detail/index'); ?>?id=<?php echo $v['gid']; ?>"><img src="/static/uploads/goods/<?php echo $v['picname']; ?>" style="width:50px;height:50px;"/></a></td>
   <td><a href="/static/index/product.html"><?php echo $v['name']; ?></a></td>
   <td>
    <p>颜色：<?php echo $v['color']; ?></p>

    <p>规格：<?php echo $v['size']; ?></p>
   </td>
   <td class="center"><span class="rmb_icon" id='price' value="<?php echo $v['price']; ?>"><?php echo $v['price']; ?></span></td>
   <td class="center">
    <input type="button" value="-" onclick="lbtn($(this))" class="jj_btn" />
    <input type="text" name="num" value="<?php echo $v['num']; ?>" max="<?php echo $v['store']; ?>" class="number" readonly/>
    <input type="button" value="+" onclick="rbtn($(this))" class="jj_btn"/>
   </td>
   <td class="center"><strong class="price" class="rmb_icon"><?php echo $v['price']*$v['num']; ?></strong></td>
   <td class="center"><a href="<?php echo url('index/shopcar/del'); ?>?id=<?php echo $v['id']; ?>">删除</a></td>
  </tr>
<?php endforeach; ?>



 </table>
 <div class="order_btm_btn">
  <a href="<?php echo url('index/index/index'); ?>" class="link_btn_01 buy_btn"/>继续购买</a>
  <a class="link_btn_02 add_btn" id='jiesuan'/>共计金额<strong class="zong" class="rmb_icon">0.00</strong>立即结算</a>
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
      fun();
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
      fun();
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
        too=0;
        for (var i = 0; i < a.length; i++) {
          if(a[i].checked==true){
            // alert('111')
             sid.push(a[i].value)
             num.push(numb[i].value)
             id=sid.join(',')
             shu=num.join(',')
             // console.log(id)
             // console.log(shu)
             $('#jiesuan').attr('href',"<?php echo url('index/order/sel'); ?>?id="+id+"&num="+shu)
             too+=parseInt($('.price').eq(i).text())
             $('.zong').html(too)
             console.log(too)
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