<div class="layui-form">
    <div class="xzxmindex">
        <div class="xzxmindex_right">
              <div class="rightthird">
                    {volist name="fenguan" id="v"}
                        <a href="{:url('admin/project/statis?type=4&punit='.$v['dunit'])}">
                            {if $v.dunit gt 0}{$examUnit[$v.dunit]['title']}{/if}
                            ({if condition="$v.cnt > 0"}{$v['cnt']}{else}0{/if})
                        </a>
                    {/volist}
              </div>
        </div>
    </div>

    <fieldset {if condition="$leftmenu > 0"}class="layui-elem-field layui-field-title page-form"{else}class="layui-elem-field layui-field-title"{/if} style="margin-top: 30px;">
        <legend><a href="javascript:void(0)" id="get_detail"><span class='green'>查看详细数据</span></a></legend>
    </fieldset>
    <table class="layui-table mt10 hide" id="detail_box" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>分管局委</th>
                <th>项目数</th>
                <th>累计总投资</th>
                <th>年度计划累计投资</th>
                <th>查看详情</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="fenguan" id="v"}
            <tr>
                <td>{if $v.dunit gt 0}{$examUnit[$v.dunit]['title']}{/if}</td>
                <td>{$v['cnt']}</td>
                <td>{$v['amount']}万</td>
                <td>{$v['eamount']}万</td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="{:url('admin/project/statis?type=4&punit='.$v['dunit'])}" class="layui-btn layui-btn-primary">
                                查看详情
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}
        </tbody>
    </table>
</div>
{include file="block/layui" /}
<script>
layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#get_detail").on("click",function(){
        if ($("#detail_box").hasClass("hide")) {
            $(this).html("<span class='red'>关闭详细数据</span>");
            $("#detail_box").removeClass("hide");
        } else {
            $(this).html("<span class='green'>查看详细数据</span>");
            $("#detail_box").addClass("hide");
        }
    });
});
</script>