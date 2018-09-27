<form class="layui-form" action="{:url()}" method="post" id="editForm">
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
	  <legend>项目名称 (<span class="red">{$data['title']}</span>)</legend>
	</fieldset>

	<div class="layui-form-item">
        <label class="layui-form-label" style="width:230px;">
        	企业提交资料
        	{if condition="$data['step'] < 30"}
        		<span class="red">(资料完善中)</span>
        	{elseif condition="$data['step'] eq 30"}
        		<span class="red">(待提交)</span>
        	{else/}
        		<span class="green">(已提交)</span>
        	{/if}
        	<i class="layui-icon" style="color: #1E9FFF;">&#xe65b;</i> 
        </label>
 		
        <label class="layui-form-label"  style="width:230px;">
        	主管单位审核资料
        	{if condition="$data['step'] < 40"}
        		<span class="red">(等待企业提交)</span>
        	{elseif condition="$data['step'] eq 40"}
        		<span class="red">(待审核)</span>
        	{else/}
        		<span class="green">(已审核)</span>
        	{/if}
        	<i class="layui-icon" style="color: #1E9FFF;">&#xe65b;</i> 
        </label>
		
        <label class="layui-form-label" style="width:260px;">
        	政府职能部门审核资料
        	{if condition="$data['step'] < 40"}
        		<span class="red">(等待企业提交)</span>
        	{elseif condition="$data['step'] < 50"}
        		<span class="red">(等待主管部门提交)</span>
        	{elseif condition="$data['step'] eq 50"}
        		<span class="red">(待审核)</span>
        	{else/}
        		<span class="green">(已审核)</span>
        	{/if}
        </label>
        
    </div>

   
	{if condition="$subexam eq 1"}
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
	  <legend><span class="red">信息提交后将不能修改相关信息，请确认后再提交。</span></legend>
	</fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
        	<input type="hidden" name="proid" value={$proid}>
       		<button type="submit" class="layui-btn layui-btn-primary layui-btn-fluid" lay-submit="" style="width:30%;"  lay-filter="formSubmit">提交审批</button>
        </div>
    </div>
    {/if}
</div>
</form>
{include file="block/layui" /}