<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:87:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp/app/admin\view\project\mreport.php";i:1537368900;s:78:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\layout.php";i:1531729143;s:84:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\block\header.php";i:1537523598;s:83:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\block\layui.php";i:1531729143;s:84:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\block\footer.php";i:1531729143;}*/ ?>
<?php if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_admin_menu_current['title']; ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/admin/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/admin/css/style.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
</head>
<body>
<div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
<?php else: ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php if($_admin_menu_current['url'] == 'admin/index/index'): ?>信息项目综合管理系统<?php else: ?><?php echo $_admin_menu_current['title']; endif; ?> - 综合管理平台</title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/admin/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/admin/css/style.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/hisiphp/hisiphp/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
</head>
<body>
<?php 
$ca = strtolower(request()->controller().'/'.request()->action());
 ?>
<div class="layui-layout layui-layout-admin">
    <div class="header-big">
        <div class="layui-header" style="z-index:999!important;">
            <div class="fl header-logo"><span></span></div>
            <!--<div class="fl header-fold"><a href="javascript:;" title="打开/关闭左侧导航" class="aicon ai-caidan" id="foldSwitch"></a></div>-->
            <ul class="layui-nav fl nobg main-nav">
                <?php if($roleid == 3): ?>
                    <li class="layui-nav-item"><a href=<?php echo url('admin/index/index'); ?>>
                        <span class="nav_zero">首页</span></a>
                    </li>

                    <li class="layui-nav-item"><a href=<?php echo url('admin/project/manage'); ?>>
                        <span class="nav_003">项目管理</span></a>
                    </li>

                    <li class="layui-nav-item"><a href=<?php echo url('admin/project/generateditem'); ?>>
                        <span class="nav_first">添加项目</span></a>
                    </li>
                   
                    
                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                <?php elseif($roleid == 5): ?>
                    <li class="layui-nav-item"><a href=<?php echo url('admin/index/index'); ?>>
                        <span class="nav_zero">首页</span></a>
                    </li>

                    <li class="layui-nav-item"><a href=<?php echo url('admin/prouser/listuser?type=2'); ?>>
                        <span class="nav_004">待审核项目</span></a>
                    </li>

                    <li class="layui-nav-item"><a href=<?php echo url('admin/prouser/listuser?type=11'); ?>>
                        <span class="nav_003">已审核项目</span></a>
                    </li>

                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                <?php elseif($roleid == 4): ?>
                    <li class="layui-nav-item"><a href=<?php echo url('admin/index/index'); ?>>
                        <span class="nav_zero">首页</span></a>
                    </li>

                    <li class="layui-nav-item"><a href=<?php echo url('admin/project/examine?type=1'); ?>>
                        <span class="nav_004">待审核项目</span></a>
                    </li>

                     <li class="layui-nav-item"><a href=<?php echo url('admin/project/examine?type=11'); ?>>
                        <span class="nav_003">已审核项目</span></a>
                    </li>

                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                <?php elseif($roleid == 6): ?>
                    <li class="layui-nav-item"><a href=<?php echo url('admin/index/index'); ?>>
                        <span class="nav_zero">首页</span></a>
                    </li>
                    <?php if($stype == 2): ?>
                    <li class="layui-nav-item"><a href=<?php echo url('admin/project/statis?type=5'); ?>>
                        <span class="nav_001">手续办理</span></a>
                    </li>
                    <?php endif; if($stype == 3): ?>
                    <li class="layui-nav-item"><a href=<?php echo url('admin/project/statis?type=6'); ?>>
                        <span class="nav_003">辖区办事处</span></a>
                    </li>
                    <?php endif; ?>

                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                <?php else: if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $_admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(($uid == 1 and ($vo['id'] == 6 or $vo['id'] == 217 or $vo['id'] == 14)) or $uid != 1): if(($vo['id'] == 227 or $vo['id'] == 228) and $headshow == 0): else: if(($vo['id'] == 217 and $headhome == 1) or $vo['id'] != 217): if(($_admin_menu_parents['pid'] == $vo['id'])): ?>
                                        <li class="layui-nav-item layui-this">
                                    <?php else: ?>
                                        <li class="layui-nav-item">
                                    <?php endif; ?>
                                        <a href=<?php echo url($vo['url']); ?>><span class=<?php echo $vo['icon']; ?>><?php echo $vo['title']; ?></span></a>
                                    </li>
                                <?php endif; endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                    <li class="layui-nav-item">
                        <a href="javascript:void(0);" id="lockScreen"><span class="nav_clock">锁屏</span></a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="nav_right">

                <li>
                    <a href="<?php echo url('admin/user/info'); ?>">个人设置</a>&nbsp;&nbsp;|
                    <a href="<?php echo url('admin/publics/logout'); ?>">退出系统</a>
                </li>
            </ul>
        </div>

            <div class="menu">
                <ul>
                    <?php if($roleid == 1): if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $_admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(($_admin_menu_current['id'] == $v['id'] or $_admin_menu_parents['pid'] == $v['id'])): if($v['id'] != 218 and $v['id'] != 203 and $v['id'] != 14 and $v['id'] != 227 and $v['id'] != 228): if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;if(($_admin_menu_current['id'] == $vv['id'])): ?>
                                            <li><a href=<?php echo url($vv['url']); ?> class="hover"><?php echo $vv['title']; ?></a></li>
                                        <?php else: ?>
                                            <li><a href=<?php echo url($vv['url']); ?>><?php echo $vv['title']; ?></a></li>
                                        <?php endif; endforeach; endif; else: echo "" ;endif; endif; endif; endforeach; endif; else: echo "" ;endif; else: ?>
                        <li><a href="javascript:history.go(-1)">返回</a></li>
                        <sapn style="float:right;">您好，<?php echo $admin_user['nick']; ?>，欢迎登录经开区信息项目综合管理系统。</span>
                    <?php endif; ?>
                </ul>
            </div>
        
    </div>

    <?php if($leftmenu > 0): if($leftmenu == 1): ?>
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <li class="layui-side-item">
                            <a href="<?php echo url('admin/project/generateditem?proid='.$proid); ?>" data-box="baseitem">基本信息<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="<?php echo url('admin/project/builditem?proid='.$proid); ?>" data-box="builditem">建设内容<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="<?php echo url('admin/project/staff?proid='.$proid); ?>" data-box="contectitem">联系方式<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        <li class="layui-side-item">
                            <a href="<?php echo url('admin/project/examlist?proid='.$proid); ?>" data-box="examitem">手续完成情况<!--<span class="layui-nav-more"></span>--></a>
                        </li>
                        
                    </ul>
                </div>
            </div>   
        <?php endif; if($leftmenu == 5): ?>
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
        <?php endif; if($leftmenu == 2): ?>
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
<!--                        <li class="layui-side-item">-->
<!--                            <a target="_blank"  href=<?php echo url('admin/project/mreport?proid='.$proid); ?>>本月月报</a>-->
<!--                        </li>去除本月月报内容-->

                        <li class="layui-side-item">
                            <li class="layui-side-item">
                                <a  <?php if($_admin_menu_current['id'] == 228 or $_admin_menu_current['id'] == 235 or $_admin_menu_current['id'] == 236 or $_admin_menu_current['id'] == 218): ?> class="hover"<?php endif; ?> href="javascript:void(0)">本月月报</a>
                            </li>
                            <ul class="layui-nav layui-nav-tree layui-nav-sectree">
                                <li class="layui-side-item">
                                    <a  <?php if($_admin_menu_current['id'] == 228): ?>class="hover"<?php endif; ?> href=<?php echo url('admin/project/mreportlist?proid='.$proid); ?>>
                                        <i class="layui-icon"></i>当月完成投资</a>
                                </li>
                                <li class="layui-side-item">
                                    <a <?php if($_admin_menu_current['id'] == 235): ?>class="hover"<?php endif; ?> href=<?php echo url('admin/project/reexamlist?proid='.$proid); ?>  >
                                        <i class="layui-icon"></i>手续完成情况</a>
                                </li>
                                <li class="layui-side-item">
                                    <a <?php if($_admin_menu_current['id'] == 236): ?>class="hover"<?php endif; ?> href=<?php echo url('admin/project/progress?proid='.$proid); ?>  >
                                        <i class="layui-icon"></i>形象进度</a>
                                </li>
                                <li  class="layui-side-item">
                                    <a <?php if($_admin_menu_current['id'] == 218): ?>class="hover"<?php endif; ?> href=<?php echo url('admin/project/dynalist?proid='.$proid); ?>  >
                                        <i class="layui-icon"></i>存在问题</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="layui-side-item">
                            <a target="_blank" <?php if($_admin_menu_current['id'] == 237): ?>class="hover"<?php endif; ?> href=<?php echo url('admin/project/mreport?proid='.$proid); ?>  >月报总览</a>
                        </li>
                    </ul>
                </div>
            </div>   
        <?php endif; if($leftmenu == 3): ?>
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
        <?php endif; if($leftmenu == 4): ?>
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li class="layui-side-item"><a  href=<?php echo url('admin/project/statis?type=1'); ?>>省市重点项目</a></li>
                            <li class="layui-side-item"><a  href=<?php echo url('admin/project/statis?type=2'); ?>>双十工程项目</a></li>
                            <li class="layui-side-item"><a  href=<?php echo url('admin/project/statis?type=3'); ?>>项目总览</a></li>
                            <li class="layui-side-item"><a  href=<?php echo url('admin/project/statis?type=4'); ?>>分管部门</a></li>
                            <li class="layui-side-item"><a  href=<?php echo url('admin/project/statis?type=5'); ?>>手续办理部门</a></li>
                            <li class="layui-side-item"><a  href=<?php echo url('admin/project/statis?type=6'); ?>>辖区办事处</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        <?php endif; if($leftmenu == 51): ?>
            <div class="layui-side layui-bg-black" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li <?php if($type == 1): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=1'); ?>>待企业提交</a></li>
                            <li <?php if($type == 2): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=2'); ?>>待审核</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        <?php endif; if($leftmenu == 52): ?>
            <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li <?php if($type == 11): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=11'); ?>>上级审核通过</a></li>
                            <li <?php if($type == 12): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=12'); ?>>待上级审核</a></li>
                            <li <?php if($type == 13): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=13'); ?>>当年省市重点项目</a></li>
                            <li <?php if($type == 14): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=14'); ?>>当年“双十工程”项目</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        <?php endif; if($leftmenu == 53): ?>
        <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
            <div class="layui-side-scroll">
                <ul class="layui-nav layui-nav-tree">
                    <ul class="layui-nav layui-nav-tree">
                        <li <?php if($type == 11): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=11'); ?>>未完成问题</a></li>
                        <li <?php if($type == 12): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=12'); ?>>已完成问题</a></li>
                        <li <?php if($type == 13): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=13'); ?>>本月新增问题</a></li>
                    </ul>
                </ul>
            </div>
        </div>
        <?php endif; if($leftmenu == 41): ?>
            <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li <?php if($type == 1): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/examine?type=1'); ?>>需审核项目</a></li>
                            <li <?php if($type == 2): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/examine?type=2'); ?>>拟列入当年省市重点项目</a></li>
                            <li <?php if($type == 3): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/examine?type=3'); ?>>拟列入当年“双十工程”项目</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        <?php endif; if($leftmenu == 42): ?>
            <div class="layui-side layui-bg-black layui-side-width" id="switchNav">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree">
                        <ul class="layui-nav layui-nav-tree">
                            <li <?php if($type == 11): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/examine?type=11'); ?>>已审核项目</a></li>
                            <li <?php if($type == 12): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/examine?type=12'); ?>>当年省市重点项目</a></li>
                            <li <?php if($type == 13): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/examine?type=13'); ?>>当年“双十工程”项目</a></li>
                        </ul>
                    </ul>
                </div>
            </div>   
        <?php endif; endif; ?>
    <div class="layui-body" id="switchBody">
        <div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
        <div class="page-body">
<?php endif; switch($tab_type): case "1": ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['url'] == $_admin_menu_current['url'] or (url($vo['url']) == $tab_data['current']) or ($vo['url'] == $tab_data['current'])): ?>
                    <li class="layui-this">
                    <?php else: ?>
                    <li>
                    <?php endif; if(substr($vo['url'], 0, 4) == 'http'): ?>
                        <a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a>
                    <?php else: ?>
                        <a href="<?php echo url($vo['url']); ?>"><?php echo $vo['title']; ?></a>
                    <?php endif; ?>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <div class="layui-tab-item layui-show">
                    <form class="layui-form" action="<?php echo url('project/addmreport'); ?>" method="post" id="editForm">
<style>
.layui-table[lay-even] tr:nth-child(even){
    background-color:#fff;
}
.layui-table-hover {
    background-color:#f2f2f2!important;
}
</style>
<div>
	<input type="hidden" class="layui-input" id="skipurl" value="<?php echo $skipurl; ?>">

	<div class="layui-form-item">
        <label class="layui-form-label layui-form-project">月报时间：</label>
        <div class="layui-input-inline">
            <select name="cyear" lay-filter="cyear" id="cyear" class='field-cyear' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($timeData['years']) || $timeData['years'] instanceof \think\Collection || $timeData['years'] instanceof \think\Paginator): $pk = 0; $__LIST__ = $timeData['years'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pt; ?>"><?php echo $pt; ?>年</option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
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
                    <td><?php echo $unitData['nick']; ?></td>
                    <td>项目名称</td>
                    <td><?php echo $info['title']; ?></td>
                    <td>进度类别</td>
                    <td><?php echo $schedule[$info['schedule']]; ?></td>
                </tr>

                <tr  class="layui-table-hover">
<!--                     <td>项目级别</td>
                    <td><?php echo $productLevel[$info['level']]['title']; ?></td> -->
                    <td>是否为当年省市重点项目类别</td>
                    <td>
                        <?php if($info['isimportant'] == 1): ?>
                            <span class="red">否</span>
                        <?php else: if($info['isimportant'] > 0): ?>
                                <span class="green"><?php echo $_isImportant[$info['isimportant']]; ?></span>
                            <?php else: ?>
                                <span class="red">否</span>
                            <?php endif; endif; ?>
                    </td>
                    <td>是否为当年“双十工程”项目</td>
                    <td>
                        <?php if($info['isten'] == 1): if($info['tentype'] > 0): ?>
                                <span class="green"><?php echo $productTens[$info['tentype']]['title']; ?></span>
                            <?php else: ?>
                                <span class="green">是</span>
                            <?php endif; else: ?>
                            <span class="red">否</span>
                        <?php endif; ?>
                    </td>
                     <td>行业类别</td>
                    <td><?php echo $info['industry']; ?></td>
                </tr>
                <tr>
                    <td>项目业主</td>
                    <td><?php echo $cuserData['nick']; ?></td>
                    <td>实施地点</td>
                    <td><?php echo $info['address']; ?></td> 
                    <td>
                        问题汇总(
                            <?php if($dynacnt>0): ?>
                                <span class="red"><?php echo $dynacnt; ?></span>
                            <?php else: ?>
                                <span class="green">0</span>
                            <?php endif; ?>
                        )
                    </td>
                    <td>
                        <a href="<?php echo url('admin/project/dynalist?proid='.$proid); ?>" target="_blank" class="layui-btn layui-btn-normal layui-btn-small">查看问题</a>
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
                    <td><?php echo $info['amount']; ?></td>
                    <td><?php echo $info['eamount']; ?></td>
                    <td><?php echo $timeData['capital1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['current1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['total1']; ?></td>
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
                    <td><?php echo $timeData['capital2']; ?></td>
                    <td>当年累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['current2']; ?></td>
                    <td>累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['total2']; ?></td>
                </tr>
                

                <tr  class="layui-table-hover">
                    <td>建设起止年限</td>
                    <td><?php echo $info['sdate']; ?>-<?php echo $info['edate']; ?></td>
                    <td>占地面积(亩)</td>
                    <td><?php echo $notes['floor_area']; ?></td>
                    <td>总建筑面积(平方米)</td>
                    <td><?php echo $notes['build_area']; ?></td>
                </tr>

                 
                
                <tr>
                    <td>主要建设内容</td>
                    <td colspan="2"><?php echo $notes['significance']; ?></td>
                    <td>使用资金情况</td>
                    <td colspan="2">

                        <?php if($capitalCnt > 0): if(is_array($capital) || $capital instanceof \think\Collection || $capital instanceof \think\Paginator): $pk = 0; $__LIST__ = $capital;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                                <?php echo $capitalType[$pt['ctype']]['title']; ?>：<?php echo $pt['amount']; ?>(万元)</br>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <span class="red">未使用其他资金</span>
                        <?php endif; ?>
                    </td>
                </tr>

                
                <tr class="layui-table-hover">
                    <td>效益效值</td>
                    <td colspan="2"><?php echo $notes['effect']; ?></td>
                    <td>项目联系人</td>
                    <td colspan="2">项目联系人
                        项目负责人:<?php echo $notes['lead_realname']; ?>(电话：<?php echo $notes['lead_mobile']; ?>)</br>
                        项目联络员:<?php echo $notes['liaison_realname']; ?>(电话：<?php echo $notes['liaison_mobile']; ?>)</br>
                        分包包单位负责人:<?php echo $notes['unit_realname']; ?>(电话：<?php echo $notes['unit_mobile']; ?>)</br>
                    </td>
                </tr>

                <tr>
                    <td>形象进度</td>
                    <td colspan="5">
                        <?php echo $timeData['progress']; ?>
                    </td>
                </tr>

                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $ek = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$et): $mod = ($ek % 2 );++$ek;if($examShow[$et['id']]['cnt'] > 0): ?>
                        <tr class="layui-table-hover">
                            <!-- <td rowspan="<?php echo $examShow[$ek]['cnt']+1; ?>"><?php echo $et['title']; ?></td> -->
                            <td><?php echo $et['title']; ?></td>
                            <?php if(is_array($examShow[$et['id']]['data']) || $examShow[$et['id']]['data'] instanceof \think\Collection || $examShow[$et['id']]['data'] instanceof \think\Paginator): $sk = 0; $__LIST__ = $examShow[$et['id']]['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$st): $mod = ($sk % 2 );++$sk;if($st['status'] == 1): ?>
                                    <td><span class="red">未提交</span></td>
                                    <td colspan="4">原因：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 2): ?>
                                    <td><span>进行中</span></td>
                                    <td colspan="4">办理进程：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 3): ?>
                                    <td><span class="green">已完成</span></td>
                                    <td colspan="2">许可证号：<?php echo $st['permit']; ?>
                                        <a href="javascript:void(0);" data-src='<?php echo $st['img']; ?>' class="layui-btn layui-btn-normal layui-btn-small liucheng">详细图片</a>
                                    </td>
                                    <td colspan="2">审批部门：
                                        <?php if($st['punit'] > 0): ?>
                                            <?php echo $examUnit[$st['punit']]['title']; endif; ?>

                                        (<?php echo $st['examtime']; ?>)
                                    </td>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        
                    <?php else: ?>
                        <tr  class="layui-table-hover " >
                            <td ><?php echo $et['title']; ?></td>
                            <td colspan="5"><span class="red">该项目尚未提交该类手续</span></td>
                        </tr>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</form>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
	var formData = <?php echo json_encode($timeData); ?>;
    var info = <?php echo json_encode($info); ?>;
    
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
<script src="/hisiphp/hisiphp/static/admin/js/footer.js"></script>
                </div>
            </div>
        </div>
    <?php break; case "2": ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $k = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($k == 1): ?>
                    <li class="layui-this">
                    <?php else: ?>
                    <li>
                    <?php endif; ?>
                    <a href="javascript:;"><?php echo $vo['title']; ?></a>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <form class="layui-form" action="<?php echo url('project/addmreport'); ?>" method="post" id="editForm">
<style>
.layui-table[lay-even] tr:nth-child(even){
    background-color:#fff;
}
.layui-table-hover {
    background-color:#f2f2f2!important;
}
</style>
<div>
	<input type="hidden" class="layui-input" id="skipurl" value="<?php echo $skipurl; ?>">

	<div class="layui-form-item">
        <label class="layui-form-label layui-form-project">月报时间：</label>
        <div class="layui-input-inline">
            <select name="cyear" lay-filter="cyear" id="cyear" class='field-cyear' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($timeData['years']) || $timeData['years'] instanceof \think\Collection || $timeData['years'] instanceof \think\Paginator): $pk = 0; $__LIST__ = $timeData['years'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pt; ?>"><?php echo $pt; ?>年</option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
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
                    <td><?php echo $unitData['nick']; ?></td>
                    <td>项目名称</td>
                    <td><?php echo $info['title']; ?></td>
                    <td>进度类别</td>
                    <td><?php echo $schedule[$info['schedule']]; ?></td>
                </tr>

                <tr  class="layui-table-hover">
<!--                     <td>项目级别</td>
                    <td><?php echo $productLevel[$info['level']]['title']; ?></td> -->
                    <td>是否为当年省市重点项目类别</td>
                    <td>
                        <?php if($info['isimportant'] == 1): ?>
                            <span class="red">否</span>
                        <?php else: if($info['isimportant'] > 0): ?>
                                <span class="green"><?php echo $_isImportant[$info['isimportant']]; ?></span>
                            <?php else: ?>
                                <span class="red">否</span>
                            <?php endif; endif; ?>
                    </td>
                    <td>是否为当年“双十工程”项目</td>
                    <td>
                        <?php if($info['isten'] == 1): if($info['tentype'] > 0): ?>
                                <span class="green"><?php echo $productTens[$info['tentype']]['title']; ?></span>
                            <?php else: ?>
                                <span class="green">是</span>
                            <?php endif; else: ?>
                            <span class="red">否</span>
                        <?php endif; ?>
                    </td>
                     <td>行业类别</td>
                    <td><?php echo $info['industry']; ?></td>
                </tr>
                <tr>
                    <td>项目业主</td>
                    <td><?php echo $cuserData['nick']; ?></td>
                    <td>实施地点</td>
                    <td><?php echo $info['address']; ?></td> 
                    <td>
                        问题汇总(
                            <?php if($dynacnt>0): ?>
                                <span class="red"><?php echo $dynacnt; ?></span>
                            <?php else: ?>
                                <span class="green">0</span>
                            <?php endif; ?>
                        )
                    </td>
                    <td>
                        <a href="<?php echo url('admin/project/dynalist?proid='.$proid); ?>" target="_blank" class="layui-btn layui-btn-normal layui-btn-small">查看问题</a>
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
                    <td><?php echo $info['amount']; ?></td>
                    <td><?php echo $info['eamount']; ?></td>
                    <td><?php echo $timeData['capital1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['current1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['total1']; ?></td>
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
                    <td><?php echo $timeData['capital2']; ?></td>
                    <td>当年累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['current2']; ?></td>
                    <td>累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['total2']; ?></td>
                </tr>
                

                <tr  class="layui-table-hover">
                    <td>建设起止年限</td>
                    <td><?php echo $info['sdate']; ?>-<?php echo $info['edate']; ?></td>
                    <td>占地面积(亩)</td>
                    <td><?php echo $notes['floor_area']; ?></td>
                    <td>总建筑面积(平方米)</td>
                    <td><?php echo $notes['build_area']; ?></td>
                </tr>

                 
                
                <tr>
                    <td>主要建设内容</td>
                    <td colspan="2"><?php echo $notes['significance']; ?></td>
                    <td>使用资金情况</td>
                    <td colspan="2">

                        <?php if($capitalCnt > 0): if(is_array($capital) || $capital instanceof \think\Collection || $capital instanceof \think\Paginator): $pk = 0; $__LIST__ = $capital;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                                <?php echo $capitalType[$pt['ctype']]['title']; ?>：<?php echo $pt['amount']; ?>(万元)</br>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <span class="red">未使用其他资金</span>
                        <?php endif; ?>
                    </td>
                </tr>

                
                <tr class="layui-table-hover">
                    <td>效益效值</td>
                    <td colspan="2"><?php echo $notes['effect']; ?></td>
                    <td>项目联系人</td>
                    <td colspan="2">项目联系人
                        项目负责人:<?php echo $notes['lead_realname']; ?>(电话：<?php echo $notes['lead_mobile']; ?>)</br>
                        项目联络员:<?php echo $notes['liaison_realname']; ?>(电话：<?php echo $notes['liaison_mobile']; ?>)</br>
                        分包包单位负责人:<?php echo $notes['unit_realname']; ?>(电话：<?php echo $notes['unit_mobile']; ?>)</br>
                    </td>
                </tr>

                <tr>
                    <td>形象进度</td>
                    <td colspan="5">
                        <?php echo $timeData['progress']; ?>
                    </td>
                </tr>

                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $ek = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$et): $mod = ($ek % 2 );++$ek;if($examShow[$et['id']]['cnt'] > 0): ?>
                        <tr class="layui-table-hover">
                            <!-- <td rowspan="<?php echo $examShow[$ek]['cnt']+1; ?>"><?php echo $et['title']; ?></td> -->
                            <td><?php echo $et['title']; ?></td>
                            <?php if(is_array($examShow[$et['id']]['data']) || $examShow[$et['id']]['data'] instanceof \think\Collection || $examShow[$et['id']]['data'] instanceof \think\Paginator): $sk = 0; $__LIST__ = $examShow[$et['id']]['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$st): $mod = ($sk % 2 );++$sk;if($st['status'] == 1): ?>
                                    <td><span class="red">未提交</span></td>
                                    <td colspan="4">原因：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 2): ?>
                                    <td><span>进行中</span></td>
                                    <td colspan="4">办理进程：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 3): ?>
                                    <td><span class="green">已完成</span></td>
                                    <td colspan="2">许可证号：<?php echo $st['permit']; ?>
                                        <a href="javascript:void(0);" data-src='<?php echo $st['img']; ?>' class="layui-btn layui-btn-normal layui-btn-small liucheng">详细图片</a>
                                    </td>
                                    <td colspan="2">审批部门：
                                        <?php if($st['punit'] > 0): ?>
                                            <?php echo $examUnit[$st['punit']]['title']; endif; ?>

                                        (<?php echo $st['examtime']; ?>)
                                    </td>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        
                    <?php else: ?>
                        <tr  class="layui-table-hover " >
                            <td ><?php echo $et['title']; ?></td>
                            <td colspan="5"><span class="red">该项目尚未提交该类手续</span></td>
                        </tr>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</form>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
	var formData = <?php echo json_encode($timeData); ?>;
    var info = <?php echo json_encode($info); ?>;
    
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
<script src="/hisiphp/hisiphp/static/admin/js/footer.js"></script>
            </div>
        </div>
    <?php break; case "3": ?>
    
        <form class="layui-form" action="<?php echo url('project/addmreport'); ?>" method="post" id="editForm">
<style>
.layui-table[lay-even] tr:nth-child(even){
    background-color:#fff;
}
.layui-table-hover {
    background-color:#f2f2f2!important;
}
</style>
<div>
	<input type="hidden" class="layui-input" id="skipurl" value="<?php echo $skipurl; ?>">

	<div class="layui-form-item">
        <label class="layui-form-label layui-form-project">月报时间：</label>
        <div class="layui-input-inline">
            <select name="cyear" lay-filter="cyear" id="cyear" class='field-cyear' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($timeData['years']) || $timeData['years'] instanceof \think\Collection || $timeData['years'] instanceof \think\Paginator): $pk = 0; $__LIST__ = $timeData['years'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pt; ?>"><?php echo $pt; ?>年</option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
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
                    <td><?php echo $unitData['nick']; ?></td>
                    <td>项目名称</td>
                    <td><?php echo $info['title']; ?></td>
                    <td>进度类别</td>
                    <td><?php echo $schedule[$info['schedule']]; ?></td>
                </tr>

                <tr  class="layui-table-hover">
<!--                     <td>项目级别</td>
                    <td><?php echo $productLevel[$info['level']]['title']; ?></td> -->
                    <td>是否为当年省市重点项目类别</td>
                    <td>
                        <?php if($info['isimportant'] == 1): ?>
                            <span class="red">否</span>
                        <?php else: if($info['isimportant'] > 0): ?>
                                <span class="green"><?php echo $_isImportant[$info['isimportant']]; ?></span>
                            <?php else: ?>
                                <span class="red">否</span>
                            <?php endif; endif; ?>
                    </td>
                    <td>是否为当年“双十工程”项目</td>
                    <td>
                        <?php if($info['isten'] == 1): if($info['tentype'] > 0): ?>
                                <span class="green"><?php echo $productTens[$info['tentype']]['title']; ?></span>
                            <?php else: ?>
                                <span class="green">是</span>
                            <?php endif; else: ?>
                            <span class="red">否</span>
                        <?php endif; ?>
                    </td>
                     <td>行业类别</td>
                    <td><?php echo $info['industry']; ?></td>
                </tr>
                <tr>
                    <td>项目业主</td>
                    <td><?php echo $cuserData['nick']; ?></td>
                    <td>实施地点</td>
                    <td><?php echo $info['address']; ?></td> 
                    <td>
                        问题汇总(
                            <?php if($dynacnt>0): ?>
                                <span class="red"><?php echo $dynacnt; ?></span>
                            <?php else: ?>
                                <span class="green">0</span>
                            <?php endif; ?>
                        )
                    </td>
                    <td>
                        <a href="<?php echo url('admin/project/dynalist?proid='.$proid); ?>" target="_blank" class="layui-btn layui-btn-normal layui-btn-small">查看问题</a>
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
                    <td><?php echo $info['amount']; ?></td>
                    <td><?php echo $info['eamount']; ?></td>
                    <td><?php echo $timeData['capital1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['current1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['total1']; ?></td>
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
                    <td><?php echo $timeData['capital2']; ?></td>
                    <td>当年累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['current2']; ?></td>
                    <td>累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['total2']; ?></td>
                </tr>
                

                <tr  class="layui-table-hover">
                    <td>建设起止年限</td>
                    <td><?php echo $info['sdate']; ?>-<?php echo $info['edate']; ?></td>
                    <td>占地面积(亩)</td>
                    <td><?php echo $notes['floor_area']; ?></td>
                    <td>总建筑面积(平方米)</td>
                    <td><?php echo $notes['build_area']; ?></td>
                </tr>

                 
                
                <tr>
                    <td>主要建设内容</td>
                    <td colspan="2"><?php echo $notes['significance']; ?></td>
                    <td>使用资金情况</td>
                    <td colspan="2">

                        <?php if($capitalCnt > 0): if(is_array($capital) || $capital instanceof \think\Collection || $capital instanceof \think\Paginator): $pk = 0; $__LIST__ = $capital;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                                <?php echo $capitalType[$pt['ctype']]['title']; ?>：<?php echo $pt['amount']; ?>(万元)</br>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <span class="red">未使用其他资金</span>
                        <?php endif; ?>
                    </td>
                </tr>

                
                <tr class="layui-table-hover">
                    <td>效益效值</td>
                    <td colspan="2"><?php echo $notes['effect']; ?></td>
                    <td>项目联系人</td>
                    <td colspan="2">项目联系人
                        项目负责人:<?php echo $notes['lead_realname']; ?>(电话：<?php echo $notes['lead_mobile']; ?>)</br>
                        项目联络员:<?php echo $notes['liaison_realname']; ?>(电话：<?php echo $notes['liaison_mobile']; ?>)</br>
                        分包包单位负责人:<?php echo $notes['unit_realname']; ?>(电话：<?php echo $notes['unit_mobile']; ?>)</br>
                    </td>
                </tr>

                <tr>
                    <td>形象进度</td>
                    <td colspan="5">
                        <?php echo $timeData['progress']; ?>
                    </td>
                </tr>

                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $ek = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$et): $mod = ($ek % 2 );++$ek;if($examShow[$et['id']]['cnt'] > 0): ?>
                        <tr class="layui-table-hover">
                            <!-- <td rowspan="<?php echo $examShow[$ek]['cnt']+1; ?>"><?php echo $et['title']; ?></td> -->
                            <td><?php echo $et['title']; ?></td>
                            <?php if(is_array($examShow[$et['id']]['data']) || $examShow[$et['id']]['data'] instanceof \think\Collection || $examShow[$et['id']]['data'] instanceof \think\Paginator): $sk = 0; $__LIST__ = $examShow[$et['id']]['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$st): $mod = ($sk % 2 );++$sk;if($st['status'] == 1): ?>
                                    <td><span class="red">未提交</span></td>
                                    <td colspan="4">原因：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 2): ?>
                                    <td><span>进行中</span></td>
                                    <td colspan="4">办理进程：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 3): ?>
                                    <td><span class="green">已完成</span></td>
                                    <td colspan="2">许可证号：<?php echo $st['permit']; ?>
                                        <a href="javascript:void(0);" data-src='<?php echo $st['img']; ?>' class="layui-btn layui-btn-normal layui-btn-small liucheng">详细图片</a>
                                    </td>
                                    <td colspan="2">审批部门：
                                        <?php if($st['punit'] > 0): ?>
                                            <?php echo $examUnit[$st['punit']]['title']; endif; ?>

                                        (<?php echo $st['examtime']; ?>)
                                    </td>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        
                    <?php else: ?>
                        <tr  class="layui-table-hover " >
                            <td ><?php echo $et['title']; ?></td>
                            <td colspan="5"><span class="red">该项目尚未提交该类手续</span></td>
                        </tr>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</form>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
	var formData = <?php echo json_encode($timeData); ?>;
    var info = <?php echo json_encode($info); ?>;
    
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
<script src="/hisiphp/hisiphp/static/admin/js/footer.js"></script>
    <?php break; default: ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
               <!--  <li class="layui-this">
                    <a href="javascript:;" id="curTitle"><?php echo $_admin_menu_current['title']; ?></a>
                </li> -->
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <div class="layui-tab-item layui-show">
                    <form class="layui-form" action="<?php echo url('project/addmreport'); ?>" method="post" id="editForm">
<style>
.layui-table[lay-even] tr:nth-child(even){
    background-color:#fff;
}
.layui-table-hover {
    background-color:#f2f2f2!important;
}
</style>
<div>
	<input type="hidden" class="layui-input" id="skipurl" value="<?php echo $skipurl; ?>">

	<div class="layui-form-item">
        <label class="layui-form-label layui-form-project">月报时间：</label>
        <div class="layui-input-inline">
            <select name="cyear" lay-filter="cyear" id="cyear" class='field-cyear' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($timeData['years']) || $timeData['years'] instanceof \think\Collection || $timeData['years'] instanceof \think\Paginator): $pk = 0; $__LIST__ = $timeData['years'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pt; ?>"><?php echo $pt; ?>年</option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
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
                    <td><?php echo $unitData['nick']; ?></td>
                    <td>项目名称</td>
                    <td><?php echo $info['title']; ?></td>
                    <td>进度类别</td>
                    <td><?php echo $schedule[$info['schedule']]; ?></td>
                </tr>

                <tr  class="layui-table-hover">
<!--                     <td>项目级别</td>
                    <td><?php echo $productLevel[$info['level']]['title']; ?></td> -->
                    <td>是否为当年省市重点项目类别</td>
                    <td>
                        <?php if($info['isimportant'] == 1): ?>
                            <span class="red">否</span>
                        <?php else: if($info['isimportant'] > 0): ?>
                                <span class="green"><?php echo $_isImportant[$info['isimportant']]; ?></span>
                            <?php else: ?>
                                <span class="red">否</span>
                            <?php endif; endif; ?>
                    </td>
                    <td>是否为当年“双十工程”项目</td>
                    <td>
                        <?php if($info['isten'] == 1): if($info['tentype'] > 0): ?>
                                <span class="green"><?php echo $productTens[$info['tentype']]['title']; ?></span>
                            <?php else: ?>
                                <span class="green">是</span>
                            <?php endif; else: ?>
                            <span class="red">否</span>
                        <?php endif; ?>
                    </td>
                     <td>行业类别</td>
                    <td><?php echo $info['industry']; ?></td>
                </tr>
                <tr>
                    <td>项目业主</td>
                    <td><?php echo $cuserData['nick']; ?></td>
                    <td>实施地点</td>
                    <td><?php echo $info['address']; ?></td> 
                    <td>
                        问题汇总(
                            <?php if($dynacnt>0): ?>
                                <span class="red"><?php echo $dynacnt; ?></span>
                            <?php else: ?>
                                <span class="green">0</span>
                            <?php endif; ?>
                        )
                    </td>
                    <td>
                        <a href="<?php echo url('admin/project/dynalist?proid='.$proid); ?>" target="_blank" class="layui-btn layui-btn-normal layui-btn-small">查看问题</a>
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
                    <td><?php echo $info['amount']; ?></td>
                    <td><?php echo $info['eamount']; ?></td>
                    <td><?php echo $timeData['capital1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['current1']; ?></td>
                    <td><?php echo $timeData['capital1'] + $timeData['total1']; ?></td>
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
                    <td><?php echo $timeData['capital2']; ?></td>
                    <td>当年累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['current2']; ?></td>
                    <td>累计固定资产入库资金</td>
                    <td><?php echo $timeData['capital2'] + $timeData['total2']; ?></td>
                </tr>
                

                <tr  class="layui-table-hover">
                    <td>建设起止年限</td>
                    <td><?php echo $info['sdate']; ?>-<?php echo $info['edate']; ?></td>
                    <td>占地面积(亩)</td>
                    <td><?php echo $notes['floor_area']; ?></td>
                    <td>总建筑面积(平方米)</td>
                    <td><?php echo $notes['build_area']; ?></td>
                </tr>

                 
                
                <tr>
                    <td>主要建设内容</td>
                    <td colspan="2"><?php echo $notes['significance']; ?></td>
                    <td>使用资金情况</td>
                    <td colspan="2">

                        <?php if($capitalCnt > 0): if(is_array($capital) || $capital instanceof \think\Collection || $capital instanceof \think\Paginator): $pk = 0; $__LIST__ = $capital;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                                <?php echo $capitalType[$pt['ctype']]['title']; ?>：<?php echo $pt['amount']; ?>(万元)</br>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <span class="red">未使用其他资金</span>
                        <?php endif; ?>
                    </td>
                </tr>

                
                <tr class="layui-table-hover">
                    <td>效益效值</td>
                    <td colspan="2"><?php echo $notes['effect']; ?></td>
                    <td>项目联系人</td>
                    <td colspan="2">项目联系人
                        项目负责人:<?php echo $notes['lead_realname']; ?>(电话：<?php echo $notes['lead_mobile']; ?>)</br>
                        项目联络员:<?php echo $notes['liaison_realname']; ?>(电话：<?php echo $notes['liaison_mobile']; ?>)</br>
                        分包包单位负责人:<?php echo $notes['unit_realname']; ?>(电话：<?php echo $notes['unit_mobile']; ?>)</br>
                    </td>
                </tr>

                <tr>
                    <td>形象进度</td>
                    <td colspan="5">
                        <?php echo $timeData['progress']; ?>
                    </td>
                </tr>

                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $ek = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$et): $mod = ($ek % 2 );++$ek;if($examShow[$et['id']]['cnt'] > 0): ?>
                        <tr class="layui-table-hover">
                            <!-- <td rowspan="<?php echo $examShow[$ek]['cnt']+1; ?>"><?php echo $et['title']; ?></td> -->
                            <td><?php echo $et['title']; ?></td>
                            <?php if(is_array($examShow[$et['id']]['data']) || $examShow[$et['id']]['data'] instanceof \think\Collection || $examShow[$et['id']]['data'] instanceof \think\Paginator): $sk = 0; $__LIST__ = $examShow[$et['id']]['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$st): $mod = ($sk % 2 );++$sk;if($st['status'] == 1): ?>
                                    <td><span class="red">未提交</span></td>
                                    <td colspan="4">原因：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 2): ?>
                                    <td><span>进行中</span></td>
                                    <td colspan="4">办理进程：<?php echo $st['notes']; ?></td>
                                <?php elseif($st['status'] == 3): ?>
                                    <td><span class="green">已完成</span></td>
                                    <td colspan="2">许可证号：<?php echo $st['permit']; ?>
                                        <a href="javascript:void(0);" data-src='<?php echo $st['img']; ?>' class="layui-btn layui-btn-normal layui-btn-small liucheng">详细图片</a>
                                    </td>
                                    <td colspan="2">审批部门：
                                        <?php if($st['punit'] > 0): ?>
                                            <?php echo $examUnit[$st['punit']]['title']; endif; ?>

                                        (<?php echo $st['examtime']; ?>)
                                    </td>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        
                    <?php else: ?>
                        <tr  class="layui-table-hover " >
                            <td ><?php echo $et['title']; ?></td>
                            <td colspan="5"><span class="red">该项目尚未提交该类手续</span></td>
                        </tr>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</form>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
	var formData = <?php echo json_encode($timeData); ?>;
    var info = <?php echo json_encode($info); ?>;
    
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
<script src="/hisiphp/hisiphp/static/admin/js/footer.js"></script>
                </div>
            </div>
        </div>
<?php endswitch; if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
</body>
</html>
<?php else: ?>
        </div>
    </div>
    <div class="layui-footer footer">
        
        <span class="fr"> © 2017-2018 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank">经开区项目管理</a> All Rights Reserved.</span>
    </div>
</div>
</body>
</html>
<?php endif; ?>