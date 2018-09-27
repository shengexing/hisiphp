{if condition="$roleid eq 3"}
    <div class="layui-body">
         
         {if condition="$company.status eq 99"}
            <blockquote class="layui-elem-quote">
              企业基本信息
            </blockquote>
             <table class="layui-table mt10" lay-even="" lay-skin="row">
                <tbody>
                      <tr>
                          <td>公司名称：</td>
                          <td>{$company.company}</td>
                          <td>详细地址：</td>
                          <td>{$company.address}</td>
                      </tr>
                       <tr>
                          <td>营业执照：</td>
                          <td>{$company.licence}<a href="javascript:void(0);" data-src='{$company.licence_img}' style="color: #0000cc; float:right;" class="liucheng">查看详情</a></td>
                          <td>法人姓名：</td>
                          <td>{$company.legal}</td>
                      </tr>
                      <tr>
                          <td>企业简介：</td>
                          <td colspan="3">{$company.notes}</td>
                      </tr>
                </tbody>
            </table>
         {else}
            <blockquote class="layui-elem-quote">
              企业基本信息
              <a href="{:url('admin/project/company')}"  class="layui-btn layui-btn-big">完善企业信息</a>
            </blockquote>
         {/if}


          <blockquote class="layui-elem-quote">
              我的项目
          </blockquote>

          <div class="layui-form">
              <table class="layui-table mt10" lay-even="" lay-skin="row">
                  <thead>
                      <tr>
                          <th>项目名称</th>
                          <th>建设起止年限</th>
                          <th>总投资</th>
                          <th>年度计划投资</th>
                          <th>月报</th>
                          <th>联系方式</th>
                          <th>操作</th>
                      </tr> 
                  </thead>
                  <tbody>
                      {volist name="project" id="v"}
                      <tr>
                          <td>{$v['title']}</td>
                          <td>{$v['sdate']}-{$v['edate']}</td>
                          <td>{$v['amount']}万</td>
                          <td>{$v['eamount']}万</td>
                          <td>
                              {if condition="$v['step'] >= 60"}
                                  <div class="layui-btn-group">
                                      <a  target="_blank" href="{:url('admin/project/mreportlist?proid='.$v['recid'])}" class="layui-btn layui-btn-primary layui-btn-small">
                                          提交月报
                                      </a>
                                  </div>
                              {else}
                                  <span class="red">待审核</span>
                              {/if}
                          </td>
                          <td>
                              {if condition="$v['step'] >= 30"}
                              <div class="layui-btn-group">
                                  <div class="layui-btn-group">
                                      <a target="_blank" href="{:url('admin/project/prostaff?proid='.$v['recid'])}?type=examitem" class="layui-btn layui-btn-primary">
                                          联系人
                                      </a>
                                  </div>
                              </div>
                              {else}
                                  <span class="red">待提交</span>
                              {/if}
                          </td>

                           <td>
                              {if condition="$v['step'] <= 30"}
                              <div class="layui-btn-group">
                                  <div class="layui-btn-group">
                                      <a target="_blank" href="{:url('admin/project/generateditem?proid='.$v['recid'])}?type=examitem" class="layui-btn layui-btn-primary">
                                          完善信息
                                      </a>
                                  </div>
                              </div>
                              {/if}

                               {if condition="$v['step'] >= 30"}
                              <div class="layui-btn-group">
                                  <div class="layui-btn-group">
                                      <a target="_blank" href="{:url('admin/project/baseitem?proid='.$v['recid'])}?type=examitem" class="layui-btn layui-btn-primary">
                                          预览信息
                                      </a>
                                  </div>
                              </div>
                              {/if}
                          </td>
                      </tr>
                      {/volist}
                  </tbody>
              </table>
          </div>

    </div>



{/if}

{if condition="$roleid eq 4"}

   <div class="glxtindex" id="glxtindex">
            <a href="{:url('admin/project/examine?type=1')}" class="loginfirst"></a>
            <a href="javascript:void(0)" class="loginforth" id="show_xzxmindex"></a>
            <a href="{:url('admin/project/timelimit')}" class="loginfirst"></a>
    </div>

    <div class="xzxmindex hide" id="xzxmindex">
        <div class="xzxmindex_right">
              <div class="rightfirst">
                  <a class="company" href="{:url('admin/project/companyinfo')}"></a>
                  <a class="shengshi" href="{:url('admin/project/statis?type=1')}"></a>
                  <a class="shuangshi" href="{:url('admin/project/tens')}"></a>
                  <a class="guding" href="{:url('admin/project/assets')}"></a>
                  <a class="zonglan" href="{:url('admin/project/statis')}"></a>
              </div>
              <div class="rightsenc">
                  <a class="fenguan" href="{:url('admin/project/fenguan')}"></a>
                  <a class="shouxu" href="{:url('admin/project/shouxu')}"></a>
                  <a class="xiequ" class="shengshi" href="{:url('admin/project/xiaqu')}"></a>
              </div>
        </div>
    </div>
{/if}

{if condition="$roleid eq 5"}
<div class="xzxmindex">
    <div class="xzxmindex_right">
          <div class="rightfirst">
              <a class="daishenhe" href="{:url('admin/prouser/listuser?type=1')}"></a>
              <a class="zonglan" href="{:url('admin/prouser/listuser?type=11')}"></a>
              <a class="zonglan" href="{:url('admin/project/problemlist?type=7')}"></a>
          </div>
    </div>
</div>
{/if}


{if condition="$roleid eq 6"}
<div class="xzxmindex">
    <div class="xzxmindex_right">
          <div class="rightsenc">
              {if $stype == 2}
              <a class="shouxu" href="{:url('admin/project/statis?type=5')}"></a>
              <a class="shouxu" href="{:url('admin/project/problemlist?type=7')}"></a>
              {/if}
              {if $stype == 3}
              <a class="xiequ" class="shengshi" href="{:url('admin/project/statis?type=6')}"></a>
              {/if}
          </div>
    </div>
</div>
{/if}

{include file="block/layui" /}
{if condition="$roleid eq 4"}
<script>
layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#show_xzxmindex").on("click",function(){
        $("#xzxmindex").removeClass("hide");
        $("#glxtindex").addClass("hide");
    });
});
</script>
{/if}

{if condition="$roleid eq 3"}
<script>
layui.use(['jquery', 'form'], function() {
    var $ = layui.jquery,  form = layui.form;
    $(".liucheng").on("click",function(){
        var _img = $(this).data("src");
        var _html = "<img src='"+ _img +"' width='100%'>"
        layer.open({
                      type: 1,
                      title: '查看营业执照',
                      skin: 'layui-layer-rim', //加上边框
                      area: '800px', //宽高
                      content: _html
                    });

    });});
</script>
{/if}

