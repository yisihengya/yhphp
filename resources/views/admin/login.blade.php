<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>极客商城-用户登录</title>
    <link rel="stylesheet" href="{{asset('admin_login')}}/css/base.css"/>
    <link rel="stylesheet" href="{{asset('admin_login')}}/css/login.css"/>
    <style>
         img{
             cursor: pointer;
         }
        strong{
            font-size: 12px;
            color: red;

        }
    </style>

</head>
<body>
<div id="main">
    <div id="header">
    </div>
    <div class="container">
        <div class="bgPic"><img src="{{asset('admin_login')}}/img/register/b3_1.jpg" alt=""/></div>
        <div class="register">
            <div class="title">
                <span>登录</span>

            </div>
            <div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $v)

                    @endforeach
                @endif
            </div>
            <form autocomplete="off" method="post">
                {{csrf_field()}}
                <div class="default">
                    <p>请输入用户名或手机号码</p>
                    <input id="uname" name="uname" data-form="uname" placeholder="用户名" value="{{old('uname')}}"/>
                    <strong style="position: relative;left:190px">{{$errors->first('uname')}}</strong>
                    {{--<label for="uname">用户名/手机</label>--}}
                </div>
                <div class="default">
                    <p>请输入账号密码</p>
                    <input id="upwd" name="upwd" data-form="upwd" type="password" placeholder="密码"/>
                    <strong style="position: relative;left:203px">{{$errors->first('upwd')}}</strong>
                    {{--<label for="upwd">密码</label>--}}
                </div>
                <div class="default">
                    <p>请输入验证码</p>
                    <input id="uimg" name="uimg" data-form="uimg"  placeholder="验证码"/>
                    <strong style="position: relative;left:190px;top:10px">{{$errors->first('uimg')}}</strong>


                </div>

                <div class="submit">
                    <img src="{{url('admin/code')}}" alt="" id="image" style="position: relative;top:-6px" >
                        {{--<span class="notice">--}}
                            {{--<a href="#">忘记密码</a>--}}
                        {{--</span>--}}
                    <button class="s_hover" data-form="submit">登录</button>

                </div>
            </form>

        </div>
    </div>
    <div id="footer">
    </div>
</div>

{{--验证码刷新点击功能--}}
<script src="{{asset('')}}/admin/js/jquery.js"></script>
<script>
    $(function () {
        $('#image').click(function () {
            $('#image').attr('src','{{url('admin/code?t=')}}'+new Date());
        })
    })
</script>

</body>
</html>