<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:87:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp/app/admin\view\project\examine.php";i:1537368676;s:78:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\layout.php";i:1531729143;s:84:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\block\header.php";i:1537368268;s:83:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\block\layui.php";i:1531729143;s:84:"D:\1.Develop_Tool\7.xampp7.29\htdocs\hisiphp\hisiphp\app\admin\view\block\footer.php";i:1531729143;}*/ ?>
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
                    <div class="layui-form page-form-width">

    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <?php if($type == 2): ?>
            <a href="<?php echo url('admin/project/important'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加省市重点项目</a>
            <?php endif; if($type == 3): ?>
            <a href="<?php echo url('admin/project/tenexam'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加“双十项目”工程</a>
            <?php endif; ?>
        </div>
    </div>

    <?php if($type == 3): ?>
    <div class="layui-form hide page-form-width" id="selectBox">
            <div   style="float:left; width:450px;">
                <label class="layui-form-label">重大产业项目</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 1): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div  style="float:left; width:450px;" >
                <label class="layui-form-label">十类重点工程</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 2): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <input type="hidden" id="proid">
            <div class="layui-form-item">
                <label class="layui-form-label"> </label>
                <div class="layui-input-block">
                        <a href="javascript:void(0)" class="layui-btn layui-btn-fluid ml10" style="width:30%;" id="dealten">
                        列入“双十项目”工程
                        </a>

                        <a href="javascript:void(0)" class="layui-btn layui-btn-primary ml10" style="width:30%;" id="cancelten">
                        取消操作
                        </a>
                 
                </div>
            </div>
    </div>
    <?php endif; ?>
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                <th>企业提交信息</th>
                <th>主管部门</th>
                <th>职能部门</th>
                <th>主管部门</th>
                <?php if($type == 2 or $type == 12): ?><th>列入省市重点项目</th><?php endif; if($type == 3 or $type == 13): ?><th>列入“双十项目”工程</th><?php endif; ?>
                <th>查看项目</th>
                <th>联系方式</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $v['title']; ?></td>
                <th><?php if($v['step'] >= 40): ?><span class="green">已提交</span><?php else: ?><span class="red">待提交</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 50): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 60): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <td><?php if($v['dunit'] > 0): ?><?php echo $examUnit[$v['dunit']]['title']; endif; ?></td>
                <?php if($type == 2): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shengshi" data-proid=<?php echo $v['recid']; ?>>通过</a>
                        <?php if($v['isimportant'] == 2): ?>(省重点项目)<?php endif; if($v['isimportant'] == 3): ?>(市重点项目)<?php endif; if($v['isimportant'] == 4): ?>(省、市重点项目)<?php endif; ?>

                    </td>
                <?php endif; if($type == 12): ?>
                    <td>
                        <?php if($v['isimportant'] == 2): ?>省重点项目<?php endif; if($v['isimportant'] == 3): ?>市重点项目<?php endif; if($v['isimportant'] == 4): ?>省、市重点项目<?php endif; ?>
                    </td>
                <?php endif; if($type == 3): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shuangshi" data-proid=<?php echo $v['recid']; ?>>列入“双十项目”工程</a></td>
                <?php endif; if($type == 13): ?>
                    <td>
                        <?php if($v['istenselect'] == 1): ?>重大产业项目<?php endif; if($v['istenselect'] == 2): ?>十类重点工程<?php endif; if($v['tentype'] > 0): ?> (<?php echo $tenarr[$v['tentype']]['title']; ?>) <?php endif; ?>
                    </td>
                <?php endif; ?>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <?php if($v['step'] == 50): ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">待审核</a>
                            <?php else: ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">查看详情</a>
                            <?php endif; ?>   

                        </div>
                    </div>
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="<?php echo url('admin/project/prostaff?proid='.$v['recid']); ?>?type=examitem" target="_blank" class="layui-btn layui-btn-primary">
                                联系人
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
layui.use(['jquery','form'], function() {
    var $ = layui.jquery, form = layui.form;
    $(".into_shengshi").on("click",function(){
        var _this = $(this);
        var proid = _this.data("proid");
        var r = Math.random();
        $.ajax({
            type: "POST",
            url: '<?php echo url("project/shengshi"); ?>',
            data: {proid:proid,r:r},
            success: function(res) {
                _this.parent().html(res.msg);
            },
            dataType:'json'
        });
    });

    $(".into_shuangshi").on("click",function(){
        var _this = $(this);
        _this.addClass("waitdeal");
        $("#selectBox").removeClass("hide");
        $("#proid").val(_this.data("proid"));
    });

    $("#cancelten").on("click",function(){
        $("#selectBox").addClass("hide");
        $(".into_shuangshi").removeClass("waitdeal");
    });

    $("#dealten").on("click",function(){
        var proid = $("#proid").val();
        var tentype = $(".tentype:checked").val()
        var r = Math.random();
        if ( Boolean( parseInt(tentype) ) ) {
            $.ajax({
                type: "POST",
                url: '<?php echo url("project/dealten"); ?>',
                data: {proid:proid,tentype:tentype,r:r},
                success: function(res) {
                    $(".waitdeal").parent().html(res.msg);
                    $("#selectBox").addClass("hide");
                    $(".into_shuangshi").removeClass("waitdeal");
                },
                dataType:'json'
            }); 
        } else {
            layer.msg("请选择双十项目类别");
        }
    });
});
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
                <div class="layui-form page-form-width">

    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <?php if($type == 2): ?>
            <a href="<?php echo url('admin/project/important'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加省市重点项目</a>
            <?php endif; if($type == 3): ?>
            <a href="<?php echo url('admin/project/tenexam'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加“双十项目”工程</a>
            <?php endif; ?>
        </div>
    </div>

    <?php if($type == 3): ?>
    <div class="layui-form hide page-form-width" id="selectBox">
            <div   style="float:left; width:450px;">
                <label class="layui-form-label">重大产业项目</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 1): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div  style="float:left; width:450px;" >
                <label class="layui-form-label">十类重点工程</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 2): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <input type="hidden" id="proid">
            <div class="layui-form-item">
                <label class="layui-form-label"> </label>
                <div class="layui-input-block">
                        <a href="javascript:void(0)" class="layui-btn layui-btn-fluid ml10" style="width:30%;" id="dealten">
                        列入“双十项目”工程
                        </a>

                        <a href="javascript:void(0)" class="layui-btn layui-btn-primary ml10" style="width:30%;" id="cancelten">
                        取消操作
                        </a>
                 
                </div>
            </div>
    </div>
    <?php endif; ?>
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                <th>企业提交信息</th>
                <th>主管部门</th>
                <th>职能部门</th>
                <th>主管部门</th>
                <?php if($type == 2 or $type == 12): ?><th>列入省市重点项目</th><?php endif; if($type == 3 or $type == 13): ?><th>列入“双十项目”工程</th><?php endif; ?>
                <th>查看项目</th>
                <th>联系方式</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $v['title']; ?></td>
                <th><?php if($v['step'] >= 40): ?><span class="green">已提交</span><?php else: ?><span class="red">待提交</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 50): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 60): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <td><?php if($v['dunit'] > 0): ?><?php echo $examUnit[$v['dunit']]['title']; endif; ?></td>
                <?php if($type == 2): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shengshi" data-proid=<?php echo $v['recid']; ?>>通过</a>
                        <?php if($v['isimportant'] == 2): ?>(省重点项目)<?php endif; if($v['isimportant'] == 3): ?>(市重点项目)<?php endif; if($v['isimportant'] == 4): ?>(省、市重点项目)<?php endif; ?>

                    </td>
                <?php endif; if($type == 12): ?>
                    <td>
                        <?php if($v['isimportant'] == 2): ?>省重点项目<?php endif; if($v['isimportant'] == 3): ?>市重点项目<?php endif; if($v['isimportant'] == 4): ?>省、市重点项目<?php endif; ?>
                    </td>
                <?php endif; if($type == 3): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shuangshi" data-proid=<?php echo $v['recid']; ?>>列入“双十项目”工程</a></td>
                <?php endif; if($type == 13): ?>
                    <td>
                        <?php if($v['istenselect'] == 1): ?>重大产业项目<?php endif; if($v['istenselect'] == 2): ?>十类重点工程<?php endif; if($v['tentype'] > 0): ?> (<?php echo $tenarr[$v['tentype']]['title']; ?>) <?php endif; ?>
                    </td>
                <?php endif; ?>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <?php if($v['step'] == 50): ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">待审核</a>
                            <?php else: ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">查看详情</a>
                            <?php endif; ?>   

                        </div>
                    </div>
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="<?php echo url('admin/project/prostaff?proid='.$v['recid']); ?>?type=examitem" target="_blank" class="layui-btn layui-btn-primary">
                                联系人
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
layui.use(['jquery','form'], function() {
    var $ = layui.jquery, form = layui.form;
    $(".into_shengshi").on("click",function(){
        var _this = $(this);
        var proid = _this.data("proid");
        var r = Math.random();
        $.ajax({
            type: "POST",
            url: '<?php echo url("project/shengshi"); ?>',
            data: {proid:proid,r:r},
            success: function(res) {
                _this.parent().html(res.msg);
            },
            dataType:'json'
        });
    });

    $(".into_shuangshi").on("click",function(){
        var _this = $(this);
        _this.addClass("waitdeal");
        $("#selectBox").removeClass("hide");
        $("#proid").val(_this.data("proid"));
    });

    $("#cancelten").on("click",function(){
        $("#selectBox").addClass("hide");
        $(".into_shuangshi").removeClass("waitdeal");
    });

    $("#dealten").on("click",function(){
        var proid = $("#proid").val();
        var tentype = $(".tentype:checked").val()
        var r = Math.random();
        if ( Boolean( parseInt(tentype) ) ) {
            $.ajax({
                type: "POST",
                url: '<?php echo url("project/dealten"); ?>',
                data: {proid:proid,tentype:tentype,r:r},
                success: function(res) {
                    $(".waitdeal").parent().html(res.msg);
                    $("#selectBox").addClass("hide");
                    $(".into_shuangshi").removeClass("waitdeal");
                },
                dataType:'json'
            }); 
        } else {
            layer.msg("请选择双十项目类别");
        }
    });
});
</script>
            </div>
        </div>
    <?php break; case "3": ?>
    
        <div class="layui-form page-form-width">

    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <?php if($type == 2): ?>
            <a href="<?php echo url('admin/project/important'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加省市重点项目</a>
            <?php endif; if($type == 3): ?>
            <a href="<?php echo url('admin/project/tenexam'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加“双十项目”工程</a>
            <?php endif; ?>
        </div>
    </div>

    <?php if($type == 3): ?>
    <div class="layui-form hide page-form-width" id="selectBox">
            <div   style="float:left; width:450px;">
                <label class="layui-form-label">重大产业项目</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 1): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div  style="float:left; width:450px;" >
                <label class="layui-form-label">十类重点工程</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 2): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <input type="hidden" id="proid">
            <div class="layui-form-item">
                <label class="layui-form-label"> </label>
                <div class="layui-input-block">
                        <a href="javascript:void(0)" class="layui-btn layui-btn-fluid ml10" style="width:30%;" id="dealten">
                        列入“双十项目”工程
                        </a>

                        <a href="javascript:void(0)" class="layui-btn layui-btn-primary ml10" style="width:30%;" id="cancelten">
                        取消操作
                        </a>
                 
                </div>
            </div>
    </div>
    <?php endif; ?>
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                <th>企业提交信息</th>
                <th>主管部门</th>
                <th>职能部门</th>
                <th>主管部门</th>
                <?php if($type == 2 or $type == 12): ?><th>列入省市重点项目</th><?php endif; if($type == 3 or $type == 13): ?><th>列入“双十项目”工程</th><?php endif; ?>
                <th>查看项目</th>
                <th>联系方式</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $v['title']; ?></td>
                <th><?php if($v['step'] >= 40): ?><span class="green">已提交</span><?php else: ?><span class="red">待提交</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 50): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 60): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <td><?php if($v['dunit'] > 0): ?><?php echo $examUnit[$v['dunit']]['title']; endif; ?></td>
                <?php if($type == 2): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shengshi" data-proid=<?php echo $v['recid']; ?>>通过</a>
                        <?php if($v['isimportant'] == 2): ?>(省重点项目)<?php endif; if($v['isimportant'] == 3): ?>(市重点项目)<?php endif; if($v['isimportant'] == 4): ?>(省、市重点项目)<?php endif; ?>

                    </td>
                <?php endif; if($type == 12): ?>
                    <td>
                        <?php if($v['isimportant'] == 2): ?>省重点项目<?php endif; if($v['isimportant'] == 3): ?>市重点项目<?php endif; if($v['isimportant'] == 4): ?>省、市重点项目<?php endif; ?>
                    </td>
                <?php endif; if($type == 3): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shuangshi" data-proid=<?php echo $v['recid']; ?>>列入“双十项目”工程</a></td>
                <?php endif; if($type == 13): ?>
                    <td>
                        <?php if($v['istenselect'] == 1): ?>重大产业项目<?php endif; if($v['istenselect'] == 2): ?>十类重点工程<?php endif; if($v['tentype'] > 0): ?> (<?php echo $tenarr[$v['tentype']]['title']; ?>) <?php endif; ?>
                    </td>
                <?php endif; ?>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <?php if($v['step'] == 50): ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">待审核</a>
                            <?php else: ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">查看详情</a>
                            <?php endif; ?>   

                        </div>
                    </div>
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="<?php echo url('admin/project/prostaff?proid='.$v['recid']); ?>?type=examitem" target="_blank" class="layui-btn layui-btn-primary">
                                联系人
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
layui.use(['jquery','form'], function() {
    var $ = layui.jquery, form = layui.form;
    $(".into_shengshi").on("click",function(){
        var _this = $(this);
        var proid = _this.data("proid");
        var r = Math.random();
        $.ajax({
            type: "POST",
            url: '<?php echo url("project/shengshi"); ?>',
            data: {proid:proid,r:r},
            success: function(res) {
                _this.parent().html(res.msg);
            },
            dataType:'json'
        });
    });

    $(".into_shuangshi").on("click",function(){
        var _this = $(this);
        _this.addClass("waitdeal");
        $("#selectBox").removeClass("hide");
        $("#proid").val(_this.data("proid"));
    });

    $("#cancelten").on("click",function(){
        $("#selectBox").addClass("hide");
        $(".into_shuangshi").removeClass("waitdeal");
    });

    $("#dealten").on("click",function(){
        var proid = $("#proid").val();
        var tentype = $(".tentype:checked").val()
        var r = Math.random();
        if ( Boolean( parseInt(tentype) ) ) {
            $.ajax({
                type: "POST",
                url: '<?php echo url("project/dealten"); ?>',
                data: {proid:proid,tentype:tentype,r:r},
                success: function(res) {
                    $(".waitdeal").parent().html(res.msg);
                    $("#selectBox").addClass("hide");
                    $(".into_shuangshi").removeClass("waitdeal");
                },
                dataType:'json'
            }); 
        } else {
            layer.msg("请选择双十项目类别");
        }
    });
});
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
                    <div class="layui-form page-form-width">

    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <?php if($type == 2): ?>
            <a href="<?php echo url('admin/project/important'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加省市重点项目</a>
            <?php endif; if($type == 3): ?>
            <a href="<?php echo url('admin/project/tenexam'); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加“双十项目”工程</a>
            <?php endif; ?>
        </div>
    </div>

    <?php if($type == 3): ?>
    <div class="layui-form hide page-form-width" id="selectBox">
            <div   style="float:left; width:450px;">
                <label class="layui-form-label">重大产业项目</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 1): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div  style="float:left; width:450px;" >
                <label class="layui-form-label">十类重点工程</label>
                <div class="layui-input-inline w300">
                    <?php if(is_array($tenarr) || $tenarr instanceof \think\Collection || $tenarr instanceof \think\Paginator): $i = 0; $__LIST__ = $tenarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['type'] == 2): ?>
                    <input type="radio" class="tentype" name="tentype"  value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>">
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <input type="hidden" id="proid">
            <div class="layui-form-item">
                <label class="layui-form-label"> </label>
                <div class="layui-input-block">
                        <a href="javascript:void(0)" class="layui-btn layui-btn-fluid ml10" style="width:30%;" id="dealten">
                        列入“双十项目”工程
                        </a>

                        <a href="javascript:void(0)" class="layui-btn layui-btn-primary ml10" style="width:30%;" id="cancelten">
                        取消操作
                        </a>
                 
                </div>
            </div>
    </div>
    <?php endif; ?>
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th>项目名称</th>
                <th>企业提交信息</th>
                <th>主管部门</th>
                <th>职能部门</th>
                <th>主管部门</th>
                <?php if($type == 2 or $type == 12): ?><th>列入省市重点项目</th><?php endif; if($type == 3 or $type == 13): ?><th>列入“双十项目”工程</th><?php endif; ?>
                <th>查看项目</th>
                <th>联系方式</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $v['title']; ?></td>
                <th><?php if($v['step'] >= 40): ?><span class="green">已提交</span><?php else: ?><span class="red">待提交</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 50): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <th><?php if($v['step'] >= 60): ?><span class="green">已提交</span><?php else: ?><span class="red">待审核</span><?php endif; ?></th>
                <td><?php if($v['dunit'] > 0): ?><?php echo $examUnit[$v['dunit']]['title']; endif; ?></td>
                <?php if($type == 2): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shengshi" data-proid=<?php echo $v['recid']; ?>>通过</a>
                        <?php if($v['isimportant'] == 2): ?>(省重点项目)<?php endif; if($v['isimportant'] == 3): ?>(市重点项目)<?php endif; if($v['isimportant'] == 4): ?>(省、市重点项目)<?php endif; ?>

                    </td>
                <?php endif; if($type == 12): ?>
                    <td>
                        <?php if($v['isimportant'] == 2): ?>省重点项目<?php endif; if($v['isimportant'] == 3): ?>市重点项目<?php endif; if($v['isimportant'] == 4): ?>省、市重点项目<?php endif; ?>
                    </td>
                <?php endif; if($type == 3): ?>
                    <td><a href="javascript:void(0)" class="layui-btn layui-btn-normal layui-btn-small into_shuangshi" data-proid=<?php echo $v['recid']; ?>>列入“双十项目”工程</a></td>
                <?php endif; if($type == 13): ?>
                    <td>
                        <?php if($v['istenselect'] == 1): ?>重大产业项目<?php endif; if($v['istenselect'] == 2): ?>十类重点工程<?php endif; if($v['tentype'] > 0): ?> (<?php echo $tenarr[$v['tentype']]['title']; ?>) <?php endif; ?>
                    </td>
                <?php endif; ?>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <?php if($v['step'] == 50): ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">待审核</a>
                            <?php else: ?>
                                <a href="<?php echo url('project/baseitem?proid='.$v['recid']); ?>" target="_blank" class="layui-btn layui-btn-primary layui-btn-small red">查看详情</a>
                            <?php endif; ?>   

                        </div>
                    </div>
                </td>
                <td>
                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a target="_blank" href="<?php echo url('admin/project/prostaff?proid='.$v['recid']); ?>?type=examitem" target="_blank" class="layui-btn layui-btn-primary">
                                联系人
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>
<script src="/hisiphp/hisiphp/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/hisiphp/hisiphp/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
layui.use(['jquery','form'], function() {
    var $ = layui.jquery, form = layui.form;
    $(".into_shengshi").on("click",function(){
        var _this = $(this);
        var proid = _this.data("proid");
        var r = Math.random();
        $.ajax({
            type: "POST",
            url: '<?php echo url("project/shengshi"); ?>',
            data: {proid:proid,r:r},
            success: function(res) {
                _this.parent().html(res.msg);
            },
            dataType:'json'
        });
    });

    $(".into_shuangshi").on("click",function(){
        var _this = $(this);
        _this.addClass("waitdeal");
        $("#selectBox").removeClass("hide");
        $("#proid").val(_this.data("proid"));
    });

    $("#cancelten").on("click",function(){
        $("#selectBox").addClass("hide");
        $(".into_shuangshi").removeClass("waitdeal");
    });

    $("#dealten").on("click",function(){
        var proid = $("#proid").val();
        var tentype = $(".tentype:checked").val()
        var r = Math.random();
        if ( Boolean( parseInt(tentype) ) ) {
            $.ajax({
                type: "POST",
                url: '<?php echo url("project/dealten"); ?>',
                data: {proid:proid,tentype:tentype,r:r},
                success: function(res) {
                    $(".waitdeal").parent().html(res.msg);
                    $("#selectBox").addClass("hide");
                    $(".into_shuangshi").removeClass("waitdeal");
                },
                dataType:'json'
            }); 
        } else {
            layer.msg("请选择双十项目类别");
        }
    });
});
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