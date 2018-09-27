<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:77:"D:\1.DevlopTool\1.Xampp7\htdocs\hisiphp\hisiphp/app/admin\view\menu\index.php";i:1531729141;s:73:"D:\1.DevlopTool\1.Xampp7\htdocs\hisiphp\hisiphp\app\admin\view\layout.php";i:1531729143;s:79:"D:\1.DevlopTool\1.Xampp7\htdocs\hisiphp\hisiphp\app\admin\view\block\header.php";i:1537877126;s:78:"D:\1.DevlopTool\1.Xampp7\htdocs\hisiphp\hisiphp\app\admin\view\block\layui.php";i:1531729143;s:79:"D:\1.DevlopTool\1.Xampp7\htdocs\hisiphp\hisiphp\app\admin\view\block\footer.php";i:1531729143;}*/ ?>
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
                        <li <?php if($type == 11): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/problemlist?type=1'); ?>>未完成问题</a></li>
                        <li <?php if($type == 12): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/problemlist?type=2'); ?>>已完成问题</a></li>
                        <li <?php if($type == 13): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/project/problemlist?type=3'); ?>>本月新增问题</a></li>
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
                    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
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
                <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
            </div>
        </div>
    <?php break; case "3": if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
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
                    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
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