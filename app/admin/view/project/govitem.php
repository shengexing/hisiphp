<form class="layui-form" action="{:url()}" method="post" id="editForm">
{volist name="data" key='k' id="v"}
    {if condition="$k eq 1"}
        <div class="layui-tab-item layui-show layui-form-pane">
    {else /}
        <div class="layui-tab-item layui-form">
    {/if}
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
            </colgroup>
            <thead>
                <tr>
                    <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>部门</th>
                    <th>职位</th>
                    <th>手机</th>
                    <th>邮箱</th>
                </tr> 
            </thead>
            <tbody>
                {volist name="v" id="vv"}
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{$vv['id']}" class="layui-checkbox checkbox-ids" lay-skin="primary"></td>
                        <td>{$vv['username']}</td>
                        <td>{$vv['nick']}</td>
                        <td>{$departmentData[$vv.department]['title']}</td>
                        <td>{$upostData[$vv.upost]['title']}</td>
                        <td>{$vv['nick']}</td> 
                        <td>{$vv['mobile']}</td>
                        <td>{$vv['email']}</td>
                    </tr>
                {/volist}
            </tbody>
        </table>
    </div>
{/volist}

<div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="proid" value="{$proid}">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('project/listitem')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
{include file="block/layui" /}