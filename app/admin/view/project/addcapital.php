<!-- <script src="__STATIC__/js/jquery.2.1.4.min.js"></script> -->
<form class="layui-form" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label">时间：</label>
        <div class="layui-input-inline">
             <select name="status" type="select" lay-filter="required" id="capital_year">
                <option value="">请选择...</option>
                {volist name="yearData" key = "pk" id="pl"}
                <option value="{$pk}">{$pl}</option>
                {/volist}
            </select>
        </div>
    </div>

    <table class="layui-table mt10" lay-even="" lay-skin="row">
       <!--  <colgroup>
            <col width="50">
        </colgroup> -->
        <thead>
            <tr>
                <th>类别</th>
                <th>总额</th>
                <th>计划到位资金</th>
                <th>已到位资金</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="capialType" key='k' id="v"}
            <tr>
                <td>{$v}<input type="hidden" name="ctype[]" value="{$k}"></td>
                <td><input type="text" class="layui-input field-username" name="amount[]" lay-verify="required" autocomplete="off"></td>
                <td><input type="text" class="layui-input field-username" name="planamount[]" lay-verify="required" autocomplete="off"></td>
                <td><input type="text" class="layui-input field-username" name="actualamount[]" lay-verify="required" autocomplete="off"></td>
            </tr>
            {/volist}
        </tbody>
    </table>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="proid" value = {$proid}>
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</div>
</form>
{include file="block/layui" /}

// <script type="text/javascript">
//     $(function(){
//     	$("#capital_year").click(function(){
//         	console.log("bbb");
//         });
//     });
// </script>