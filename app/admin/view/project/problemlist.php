<div class="layui-form">
    <form class="layui-form" action="{:url()}" method="post">
        <div id="searchBox" class="layui-form-item">
            <div class="layui-input-inline">
                <select name="year" lay-filter="cyear" id="cyear" class='field-cyear' type="select" lay-verify="required">
                    <option value="">请选择...</option>
                    {volist name="$years" key = "pk" id="pt"}
                    <option value="{$pt}" {if condition="$pt eq $seayear"} selected {/if}>{$pt}年</option>
                    {/volist}
                </select>
            </div>

            <div class="layui-input-inline hide" id="cmonth_box">
                <select name="month" class="select-content field-cmonth" lay-filter="cmonth" type="select" lay-verify="required">
                </select>
            </div>

            <div class="layui-input-inline" style="width:450px;">
                <input type="checkbox" class="field-isresolve"  name="isresolve" {if condition = "strcmp(1,$isresolve)"} checked {/if} value=2 title="已解决问题">
                <input type="checkbox" class="field-isnotresolve"  name="isnotresolve" {if condition = "strcmp(1,$isnotresolve)"} checked value=2 {/if} title="未解决问题">
                <input type="checkbox" class="field-ismonth"  name="ismonth" {if condition = "strcmp(1,$ismonth)"} checked {/if} value=2 title="当月新增问题">
            </div>

            <div class="layui-input-inline">
                <input type="text" name="keyword" value="{$keyword}" placeholder="请输入关键字" autocomplete="off" class="layui-input">
            </div>

            <div class="layui-input-inline" style="float:right;">
                <button class="layui-btn" lay-submit="" lay-filter="formDemo">搜索</button>
            </div>
        </div>
    </form>

<table class="layui-table mt10" lay-even="" lay-skin="row">
    <thead>
    <tr>
        <th>项目名称</th>
        <th>问题类型</th>
        <th>问题描述</th>
        <th>更新时间</th>
        <th>期望解决时间</th>
        <th>协商解决时间</th>
        <th>联系人</th>
    </tr>
    </thead>
    <tbody>
    {volist name="data" id="v"}
    <tr>
        <td>{$v['title']}</td>
        <td>{$v['qtype']}</td>
        <td>{$v['notes']}</td>
        <td>{$v['utime']}</td>
        <td>{$v['exceptdate']}</td>
        <td>{$v['consultdate']}</td>


        <td>
            <div class="layui-btn-group">
                <div class="layui-btn-group">
                    <a target="_blank" href="{:url('admin/project/prostaff?proid='.$v['recid'])}?type=examitem" class="layui-btn layui-btn-primary">
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
    var seayear = {$seayear};
    var seamonth = {$seamonth};
    var aaa = {$isresolve};
    var bbb = {$isnotresolve};
    var ccc = {$ismonth};

    layui.use(['jquery', 'form'], function() {
        var $ = layui.jquery, form = layui.form;

        function createMonth(cyear, cmonth) {
            var _html = '<option value="">请选择...</option>';

            var xyear = new Date().getFullYear();
            var xmonth = new Date().getMonth() + 1;
            if ( cyear != xyear ) {
                for (var i = 1;i<=12;i++) {
                    if ( i ==  cmonth) {
                        _html += '<option value="'+ i +'" selected="selected">'+ i +'月</option>';
                    } else {
                        _html += '<option value="'+ i +'">'+ i +'月</option>';
                    }
                }
            } else  {
                for (var i = 1;i<=xmonth;i++) {
                    if ( i ==  cmonth) {
                        _html += '<option value="'+ i +'" selected="selected">'+ i +'月</option>';
                    } else {
                        _html += '<option value="'+ i +'">'+ i +'月</option>';
                    }
                }
            }
            $("#cmonth_box").removeClass("hide");
            $("#cmonth_box .select-content").html(_html);
            form.render();
        }

        form.on('submit(formDemo)', function(data){
            //$("#excel").val(0);
        });

        createMonth(seayear, seamonth);
        form.on('select(cyear)', function(data){
            var cyear = data.value;
            createMonth(cyear , 0);
        });

    });
</script>