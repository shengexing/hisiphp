<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司类型：</label>
        <div class="layui-input-inline">
             <select name="ctype" type="select" lay-filter="required">
                <option value="">请选择...</option>
                {volist name="companyType" key = "pk" id="pl"}
                <option value="{$pk}" {if condition="$pk eq $data.ctype"}selected{/if}>{$pl}</option>
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司名称：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" value={$data.company} name="company" lay-verify="required" autocomplete="off" placeholder="公司名称（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司简称：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" value={$data.cename} name="cename" lay-verify="required" autocomplete="off" placeholder="公司简称（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司地址：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" value={$data.address} name="address" lay-verify="required" autocomplete="off" placeholder="公司地址（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">邮政编码：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" value={$data.ecode} name="ecode" lay-verify="required" autocomplete="off" placeholder="邮政编码（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司邮箱：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" value={$data.email} name="email" lay-verify="required" autocomplete="off" placeholder="公司邮箱（必填）">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">公司电话：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" value={$data.telphone} name="telphone" lay-verify="required" autocomplete="off" placeholder="公司电话（必填）">
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
