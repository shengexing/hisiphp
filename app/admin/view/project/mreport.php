<form class="layui-form" action="{:url('project/addmreport')}" method="post" id="editForm">
<style>
.layui-table[lay-even] tr:nth-child(even){
    background-color:#fff;
}
.layui-table-hover {
    background-color:#f2f2f2!important;
}
</style>
<div>
	<input type="hidden" class="layui-input" id="skipurl" value="{$skipurl}">

	<div class="layui-form-item">
        <label class="layui-form-label layui-form-project">月报时间：</label>
        <div class="layui-input-inline">
            <select name="cyear" lay-filter="cyear" id="cyear" class='field-cyear' type="select" lay-verify="required">
                <option value="">请选择...</option>
                {volist name="$timeData['years']" key = "pk" id="pt"}
                    <option value="{$pt}">{$pt}年</option>
                {/volist}
            </select>
        </div>

        <div class="layui-input-inline hide" id="cmonth_box">
            <select name="cmonth" class="select-content field-cmonth" lay-filter="cmonth" type="select" lay-verify="required">
                
            </select>
        </div>
    </div>
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <tbody>
                <tr>
                    <td>项目分管单位</td>
                    <td>{$unitData['nick']}</td>
                    <td>项目名称</td>
                    <td>{$info['title']}</td>
                    <td>进度类别</td>
                    <td>{$schedule[$info.schedule]}</td>
                </tr>

                <tr  class="layui-table-hover">
<!--                     <td>项目级别</td>
                    <td>{$productLevel[$info.level]['title']}</td> -->
                    <td>是否为当年省市重点项目类别</td>
                    <td>
                        {if condition="$info['isimportant'] eq 1"}
                            <span class="red">否</span>
                        {else}
                            {if condition="$info['isimportant'] > 0"}
                                <span class="green">{$_isImportant[$info.isimportant]}</span>
                            {else}
                                <span class="red">否</span>
                            {/if}
                        {/if}
                    </td>
                    <td>是否为当年“双十工程”项目</td>
                    <td>
                        {if condition="$info['isten'] eq 1"}
                            {if condition="$info['tentype'] > 0"}
                                <span class="green">{$productTens[$info.tentype]['title']}</span>
                            {else}
                                <span class="green">是</span>
                            {/if}
                        {else}
                            <span class="red">否</span>
                        {/if}
                    </td>
                     <td>行业类别</td>
                    <td>{$info['industry']}</td>
                </tr>
                <tr>
                    <td>项目业主</td>
                    <td>{$cuserData['nick']}</td>
                    <td>实施地点</td>
                    <td>{$info['address']}</td> 
                    <td>
                        问题汇总(
                            {if condition="$dynacnt>0"}
                                <span class="red">{$dynacnt}</span>
                            {else}
                                <span class="green">0</span>
                            {/if}
                        )
                    </td>
                    <td>
                        <a href="{:url('admin/project/dynalist?proid='.$proid)}" target="_blank" class="layui-btn layui-btn-normal layui-btn-small">查看问题</a>
                    </td>
                </tr>

                <tr   class="layui-table-hover">
                    <td rowspan="2">投资情况</td>
                    <td>总投资</td>
                    <td>年度计划投资</td>
                    <td>当月投资</td>
                    <td>当年项目累计投资</td>
                    <td>项目累计投资</td>
                </tr>
                <tr class="layui-table-hover">
                    <td>{$info['amount']}</td>
                    <td>{$info['eamount']}</td>
                    <td>{$timeData['capital1']}</td>
                    <td>{$timeData['capital1'] + $timeData['current1']}</td>
                    <td>{$timeData['capital1'] + $timeData['total1']}</td>
                </tr>
               <!--  <tr class="layui-table-hover">
                    <td>当年累计投资占比</td>
                    <td colspan="2"  id="cper">
                        
                    </td>
                    
                    <td >累计投资占比</td>
                    <td colspan="2" id="tper">
                        
                    </td>
                </tr> -->

                <tr>
                    <td>当月固定资产入库资金</td>
                    <td>{$timeData['capital2']}</td>
                    <td>当年累计固定资产入库资金</td>
                    <td>{$timeData['capital2'] + $timeData['current2']}</td>
                    <td>累计固定资产入库资金</td>
                    <td>{$timeData['capital2'] + $timeData['total2']}</td>
                </tr>
                

                <tr  class="layui-table-hover">
                    <td>建设起止年限</td>
                    <td>{$info['sdate']}-{$info['edate']}</td>
                    <td>占地面积(亩)</td>
                    <td>{$notes.floor_area}</td>
                    <td>总建筑面积(平方米)</td>
                    <td>{$notes.build_area}</td>
                </tr>

                 
                
                <tr>
                    <td>主要建设内容</td>
                    <td colspan="2">{$notes.significance}</td>
                    <td>使用资金情况</td>
                    <td colspan="2">

                        {if condition="$capitalCnt > 0"}
                            {volist name="capital" key = "pk" id="pt"}
                                {$capitalType[$pt.ctype]['title']}：{$pt['amount']}(万元)</br>
                            {/volist}
                        {else}
                            <span class="red">未使用其他资金</span>
                        {/if}
                    </td>
                </tr>

                
                <tr class="layui-table-hover">
                    <td>效益效值</td>
                    <td colspan="2">{$notes.effect}</td>
                    <td>项目联系人</td>
                    <td colspan="2">项目联系人
                        项目负责人:{$notes.lead_realname}(电话：{$notes.lead_mobile})</br>
                        项目联络员:{$notes.liaison_realname}(电话：{$notes.liaison_mobile})</br>
                        分包包单位负责人:{$notes.unit_realname}(电话：{$notes.unit_mobile})</br>
                    </td>
                </tr>

                <tr>
                    <td>形象进度</td>
                    <td colspan="5">
                        {$timeData['progress']}
                    </td>
                </tr>

                {volist name="examName" key = "ek" id="et"}
                    {if condition="$examShow[$et.id]['cnt'] > 0"}
                        <tr class="layui-table-hover">
                            <!-- <td rowspan="{$examShow[$ek]['cnt']+1}">{$et['title']}</td> -->
                            <td>{$et['title']}</td>
                            {volist name="$examShow[$et.id]['data']" key = "sk" id="st"}
                                {if condition="$st['status'] eq 1"}
                                    <td><span class="red">未提交</span></td>
                                    <td colspan="4">原因：{$st['notes']}</td>
                                {elseif condition="$st['status'] eq 2"}
                                    <td><span>进行中</span></td>
                                    <td colspan="4">办理进程：{$st['notes']}</td>
                                {elseif condition="$st['status'] eq 3"}
                                    <td><span class="green">已完成</span></td>
                                    <td colspan="2">许可证号：{$st['permit']}
                                        <a href="javascript:void(0);" data-src='{$st['img']}' class="layui-btn layui-btn-normal layui-btn-small liucheng">详细图片</a>
                                    </td>
                                    <td colspan="2">审批部门：
                                        {if condition="$st.punit > 0"}
                                            {$examUnit[$st.punit]['title']}
                                        {/if}

                                        ({$st['examtime']})
                                    </td>
                                {/if}
                            {/volist}
                        </tr>
                        
                    {else}
                        <tr  class="layui-table-hover " >
                            <td >{$et['title']}</td>
                            <td colspan="5"><span class="red">该项目尚未提交该类手续</span></td>
                        </tr>
                    {/if}
                {/volist}
        </tbody>
    </table>
</div>
</form>
{include file="block/layui" /}
<script>
	var formData = {:json_encode($timeData)};
    var info = {:json_encode($info)};
    
	layui.use(['jquery', 'form'], function() {
	    var $ = layui.jquery, form = layui.form;
	    if ( parseInt(formData.cyear) > 0 && parseInt(formData.cmonth) > 0 ) {
	    	createMonth(parseInt(formData.cyear), parseInt(formData.cmonth));
	    }

        if ( info.eamount > 0 ) {

            $("#cper").html( parseFloat(parseInt(formData.capital1) + parseInt(formData.current1)/parseInt(info.eamount)).toFixed(4) + '%' )
        }

        if ( info.amount > 0 ) {

            $("#tper").html( parseFloat(parseInt(formData.capital1) + parseInt(formData.total1)/parseInt(info.amount)).toFixed(4) + '%' )
        }

        $(".liucheng").on("click",function(){
            var _img = $(this).data("src");
            var _html = "<img src='"+ _img +"' width='100%'>"
            layer.open({
                          type: 1,
                          title: '查看许可证图片',
                          skin: 'layui-layer-rim', //加上边框
                          area: '800px', //宽高
                          content: _html
                        });

        });

	    function createMonth(cyear, cmonth) {
			var _html = '<option value="">请选择...</option>';
	       	if ( cyear != formData.syear && cyear != formData.eyear ) {
	       		for (var i = 1;i<=12;i++) {
	       			if ( i ==  cmonth) {
	       				_html += '<option value="'+ i +'" selected="selected">'+ i +'月</option>';
	       			} else {
	       				_html += '<option value="'+ i +'">'+ i +'月</option>';
	       			}
	       		}
	       	} else if (cyear == formData.syear && cyear == formData.eyear) {
	       		for (var i = parseInt(formData.smonth);i<=parseInt(formData.emonth);i++) {
	       			if ( i ==  cmonth) {
	       				_html += '<option value="'+ i +'" selected="selected">'+ i +'月</option>';
	       			} else {
	       				_html += '<option value="'+ i +'">'+ i +'月</option>';
	       			}
	       		}
	       	} else if ( cyear == formData.syear ) {
	       		for (var i = parseInt(formData.smonth);i<=12;i++) {
	       			if ( i ==  cmonth) {
	       				_html += '<option value="'+ i +'" selected="selected">'+ i +'月</option>';
	       			} else {
	       				_html += '<option value="'+ i +'">'+ i +'月</option>';
	       			}
	       		}
	       	} else if ( cyear == formData.eyear ) {
	       		for (var i = 1;i<=parseInt(formData.emonth);i++) {
	       			if ( i ==  cmonth) {
	       				_html += '<option value="'+ i +'" selected="selected">'+ i +'月</option>';
	       			} else {
	       				_html += '<option value="'+ i +'">'+ i +'月</option>';
	       			}
	       		}
	       	} else {

	       	}
	       	$("#cmonth_box").removeClass("hide");
	       	$("#cmonth_box .select-content").html(_html);
	       	form.render();
		}

	    form.on('select(cyear)', function(data){
	       	var cyear = data.value;
	       	createMonth(cyear , 0);
	    });

	    form.on('select(cmonth)', function(data){
	       	var cmonth = data.value;
	       	var cyear = $("#cyear").val();
	       	var skipurl = $("#skipurl").val();
	       	location.href = skipurl + "?cyear=" + cyear + '&cmonth=' + cmonth;
	    }); 
        form.render();	    
	});
</script>
<script src="__ADMIN_JS__/footer.js"></script>