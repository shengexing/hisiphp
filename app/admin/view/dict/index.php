<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>附表名称</th>
                <th>查看详情</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="dicttable" key="k" id="v"}
            <tr>
                <td>{$v['title']}</td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a href="{:url('dict/detail?dict='.$k)}" class="layui-btn layui-btn-primary layui-btn-small">查看附表信息</a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}
        </tbody>
    </table>
</div>
{include file="block/layui" /}