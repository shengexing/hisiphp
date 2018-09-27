<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
        </colgroup>
        <thead>
            <tr>
                <th>项目编号</th>
                <th>项目名称</th>
                <th>项目类别</th>
                <th>项目级别</th>
                <th>项目进度</th>
                <th>实施地点</th>
                <th>开工时间</th>
                <th>竣工时间</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="data" id="v"}
            <tr>
                <td>{$v['code']}</td>
                <td>{$v['title']}</td>
                <td>{$productType[$v.ptype]['title']}</td>
                <td>
                    {if condition="$v['level'] neq 0"}{$productLevel[$v.level]['title']}{else /}待定{/if}
                </td>
                <td>{$schedule[$v.schedule]['title']}</td>
                <td>{$v['address']}</td>
                <td>{$v['sdate']}</td>
                <td>{$v['edate']}</td>
                
                {if condition="$v['step'] eq 10"}
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                                <a href="{:url('project/perfectitem?proid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">完善基本信息</a>
                            </div>
                        </div>
                    </td>
                {/if}

                {if condition="$v['step'] eq 20"}
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                                <a href="{:url('project/builditem?proid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">项目明细</a>
                            </div>
                        </div>
                    </td>
                {/if}

                {if condition="$v['step'] eq 30"}
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                                <a href="{:url('project/govitem?proid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">审批职能部门</a>
                            </div>
                        </div>
                    </td>
                {/if}

                {if condition="$v['step'] eq 90"}
                    <td>
                        <div class="layui-btn-group">
                            <div class="layui-btn-group">
                                <a href="{:url('project/baseitem?proid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">查看项目信息</a>
                            </div>
                        </div>
                    </td>
                {/if}
            </tr>
            {/volist}
        </tbody>
    </table>
    {$pages}
</div>
{include file="block/layui" /}