<div class="page-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>审批类型</th>
                {if condition="$editpar eq 1"}
                <th>添加审批</th>
                {/if}
                <th>详情</th>
                <th>审批流程</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="examName" key = "pk" id="pt"}
                {if condition="$pt['status'] eq 1"}
                        <tr>
                            <td>{$pt['title']}</td>
                            {if condition="$editpar eq 1"}
                                <td>
                                    {if condition="$pt['cnt'] > 0"}
                                        <span class="red">已提交</span>
                                    {else}
                                        <div class="select_box">
                                            <a class="green finish layui-btn layui-btn-primary" href="javascript:void(0)">已完成</a>
                                            <a class="red unfinish layui-btn layui-btn-primary" href="javascript:void(0)">未完成</a>
                                        </div>
                                        <div class="finish_box hide">
                                            <a href="{:url('admin/project/addexam?proid='.$proid.'&ptype='.$pt['recid'].'&type=3')}" class="layui-btn layui-btn-primary">
                                                <i class="aicon ai-tianjia"></i>添加审批
                                            </a>
                                        </div>
                                        <div class="unfinish_box hide">
                                            <a href="{:url('admin/project/addexam?proid='.$proid.'&ptype='.$pt['recid'].'&type=1')}" class="layui-btn layui-btn-primary">
                                                <i class="aicon ai-tianjia"></i>添加原因
                                            </a>
                                        </div>
                                    {/if}
                                </td>
                            {/if}
                            
                            {if condition="$pt['cnt'] eq 0"}
                                <td>暂未提交信息</td>  
                            {else}
                                {if condition="isset($examData[$pt.recid])"}
                                    {volist name="$examData[$pt.recid]" key = "ek" id="et"}
                                        <td>
                                            {if condition="$et.status eq 3"}
                                                <span class="green">{$examStatus[$et.status]}</span>
                                                <!-- 许可证号：{$et.permit} -->
                                            {else}
                                                <span class="red">{$examStatus[$et.status]}</span>
                                            {/if}
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{:url('admin/project/editexam?recid='.$et['recid'])}" class="layui-btn layui-btn-primary">
                                                <i class="aicon ai-tianjia"></i>查看详情
                                            </a>
                                        </td>
                                    {/volist}       
                                {/if}
                            {/if}
                            <td>
                                <a href="javascript:void(0);" data-src='{$pt['img']}' class="liucheng">查看流程</a>
                            </td>
                        </tr>
                {/if}    
            {/volist}
        </tbody>
    </table>

    {if condition="$editpar eq 1"}
         <div class="layui-form-item">
            <label class="layui-form-label"> </label>
            <div class="layui-input-block">
                    <a href="{:url('project/baseitem?proid='.$proid)}" 
                    class="layui-btn layui-btn-fluid layui-btn-normal ml10" style="width:30%;">
                        保存并提交
                    </a>
            </div>
        </div>
    {/if}
</div>
{include file="block/layui" /}
<script>

layui.use(['jquery', 'form'], function() {
    var $ = layui.jquery,  form = layui.form;
    $(".liucheng").on("click",function(){
        var _img = $(this).data("src");
        var _html = "<img src='"+ _img +"' width='100%'>"
        layer.open({
                      type: 1,
                      title: '查看审批流程',
                      skin: 'layui-layer-rim', //加上边框
                      area: '800px', //宽高
                      content: _html
                    });

    });

    $(".finish").on("click",function(){
        var _this = $(this);
        _this.parents("td").find(".select_box").addClass("hide");
        _this.parents("td").find(".finish_box").removeClass("hide");
        _this.parents("td").find(".unfinish_box").addClass("hide");
    });
    $(".unfinish").on("click",function(){
        var _this = $(this);
        _this.parents("td").find(".select_box").addClass("hide");
        _this.parents("td").find(".finish_box").addClass("hide");
        _this.parents("td").find(".unfinish_box").removeClass("hide");
    });
});
</script>