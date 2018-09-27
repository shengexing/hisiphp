<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <blockquote class="layui-elem-quote" id="capion"></blockquote>
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目名称：</label>
        <div class="layui-input-inline" style="width:500px;">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="备案或者预备案名称（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案或者预备案名称</div>
    </div>

   
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目类别：</label>
        <div class="layui-input-inline">
            <select name="ptype" type="select" class='field-ptype' lay-verify="required">
                <option value="">请选择...</option>
                {volist name="productType" key = "pk" id="pt"}
                    {if condition="$pt['status'] eq 1"}
                        <option value="{$pt['recid']}">{$pt['title']}</option>
                    {/if}  
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">行业类别：</label>
        <div class="layui-input-inline">
            <select name="industry1" lay-filter="industry1" class='field-industry1' type="select" lay-verify="required">
                <option value="">请选择...</option>
                {volist name="IndustryType1" key = "pk" id="pt"}
                    {if condition="$pt['status'] eq 1"}
                        <option value="{$pt['recid']}">{$pt['title']}</option>
                    {/if}  
                {/volist}
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type2">
            <select name="industry2" class="select-content field-industry2" lay-filter="industry2" type="select">
                <option value="">请选择...</option>
                {volist name="IndustryType2" key = "pk" id="pt"}
                    {if condition="$pt['status'] eq 1"}
                        <option value="{$pt['recid']}">{$pt['title']}</option>
                    {/if}  
                {/volist}
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type3">
            <select name="industry3" class="select-content field-industry3" lay-filter="industry3" type="select">
                <option value="">请选择...</option>
                {volist name="IndustryType3" key = "pk" id="pt"}
                    {if condition="$pt['status'] eq 1"}
                        <option value="{$pt['recid']}">{$pt['title']}</option>
                    {/if}  
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总投资额(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-amount" name="amount" lay-verify="required" autocomplete="off" placeholder="单位：万元（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案投资金额</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">起止时间期限：</label>
        <div class="">
            <input type="text" id="sdate" class="layui-input field-expire_time sdate field-sdate" name="sdate" 
            autocomplete="off" placeholder="项目开始时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
            <span class="layui-form-mid">至</span>
            <input type="text" id="edate" class="layui-input field-expire_time edate field-edate" name="edate" 
            autocomplete="off" placeholder="项目截止时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
        </div>
        <div class="layui-form-label layui-form-project layui-form-mid layui-word-aux" style="padding:0px !important">以项目实际开工时间为起始节点，按照项目正式入区合同要求建设周期为竣工时间进行推算</div>
    </div>

   

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">实施地点：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-address" id="address" name="address" lay-verify="required" autocomplete="off" placeholder="必填">

        </div>
        <div class="layui-form-mid layui-word-aux red">按照项目正式入区协议要求进行描述</div>
    </div>

     <div class="layui-form-item hide" id="schedule_box">
        <label class="layui-form-label layui-form-project">进度类别</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="schedule">
            <input type="hidden" class="layui-input field-schedule" id="scheduletype" name='schedule'>
        </div>
    </div>

    <div class="layui-form-item hide" id='eamount'>
        <label class="layui-form-label layui-form-project">年度计划投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-eamount" name="eamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item hide" id='yamount'>
        <label class="layui-form-label layui-form-project">截止上年底累计完成投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-yamount" name="yamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">辖区办事处：</label>
        <div class="layui-input-inline"  style="width:850px">
            {volist name="Dictxiaqu" id="vo"}
            <input type="radio" class="field-tentype" name="xiaqu" 
            {if condition="$project['xiaqu'] eq $vo['recid']"} checked {/if}
             value="{$vo['recid']}" title="{$vo['title']}" lay-verify="required">
            {/volist}
        </div>
    </div>

     <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">分管部门：</label>
        <div class="layui-input-inline"  style="width:850px">
            {volist name="unitData" id="vo"}
            <input type="radio" class="field-tentype" name="dunit"
            {if condition="$project['dunit'] eq $vo['recid']"} checked {/if}
             value="{$vo['recid']}" title="{$vo['title']}" lay-verify="required">
            {/volist}
        </div>
    </div>


    {if condition="$roleid neq 3"}
   <!--  <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年省市重点项目</label>
        <div class="layui-input-inline" style="width:750px">
            <input type="radio" class="field-isimportant" name="isimportant" value="1" title="否" checked>
            <input type="radio" class="field-isimportant" name="isimportant" value="2" title="省重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="3" title="市重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="4" title="省、市重点项目">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年“双十工程”项目</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-isten" name="isten" value="0" title="否" checked lay-filter="isten">
            <input type="radio" class="field-isten" name="isten" value="1" title="是" lay-filter="isten">
        </div>
    </div>

    <div class="layui-form-item hide" id="isten_box1">
        <label class="layui-form-label layui-form-project">“双十工程”项目类别</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-istenselect" name="istenselect"  value="1" lay-filter="istenselect" title="重大产业项目">
            <input type="radio" class="field-istenselect" name="istenselect"  value="2" lay-filter="istenselect" title="十类重点工程">
        </div>
    </div> -->
    {/if}

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="{$project['recid']}">
            {if condition="$project['step'] >= 10"}
                {if condition="$editpar eq 1"}
                <button type="submit" lay-submit="" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:30%;" id="editGenerate"  lay-filter="formSubmit">修改信息</button>
                {/if}
                <a href="{:url('project/builditem?proid='.$project['recid'])}" 
                class="layui-btn layui-btn-fluid ml10" style="width:30%;">
                下一步
                </a>
            {else /}
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" id="editGenerate" lay-filter="formSubmit">下一步</button>
            {/if}
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}
<script>
var formData = {:json_encode($project)};
var IndustryType2 = {:json_encode($IndustryType2)};
var IndustryType3 = {:json_encode($IndustryType3)};
var schedule = {:json_encode($schedule)};
var tipcnt = 0;
var limitTime = {:json_encode($limitTime)};//增加允许提交时间返回

layui.use(['jquery', 'laydate', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, form = layui.form;
    laydate.render({
        elem: '.sdate',
        type:'month',
        format:'yyyy.M'
    });

    if (formData.isten == 1) {
        $("#isten_box1").removeClass("hide");
    }

    laydate.render({
        elem: '.edate',
        type:'month',
        format:'yyyy.M'
    });

    form.on('radio(isten)', function(data){  
        var isten = data.value;
        $("#isten_box1").addClass("hide");
        if ( isten == 1 ) {
            $("#isten_box1").removeClass("hide");
        }
    }); 

    if ( formData.step >= 10 ) {
        if ( formData.industry2 > 0 ) {
            $("#industry_type2").removeClass("hide");
        }

        if ( formData.industry3 > 0 ) {
            $("#industry_type3").removeClass("hide");
        } 

        if ( formData.schedule > 0 ) {
            dealSchedule(formData.schedule);
        } 


        var syear = new Date(Date.parse(formData.sdate)).getFullYear();
        if ( formData.cyear >= syear ) {
            $("#eamount").removeClass("hide");
        } 

        if ( syear + 1 <= formData.cyear ) {
            $("#yamount").removeClass("hide");     
        }     
    }


    function dealSchedule( stype ) {
        $("#schedule_box").removeClass("hide");
        $("#schedule").val(schedule[stype]);
        $("#scheduletype").val(stype);
    }

    function dealDate(){
        var sdate = $("#sdate").val();
        var edate = $("#edate").val();
        if ( sdate.length == 0 && edate.length == 0 ) {
            if ( tipcnt == 0 ) {
               layer.alert('请确定不填写项目起止日期?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    dealSchedule(1);
                    layer.msg('不填写项目起止日期，项目将默认为前期');
                }); 
                tipcnt = tipcnt +1;
            }
        } else if ((sdate.length == 0 && edate.length > 0)) {
            layer.alert('项目起止日期时间有误，确认信息?', {
              skin: 'layui-layer-molv' //样式类名
              ,closeBtn: 0
            }, function(){
                $("#sdate").val("");
                $("#edate").val("");
                dealSchedule(1);
                layer.msg('项目起止日期时间有误，项目将默认为前期');
            });
        } else {
            var syear = new Date(Date.parse(sdate)).getFullYear();
            var smonth = new Date(Date.parse(sdate)).getMonth() + 1;
            var eyear = new Date(Date.parse(edate)).getFullYear();
            var emonth = new Date(Date.parse(edate)).getMonth() + 1;
            var cyear = new Date().getFullYear();
            var cmonth = new Date().getMonth() + 1;
  
            if ( syear > eyear || (syear == eyear && smonth > emonth) ) {
                layer.alert('项目起止日期时间有误，确认信息?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    $("#sdate").val("");
                    $("#edate").val("");
                    dealSchedule(1);
                    layer.msg('项目起止日期时间有误，项目将默认为前期');
                });
            } else if ( syear < cyear && eyear == cyear ) {
                dealSchedule(5);
            } else if ( syear < cyear && eyear > cyear ) {
                dealSchedule(4);
            } else if ( syear == cyear && eyear == cyear ) {
                dealSchedule(3);
            } else if ( syear == cyear && eyear > cyear ) {
                dealSchedule(2);
            } else if ( syear > cyear ) {
                dealSchedule(1);
            } else {
                dealSchedule(1);
            }

            if ( cyear >= syear ) {
                $("#eamount").removeClass("hide");
            } else {
                $("#eamount").addClass("hide");
            }

            if ( syear + 1 <= cyear ) {
                $("#yamount").removeClass("hide");     
            } else {
                $("#yamount").addClass("hide");
            }
        }

    }

    $("#address").on("click",function(){
        dealDate();
    });

    $("#editGenerate").on("click",function(){
        dealDate();
    });

    form.on('select(industry1)', function(data){
        var pid = data.value;
        var _html = '<option value="">请选择...</option>';
        var industry2Key = 0;
        layui.each(IndustryType2,function(k,v){
            if (v['pid'] == pid) {
                industry2Key = industry2Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry2Key > 0 ) {
            $("#industry_type2").removeClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html(_html); 
            $("#industry_type3 .select-content").html("");    
        } else {
            $("#industry_type2").addClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html("");   
            $("#industry_type3 .select-content").html("");  
        }
        form.render();
    }); 

    form.on('select(industry2)', function(data){
        var pid = data.value;
        var industry3Key = 0;
        var _html = '<option value="">请选择...</option>';
        layui.each(IndustryType3,function(k,v){
            if (v['pid'] == pid) {
               industry3Key = industry3Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry3Key > 0 ) {
            $("#industry_type3").removeClass("hide");
            $("#industry_type3 .select-content").html(_html);   
        } else {
            $("#industry_type3").addClass("hide");
            $("#industry_type3 .select-content").html("");   
        }
         form.render();
    });

    //提示提交时间
    $(function () {
        var capion = document.getElementById("capion");//获取提示id
        if (limitTime['stime'] == null || limitTime['etime']==null){
            capion.innerHTML="请注意：今年尚未发布提交时间，只能填写保存，不能提交审核";
        }else {
            capion.innerHTML="请注意：提交审核时间在"+limitTime['stime']+"至"+limitTime['etime']+"，不在此时间的项目只能新建不能提交审核";
        }
    });
});
</script>
<script src="__ADMIN_JS__/footer.js"></script>