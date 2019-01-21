@extends('admin.public.header')
<body>
 <div class="Sellerber" id="Sellerber">
 <!--顶部-->
  @include('admin.public.top')
<!--左侧-->
  @include('admin.public.left')
<!--内容-->
     @section('content')
  <div class="Sellerber_content" id="contents">
    <div class="breadcrumbs" id="breadcrumbs">
       <a id="js-tabNav-prev" class="radius btn-default left_roll" href="javascript:;"><i class="fa fa-backward"></i></a>
       <div class="breadcrumb_style clearfix">
	     <ul class="breadcrumb clearfix" id="min_title_list">
          <li class="active home"><span title="我的桌面" data-href="index.blade.php"><i class="fa fa-home home-icon"></i>首页</span></li>
         </ul>
      </div>
       <a id="js-tabNav-next" class="radius btn-default right_roll" href="javascript:;"><i class="fa fa-forward"></i></a>
       <div class="btn-group radius roll-right">
		 <a class="dropdown tabClose" data-toggle="dropdown" aria-expanded="false">页签操作<i class="fa fa-caret-down" style="padding-left: 3px;"></i></a>
			<ul class="dropdown-menu dropdown-menu-right" id="dropdown_menu">
				<li><a class="tabReload" href="javascript:void(0);">刷新当前</a></li>
				<li><a class="tabCloseCurrent" href="javascript:void(0);">关闭当前</a></li>
				<li><a class="tabCloseAll" href="javascript:void(0);">全部关闭(首页)</a></li>
				<li><a class="tabCloseOther" href="javascript:void(0);">除此之外全部关闭</a></li>
			</ul>
		</div>
		<a href="javascript:void()" class="radius roll-right fullscreen"><i class="fa fa-arrows-alt"></i></a>
    </div>
  <!--具体内容-->  
  <div id="iframe_box" class="iframe_content">
  <div class="show_iframe index_home" id="show_iframe">
       <iframe scrolling="yes" class="simei_iframe" frameborder="0" src="{{'index'}}" name="iframepage" data-href="index.html"></iframe>
       </div>
      </div>
  </div>
<!--底部-->
 @include('admin.public.bottom')
  <!--消息提示板块内容-->
<div class="prompt_style prompt">
	<div class="prompt_title">通知消息</div>
	<div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-user icon_prompt label-danger"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-volume-up icon_prompt label-success"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-user icon_prompt label-warning"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-user icon_prompt label-danger"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix submenu">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="javascript:void()" class="" name="Personal_info.html" title="订单消息"><i class="fa fa-user icon_prompt label-danger"></i>你有订单还没有处理请及时处理</a>
    </div>
  </div> 
 </div>
</body>
</html>

<script type="text/javascript">
	var data =[
    {
    	 id:1,
		 pid:0,
		 url:"#",
		 icon:'fa fa-home',
         name:'系统首页',
    },
    {
		 id:2,
		 pid:0,
		 url:"#",
		 icon:'fa fa-desktop',
		 name:'商品管理',
    },
    {
		 id:3,
		 pid:0,
		 url:"#",
		 icon:'fa fa-database',
		 name:'交易管理',
    },
    {
		 id:4,
		 pid:0,
		 url:"#",
		 icon:'fa fa-credit-card',
		 name:'支付管理',
    },
    {
		 id:5,
		 pid:0,
		 url:"#",
		 icon:'fa fa-cogs',
		 name:'系统管理',
    },
    {
		 id:6,
		 pid:0,
		 url:"#",
		 icon:'fa fa-file-text-o',
		 name:'文章管理',
    },
    {
		 id:7,
		 pid:0,
		 url:"#",
		 icon:'fa fa-users',
		 name:'管理员',
    },
    {
		 id:8,
		 pid:0,
		 url:"#",
		 icon:'fa fa-user',
		 name:'会员管理',	  
    },
    {
		 id:10,
		 pid:0,
		 url:"#",
		 icon:'fa fa-file-photo-o',
		 name:'广告管理',
    },{
		 id:11,
		 pid:0,
		 url:"#",
		 icon:'fa fa-file-photo-o',
		 name:'单页管理',
    },{
		 id:12,
		 pid:0,
		 url:"#",
		 icon:'fa fa-home',
		 name:'前端管理',
    },{
		 id:13,
		 pid:0,
		 url:"#",
		 icon:'fa fa-comments',
		 name:'留言管理',
    },{
		 id:20,
		 pid:11,
		 url:'{{'page_list'}}',
		 icon:'fa fa-angle-double-right',
		 name:'商城列表',
    },
		{
		  id:25,
		  pid:1,
		  icon:'fa fa-angle-double-right',
		  url:'{{'home'}}',
		  name:'地图展示',

	},
		{
		  id:26,
		  pid:8,
		  icon:'fa fa-angle-double-right',
		  url:'{{'member_list'}}',
		  name:'会员列表',

	},
	{
		 id:26,
		 pid:1,
		 icon:'fa fa-angle-double-right',
		 url:'{{'index'}}',
		 name:'首页',

  },
	{
		  id:34,
		  pid:2,
		  icon:'fa fa-angle-double-right',
		  url:'{{'add_product'}}',
		  name:'添加商品',

	},
	{
		 id:35,
		 pid:2,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Brand_Manage'}}',
		 name:'分类管理',

  },
	{
		 id:36,
		 pid:2,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Products'}}',
		 name:'商品列表',

	},
	{
		 id:37,
		 pid:12,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Columns'}}',
		 name:'栏目管理',

	},
	
		{
		 id:45,
		 pid:7,
		 icon:'fa fa-angle-double-right',
		 url:'{{'admin_Competence'}}',
		 name:'权限设置',

	},{
		 id:46,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Order_form'}}',
		 name:'订单管理',

	},{
		 id:47,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Refund'}}',
		 name:'退款管理',

	},{
		 id:54,
		 pid:7,
		 icon:'fa fa-angle-double-right',
		 url:'{{'administrator_list'}}',
		 name:'管理员设置',

	},{
		 id:55,
		 pid:7,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Personal_info'}}',
		 name:'管理员信息',

	},
		{
		 id:56,
		 pid:2,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Columns'}}',
		 name:'商品管理',

	},
	{
		  id:37,
		  pid:3,
		  icon:'fa fa-angle-double-right',
		  url:'{{'Order'}}',
		  name:'交易统计',

	},
	{
		 id:38,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Brand_Manage'}}',
		 name:'订单处理',

  },
	{
		 id:39,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Order_Logistics'}}',
		 name:'物流管理',

	},
	{
		 id:40,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Order_Chart'}}',
		 name:'订单统计（全国图）',

	},

	{
		 id:41,
		 pid:4,
		 icon:'fa fa-angle-double-right',
		 url:'{{'payment_method'}}',
		 name:'支付管理',

  },
	{
		 id:42,
		 pid:4,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Payment_Configure'}}',
		 name:'支付配置',

	},{
		 id:43,
		 pid:10,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Advertising_list'}}',
		 name:'广告列表',

	},
		{
		 id:44,
		 pid:10,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Advertising_sort'}}',
		 name:'广告分类',

	},{
		 id:45,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'{{'system_columns'}}',
		 name:'栏目设置',

	},
		{
		 id:46,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'{{'form_builder'}}',
		 name:'自定页面',

	},
		{
		 id:46,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'{{'system_info'}}',
		 name:'系统设置',

	},
		{
		 id:47,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'{{'rizhi_list'}}',
		 name:'系统日志',

	},{
		 id:48,
		 pid:13,
		 icon:'fa fa-angle-double-right',
		 url:'{{'feedback'}}',
		 name:'留言反馈',

	},
	{
		 id:55,
		 pid:6,
		 icon:'fa fa-angle-double-right',
		 url:'{{'Article_list'}}',
		 name:'文章列表',

	}]
//设置框架
 $(function() {  		 
	 $("#Sellerber").frame({
		float : 'left',//设置菜单栏目方向属性
		minStatue:true,//切换模式
		hheight:70,//设置顶部高度 高度为0时自动样式切换（达到另外一种界面效果）
		bheight:35,//设置底部高度
		mwidth:200,//菜单栏宽度（最好不要改动该数值，一般200的宽度值最好）
		switchwidth:50,//切换菜单栏目宽度
		color_btn:'.skin_select',//设置颜色
		menu_nav:'.menu_list',//设置栏目属性
		column_list:'.column_list',//设置栏目名称
		time:'.date_time',//设置时间属性(不填写不显示)
		logo_img:'images/logo_01.png',//logo地址链接（当header为0时显示该属性）
	    Sellerber_content:'.Sellerber_content',//右侧名称
		Sellerber_menu:'.list_content', //左侧栏目
		header:'.Sellerber_header',//顶部栏目	
		prompt:'.prompt_style',
		prompt_btn:'#promptbtn',//点击事件
		data:data,//数据
		mouIconOpen:"fa fa-angle-down",// 菜单(展开)图标
	    mouIconClose:"fa fa-angle-up" , // 菜单（隐藏）图标
		Rightclick:true//是否禁用右键
	 }); 
});
$('#Exit_system').on('click', function(){
      layer.confirm('是否确定退出系统？', {
     btn: ['是','否'] ,//按钮
	 icon:2,
    }, 
	function(){
	  location.href="{{'login'}}";
    });
});
</script>

@endsection

