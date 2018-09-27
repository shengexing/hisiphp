<div {if condition="$leftmenu > 0"} class="page-toolbar page-form" {else}class="page-toolbar"{/if}>
    {if condition="$editAcc eq 1"}
        <div class="layui-btn-group fl">
            <a href="{:url('admin/project/dynamic?proid='.$proid)}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>发布项目问题</a>
        </div>
    {/if}
</div>

<fieldset {if condition="$leftmenu > 0"}class="layui-elem-field layui-field-title page-form"{else}class="layui-elem-field layui-field-title"{/if} style="margin-top: 30px;">
  <legend>项目问题</legend>
</fieldset>
<ul {if condition="$leftmenu > 0"} class="layui-timeline page-form" {else} class="layui-timeline" {/if}>
    {volist name="dynamic" key="dk" id="dv"}
          <li class="layui-timeline-item">
            <i class="layui-icon layui-timeline-axis"></i>
            <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">
                    <span class="fl">
                        {$dynamicType[$dv.qtype]}
                        {if condition="$dv.qtype eq 1"}
                            <a href="{:url('admin/project/dynamic?proid='.$proid.'&recid='.$dv['recid'])}">
                                {if condition="$dv.etype > 0"}
                                    ({$xianchang[$dv.etype]['title']})                            
                                {/if}

                            </a>
                        {elseif condition="$dv.qtype eq 2"}
                            <a href="{:url('admin/project/dynamic?proid='.$proid.'&recid='.$dv['recid'])}">
                                {if condition="$dv.etype > 0"}
                                    ({$examName[$dv.etype]['title']})                            
                                {/if} 
                            </a>
                        {else}
                        {/if}
                        {if condition="$dv.status eq 0"}
                            <b class="green">已处理</b>
                        {else}
                            <b class="red">未处理</b>
                        {/if}
                    </span>
                     <p class="fl">{$dv.notes}<p>
                     <p class="fr">{$dv.ctime}</p>
                </h3>
            </div>
          </li>
    {/volist}
</ul>  
{$pages}
{include file="block/layui" /}