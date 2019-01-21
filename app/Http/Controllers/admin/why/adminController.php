<?php
namespace App\Http\Controllers\admin\why;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class adminController extends Controller
{
    //后台查询数据库的会员名称
    public function member_list(Request $request)
    {
        //判断用什么方法得到数据
        if($request->isMethod('post')){
            //获取用户的用户名
            $name=$request->get('uname');
            //判断用户名是否为空
            if ($name==null){
                //如果是空的就获得数据
                $sel = DB::table('dr_user')->get()->toArray();
            }else{
                //如果不是空 就进行 有条件的 查询 uid name email phone  满足其中一种就可以被查到
                $sel=DB::table('dr_user')->whereRaw('uname=? or name=? or email=? or phone=?',[$name,$name,$name,$name])->get();
            }
        }else{
            //根据uid获取数据值
            $sel = DB::table('dr_user')->get()->toArray();
        }
        //返回视图文件
        return view('admin/member_list', ['sel' => $sel]);
    }


    //后台 会员管理 删除会员
    public function del(Request $request)
    {
      //删除那一条 需要获取id
      $id=$request->get('id');
      //获取id后 根据条件删除id的内容
      $num=DB::table('dr_user')->where('uid',$id)->delete();
      //建立一个空数组
      $arr=[];
      //判断是否删除成功
      if ($num){
          //ajax的判断方法
          $arr['code']=0;
          $arr['mes']='删除成功';
       }else{
          $arr['code']=1;
          $arr['mes']='删除失败';
      }
      //输出 字符串转换为数组
      echo json_encode($arr);
    }



    //广告列表查询
    public function Advertising_list(Request $request)
    {
        //根据uid获取数据值
            $dd=DB::table('adverting_list')->get()->toArray();
            //返回视图文件
            return view('admin/Advertising_list', ['dd' => $dd]);
    }



    //后台广告列表删除
    public function delete(Request $request)
    {
        //如果是的话 获取里面的id
        $get=$request->get('id');
        //获取到内容后 进行删除
        $del=DB::table('adverting_list')->where('id',$get)->delete();
        //建立一个空数组
        $num1=[];
        if($del){
            //用ajax方法判断
            $num1['code']=0;
            $num1['mess']='Success';
        }else{
            $num1['code']=1;
            $num1['mess']='删除失败';
        }
        //输出 字符串转换为数组
        echo  json_encode($num1);
    }
}


