<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                <th>建设起止年限</th>
                <th>总投资</th>
                <th>年度计划投资</th>
                <th>月报</th>
                <th>联系方式</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="data" id="v"}
            <tr>
                <td>{$v['title']}</td>
                <td>{$v['sdate']}-{$v['edate']}</td>
                <td>{$v['amount']}万</td>
                <td>{$v['eamount']}万</td>
                <td>
                    {if condition="$v['step'] >= 60"}
                        <div class="layui-btn-group">
                            <a  target="_blank" href="{:url('admin/project/mreportlist?proid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">
                                提交月报
                            </a>
                        </div>
                    {else}
                        <span class="red">待审核</span>
                    {/if}
                </td>
                <td>
                    {if condition="$v['step'] >= 30"}
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="{:url('admin/project/prostaff?proid='.$v['recid'])}?type=examitem" class="layui-btn layui-btn-primary">
                                联系人
                            </a>
                        </div>
                    </div>
                    {else}
                        <span class="red">待提交</span>
                    {/if}
                </td>

                 <td>
                    {if condition="$v['step'] <= 30"}
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="{:url('admin/project/generateditem?proid='.$v['recid'])}?type=examitem" class="layui-btn layui-btn-primary">
                                完善信息
                            </a>
                        </div>
                    </div>
                    {/if}

                     {if condition="$v['step'] >= 30"}
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="{:url('admin/project/baseitem?proid='.$v['recid'])}?type=examitem" class="layui-btn layui-btn-primary">
                                预览信息
                            </a>
                        </div>
                    </div>
                    {/if}
                </td>
            </tr>
            {/volist}
        </tbody>
    </table>
    {$pages}
</div>
{include file="block/layui" /}
