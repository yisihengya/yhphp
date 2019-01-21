<!--顶部-->
<?php session_start()?>
<?php
    if(!isset($_SESSION['user'])){
        echo '<script>alert("请登录");location.href="login";</script>';
        die;
    }
?>
<div class="Sellerber_header apex clearfix" id="Sellerber_header">
    <div class="l_f logo header"><img src="images/logo_03.png" /></div>
    <div class="r_f Columns_top clearfix header">
        <!--<div class="time_style l_f"><i class="fa  fa-clock-o"></i><span id="time"></span></div>-->
        <div class="search_style l_f">
            <form action="#" method="get" class="sidebar_form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control"><span class="input-group-btn"><a class="btn_flat" href="javascript:" onclick=""><i class="fa fa-search"></i></a></span>
                </div>
            </form>
        </div>

        <div class="news l_f "><a href="#" class="fa fa-bell Notice prompt" id="promptbtn"></a><em>5</em></div>
        <div class="administrator l_f">
            <img src="images/avatar.png"  width="36px"/><span class="user-info"><?php echo $_SESSION['user'];?></span><i class="glyph-icon fa  fa-caret-down"></i>
            <ul class="dropdown-menu">
                <li><a href="{{url('admin/Personal_info')}}"><i class="fa fa-user"></i>个人信息</a></li>
                <li><a href="#"><i class="fa fa-cog"></i>系统设置</a></li>
                <li><a href="javascript:void(0)" id="Exit_system">退出</a></li>
            </ul>
        </div>
    </div>
</div>