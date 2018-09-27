<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp/app/admin\view\publics\index.php";i:1534059836;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>经开区信息项目综合管理系统</title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/admin/js/layui/css/layui.css">
    <style type="text/css">
        body{background-color:#f5f5f5;}
        .login-head{position:fixed;left:0;top:0;width:80%;height:60px;line-height:60px;background:#000;padding:0 10%;}
        .login-head h1{color:#fff;font-size:20px;font-weight:600}
        .login-box{ width:400px; background-color:#fff; padding:15px 30px; position: absolute; margin-left:-230px; left:50%;border-radius:10px;box-shadow: 5px 5px 15px #999; overflow: hidden;}
        .login-box .layui-input{font-size:15px;font-weight:400}
        .login-box input[name="password"]{letter-spacing:5px;font-weight:800}
        .login-box .layui-btn{width:100%;}
        .login-box .copyright{text-align:center;height:50px;line-height:20px; margin-top:15px;font-size:12px;color:#ccc}
        .login-box .copyright a{color:#ccc;}
    </style>
</head>
<body>
<!--<div class="login-head">
    <h1><?php echo config('base.site_name'); ?></h1>
</div>-->
<div class="login-big">
<div class="login-first">
<div class="login-title"></div>
<div class="login-boxfirst-big">
    <div  class="login-boxfirst" >
        <a href="javascript:void(0)" class="loginfirst" id="qydl"></a>
        <a href="javascript:void(0)" class="loginsenc" id="zfdl"></a>
    </div>
</div>
<div class="login-box layui-hide">
    <form action="<?php echo url(); ?>" method="post" class="layui-form layui-form-pane">
        <fieldset class="layui-elem-field layui-field-title">
            <legend id="login_title">管理后台登陆</legend>
        </fieldset>
        <a href="javascript:void(0)" id="back_select" class="layui-field-back">返回角色选择</a>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆账号</label>
            <div class="layui-input-block">
                <input type="text" name="username" class="layui-input" lay-verify="required" placeholder="请输入登陆账号" autofocus="autofocus" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" class="layui-input" lay-verify="required" placeholder="******" value="">
            </div>
        </div>
        <input type="hidden" id="logintype" value="logintype">
<!--    <div class="layui-form-item">
            <label class="layui-form-label">安全验证</label>
            <div class="layui-input-inline">
                <input type="text" name="code" class="layui-input">
            </div>
        </div> -->

        <a href="<?php echo url('publics/register'); ?>" class="layui-field-register layui-hide" id="regiser_box">立即注册企业账户</a>
        <?php echo token('__token__', 'sha1'); ?>
        <input type="submit" value="登陆" lay-submit="" lay-filter="formLogin" class="layui-btn">
        <div class="copyright">
        <p>© 2017-2018 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank">经开区项目管理</a> All Rights Reserved.</p>
        <p>技术支持：18737127965</p>
    </div>
    </form>
    
</div>
    <div class="login-copyright">
        <p>© 2017-2018 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank">经开区项目管理</a> All Rights Reserved.</p>
        <p>技术支持：18737127965</p>
    </div>
</div>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js"></script>
<script>
layui.config({
  base: '/hisiphp/hisiphp/static/admin/js/'
}).use('global');
</script>
<script type="text/javascript">
layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#qydl").on("click",function(){
        $(".login-boxfirst").addClass("layui-hide");
        $(".login-box").removeClass("layui-hide");
        $("#login_title").text("企业登录");
        $("#logintype").val(1);
        $("#regiser_box").removeClass("layui-hide");
    });

    $("#zfdl").on("click",function(){
        $(".login-boxfirst").addClass("layui-hide");
        $(".login-box").removeClass("layui-hide");
        $("#login_title").text("政府职能部门登录");
         $("#regiser_box").addClass("layui-hide");
    });

    $("#back_select").on("click",function(){
        $(".login-boxfirst").removeClass("layui-hide");
        $(".login-box").addClass("layui-hide");
    });
});


layui.define('form', function(exports) {
    var $ = layui.jquery, layer = layui.layer, form = layui.form;
    form.on('submit(formLogin)', function(data) {
        var _form = $(this).parents('form');
        layer.msg('数据提交中...',{time:500000});
        $.ajax({
            type: "POST",
            url: _form.attr('action'),
            data: _form.serialize(),
            success: function(res) {
                layer.msg(res.msg, {},function() {
                    if (res.code == 1) {
                        if (typeof(res.url) != 'undefined' && res.url != null && res.url != '') {
                            location.href = res.url;
                        } else {
                            location.reload();
                        }
                    } else {
                        location.reload();
                    }
                });
            }
        });
        return false;
    });
});
</script>
</body>
</html>