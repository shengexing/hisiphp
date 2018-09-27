<div class="layui-form">
    <div id="searchBox" class="layui-form-item"> 
        <div class="layui-input-inline" style="width:750px;">
            <a {if $type eq 1}class="layui-btn layui-btn-normal"{else}class="layui-btn layui-btn-primary"{/if} href={:url('admin/project/assets?type=1')}>十大产业项目</a>
            <a {if $type eq 2}class="layui-btn layui-btn-normal"{else}class="layui-btn layui-btn-primary"{/if} href={:url('admin/project/assets?type=2')}>十大重点项目</a>
            <a {if $type eq 3}class="layui-btn layui-btn-normal"{else}class="layui-btn layui-btn-primary"{/if} href={:url('admin/project/assets?type=3')}>责任单位</a>
            <a {if $type eq 4}class="layui-btn layui-btn-normal"{else}class="layui-btn layui-btn-primary"{/if} href={:url('admin/project/assets?type=4')}>办事处</a>
        </div>
    </div>

    <table class="layui-table mt10" lay-even="" lay-skin="row">
        {if $type eq 1 or $type eq 2}
        <thead>
            <tr>
                <th>项目名称</th>
                <th>分管局委</th>
                <th>总投资</th>
                <th>年度计划投资</th>
            </tr> 
            <vo>
        </thead>
        <tbody>
            {volist name="data" id="v"}
                <tr>
                    <td>{$v['title']}</td>
                    <td>{$v['nick']}</td>
                    <td>{$v['amount']}</td>
                    <td>{$v['eamount']}</td>
                </tr>
            {/volist}
        </tbody>
        {elseif $type eq 3}
            <thead>
                <tr>
                    <th>分管局委</th>
                    <th>总投资</th>
                    <th>年度计划投资</th>
                </tr> 
                <vo>
            </thead>
            <tbody>
                {volist name="data" id="v"}
                    <tr>
                        <td>{$v['nick']}</td>
                        <td>{$v['amount']}</td>
                        <td>{$v['eamount']}</td>
                    </tr>
                {/volist}
            </tbody>
        {elseif $type eq 4}
            <thead>
                <tr>
                    <th>办事处</th>
                    <th>总投资</th>
                    <th>年度计划投资</th>
                </tr> 
                <vo>
            </thead>
            <tbody>
                {volist name="data" id="v"}
                    <tr>
                        <td>{$Dictxiaqu[$v.xiaqu]['title']}</td>
                        <td>{$v['amount']}</td>
                        <td>{$v['eamount']}</td>
                    </tr>
                {/volist}
            </tbody>
        {/if}


    </table>

</div>
