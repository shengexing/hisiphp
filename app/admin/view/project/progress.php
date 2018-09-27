<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label  layui-form-project">形象进度：</label>
        
        <div class="layui-form-mid layui-word-aux red">只描述进度，不提及问题</div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <textarea rows="5"  class="layui-textarea field-effect" name="progress" autocomplete="off" placeholder="必填">{$progress['progress']}</textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="proid" value = {$proid}>
            {if $editpar eq 1}
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid" lay-filter="formSubmit">修改形象进度</button>
                <a href="{:url('project/dynalist?proid='.$proid)}"  class="layui-btn layui-btn-fluid ml10" style="width:30%;">下一步</a>
            {else}
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" lay-filter="formSubmit">下一步</button>
            {/if}
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}
