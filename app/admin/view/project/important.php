<div class="layui-form page-form-width">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                <th>企业提交信息</th>
                <th>主管部门</th>
                <th>职能部门</th>
                <th>主管部门</th>
                <th>查看项目</th>
                <th>联系方式</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="data" id="v"}
            <tr>
                <td>{$v['title']}</td>
                <th>{if $v['step'] >= 40}<span class="green">已提交</span>{else}<span class="red">待提交</span>{/if}</th>
                <th>{if $v['step'] >= 50}<span class="green">已提交</span>{else}<span class="red">待审核</span>{/if}</th>
                <th>{if $v['step'] >= 60}<span class="green">已提交</span>{else}<span class="red">待审核</span>{/if}</th>
                <td>{if $v.dunit gt 0}{$examUnit[$v.dunit]['title']}{/if}</td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            {if condition="$v['step'] eq 50"}
                                <a href="{:url('project/baseitem?proid='.$v['recid'])}" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">待审核</a>
                            {else}
                                <a href="{:url('project/baseitem?proid='.$v['recid'])}" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">查看详情</a>
                            {/if}   

                        </div>
                    </div>
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="{:url('admin/project/prostaff?proid='.$v['recid'])}?type=examitem" target="_blank" class="layui-btn layui-btn-primary">
                                联系人
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="layui-btn-group">
                         <a href="javascript:void(0);" data-isimportant="2" data-proid="{$v['recid']}" class="layui-btn layui-btn-primary layui-btn-small layui-important">省重点项目</a>
                         <a href="javascript:void(0);" data-isimportant="3" data-proid="{$v['recid']}" class="layui-btn layui-btn-primary layui-btn-small layui-important">市重点项目</a>
                         <a href="javascript:void(0);" data-isimportant="4" data-proid="{$v['recid']}" class="layui-btn layui-btn-primary layui-btn-small layui-important">省、市重点项目</a>
                    </div>
                </td>
            </tr>
            {/volist}
        </tbody>
    </table>
    {$pages}
</div>
{include file="block/layui" /}
<script>
layui.use(['jquery','form'], function() {
    var $ = layui.jquery, form = layui.form;
    $(".layui-important").on("click",function(){
        var _this = $(this);
        var proid = _this.data("proid");
        var isimportant = _this.data("isimportant")
        var r = Math.random();
        $.ajax({
            type: "POST",
            url: '{:url("project/preshengshi")}',
            data: {proid:proid,isimportant:isimportant,r:r},
            success: function(res) {
               layer.msg(res.msg);
               if ( res.code == 0 ) {
                    _this.parents("tr").remove();
               }
            },
            dataType:'json'
        });
    });
});
</script>