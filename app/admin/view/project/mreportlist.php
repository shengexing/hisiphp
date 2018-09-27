<form class="layui-form" action="{:url('project/addmreport?proid='.$proid)}" method="post" id="editForm">
<div class="page-form">
	<input type="hidden" class="layui-input" id="skipurl" value="{$skipurl}">
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
	  <legend>当月完成投资 (<span class="red">以工程体量为完成标准</span>)</legend>
	</fieldset>
	<div class="layui-form-item">
        <label class="layui-form-label layui-form-project">当月完成投资(万元)：</label>
        <div class="layui-input-inline">
            <input type="hidden" class="layui-input field-current1" id="current1">
            <input type="hidden" class="layui-input field-total1" id="total1">
            <input type="hidden" class="layui-input" name="capitiontype[]" value="1">
            <input type="text" class="layui-input field-capital1" id="capital1" name="capition[]" lay-verify="required" autocomplete="off" placeholder="">
        </div>
        <div class="layui-form-mid layui-word-aux hide" id="capital1_box">
        	当年累计完成投资<span id="ljcurrent1"></span>万元，总累计<span id="ljtotal1"></span>万元。
        </div>
    </div>

	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
	  <legend>当月固定资产入库资金 (<span class="red">以当月固定资产入库情况为标准</span>)</legend>
	</fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">当月完成投资(万元)：</label>
        <div class="layui-input-inline">
            <input type="hidden" class="layui-input field-current2"  id="current2">
            <input type="hidden" class="layui-input field-total2"  id="total2">
            <input type="hidden" class="layui-input" name="capitiontype[]" value="2">
            <input type="text" class="layui-input field-capital2" id="capital2" name="capition[]" lay-verify="required" autocomplete="off" placeholder="">
        </div>
        <div class="layui-form-mid layui-word-aux hide" id="capital2_box">
        	当年累计固定资产入库资金<span id="ljcurrent2"></span>万元，总累计<span id="ljtotal2"></span>万元。
        </div>
    </div>

    {if condition="$editAcc eq 1"}
	    <div class="layui-form-item">
	        <label class="layui-form-label"> </label>
	        <div class="layui-input-block">
	            {if condition='$editpar eq 1'}
	            	<button type="submit" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:30%;" lay-submit="" lay-filter="formSubmit">修改月报数据</button>
	            	<a href="{:url('project/reexamlist?proid='.$proid)}"  class="layui-btn layui-btn-fluid ml10" style="width:30%;">下一步</a>
	            {else}
	            	<button type="submit" class="layui-btn layui-btn-fluid" style="width:30%;" lay-submit="" lay-filter="formSubmit">下一步</button>
	            {/if}
	        </div>
	    </div>
	{/if}
</div>
</form>
{include file="block/layui" /}
<script>
	var formData = {:json_encode($timeData)};
	layui.use(['jquery', 'form'], function() {
	    var $ = layui.jquery, form = layui.form;
	    if ( parseInt(formData.capital1) > 0 ) {
	    	$("#capital1_box").removeClass("hide");
	    	$("#ljcurrent1").html(parseInt(formData.capital1) + parseInt(formData.current1));
	    	$("#ljtotal1").html(parseInt(formData.capital1) + parseInt(formData.total1));
	    }

	    if ( parseInt(formData.capital2) > 0 ) {
	    	$("#capital2_box").removeClass("hide");
	    	$("#ljcurrent2").html(parseInt(formData.capital2) + parseInt(formData.current2));
	    	$("#ljtotal2").html(parseInt(formData.capital2) + parseInt(formData.total2));
	    }

	    $("#capital1").on("change",function(){
	    	$("#capital1_box").removeClass("hide");
	    	var capital1 = $("#capital1").val();
	    	$("#ljcurrent1").html(parseInt(capital1) + parseInt(formData.current1));
	    	$("#ljtotal1").html(parseInt(capital1) + parseInt(formData.total1));
	    });

	    $("#capital2").on("change",function(){
	    	$("#capital2_box").removeClass("hide");
	    	var capital2 = $("#capital2").val();
	    	$("#ljcurrent2").html(parseInt(capital2) + parseInt(formData.current2));
	    	$("#ljtotal2").html(parseInt(capital2) + parseInt(formData.total2));
	    });
	});
</script>
<script src="__ADMIN_JS__/footer.js"></script>