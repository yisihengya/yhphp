<?php

namespace App\Http\Controllers\home\why;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //导航栏方法
    //品牌文化
    public function brand()
    {
        return view('home/brand');
    }

    //求婚钻戒领导品牌
    public function member_addr()
    {
        return view('home/member_addr');
    }

    //常见问题
    public function question()
    {
        return view('home/question');
    }

    //爱的礼物
    public function lists()
    {
        return view('home/lists');
    }

    //最新活动
    public function active()
    {
        return view('home/active');
    }

    //购物车
    public function cart()
    {
        return view('home/cart');
    }

    //立即结算
    public function cart_agreement()
    {
        return view('home/cart_agreement');
    }

    //确定真爱
    public function cart_order()
    {
        return view('home/cart_order');
    }

    //提交订单成功
    public function cart_success()
    {
        return view('home/cart_order_success');
    }


    //前台登陆页面方法 login
    public function login(Request $request)
    {
        //首先判断是不是通过POST方式接收的数据
        if ($request->isMethod('post')) {
            //它的职责是保护用户的用户名及密码多次提交，以防密码泄露。
            $in=$request->except('_token','forward');
            //循环变化接收到的数据
            foreach ($in as $v){
                $email =  $v['email'];
                $pass =  $v['password'];
                //获取数据库的值 并进行对比
                $data = DB::table('user_reg')->whereRaw('mobile=? and pwd=?',[$email,$pass])->get()->toArray();
                if(!empty($data)){
                   success('登陆成功',url('home/index'));
                }else{
                    error('密码或账号错误！');
                }
            }
        }else {
            return view('home/login');
        }
    }


    //忘记密码的路由 forget
    public function forget()
    {
        return view('home/forget');
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


}
