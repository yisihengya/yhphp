<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="js/proTree.js" ></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>广告列表</title>
</head>
<body>
<div class="clearfix" id="page_style">
 <div class="Advertising_list  clearfix" id="Sellerber">
   <div class="Sellerber_left menu" id="menuBar">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div> 
    <div class="menu_style" id="menu_style">
    <div class="list_content">
     <div class="side_list">
       <div class="column_title"><h4 class="lighter smaller">广告分类</h4></div>
       <div class="st_tree_style tree"></div>
     </div>
    </div>
   </div>
  </div>
  <div class="list_Exhibition list_show padding15">
  <div class="operation clearfix mb15 searchs_style">
    <button class="btn button_btn btn-danger" type="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;批量删除</button>
    <a href="javascript:" onClick="add_ads()" name="" class="btn button_btn bg-deep-blue" title="添加产品"><i class="fa  fa-edit"></i>&nbsp;添加广告</a>
    <span class="line30 r_f">数量：3433件</span>
   </div>
   <!--数据展示-->
    <div class="datalist_show">
      <div class="datatable_height confirm gallery">
        <table class="table table_list table_striped table-bordered " id="sample-table">
		<thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="80px">ID</th>
                <th width="80px">排序</th>
				<th width="100">分类</th>
				<th width="220px">图片</th>
				<th width="80px">尺寸（大小）</th>
				<th width="150px">链接地址</th>
				<th width="120px">加入时间</th>
				<th width="70px">状态</th>                
				<th width="100px">操作</th>
		</tr>
         @foreach($dd as $v)
            <tr>
                <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <td>{{$v->id}}</td>
                <td>{{$v->paixu}}</td>
                <td>{{$v->fenlei}}</td>
                <td>{{$v->pic}}</td>
                <td>{{$v->inchi}}</td>
                <td>{{$v->url}}</td>
                <td>{{$v->create_time}}</td>
                <td>普通用户</td>
                <td>
                    <a onClick="member_stop(this,'10001')"  href="javascript:" title="隐藏"  class="btn btn-xs btn-status">隐藏</a>
                    <a title="编辑" onclick="Advert_add_style(obj,id)"  href="javascript:;"  class="btn btn-xs btn-info" id="edit">编辑</a>
                    <a title="删除" href="javascript:;" onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-delete" >删除</a>
                </td>
            </tr>
         @endforeach
        </thead>
     </table>
      <div class="clear"></div>
	</div>
   </div>
  </div>
 </div>
</div>
<!--添加广告样式-->
<div id="Advert_add_style" class="Advert_add_style padding display" >
 <div class="add_style">
 <ul>
  <li class="clearfix"><label class="label_name col-xs-2">图片名称：&nbsp;&nbsp;</label><span class="cont_style col-xs-9"><input name="图片名称" type="text" id="form-field-1" class="col-xs-10 col-sm-5" style="width:450px"></span></li>
  <li class="clearfix"><label class="label_name col-xs-2">显示排序：&nbsp;&nbsp;</label><span class="cont_style col-xs-9"><input name="排序" type="text" id="form-field-1" placeholder="0" class="col-xs-10 col-sm-5" style="width:50px"></span></li>
  <li class="clearfix"><label class="label_name col-xs-2">链接地址：&nbsp;&nbsp;</label><span class="cont_style col-xs-9"><input name="地址" type="text" id="form-field-1" placeholder="地址" class="col-xs-10 col-sm-5" style="width:450px"></span></li>
   <li class="clearfix"><label class="label_name col-xs-2">状&nbsp;&nbsp;态：&nbsp;&nbsp;</label>
   <div class="Add_content col-xs-9">
     <label><input name="form-field-radio1" type="radio" checked="checked" class="ace">
     <span class="lbl">显示</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="form-field-radio1" type="radio" class="ace">
     <span class="lbl">隐藏</span></label>
     </div>
     </li >
     <li class="clearfix">
     <label class="label_name col-xs-2">设置时间：&nbsp;&nbsp;</label> 
    <div class="Add_content col-xs-9">
    <label class="l_f checkbox_time"><input type="checkbox" name="checkbox" class="ace" id="checkbox"><span class="lbl">是</span></label>
    <div class="Date_selection" style="display:none">
      <span class="label_name">开始日：</span><p class="laydate-icon" id="start" style="width:160px; margin-right:10px; height:30px; line-height:30px; float:left"></p>
      <span class="label_name">结束日：</span><p class="laydate-icon" id="end" style="width:160px;height:30px; line-height:30px; float:left"></p>
    </div>
    </div>   
    </li>
     <li class="clearfix"><label class="label_name col-xs-2">图&nbsp;&nbsp;片：&nbsp;&nbsp;</label>
     <span class="cont_style col-xs-9">        
       <div id="preview" class="preview_img"><img id="imghead" border="0" src="images/image.png" /></div>
       <div class="fileInput ">
        <input type="file" onchange="previewImage(this)" name="upfile" id="upfile" class="upfile"/>
        <input class="upFileBtn" type="button" value="上传图片" onclick="document.getElementById('upfile').click()" />
        </div>
      </span>
  </li>
 </ul>
 </div>
</div>
</body>
</html>
<script type="text/javascript">
	//设置内页框架布局
$(function() { 
	$("#Sellerber").frame({
		float : 'left',
		color_btn:'.skin_select',
		Sellerber_menu:'.list_content',
		page_content:'.list_show',  //内容
		datalist:".datatable_height",   //数据列表高度取值
		header:65,  //顶部高度
		mwidth:200, //菜单栏宽度
		minStatue:true,
	});
});
	//后台传入的 标题列表
var arr = [{
		id: 1,
		name: "首页轮播广告大",
	    amount:4,
		pid: 0,
	    
	}, {
		id: 2,
		name: "轮播广告小",
		amount:5,
		pid: 0,
		
	}, {
		id: 3,
		name: "轮播广告小2",
		amount:4,
		pid: 0,
		
	}, {
		id: 4,
		name: "通用广告",
		amount:4,
		pid: 0,
		
	}, {
		id: 5,
		name: "图书影响",
		amount:64,
		pid: 0,
		
	}
];
//树状图插件
$(".tree").ProTree({
	arr: arr,//数据
	simIcon: "fa fa-file-text-o",//单个标题字体图标 不传默认glyphicon-file
	mouIconOpen: "fa fa-folder-open",//含多个标题的打开字体图标  不传默认glyphicon-folder-open
	mouIconClose:"fa fa-folder",//含多个标题的关闭的字体图标  不传默认glyphicon-folder-close

});
	/*广告图片-停用*/
function member_stop(obj,id){
	layer.confirm('确认要隐藏该广告吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="显示">显示</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">隐藏</span>');
		$(obj).remove();
		layer.msg('隐藏!',{icon: 5,time:1000});
	});
}
/*广告图片-启用*/
function member_start(obj,id){
	layer.confirm('确认要显示该广告吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-status" onClick="member_stop(this,id)" href="javascript:;" title="隐藏">隐藏</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">显示</span>');
		$(obj).remove();
		layer.msg('显示!',{icon: 6,time:1000});
	});
}
/*广告图片-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                url:"{{asset('admin/delete')}}",
                data:{id:id,},
                datatype:"json",
                type:'get',
                success:function (res){
                    var arr =JSON.parse(res);
                    layer.msg(arr.mess,function () {
                     });
                }
            })
        });
    }

/*******添加广告*********/
function add_ads(){
	  layer.open({
        type: 1,
        title: '添加广告',
		maxmin: true, 
		shadeClose: false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#Advert_add_style'),
		btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".add_adverts input[type$='text']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
          else{
			  layer.alert('添加成功！',{
               title: '提示框',				
			icon:1,		
			  });
			   layer.close(index);	
		  }		  		     				
		}
    });
}
	 /*checkbox激发事件*/
$('#checkbox').on('click',function(){
	if($('input[name="checkbox"]').prop("checked")){
		 $('.Date_selection ').css('display','block');
		}
	else{
		
		 $('.Date_selection').css('display','none');
		}	
	});
  /******时间设置*******/
  var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(start);
laydate(end);
</script>
<script type="text/javascript">
function updateProgress(file) {
	$('.progress-box .progress-bar > div').css('width', parseInt(file.percentUploaded) + '%');
	$('.progress-box .progress-num > b').html(SWFUpload.speed.formatPercent(file.percentUploaded));
	if(parseInt(file.percentUploaded) == 100) {
		// 如果上传完成了
		$('.progress-box').hide();
	}
}

function initProgress() {
	$('.progress-box').show();
	$('.progress-box .progress-bar > div').css('width', '0%');
	$('.progress-box .progress-num > b').html('0%');
}

function successAction(fileInfo) {
	var up_path = fileInfo.path;
	var up_width = fileInfo.width;
	var up_height = fileInfo.height;
	var _up_width,_up_height;
	if(up_width > 120) {
		_up_width = 120;
		_up_height = _up_width*up_height/up_width;
	}
	$(".logobox .resizebox").css({width: _up_width, height: _up_height});
	$(".logobox .resizebox > img").attr('src', up_path);
	$(".logobox .resizebox > img").attr('width', _up_width);
	$(".logobox .resizebox > img").attr('height', _up_height);
}

var swfImageUpload;
$(document).ready(function() {
	var settings = {
		flash_url : "Widget/swfupload/swfupload.swf",
		flash9_url : "Widget/swfupload/swfupload_fp9.swf",
		upload_url: "upload.php",// 接受上传的地址
		file_size_limit : "5MB",// 文件大小限制
		file_types : "*.jpg;*.gif;*.png;*.jpeg;",// 限制文件类型
		file_types_description : "图片",// 说明，自己定义
		file_upload_limit : 100,
		file_queue_limit : 0,
		custom_settings : {},
		debug: false,
		// Button settings
		button_image_url: "Widget/swfupload/upload-btn.png",
		button_width: "95",
		button_height: "30 ",
		button_placeholder_id: 'uploadBtnHolder',
		button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor : SWFUpload.CURSOR.HAND,
		button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
		
		moving_average_history_size: 40,
		
		// The event handler functions are defined in handlers.js
		swfupload_preload_handler : preLoad,
		swfupload_load_failed_handler : loadFailed,
		file_queued_handler : fileQueued,
		file_dialog_complete_handler: fileDialogComplete,
		upload_start_handler : function (file) {
			initProgress();
			updateProgress(file);
		},
		upload_progress_handler : function(file, bytesComplete, bytesTotal) {
			updateProgress(file);
		},
		upload_success_handler : function(file, data, response) {
			// 上传成功后处理函数
			var fileInfo = eval("(" + data + ")");
			successAction(fileInfo);
		},
		upload_error_handler : function(file, errorCode, message) {
			alert('上传发生了错误！');
		},
		file_queue_error_handler : function(file, errorCode, message) {
			if(errorCode == -110) {
				alert('您选择的文件太大了。');	
			}
		}
	};
	swfImageUpload = new SWFUpload(settings);
});
</script>