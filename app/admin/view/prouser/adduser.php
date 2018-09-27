<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label">企业名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-nick" name="projectname" lay-verify="required" autocomplete="off" placeholder="请输入用户名">
        </div>
    </div>
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
        <a href="{:url('prouser/listuser')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </div>
</div>
</form>
{include file="block/layui" /}
