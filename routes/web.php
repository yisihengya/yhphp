<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//李文博的路由文件
include_once "web-lwb/web.php";

//杜满的路由文件
include_once "web-dm/web.php";

//汪海洋的路由文件
include_once "web-why/web.php";

//易思恒的路由文件
include_once "web-ysh/web.php";