<form class="layui-form" action="{:url()}" method="post" id="editForm">
{if condition="$data['step'] eq 10"}
    <div class="layui-card-body">
        <div class="layui-btn-container">
            <span class="layui-btn layui-btn-primary">1、基本信息</span>
            <span class="layui-btn layui-btn-normal">2、完善项目信息</span>
            <span class="layui-btn layui-btn-primary">3、审核信息</span>
        </div>
    </div>
{/if}
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目名称：</label>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$data.title}>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目类别：</label>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$productType[$data.ptype]['title']}>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">行业类别：</label>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$data.industry1}>
        </div>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$data.industry2}>
        </div>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$data.industry3}>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总投资额(万)：</label>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$data.amount}>
        </div>
    </div>

     <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">起止时间期限：</label>
        <div class="">
            <input type="text" class="layui-input field-expire_time sdate layui-noborder" value={$data.sdate} readonly>
            <span class="layui-form-mid">至</span>
            <input type="text" class="layui-input field-expire_time sdate layui-noborder" value={$data.edate} readonly>
        </div>
        <div class="layui-form-mid layui-word-aux">以备案时间为准</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">实施地点：</label>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$data.address}>
        </div>
    </div>

     <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目进度：</label>
        <div class="layui-input-inline">
            <input readonly type="text" class="layui-input layui-noborder" value={$schedule[$data.schedule]}>
        </div>
    </div>

    <div class="layui-form-item hide" id='eamount'>
        <label class="layui-form-label layui-form-project">年底计划投资额(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input layui-noborder" value={$data.eamount} autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item hide" id='yamount'>
        <label class="layui-form-label layui-form-project">截止上年底项目累计完成投资额(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input layui-noborder" value={$data.yamount} autocomplete="off" placeholder="">

        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否为当年省市重点项目类别</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-isimportant" name="isimportant" value="1" title="是" checked>
            <input type="radio" class="field-isimportant" name="isimportant" value="0" title="否">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否为当年“双十工程”项目</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-isten" name="isten" value="1" title="是" checked>
            <input type="radio" class="field-isten" name="isten" value="0" title="否">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="{$data['recid']}">
            {if condition="$data['step'] >= 20"}
                {if condition="$editpar eq 1"}
                <button type="submit" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:30%;" lay-submit="" lay-filter="formSubmit">修改信息</button>
                {/if}
                <a href="{:url('project/builditem?proid='.$data['recid'])}" 
                class="layui-btn  layui-btn-fluid ml10" style="width:30%;">
                下一步
                </a>
                
                <a href="{:url('project/generateditem?proid='.$data['recid'])}" 
                    class="layui-btn layui-btn-fluid layui-btn-normal ml10" style="width:30%;">
                    上一步
                </a>
                
            {else /}
                <button type="submit" class="layui-btn layui-btn-fluid" lay-submit="" style="width:30%;" lay-filter="formSubmit">下一步</button>
                <a href="{:url('project/generateditem?proid='.$data['recid'])}" 
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

layui.use(['jquery', 'laydate'], function() {
    var $ = layui.jquery, laydate = layui.laydate;
    laydate.render({
        elem: '.sdate',
        min:'0'
    });

    laydate.render({
        elem: '.edate',
        min:'0'
    });

    var syear = new Date(Date.parse(formData.sdate)).getFullYear();
    if ( formData.cyear >= syear ) {
        $("#eamount").removeClass("hide");
    } 

    if ( syear + 1 <= formData.cyear ) {
        $("#yamount").removeClass("hide");     
    }     
});
</script>
<script src="__ADMIN_JS__/footer.js"></script>