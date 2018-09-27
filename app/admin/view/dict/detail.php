<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>{$title}</legend>
</fieldset>
<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <a href="{:url('admin/dict/add?dict='.$dict)}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加附表信息</a>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>名称</th>
                {if condition="$type eq 2"}
                    <th>父栏目类型</th>
                {/if}
                <th>修改时间</th>
                <th>状态</th>
                <th>修改</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="data" key="k" id="v"}
            <tr>
                <td>{$v['title']}</td>
                {if condition="$type eq 2"}
                    <td>{$pdata[$v.pid]['title']}</td>
                {/if}
                <td>{$v['utime']}</td>
                <td> 
                    {if condition="$v['status'] eq 1"}
                        <span class="green">启用</span>
                    {else /}
                        <span class="red">停用</span>
                    {/if}
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a href="{:url('dict/edit?dict='.$dict.'&recid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">修改信息</a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}
        </tbody>
    </table>
    {$pages}
</div>
{include file="block/layui" /}