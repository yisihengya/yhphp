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
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<script src="js/hsCheckData.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->

    {{--logo 上传样式--}}
    <style type="text/css">
        .up_load_img{
            width: 160px;
            height: 160px;
            overflow:hidden;
            float: left;
            position: relative;
        }
        .up_load_img input[type="file"]{
            position: absolute;
            width: 160px;
            height: 160px;
            opacity: 0;
            filter:alpha(opacity=0);
            z-index:2;
        }
    </style>

    {{--多图上传样式--}}
    <link rel="stylesheet" href="{{asset('webuploader/css/webuploader.css')}}">
    <link rel="stylesheet" href="{{asset('webuploader/css/style.css')}}">
 <title>添加商品</title>
</head>

<body>
<div class="margin inside_pages clearfix">
<div class="add_style clearfix relative">
  <!--品牌展示 当通过品牌管理添加产品是显示该-->
  <div class="Brand_title">
  	 <div class="Brand_img"><img src="product_img/logo/1089.jpg"><h3>戴瑞珠宝</h3></div>
  </div>
 <!--添加商品表单-->
 <form action="" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
 <ul>
  <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>商品名称：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="goods_name" type="text" value="{{$data->goods_name}}"  class="col-xs-6"/></div></li>
  <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>简单描述：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="goods_describe" type="text" value="{{$data->goods_describe}}" class="col-xs-4"/></div></li>
   <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>关&nbsp;键&nbsp;字：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="goods_keyword" type="text" value="{{$data->goods_keyword}}" class="col-xs-4"/><em class="Prompt"> 请用","分隔关键字</em></div></li>
     <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>选择分类：&nbsp;&nbsp;</label>
      <div class="Add_content col-xs-11">
         <select name="cat_id"  class="select" style="width: 230px;">
             <option value="{{$c_name}}">{{$c_name}}</option>
         </select>
      </div>
     </li>
     <li class="clearfix">
      <div class="col-xs-4">
     <label class="label_name col-xs-3"><i>*</i>商品原价：&nbsp;&nbsp;</label> 
    <div class="Add_content col-xs-9">
    <input name="original_price" type="text" value="{{$data->original_price}}"  class="col-xs-7"/><em class="Prompt">元</em>
    </div>   
    </div>
    <div class="col-xs-4">
    <label class="label_name col-xs-3"><i>*</i>商品现价：&nbsp;&nbsp;</label> 
    <div class="Add_content col-xs-9">
   <input name="now_price" type="text" value="{{$data->now_price}}"  class="col-xs-7"/><em class="Prompt">元</em>
    </div>   
    </div>
    <div class="col-xs-4">
    <label class="label_name col-xs-3"><i>*</i>商品数量：&nbsp;&nbsp;</label> 
    <div class="Add_content col-xs-9">
   <input name="goods_num" type="text" value="{{$data->goods_num}}"  class="col-xs-7"/><em class="Prompt">件</em>
    </div>   
    </div>
    </li>
   <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>设置时间：&nbsp;&nbsp;</label>
    <div class="Add_content col-xs-11">
    <label class="l_f checkbox_time"><input type="checkbox" name="checkbox" class="ace" id="checkbox" value="1"><span class="lbl">是</span></label>
    <div class="Date_selection" style="display:none">
      <span class="label_name">开始日：</span><input type="text" class="laydate-icon" id="start" name="start_time" value="{{$data->start_time}}" style="width:200px; margin-right:10px; height:30px; line-height:30px; float:left">
      <span class="label_name">结束日：</span><input type="text" class="laydate-icon" id="end" name="end_time" value="{{$data->end_time}}" style="width:200px;height:30px; line-height:30px; float:left">
    </div>
    </div>   
    </li>
    <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>设置规格：&nbsp;&nbsp;</label>
    <div class="Add_content col-xs-11">    
       <input name="goods_norm" type="text" value="{{$data->goods_norm}}"  class="col-xs-6"/><em class="Prompt">如"颜色,尺寸,型号"中间以英文逗号隔开</em>
    </div>   
    </li>
     <li class="clearfix">
      <div class="col-xs-4">
     <label class="label_name col-xs-3"><i>*</i>是否上架：&nbsp;&nbsp;</label>
    <div class="Add_content col-xs-9">
        @if($data->is_onsale==1)
    <label><input type="radio" name="is_onsale" class="ace" checked="checked" value="1"><span class="lbl">是</span></label>
    <label><input type="radio" name="is_onsale" class="ace" value="0"><span class="lbl">否</span></label>
        @elseif($data->is_onsale==0)
    <label><input type="radio" name="is_onsale" class="ace" checked="checked" value="1"><span class="lbl">是</span></label>
    <label><input type="radio" name="is_onsale" class="ace" checked="checked" value="0"><span class="lbl">否</span></label>
        @endif
    </div>   
    </div>
    <div class="col-xs-4">
    <label class="label_name col-xs-3">允许评论：&nbsp;&nbsp;</label> 
    <div class="Add_content col-xs-9">
        @if($data->is_pl==1)
    <label class="l_f checkbox_time"><input type="checkbox" name="is_pl" class="ace" checked="checked" value="1"><span class="lbl"></span></label>
        @elseif($data->is_pl==0)
    <label class="l_f checkbox_time"><input type="checkbox" name="is_pl" class="ace" value="1"><span class="lbl"></span></label>
        @endif
    </div>   
    </div>
    </li>
     <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>商品编号：&nbsp;&nbsp;</label>
         <div class="Add_content col-xs-5">
             <input name="goods_nums" type="text" value="{{$data->goods_nums}}"  class="col-xs-6"/>
         </div>
     </li>
     {{--商品主图上传--}}
     <li class=" clearfix"><label class="label_name col-xs-1"><i>*</i>商品主图：</label>
         <div class="up_load_img">
             <input type="file" id="member_photo" name="goods_img">
             <img src="{{asset('goods_img_uploads')}}/{{$data->goods_img}}" width="160" height="160" id="photoimg" />
         </div><em class="Prompt" style="color: slateblue;font-size: 16px">请点击图片选择需要上传的商品主图</em>
         {{--<div><input type="submit" value="上传"/></div>--}}
     </li>
     {{--多图上传--}}
     <label class="label_name" style="padding-left: 70px"><i>*</i>商品附图添加：</label>
      <li class="clearfix" style="width: 1200px;height: 350px;padding-left: 160px">
       <div id="wrapper">
         <div id="container">
          <!--头部，相册选择和格式选择-->
          <div id="uploader">
           <div class="queueList">
            <div id="dndArea" class="placeholder">
             <div id="filePicker"></div>
             <p>或将照片拖到这里，单次最多可选300张</p>
            </div>
           </div>
           <div class="statusBar" style="display:none;">
            <div class="progress">
             <span class="text">0%</span>
             <span class="percentage"></span>
            </div><div class="info"></div>
            <div class="btns">
             <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
            </div>
           </div>
          </div>
         </div>
       </div>

  </li>

     <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>内容介绍：&nbsp;&nbsp;</label>
     <div class="Add_content col-xs-11">
      <textarea rows="" cols="" name="goods_introduce" id="editor" style="width:100%;height:300px;">{{$data->goods_introduce}}</textarea>
      </div>
     </li>  
 </ul>
 <div class="Button_operation btn_width" id="uploader">
    <button class="btn button_btn bg-deep-blue" type="submit">确定编辑</button>
    <button class="btn button_btn bg-gray" type="reset">取消编辑</button>
 </div>
 </form>
</div>
</div>
</body>
</html>
   <!--复文本编辑框-->
    <script type="text/javascript" charset="utf-8" src="{{asset('admin/js/utf8-jsp/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('admin/js/utf8-jsp/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('admin/js/utf8-jsp/lang/zh-cn/zh-cn.js')}}"></script>

<script>
$(function(){
 var ue = UE.getEditor('editor');
});
$(document).ready(function(){
    var spotMax = 8;
  if($('div.images_Upload').size() >= spotMax) {$(obj).hide();}
  $("#add_Upload").on('click',function(){ 
       var cid =$('.images_Upload').each(function(i){ $(this).attr('id',"Uimages_Upload_"+i)});
       addSpot(this, spotMax, cid);
  });
});

 /*checkbox激发事件*/
$('#checkbox').on('click',function(){
	if($('input[name="checkbox"]').prop("checked")){
		 $('.Date_selection ').css('display','block');
		}
	else{
		
		 $('.Date_selection').css('display','none');
		}	
	});
function add_category(){
	 $(".add_category_style").toggle();
	
	}
  /******时间设置*******/
  var start = {
    elem: '#start',
    format: 'YYYY/MM/DD hh:mm:ss',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16 23:59:59', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY/MM/DD hh:mm:ss',
    min: laydate.now(),
    max: '2099-06-16 23:59:59',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(start);
laydate(end);
/*********滚动事件*********/
$("body").niceScroll({
	cursorcolor:"#888888",
	cursoropacitymax:1,
	touchbehavior:false,
	cursorwidth:"5px",
	cursorborder:"0",
	cursorborderradius:"5px"
});
</script>
{{--多图上传需要的js--}}
<script type="text/javascript" src="{{asset('webuploader/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('webuploader/js/webuploader.js')}}"></script>
<script type="text/javascript">
    var _token = "{{csrf_token()}}";
    var upload_url = "{{url('admin/upload')}}";
    var swf_url = "{{asset('webuploader/images/Uploader.swf')}}";
</script>
<script type="text/javascript" src="{{asset('webuploader/js/upload.js')}}"></script>

<script type="text/javascript" src="{{asset('js/jquery-migrate-1.4.1.js')}}"></script>
<!--上传logo的js-->
<script type="text/javascript" src="{{asset('dantuuploader/js/uploadPreview.js')}}"></script>
<script type="text/javascript">
    //上传logo js
    $(function(){
        $("#member_photo").uploadPreview({Img: "photoimg", Width: 160,Height: 160});
    });
</script>