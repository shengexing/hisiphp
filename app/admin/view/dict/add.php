<form class="layui-form" action="{:url()}" method="post" id="editForm">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>{$title}</legend>
</fieldset>
<div class="page-form">
    {if condition="$type eq 2"}
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">父栏目类型：</label>
            <div class="layui-input-inline">
                <select name="pid" type="select" lay-verify="required">
                    <option value="">请选择...</option>
                    {volist name="pdata" key = "pk" id="pt"}
                        {if condition="$pt['status'] eq 1"}
                        <option value="{$pk}">{$pt['title']}</option>
                        {/if}
                    {/volist}
                </select>
            </div>
        </div>
    {/if}

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">名称：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="title" lay-verify="required" autocomplete="off" placeholder="名称（必填）">
        </div>
    </div>

     {if condition="$type eq 3 or $type eq 4"}
        <div class="layui-form-item" id="img_box">
            <label class="layui-form-label layui-form-project">图片：</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="">请上传许可证图片</button>
                <input type="hidden" class="upload-input" name="img" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc"  height="50">
            </div>   
        </div>
    {/if}

    {if condition="$type eq 4"}
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">所属类别：</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-type" name="type" value="1" title="重大产业项目" checked>
                <input type="radio" class="field-type" name="type" value="2" title="十类重点工程">
            </div>
        </div>

         <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content"></textarea>
            </div>
        </div>
    {/if}

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="dict" value = {$dict}>
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('dict/detail?dict='.$dict)}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}
{if condition="$type eq 4"}
{:editor(['ckeditor'], 'ckeditor')}
{/if}
<script>
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

