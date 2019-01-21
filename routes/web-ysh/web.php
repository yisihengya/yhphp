<?php

//写自己的路由文件 注意 不要重复


//添加商品add_product
Route::any('admin/add_product','admin\ysh\adminController@add_product');
//删除商品路由 goods_del
Route::any('admin/goods_del','admin\ysh\adminController@goods_del');
//删除商品路由 add_product_edit
Route::any('admin/add_product_edit','admin\ysh\adminController@add_product_edit');

//添加商品分类 Add_Brand
Route::any('admin/Add_Brand','admin\ysh\adminController@Add_Brand');

//删除商品分类路由 category_del
Route::any('admin/category_del','admin\ysh\adminController@category_del');

//修改商品分类路由 Add_Brand_edit
Route::any('admin/Add_Brand_edit','admin\ysh\adminController@Add_Brand_edit');
//分类管理路由 Brand_Manage
Route::any('admin/Brand_Manage','admin\ysh\adminController@Brand_Manage');
//商品列表查看路由 Products
Route::any('admin/Products','admin\ysh\adminController@Products');
//地图路由 home
Route::get('admin/home','admin\ysh\adminController@home');
//多图上传
Route::any('admin/upload','admin\ysh\adminController@upload');


//会员列表路由 member_list
Route::get('admin/member_list','admin\ysh\adminController@member_list');

//订单管理路由	Order_form
Route::get('admin/Order_form','admin\ysh\adminController@Order_form');


//退款管理路由	Refund
Route::get('admin/Refund','admin\ysh\adminController@Refund');

//退款管理路由	Order
Route::get('admin/Order','admin\ysh\adminController@Order');

//物流管理路由	Order_Logistics
Route::get('admin/Order_Logistics','admin\ysh\adminController@Order_Logistics');

//订单统计（全国图）路由	Order_Chart
Route::get('admin/Order_Chart','admin\ysh\adminController@Order_Chart');
Route::get('admin/Order_detailed','admin\ysh\adminController@Order_detailed');
//支付管理 路由	payment_method
Route::get('admin/payment_method','admin\ysh\adminController@payment_method');

//支付配置 路由	Payment_Configure
Route::get('admin/Payment_Configure','admin\ysh\adminController@Payment_Configure');

//栏目设置 路由	system_columns
Route::get('admin/system_columns','admin\ysh\adminController@system_columns');

//自定页面 路由	form_builder
Route::get('admin/form_builder','admin\ysh\adminController@form_builder');

//系统设置 路由	system_info
Route::get('admin/system_info','admin\ysh\adminController@system_info');

//系统日志 路由	rizhi_list
Route::get('admin/rizhi_list','admin\ysh\adminController@rizhi_list');

//广告列表 Advertising_list
Route::get('admin/Advertising_list','admin\ysh\adminController@Advertising_list');

//广告分类 Advertising_sort
Route::get('admin/Advertising_sort','admin\ysh\adminController@Advertising_sort');

//商城类表 page_list
Route::get('admin/page_list','admin\ysh\adminController@page_list');

//栏目管理 Columns
Route::get('admin/Columns','admin\ysh\adminController@Columns');

//留言反馈 feedback
Route::get('admin/feedback','admin\ysh\adminController@feedback');








