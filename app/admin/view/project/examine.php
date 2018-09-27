<div class="layui-form page-form-width">

    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            {if $type eq 2}
            <a href="{:url('admin/project/important')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加省市重点项目</a>
            {/if}

            {if $type eq 3}
            <a href="{:url('admin/project/tenexam')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加“双十项目”工程</a>
            {/if}
        </div>
    </div>

    {if $type eq 3}
    <div class="layui-form hide page-form-width" id="selectBox">
            <div   style="float:left; width:450px;">
                <label class="layui-form-label">重大产业项目</label>
                <div class="layui-input-inline w300">
                    {volist name="tenarr" id="vo"}
                    {if $vo['type'] eq 1}
                    <input type="radio" class="tentype" name="tentype"  value="{$vo['recid']}" title="{$vo['title']}">
                    {/if}
                    {/volist}
                </div>
            </div>

            <div  style="float:left; width:450px;" >
                <label class="layui-form-label">十类重点工程</label>
                <div class="layui-input-inline w300">
                    {volist name="tenarr" id="vo"}
                    {if $vo['type'] eq 2}
                    <input type="radio" class="tentype" name="tentype"  value="{$vo['recid']}" title="{$vo['title']}">
                    {/if}
                    {/volist}
                </div>
            </div>
            <input type="hidden" id="proid">
            <div class="layui-form-item">
                <label class="layui-form-label"> </label>
                <div class="layui-input-block">
                        <a href="javascript:void(0)" class="layui-btn layui-btn-fluid ml10" style="width:30%;" id="dealten">
                        列入“双十项目”工程
                        </a>

                        <a href="javascript:void(0)" class="layui-btn layui-btn-primary ml10" style="width:30%;" id="cancelten">
                        取消操作
                        </a>
                 
                </div>
            </div>
    </div>
    {/if}
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                <th>企业提交信息</th>
                <th>主管部门</th>
                <th>职能部门</th>
                <th>主管部门</th>
                {if $type eq 2 or $type eq 12}<th>列入省市重点项目</th>{/if}
                {if $type eq 3 or $type eq 13}<th>列入“双十项目”工程</th>{/if}
                <th>查看项目</th>
                <th>联系方式</th>
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
                {if $type eq 2}
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shengshi" data-proid={$v['recid']}>通过</a>
                        {if $v.isimportant eq 2}(省重点项目){/if}
                        {if $v.isimportant eq 3}(市重点项目){/if}
                        {if $v.isimportant eq 4}(省、市重点项目){/if}

                    </td>
                {/if}
                {if $type eq 12}
                    <td>
                        {if $v.isimportant eq 2}省重点项目{/if}
                        {if $v.isimportant eq 3}市重点项目{/if}
                        {if $v.isimportant eq 4}省、市重点项目{/if}
                    </td>
                {/if}
                
                {if $type eq 3}
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shuangshi" data-proid={$v['recid']}>列入“双十项目”工程</a></td>
                {/if}
                {if $type eq 13}
                    <td>
                        {if $v.istenselect eq 1}重大产业项目{/if}
                        {if $v.istenselect eq 2}十类重点工程{/if}
                        {if $v.tentype > 0} ({$tenarr[$v.tentype]['title']}) {/if}
                    </td>
                {/if}
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
    $(".into_shengshi").on("click",function(){
        var _this = $(this);
        var proid = _this.data("proid");
        var r = Math.random();
        $.ajax({
            type: "POST",
            url: '{:url("project/shengshi")}',
            data: {proid:proid,r:r},
            success: function(res) {
                _this.parent().html(res.msg);
            },
            dataType:'json'
        });
    });

    $(".into_shuangshi").on("click",function(){
        var _this = $(this);
        _this.addClass("waitdeal");
        $("#selectBox").removeClass("hide");
        $("#proid").val(_this.data("proid"));
    });

    $("#cancelten").on("click",function(){
        $("#selectBox").addClass("hide");
        $(".into_shuangshi").removeClass("waitdeal");
    });

    $("#dealten").on("click",function(){
        var proid = $("#proid").val();
        var tentype = $(".tentype:checked").val()
        var r = Math.random();
        if ( Boolean( parseInt(tentype) ) ) {
            $.ajax({
                type: "POST",
                url: '{:url("project/dealten")}',
                data: {proid:proid,tentype:tentype,r:r},
                success: function(res) {
                    $(".waitdeal").parent().html(res.msg);
                    $("#selectBox").addClass("hide");
                    $(".into_shuangshi").removeClass("waitdeal");
                },
                dataType:'json'
            }); 
        } else {
            layer.msg("请选择双十项目类别");
        }
    });
});
</script>