<form class="layui-form" action="{:url()}" method="post" id="editForm">
    <div class="page-form">
        <blockquote class="layui-elem-quote">企业基本一经填写，不能进行修改，请确认后再提交。</blockquote>
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">起止时间期限：</label>
            <div class="">
                <input type="text" id="stime" class="layui-input field-expire_time stime field-stime" name="stime"
                       autocomplete="off" placeholder="项目开始时间"
                       onclick="layui.laydate({elem: this,format:'yyyy-MM-dd'})" readonly>
                <span class="layui-form-mid">至</span>
                <input type="text" id="stime" class="layui-input field-expire_time etime field-etime" name="etime"
                       autocomplete="off" placeholder="项目截止时间"
                       onclick="layui.laydate({elem: this,format:'yyyy-MM-dd'})" readonly>
            </div>
            <div class="layui-form-label layui-form-project layui-form-mid layui-word-aux" style="padding:0px !important">时间为允许进行项目申报开始-项目申报结束，企业项目申报只能在此期间进行</div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">备注：</label>
            <div class="layui-input-inline layui-textarea-inline">
                <textarea rows="3"  class="layui-textarea field-effect field-notes" name="notes" autocomplete="off" placeholder="备注"></textarea>
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label"> </label>
            <div class="layui-input-block">
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" id="editGenerate" lay-filter="formSubmit">完善信息</button>
            </div>
        </div>
    </div>
</form>
{include file="block/layui" /}
<script>
    var formData = {:json_encode($data)};

    layui.use(['jquery', 'laydate', 'form'], function() {
        var $ = layui.jquery, laydate = layui.laydate, layer = layui.layer, form = layui.form;
        laydate.render({
            elem:'.stime',
            format:'yyyy-MM-dd'
        });
        laydate.render({
            elem:'.etime',
            format:'yyyy.MM-dd'
        });
    });
</script>
<script src="__ADMIN_JS__/footer.js"></script>