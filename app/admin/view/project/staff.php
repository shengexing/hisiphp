<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目负责人：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-lead_realname" name="lead_realname" lay-verify="required" autocomplete="off" placeholder="姓名（必填）">
        </div>

         <div class="layui-input-inline">
            <input type="text" class="layui-input field-lead_mobile" name="lead_mobile" lay-verify="required" autocomplete="off" placeholder="手机号（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目联络员：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-liaison_realname" name="liaison_realname" lay-verify="required" autocomplete="off" placeholder="姓名（必填）">
        </div>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-liaison_mobile" name="liaison_mobile" lay-verify="required" autocomplete="off" placeholder="手机号（必填）">
        </div>
    </div>

   

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总包单位负责人：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-unit_realname" name="unit_realname" lay-verify="required" autocomplete="off" placeholder="姓名（必填）">
        </div>

        <div class="layui-input-inline">
            <input type="text" class="layui-input field-unit_mobile" name="unit_mobile" lay-verify="required" autocomplete="off" placeholder="手机号（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value={$proid}>
            {if condition="$data['step'] >= 30"}
                {if condition="$editpar eq 1"}
                    <button type="submit" class="layui-btn layui-btn-primary layui-btn-fluid" lay-submit="" style="width:30%;"  lay-filter="formSubmit">修改信息</button>
                {else}
                    <a href="{:url('project/examlist?proid='.$proid)}" 
                    class="layui-btn  layui-btn-fluid ml10" style="width:30%;">
                        保存
                    </a>
                {/if}
                <a href="{:url('project/builditem?proid='.$proid)}" 
                    class="layui-btn layui-btn-fluid layui-btn-normal ml10" style="width:30%;">
                    上一步
                </a>
            {else /}
                <button type="submit" class="layui-btn layui-btn-fluid" style="width:30%;" lay-submit="" lay-filter="formSubmit">保存</button>
                <a href="{:url('project/builditem?proid='.$proid)}" 
                    class="layui-btn layui-btn-primary layui-btn-fluid ml10" style="width:30%;">
                    上一步
                </a>
            {/if}
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}
<script>
var formData = {:json_encode($data)};

layui.use(['jquery', 'laydate', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, form = layui.form;

    form.on('select(ctype)', function(data){
       var ctext = data.elem[data.elem.selectedIndex].text;
        $("#caption_content").removeClass("hide");
        $("#caption_show").html(ctext);
    }); 

    laydate.render({
        elem: '.sdate',
        min:'0'
    });

    laydate.render({
        elem: '.edate',
        min:'0'
    });
});
</script>
<script src="__ADMIN_JS__/footer.js"></script>