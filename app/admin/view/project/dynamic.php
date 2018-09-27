<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题类别：</label>
        <div class="layui-input-inline">
            <select name="qtype" lay-filter="qtype"  class='field-qtype' type="select" lay-verify="required">
                <option value="">请选择...</option>
                {volist name="dynamicType" key = "pk" id="pt"}
                    <option value="{$pk}">{$pt}</option>
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="exam_type">
        <label class="layui-form-label layui-form-project">审批类别：</label>
        <div class="layui-input-inline">
            <select name="etype" type="select" class='field-etype'>
                <option value="">请选择...</option>
                {volist name="examName" key = "pk" id="pt"}
                     {if condition="$pt['status'] eq 1"}
                        <option value="{$pt['recid']}">{$pt['title']}</option>
                    {/if}  
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="xianchang_type">
        <label class="layui-form-label layui-form-project">现场类别：</label>
        <div class="layui-input-inline">
            <select name="xtype" type="select" class='field-xtype'>
                <option value="">请选择...</option>
                {volist name="xianchang" key = "pk" id="pt"}
                    {if condition="$pt['status'] eq 1"}
                        <option value="{$pt['recid']}">{$pt['title']}</option>
                    {/if}  
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">涉及部门：</label>
        <div class="layui-input-inline"  style="width:850px">
            {volist name="examUnit" key = "pk" id="pt"}
                <input type="checkbox" value="{$pt['recid']}"
                    class="layui-input field-capital capital-checkbox" lay-skin="primary"
                    {if condition="$pt['checked'] eq 1"}checked{/if} title="{$pt['title']}"
                     name="qespunit[]">
            {/volist}
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题描述：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="3"  class="layui-textarea field-notes" name="notes" autocomplete="off" lay-verify="required" placeholder="备注"></textarea>
        </div>
    </div>  

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">期望解决时间：</label>
        <div class="">
            <input type="text" class="layui-input field-expire_time exceptdate field-exceptdate" name="exceptdate"
            autocomplete="off" placeholder="期望解决时间" 
            onclick="layui.laydate({elem:this,format:'yyyy-mm'})"  lay-verify="required" readonly>
        </div>

    </div>
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">协商完成时间：</label>
        <div >
            <input type="text" class="layui-input field-expire_time consultdate field-consultdate" name="consultdate"
                   autocomplete="off" placeholder="协商完成时间"
                   onclick="layui.laydate({elem:this,format:'yyyy-MM'})" readonly>
        </div>
    </div>

    {if condition = "$showstatus eq 1"}
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">状态</label>
            <div class="layui-input-inline w300">
                <input type="radio" class="" name="status" {if condition="$status eq 0"} checked {/if} value="0" title="已处理" >
                <input type="radio" class="" name="status" {if condition="$status eq 1"} checked {/if} value="1" title="未处理" >
            </div>
        </div>
    {/if}  

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="{$proid}">
            <input type="hidden" name="recid" value="{$recid}">
            <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" lay-filter="formSubmit">提交问题</button>
            <a href="{:url('project/dynalist?proid='.$proid)}"  style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}
<script>
var formData = {:json_encode($dynamic)};
layui.use(['jquery', 'form', 'upload', 'laydate'], function() {
    var $ = layui.jquery,laydate = layui.laydate, form = layui.form, layer = layui.layer, upload = layui.upload;
    
    laydate.render({
        elem: '.exceptdate',
        format:'yyyy.M.d'
    });

    laydate.render({
        elem: '.consultdate',
        format:'yyyy.M.d'
    });

    if ( formData.qtype == 1 ) {
        $("#xianchang_type").removeClass("hide");
    }
    if ( formData.qtype == 2 ) {
        $("#exam_type").removeClass("hide");
    }

    form.on('select(qtype)', function(data){
       $("#exam_type").addClass("hide");
       $("#xianchang_type").addClass("hide");
       console.log(data.value)
       if (data.value == 1) {
            $("#xianchang_type").removeClass("hide");
       } 
       if (data.value == 2) {
       		$("#exam_type").removeClass("hide");
       } 
    }); 
});
</script>
<script src="__ADMIN_JS__/footer.js"></script>