<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\address\index.html";i:1563355286;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>我的地址-用户中心</title>
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
      <a href="<?php echo url('index/index'); ?>"><h1><img src="/static/index/images/logo.png"/></h1></a>
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

<script>
    $(function(){
        //省和直辖市的添加
        $.post("<?php echo url('address/shuju'); ?>", {upid: 0}, function(data) {
            for (var i = 0; i < data.length; i++) {
                var option=$("<option value="+data[i].id+">"+data[i].name+"</option>");
                $("select").append(option);
            }
        },"json");

        va='';
        $("select").live('change',function(event) {

          va+=$(this).val()+'@';
            //去掉旧的选项
            $(this).nextAll("select").remove();
            //获取当前省的值
            var val=$(this).val();
            var ob=$(this);
            $.post("<?php echo url('address/shuju'); ?>", {upid: val}, function(data) {
                /*optional stuff to do after success */
                //判断请求的数据是否为空
                if (data.length>0) {
                var select=$("<select class='select' name='bb'><option>--请选择--</option></select>");
                ob.after(select);
                for (var i = 0; i < data.length; i++) {
                var option=$("<option value="+data[i].id+">"+data[i].name+"</option>");
                select.append(option);
                }

            }
            $('#ad').val(va);
            // alert(va);
            },'json');
        });

    });
    </script>

    <script>
          function sub($this){
             // console.log($this.serialize());
             data=$this.serialize();
             // alert(data);
            $.ajax({
              type:'post'
              ,url:"<?php echo url('index/address/add'); ?>"
              ,async:true
              ,data:data
              ,dataType:"text"
              ,success:function(data){
                // console.log(data)
                alert('添加成功')
                location.href="<?php echo url('address/index'); ?>";
              }
              ,error:function(data){
                    // location.href='index.html'
                    alert(data)
              }
            })
          };
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
   <strong>我的地址列表</strong>
  </div>
  <table class="order_table">


  <form id=login onsubmit='sub($(this))' action='javascript:;'>
    <input type="hidden" name='add' id='ad'>
     <tr>
      <td width="100" align="right">收件人：</td>
      <td><input type="text" name="name" placeholder="输入收件人姓名" class="textbox"/ required></td>
     </tr>
     <tr>
      <td width="100" align="right">联系电话：</td>
      <td><input type="text" name="phone" placeholder="收件人手机号码" class="textbox"/ required></td>
     </tr>
     <tr>
      <td width="100" align="right">收件地址：</td>
      <td>
       <select class="select" name="aa" value="">
        <option>选择省份</option>
       </select>
      </td>
     </tr>
     <tr>
      <td width="100" align="right">详细地址：</td>
      <td><input type="text" name="address" placeholder="街道门牌号" class="textbox textbox_295"/ required></td>
     </tr>
     <tr>
      <td width="100" align="right"></td>
      <td><input type="submit" value="更新保存" class="group_btn"/></td>
     </tr>
  </form>


  </table>


  <table class="order_table address_tbl">

   <tr>
    <th width="140">收件人</th>
    <th width="140">联系电话</th>
    <th>收件地址</th>
    <th width="240">操作</th>
   </tr>
   <?php foreach($arr as $val): ?>
   <tr>
    <td style="padding-left:50px;"><?php echo $val['name']; ?></td>
    <td style="padding-left:35px;"><?php echo $val['phone']; ?></td>
    <td style="padding-left:150px;">
     <address>
      <?php echo $val['address']; ?>
     </address>
    </td>
    <td style="padding-left:50px;">
     <!-- <label><input type="radio" name="moren"/>设为默认地址</label> -->
     <a href="<?php echo url('index/address/edit'); ?>?id=<?php echo $val['id']; ?>"><input type="button" value="编辑" class="btn"/></a>
     <a href="" onclick="bu($(this),<?php echo $val['id']; ?>)"><input type="button" value="删除" class="btn"/></a>
     <!-- <?php echo url('index/address/del'); ?>?id=<?php echo $val['id']; ?> -->
    </td>
   </tr>
  <?php endforeach; ?>
  <script>
    function bu($this,$id){
      var r=confirm('是否删除')
      if (r==true){
        // location.href='address/del?'+$id
        $.get("<?php echo url('address/del'); ?>",{id:$id},function(data){
          if (data==false) {
            alert('删除失败');
          }else{
            $this.parents('tr').remove();
          }

          // alert(data);
        })
      }else{

      }
    }
  </script>
  </table>
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