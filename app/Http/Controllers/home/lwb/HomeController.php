<?php

namespace App\Http\Controllers\home\lwb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //前台所有页面 控制器
    //主页index
    public function index(){
        //dd(1111);
        return view('home/index');
    }
    //注册页面 reg
    public function reg(){
        return view('home/reg');
    }
}