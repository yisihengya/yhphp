<?php

namespace App\Http\Controllers\admin\lwb;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    //后台登录
    public function login(Request $request){
        //如果提交
        if(request()->isMethod('post')) {

            $all = $request->only('uname','upwd','uimg');
            $rule=[
                'uname'=>'required',
                'upwd'=>'required',
                'uimg'=>'required',
            ];
            $message = [
                'uname.required'=>'*请先输入用户名',
                'upwd.required'=>'*请先输入密码',
                'uimg.required'=>'*请先输入验证码',
            ];

            //Validator这个类里有一个make（）方法，参数分别为获取的元素值，规则，自定义错误提示信息
            $validator = Validator::make($all,$rule,$message);
            //没有问题为true，有问题为false
            if($validator->passes()){
                //验证通过，表单内容均不为空，进入下一步判断

                //获取表单里填写的验证码,用户名，密码
                $code = $request->input('uimg');
                $user = $request->input('uname');
                $pass = $request->input('upwd');
                //判断获取的验证码和session里的是否相同
                if ($code == session('code')) {
                    $bool = DB::table('add_administrator')->where('user','=',$user)
                        ->where('pass','=',$pass)
                        ->get()
                        ->toArray();

                    if ($bool){
                        //将登录的用户名写入session
                        session_start();
                        $_SESSION['user'] = $user;
                        success('登录成功!',url('admin/shops_index'));
//                        echo '<script>alert("登录成功");location.href="shops_index"</script>';
//                        die;
                    }else{
                        echo '<script>alert("登录失败,账号或密码错误！");history.back();</script>';
                        die;
                    }
                }else{
                    echo '<script>alert("验证码输入有误");history.back();</script>';
                }

            }else{
                //withErrors()把错误信息带回到视图文件，视图页面会自动生成一个错误信息的对象$errors
                //withInput()如果不满足返回，保留用户上次输入的内容
                return back()->withErrors($validator)->withInput();
            }

        }else{
            return view('admin.login');
        }
    }

    //显示验证码
    public function code(){
        //实例化
        $builder = new CaptchaBuilder();

        //得到验证码
        $code = $builder->getPhrase();
        //将生成的验证码写入session
        session()->put('code',$code);
        //设置宽度高度
        $builder->build(100,30);
        //输出验证码
        $builder->output();
    }

    public function shops_index(){
        return view('admin.shops_index');
    }

    public function index(){
        return view('admin.index');
    }

    public function add_product(Request $request){
        return view('admin.add_product');
    }

    public function Brand_Manage(){
        return view('admin.Brand_Manage');
    }

    public function Add_Brand(){
        return view('admin.Add_Brand');
    }

    public function Brand_detailed(){
        return view('admin.Brand_detailed');
    }

    public function Products(){
        return view('admin.Products');
    }

    public function Columns(){
        return view('admin.Columns');
    }

    public function Order_form(){
        return view('admin.Order_form');
    }

    public function Order_detailed(){
        return view('admin.Order_detailed');
    }

    public function Refund(){
        return view('admin.Refund');
    }

    public function Refund_detailed(){
        return view('admin.Refund_detailed');
    }

    public function Order(){
        return view('admin.Order');
    }

    public function Brand_Manage2(){
        return view('admin.Brand_Manage');
    }

    public function Order_Logistics(){
        return view('admin.Order_Logistics');
    }

    public function Order_Chart(){
        return view('admin.Order_Chart');
    }

    public function payment_method(){
        return view('admin.payment_method');
    }

    public function Payment_details(){
        return view('admin.Payment_details');
    }

    public function Payment_Configure(){
        return view('admin.Payment_Configure');
    }

    public function system_columns(){
        return view('admin.system_columns');
    }

    public function form_builder(){
        return view('admin.form_builder');
    }

    public function system_info(){
        return view('admin.system_info');
    }

    public function rizhi_list(){
        return view('admin.rizhi_list');
    }

    public function Article_list(){
        return view('admin.Article_list');
    }

    public function add_Article(){
        return view('admin.add_Article');
    }

    public function admin_Competence(){
        return view('admin.admin_Competence');
    }

    public function add_Competence(){

        return view('admin.add_Competence');
    }

    //管理员设置(增加，显示管理员)
    public function administrator_list(Request $request){
        //获取数据库所有数据，显示到管理员设置页面
        $res = DB::table('add_administrator')->get();

        //管理员设置(增加管理员)
        if($request->isMethod('post')){
            //判断输入的两次密码是否相同
            $pass1 = $request->get('userpassword');
            $pass2 = $request->get('newpassword2');
            if($pass1==$pass2){
                $all = [];
                //获取表单填写数据,并且重命名
                $all['user'] = $request->input('user-name');
                $all['pass'] = $request->input('userpassword');
                $all['phone'] = $request->input('user-tel');
                $all['email'] = $request->input('email');
                $all['role'] = $request->input('admin-role');
                $all['remark']= $request->input('remark');

                //添加IP地址，加入时间到数组
                $all['ip'] = $request->ip();
                $all['addtime'] = time();
                //把数据加入数据库
                $bool = DB::table('add_administrator')->insert($all);
                if($bool){
                    return view('admin.administrator_list',['res'=>$res]);
                }
            }
        }
        return view('admin.administrator_list',['res'=>$res]);
    }

    //管理员设置(删除管理员)
    public function administrator_list_delete(Request $request){
        $id = $request->get('id');

        $bool = DB::table('add_administrator')->where('id',$id)->delete();
        $data = [];
        if($bool){
            $data['code'] = 0;
            $data['message'] = '删除成功';
        }else{
            $data['code'] = 1;
            $data['message'] = '删除失败';
        }
        return response()->json($data);
    }

    public function Personal_info(){

        return view('admin.Personal_info');
    }

    public function member_list(){
        return view('admin.member_list');
    }


    public function Advertising_sort(){
        return view('admin.Advertising_sort');
    }

    public function advert_detailed_left(){
        return view('admin.advert_detailed_left');
    }

    public function page_list(){
        return view('admin.page_list');
    }

    public function add_Singlepag(){
        return view('admin.add_Singlepag');
    }

    public function Columns2(){
        return view('admin.Columns');
    }

    public function feedback(){
        return view('admin.feedback');
    }




}
