{if condition="input('param.hisi_iframe') || cookie('hisi_iframe')"}
<!DOCTYPE html>
<html>
<head>
    <title>{$_admin_menu_current['title']} -  Powered by {:config('hisiphp.name')}</title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css?v={:config('hisiphp.version')}">
    <link rel="stylesheet" href="__ADMIN_CSS__/style.css?v={:config('hisiphp.version')}">
    <link rel="stylesheet" href="__STATIC__/fonts/typicons/min.css?v={:config('hisiphp.version')}">
    <link rel="stylesheet" href="__STATIC__/fonts/font-awesome/min.css?v={:config('hisiphp.version')}">
</head>
<body>
<div style="padding:0 10px;" class="mcolor">{:runhook('system_admin_tips')}</div>
{else /}
<!DOCTYPE html>
<html>
<head>
    <title>{if condition="$_admin_menu_current['url'] eq 'admin/index/index'"}信息项目综合管理系统{else /}{$_admin_menu_current['title']}{/if} - 综合管理平台</title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css?v={:config('hisiphp.version')}">
    <link rel="stylesheet" href="__ADMIN_CSS__/style.css?v={:config('hisiphp.version')}">
    <link rel="stylesheet" href="__STATIC__/fonts/typicons/min.css?v={:config('hisiphp.version')}">
    <link rel="stylesheet" href="__STATIC__/fonts/font-awesome/min.css?v={:config('hisiphp.version')}">
</head>
<body>
{php}
$ca = strtolower(request()->controller().'/'.request()->action());
{/php}
<div class="layui-layout layui-layout-admin">
    <div class="header-big">
        <div class="layui-header" style="z-index:999!important;">
            <div class="fl header-logo"><span></span></div>
            <!--<div class="fl header-fold"><a href="javascript:;" title="打开/关闭左侧导航" class="aicon ai-caidan" id="foldSwitch"></a></div>-->
            <ul class="layui-nav fl nobg main-nav">
                {if condition="$roleid eq 3"}
                    <li class="layui-nav-item"><a href={:url('admin/index/index')}>
                        <span class="nav_zero">首页</span></a>
                    </li>

                    <li class="layui-nav-item"><a href={:url('admin/project/manage')}>
                        <span class="nav_003">项目管理</span></a>
                    </li>

                    <li class="layui-nav-item"><a href={:url('admin/project/generateditem')}>
                        <span class="nav_first">添加项目</span></a>
                    </li>
                   
                    
                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                {elseif condition="$roleid eq 5"}
                    <li class="layui-nav-item"><a href={:url('admin/index/index')}>
                        <span class="nav_zero">首页</span></a>
                    </li>

                    <li class="layui-nav-item"><a href={:url('admin/prouser/listuser?type=2')}>
                        <span class="nav_004">待审核项目</span></a>
                    </li>

                    <li class="layui-nav-item"><a href={:url('admin/prouser/listuser?type=11')}>
                        <span class="nav_003">已审核项目</span></a>
                    </li>

                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                {elseif condition="$roleid eq 4"}
                    <li class="layui-nav-item"><a href={:url('admin/index/index')}>
                        <span class="nav_zero">首页</span></a>
                    </li>

                    <li class="layui-nav-item"><a href={:url('admin/project/examine?type=1')}>
                        <span class="nav_004">待审核项目</span></a>
                    </li>

                     <li class="layui-nav-item"><a href={:url('admin/project/examine?type=11')}>
                        <span class="nav_003">已审核项目</span></a>
                    </li>

                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                {elseif condition="$roleid eq 6"}
                    <li class="layui-nav-item"><a href={:url('admin/index/index')}>
                        <span class="nav_zero">首页</span></a>
                    </li>
                    {if $stype eq 2}
                    <li class="layui-nav-item"><a href={:url('admin/project/statis?type=5')}>
                        <span class="nav_001">手续办理</span></a>
                    </li>
                    {/if}
                    {if $stype eq 3}
                    <li class="layui-nav-item"><a href={:url('admin/project/statis?type=6')}>
                        <span class="nav_003">辖区办事处</span></a>
                    </li>
                    {/if}

                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                {else /}
                    {volist name="_admin_menu" id="vo"}
                        {if condition="($uid eq 1 and ($vo['id'] eq 6 or $vo['id'] eq 217 or $vo['id'] eq 14)) or $uid neq 1"}
                            {if condition="($vo['id'] eq 227 or $vo['id'] eq 228) and $headshow eq 0"}
                            {else /}
                                {if condition="($vo['id'] eq 217 and $headhome eq 1) or $vo['id'] neq 217 "}
                                    {if condition="($_admin_menu_parents['pid'] eq $vo['id'])"}
                                        <li class="layui-nav-item layui-this">
                                    {else /}
                                        <li class="layui-nav-item">
                                    {/if}
                                        <a href={:url($vo['url'])}><span class={$vo['icon']}>{$vo['title']}</span></a>
                                    </li>
                                {/if}
                            {/if}
                        {/if}
                    {/volist}
                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                {/if}
            </ul>
            <ul class="nav_right">

                <li>
                    <a href="{:url('admin/user/info')}">个人设置</a>&nbsp;&nbsp;|
                    <a href="{:url('admin/publics/logout')}">退出系统</a>
                </li>
            </ul>
        </div>

            <div class="menu">
                <ul>
                    {if condition = "$roleid eq 1"}
                        {volist name="_admin_menu" id="v"}
                            {if condition="($_admin_menu_current['id'] eq $v['id'] or $_admin_menu_parents['pid'] eq $v['id'])"}
                                {if condition="$v['id'] neq 218 and $v['id'] neq 203 and $v['id'] neq 14 and $v['id'] neq 227 and $v['id'] neq 228"}
                                    {volist name="v['childs']" id="vv" key="kk"}
                                        {if condition="($_admin_menu_current['id'] eq $vv['id'])"}
                                            <li><a href={:url($vv['url'])} class="hover">{$vv['title']}</a></li>
                                        {else/}
                                            <li><a href={:url($vv['url'])}>{$vv['title']}</a></li>
                                        {/if}
                                    {/volist}
                                {/if}
                            {/if}
                        {/volist}
                    {else}
                        <li><a href="javascript:history.go(-1)">返回</a></li>
                        <sapn style="float:right;">您好，{$admin_user['nick']}，欢迎登录经开区信息项目综合管理系统。</span>
                    {/if}
                </ul>
            </div>
        
    </div>

    {if condition="$leftmenu > 0"}
        {if condition="$leftmenu eq 1"}
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <li class="layui-side-item">
                            <a href="{:url('admin/project/generateditem?proid='.$proid)}" data-box="baseitem">基本信息<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="{:url('admin/project/builditem?proid='.$proid)}" data-box="builditem">建设内容<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="{:url('admin/project/staff?proid='.$proid)}" data-box="contectitem">联系方式<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="{:url('admin/project/examlist?proid='.$proid)}" data-box="examitem">手续完成情况<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        
                    </ul>
                </div>
            </div>   
        {/if}


        {if condition="$leftmenu eq 5"}
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <li class="layui-side-item">
                            <a href="javascript:void(0)" data-box="baseitem">基本信息<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="javascript:void(0)" data-box="builditem">建设内容<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="javascript:void(0)" data-box="contectitem">联系方式<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="javascript:void(0)" data-box="examitem">手续完成情况<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        
                    </ul>
                </div>
            </div>   
        {/if}

        {if condition="$leftmenu eq 2"}
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
<!--                        <li class="layui-side-item">-->
<!--                            <a target="_blank"  href={:url('admin/project/mreport?proid='.$proid)}>本月月报</a>-->
<!--                        </li>去除本月月报内容-->

                        <li class="layui-side-item">
                            <li class="layui-side-item">
                                <a  {if $_admin_menu_current['id'] eq 228 or $_admin_menu_current['id'] eq 235 or $_admin_menu_current['id'] eq 236 or $_admin_menu_current['id'] eq 218} class="hover"{/if} href="javascript:void(0)">本月月报</a>
                            </li>
                            <ul class="layui-nav layui-nav-tree layui-nav-sectree">
                                <li class="layui-side-item">
                                    <a  {if condition="$_admin_menu_current['id'] eq 228"}class="hover"{/if} href={:url('admin/project/mreportlist?proid='.$proid)}>
                                        <i class="layui-icon"></i>当月完成投资</a>
                                </li>
                                <li class="layui-side-item">
                                    <a {if condition="$_admin_menu_current['id'] eq 235"}class="hover"{/if} href={:url('admin/project/reexamlist?proid='.$proid)}  >
                                        <i class="layui-icon"></i>手续完成情况</a>
                                </li>
                                <li class="layui-side-item">
                                    <a {if condition="$_admin_menu_current['id'] eq 236"}class="hover"{/if} href={:url('admin/project/progress?proid='.$proid)}  >
                                        <i class="layui-icon"></i>形象进度</a>
                                </li>
                                <li  class="layui-side-item">
                                    <a {if condition="$_admin_menu_current['id'] eq 218"}class="hover"{/if} href={:url('admin/project/dynalist?proid='.$proid)}  >
                                        <i class="layui-icon"></i>存在问题</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="layui-side-item">
                            <a target="_blank" {if condition="$_admin_menu_current['id'] eq 237"}class="hover"{/if} href={:url('admin/project/mreport?proid='.$proid)}  >月报总览</a>
                        </li>
                    </ul>
                </div>
            </div>   
        {/if}


        {if condition="$leftmenu eq 3"}
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li class="layui-side-item">
                                <a href="javascript:void(0)" data-box="baseitem">基本信息<!--<span class="layui-nav-more"></span>--></a>
                            </li>
                            <li class="layui-side-item">
                                <a href="javascript:void(0)" data-box="touzi">当月完成投资<!--<span class="layui-nav-more"></span>--></a>
                            </li>
                            <li class="layui-side-item">
                                <a href="javascript:void(0)" data-box="examitem">手续完成情况<!--<span class="layui-nav-more"></span>--></a>
                            </li>
                            <li class="layui-side-item">
                                <a href="javascript:void(0)" data-box="jindu">形象进度<!--<span class="layui-nav-more"></span>--></a>
                            </li>
                            
                    </ul>
                    </ul>
                </div>
            </div>   
        {/if}


        {if condition="$leftmenu eq 4"}
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li class="layui-side-item"><a  href={:url('admin/project/statis?type=1')}>省市重点项目</a></li>
                            <li class="layui-side-item"><a  href={:url('admin/project/statis?type=2')}>双十工程项目</a></li>
                            <li class="layui-side-item"><a  href={:url('admin/project/statis?type=3')}>项目总览</a></li>
                            <li class="layui-side-item"><a  href={:url('admin/project/statis?type=4')}>分管部门</a></li>
                            <li class="layui-side-item"><a  href={:url('admin/project/statis?type=5')}>手续办理部门</a></li>
                            <li class="layui-side-item"><a  href={:url('admin/project/statis?type=6')}>辖区办事处</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        {/if}

        {if condition="$leftmenu eq 51"}
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li {if condition="$type eq 1"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/prouser/listuser?type=1')}>待企业提交</a></li>
                            <li {if condition="$type eq 2"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/prouser/listuser?type=2')}>待审核</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        {/if}

        {if condition="$leftmenu eq 52"}
            <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li {if condition="$type eq 11"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/prouser/listuser?type=11')}>上级审核通过</a></li>
                            <li {if condition="$type eq 12"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/prouser/listuser?type=12')}>待上级审核</a></li>
                            <li {if condition="$type eq 13"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/prouser/listuser?type=13')}>当年省市重点项目</a></li>
                            <li {if condition="$type eq 14"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/prouser/listuser?type=14')}>当年“双十工程”项目</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        {/if}

        {if condition="$leftmenu eq 53"}
        <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
            <div class="layui-side-scroll">
                <ul class="layui-nav layui-nav-tree">
                    <ul class="layui-nav layui-nav-tree">
                        <li {if condition="$type eq 11"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/problemlist?type=1')}>未完成问题</a></li>
                        <li {if condition="$type eq 12"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/problemlist?type=2')}>已完成问题</a></li>
                        <li {if condition="$type eq 13"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/problemlist?type=3')}>本月新增问题</a></li>
                    </ul>
                </ul>
            </div>
        </div>
        {/if}


        {if condition="$leftmenu eq 41"}
            <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li {if condition="$type eq 1"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/examine?type=1')}>需审核项目</a></li>
                            <li {if condition="$type eq 2"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/examine?type=2')}>拟列入当年省市重点项目</a></li>
                            <li {if condition="$type eq 3"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/examine?type=3')}>拟列入当年“双十工程”项目</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        {/if}

        {if condition="$leftmenu eq 42"}
            <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li {if condition="$type eq 11"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/examine?type=11')}>已审核项目</a></li>
                            <li {if condition="$type eq 12"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/examine?type=12')}>当年省市重点项目</a></li>
                            <li {if condition="$type eq 13"}class="layui-side-item layui-side-hover"{else}class="layui-side-item"{/if}><a  href={:url('admin/project/examine?type=13')}>当年“双十工程”项目</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        {/if}


    {/if}
    <div class="layui-body" id="switchBody">
        <div style="padding:0 10px;" class="mcolor">{:runhook('system_admin_tips')}</div>
        <div class="page-body">
{/if}