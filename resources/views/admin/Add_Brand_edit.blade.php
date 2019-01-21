<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加品牌</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{asset('admin')}}/css/shop.css" type="text/css" rel="stylesheet" />
<link href="{{asset('admin')}}/css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="{{asset('admin')}}/css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="{{asset('admin')}}/font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="{{asset('admin')}}/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="{{asset('admin')}}/js/jquery.cookie.js"></script>
<script src="{{asset('admin')}}/js/shopFrame.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/Sellerber.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/layer/layer.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('admin')}}/js/proTree.js" ></script>
<script src="{{asset('admin')}}/js/dist/echarts.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="{{asset('admin')}}/js/html5shiv.js" type="text/javascript"></script>
<script src="{{asset('admin')}}/js/respond.min.js"></script>
<script src="{{asset('admin')}}/js/css3-mediaqueries.js"  type="text/javascript"></script>
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
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
<div id="add_brand" class="margin">
<div class="h_products_list clearfix mb20" id="Sellerber">
  <div class="Sellerber_left menu" id="menuBar">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="menu_style" id="menu_style">
    <div class="list_content">
     <div class="side_list">
      <div class="left_add clearfix">
       <div class="column_title">修改分类</div>
      <ul class="add_conent">
       <li class=" clearfix"><label class="label_name"><i>*</i>商品系列：</label> <div class="vocation">
               <select name="pid"  class="select" style="width: 230px;">
                   <option value="{{$data->category}}">{{$data->category}}</option>
               </select>
           </div></li>
      <li class=" clearfix"><label class="label_name"><i>*</i>系列名称：</label> <input name="cat_name" type="text" class="add_text" value="{{$data->cat_name}}" style="width:220px"/></li>
       <li class=" clearfix"><label class="label_name"><i>*</i>系列logo：</label>
           <div class="up_load_img">
               <input type="file" id="member_photo" name="logo">
               <img src="{{asset('uploads')}}/{{$data->logo}}" width="160" height="160" id="photoimg" />
           </div><em class="Prompt" style="color: slateblue;font-size: 16px">请点击图片选择需要上传的logo</em>
           {{--<div><input type="submit" value="上传"/></div>--}}
    </li>
         <li class=" clearfix"><label class="label_name"><i>*</i>关键字：</label> <input name="desc" type="text" class="add_text" style="width:220px" value="{{$data->desc}}"/></li>
         <li class=" clearfix"><label class="label_name"><i>*</i>系列描述：</label> <textarea name="cat_desc" cols="" rows="" class="textarea" onkeyup="checkLength(this);">{{$data->cat_desc}}</textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">500</span>字</span></li>
       </ul>
     </div>

      </div>
    </div>
  </div>
 </div>

  </div>
   <div class="operation clearfix mb20 same_module align">
 <input name="" type="submit"  class="btn button_btn bg-deep-blue" value="修改分类"/>
 <input name="" type="reset" value="取消修改" class="btn button_btn btn-Dark-success"/>
</div>
</div>
</form>
</body>
</html>
<script type="text/javascript">
	function checkLength(which) {
	var maxChars = 500;
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; // 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
}
</script>
<!--上传logo的js-->
<script type="text/javascript" src="{{asset('dantuuploader/js')}}/jquery.js"></script>
<script type="text/javascript" src="{{asset('dantuuploader/js')}}/uploadPreview.js"></script>
<script type="text/javascript">
    //上传logo js
    $(function(){
        $("#member_photo").uploadPreview({Img: "photoimg", Width: 160,Height: 160});
    });
</script>
