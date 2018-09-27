<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:66:"D:\phpStudy\WWW\hisiphp\hisiphp/app/admin\view\project\dynamic.php";i:1537087644;s:57:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\layout.php";i:1531729143;s:63:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\header.php";i:1537368268;s:62:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\layui.php";i:1531729143;s:63:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\footer.php";i:1531729143;}*/ ?>
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
                        <li class="layui-side-item">
                            <a target="_blank"  href=<?php echo url('admin/project/mreport?proid='.$proid); ?>>本月月报</a>
                        </li>

                        <li class="layui-side-item">
                            <li class="layui-side-item">
                                <a  <?php if($_admin_menu_current['id'] == 228 or $_admin_menu_current['id'] == 235 or $_admin_menu_current['id'] == 236 or $_admin_menu_current['id'] == 218): ?> class="hover"<?php endif; ?> href="javascript:void(0)">修改月报</a>
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
                    <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题类别：</label>
        <div class="layui-input-inline">
            <select name="qtype" lay-filter="qtype"  class='field-qtype' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($dynamicType) || $dynamicType instanceof \think\Collection || $dynamicType instanceof \think\Paginator): $pk = 0; $__LIST__ = $dynamicType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pk; ?>"><?php echo $pt; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="exam_type">
        <label class="layui-form-label layui-form-project">审批类别：</label>
        <div class="layui-input-inline">
            <select name="etype" type="select" class='field-etype'>
                <option value="">请选择...</option>
                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $pk = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="xianchang_type">
        <label class="layui-form-label layui-form-project">现场类别：</label>
        <div class="layui-input-inline">
            <select name="xtype" type="select" class='field-xtype'>
                <option value="">请选择...</option>
                <?php if(is_array($xianchang) || $xianchang instanceof \think\Collection || $xianchang instanceof \think\Paginator): $pk = 0; $__LIST__ = $xianchang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">涉及部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($examUnit) || $examUnit instanceof \think\Collection || $examUnit instanceof \think\Paginator): $pk = 0; $__LIST__ = $examUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                <input type="checkbox" value="<?php echo $pt['recid']; ?>" 
                    class="layui-input field-capital capital-checkbox" 
                    <?php if($pt['checked'] == 1): ?>checked<?php endif; ?>
                     name="qespunit[]"><?php echo $pt['title']; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题描述：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="3"  class="layui-textarea field-notes" name="notes" autocomplete="off" lay-verify="required" placeholder="备注"></textarea>
        </div>
    </div>  

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">期望解决时间：</label>
        <div class="">
            <input type="text" class="layui-input field-expire_time examtime field-exceptdate" name="exceptdate" 
            autocomplete="off" placeholder="期望解决时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})"  lay-verify="required" readonly>
        </div>
    </div>

    <?php if($showstatus == 1): ?>
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">状态</label>
            <div class="layui-input-inline w300">
                <input type="radio" class="" name="status" <?php if($status == 0): ?> checked <?php endif; ?> value="0" title="已处理" >
                <input type="radio" class="" name="status" <?php if($status == 1): ?> checked <?php endif; ?> value="1" title="未处理" >
            </div>
        </div>
    <?php endif; ?>  

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $proid; ?>">
            <input type="hidden" name="recid" value="<?php echo $recid; ?>">
            <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" lay-filter="formSubmit">提交问题</button>
            <a href="<?php echo url('project/dynalist?proid='.$proid); ?>"  style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
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
var formData = <?php echo json_encode($dynamic); ?>;
layui.use(['jquery', 'form', 'upload', 'laydate'], function() {
    var $ = layui.jquery,laydate = layui.laydate, form = layui.form, layer = layui.layer, upload = layui.upload;
    
    laydate.render({
        elem: '.examtime',
        format:'yyyy.M.d'
    });

    if ( formData.qtype == 1 ) {
        $("#xianchang_type").removeClass("hide");
    }
    if ( formData.qtype == 2 ) {
        $("#exam_type").removeClass("hide");
    }

    form.on('select(qtype)', function(data){
       $("#exam_type").addClass("hide");
       $("#xianchang_type").addClass("hide");
       console.log(data.value)
       if (data.value == 1) {
            $("#xianchang_type").removeClass("hide");
       } 
       if (data.value == 2) {
       		$("#exam_type").removeClass("hide");
       } 
    }); 
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
                <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题类别：</label>
        <div class="layui-input-inline">
            <select name="qtype" lay-filter="qtype"  class='field-qtype' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($dynamicType) || $dynamicType instanceof \think\Collection || $dynamicType instanceof \think\Paginator): $pk = 0; $__LIST__ = $dynamicType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pk; ?>"><?php echo $pt; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="exam_type">
        <label class="layui-form-label layui-form-project">审批类别：</label>
        <div class="layui-input-inline">
            <select name="etype" type="select" class='field-etype'>
                <option value="">请选择...</option>
                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $pk = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="xianchang_type">
        <label class="layui-form-label layui-form-project">现场类别：</label>
        <div class="layui-input-inline">
            <select name="xtype" type="select" class='field-xtype'>
                <option value="">请选择...</option>
                <?php if(is_array($xianchang) || $xianchang instanceof \think\Collection || $xianchang instanceof \think\Paginator): $pk = 0; $__LIST__ = $xianchang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">涉及部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($examUnit) || $examUnit instanceof \think\Collection || $examUnit instanceof \think\Paginator): $pk = 0; $__LIST__ = $examUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                <input type="checkbox" value="<?php echo $pt['recid']; ?>" 
                    class="layui-input field-capital capital-checkbox" 
                    <?php if($pt['checked'] == 1): ?>checked<?php endif; ?>
                     name="qespunit[]"><?php echo $pt['title']; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题描述：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="3"  class="layui-textarea field-notes" name="notes" autocomplete="off" lay-verify="required" placeholder="备注"></textarea>
        </div>
    </div>  

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">期望解决时间：</label>
        <div class="">
            <input type="text" class="layui-input field-expire_time examtime field-exceptdate" name="exceptdate" 
            autocomplete="off" placeholder="期望解决时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})"  lay-verify="required" readonly>
        </div>
    </div>

    <?php if($showstatus == 1): ?>
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">状态</label>
            <div class="layui-input-inline w300">
                <input type="radio" class="" name="status" <?php if($status == 0): ?> checked <?php endif; ?> value="0" title="已处理" >
                <input type="radio" class="" name="status" <?php if($status == 1): ?> checked <?php endif; ?> value="1" title="未处理" >
            </div>
        </div>
    <?php endif; ?>  

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $proid; ?>">
            <input type="hidden" name="recid" value="<?php echo $recid; ?>">
            <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" lay-filter="formSubmit">提交问题</button>
            <a href="<?php echo url('project/dynalist?proid='.$proid); ?>"  style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
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
var formData = <?php echo json_encode($dynamic); ?>;
layui.use(['jquery', 'form', 'upload', 'laydate'], function() {
    var $ = layui.jquery,laydate = layui.laydate, form = layui.form, layer = layui.layer, upload = layui.upload;
    
    laydate.render({
        elem: '.examtime',
        format:'yyyy.M.d'
    });

    if ( formData.qtype == 1 ) {
        $("#xianchang_type").removeClass("hide");
    }
    if ( formData.qtype == 2 ) {
        $("#exam_type").removeClass("hide");
    }

    form.on('select(qtype)', function(data){
       $("#exam_type").addClass("hide");
       $("#xianchang_type").addClass("hide");
       console.log(data.value)
       if (data.value == 1) {
            $("#xianchang_type").removeClass("hide");
       } 
       if (data.value == 2) {
       		$("#exam_type").removeClass("hide");
       } 
    }); 
});
</script>
<script src="/hisiphp/hisiphp/static/admin/js/footer.js"></script>
            </div>
        </div>
    <?php break; case "3": ?>
    
        <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题类别：</label>
        <div class="layui-input-inline">
            <select name="qtype" lay-filter="qtype"  class='field-qtype' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($dynamicType) || $dynamicType instanceof \think\Collection || $dynamicType instanceof \think\Paginator): $pk = 0; $__LIST__ = $dynamicType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pk; ?>"><?php echo $pt; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="exam_type">
        <label class="layui-form-label layui-form-project">审批类别：</label>
        <div class="layui-input-inline">
            <select name="etype" type="select" class='field-etype'>
                <option value="">请选择...</option>
                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $pk = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="xianchang_type">
        <label class="layui-form-label layui-form-project">现场类别：</label>
        <div class="layui-input-inline">
            <select name="xtype" type="select" class='field-xtype'>
                <option value="">请选择...</option>
                <?php if(is_array($xianchang) || $xianchang instanceof \think\Collection || $xianchang instanceof \think\Paginator): $pk = 0; $__LIST__ = $xianchang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">涉及部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($examUnit) || $examUnit instanceof \think\Collection || $examUnit instanceof \think\Paginator): $pk = 0; $__LIST__ = $examUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                <input type="checkbox" value="<?php echo $pt['recid']; ?>" 
                    class="layui-input field-capital capital-checkbox" 
                    <?php if($pt['checked'] == 1): ?>checked<?php endif; ?>
                     name="qespunit[]"><?php echo $pt['title']; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题描述：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="3"  class="layui-textarea field-notes" name="notes" autocomplete="off" lay-verify="required" placeholder="备注"></textarea>
        </div>
    </div>  

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">期望解决时间：</label>
        <div class="">
            <input type="text" class="layui-input field-expire_time examtime field-exceptdate" name="exceptdate" 
            autocomplete="off" placeholder="期望解决时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})"  lay-verify="required" readonly>
        </div>
    </div>

    <?php if($showstatus == 1): ?>
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">状态</label>
            <div class="layui-input-inline w300">
                <input type="radio" class="" name="status" <?php if($status == 0): ?> checked <?php endif; ?> value="0" title="已处理" >
                <input type="radio" class="" name="status" <?php if($status == 1): ?> checked <?php endif; ?> value="1" title="未处理" >
            </div>
        </div>
    <?php endif; ?>  

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $proid; ?>">
            <input type="hidden" name="recid" value="<?php echo $recid; ?>">
            <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" lay-filter="formSubmit">提交问题</button>
            <a href="<?php echo url('project/dynalist?proid='.$proid); ?>"  style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
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
var formData = <?php echo json_encode($dynamic); ?>;
layui.use(['jquery', 'form', 'upload', 'laydate'], function() {
    var $ = layui.jquery,laydate = layui.laydate, form = layui.form, layer = layui.layer, upload = layui.upload;
    
    laydate.render({
        elem: '.examtime',
        format:'yyyy.M.d'
    });

    if ( formData.qtype == 1 ) {
        $("#xianchang_type").removeClass("hide");
    }
    if ( formData.qtype == 2 ) {
        $("#exam_type").removeClass("hide");
    }

    form.on('select(qtype)', function(data){
       $("#exam_type").addClass("hide");
       $("#xianchang_type").addClass("hide");
       console.log(data.value)
       if (data.value == 1) {
            $("#xianchang_type").removeClass("hide");
       } 
       if (data.value == 2) {
       		$("#exam_type").removeClass("hide");
       } 
    }); 
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
                    <form class="layui-form" action="<?php echo url(); ?>" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题类别：</label>
        <div class="layui-input-inline">
            <select name="qtype" lay-filter="qtype"  class='field-qtype' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($dynamicType) || $dynamicType instanceof \think\Collection || $dynamicType instanceof \think\Paginator): $pk = 0; $__LIST__ = $dynamicType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                    <option value="<?php echo $pk; ?>"><?php echo $pt; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="exam_type">
        <label class="layui-form-label layui-form-project">审批类别：</label>
        <div class="layui-input-inline">
            <select name="etype" type="select" class='field-etype'>
                <option value="">请选择...</option>
                <?php if(is_array($examName) || $examName instanceof \think\Collection || $examName instanceof \think\Paginator): $pk = 0; $__LIST__ = $examName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item hide" id="xianchang_type">
        <label class="layui-form-label layui-form-project">现场类别：</label>
        <div class="layui-input-inline">
            <select name="xtype" type="select" class='field-xtype'>
                <option value="">请选择...</option>
                <?php if(is_array($xianchang) || $xianchang instanceof \think\Collection || $xianchang instanceof \think\Paginator): $pk = 0; $__LIST__ = $xianchang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">涉及部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($examUnit) || $examUnit instanceof \think\Collection || $examUnit instanceof \think\Paginator): $pk = 0; $__LIST__ = $examUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;?>
                <input type="checkbox" value="<?php echo $pt['recid']; ?>" 
                    class="layui-input field-capital capital-checkbox" 
                    <?php if($pt['checked'] == 1): ?>checked<?php endif; ?>
                     name="qespunit[]"><?php echo $pt['title']; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">问题描述：</label>
        <div class="layui-input-inline layui-textarea-inline">
            <textarea rows="3"  class="layui-textarea field-notes" name="notes" autocomplete="off" lay-verify="required" placeholder="备注"></textarea>
        </div>
    </div>  

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">期望解决时间：</label>
        <div class="">
            <input type="text" class="layui-input field-expire_time examtime field-exceptdate" name="exceptdate" 
            autocomplete="off" placeholder="期望解决时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})"  lay-verify="required" readonly>
        </div>
    </div>

    <?php if($showstatus == 1): ?>
        <div class="layui-form-item">
            <label class="layui-form-label layui-form-project">状态</label>
            <div class="layui-input-inline w300">
                <input type="radio" class="" name="status" <?php if($status == 0): ?> checked <?php endif; ?> value="0" title="已处理" >
                <input type="radio" class="" name="status" <?php if($status == 1): ?> checked <?php endif; ?> value="1" title="未处理" >
            </div>
        </div>
    <?php endif; ?>  

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $proid; ?>">
            <input type="hidden" name="recid" value="<?php echo $recid; ?>">
            <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" lay-filter="formSubmit">提交问题</button>
            <a href="<?php echo url('project/dynalist?proid='.$proid); ?>"  style="width:30%;" class="layui-btn layui-btn-primary layui-btn-fluid ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
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
var formData = <?php echo json_encode($dynamic); ?>;
layui.use(['jquery', 'form', 'upload', 'laydate'], function() {
    var $ = layui.jquery,laydate = layui.laydate, form = layui.form, layer = layui.layer, upload = layui.upload;
    
    laydate.render({
        elem: '.examtime',
        format:'yyyy.M.d'
    });

    if ( formData.qtype == 1 ) {
        $("#xianchang_type").removeClass("hide");
    }
    if ( formData.qtype == 2 ) {
        $("#exam_type").removeClass("hide");
    }

    form.on('select(qtype)', function(data){
       $("#exam_type").addClass("hide");
       $("#xianchang_type").addClass("hide");
       console.log(data.value)
       if (data.value == 1) {
            $("#xianchang_type").removeClass("hide");
       } 
       if (data.value == 2) {
       		$("#exam_type").removeClass("hide");
       } 
    }); 
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