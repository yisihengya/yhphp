<?php
//写自己的路由文件 注意 不要重复


//前台导航栏路由
//品牌文化
Route::any('home/brand','home\why\HomeController@brand');

//Drray Ring 求婚钻戒
Route::any('home/member_addr','home\why\HomeController@member_addr');

//常见问题
Route::any('home/question','home\why\HomeController@question');

//Drray Ring 爱的礼物
Route::any('home/lists','home\why\HomeController@lists');

//最新活动 new
ROute::any('home/active','home\why\HomeController@active');

//购物车 cart
Route::any('home/cart','home\why\HomeController@cart');

//立即结算  cart_agreement
Route::any('home/cart_agreement','home\why\HomeController@cart_agreement');

//确认提交  cart_order
Route::any('home/cart_order','home\why\HomeController@cart_order');

//提交成功页面 cart_success
Route::any('home/cart_order_success','home\why\HomeController@cart_success');

//前台用户登陆路由 login
Route::any('home/login','home\why\HomeController@login');

//前台登陆忘记密码路由 forget
Route::any('home/forget','home\why\HomeController@forget');

//前台登陆验证码 code
Route::any('home/code','home\why\HomeController@code');



//后台会员管理显示
Route::any('admin/member_list','admin\why\adminController@member_list');
//后台会员删除
Route::any('admin/del','admin\why\adminController@del');

//后台广告列表显示
Route::any('admin/Advertising_list','admin\why\adminController@Advertising_list');

//后台广告列表删除
Route::any('admin/advertising_list','admin\why\adminController@advertising_list');

Route::any('admin/delete','admin\why\adminController@delete');





