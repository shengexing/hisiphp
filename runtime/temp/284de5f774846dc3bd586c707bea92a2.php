<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp/app/admin\view\publics\register.php";i:1537497737;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>企业注册账户-经开区信息项目综合管理系统</title>
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
<div class="login-box">
    <div class="layui-form layui-form-pane">
        <fieldset class="layui-elem-field layui-field-title">
            <legend id="login_title">企业注册账户</legend>
        </fieldset>
        <a href="<?php echo url('publics/index'); ?>"class="layui-field-back">返回登陆</a>
        <div class="layui-form-item">
            <label class="layui-form-label">企业名称</label>
            <div class="layui-input-block">
                <input type="text" name="entername" id="entername" class="layui-input" lay-verify="required" placeholder="请输入企业名称" autofocus="autofocus" value="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">营业执照号</label>
            <div class="layui-input-block">
                <input type="text" name="licence" id="licence" class="layui-input" lay-verify="required" placeholder="请输入营业执照号" autofocus="autofocus" value="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-block">
                <input type="text" name="mobile" id="mobile" class="layui-input" lay-verify="required" placeholder="请输入手机号" autofocus="autofocus" value="">
            </div>
        </div>

		<div class="layui-form-item">
            <label class="layui-form-label">手机验证码</label>
            <div class="layui-input-inline" style="width:150px;">
                <input type="text" name="mcode" id="mcode" class="layui-input" lay-verify="required">
            </div>
            <div class="layui-input-inline" style="width:120px;">    
               <button type="button" class="layui-btn layui-sendsms " id="sendsms">获取验证码</button>
            </div>
        </div>
        <?php echo token('__token__', 'sha1'); ?>
        <input type="submit" value="立即注册" id="register_btn" class="layui-btn">
        <div class="copyright">
        <p>© 2017-2018 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank">经开区项目管理</a> All Rights Reserved.</p>
        <p>技术支持：18737127965</p>
    </div>
</div>
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
function isMcode(str) {
	var reg = /^[0-9]{6}$/;
	return reg.test(str);
}

 function isTelephone(telephone) {
	var reg = /^(13\d{9})$|(14\d{9})$|(15\d{9})$|(17\d{9})$|(18\d{9})$|(19\d{9})$/;
	return reg.test(telephone)
}


layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#register_btn").bind("click",function(){
        var entername = $.trim($("#entername").val()),
            licence = $.trim($("#licence").val()),
            mobile = $.trim($("#mobile").val()),
            mcode = $.trim($("#mcode").val()),
            r = Math.random();
        if (entername.length <= 0) {
            layer.tips("请填写公司名称",$("#entername"));
        } else if (licence.length <= 0) {
            layer.tips("请填写营业执照号",$("#licence"));
        } else if ( !isTelephone(mobile) ) {
            layer.tips("请确认手机号是否正确",$("#mobile"));
        } else if ( !isMcode(mcode) ) {
            layer.tips("请确认手机验证码是否正确",$("#mcode"));
        } else {
            layer.load("企业账户注册中·····");
            $("#register_btn").attr("disabled","disabled");
            $.ajax({
                type: "POST",
                url: '<?php echo url("publics/register"); ?>',
                data: {entername:entername,licence:licence,mcode:mcode,mobile:mobile,r:r},
                success: function(data) {
                    layer.closeAll();
                    if ( data.code == 0 ) {
                        layer.confirm(data.msg, {
                          btn: ['立即登录','取消'] //按钮
                        }, function(){
                            location.href = '<?php echo url("publics/index"); ?>'
                        }, function(){
                            layer.closeAll();
                        });  
                    } else {
                        $("#register_btn").removeAttr("disabled");
                        $("#sendsms").removeClass("layui-hassend").addClass("layui-sendsms").val("重新发送").removeAttr("disabled");
                        layer.msg(data.msg);
                    }
                },
                dataType:'json'
            });
        }
    });

   	$("#sendsms").bind("click",function(){
   		var mobile = $.trim($("#mobile").val()),
   			r = Math.random();
   		if ( isTelephone(mobile) ) {
   			$("#sendsms").addClass("layui-hassend").removeClass("layui-sendsms").val("发送中····").attr("disabled","disabled");
   			$.ajax({
	            type: "POST",
	            url: '<?php echo url("publics/sendsms"); ?>',
	            data: {mobile:mobile,r:r},
	            success: function(data) {
	                if ( data.code == 0 ) {
	                	$("#sendsms").val("已发送");
	                } else {
	                	$("#sendsms").removeClass("layui-hassend").addClass("layui-sendsms").val("重新发送").removeAttr("disabled");
	                }
	                layer.tips(data.msg,$("#sendsms"));
	            },
	            dataType:'json'
        	});
   		} else {
   			layer.tips("请确认手机号是否正确",$("#mobile"));
   		}
   	});
});
</script>
</body>
</html>