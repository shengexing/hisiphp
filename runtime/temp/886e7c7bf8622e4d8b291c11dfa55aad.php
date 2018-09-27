<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:72:"D:\phpStudy\WWW\hisiphp\hisiphp/app/admin\view\project\generateditem.php";i:1537362918;s:57:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\layout.php";i:1531729143;s:63:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\header.php";i:1537363114;s:62:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\layui.php";i:1531729143;s:63:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\footer.php";i:1531729143;}*/ ?>
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

                     <li class="layui-nav-item"><a href=<?php echo url('admin/project/statis'); ?>>
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
        <label class="layui-form-label layui-form-project">项目名称：</label>
        <div class="layui-input-inline" style="width:500px;">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="备案或者预备案名称（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案或者预备案名称</div>
    </div>

   
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目类别：</label>
        <div class="layui-input-inline">
            <select name="ptype" type="select" class='field-ptype' lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($productType) || $productType instanceof \think\Collection || $productType instanceof \think\Paginator): $pk = 0; $__LIST__ = $productType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">行业类别：</label>
        <div class="layui-input-inline">
            <select name="industry1" lay-filter="industry1" class='field-industry1' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType1) || $IndustryType1 instanceof \think\Collection || $IndustryType1 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type2">
            <select name="industry2" class="select-content field-industry2" lay-filter="industry2" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType2) || $IndustryType2 instanceof \think\Collection || $IndustryType2 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type3">
            <select name="industry3" class="select-content field-industry3" lay-filter="industry3" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType3) || $IndustryType3 instanceof \think\Collection || $IndustryType3 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总投资额(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-amount" name="amount" lay-verify="required" autocomplete="off" placeholder="单位：万元（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案投资金额</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">起止时间期限：</label>
        <div class="">
            <input type="text" id="sdate" class="layui-input field-expire_time sdate field-sdate" name="sdate" 
            autocomplete="off" placeholder="项目开始时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
            <span class="layui-form-mid">至</span>
            <input type="text" id="edate" class="layui-input field-expire_time edate field-edate" name="edate" 
            autocomplete="off" placeholder="项目截止时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
        </div>
        <div class="layui-form-label layui-form-project layui-form-mid layui-word-aux" style="padding:0px !important">以项目实际开工时间为起始节点，按照项目正式入区合同要求建设周期为竣工时间进行推算</div>
    </div>

   

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">实施地点：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-address" id="address" name="address" lay-verify="required" autocomplete="off" placeholder="必填">

        </div>
        <div class="layui-form-mid layui-word-aux red">按照项目正式入区协议要求进行描述</div>
    </div>

     <div class="layui-form-item hide" id="schedule_box">
        <label class="layui-form-label layui-form-project">进度类别</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="schedule">
            <input type="hidden" class="layui-input field-schedule" id="scheduletype" name='schedule'>
        </div>
    </div>

    <div class="layui-form-item hide" id='eamount'>
        <label class="layui-form-label layui-form-project">年度计划投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-eamount" name="eamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item hide" id='yamount'>
        <label class="layui-form-label layui-form-project">截止上年底累计完成投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-yamount" name="yamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">辖区办事处：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($Dictxiaqu) || $Dictxiaqu instanceof \think\Collection || $Dictxiaqu instanceof \think\Paginator): $i = 0; $__LIST__ = $Dictxiaqu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="xiaqu" 
            <?php if($project['xiaqu'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

     <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">分管部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($unitData) || $unitData instanceof \think\Collection || $unitData instanceof \think\Paginator): $i = 0; $__LIST__ = $unitData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="dunit"
            <?php if($project['dunit'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>


    <?php if($roleid != 3): ?>
   <!--  <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年省市重点项目</label>
        <div class="layui-input-inline" style="width:750px">
            <input type="radio" class="field-isimportant" name="isimportant" value="1" title="否" checked>
            <input type="radio" class="field-isimportant" name="isimportant" value="2" title="省重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="3" title="市重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="4" title="省、市重点项目">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年“双十工程”项目</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-isten" name="isten" value="0" title="否" checked lay-filter="isten">
            <input type="radio" class="field-isten" name="isten" value="1" title="是" lay-filter="isten">
        </div>
    </div>

    <div class="layui-form-item hide" id="isten_box1">
        <label class="layui-form-label layui-form-project">“双十工程”项目类别</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-istenselect" name="istenselect"  value="1" lay-filter="istenselect" title="重大产业项目">
            <input type="radio" class="field-istenselect" name="istenselect"  value="2" lay-filter="istenselect" title="十类重点工程">
        </div>
    </div> -->
    <?php endif; ?>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $project['recid']; ?>">
            <?php if($project['step'] >= 10): if($editpar == 1): ?>
                <button type="submit" lay-submit="" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:30%;" id="editGenerate"  lay-filter="formSubmit">修改信息</button>
                <?php endif; ?>
                <a href="<?php echo url('project/builditem?proid='.$project['recid']); ?>" 
                class="layui-btn layui-btn-fluid ml10" style="width:30%;">
                下一步
                </a>
            <?php else: ?>
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" id="editGenerate" lay-filter="formSubmit">下一步</button>
            <?php endif; ?>
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
var formData = <?php echo json_encode($project); ?>;
var IndustryType2 = <?php echo json_encode($IndustryType2); ?>;
var IndustryType3 = <?php echo json_encode($IndustryType3); ?>;
var schedule = <?php echo json_encode($schedule); ?>;
var tipcnt = 0;

layui.use(['jquery', 'laydate', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, form = layui.form;
    laydate.render({
        elem: '.sdate',
        type:'month',
        format:'yyyy.M'
    });

    if (formData.isten == 1) {
        $("#isten_box1").removeClass("hide");
    }

    laydate.render({
        elem: '.edate',
        type:'month',
        format:'yyyy.M'
    });

    form.on('radio(isten)', function(data){  
        var isten = data.value;
        $("#isten_box1").addClass("hide");
        if ( isten == 1 ) {
            $("#isten_box1").removeClass("hide");
        }
    }); 

    if ( formData.step >= 10 ) {
        if ( formData.industry2 > 0 ) {
            $("#industry_type2").removeClass("hide");
        }

        if ( formData.industry3 > 0 ) {
            $("#industry_type3").removeClass("hide");
        } 

        if ( formData.schedule > 0 ) {
            dealSchedule(formData.schedule);
        } 


        var syear = new Date(Date.parse(formData.sdate)).getFullYear();
        if ( formData.cyear >= syear ) {
            $("#eamount").removeClass("hide");
        } 

        if ( syear + 1 <= formData.cyear ) {
            $("#yamount").removeClass("hide");     
        }     
    }


    function dealSchedule( stype ) {
        $("#schedule_box").removeClass("hide");
        $("#schedule").val(schedule[stype]);
        $("#scheduletype").val(stype);
    }

    function dealDate(){
        var sdate = $("#sdate").val();
        var edate = $("#edate").val();
        if ( sdate.length == 0 && edate.length == 0 ) {
            if ( tipcnt == 0 ) {
               layer.alert('请确定不填写项目起止日期?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    dealSchedule(1);
                    layer.msg('不填写项目起止日期，项目将默认为前期');
                }); 
                tipcnt = tipcnt +1;
            }
        } else if ((sdate.length == 0 && edate.length > 0)) {
            layer.alert('项目起止日期时间有误，确认信息?', {
              skin: 'layui-layer-molv' //样式类名
              ,closeBtn: 0
            }, function(){
                $("#sdate").val("");
                $("#edate").val("");
                dealSchedule(1);
                layer.msg('项目起止日期时间有误，项目将默认为前期');
            });
        } else {
            var syear = new Date(Date.parse(sdate)).getFullYear();
            var smonth = new Date(Date.parse(sdate)).getMonth() + 1;
            var eyear = new Date(Date.parse(edate)).getFullYear();
            var emonth = new Date(Date.parse(edate)).getMonth() + 1;
            var cyear = new Date().getFullYear();
            var cmonth = new Date().getMonth() + 1;
  
            if ( syear > eyear || (syear == eyear && smonth > emonth) ) {
                layer.alert('项目起止日期时间有误，确认信息?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    $("#sdate").val("");
                    $("#edate").val("");
                    dealSchedule(1);
                    layer.msg('项目起止日期时间有误，项目将默认为前期');
                });
            } else if ( syear < cyear && eyear == cyear ) {
                dealSchedule(5);
            } else if ( syear < cyear && eyear > cyear ) {
                dealSchedule(4);
            } else if ( syear == cyear && eyear == cyear ) {
                dealSchedule(3);
            } else if ( syear == cyear && eyear > cyear ) {
                dealSchedule(2);
            } else if ( syear > cyear ) {
                dealSchedule(1);
            } else {
                dealSchedule(1);
            }

            if ( cyear >= syear ) {
                $("#eamount").removeClass("hide");
            } else {
                $("#eamount").addClass("hide");
            }

            if ( syear + 1 <= cyear ) {
                $("#yamount").removeClass("hide");     
            } else {
                $("#yamount").addClass("hide");
            }
        }

    }

    $("#address").on("click",function(){
        dealDate();
    });

    $("#editGenerate").on("click",function(){
        dealDate();
    });

    form.on('select(industry1)', function(data){
        var pid = data.value;
        var _html = '<option value="">请选择...</option>';
        var industry2Key = 0;
        layui.each(IndustryType2,function(k,v){
            if (v['pid'] == pid) {
                industry2Key = industry2Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry2Key > 0 ) {
            $("#industry_type2").removeClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html(_html); 
            $("#industry_type3 .select-content").html("");    
        } else {
            $("#industry_type2").addClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html("");   
            $("#industry_type3 .select-content").html("");  
        }
        form.render();
    }); 

    form.on('select(industry2)', function(data){
        var pid = data.value;
        var industry3Key = 0;
        var _html = '<option value="">请选择...</option>';
        layui.each(IndustryType3,function(k,v){
            if (v['pid'] == pid) {
               industry3Key = industry3Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry3Key > 0 ) {
            $("#industry_type3").removeClass("hide");
            $("#industry_type3 .select-content").html(_html);   
        } else {
            $("#industry_type3").addClass("hide");
            $("#industry_type3 .select-content").html("");   
        }
         form.render();
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
        <label class="layui-form-label layui-form-project">项目名称：</label>
        <div class="layui-input-inline" style="width:500px;">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="备案或者预备案名称（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案或者预备案名称</div>
    </div>

   
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目类别：</label>
        <div class="layui-input-inline">
            <select name="ptype" type="select" class='field-ptype' lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($productType) || $productType instanceof \think\Collection || $productType instanceof \think\Paginator): $pk = 0; $__LIST__ = $productType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">行业类别：</label>
        <div class="layui-input-inline">
            <select name="industry1" lay-filter="industry1" class='field-industry1' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType1) || $IndustryType1 instanceof \think\Collection || $IndustryType1 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type2">
            <select name="industry2" class="select-content field-industry2" lay-filter="industry2" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType2) || $IndustryType2 instanceof \think\Collection || $IndustryType2 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type3">
            <select name="industry3" class="select-content field-industry3" lay-filter="industry3" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType3) || $IndustryType3 instanceof \think\Collection || $IndustryType3 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总投资额(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-amount" name="amount" lay-verify="required" autocomplete="off" placeholder="单位：万元（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案投资金额</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">起止时间期限：</label>
        <div class="">
            <input type="text" id="sdate" class="layui-input field-expire_time sdate field-sdate" name="sdate" 
            autocomplete="off" placeholder="项目开始时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
            <span class="layui-form-mid">至</span>
            <input type="text" id="edate" class="layui-input field-expire_time edate field-edate" name="edate" 
            autocomplete="off" placeholder="项目截止时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
        </div>
        <div class="layui-form-label layui-form-project layui-form-mid layui-word-aux" style="padding:0px !important">以项目实际开工时间为起始节点，按照项目正式入区合同要求建设周期为竣工时间进行推算</div>
    </div>

   

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">实施地点：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-address" id="address" name="address" lay-verify="required" autocomplete="off" placeholder="必填">

        </div>
        <div class="layui-form-mid layui-word-aux red">按照项目正式入区协议要求进行描述</div>
    </div>

     <div class="layui-form-item hide" id="schedule_box">
        <label class="layui-form-label layui-form-project">进度类别</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="schedule">
            <input type="hidden" class="layui-input field-schedule" id="scheduletype" name='schedule'>
        </div>
    </div>

    <div class="layui-form-item hide" id='eamount'>
        <label class="layui-form-label layui-form-project">年度计划投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-eamount" name="eamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item hide" id='yamount'>
        <label class="layui-form-label layui-form-project">截止上年底累计完成投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-yamount" name="yamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">辖区办事处：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($Dictxiaqu) || $Dictxiaqu instanceof \think\Collection || $Dictxiaqu instanceof \think\Paginator): $i = 0; $__LIST__ = $Dictxiaqu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="xiaqu" 
            <?php if($project['xiaqu'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

     <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">分管部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($unitData) || $unitData instanceof \think\Collection || $unitData instanceof \think\Paginator): $i = 0; $__LIST__ = $unitData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="dunit"
            <?php if($project['dunit'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>


    <?php if($roleid != 3): ?>
   <!--  <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年省市重点项目</label>
        <div class="layui-input-inline" style="width:750px">
            <input type="radio" class="field-isimportant" name="isimportant" value="1" title="否" checked>
            <input type="radio" class="field-isimportant" name="isimportant" value="2" title="省重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="3" title="市重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="4" title="省、市重点项目">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年“双十工程”项目</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-isten" name="isten" value="0" title="否" checked lay-filter="isten">
            <input type="radio" class="field-isten" name="isten" value="1" title="是" lay-filter="isten">
        </div>
    </div>

    <div class="layui-form-item hide" id="isten_box1">
        <label class="layui-form-label layui-form-project">“双十工程”项目类别</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-istenselect" name="istenselect"  value="1" lay-filter="istenselect" title="重大产业项目">
            <input type="radio" class="field-istenselect" name="istenselect"  value="2" lay-filter="istenselect" title="十类重点工程">
        </div>
    </div> -->
    <?php endif; ?>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $project['recid']; ?>">
            <?php if($project['step'] >= 10): if($editpar == 1): ?>
                <button type="submit" lay-submit="" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:30%;" id="editGenerate"  lay-filter="formSubmit">修改信息</button>
                <?php endif; ?>
                <a href="<?php echo url('project/builditem?proid='.$project['recid']); ?>" 
                class="layui-btn layui-btn-fluid ml10" style="width:30%;">
                下一步
                </a>
            <?php else: ?>
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" id="editGenerate" lay-filter="formSubmit">下一步</button>
            <?php endif; ?>
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
var formData = <?php echo json_encode($project); ?>;
var IndustryType2 = <?php echo json_encode($IndustryType2); ?>;
var IndustryType3 = <?php echo json_encode($IndustryType3); ?>;
var schedule = <?php echo json_encode($schedule); ?>;
var tipcnt = 0;

layui.use(['jquery', 'laydate', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, form = layui.form;
    laydate.render({
        elem: '.sdate',
        type:'month',
        format:'yyyy.M'
    });

    if (formData.isten == 1) {
        $("#isten_box1").removeClass("hide");
    }

    laydate.render({
        elem: '.edate',
        type:'month',
        format:'yyyy.M'
    });

    form.on('radio(isten)', function(data){  
        var isten = data.value;
        $("#isten_box1").addClass("hide");
        if ( isten == 1 ) {
            $("#isten_box1").removeClass("hide");
        }
    }); 

    if ( formData.step >= 10 ) {
        if ( formData.industry2 > 0 ) {
            $("#industry_type2").removeClass("hide");
        }

        if ( formData.industry3 > 0 ) {
            $("#industry_type3").removeClass("hide");
        } 

        if ( formData.schedule > 0 ) {
            dealSchedule(formData.schedule);
        } 


        var syear = new Date(Date.parse(formData.sdate)).getFullYear();
        if ( formData.cyear >= syear ) {
            $("#eamount").removeClass("hide");
        } 

        if ( syear + 1 <= formData.cyear ) {
            $("#yamount").removeClass("hide");     
        }     
    }


    function dealSchedule( stype ) {
        $("#schedule_box").removeClass("hide");
        $("#schedule").val(schedule[stype]);
        $("#scheduletype").val(stype);
    }

    function dealDate(){
        var sdate = $("#sdate").val();
        var edate = $("#edate").val();
        if ( sdate.length == 0 && edate.length == 0 ) {
            if ( tipcnt == 0 ) {
               layer.alert('请确定不填写项目起止日期?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    dealSchedule(1);
                    layer.msg('不填写项目起止日期，项目将默认为前期');
                }); 
                tipcnt = tipcnt +1;
            }
        } else if ((sdate.length == 0 && edate.length > 0)) {
            layer.alert('项目起止日期时间有误，确认信息?', {
              skin: 'layui-layer-molv' //样式类名
              ,closeBtn: 0
            }, function(){
                $("#sdate").val("");
                $("#edate").val("");
                dealSchedule(1);
                layer.msg('项目起止日期时间有误，项目将默认为前期');
            });
        } else {
            var syear = new Date(Date.parse(sdate)).getFullYear();
            var smonth = new Date(Date.parse(sdate)).getMonth() + 1;
            var eyear = new Date(Date.parse(edate)).getFullYear();
            var emonth = new Date(Date.parse(edate)).getMonth() + 1;
            var cyear = new Date().getFullYear();
            var cmonth = new Date().getMonth() + 1;
  
            if ( syear > eyear || (syear == eyear && smonth > emonth) ) {
                layer.alert('项目起止日期时间有误，确认信息?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    $("#sdate").val("");
                    $("#edate").val("");
                    dealSchedule(1);
                    layer.msg('项目起止日期时间有误，项目将默认为前期');
                });
            } else if ( syear < cyear && eyear == cyear ) {
                dealSchedule(5);
            } else if ( syear < cyear && eyear > cyear ) {
                dealSchedule(4);
            } else if ( syear == cyear && eyear == cyear ) {
                dealSchedule(3);
            } else if ( syear == cyear && eyear > cyear ) {
                dealSchedule(2);
            } else if ( syear > cyear ) {
                dealSchedule(1);
            } else {
                dealSchedule(1);
            }

            if ( cyear >= syear ) {
                $("#eamount").removeClass("hide");
            } else {
                $("#eamount").addClass("hide");
            }

            if ( syear + 1 <= cyear ) {
                $("#yamount").removeClass("hide");     
            } else {
                $("#yamount").addClass("hide");
            }
        }

    }

    $("#address").on("click",function(){
        dealDate();
    });

    $("#editGenerate").on("click",function(){
        dealDate();
    });

    form.on('select(industry1)', function(data){
        var pid = data.value;
        var _html = '<option value="">请选择...</option>';
        var industry2Key = 0;
        layui.each(IndustryType2,function(k,v){
            if (v['pid'] == pid) {
                industry2Key = industry2Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry2Key > 0 ) {
            $("#industry_type2").removeClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html(_html); 
            $("#industry_type3 .select-content").html("");    
        } else {
            $("#industry_type2").addClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html("");   
            $("#industry_type3 .select-content").html("");  
        }
        form.render();
    }); 

    form.on('select(industry2)', function(data){
        var pid = data.value;
        var industry3Key = 0;
        var _html = '<option value="">请选择...</option>';
        layui.each(IndustryType3,function(k,v){
            if (v['pid'] == pid) {
               industry3Key = industry3Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry3Key > 0 ) {
            $("#industry_type3").removeClass("hide");
            $("#industry_type3 .select-content").html(_html);   
        } else {
            $("#industry_type3").addClass("hide");
            $("#industry_type3 .select-content").html("");   
        }
         form.render();
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
        <label class="layui-form-label layui-form-project">项目名称：</label>
        <div class="layui-input-inline" style="width:500px;">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="备案或者预备案名称（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案或者预备案名称</div>
    </div>

   
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目类别：</label>
        <div class="layui-input-inline">
            <select name="ptype" type="select" class='field-ptype' lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($productType) || $productType instanceof \think\Collection || $productType instanceof \think\Paginator): $pk = 0; $__LIST__ = $productType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">行业类别：</label>
        <div class="layui-input-inline">
            <select name="industry1" lay-filter="industry1" class='field-industry1' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType1) || $IndustryType1 instanceof \think\Collection || $IndustryType1 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type2">
            <select name="industry2" class="select-content field-industry2" lay-filter="industry2" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType2) || $IndustryType2 instanceof \think\Collection || $IndustryType2 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type3">
            <select name="industry3" class="select-content field-industry3" lay-filter="industry3" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType3) || $IndustryType3 instanceof \think\Collection || $IndustryType3 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总投资额(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-amount" name="amount" lay-verify="required" autocomplete="off" placeholder="单位：万元（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案投资金额</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">起止时间期限：</label>
        <div class="">
            <input type="text" id="sdate" class="layui-input field-expire_time sdate field-sdate" name="sdate" 
            autocomplete="off" placeholder="项目开始时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
            <span class="layui-form-mid">至</span>
            <input type="text" id="edate" class="layui-input field-expire_time edate field-edate" name="edate" 
            autocomplete="off" placeholder="项目截止时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
        </div>
        <div class="layui-form-label layui-form-project layui-form-mid layui-word-aux" style="padding:0px !important">以项目实际开工时间为起始节点，按照项目正式入区合同要求建设周期为竣工时间进行推算</div>
    </div>

   

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">实施地点：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-address" id="address" name="address" lay-verify="required" autocomplete="off" placeholder="必填">

        </div>
        <div class="layui-form-mid layui-word-aux red">按照项目正式入区协议要求进行描述</div>
    </div>

     <div class="layui-form-item hide" id="schedule_box">
        <label class="layui-form-label layui-form-project">进度类别</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="schedule">
            <input type="hidden" class="layui-input field-schedule" id="scheduletype" name='schedule'>
        </div>
    </div>

    <div class="layui-form-item hide" id='eamount'>
        <label class="layui-form-label layui-form-project">年度计划投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-eamount" name="eamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item hide" id='yamount'>
        <label class="layui-form-label layui-form-project">截止上年底累计完成投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-yamount" name="yamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">辖区办事处：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($Dictxiaqu) || $Dictxiaqu instanceof \think\Collection || $Dictxiaqu instanceof \think\Paginator): $i = 0; $__LIST__ = $Dictxiaqu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="xiaqu" 
            <?php if($project['xiaqu'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

     <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">分管部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($unitData) || $unitData instanceof \think\Collection || $unitData instanceof \think\Paginator): $i = 0; $__LIST__ = $unitData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="dunit"
            <?php if($project['dunit'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>


    <?php if($roleid != 3): ?>
   <!--  <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年省市重点项目</label>
        <div class="layui-input-inline" style="width:750px">
            <input type="radio" class="field-isimportant" name="isimportant" value="1" title="否" checked>
            <input type="radio" class="field-isimportant" name="isimportant" value="2" title="省重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="3" title="市重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="4" title="省、市重点项目">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年“双十工程”项目</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-isten" name="isten" value="0" title="否" checked lay-filter="isten">
            <input type="radio" class="field-isten" name="isten" value="1" title="是" lay-filter="isten">
        </div>
    </div>

    <div class="layui-form-item hide" id="isten_box1">
        <label class="layui-form-label layui-form-project">“双十工程”项目类别</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-istenselect" name="istenselect"  value="1" lay-filter="istenselect" title="重大产业项目">
            <input type="radio" class="field-istenselect" name="istenselect"  value="2" lay-filter="istenselect" title="十类重点工程">
        </div>
    </div> -->
    <?php endif; ?>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $project['recid']; ?>">
            <?php if($project['step'] >= 10): if($editpar == 1): ?>
                <button type="submit" lay-submit="" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:30%;" id="editGenerate"  lay-filter="formSubmit">修改信息</button>
                <?php endif; ?>
                <a href="<?php echo url('project/builditem?proid='.$project['recid']); ?>" 
                class="layui-btn layui-btn-fluid ml10" style="width:30%;">
                下一步
                </a>
            <?php else: ?>
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" id="editGenerate" lay-filter="formSubmit">下一步</button>
            <?php endif; ?>
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
var formData = <?php echo json_encode($project); ?>;
var IndustryType2 = <?php echo json_encode($IndustryType2); ?>;
var IndustryType3 = <?php echo json_encode($IndustryType3); ?>;
var schedule = <?php echo json_encode($schedule); ?>;
var tipcnt = 0;

layui.use(['jquery', 'laydate', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, form = layui.form;
    laydate.render({
        elem: '.sdate',
        type:'month',
        format:'yyyy.M'
    });

    if (formData.isten == 1) {
        $("#isten_box1").removeClass("hide");
    }

    laydate.render({
        elem: '.edate',
        type:'month',
        format:'yyyy.M'
    });

    form.on('radio(isten)', function(data){  
        var isten = data.value;
        $("#isten_box1").addClass("hide");
        if ( isten == 1 ) {
            $("#isten_box1").removeClass("hide");
        }
    }); 

    if ( formData.step >= 10 ) {
        if ( formData.industry2 > 0 ) {
            $("#industry_type2").removeClass("hide");
        }

        if ( formData.industry3 > 0 ) {
            $("#industry_type3").removeClass("hide");
        } 

        if ( formData.schedule > 0 ) {
            dealSchedule(formData.schedule);
        } 


        var syear = new Date(Date.parse(formData.sdate)).getFullYear();
        if ( formData.cyear >= syear ) {
            $("#eamount").removeClass("hide");
        } 

        if ( syear + 1 <= formData.cyear ) {
            $("#yamount").removeClass("hide");     
        }     
    }


    function dealSchedule( stype ) {
        $("#schedule_box").removeClass("hide");
        $("#schedule").val(schedule[stype]);
        $("#scheduletype").val(stype);
    }

    function dealDate(){
        var sdate = $("#sdate").val();
        var edate = $("#edate").val();
        if ( sdate.length == 0 && edate.length == 0 ) {
            if ( tipcnt == 0 ) {
               layer.alert('请确定不填写项目起止日期?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    dealSchedule(1);
                    layer.msg('不填写项目起止日期，项目将默认为前期');
                }); 
                tipcnt = tipcnt +1;
            }
        } else if ((sdate.length == 0 && edate.length > 0)) {
            layer.alert('项目起止日期时间有误，确认信息?', {
              skin: 'layui-layer-molv' //样式类名
              ,closeBtn: 0
            }, function(){
                $("#sdate").val("");
                $("#edate").val("");
                dealSchedule(1);
                layer.msg('项目起止日期时间有误，项目将默认为前期');
            });
        } else {
            var syear = new Date(Date.parse(sdate)).getFullYear();
            var smonth = new Date(Date.parse(sdate)).getMonth() + 1;
            var eyear = new Date(Date.parse(edate)).getFullYear();
            var emonth = new Date(Date.parse(edate)).getMonth() + 1;
            var cyear = new Date().getFullYear();
            var cmonth = new Date().getMonth() + 1;
  
            if ( syear > eyear || (syear == eyear && smonth > emonth) ) {
                layer.alert('项目起止日期时间有误，确认信息?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    $("#sdate").val("");
                    $("#edate").val("");
                    dealSchedule(1);
                    layer.msg('项目起止日期时间有误，项目将默认为前期');
                });
            } else if ( syear < cyear && eyear == cyear ) {
                dealSchedule(5);
            } else if ( syear < cyear && eyear > cyear ) {
                dealSchedule(4);
            } else if ( syear == cyear && eyear == cyear ) {
                dealSchedule(3);
            } else if ( syear == cyear && eyear > cyear ) {
                dealSchedule(2);
            } else if ( syear > cyear ) {
                dealSchedule(1);
            } else {
                dealSchedule(1);
            }

            if ( cyear >= syear ) {
                $("#eamount").removeClass("hide");
            } else {
                $("#eamount").addClass("hide");
            }

            if ( syear + 1 <= cyear ) {
                $("#yamount").removeClass("hide");     
            } else {
                $("#yamount").addClass("hide");
            }
        }

    }

    $("#address").on("click",function(){
        dealDate();
    });

    $("#editGenerate").on("click",function(){
        dealDate();
    });

    form.on('select(industry1)', function(data){
        var pid = data.value;
        var _html = '<option value="">请选择...</option>';
        var industry2Key = 0;
        layui.each(IndustryType2,function(k,v){
            if (v['pid'] == pid) {
                industry2Key = industry2Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry2Key > 0 ) {
            $("#industry_type2").removeClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html(_html); 
            $("#industry_type3 .select-content").html("");    
        } else {
            $("#industry_type2").addClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html("");   
            $("#industry_type3 .select-content").html("");  
        }
        form.render();
    }); 

    form.on('select(industry2)', function(data){
        var pid = data.value;
        var industry3Key = 0;
        var _html = '<option value="">请选择...</option>';
        layui.each(IndustryType3,function(k,v){
            if (v['pid'] == pid) {
               industry3Key = industry3Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry3Key > 0 ) {
            $("#industry_type3").removeClass("hide");
            $("#industry_type3 .select-content").html(_html);   
        } else {
            $("#industry_type3").addClass("hide");
            $("#industry_type3 .select-content").html("");   
        }
         form.render();
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
        <label class="layui-form-label layui-form-project">项目名称：</label>
        <div class="layui-input-inline" style="width:500px;">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="备案或者预备案名称（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案或者预备案名称</div>
    </div>

   
    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">项目类别：</label>
        <div class="layui-input-inline">
            <select name="ptype" type="select" class='field-ptype' lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($productType) || $productType instanceof \think\Collection || $productType instanceof \think\Paginator): $pk = 0; $__LIST__ = $productType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">行业类别：</label>
        <div class="layui-input-inline">
            <select name="industry1" lay-filter="industry1" class='field-industry1' type="select" lay-verify="required">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType1) || $IndustryType1 instanceof \think\Collection || $IndustryType1 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type2">
            <select name="industry2" class="select-content field-industry2" lay-filter="industry2" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType2) || $IndustryType2 instanceof \think\Collection || $IndustryType2 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <div class="layui-input-inline hide" id="industry_type3">
            <select name="industry3" class="select-content field-industry3" lay-filter="industry3" type="select">
                <option value="">请选择...</option>
                <?php if(is_array($IndustryType3) || $IndustryType3 instanceof \think\Collection || $IndustryType3 instanceof \think\Paginator): $pk = 0; $__LIST__ = $IndustryType3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($pk % 2 );++$pk;if($pt['status'] == 1): ?>
                        <option value="<?php echo $pt['recid']; ?>"><?php echo $pt['title']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">总投资额(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-amount" name="amount" lay-verify="required" autocomplete="off" placeholder="单位：万元（必填）">
        </div>
        <div class="layui-form-mid layui-word-aux red">备案投资金额</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">起止时间期限：</label>
        <div class="">
            <input type="text" id="sdate" class="layui-input field-expire_time sdate field-sdate" name="sdate" 
            autocomplete="off" placeholder="项目开始时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
            <span class="layui-form-mid">至</span>
            <input type="text" id="edate" class="layui-input field-expire_time edate field-edate" name="edate" 
            autocomplete="off" placeholder="项目截止时间" 
            onclick="layui.laydate({elem: this,format:'yyyy-mm'})" readonly>
        </div>
        <div class="layui-form-label layui-form-project layui-form-mid layui-word-aux" style="padding:0px !important">以项目实际开工时间为起始节点，按照项目正式入区合同要求建设周期为竣工时间进行推算</div>
    </div>

   

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">实施地点：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-address" id="address" name="address" lay-verify="required" autocomplete="off" placeholder="必填">

        </div>
        <div class="layui-form-mid layui-word-aux red">按照项目正式入区协议要求进行描述</div>
    </div>

     <div class="layui-form-item hide" id="schedule_box">
        <label class="layui-form-label layui-form-project">进度类别</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="schedule">
            <input type="hidden" class="layui-input field-schedule" id="scheduletype" name='schedule'>
        </div>
    </div>

    <div class="layui-form-item hide" id='eamount'>
        <label class="layui-form-label layui-form-project">年度计划投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-eamount" name="eamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item hide" id='yamount'>
        <label class="layui-form-label layui-form-project">截止上年底累计完成投资(万)：</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-yamount" name="yamount" autocomplete="off" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">辖区办事处：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($Dictxiaqu) || $Dictxiaqu instanceof \think\Collection || $Dictxiaqu instanceof \think\Paginator): $i = 0; $__LIST__ = $Dictxiaqu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="xiaqu" 
            <?php if($project['xiaqu'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

     <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">分管部门：</label>
        <div class="layui-input-inline"  style="width:750px">
            <?php if(is_array($unitData) || $unitData instanceof \think\Collection || $unitData instanceof \think\Paginator): $i = 0; $__LIST__ = $unitData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <input type="radio" class="field-tentype" name="dunit"
            <?php if($project['dunit'] == $vo['recid']): ?> checked <?php endif; ?>
             value="<?php echo $vo['recid']; ?>" title="<?php echo $vo['title']; ?>" lay-verify="required">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>


    <?php if($roleid != 3): ?>
   <!--  <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年省市重点项目</label>
        <div class="layui-input-inline" style="width:750px">
            <input type="radio" class="field-isimportant" name="isimportant" value="1" title="否" checked>
            <input type="radio" class="field-isimportant" name="isimportant" value="2" title="省重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="3" title="市重点项目">
            <input type="radio" class="field-isimportant" name="isimportant" value="4" title="省、市重点项目">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label layui-form-project">是否拟列入当年“双十工程”项目</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-isten" name="isten" value="0" title="否" checked lay-filter="isten">
            <input type="radio" class="field-isten" name="isten" value="1" title="是" lay-filter="isten">
        </div>
    </div>

    <div class="layui-form-item hide" id="isten_box1">
        <label class="layui-form-label layui-form-project">“双十工程”项目类别</label>
        <div class="layui-input-inline w300">
            <input type="radio" class="field-istenselect" name="istenselect"  value="1" lay-filter="istenselect" title="重大产业项目">
            <input type="radio" class="field-istenselect" name="istenselect"  value="2" lay-filter="istenselect" title="十类重点工程">
        </div>
    </div> -->
    <?php endif; ?>

    <div class="layui-form-item">
        <label class="layui-form-label"> </label>
        <div class="layui-input-block">
            <input type="hidden" name="proid" value="<?php echo $project['recid']; ?>">
            <?php if($project['step'] >= 10): if($editpar == 1): ?>
                <button type="submit" lay-submit="" class="layui-btn layui-btn-primary layui-btn-fluid" style="width:30%;" id="editGenerate"  lay-filter="formSubmit">修改信息</button>
                <?php endif; ?>
                <a href="<?php echo url('project/builditem?proid='.$project['recid']); ?>" 
                class="layui-btn layui-btn-fluid ml10" style="width:30%;">
                下一步
                </a>
            <?php else: ?>
                <button type="submit" lay-submit="" style="width:30%;" class="layui-btn layui-btn-fluid" id="editGenerate" lay-filter="formSubmit">下一步</button>
            <?php endif; ?>
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
var formData = <?php echo json_encode($project); ?>;
var IndustryType2 = <?php echo json_encode($IndustryType2); ?>;
var IndustryType3 = <?php echo json_encode($IndustryType3); ?>;
var schedule = <?php echo json_encode($schedule); ?>;
var tipcnt = 0;

layui.use(['jquery', 'laydate', 'form'], function() {
    var $ = layui.jquery, laydate = layui.laydate, form = layui.form;
    laydate.render({
        elem: '.sdate',
        type:'month',
        format:'yyyy.M'
    });

    if (formData.isten == 1) {
        $("#isten_box1").removeClass("hide");
    }

    laydate.render({
        elem: '.edate',
        type:'month',
        format:'yyyy.M'
    });

    form.on('radio(isten)', function(data){  
        var isten = data.value;
        $("#isten_box1").addClass("hide");
        if ( isten == 1 ) {
            $("#isten_box1").removeClass("hide");
        }
    }); 

    if ( formData.step >= 10 ) {
        if ( formData.industry2 > 0 ) {
            $("#industry_type2").removeClass("hide");
        }

        if ( formData.industry3 > 0 ) {
            $("#industry_type3").removeClass("hide");
        } 

        if ( formData.schedule > 0 ) {
            dealSchedule(formData.schedule);
        } 


        var syear = new Date(Date.parse(formData.sdate)).getFullYear();
        if ( formData.cyear >= syear ) {
            $("#eamount").removeClass("hide");
        } 

        if ( syear + 1 <= formData.cyear ) {
            $("#yamount").removeClass("hide");     
        }     
    }


    function dealSchedule( stype ) {
        $("#schedule_box").removeClass("hide");
        $("#schedule").val(schedule[stype]);
        $("#scheduletype").val(stype);
    }

    function dealDate(){
        var sdate = $("#sdate").val();
        var edate = $("#edate").val();
        if ( sdate.length == 0 && edate.length == 0 ) {
            if ( tipcnt == 0 ) {
               layer.alert('请确定不填写项目起止日期?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    dealSchedule(1);
                    layer.msg('不填写项目起止日期，项目将默认为前期');
                }); 
                tipcnt = tipcnt +1;
            }
        } else if ((sdate.length == 0 && edate.length > 0)) {
            layer.alert('项目起止日期时间有误，确认信息?', {
              skin: 'layui-layer-molv' //样式类名
              ,closeBtn: 0
            }, function(){
                $("#sdate").val("");
                $("#edate").val("");
                dealSchedule(1);
                layer.msg('项目起止日期时间有误，项目将默认为前期');
            });
        } else {
            var syear = new Date(Date.parse(sdate)).getFullYear();
            var smonth = new Date(Date.parse(sdate)).getMonth() + 1;
            var eyear = new Date(Date.parse(edate)).getFullYear();
            var emonth = new Date(Date.parse(edate)).getMonth() + 1;
            var cyear = new Date().getFullYear();
            var cmonth = new Date().getMonth() + 1;
  
            if ( syear > eyear || (syear == eyear && smonth > emonth) ) {
                layer.alert('项目起止日期时间有误，确认信息?', {
                  skin: 'layui-layer-molv' //样式类名
                  ,closeBtn: 0
                }, function(){
                    $("#sdate").val("");
                    $("#edate").val("");
                    dealSchedule(1);
                    layer.msg('项目起止日期时间有误，项目将默认为前期');
                });
            } else if ( syear < cyear && eyear == cyear ) {
                dealSchedule(5);
            } else if ( syear < cyear && eyear > cyear ) {
                dealSchedule(4);
            } else if ( syear == cyear && eyear == cyear ) {
                dealSchedule(3);
            } else if ( syear == cyear && eyear > cyear ) {
                dealSchedule(2);
            } else if ( syear > cyear ) {
                dealSchedule(1);
            } else {
                dealSchedule(1);
            }

            if ( cyear >= syear ) {
                $("#eamount").removeClass("hide");
            } else {
                $("#eamount").addClass("hide");
            }

            if ( syear + 1 <= cyear ) {
                $("#yamount").removeClass("hide");     
            } else {
                $("#yamount").addClass("hide");
            }
        }

    }

    $("#address").on("click",function(){
        dealDate();
    });

    $("#editGenerate").on("click",function(){
        dealDate();
    });

    form.on('select(industry1)', function(data){
        var pid = data.value;
        var _html = '<option value="">请选择...</option>';
        var industry2Key = 0;
        layui.each(IndustryType2,function(k,v){
            if (v['pid'] == pid) {
                industry2Key = industry2Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry2Key > 0 ) {
            $("#industry_type2").removeClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html(_html); 
            $("#industry_type3 .select-content").html("");    
        } else {
            $("#industry_type2").addClass("hide");
            $("#industry_type3").addClass("hide");
            $("#industry_type2 .select-content").html("");   
            $("#industry_type3 .select-content").html("");  
        }
        form.render();
    }); 

    form.on('select(industry2)', function(data){
        var pid = data.value;
        var industry3Key = 0;
        var _html = '<option value="">请选择...</option>';
        layui.each(IndustryType3,function(k,v){
            if (v['pid'] == pid) {
               industry3Key = industry3Key + 1;
               _html += '<option value="'+ v['recid'] +'">'+ v['title'] +'</option>';
            }
        }); 
        if ( industry3Key > 0 ) {
            $("#industry_type3").removeClass("hide");
            $("#industry_type3 .select-content").html(_html);   
        } else {
            $("#industry_type3").addClass("hide");
            $("#industry_type3 .select-content").html("");   
        }
         form.render();
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