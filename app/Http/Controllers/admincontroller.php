<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
        public function login(){
        return view('admin.login');
    }
    public function shops_index(){
        return view('admin.shops_index');
    }
}
