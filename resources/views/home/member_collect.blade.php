<html xmlns="http://www.w3.org/1999/xhtml" class="hb-loaded">
     <meta charset="utf-8"/>
  <title>个人中心 - 我的收藏</title> 

  <script src="js/jquery.js" type="text/javascript"></script> 
  <script src="js/index.js?virsion=1.3.7.2" type="text/javascript"></script>
   <link href="css/same.css?v=1.3.7.2" type="text/css" rel="stylesheet" /> 
  <link href="css/member.css?v=1.3.6.0" type="text/css" rel="stylesheet" /> 
  <script type="text/javascript" src="js/member.js"></script> 
  <script type="text/javascript">
        function deleteFavorites(id) {
            if (confirm("确定删除收藏？")) {
                $.get("/nAPI/favorites.ashx?action=delete&id=" + id, function (msg) {
                    if (msg != "") {
                        alert(msg);
                    }
                    else {
                        $("#myf" + id).remove();
                    }
                },"text");
            }
        }
        function GetUrl(pid, myparm, type) {
            $.get("/nAPI/favorites.ashx?action=geturl", { type: type,myparm:myparm, pid: pid }, function (data) {
                window.location.href = data;
            });
        }
    </script>

</head>
<body>
    <!--头部-->
    @include('home.public.header')
    <!--头部end--> 
    <!--导航-->
    @include('home.public.nav')
    <!--导航end--> 
    <script type="text/javascript">
    function logout() {
        if (window.confirm('确定退出吗？')) {

            $.get("/nAPI/QuitExit.ashx", function (data) {
                window.location.href = "/";
            });
        }
    }
</script>
    @section('content')
    <div class="cort"> 
     <div class="cort"> 
      <div class="tobuy cmain"> 
       <div class="cmain mb_back"> 
        <div class="zbk_top spalid"> 
         <span>您当前的位置：</span> 
         <span id="ctl00_content_website_SiteMapPath1"><a href="#ctl00_content_website_SiteMapPath1_SkipLink"></a><span> <a target="_blank" href="index.html">Darry Ring</a> </span><span> <em>&gt;</em> </span><span> <a target="_blank" href="member_index.html">我的DR</a> </span><span> <em>&gt;</em> </span><span> <span>我的收藏</span> </span><a id="ctl00_content_website_SiteMapPath1_SkipLink"></a></span> 
        </div> 
        <div class="member_cort"> 
         <div class="member_cort-left fl"> 
          <!--我的DR--> 
          <div class="member_cortleft-tittle"> 
           <i class="mb_home"></i>
           <a rel="nofollow" href="member_index.html">我的DR</a> 
          </div> 
          <!--我的DR end--> 
          <ul class="member_cort-ul"> 
           <li> <h3> -订单中心-</h3> 
            <ul class="member_ul-dr"> 
             <li id="ctl00_content_ucmemberleft_order"><a rel="nofollow" href="member_order.html">我的订单</a></li> 
             <li id="ctl00_content_ucmemberleft_ask"><a rel="nofollow" href="/member/myevaluate.html">我要评价</a></li> 
             <li id="ctl00_content_ucmemberleft_cart"><a rel="nofollow" href="cart.html" target="_blank">我的购物车</a></li> 
             <li class="speacil_color" id="ctl00_content_ucmemberleft_collect"><a rel="nofollow" href="member_collect.html">我的收藏</a></li> 
             <li class="no_border" id="ctl00_content_ucmemberleft_yuyue"><a rel="nofollow" href="/member/myappointment.html">我的预约</a></li> 
            </ul> </li> 
           <li> <h3> -售后服务-</h3> 
            <ul class="member_ul-dr"> 
             <li id="ctl00_content_ucmemberleft_salAfter"><a rel="nofollow" href="/member/aftersale.html">售后办理</a></li> 
            </ul> </li> 
           <li> <h3> -帐户管理-</h3> 
            <ul class="member_ul-dr"> 
             <li id="ctl00_content_ucmemberleft_myinfo"><a rel="nofollow" href="member_info.html">个人信息</a></li> 
             <li id="ctl00_content_ucmemberleft_password"><a rel="nofollow" href="member_pwd.html">修改密码</a></li> 
             <li id="ctl00_content_ucmemberleft_address"><a rel="nofollow" href="member_addr.html">收货地址</a></li> 
             <li id="ctl00_content_ucmemberleft_li_jnr"><a href="/member/mydr_jnr.html">纪念日维护</a></li> 
             <li id="ctl00_content_ucmemberleft_zhuanshu"> <a href="/member/DarryHome.aspx"> 专属空间</a></li> 
             <li class="no_border" id="ctl00_content_ucmemberleft_news"><a rel="nofollow" href="/member/mynews.html">系统消息</a></li> 
            </ul> </li> 
          </ul> 
         </div> 
         <!--右边的主要内容--> 
         <div class="member_cort-right fr"> 
          <!--我的收藏--> 
          <div class="member_ollection"> 
           <div class="myorder-xq-news_top"> 
            <p class="fl"> 我的收藏</p> 
            <div class="member_all-nav-right fr"> 
             <span>遇到感兴趣的商品时，如果还没决定立即购买，您可以先把它放入我的收藏，以便下次的查找与购买。</span> 
            </div> 
           </div> 
           <!--收藏的table--> 
           <table cellspacing="0" cellpadding="0" border="0" class="member_ollection-table"> 
            <tbody>
             <tr class="ollection-table-trfirst"> 
              <td class="ollection-table-td1"> 商品信息 </td> 
              <td class="ollection-table-td2"> 价格 </td> 
              <td class="ollection-table-td3"> 收藏日期 </td> 
              <td class="ollection-table-td4"> 操作 </td> 
             </tr> 
             <tr id="myf29592" class="ollection-table-trsec"> 
              <td class="ollection-table-td1"> <img width="93" height="93" class="fl" src="images/2014091515351160b3d26880.jpg" /> 
               <div class="ollection-table-word fl"> 
                <p> True Love系列 简奢款</p> 
                <p> [R7001046]</p> 
                <p> 材质：18K白金,PT950</p> 
               </div> </td> 
              <td class="ollection-table-td2"> ￥11000.00</td> 
              <td class="ollection-table-td3"> <p> 2015/7/7 22:09:38 收藏</p> <p> <a href="detail.html">查看评论(7条)</a> </p> </td> 
              <td class="ollection-table-td4"> <p> <a class="ollection-join" href="detail.html">加入购物车</a> </p> <p> <a class="ollection-xq" href="detail.html">商品详情</a> </p> <p class="show_hover"> <a href="javascript:deleteFavorites(29592);">删除收藏</a> </p> </td> 
             </tr> 
            </tbody>
           </table> 
           <!--收藏的table end--> 
          </div> 
          <!--我的收藏end--> 
         </div> 
         <!--右边的主要内容end--> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!--底部--> 
    <div class="footer"> 
     <!--错误--> 
     <!--提示--> 
     <div class="loverit_word2">
      Darry Ring严格规定男士凭身份证一生仅能定制一枚，象征男人一生真爱的最高承诺。输入身份证号码即可查询购买记录。
     </div> 
     <!--提示end--> 
     <div class="loverit_wrong2">
      <p>信息填写不正确，请重新输入。</p>
     </div> 
     <!--错误end--> 
     <!--验证身份--> 
     <div class="loveit_center"> 
      <div class="love_doit2"> 
       <div class="loverit_center2"> 
        <div class="loverit_write2"> 
         <label>国家/区域:</label> 
         <select id="txtArea" style="vertical-align: middle;height:22px;"> <option value="0">中国大陆</option> <option value="1">中国香港</option> <option value="2">中国澳门</option> <option value="3">中国台湾</option> </select> 
         <label>先生姓名:</label> 
         <input type="text" class="lit_txt" id="textName2" /> 
         <label>身份证号码:</label> 
         <input type="text" class="lit_txt" id="textIDCard2" /> 
         <span id="btnsub2"></span> 
        </div> 
       </div> 
      </div> 
     </div> 
     <!--验证身份end--> 
     <div style="clear:both"></div> 
     <div class="cmain"> 
      <ul class="Service_ul"> 
       <!--每一块li--> 
       <li> 
        <div class="Service_ul-img"> 
         <a href="index.html/help_ab/51.html" rel="nofollow"></a> 
        </div> <a href="index.html/help_ab/51.html" rel="nofollow"><p>权威认证</p></a> </li> 
       <!--每一块li--> 
       <li> 
        <div class="Service_ul-img bk_2"> 
         <a href="index.html/help_se/81.html" rel="nofollow"></a> 
        </div> <a href="index.html/help_se/81.html" rel="nofollow"><p> 一钻双证</p></a> </li> 
       <!--每一块li--> 
       <li> 
        <div class="Service_ul-img bk_3"> 
         <a href="index.html/help_se/80.html" rel="nofollow"></a> 
        </div> <a href="index.html/help_se/80.html" rel="nofollow"> <p> 终生保养</p></a> </li> 
       <!--每一块li--> 
       <li> 
        <div class="Service_ul-img bk_4"> 
         <a href="index.html/help_se/82.html" rel="nofollow"></a> 
        </div> <a href="index.html/help_se/82.html" rel="nofollow"> <p> 以小换大</p></a> </li> 
       <!--每一块li--> 
       <li> 
        <div class="Service_ul-img bk_5"> 
         <a href="index.html/help_se/84.html" rel="nofollow"></a> 
        </div> <a href="index.html/help_se/84.html" rel="nofollow"> <p> 15天退换</p></a> </li> 
       <!--每一块li--> 
       <li> 
        <div class="Service_ul-img bk_6"> 
         <a href="index.html/help/74.html" rel="nofollow"></a> 
        </div> <a href="index.html/help/74.html" rel="nofollow"> <p> 全国免运费</p></a> </li> 
       <!--每一块li--> 
       <li> 
        <div class="Service_ul-img bk_7"> 
         <a href="index.html/help_se/83.html" rel="nofollow"></a> 
        </div> <a href="index.html/help_se/83.html" rel="nofollow"><p> 全程保险</p></a> </li> 
      </ul> 
      <!--服务条款--> 
      <div class="service"> 
       <!--二维码--> 
       <div class="erwei fl"> 
        <img width="90" height="90" alt="Darry Ring 官方微信" src="images/erwei.jpg" /> 
       </div> 
       <!--中间的联系方式--> 
       <div class="know_right fl"> 
        <p> 24小时全国免费服务热线</p> 
        <img width="171" height="32" src="images/tel.jpg" /> 
        <p class="theshare"> <span>关注我们：</span> <a class="wb" target="_blank" href="http://weibo.com/13520comcn" rel="nofollow"></a> <a class="rr" target="_blank" href="http://e.t.qq.com/DarryRing" rel="nofollow"></a> <a class="qzone" target="_blank" title="QQ空间" href="http://user.qzone.qq.com/2678181289/" rel="nofollow"></a> </p> 
       </div> 
       <!--左边的服务条款--> 
       <ul class="Service_know fr"> 
        <!--每一块li--> 
        <li> <h3> 关于我们</h3> <p> <a target="_blank" href="index.html/help_ab/66.html" rel="nofollow">权威认证</a></p> <p> <a target="_blank" href="index.html/help_ab/68.html" rel="nofollow">商务合作</a></p> <p> <a target="_blank" href="index.html/help_ab/70.html" rel="nofollow">加入我们</a></p> </li> 
        <!--每一块li--> 
        <li> <h3> 关于购买</h3> <p> <a target="_blank" href="index.html/help/72.html" rel="nofollow">购买流程</a></p> <p> <a target="_blank" href="index.html/help/73.html" rel="nofollow">支付方式</a></p> <p> <a target="_blank" href="index.html/help/74.html" rel="nofollow">配送流程</a></p> </li> 
        <!--每一块li--> 
        <li> <h3> 关于退换</h3> <p> <a target="_blank" href="index.html/help/75.html" rel="nofollow">退货流程</a></p> <p> <a target="_blank" href="index.html/help/76.html" rel="nofollow">办理售后</a></p> <p> <a target="_blank" href="index.html/help_se/84.html" rel="nofollow">15天退换</a></p> </li> 
        <!--每一块li--> 
        <li> <h3> 帮助中心</h3> <p> <a target="_blank" href="index.html/help/71.html" rel="nofollow">注册流程</a></p> <p> <a href="javascript:showxiaon();" rel="nofollow">联系客服</a></p> <p> <a target="_blank" href="index.html/help/78.html" rel="nofollow">网站地图</a></p> </li> 
        <!--每一块li--> 
        <li> <h3> 服务条款</h3> <p> <a target="_blank" href="index.html/help_se/80.html" rel="nofollow">终生保养</a></p> <p> <a target="_blank" href="index.html/help_se/85.html" rel="nofollow">注册协议</a></p> <p> <a target="_blank" href="index.html/help_se/86.html" rel="nofollow">隐私声明</a></p> </li> 
        <!--每一块li--> 
        <li> <h3> DR服务</h3> <p> <a target="_blank" href="/proposelist.aspx?id=18">钻石百科</a></p> <p> <a target="_blank" href="/news/index.aspx">产品百科</a></p> <p> <a target="_blank" href="/propose.aspx">求婚指南</a></p> </li> 
       </ul> 
      </div> 
      <!--条文--> 
      <div class="auto" id="Menu_Service"> 
      </div> 
      <div class="tw-foot"> 
       <div class="auto" id="Copyright"> 
        <p> Copyright &copy; 2006-2015 www.darryring.com 深圳市戴瑞珠宝有限公司 All Rights Reserved. 粤ICP备11012085号-2.ICP经营许可证粤B2-20140279 </p> 
        <p> 中国互联网违法信息举报中心 | 中国公安网络110报警服务 | 本网站提供所售商品的正式发票 </p> 
       </div> 
      </div> 
     </div> 
    </div> 
    <div class="model" id="model"> 
     <div class="Prompt" id="Prompt"> 
     </div> 
     <span id="log_uid" style="display:none"></span> 
     <span id="log_uname" style="display:none"></span> 
     <span id="log_orderid" style="display:none"></span> 
     <span id="log_price" style="display:none"></span> 
    </div> 
    <script src="http://wpa.b.qq.com/cgi/wpa.php" charset="utf-8" type="text/javascript"></script> 
    <!--客服(2014年8月29日)--> 
    <div style="display:none" class="Ffloat_kf"> 
     <div class="fkf_top"> 
      <div style="cursor: pointer; display: none;" id="bridgehead"> 
      </div> 
      <div id="BizQQWPA"></div> 
      <div onClick="showModel(modelsever);" style="cursor: pointer;" class="qq_hover" id="qqTalk_head"> 
      </div> 
      <div id="BizQQWPAB" class="sh"> 
      </div> 
      <div id="bdBridge"> 
       <a href="javascript:NTKF.im_openInPageChat()"> <img width="75" height="37" src="images/zx.jpg" /></a>
      </div> 
     </div> 
     <div class="fkf_bottom"> 
      <img width="92" height="82" alt="Darry Ring 官方微信" src="images/to_erwei.jpg" /> 
      <a href="#"> <img width="92" height="26" src="images/db.jpg" /></a> 
     </div> 
    </div> 
    <!--新版右边客服start--> 
    <!--右边漂浮悬挂大的--> 
    <div class="float_big"> 
     <div class="floatbig_hide fr"></div> 
     <div class="floatbig_center"> 
      <!--客服--> 
      <div onClick="javascript:NTKF.im_openInPageChat();" id="Bearonline" class="floatbig_center-kf"></div> 
      <!--客服end--> 
      <!--定制咨询--> 
      <div id="dzzxonline" class="floatbig_center-zx"> 
       <a href="javascript:showModel(modelsever);"></a> 
      </div> 
      <!--定制咨询end--> 
      <img src="images/ew.jpg" /> 
     </div> 
    </div> 
    <!--右边漂浮悬挂大的end--> 
    <!--右边漂浮悬挂小的--> 
    <div class="float_small"> 
     <div class="floatbig_show fr"></div> 
     <div class="floatbig_center"> 
      <!--客服--> 
      <div onClick="javascript:NTKF.im_openInPageChat();" class="floatsmall_center-kf fr"></div> 
      <!--客服end--> 
      <!--定制咨询--> 
      <div class="floatsmall_center-zx fr"> 
       <a href="javascript:showModel(modelsever);"></a> 
      </div> 
      <!--定制咨询end--> 
      <!--二维码--> 
      <div class="floatsmall_erwei fr"> 
       <a href="#"></a> 
      </div> 
      <!--二维码end--> 
     </div> 
    </div> 
    <!--右边漂浮悬挂小的end--> 
    <!--返回顶部--> 
    <div class="comeback"></div> 
    <!--返回顶部end--> 
    <!--新版右边客服end--> 
    <div style="position: fixed; cursor: pointer; right: 6px; top: 289px; padding-bottom: 152px; z-index: 9999; width: 19px; height: 103px; display: none;" onClick="openserver();" id="openbnt"> 
     <img width="19" height="103" src="images/server_03.jpg" />
    </div> 
    <div class="news_tc"> 
     <div class="newtc_left"> 
     </div> 
     <div class="newtc_right"> 
      <span style="cursor: pointer" class="sszs">稍后再说</span> 
      <span class="xzzx"><a onClick="showxiaon()" style="cursor: pointer" id="chatnow"> 现在咨询</a></span> 
      <div style="cursor: pointer" class="tocclose"> 
      </div> 
     </div> 
    </div> 
    <div class="mask" id="masks"> 
    </div> 
    <div style="display:none;" class="modelsever" id="modelsever"> 
     <div class="cs_top"> 
      <div class="cs_topcenter">
       <div style="width:300px; height:40px; line-height:40px; float:left; display:inline-block; ">
        顾客常见疑问
       </div> 
       <div style="width:385px; height:20px; float:left; text-align:right; padding-top:20px;"> 
        <img width="55" height="9" style="cursor: pointer;" onClick="CloseMaskser()" src="images/popup_window_btn_close.gif" /> 
       </div> 
      </div> 
     </div> 
     <div class="cs_content clear"> 
      <ul> 
       <li onClick="showbox(1)" id="li1">官网店铺</li>
       <li class="line">/</li> 
       <li onClick="showbox(2)" id="li2">真爱疑问</li>
       <li class="line">/</li> 
       <li onClick="showbox(3)" id="li3">购买限制</li>
       <li class="line">/</li> 
       <li onClick="showbox(4)" id="li4">产品疑问</li>
       <li class="line">/</li> 
       <li onClick="showbox(5)" id="li5">关于定制</li>
       <li class="line">/</li> 
       <li onClick="showbox(6)" id="li6">关于运输</li>
       <li class="line">/</li> 
       <li onClick="showbox(7)" id="li7">关于售后</li> 
      </ul> 
      <div id="box1" class="box1"> 
       <div onClick="contenttxt(1,1)" id="content_title_11" class="content_title">
        <span style="margin-top:8px;">Q：Darry Ring 是否有实体店？</span>
       </div> 
       <div id="content_title1_1" class="content_txt">
        <span style="margin-top:1px;">A：DR公司总部在香港，目前内地深圳市、北京市、重庆市、广州市、上海市、武汉市、南京市、长沙市设有实体店，支持到店订购，也支持全国在线官网订购。同时目前其他一线城市公司已在考察选址阶段，将陆续开设店面。</span>
       </div> 
       <div onClick="contenttxt(1,2)" id="content_title_12" class="content_title">
        <span style="margin-top:8px;">Q：实体店具体位置？</span> 
       </div> 
       <div id="content_title1_2" class="content_txt">
        <span style="margin-top:1px;">A：深圳实体店地址：深圳南山区世界之窗旁欧陆小镇4号楼Darry Ring （地铁罗宝线世界之窗I出口）深圳店联系方式：0755-86621782。<p></p> 北京实体店地址：北京东二环朝阳门桥银河SOHO中心B座负一层2-109 （朝阳门地铁G出口） 北京店联系方式：010-59576758。<p></p> 上海实体店地址：上海长宁区淮海西路570号红坊创意园区G-108栋(近虹桥路) 上海店联系方式：021-60934520。<p></p> 广州实体店地址：广州市天河区天河北路233号中信广场商场136单元 广州店联系方式：020-38836315。<p></p> 重庆实体店地址：重庆市渝中区解放碑步行街民族路188号环球金融中心（WFC）LG-B02A 重庆店联系方式：023-63710835。<p></p> 武汉实体店地址：武汉市洪山区光谷意大利风情街5号楼一层51021号 武汉店联系方式：027-87688895。<p></p> 南京实体店地址：南京市长江路288号1912街区17号楼一层 南京店联系方式：025-83613520。<p></p> 长沙实体店地址：长沙市开福区中山路589号万达百货商场2楼 长沙店联系方式：0731-83878575。<p></p> 全国400客服热线：400 01 13520。</span>
       </div> 
       <div onClick="contenttxt(1,3)" id="content_title_13" class="content_title">
        <span style="margin-top:8px;">Q：到店订购和官网订购的价格一致吗？</span>
       </div> 
       <div id="content_title1_3" class="content_txt">
        <span style="margin-top:1px;">A：DR的所有商品，到店订购和官网订购的时间周期，价格，质量及售后服务均一致。</span> 
       </div> 
       <div onClick="contenttxt(1,4)" id="content_title_14" class="content_title">
        <span style="margin-top:8px;">Q：价格是否有折扣优惠？</span>
       </div> 
       <div id="content_title1_4" class="content_txt">
        <span style="margin-top:1px;">A：DR的品牌寓意为一生唯一真爱，大多是用作见证彼此求婚或结婚这一神圣时刻，所以所有商品都是常年任何节假日没有折扣活动，就像彼此一生唯一真爱的承诺及永恒的爱情，永不打折。</span> 
       </div> 
       <div onClick="contenttxt(1,5)" id="content_title_15" class="content_title">
        <span style="margin-top:8px;">Q：为什么在官网上输入姓名身份证号后看不到款式？</span>
       </div> 
       <div id="content_title1_5" class="content_txt">
        <span style="margin-top:1px;">A：www.darryring.com 官网首页点击—求婚钻戒，进入页面后不需要填写任何信息，移动鼠标到最下方，就可以看到Darry Ring女戒的所有款式。</span> 
       </div> 
       <div onClick="contenttxt(1,6)" id="content_title_16" class="content_title">
        <span style="margin-top:8px;">Q：到实体店是否可以立刻拿到戒指？</span>
       </div> 
       <div id="content_title1_6" class="content_txt">
        <span style="margin-top:1px;">A：您好，DR的所有商品都是需要根据您选择的款式、手寸大小及刻字信息来定制。实体店仅提供款式体验及预订，与官网购买的定制时间是一致的，可于15-20个工作日内送到或自取。</span> 
       </div> 
      </div> 
      <div id="box2" class="box2"> 
       <div onClick="contenttxt(2,1)" id="content_title_21" class="content_title"></div> 
       <div id="content_title2_1" class="content_txt"></div> 
       <div onClick="contenttxt(2,2)" id="content_title_22" class="content_title"></div> 
       <div id="content_title2_2" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(2,3)" id="content_title_23" class="content_title"></div> 
       <div id="content_title2_3" class="content_txt"> 
       </div> 
       <!--<div class="content_title"  onclick="contenttxt(2,4)">4、Q：LES可以购买吗？</div>
<div class="content_txt" id="content_title2_4">A：真爱不分性别，只要确定了对方就是您这辈子的真爱，同时您愿意为此绑定自己的身份证信息，那
么DR不会限制您追求真爱的自由，您同样是可以购买到Darry Ring的真爱女戒。

</div>--> 
       <div onClick="contenttxt(2,4)" id="content_title_24" class="content_title"></div> 
       <div id="content_title2_4" class="content_txt"> 
       </div> 
      </div> 
      <div id="box3" class="box3"> 
       <div onClick="contenttxt(3,1)" id="content_title_31" class="content_title"></div> 
       <div id="content_title3_1" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(3,2)" id="content_title_32" class="content_title"></div> 
       <div id="content_title3_2" class="content_txt"></div> 
       <div onClick="contenttxt(3,3)" id="content_title_33" class="content_title"></div> 
       <div id="content_title3_3" class="content_txt"></div> 
       <div onClick="contenttxt(3,4)" id="content_title_34" class="content_title"></div> 
       <div id="content_title3_4" class="content_txt"></div> 
      </div> 
      <div id="box4" class="box4"> 
       <div onClick="contenttxt(4,1)" id="content_title_41" class="content_title"></div> 
       <div id="content_title4_1" class="content_txt"></div> 
       <div onClick="contenttxt(4,2)" id="content_title_42" class="content_title"></div> 
       <div id="content_title4_2" class="content_txt"></div> 
       <div onClick="contenttxt(4,3)" id="content_title_43" class="content_title"></div> 
       <div id="content_title4_3" class="content_txt"></div> 
       <div onClick="contenttxt(4,4)" id="content_title_44" class="content_title"></div> 
       <div id="content_title4_4" class="content_txt"></div> 
      </div> 
      <div id="box5" class="box5"> 
       <div onClick="contenttxt(5,1)" id="content_title_51" class="content_title"></div> 
       <div id="content_title5_1" class="content_txt"></div> 
       <div onClick="contenttxt(5,2)" id="content_title_52" class="content_title"></div> 
       <div id="content_title5_2" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(5,3)" id="content_title_53" class="content_title"></div> 
       <div id="content_title5_3" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(5,4)" id="content_title_54" class="content_title"></div> 
       <div id="content_title5_4" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(5,5)" id="content_title_55" class="content_title"></div> 
       <div id="content_title5_5" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(5,6)" id="content_title_56" class="content_title"></div> 
       <div id="content_title5_6" class="content_txt"> 
       </div> 
      </div> 
      <div id="box6" class="box6"> 
       <div onClick="contenttxt(6,1)" id="content_title_61" class="content_title"></div> 
       <div id="content_title6_1" class="content_txt"></div> 
       <div onClick="contenttxt(6,2)" id="content_title_62" class="content_title"></div> 
       <div id="content_title6_2" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(6,3)" id="content_title_63" class="content_title"></div> 
       <div id="content_title6_3" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(6,4)" id="content_title_64" class="content_title"></div> 
       <div id="content_title6_4" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(6,5)" id="content_title_65" class="content_title"></div> 
       <div id="content_title6_5" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(6,6)" id="content_title_66" class="content_title"></div> 
       <div id="content_title6_6" class="content_txt"> 
       </div> 
      </div> 
      <div id="box7" class="box7"> 
       <div onClick="contenttxt(7,1)" id="content_title_71" class="content_title"></div> 
       <div id="content_title7_1" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(7,2)" id="content_title_72" class="content_title"></div> 
       <div id="content_title7_2" class="content_txt"> 
       </div> 
       <div onClick="contenttxt(7,3)" id="content_title_73" class="content_title"></div> 
       <div id="content_title7_3" class="content_txt"> 
       </div> 
      </div> 
     </div> 
     <div id="qqku" class="cs_bottom">
       没有您关注的问题？ 
      <span onClick="javascript:window.open('http://b.qq.com/webc.htm?new=0&amp;sid=4000113520&amp;eid=218808P8z8p8P808p8R8K&amp;o=13520.com.cn&amp;q=7&amp;ref='+document.location, '_blank', 'height=10, width=10,toolbar=no,scrollbars=no,menubar=no,status=no');" style="cursor: pointer; color:#c2967e; font-size:16px; font-weight:bold;">立即联系在线客服</span> 
     </div> 
    </div> 
    <script type="text/javascript">
    function showbox(id) {
        getQeestion(id);
        for (var i = 1; i <= 8; i++) {
            if (i == id) {
                showdiv(id);
            }
            else {
                hidediv(i);
            }
        } 
    }
    function contenttxt(id, sid) {
        for (var i = 1; i <= 7; i++) {
            if (i == id) {
                showtxt(id, sid);
            }
            else {
                hidetxt(i, sid);
            }
        }


    }
    function showtxt(id, sid) {
        var objtitle = $("#content_title" + id + "_" + sid);

        if (objtitle.css("display") == "none") {
            objtitle.show("fast");
        }
        else {

            hidetxt(id, sid);
        }
        //$("#"+id).show("fast");
    }
    function hidetxt(id, sid) {
        var objtitle = $("#content_title" + id + "_" + sid);
        objtitle.hide("fast");
    }
    function hidediv(id) {
        $("#box" + id).hide("fast");

        $("#li" + id).css({ "font-size": "14px", "color": "#7d7d7d" });
    }

    function showdiv(id) {
        if ($("#box" + id).css("display") == "none") {
            $("#box" + id).show("fast");
            $("#li" + id).css({ "font-size": "18px", "color": "#000000" });
        }

    }

</script> 
    <script type="text/javascript">
    function showMask() {
        $("#masks").css("height", $(document).height());
        $("#masks").css("width", $(document).width());
        $("#masks").fadeIn();
    }
    function showModel(divName) {
        showMask();
       /* var top = ($(window).height() - $(divName).height()) / 5;
        var left = ($(window).width() - $(divName).width()) / 2;
        var scrollTop = $(document).scrollTop();
        var scrollLeft = $(document).scrollLeft();*/
        $(divName).fadeIn();
    }
    function CloseMaskser() {

        $("#modelsever").fadeOut("slow");
        $("#masks").fadeOut("slow");
        $("#mask").fadeOut("slow");
    }

</script>
    @endsection
 </body>
</html>