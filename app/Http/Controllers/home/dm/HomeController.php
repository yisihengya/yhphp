<?php

namespace App\Http\Controllers\home\dm;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    //前台页面控制器
    //个人中心 - 地址管理  member_addr
    public function member_addr()
    {
        return view('home/member_addr');
    }

    //个人中心 - 上传头像 member_avatar
    public function member_avatar()
    {
        return view('home/member_avatar');
    }

    //个人中心 - 我的收藏 member_collect
    public function member_collect()
    {
        return view('home/member_collect');
    }

    //个人中心 - 首页  member_index
    public function member_index()
    {
        return view('home/member_index');
    }

    //个人中心 - 修改资料 member_info
    public function member_info()
    {
        return view('home/member_info');
    }

    //个人中心 - 订单中心 member_order
    public function member_order()
    {
        return view('home/member_order');
    }

    //个人中心 - 订单详情 member_order_detail
    public function member_order_detail()
    {
        return view('home/member_order_detail');
    }

    //求婚钻戒领导品牌 member_pwd
    public function member_pwd()
    {
        return view('home/member_pwd');
    }

    //新闻详情 news_detail
    public function news_detail()
    {
        return view('home/news_detail');
    }

    //常见问题 question
    public function question()
    {
        return view('home/question');
    }

    //求婚钻戒领导品牌 tag
    public function tag()
    {
        return view('home/tag');
    }

    //会员注册  reg
    public function reg(Request $request)
    {

        //手机注册
      if ($request->isMethod('post')) {
          //接收传过来的值写入数据库  账号  和密码
          //$input=$request->except('_token','mobile_code','mobile_check');
          $input = $request->except('_token');
          $data = $request->except('_token', 'mobile_code', 'mobile_check','pwd_confirm');
          //dd($data);
          //dd($input);
          //pwd_confirm
          //验证规则
          $rule = [
              'mobile' => 'required|between:11,11|unique:user_reg',
              'pwd' => 'required|between:6,20|confirmed',

          ];
          $mess = [
              'mobile.required' => '手机号不能为空',
              'mobile.between' => '请输入正确的手机号格式',
              'mobile.unique' => '该手机号以注册',
              'pwd.required' => '密码不能为空',
              'pwd.between' => '密码6到20位之间',
              'pwd.confirmed'=>'确认密码与密码不一致'
          ];
          //Validator这个类里有一个make（）方法，参数分别为获取的元素值，规则，自定义错误提示信息
          $validator = Validator::make($input, $rule, $mess);
          //dd($validator->errors()->all());
          //dd($validator); //|confirmed
          //判断是否有错误 成功就写入数据库
          if ($validator->passes()) {
              //手机号正则
//              $tel=$input['moblie'];
//              $pas='/^1[3|5|6|7|8|9]\d{9}$/';
//               $bool=preg_match($pas,$tel);
              $data['pwd'] = md5($data['pwd']);

              $id = DB::table('user_reg')->insert($data);


              if ($id) {
                  success('注册成功', url('home/reg'));
              } else {
                  error('注册失败');
              }


          } else {
              return back()->withErrors($validator)->withInput();
          }

      }else{
          return view('home/reg');
      }

    }
}
