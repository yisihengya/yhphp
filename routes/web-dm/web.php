<?php
Route::get('/', function () {
    return view('welcome');
});
//前台页面路由
//个人中心 - 地址管理 member_addr
Route::get('home/member_addr','home\dm\HomeController@member_addr');

//会员注册  reg
Route::any('home/reg','home\dm\HomeController@reg');

//个人中心 - 上传头像 member_avatar
Route::any('home/member_avatar','home\dm\HomeController@member_avatar');

//个人中心 - 我的收藏 member_collect
Route::any('home/member_collect','home\dm\HomeController@member_collect');

//个人中心 - 首页  member_index
Route::any('home/member_index','home\dm\HomeController@member_index');

//个人中心 - 修改资料 member_info
Route::any('home/member_info','home\dm\HomeController@member_info');

//个人中心 - 订单中心 member_order
Route::any('home/member_order','home\dm\HomeController@member_oeder');

//个人中心 - 订单详情 member_order_detail
Route::any('home/member_order_detail','home\dm\HomeController@member_order_detail');

//求婚钻戒领导品牌 member_pwd
Route::any('home/member_pwd','home\dm\HomeController@member_pwd');

//新闻详情 news_detail
Route::any('home/news_detail','home\dm\HomeController@news_detail');

//常见问题 question
Route::any('home/question','home\dm\HomeController@question');

//求婚钻戒领导品牌 tag
Route::any('home/tag','home\dm\HomeController@tag');



//后台页面路由
Route::any('admin/add_article','admin\dm\AdminController@add_article');