<div>
    <div class="layui-tab-item layui-show">
        <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
            <thead>
                <tr>
                    <th colspan="4" data-field="id">
                        <div class="layui-table-cell laytable-cell-1-id">
                            河南省重点建设项目联系表
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr class="contectitem">
                    <td>项目负责人</td>
                    <td colspan="2">{$notes.lead_realname}(电话：{$notes.lead_mobile})</td>
                </tr>
                <tr class="contectitem">
                    <td>项目联络员</td>
                    <td colspan="2">{$notes.liaison_realname}(电话：{$notes.liaison_mobile})</td>
                </tr>
                <tr class="contectitem">
                    <td>分包包单位负责人</td>
                    <td colspan="2">{$notes.unit_realname}(电话：{$notes.unit_mobile})</td>
                </tr>
                
            </tbody>
        </table>
    </div>  
</div>
{include file="block/layui" /}
