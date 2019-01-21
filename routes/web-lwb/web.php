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
//写自己的路由文件 注意 不要重复

//前台页面所有路由
//主页路由 index
Route::get('home/index','home\lwb\HomeController@index');

//登录页面路由 login
Route::get('home/login','home\lwb\HomeController@login');

//注册页面路由 reg
Route::get('home/reg','home\lwb\HomeController@reg');




//后台页面所有路由



//登录页面路由 demo
Route::any('admin/login','admin\lwb\adminController@login');

//显示验证码
Route::any('admin/code','admin\lwb\adminController@code');

//主页路由 shops_index
Route::any('admin/shops_index','admin\lwb\adminController@shops_index');

//首页路由 index
Route::any('admin/index','admin\lwb\adminController@index');

//添加商品 add_product
Route::any('admin/add_product','admin\lwb\adminController@add_product');

//品牌管理 Brand_Manage
Route::any('admin/Brand_Manage','admin\lwb\adminController@Brand_Manage');

//添加品牌 Add_Brand
Route::any('admin/Add_Brand','admin\lwb\adminController@Add_Brand');

//品牌详情 Brand_detailed
Route::any('admin/Brand_detailed','admin\lwb\adminController@Brand_detailed');

//商品分类	Products
Route::any('admin/Products','admin\lwb\adminController@Products');

//栏目管理	Columns
Route::any('admin/Columns','admin\lwb\adminController@Columns');

//订单管理 Order_form
Route::any('admin/Order_form','admin\lwb\adminController@Order_form');

//订单详情 Order_detailed
Route::any('admin/Order_detailed','admin\lwb\adminController@Order_detailed');

//退款管理	Refund
Route::any('admin/Refund','admin\lwb\adminController@Refund');

//退款详情 Refund_detailed
Route::any('admin/Refund_detailed','admin\lwb\adminController@Refund_detailed');

//交易统计	Order
Route::any('admin/Order','admin\lwb\adminController@Order');

//订单处理	Brand_Manage2
Route::any('admin/Brand_Manage2','admin\lwb\adminController@Brand_Manage2');

//物流管理	Order_Logistics
Route::any('admin/Order_Logistics','admin\lwb\adminController@Order_Logistics');

//订单统计	Order_Chart
Route::any('admin/Order_Chart','admin\lwb\adminController@Order_Chart');

//支付管理	payment_method
Route::any('admin/payment_method','admin\lwb\adminController@payment_method');

//支付详情 Payment_details
Route::any('admin/Payment_details','admin\lwb\adminController@Payment_details');

//支付配置	Payment_Configure
Route::any('admin/Payment_Configure','admin\lwb\adminController@Payment_Configure');

//支付管理	payment_method
Route::any('admin/payment_method','admin\lwb\adminController@payment_method');

//栏目设置	system_columns
Route::any('admin/system_columns','admin\lwb\adminController@system_columns');

//自定页面	form_builder
Route::any('admin/form_builder','admin\lwb\adminController@form_builder');

//系统设置	system_info
Route::any('admin/system_info','admin\lwb\adminController@system_info');

//系统日志	rizhi_list
Route::any('admin/rizhi_list','admin\lwb\adminController@rizhi_list');

//文章列表	Article_list
Route::any('admin/Article_list','admin\lwb\adminController@Article_list');

//添加文章 add_Article
Route::any('admin/add_Article','admin\lwb\adminController@add_Article');

//权限设置	admin_Competence
Route::any('admin/admin_Competence','admin\lwb\adminController@admin_Competence');

//添加权限 add_Competence
Route::any('admin/add_Competence','admin\lwb\adminController@add_Competence');

//管理员设置(显示，添加管理员) administrator_list
Route::any('admin/administrator_list','admin\lwb\adminController@administrator_list');

//管理员设置(删除管理员) administrator_list_delete
Route::any('admin/administrator_list_delete','admin\lwb\adminController@administrator_list_delete');

//管理员信息 Personal_info
Route::any('admin/Personal_info','admin\lwb\adminController@Personal_info');

//会员列表	member_list
Route::any('admin/member_list','admin\lwb\adminController@member_list');

//广告列表	Advertising_list
Route::any('admin/Advertising_list','admin\lwb\adminController@Advertising_list');

//广告分类	Advertising_sort
Route::any('admin/Advertising_sort','admin\lwb\adminController@Advertising_sort');

//查看 advert_detailed_left
Route::any('admin/advert_detailed_left','admin\lwb\adminController@advert_detailed_left');

//商城列表	page_list
Route::any('admin/page_list','admin\lwb\adminController@page_list');

//添加单页 add_Singlepag
Route::any('admin/add_Singlepag','admin\lwb\adminController@add_Singlepag');

//栏目管理	Columns
Route::any('admin/Columns2','admin\lwb\adminController@Columns2');

//留言反馈	feedback
Route::any('admin/feedback','admin\lwb\adminController@feedback');




