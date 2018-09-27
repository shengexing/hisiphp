<div>
    <div class="layui-tab-item layui-show">
        <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
            <thead>
                <tr>
                    <th colspan="4" data-field="id">
                        <div class="layui-table-cell laytable-cell-1-id">
                            河南省重点建设项目基本情况表（单位：万元）
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr class="baseitem">
                    <td>项目申报情况</td>
                    <td colspan="3">
                        企业提交资料
                        {if condition="$info['step'] < 30"}
                            <span class="red">(资料完善中)</span>
                        {elseif condition="$info['step'] eq 30"}
                            <span class="red">(待提交)</span>
                        {else/}
                            <span class="green">(已提交)</span>
                        {/if}
                        <i class="layui-icon" style="color: #1E9FFF;">&#xe65b;</i> 
                        分管部门初审
                        {if condition="$info['step'] < 40"}
                            <span class="red">(等待企业提交)</span>
                        {elseif condition="$info['step'] eq 40"}
                            <span class="red">(待审核)</span>
                        {else/}
                            <span class="green">(已审核)</span>
                        {/if}
                        <i class="layui-icon" style="color: #1E9FFF;">&#xe65b;</i> 
                        政府职能部门终审
                        {if condition="$info['step'] < 40"}
                            <span class="red">(等待企业提交)</span>
                        {elseif condition="$info['step'] < 50"}
                            <span class="red">(等待主管部门提交)</span>
                        {elseif condition="$info['step'] eq 50"}
                            <span class="red">(待审核)</span>
                        {else/}
                            <span class="green">(已审核)</span>
                        {/if}

                        {if condition="$editpar eq 1"}
                            <a target="_blank" href="{:url('project/generateditem?proid='.$info['recid'])}" 
                             class="layui-btn  layui-btn-fluid ml10" id="exam_edit" style="width:15%;">
                                修改项目信息
                            </a>
                        {/if}

                        {if condition="$subexam eq 1"}
                            <a href="javascript:void(0)" id="exam_project" 
                             class="layui-btn layui-btn-fluid layui-btn-normal ml10" style="width:15%;">
                                提交审核
                            </a>
                        {/if}
                    </td>
                </tr>

                <tr  class="layui-table-hover baseitem">
                    <td>项目分管单位</td>
                    <td>
                        {if condition="$info.dunit gt 0"}
                        {$examUnit[$info.dunit]['title']}
                        {/if}

                    </td>
                    <td colspan="2">注：厅（局）、省辖市、县（区）、局（委）</td>
                </tr>

                <tr class="baseitem">
                    <td>项目名称</td>
                    <td>{$info['title']}</td>
                    <td>进度类别</td>
                    <td>{$schedule[$info.schedule]}</td>
                </tr>

                <tr class="layui-table-hover baseitem">
                    <td>项目业主</td>
                    <td>{$cuserData['nick']}</td>
                    <td>行业类别</td>
                    <td>{$info['industry']}</td>
                </tr>

                <tr  class="layui-table-hover baseitem">
                    <td>总投资</td>
                    <td>{$info['amount']}</td>
                    <td>年度计划投资额</td>
                    <td>{$info['eamount']}</td>
                </tr>
                <tr class="baseitem">
                    <td>实施地点</td>
                    <td>{$info['address']}</td>
                    <td>建设起止年限</td>
                    <td>{$info['sdate']}-{$info['edate']}</td>
                </tr>

                <tr  class="layui-table-hover baseitem">
                    <td>是否拟列入当年省市重点项目</td>
                    <td>
                        {if condition="$info['isimportant'] eq 1"}
                            <span class="red">否</span>
                        {else}
                            {if condition="$info['isimportant'] > 0"}
                                <span class="green">{$_isImportant[$info.isimportant]}</span>
                            {else}
                                <span class="green">是</span>
                            {/if}
                        {/if}
                    </td>
                    <td>是否拟列入当年“双十工程”项目</td>
                    <td>{if condition="$info['isten'] eq 1"}
                            {if condition="$info['tentype'] > 0"}
                                <span class="green">{$productTens[$info.tentype]['title']}</span>
                            {else}
                                <span class="green">是</span>
                            {/if}
                        {else}
                            <span class="red">否</span>
                        {/if}
                    </td>
                </tr>
                <tr class="builditem">
                    <td>占地面积(亩)</td>
                    <td>{$notes.floor_area}</td>
                    <td>总建筑面积(万平方米)</td>
                    <td>{$notes.build_area}</td>
                </tr>

                <tr  class="layui-table-hover builditem">
                    <td>主要建设内容</td>
                    <td colspan="3">{$notes.significance}</td>
                </tr>

                <tr class="builditem">
                    <td>效益效值</td>
                    <td colspan="3">{$notes.effect}</td>
                </tr>

                <tr class="layui-table-hover builditem">
                        <td>使用资金情况</td>
                        <td colspan="3">
                            {if condition="$capitalCnt > 0"}
                                {volist name="capital" key = "pk" id="pt"}
                                    {$capitalType[$pt.ctype]['title']}：{$pt['amount']}</br>
                                {/volist}
                            {else}
                                <span class="red">未使用其他资金</span>
                            {/if}
                        </td>
                </tr>
                <tr class="contectitem">
                    <td rowspan="4">项目联系人</td>
                </tr>
                <tr class="contectitem">
                    <td>项目负责人</td>
                    <td colspan="2">{$notes.lead_realname}(电话：{$notes.lead_mobile})</td>
                </tr>
                <tr class="contectitem">
                    <td>项目联络员</td>
                    <td colspan="2">{$notes.liaison_realname}(电话：{$notes.liaison_mobile})</td>
                </tr>
                <tr class="contectitem">
                    <td>分包包单位负责人</td>
                    <td colspan="2">{$notes.unit_realname}(电话：{$notes.unit_mobile})</td>
                </tr>
                {volist name="examName" key = "ek" id="et"}
                    
                    {if condition="$examShow[$et.recid]['cnt'] > 0"}
                        <tr {if condition="$ek%2 eq 1"} class="layui-table-hover examitem" {else/}  class="examitem" {/if}>
                            <!-- <td rowspan="{$examShow[$ek]['cnt']+1}">{$et['title']}</td> -->
                            <td>{$et['title']}</td>
                            {volist name="$examShow[$et.recid]['data']" key = "sk" id="st"}
                                {if condition="$st['status'] eq 1"}
                                    <td><span class="red">未提交</span></td>
                                    <td colspan="2">原因：{$st['notes']}</td>
                                {elseif condition="$st['status'] eq 2"}
                                    <td><span>进行中</span></td>
                                    <td colspan="2">办理进程：{$st['notes']}</td>
                                {elseif condition="$st['status'] eq 3"}
                                    <td><span class="green">已完成</span></td>
                                    <td>许可证号：{$st['permit']}
                                        <a href="javascript:void(0);" data-src='{$st['img']}' class="layui-btn layui-btn-normal layui-btn-small liucheng">详细图片</a>
                                    </td>
                                    <td>审批部门：
                                        {if condition="$st.punit > 0"}
                                            {$examUnit[$st.punit]['title']}
                                        {/if}
                                        ({$st['examtime']})
                                    </td>
                                {/if}
                            {/volist}
                        </tr>
                        
                    {else}
                        <tr {if condition="$ek%2 eq 1"} class="layui-table-hover examitem" {else } class="examitem" {/if}>
                            <td >{$et['title']}</td>
                            <td colspan="3"><span class="red">该项目尚未提交该类手续</span></td>
                        </tr>
                    {/if}
                {/volist}
            </tbody>
        </table>
    </div>  
</div>
{include file="block/layui" /}

<script>
var suburl = "{:url('project/subexam?proid='.$info['recid'])}";
layui.use(['jquery', 'laydate'], function() {
    var $ = layui.jquery;
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

    $("#exam_project").on("click",function(){
        layer.confirm('提交审核后，数据将不能修改，您确定要修改数据？', {
          btn: ['提交审核', '暂不提交'] //可以无限个按钮
        }, function(index, layero){
            layer.load(1);
            $.post(suburl, {r:Math.random()}, function(str){
                if (str.code == 0) {
                    $("#exam_project").remove();
                    $("#exam_edit").remove();
                    location.reload();
                }
                layer.closeAll();
                layer.msg(str.msg);
            }, 'json');
        }, function(index){
           layer.closeAll();
        });
    });
});
</script>
