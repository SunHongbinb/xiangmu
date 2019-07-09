<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
class Banner extends Base
{
  public function index()
    {
        $data = [];
        $where= [];
        $b = input('get.name');
        if (!empty($b)) {
            $data['name']=input('get.name');
            $where['name']=['like','%'.$data['name'].'%'] ;
        }
        $banner=db('banner')->where($where)->order('id desc')->paginate(5,false,['query'=>$data]);
        $arr=db('banner')->select();
        return view('',['banner'=>$banner,'length'=>count($arr)]);
    }
    public function delete($id)
    {
        $picname=db('banner')->where('id',$id)->value('picname');
        unlink("static/uploads/banner/$picname");
        $res=db('banner')->delete($id);
        return $res;
    }
    public function edit($id)
    {
        $arr=db('banner')->find($id);
        return view('',['arr'=>$arr]);
    }
    public function state($id,$state)
    {
        $res=db('banner')->where('id',$id)->update(['state'=>"$state"]);
        return $res;
        
    }
    public function add(){
        return view();
    }
    public function insert(Request $request){
        dump($arr=(input('post.')));
        $arr['addtime']=date('Y-m-d',time());
        $arr['state']='1';
        unset($arr['file']);
        dump($arr);
        $res=db('banner')->insert($arr);
        return $res;
    }
    public function upload(){
        $file=request()->file('file');
        $info=$file->rule('uniqid')->move(ROOT_PATH.'public'.DS.'static/uploads/banner');
        if($info){
            return json(['code'=>0,'msg'=>'上传成功','data'=>['src'=>'/static/admin/banner/'.$info->getFilename(),'title'=>$info->getFilename()]]);
        }else{
          // 上传失败的错误信息
          return json(['code'=>1,'msg'=>$info->getError(),'data'=>[]]);
        }
    }
    public function update(Request $request){
        $arr=(input('post.'));
        $list=db('banner')->find($arr['id']);
        if(empty($arr['picname'])){
            $arr['picname']=$list['picname'];
        }else{
            unlink("static/uploads/banner/".$list['picname']);
        }
        $res=db('banner')->update($arr);
        return $res;
    }
}