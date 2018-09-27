<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <blockquote class="layui-elem-quote">企业基本一经填写，不能进行修改，请确认后再提交。</blockquote>
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司名称：</label>
        <div class="layui-input-inline" style="width:500px;">
            <input type="text" class="layui-input field-company" name="company" lay-verify="required" autocomplete="off" readonly placeholder="公司名称（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司详细地址：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-address" name="address" lay-verify="required" autocomplete="off" placeholder="公司详细地址（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">营业执照：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-licence" name="licence" lay-verify="required" autocomplete="off" readonly placeholder="公司详细地址（必填）">
        </div>
    </div>

    <div class="layui-form-item" id="img_box">
        <label class="layui-form-label layui-form-project">营业执照图片：</label>
        <div class="layui-input-inline upload">
            <button type="button" name="img" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="">请上传营业执照图片</button>
            <input type="hidden" class="upload-input" name="licence_img" value="">
            <img src="" style="display:none;border-radius:5px;border:1px solid #ccc"  height="50">
        </div>   
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">法人姓名：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-legal" name="legal" lay-verify="required" autocomplete="off" placeholder="法人姓名（必填）">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">企业简介：</label>
         <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="5"  class="layui-textarea field-effect" name="notes" autocomplete="notes" placeholder="必填"></textarea>
        </div>
    </div>

  
    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
           	<button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" id="editGenerate" lay-filter="formSubmit">完善信息</button>
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}
<script>
var formData = {:json_encode($data)};

layui.use(['jquery', 'upload', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, layer = layui.layer, upload = layui.upload, form = layui.form;
    upload.render({
        elem: '.layui-upload',
        url: '{:url("admin/annex/upload?thumb=no&water=no")}'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.closeAll();
            var input = $(obj).parents('.upload').find('.upload-input');
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
});
</script>
<script src="__ADMIN_JS__/footer.js"></script>