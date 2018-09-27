<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item" id="exam_name">
        <label class="layui-form-label layui-form-project">审批类型：</label>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$examName}>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">审批进度：</label>
        <div class="layui-input-inline" id="status_box">
            {if condition="$type eq 1"}<input readonly type="text" class="layui-input layui-noborder" value='未提交'>{/if}

            {if condition="$type eq 2"}<input readonly type="text" class="layui-input layui-noborder" value='进行中'>{/if}

            {if condition="$type eq 3"}<input readonly type="text" class="layui-input layui-noborder" value='已完成'>{/if}

             <input type="hidden" name="status" value="{$type}">
        </div>
    </div>
   

    <div class="layui-form-item hide" id="qespunit_box">
        <label class="layui-form-label layui-form-project">涉及单位：</label>
        <div class="layui-input-inline" style="width:750px">
            {volist name="unitData" key = "pk" id="pt"}
                <input type="checkbox" value="{$pt.recid}" 
                    class="layui-input field-capital capital-checkbox" name="qespunit[]">{$pt.title}
            {/volist}
        </div>
    </div>

    <div class="layui-form-item hide" id="punit_box">
        <label class="layui-form-label layui-form-project">终审部门：</label>
        <div class="layui-input-inline">
             <select name="punit" type="select" lay-filter="punit">
                <option value="">请选择...</option>
                {volist name="lastexam" key = "pk" id="pt"}
                    <option value="{$pk}">{$pt}</option>
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item hide"  id="permit_box">
        <label class="layui-form-label layui-form-project">许可证号：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="permit" autocomplete="off" placeholder="许可证号（必填）">
        </div>
    </div>

    <div class="layui-form-item hide" id="img_box">
        <label class="layui-form-label layui-form-project">许可证图片：</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="">请上传许可证图片</button>
            <input type="hidden" class="upload-input" name="img" value="">
            <img src="" style="display:none;border-radius:5px;border:1px solid #ccc"  height="50">
        </div>   
    </div>


     <div class="layui-form-item hide"  id="time_box">
        <label class="layui-form-label layui-form-project">审核时间：</label>
        <div class="">
            <input type="text" class="layui-input field-expire_time examtime field-examtime" name="examtime" 
            autocomplete="off" placeholder="审核时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
        </div>
    </div>

    <div class="layui-form-item hide" id="notes_box">
        <label class="layui-form-label layui-form-project" id="notename">原因：</label>
        <div class="layui-input-block">
            <textarea rows="3"  colspan="500" class="layui-textarea" name="notes" autocomplete="off" placeholder=""></textarea>
        </div>
    </div>    

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="ptype" value = {$ptype}>
            <input type="hidden" class="field-id" name="proid" value = {$proid}>
           
            <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" lay-filter="formSubmit">提交审批</button>
            {if $step >= 60}
            <a href="{:url('project/reexamlist?proid='.$proid)}"  style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid ml10"><i class="aicon ai-fanhui"></i>返回</a>
            {else}
            <a href="{:url('project/examlist?proid='.$proid)}"  style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid ml10"><i class="aicon ai-fanhui"></i>返回</a>
            {/if}
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}

<script>
var type = {$type};
layui.use(['jquery', 'laydate', 'upload', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, layer = layui.layer, upload = layui.upload, form = layui.form;
    
    laydate.render({
        elem: '.examtime',
        format:'yyyy.M.d'
    });

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

    function dealStatus(status) {
        $("#punit_box").addClass("hide");
        $("#permit_box").addClass("hide");
        $("#img_box").addClass("hide");
        $("#time_box").addClass("hide");
        $("#notes_box").removeClass("hide");
        if ( status == 1 ) {
            $("#notename").html("原因：");
            $("#qespunit_box").removeClass("hide");
        } else if ( status == 2 ) {
            $("#notename").html("办理进程：");
            $("#qespunit_box").removeClass("hide");
        } else if ( status == 3 ) {
            $("#qespunit_box").addClass("hide");
            $("#punit_box").removeClass("hide");
            $("#permit_box").removeClass("hide");
            $("#img_box").removeClass("hide");
            $("#time_box").removeClass("hide");
            $("#notename").html("备注：");
        }
    }


    form.on('select(status)', function(data){
        var status = data.value;
        dealStatus(status);
    }); 
    dealStatus(type);
});
</script>