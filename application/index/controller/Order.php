<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
session_start();
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/extend/alipay/pagepay/service/AlipayTradeService.php';
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/extend/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';
class Order extends Controller
{

  public $config = array (
    //应用ID,您的APPID。
    'app_id' => "2016101100659519",

    //商户私钥
    'merchant_private_key' => "MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQC7+HCQIG+8a3EHa8F85TordgksEdcFuPduCV7gKFdDS1Hv+myvJYeU1p/yfjQagn7jDL1sSkirMbwMzfjq67ADAnaoZcizeXefQH98XTmlsbodqfijXFpXAbhcTOv5GiyjCMK8jDirltsdD+7tuHen2MV96nMNoG9p4vSanuSvnytqVj1megDJqb5f5ovi0BbjxJDyk9b8NuJvlN5auiNiJrxSoeUOiNaHvRrk1fF/ijaDDdar1J78KplAf53gAukGnzETsbk6Cpg4nqA7fVHqJZupAHAtQBIeg2ox0RRIAyAo3/ZEd7msu6qVhuP5TfpACE/pybRRP7gFDCW2q0NzAgMBAAECggEBALvlWWfI9MiNQfwgC9b0MNSW9g42exE+Vx+IgG1kBe6/0NUpKBFgW4o9jL9SxnSlc381Efi4vLFcUtUd46+5D0XC5afprtkxF5F6YLWJXwGxihDzAhcSTz/f+VFSlyN3tZz3OepN5KwpbTg84CKDHiELQEdg38eEUzquYsJZCNI/e5vubnwcTrB9t74Uz3li1gS5W6PvaFVrR9U1LOffAZVyGTQ8WuaqHoV9EGjJHTvYPk3DjIpD/biIMhEqfywcth7IvG681hJKSrH6tQb12ATlU0FlpRsG9I3VWi6qbCxMzJGTv3pU64ECcwxRRI51xY5e2QGPGn0Kh8beRjlShBkCgYEA5ZQWGwaciulkyjwwM84u2eozamxmFdM5G2QGeIpitkvAFdIiL3lswO6xE7iJnc+UN3Lox9DRlI3j1tBkkJnTVJWoEvp4tlRCtzECxpQvgDZng1Pc07OG+WTl815RyUQzFKtCQhyKWZSLyWybVg2VvnCBKIA8YAcqmQy2zGa1Z58CgYEA0Zp8QdRlDFEpkjtaGYRS1enxP4tUNaWKU4TJOnIPTpb4hhkACvpt9WhLrn3JwurdRYAEIVYAhTK+B3x8sni1oUy5uOLdbyU5tikmuTV31NNO1VDfS00frilree3IQU0kO9f2Nb6ArqTtq6LtJzP19dKNC5xuMDNp424ezOSmo60CgYAP7aVW/K9xx92xVlm1znFbty8YDCtNClmk99ynElrk8P6DxQ+QIamU/TqV9rC9nUBYVIWoD2nrF6keJ1lC2xlZfgSqRGyJofD7CtB5fKCLEbs+1lu06HjN5t05dGrSPwQYRAWV1qsWqgLE198zKkAgdWfQqo0F0Jl5AvPP3LRrWwKBgQCS6VP0lBkrU+vuWflh7zRcSPfWESM54sicl3Kvq2h9LiYNX5J/H15Y5vw81l/HZfUnlH3Qm8YLljBJcQC52w97ehqmsyR/lbjoq9k/cXGHU4Bq1Z9c2Ta+TLvPH1IAK0CdTVZ9/wOU5XbMmYrdsnbQEP7ZR5CX6kFqrjGabR07lQKBgQDVwI3agmVc7i5NfsRDcP69pxGe6zX7HKwrA+15v7arJlHezQcsZU5L0n10I59qBIZs67zJvHUMrZPlv9jIj52QG92eM5p2RBh4kbBu+aEzS8cIfMI5FIGckN6i3i9VHZKTSG/GgtdN2/3BxXno7r0laLyO0qOJbbEOk0TS2bWwDg==",

    //异步通知地址
    'notify_url' => "http://www.erqi.com/index/order/notify_url",

    //同步跳转
    'return_url' => "http://www.erqi.com/index/order/return_url",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAo5KO701l2r+4j72dL1UEfV7GWLSeo3ot3mrkGsDk7i1PF/3vzpGxla3mruXPfVd1dSwk7n6wiaJo7oT9+GHNpwY2LnpMlvLRb+Z9QaYWqpbnycZX+dcCx9+ji4qo8yzMh/glPENuaJa8IRWIWOUhGjqLv8/rUYVwhQAiqc3OzjcDFSpNS7AdvqzDrVIhmTw76YMh0CNQS/cb32QSUWT3HvI+fioxdIWoy/pSWaaRxOk9GDhCdyQ7nSQ7UB+4SRduF2BndkYE6pOux/Kq70xSSrCJZkaBiLiTsV7EJcfCKrRErWgSa2D0OdPitjz2sf1Qgy0Jo595VEN/ttAacOWMEwIDAQAB",
  );




  public function index(){
    //view不需要继承
    // return view();
    // $this->fetch需要继承
    $id=$_SESSION['think']['user']['id'];
    $res=Db::table('orders')->where('uid',$id)->select();
    // dump($res);

      for ($i=0; $i < count($res); $i++) {
        $state=$res[$i]['state'];
        $id=$res[$i]['id'];
        $num=explode(",",$res[$i]['num']);
        $color=explode(",",$res[$i]['color']);
        $total=explode(",",$res[$i]['total']);
        $size=explode(",",$res[$i]['size']);
        $sname=explode(",",$res[$i]['sname']);
        $price=explode(",",$res[$i]['price']);
        $gid=explode(",",$res[$i]['gid']);
        $picname=explode(",",$res[$i]['picname']);
        for ($j=0; $j <count($num) ; $j++) {
          $arr[$i]['state']=$state;
          $arr[$i]['id']=$id;
          $arr[$i]['length']=count($num);
          $arr[$i][$j]=array('num'=>$num[$j],'color'=>$color[$j],'total'=>$total[$j],'size'=>$size[$j],'sname'=>$sname[$j],'price'=>$price[$j],'gid'=>$gid[$j],'picname'=>$picname[$j]);
        }
      }
        $snum=Db::table('shopcar')->where('uid',$_SESSION['think']['user']['id'])->select();
        $shopnum=count($snum);

        //类别
        $ss=db('type')->where('pid',0)->select();
        foreach($ss as $k => $v){
          $ss[$k]['zi']=db('type')->where('pid',$v['id'])->select();
        }
      // dump($arr);

    return view('',['order'=>$arr,'shopnum'=>$shopnum,'ss'=>$ss]);


  }




  public function sel(){
    $a=input('get.id');
    $b=input('get.num');
    $sid=explode(',',$a);
    $numb=explode(',',$b);
    // dump($sid);
    //获取用户id
    $uid=$_SESSION['think']['user']['id'];
    //生成订单号
    $order_id=date("ymdHis").str_pad($uid, 6,"0",STR_PAD_LEFT);
    $time=date('Y-m-d H:i:s',time());
    // echo $order_id;
      $price=[];
      $num=[];
      $gid=[];
      $total=[];
      $sname=[];
      $color=[];
      $size=[];
      $picname=[];


      for ($i=0; $i < count($sid) ; $i++) {
      //根据sid查询
      $res=Db::table('shopcar')->where('id',$sid[$i])->select();
      $price[] = $res[0]['price'];
      $num[]=$numb[$i];
      $gid[]=$res[0]['gid'];
      $total[]=$res[0]['price']*$num[$i];
      $sname[]=$res[0]['name'];
      $color[]=$res[0]['color'];
      $size[]=$res[0]['size'];
      $picname[]=$res[0]['picname'];
      // dump($gid);
      //删除购物车中的东西
      $del=Db::table('shopcar')->where('id',$sid[$i])->delete();
    }
      $price=implode(',',$price);
      $num=implode(',',$num);
      $gid=implode(',',$gid);
      $total=implode(',',$total);
      $sname=implode(',',$sname);
      $color=implode(',',$color);
      $size=implode(',',$size);
      $picname=implode(',',$picname);
      // dump($total);
      $data=[
        'id'=>$order_id,
        'uid'=>$uid,
        'addtime'=>$time,
        'state'=>0,

        'price'=>$price,
        'num'=>$num,
        'gid'=>$gid,
        'total'=>$total,

        'sname'=>$sname,
        'color'=>$color,
        'size'=>$size,
        'picname'=>$picname
             ];
      $res1=Db::name('orders')->insert($data);





    // 重定向
    $this->redirect('order_confirm',['id'=>$order_id]);


  }


public function fukuan(){
   $order_id=input("get.oid");
   $this->redirect('order_confirm',['id'=>$order_id]);
}







  public function receipt(){
    $oid=input('post.id');
    $res=Db::table('orders')->where('id',$oid)->update(['state'=>3]);
    return $res;
    // Db::table('order')-
  }







public function order_confirm($orderid=''){
    //地址
    $uid=$_SESSION['think']['user']['id'];
    $add=Db::table('address')->where('uid',$uid)->select();

    //总价
    $ord=Db::table('orders')->where('id',input('id'))->select();
    // dump($ord);
    $arr=[];
    $oid=(explode(',',$ord[0]['id']));
    $name=(explode(',',$ord[0]['sname']));
    $color=(explode(',',$ord[0]['color']));
    $size=(explode(',',$ord[0]['size']));
    $price=(explode(',',$ord[0]['price']));
    $num=(explode(',',$ord[0]['num']));
    $total=(explode(',',$ord[0]['total']));
    $picname=(explode(',',$ord[0]['picname']));
    $arr['id']=$oid;
    $arr['name']=$name;
    $arr['color']=$color;
    $arr['size']=$size;
    $arr['price']=$price;
    $arr['num']=$num;
    $arr['total']=$total;
    $arr['picname']=$picname;
    // dump($arr);
    $a=array();
    foreach ($arr as $k => $val) {
      for ($i=0; $i <count($val) ; $i++) {
        $a[$i][$k]=$val[$i];
      }
    }
     // dump($a);

    $too=0;
    for ($i=0; $i <count($a) ; $i++) {
      $too+=$a[$i]['total'];
    }
    $snum=Db::table('shopcar')->where('uid',$uid)->select();
    $shopnum=count($snum);
    // dump($too);
    $ss=db('type')->where('pid',0)->select();
    foreach($ss as $k => $v){
      $ss[$k]['zi']=db('type')->where('pid',$v['id'])->select();
    }
    return view('order_confirm',['arr'=>$a,'addre'=>$add,'too'=>$too,'shopnum'=>$shopnum,'ss'=>$ss]);

  }


// public function qwe(){
//     $a=input('post.');
//     dump($a);
//   }










    public function succ(){
        // dump(input('get.id'));
        $id=input('get.id');
        $res=Db::table('orders')->where('id',$id)->find();
        $too=explode(',',$res['total']);
        $total=0;
        for ($i=0; $i <count($too) ; $i++) {
          $total+=$too[$i];
        }
        $num=explode(',',$res['num']);
        $gid=explode(',',$res['gid']);
        $uid=$_SESSION['think']['user']['id'];
        $snum=Db::table('shopcar')->where('uid',$uid)->select();
        $shopnum=count($snum);
        // dump($gid);
        $arr=db('type')->where('pid',0)->select();
        foreach($arr as $k => $v){
          $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
        }
        return view('succ',['arr'=>$res,'total'=>$total,'shopnum'=>$shopnum,'ar'=>$arr]);
    }





    public function paypage(){
        $ordid=input('post.WIDout_trade_no');
        $addid=input('post.address');
        $mass=Db::table('address')->where('id',$addid)->find();
        $name=$mass['name'];
        $phone=$mass['phone'];
        $address=$mass['address'];
        // $data=['lxren'=>$name,'address'=>$address,'phone'=>$phone];
        Db::table('orders')->where('id',$ordid)->update(['lxren'=>$name,'address'=>$address,'phone'=>$phone]);






          //商户订单号，商户网站订单系统中唯一订单号，必填
          $out_trade_no = trim($_POST['WIDout_trade_no']);

          //订单名称，必填
          $subject = trim($_POST['WIDsubject']);

          //付款金额，必填
          $total_amount = trim($_POST['WIDtotal_amount']);

          //商品描述，可空
          $body = trim($_POST['WIDbody']);

        //构造参数
        $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);

        $aop = new \AlipayTradeService($this->config);

        /**
         * pagePay 电脑网站支付请求
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
        */
        $response = $aop->pagePay($payRequestBuilder,$this->config['return_url'],$this->config['notify_url']);

        //输出表单
        var_dump($response);
    }

  public function notify_url(){
       $arr=$_POST;
       $alipaySevice = new \AlipayTradeService($this->config);
       $alipaySevice->writeLog(var_export($_POST,true));
       $result = $alipaySevice->check($arr);

       /* 实际验证过程建议商户添加以下校验。
       1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
       2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
       3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
       4、验证app_id是否为该商户本身。
       */
       if($result) {//验证成功
           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
           //请在这里加上商户的业务逻辑程序代


           //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

           //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

           //商户订单号

           $out_trade_no = $_POST['out_trade_no'];

           //支付宝交易号

           $trade_no = $_POST['trade_no'];

           //交易状态
           $trade_status = $_POST['trade_status'];


           if($_POST['trade_status'] == 'TRADE_FINISHED') {

               //判断该笔订单是否在商户网站中已经做过处理
               //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
               //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
               //如果有做过处理，不执行商户的业务程序

               //注意：
               //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
           }
           else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
               //判断该笔订单是否在商户网站中已经做过处理
               //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
               //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
               //如果有做过处理，不执行商户的业务程序
               //注意：
               //付款完成后，支付宝系统发送该交易状态通知
           }
           //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
           echo "success";    //请不要修改或删除

       }else {
           //验证失败
           echo "fail";

       }
   }

   public function return_url(){
       $arr=$_GET;
       $alipaySevice = new \AlipayTradeService($this->config);
       $result = $alipaySevice->check($arr);
       if($result) {//验证成功
           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
           //请在这里加上商户的业务逻辑程序代码

           //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
           //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

           //商户订单号
           $out_trade_no = htmlspecialchars($_GET['out_trade_no']);

           //支付宝交易号
           $trade_no = htmlspecialchars($_GET['trade_no']);

           //将订单表中的支付状态更改为已支付，并将支付宝交易号写入数据表中***********
           Db::table('orders')->where('id',$out_trade_no)->update(['state'=>1]);


           //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



            //库存处理
            $res=Db::table('orders')->where('id',$out_trade_no)->find();
            // 拼接总价
            // $too=explode(',',$res['total']);
            // $total=0;
            // for ($i=0; $i <count($too) ; $i++) {
            //   $total+=$too[$i];
            // }
            $num=explode(',',$res['num']);
            $gid=explode(',',$res['gid']);
            // dump($num);
            $store=[];
            //现有库存
            for ($i=0; $i < count($gid); $i++) {
              $a=Db::table('goods')->where('id',$gid[$i])->value('store');
              $store[]=$a;
            }
            // dump($store);
            $restore=[];
            //循环得到库存
            for ($i=0; $i < count($store); $i++) {
              $restore[]=$store[$i]-$num[$i];
            }
            //增加库存
            // dump($restore);
            for($i=0; $i <  count($restore); $i++){
              Db::table('goods')->where('id',$gid[$i])->update(['store'=>$restore[$i]]);
            }


            //销量处理
            $res=Db::table('orders')->where('id',$out_trade_no)->find();
            $num=explode(',',$res['num']);
            // dump($num);
            $sales=[];
            //现有销量
            for ($i=0; $i < count($num); $i++) {
              $a=Db::table('goods')->where('id',$gid[$i])->value('sales');
              $sales[]=$a;
            }
            // dump($sales);
            $resales=[];
            //循环得到销量
            for ($i=0; $i < count($sales); $i++) {
              $resales[]=$sales[$i]+$num[$i];
            }
            //增加销量
            // dump($resales);
            for($i=0; $i <  count($resales); $i++){
              Db::table('goods')->where('id',$gid[$i])->update(['sales'=>$resales[$i]]);
            }










           $this->success('支付成功，跳转中...','/index/order/succ?id='.$out_trade_no);
       }
       else {
           //验证失败
           echo "验证失败";
       }
   }
}




 ?>