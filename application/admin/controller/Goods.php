<?php
    namespace app\admin\controller;
    use think\Controller;
    use think\Request;
    class Goods extends Base
    {
        public function index(){
            $data = [];
            $where= [];
            $b = input('get.name');
            if (!empty($b)) {
                $data['name']=input('get.name');
                $where['name']=['like','%'.$data['name'].'%'] ;
            }
            $goods=db('goods')->where($where)->order('id desc')->paginate(5,false,['query'=>$data]);
            $res=db('goods')->where('store',0)->update(['state'=>"0"]);
            $arr=db('goods')->select();
            return view('',['data'=>$goods,'length'=>count($arr)]);
        }
        public function state($id,$state)
        {
            $res=db('goods')->where('id',$id)->update(['state'=>"$state"]);
            return $res;  
        }
        public function add(){
            $type=db('type')->select();
            return view('',['type'=>$type]);
        }

        public function insert(Request $request)
        {
            $arr=input('post.');
            dump($arr);
            $size=implode(",",$arr['size']);
            $color=implode(",",$arr['color']);
            $arr['size']=$size;
            $arr['color']=$color;
            $arr['addtime']=date("Y-m-d",time());
            $res=db('goods')->insert($arr);
            return $res;
        }

        public function edit($id)
        {
            $arr=db('goods')->find($id);
            $size=explode(",",$arr['size']);
            $sl=count($size);
            $color=explode(",",$arr['color']);
            $cl=count($color);
            $picname=explode(",",$arr['picname']);
            $pl=count($picname);
            return view('',['arr'=>$arr,'color'=>$color,'picname'=>$picname,'cl'=>"$cl",'pl'=>"$pl",'sl'=>"$sl",'size'=>$size]);
        }
        public function delete($id)
        {
            $list=db('goods')->find($id);
            $pic=explode(",",$list['picname']);
            for($i=0;$i<count($pic);$i++){
                unlink("static/uploads/goods/".$pic[$i]);
            }
            $res=db('goods')->delete($id);
            return $res;
        }
        public function update()
        {
            $arr=input('post.');   
            $list=db('goods')->find($arr['id']);
            if(empty($arr['picname'])){
                $arr['picname']=$list['picname'];
            }else{
                $picname=explode(",",$list['picname']);
                for($i=1;$i>count($picname);$i++){
                    unlink("static/uploads/goods/".$picname[$i]);  
                }
            }
            $res=db('goods')->update($arr);
            return $res;
            
        }
        // 指定文件上传的方法
        public function upload(){
            $file = request()->file('file');
            $info = $file->rule('uniqid')->move(ROOT_PATH . 'public' . DS . 'static/uploads/goods');
            if($info){
                //返回json格式
                return json(['code'=>0,'msg'=>'','data'=>['src'=>'/static/uploads/goods/'.$info->getFilename(),'title'=>$info->getFilename()]]);
            }else{
                // 上传失败获取错误信息
                return json(['code'=>1,'msg'=>$file->getError(),'data'=>[]]);
            }

        }
    }
