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
        <input type="hidden" name="type" value="{$type}">

        {if condition="$type eq 1"}
        <div class="layui-input-inline" style="width:450px;">
            <input type="checkbox" class="field-isimportant" name="isimportant[]" {if condition = "in_array(2,$isimportant)"} checked {/if} value="2" title="省重点项目">
            <input type="checkbox" class="field-isimportant" name="isimportant[]" {if condition = "in_array(3,$isimportant)"} checked {/if} value="3" title="市重点项目">
            <input type="checkbox" class="field-isimportant" name="isimportant[]" {if condition = "in_array(4,$isimportant)"} checked {/if} value="4" title="省、市重点项目">
        </div>
        {/if}

        {if condition="$type eq 2"}
        <div class="layui-input-inline w300">
            <input type="checkbox" class="" name="istenselect[]" {if condition="$tentype1 eq 1"} checked {/if}  value="2" title="重大产业项目" lay-filter="istenselect">
            <input type="checkbox" class="" name="istenselect[]" {if condition="$tentype2 eq 1"} checked {/if}   value="3" title="十类重点工程" lay-filter="istenselect">
        </div>
        {/if}

        <div class="layui-input-inline">
            <input type="text" name="keyword" value="{$keyword}" placeholder="请输入关键字" autocomplete="off" class="layui-input">
        </div>

        <div class="layui-input-inline" style="float:right;">
            <button class="layui-btn" lay-submit="" lay-filter="formDemo">搜索</button>

            <button class="layui-btn layui-btn-danger" lay-submit lay-filter="click">导出</button>
            <input type="hidden" name="excel" id="excel">
        </div>

        {if condition="$type eq 2"}
        <div  {if condition="$tentype1 eq 0"} class="hide" {/if} style="float:left;" id="isten_box2">
            <label class="layui-form-label layui-form-project">重大产业项目</label>
            <div class="layui-input-inline w300">
                {volist name="tenarr1" id="vo"}
                <input type="checkbox" class="field-tentype" name="tentype[]" {if condition="in_array($vo['id'], $tentype)"} checked {/if}  value="{$vo['id']}" title="{$vo['title']}">
                {/volist}
            </div>
        </div>

        <div  {if condition="$tentype2 eq 0"} class="hide" {/if} style="float:left;"  id="isten_box3">
            <label class="layui-form-label layui-form-project">十类重点工程</label>
            <div class="layui-input-inline w300">
                {volist name="tenarr2" id="vo"}
                <input type="checkbox" class="field-tentype" name="tentype[]" {if condition="in_array($vo['id'], $tentype)"} checked {/if} value="{$vo['id']}" title="{$vo['title']}">
                {/volist}
            </div>
        </div>
        {/if}

        {if condition="$type eq 4"}
        <div class="layui-form-item">
            <label class="layui-form-label">分管部门：</label>
            <div class="layui-input-inline" style="width:750px;">
                {volist name="fenguan" id="vo"}
                <input type="checkbox" class="field-tentype" name="fenguan[]" {if condition="in_array($vo['dunit'], $fgdata)"} checked {/if} value="{$vo['dunit']}" title="{$examUnit[$vo.dunit]['title']}">
                {/volist}
            </div>
        </div>
        {/if}

        {if condition="$type eq 5 and $roleid != 6"}
        <div class="layui-form-item">
            <label class="layui-form-label">审批部门：</label>
            <div class="layui-input-inline" style="width:750px;">
                {volist name="spData" id="vo"}
                <input type="checkbox" class="field-tentype" name="shenpi[]" {if condition="in_array($vo['unit'], $wspdata)"} checked {/if} value="{$vo['unit']}" title="{$vo['nick']}">
                {/volist}
            </div>
        </div>
        {/if}

        {if condition="$type eq 6 and $roleid != 6"}
        <div class="layui-form-item">
            <label class="layui-form-label">辖区办事处：</label>
            <div class="layui-input-inline" style="width:900px;">
                {volist name="Dictxiaqu" id="vo"}
                <input type="checkbox" class="field-tentype" name="xiaqu[]" value="{$vo['recid']}" {if condition="in_array($vo['recid'], $xiaqu)"} checked {/if} title="{$vo['title']}">
                {/volist}
            </div>
        </div>
        {/if}
    </div>
    </form>

    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                {if $type eq 1}<th>项目类别</th>{/if}
                {if $type eq 2}<th>双十类别</th>{/if}
                {if $type eq 6}<th>所属辖区</th>{/if}
                <th>分管局委</th>
                <th>建设起止年限</th>
                <th>总投资</th>
                <th>年度计划投资</th>
                {if $type eq 5}<th>存在问题</th>{/if}
                <th>月报</th>
                <th>联系方式</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="data" id="v"}
            <tr>
                <td>{$v['title']}</td>
                {if $type eq 1}<td>{$isImportant[$v.isimportant]}</td>{/if}
                {if $type eq 2}<th>{if $v.tentype > 0}{$tenarr[$v.tentype]['title']}{/if}</th>{/if}
                {if $type eq 6}<th>{if $v.xiaqu > 0}{$Dictxiaqu[$v.xiaqu]['title']}{/if}</th>{/if}
                <td>{if $v.dunit gt 0}{$examUnit[$v.dunit]['title']}{/if}</td>
                <td>{$v['sdate']}-{$v['edate']}</td>
                <td>{$v['amount']}万</td>
                <td>{$v['eamount']}万</td>
                {if $type eq 5}<td>{$shenpincnt[$v.recid]}</td>{/if}
                <td>
                    {if condition="in_array($v['recid'], $capitionArr)"}
                        <div class="layui-btn-group">
                            <a  target="_blank" href="{:url('admin/project/mreport?proid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">
                                查看月报
                            </a>
                        </div>
                    {else}
                        <span class="red">未上报</span>
                    {/if}
                </td>
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
var searchurl = "{$skipurl}";
var seayear = {$seayear};
var seamonth = {$seamonth};

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

    form.on('submit(click)', function(data){
        $("#excel").val(1);
    });

    form.on('submit(formDemo)', function(data){
        $("#excel").val(0);
    });




    createMonth(seayear, seamonth);
    form.on('select(cyear)', function(data){
        var cyear = data.value;
        createMonth(cyear , 0);
    });

    form.on('checkbox(istenselect)', function(data){  
        var istenselect = data.value;
        if (data.elem.checked) {
            $("#isten_box"+istenselect).removeClass("hide");
        } else {
            $("#isten_box"+istenselect).addClass("hide");
            $("#isten_box"+istenselect).find(".field-tentype").prop("checked", false);
            form.render('checkbox'); 
        }
    });

    

});
</script>