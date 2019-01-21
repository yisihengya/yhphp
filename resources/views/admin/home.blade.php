<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="js/dist/echarts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
		<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
		<title>百度地图API自定义地图</title>
		<!--引用百度地图API-->
		<style type="text/css">
			html,body{margin:0;padding:0;}
			.iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
			.iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
		</style>
		<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
	</head>

<body>
<!--百度地图容器-->
<div style="width:1400px;height:520px;border:#ccc solid 1px;" id="dituContent"></div>
</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }

    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(113.549803,34.808383);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }

    initMap();//创建和初始化地图
</script>


{{--<!-- 加载百度地图样式信息窗口 -->--}}
{{--<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>--}}
{{--<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />--}}
{{--<!-- 加载城市列表 -->--}}
{{--<script type="text/javascript" src="http://api.map.baidu.com/library/CityList/1.2/src/CityList_min.js"></script>--}}
{{--<script type="text/javascript" src="http://api.map.baidu.com/library/TextIconOverlay/1.2/src/TextIconOverlay_min.js"></script>--}}
{{--<script type="text/javascript" src="http://api.map.baidu.com/library/MarkerClusterer/1.2/src/MarkerClusterer_min.js"></script>--}}
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>首页</title>
</head>

<body>
<!---->
<div class="display_layer"><i class="fa fa-angle-left"></i></div>
<div class="Introduction_Box">
  <div class="close_layer"><i class="fa fa-close"></i></div>
<div id="main" style=""  class="data_sheets"></div>   
</div>
<div id="l-map" class="map_style"></div>
	<div id="result">
	  <div class="box_inset">
		 <dl>
    	<dt>基本操作</dt>
        <dd>
                <div class="search_style">
                 <form action="#" method="get" class="sidebar_form">
		           <div class="input-group">
			       <input type="text" name="q" id="jiansuo1" class="form-control" title="请输入关键字进行查询">
			       <span class="input-group-btn"><a class="btn_flat" href="javascript:" id="open1" onclick="refresh()" ><i class="fa fa-search"></i></a></span>
		         </div>
                 </form>
                </div>
        </dd>
        <dd>
        	<div class="area-text">
                        <b class="animation-line1"></b>
                        <h4>口径说明：</h4>
                         <p class="text_container">
                            <script>var s = '（当日VLR登记用户数、昨日VLR登记用户数、上月平均值当日语音网络接通率、昨日语音网络接通'; var con = $('.text_container'); var index = 0; var length = s.length; var tId = null; function start(){ con.text(''); tId=setInterval(function(){ con.append(s.charAt(index)); if(index++ === length){ clearInterval(tId); index = 0; start() } },100); } start();</script>
                        </p>
                        <b class="animation-line2"></b>
                    </div>
        	
        </dd>
		  </dl>
	</div>
	</div>
	<!--城市列表-->
	<input type="text" id="jiansuo" value="">
	<div class="sel_container"><div class="city_select"><strong id="curCity">郑州市</strong> [<a id="curCityText" href="javascript:void(0)">更换城市</a>]</div></div>
	<div class="map_popup" id="cityList" style="display:none;">
		<div class="popup_main">
			<div class="title">城市列表</div>
			<div class="cityList" id="citylist_container"></div>
			<button id="popup_close"></button>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	//隐藏显示
$(function(){
	var oWidth=$(".Introduction_Box").width();
	$(".display_layer").click(function(){
		$(".Introduction_Box").animate({
			left:50 +'%',
			marginLeft:-oWidth/2-13,
		},900);
		$(this).hide();
	});
	$(".close_layer").click(function(){
		$(".Introduction_Box").animate({
			left:100 + '%',
			marginLeft:'',
		},900);
		$(".display_layer").show();
	});
});
//初始化宽度、高度  
$(".map_style").height($(window).height());
	$(".map_style").width($(window).width());
	$(".Introduction_Box").width($(window).width()-20);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	 $(".map_style").height($(window).height());
		$(".map_style").width($(window).width());
		$(".Introduction_Box").width($(window).width()-20);
})	
 require.config({
            paths: {
                echarts: './js/dist'
            }
        });
        require(
            [
                'echarts',
				'echarts/theme/macarons',
                'echarts/chart/line',   // 按需加载所需图表，如需动态类型切换功能，别忘了同时加载相应图表
                'echarts/chart/bar'
            ],
            function (ec,theme) {
                var myChart = ec.init(document.getElementById('main'),theme);
               option = {
    title : {
        text: '月购买订单交易记录',
        subtext: '实时获取用户订单购买记录'
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['所有订单','待付款','已付款','代发货']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'所有订单',
            type:'bar',
            data:[120, 49, 70, 232, 256, 767, 1356, 1622, 326, 200,164, 133],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            }           
        },
        {
            name:'待付款',
            type:'bar',
            data:[26, 59, 30, 84, 27, 77, 176, 1182, 487, 188, 60, 23],
            markPoint : {
                data : [
                    {name : '年最高', value : 1182, xAxis: 7, yAxis: 1182, symbolSize:18},
                    {name : '年最低', value : 23, xAxis: 11, yAxis: 3}
                ]
            },
           
			
        }
		, {
            name:'已付款',
            type:'bar',
            data:[26, 59, 60, 264, 287, 77, 176, 122, 247, 148, 60, 23],
            markPoint : {
                data : [
                    {name : '年最高', value : 172, xAxis: 7, yAxis: 172, symbolSize:18},
                    {name : '年最低', value : 23, xAxis: 11, yAxis: 3}
                ]
            },
           
		}
		, {
            name:'代发货',
            type:'bar',
            data:[26, 59, 80, 24, 87, 70, 175, 1072, 48, 18, 69, 63],
            markPoint : {
                data : [
                    {name : '年最高', value : 1072, xAxis: 7, yAxis: 1072, symbolSize:18},
                    {name : '年最低', value : 22, xAxis: 11, yAxis: 3}
                ]
            },
           
		}
    ]
};
                    
                myChart.setOption(option);
            }
        );	
function fanhui(){
	location.href = basePath+"/admin/index.action";
}
function refresh(){
	window.location.reload();
}

	
</script>