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
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="js/proTree.js" ></script>
<script src="js/dist/echarts.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>品牌管理</title>
</head>

<body>
<div class="margin" id="page_style">

{{--加入一个 form表单 进行搜索--}}
<form action="" method="post">
    {{csrf_field()}}
 <div class="operation clearfix mb15 same_module">

<ul class="choice_search">
      <li class="clearfix col-xs-2 col-lg-3 col-ms-3 "><label class="label_name ">品牌名称：</label>
      <input placeholder="输入品牌名称"  name="cat_name" type="text" class="form-control col-xs-8 col-lg-8 col-ms-8">
      </li>
      <li class="clearfix col-xs-2 col-lg-3 col-ms-3"><label class="label_name ">添加时间：</label>
      <input class="inline laydate-icon form-control Select_Date" id="start" name="addtime">
      </li>
      <li class="clearfix col-xs-2 col-lg-3 col-ms-3 ">
       <select name="" class="margin-right l_f select_style"><option  value="1">国内品牌</option><option value="2">国外品牌</option></select>
       <button type="submit" class="btn button_btn bg-deep-blue "><i class="icon-search"></i>查询</button></li>
    </ul>
	</div>
</form>

<div class="h_products_list clearfix mb15" id="Sellerber">
   <!--品牌展示-->
      <div class="Sellerber_left menu" id="menuBar">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
    <div class="menu_style" id="menu_style">
    <div class="list_content">
     <div class="side_list">
           <div id="main" style="height:250px;" class="side_list"></div>
    </div>
  </div>
 </div>
</div>
     <!--品牌列表-->
    <div class="list_Exhibition list_show padding15">
      <div class="operation clearfix mb15  same_module">
       <span class="l_f">
           <select class="form-control" id="perPage" name="perPage">
            @foreach ([3,10,15,30] as $e)
                   <option value="{{$e}}" {{ $e==request('perPage') ? 'selected' : '' }} >每页显示{{$e}}条</option>
                       @endforeach
            </select>
        <a href="{{url('admin/Add_Brand')}}"  title="添加分类" class="btn button_btn bg-deep-blue"><i class="fa fa-plus"></i>添加分类</a>
        <a href="javascript:ovid()" class="btn  button_btn btn-danger" id="del_all"><i class="fa fa-trash"></i>批量删除</a>
        <a href="javascript:ovid()" class="btn  button_btn btn-info">国内品牌</a>
        <a href="javascript:ovid()" class="btn button_btn btn-Dark-success">国外品牌</a>
       </span>
       <span class="r_f">共：<b>{{$total}}</b>个品牌</span>
     </div>
      <div class=" datalist_show">
       <div class="datatable_height confirm">
       <table class="table table_list table_striped table-bordered" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" id="checkbox" class="ace" ><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
                <th width="120px">品牌名称</th>
				<th width="50px">排序</th>
				<th width="120px">品牌LOGO</th>
				<th width="130px">path</th>
				<th width="150px">关键字</th>
                <th width="150px">系列描述</th>
				<th width="180px">加入时间</th>
				<th width="70px">状态</th>                
				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
          <td width="25px"><label><input type="checkbox" class="ace" value="{{$v->id}}" name="check[]"><span class="lbl"></span></label></td>
          <td width="80px">{{$v->id}}</td>
          <td><a href="javascript:ovid()" name="Brand_detailed.html" style="cursor:pointer" class="text-primary brond_name" onclick="generateOrders('561');" title="{{$v->cat_name}}">{{$v->cat_name}}</a></td>
          <td width="50px"><input type="text" class="input-text text-c" value="{{$v->sort}}" style="width:60px"></td>
          <td><img src="{{asset('uploads/').'/'.$v->logo}}"  width="130"/></td>
          <td width="150px">
              @foreach (explode(',',$v->path) as $value)
                  @foreach($data as $vv)
                      @if($value==$vv->id)
                          {{$name = $vv->cat_name.'->'}}
                      @endif
                  @endforeach
              @endforeach
          </td>

          <td title="{{$v->desc}}">{{$v->desc}}</td>
          <td title="{{$v->cat_desc}}">{!! mb_substr($v->cat_desc,0,10).'...' !!}</td>
          <td>{{$v->addtime}}</td>
            @if($v->is_show==1)
          <td class="td-status"><span class="label label-success radius">已上架</span></td>
            @elseif($v->is_show==0)
          <td class="td-status"><span class="label label-default radius">已下架</span></td>
            @endif
          <td class="td-manage">
              @if($v->is_show==1)
            <a onclick="member_stop(this,'{{$v->id}}')"  href="javascript:;" title="下架"  class="btn btn-xs btn-status">下架</a>
              @elseif($v->is_show==0)
            <a onclick="member_start(this,'{{$v->id}}')"  href="javascript:;" title="上架"  class="btn btn-xs btn-status">上架</a>
              @endif
            <a title="编辑" onclick="category_edit()" href="{{url('admin/Add_Brand_edit?id=').$v->id}}"  class="btn btn-xs btn-info" >编辑</a>
            <a title="删除" href="javascript:;"  onclick="return category_del({{$v->id}})" class="btn btn-xs btn-delete"   >删除</a>
          </td>
		</tr>
           @endforeach
        </table>
           @if(request()->isMethod('post'))
               {!! $data->appends(['cat_name' => $cat_name])->render() !!}
           @else
               {!! $data->links() !!}
           @endif

	   </div>
     </div>
	</div>
  </div>
</div>
</body>
</html>

<script>

    $(function () {
        //复选框操作
        $('table th input:checkbox').on('click', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });
        });
    })
    /*全选操作*/
    $(function () {
        $('table th input:checkbox').click(function () {
            var data = [];
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                //alert(this.checked)
                if (this.checked){
                    //alert($(this).val())
                    data.push($(this).val());
                }
            })
            console.log(data)
        })
    })



	//设置内页框架布局
$(function() { 
	$("#Sellerber").frame({
		float : 'left',
		color_btn:'.skin_select',
		Sellerber_menu:'.list_content',
		page_content:'.list_show',//内容
		datalist:".datatable_height",//数据列表高度取值
		header:65,//顶部高度
		mwidth:350,//宽度自定义
		minStatue:true,
		
	});
});
function generateOrders(id){
	window.location.href = "Brand_detailed.html?="+id;
};
/*品牌-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*产品-停用*/
    /*产品-停用*/
    function member_stop(obj,id){
        //alert(id)
        layer.confirm('确认要下架该品牌吗？该品牌下的所有产品将全部下架。',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,'+id+')" href="javascript:;" title="上架">上架</a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
            $.ajax({
                url:"{{asset('admin/Brand_Manage')}}",
                type:"post",
                dataType:"json",
                data:{stopid:id,'_token':"{{csrf_token()}}"},
                success:function (res) {
                    if (res.code==1){
                        layer.msg(res.mess, {icon: 5});
                    }
                }
            })
        });
    }
    /*产品-启用*/
    function member_start(obj,id){
        layer.confirm('确认要上架改该品牌吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-status" onClick="member_stop(this,'+id+')" href="javascript:;" title="下架">下架</a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已上架</span>');
            $(obj).remove();
            layer.msg('已上架!',{icon: 6,time:1000});
            $.ajax({
                url:"{{asset('admin/Brand_Manage')}}",
                type:"post",
                data:{startid:id,'_token':"{{csrf_token()}}"},
                success:function (res) {
                    if (res.code==0){
                        layer.msg(res.mess, {icon: 5});
                    }
                }
            })
        });
    }

        /*产品-单删除*/
    function category_del(id){
        //alert(id)
        layer.confirm('你确定要删除吗',{
            btn:['确定','取消']
        },function () {
            $.ajax({
                url:"{{url('admin/category_del')}}",
                type:"post",
                dataType:"json",
                data:{id:id,'_token':"{{csrf_token()}}"},
                success:function (res) {
                    if(res.code==1){
                        layer.msg(res.mess, {icon: 1},function () {
                            location.href="{{url('admin/Brand_Manage')}}";
                        });
                    }else{
                        layer.msg(res.mess, {icon: 5});
                    }
                }
            })
        })
    }
    //批量删除
    $("#del_all").click(function () {
        var data=[];
        $("input[name='check[]']").each(function () {
            if (this.checked) {
                data.push($(this).val());
            }
        })
        layer.confirm('你确定要删除选中的吗',{
            btn:['确定','取消']
        },function () {
            $.ajax({
                url:"{{url('admin/category_del')}}",
                type:"post",
                dataType:"json",
                data:{data:data,'_token':"{{csrf_token()}}"},
                success:function (res) {
                    if(res.code==1){
                        layer.msg(res.mess, {icon: 1},function () {
                            location.href="{{url('admin/Brand_Manage')}}";
                        });
                    }else{
                        layer.msg(res.mess, {icon: 5});
                    }
                }
            })
        })
    })


	//设置时间
laydate({
    elem: '#start',
    event: 'focus' 
});
</script>
 <script type="text/javascript">
        require.config({
            paths: {
                echarts: './js/dist'
            }
        });
        require(
            [
                'echarts',
                'echarts/chart/pie',   // 按需加载所需图表，如需动态类型切换功能，别忘了同时加载相应图表
                'echarts/chart/funnel'
            ],
            function (ec) {
                var myChart = ec.init(document.getElementById('main'));
			
			option = {
    title : {
        text: '国内国外品牌比例',
        subtext: '',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        y : 'bottom',
		x:'center',
		bottom:30,
        data:['国内品牌','国外品牌']
    },
    toolbox: {
        show : false,
        feature : {
            mark : {show: false},
            dataView : {show: false, readOnly: false},
            magicType : {
                show: true, 
                type: ['pie', 'funnel'],
                option: {
                    funnel: {
                        x: '25%',
                        width: '50%',
                        funnelAlign: 'left',
                        max: 545
                    }
                }
            },
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    series : [
        {
            name:'品牌数量',
            type:'pie',
            radius : '45%',
            center: ['50%', '50%'],
            data:[
                {value:335, name:'国内品牌'},
                {value:210, name:'国外品牌'},

            ]
        }
    ]
};
   myChart.setOption(option);
}
);
</script>