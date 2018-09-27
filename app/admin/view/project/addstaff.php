<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">员工类型：</label>
        <div class="layui-input-inline">
             <select name="stype" type="select" lay-filter="required">
                <option value="">请选择...</option>
                {volist name="staffType" key = "pk" id="pl"}
                <option value="{$pk}">{$pl}</option>
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">姓名：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="realname" lay-verify="required" autocomplete="off" placeholder="姓名（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">手机号：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="telphone" lay-verify="required" autocomplete="off" placeholder="手机号（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">办公室电话：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="phone" lay-verify="required" autocomplete="off" placeholder="办公室电话（必填）">
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
