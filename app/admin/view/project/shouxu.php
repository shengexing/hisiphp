<div class="layui-form">
    <div class="xzxmindex">
        <div class="xzxmindex_right">
              <div class="rightthird">
                    {volist name="data" id="v"}
                        <a href="{:url('admin/project/statis?type=5&sp='.$v['unit'])}">
                            {$v['nick']}
                            ({if condition="isset($shouxu[$v.unit])"}{$shouxu[$v.unit]['cnt']}{else}0{/if})
                        </a>
                    {/volist}
              </div>
        </div>
    </div>
</div>
{include file="block/layui" /}