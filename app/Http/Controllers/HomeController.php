<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    //前台所有页面 控制器
    //主页index
    public function index(){
        return view('home/index');
    }
    //登录界面 login
    public function login(){
        return view('home/login');
    }
    //注册页面 reg
    public function reg(){
        return view('home/reg');
    }


}
