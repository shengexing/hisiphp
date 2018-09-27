<div class="layui-tab-item layui-show layui-form-pane">
    <div {if $leftmenu eq 0} class="layui-form"  {else}class="layui-form page-form-width"{/if}>
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>项目名</th>
                    <th>管理用户</th>
                    <th>密码</th>
                    <th>项目状态</th>
                    {if condition="$type neq 1"}
                    <th>查看项目</th>
                    {/if}
                </tr> 
            </thead>
            <tbody>
                {volist name="data" id="v"}
                <tr>
                    <td>{$v['title']}</td>
                    <td>{$v['username']}</td>
                    <td>{$v['passwd']}</td>
                    <td>
                        {if condition="$v['step'] < 40"}
                            <span>等待企业提交审核</span>
                        {elseif condition="$v['step'] eq 40"}
                            <span class="red">待审核</span>
                        {elseif condition="$v['step'] eq 50"}
                            <span class="green">待上级部门审核</span>
                        {else}
                            <span class="green">已审核</span>
                        {/if}
                    </td>
                    
                    {if condition="$type neq 1"}
                    <td>
                        {if condition="$v['step'] eq 40"}
                            <a target="_blank" href="{:url('project/baseitem?proid='.$v['proid'])}" class="layui-btn layui-btn-primary layui-btn-small red">待审核</a>
                        {/if}
                        {if condition="$v['step'] gt 40 and $v['step'] lt 60"}
                            <a  target="_blank" href="{:url('admin/project/baseitem?proid='.$v['proid'])}" class="layui-btn layui-btn-primary layui-btn-small">
                                预览申报信息
                            </a>
                        {/if}
                        {if condition="$v['step'] eq 60"}
                            <a  target="_blank" href="{:url('admin/project/mreport?proid='.$v['proid'])}" class="layui-btn layui-btn-primary layui-btn-small">
                                查看详情
                            </a>
                        {/if}
                    </td>
                    {/if}
    
                </tr>
                {/volist}
                
            </tbody>
        </table>
        {$pages}
    </div>
</div>
{include file="block/layui" /}
<script>
layui.use('element', function(){
  var element = layui.element;
});
</script>