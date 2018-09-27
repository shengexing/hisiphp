<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题状态：</label>
        <div class="layui-input-inline">
             <select name="status" type="select" lay-filter="required">
                <option value="">请选择...</option>
                {volist name="quesStatus" key = "pk" id="pl"}
                <option value="{$pk}">{$pl}</option>
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题描述：</label>
        <div class="layui-input-inline">
            <textarea rows="3"  class="layui-textarea" name="description" autocomplete="off" placeholder="必填"></textarea>
        </div>
    </div>    

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="recid" value = {$recid}>
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}
