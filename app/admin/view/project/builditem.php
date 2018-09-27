<form class="layui-form" action="{:url()}" method="post" id="editForm">
<!-- {if condition="$data['step'] eq 20"}
<div class="layui-card-body">
    <div class="layui-btn-container">
        <span class="layui-btn layui-btn-primary">1、基本信息</span>
        <span class="layui-btn layui-btn-primary">2、完善项目信息</span>
        <span class="layui-btn layui-btn-normal">3、项目明细</span>
    </div>
</div>
{/if} -->
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">占地面积：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-floor_area" name="floor_area" lay-verify="required" autocomplete="off" placeholder="必填">
        </div>
        <div class="layui-form-mid layui-word-aux red">单位：亩</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总建筑面积：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-build_area" name="build_area" lay-verify="required" autocomplete="off" placeholder="必填">

        </div>
        <div class="layui-form-mid layui-word-aux red">单位：万平方米</div>
    </div>
    
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">主要建设内容：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="2" cols="500" class="layui-textarea field-significance" name="significance" autocomplete="off" placeholder="必填"></textarea>
        </div>
    </div> 

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">效益效值：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="5"  class="layui-textarea field-effect" name="effect" autocomplete="off" placeholder="必填"></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否使用以下资金：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <input type="checkbox" {if condition="$capitalcnt eq 0"} checked {/if} value="0" lay-filter="capitalselect" class="layui-input field-capital capital-checkbox capital-calcel">否
            {volist name="capialType" key = "pk" id="pt"}
                {if condition="$pt['status'] eq 1"}
                    <input type="checkbox" value="{$pt['recid']}" {if condition="$pt['isshow'] eq 1"} checked {/if}
                    lay-filter="capitalselect" 
                    class="layui-input field-capital capital-checkbox capital-select">
                    {$pt['title']}
                {/if}
            {/volist}
        </div>
    </div>

    {volist name="capialType" key = "pk" id="pt"}
        {if condition="$pt['status'] eq 1"}
            <div {if condition="$pt['isshow'] eq 1"}  class="layui-form-item capitalbox" {else}  class="layui-form-item capitalbox hide" {/if} id="capital_box{$pt['id']}">
                <label class="layui-form-label layui-form-project">{$pt['title']}(万)：</label>
                <div class="layui-input-inline">
                    <input type="hidden" class="layui-input" name="capitiontype[]" value="{$pt['id']}">
                    <input type="text" class="layui-input capitaldata field-capital{$pt['id']}" name="capition[]" autocomplete="off" placeholder="必填">
                </div>
            </div>
        {/if}
    {/volist}



    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value={$proid}>
            {if condition="$data['step'] >= 20"}
                {if condition="$editpar eq 1"}
                    <button type="submit" class="layui-btn layui-btn-primary layui-btn-fluid" lay-submit="" style="width:30%;"  lay-filter="formSubmit">修改信息</button>
                {/if}
                <a href="{:url('project/staff?proid='.$proid)}" 
                class="layui-btn  layui-btn-fluid ml10" style="width:30%;">
                    下一步
                </a>
                
                <a href="{:url('project/generateditem?proid='.$proid)}" 
                    class="layui-btn layui-btn-fluid layui-btn-normal ml10" style="width:30%;">
                    上一步
                </a>
            {else /}
                <button type="submit" class="layui-btn layui-btn-fluid" style="width:30%;" lay-submit="" lay-filter="formSubmit">下一步</button>
                <a href="{:url('project/generateditem?proid='.$proid)}" 
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

    form.on('checkbox(capitalselect)', function(data){  
        if (data.value == 0) {
            if ( data.elem.checked ) {
                $(".capitalbox").addClass("hide");
                $(".capitaldata").val(0);   
                $(".capital-select").prop("checked", false);
                form.render('checkbox');
            }
        } else {
            if (data.elem.checked) {
                $(".capital-calcel").prop("checked", false);
                $("#capital_box"+data.value).removeClass("hide");    
            } else {
                $("#capital_box"+data.value).addClass("hide");
                $(".field-capital" + data.value).val(0);
            }
            form.render('checkbox');
        }
    }); 

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