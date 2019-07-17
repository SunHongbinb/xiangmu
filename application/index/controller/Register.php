<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
session_start();
class Register extends Controller
{
  public function index(){
    if($_SESSION==null){
      // return view();
      // dump($_SESSION);
      $arr=db('type')->where('pid',0)->select();
      foreach($arr as $k => $v){
        $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
      }
      return view('',['arr'=>$arr]);
    }else{
      $uid=$_SESSION['think']['user']['id'];
      $snum=Db::table('shopcar')->where('uid',$uid)->select();
      $shopnum=count($snum);
      $arr=db('type')->where('pid',0)->select();
      foreach($arr as $k => $v){
        $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
      }
      return view('',['shopnum'=>$shopnum,'arr'=>$arr]);
    }

  }

  public function add(){
    $arr=input('post.');
    $user=db('user')->where('username',$arr['phone'])->find();
    $data=['name'=>$arr['name'],'username'=>$arr['phone'],'pass'=>$arr['pass'],'phone'=>$arr['phone'],'state'=>1];
    $val=input("post.code");
    // dump($val);
    // 验证校验码是否正确
    if($val==session("code")){
    //判断账号是否存在
      if ($user==null) {
      //判断两个密码是否一致
      if ($arr['pass']!=$arr['pass1']) {
                return json(['code'=>'1','info'=>"两次密码不一致"]);
            }else{


              Db::name('user')->insert($data);
              return json(['code'=>'2','info'=>"注册成功"]);

            }
          }else{
            return json(['code'=>'0','info'=>"账号已注册"]);
          }
          return json($arr);
    }else{
      return json(['code'=>'3','info'=>"验证码错误"]);
    }

  }


  public function find_pwd(){
    $arr=input('post.');
    $user=db('user')->where('username',$arr['phone'])->find();
    $val=input("post.code");
    if($user==null){
      return json(['code'=>'1','info'=>"该手机号未注册"]);
    }else{
      if($val==session("code")){
        if ($arr['pass']==$arr['pass1']){
          Db::table('user')->where('username',$arr['phone'])->update(['pass'=>$arr['pass']]);
          return json(['code'=>'0','info'=>"修改成功"]);
        }else{
          return json(['code'=>'2','info'=>"两次密码不一致"]);
        }
      }else{
        return json(['code'=>'3','info'=>"验证码错误"]);
      }
    }
  }





    /**
   * 请求接口返回内容
   * @param  string $url [请求的URL地址]
   * @param  string $params [请求的参数]
   * @param  int $ipost [是否采用POST形式]
   * @return  string
   */
  public function juhecurl($url,$params=false,$ispost=0){
      $httpInfo = array();
      $ch = curl_init();
      curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
      curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
      curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
      curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
      curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
      if( $ispost )
      {
          curl_setopt( $ch , CURLOPT_POST , true );
          curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
          curl_setopt( $ch , CURLOPT_URL , $url );
      }
      else
      {
          if($params){
              curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
          }else{
              curl_setopt( $ch , CURLOPT_URL , $url);
          }
      }
      $response = curl_exec( $ch );
      if ($response === FALSE) {
          //echo "cURL Error: " . curl_error($ch);
          return false;
      }
      $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
      $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
      curl_close( $ch );
      return $response;
  }

  //生成随机验证码
  public function getStr(){
    $string="0123456789";
    $str='';
    for ($i=0; $i < 6; $i++) {
      $str.=$string[rand(0,strlen($string)-1)];
    }
    return $str;
  }




  public function sendSms(){
    //接收手机号
    $phone=input('post.phone');
    $code=$this->getStr();
    $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL

    $smsConf = array(
        'key'   => '2ed2e1c608fa77a3e18686d3d61fdb59', //您申请的APPKEY
        'mobile'    => $phone, //接受短信的用户手机号码
        'tpl_id'    => '173291', //您申请的短信模板ID，根据实际情况修改
        'tpl_value' =>"#code#={$code}" //您设置的模板变量，根据实际情况修改
    );

    $content = $this->juhecurl($sendUrl,$smsConf,1); //请求发送短信

    if($content){
        $result = json_decode($content,true);
        $error_code = $result['error_code'];
        if($error_code == 0){
            //状态为0，说明短信发送成功
            // echo "短信发送成功,短信ID：".$result['result']['sid'];
            session("code",$code);
            return 1;
        }else{
            //状态非0，说明失败
            $msg = $result['reason'];
            return "短信发送失败(".$error_code.")：".$msg;
        }
    }else{
        //返回内容异常，以下可根据业务逻辑自行修改
        echo "请求发送短信失败";
    }
  }



public function find(){
  if($_SESSION==null){
      // return view();
      // dump($_SESSION);
      $arr=db('type')->where('pid',0)->select();
      foreach($arr as $k => $v){
        $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
      }
      return view('find',['arr'=>$arr]);
    }else{
      $uid=$_SESSION['think']['user']['id'];
      $snum=Db::table('shopcar')->where('uid',$uid)->select();
      $shopnum=count($snum);
      $arr=db('type')->where('pid',0)->select();
      foreach($arr as $k => $v){
        $arr[$k]['zi']=db('type')->where('pid',$v['id'])->select();
      }
      return view('find',['shopnum'=>$shopnum,'arr'=>$arr]);
    }

}





}




 ?>