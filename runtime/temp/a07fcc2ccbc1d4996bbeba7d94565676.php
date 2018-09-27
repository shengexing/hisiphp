<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:63:"D:\phpStudy\WWW\hisiphp\hisiphp/app/admin\view\project\tens.php";i:1531729145;s:57:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\layout.php";i:1531729143;s:63:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\header.php";i:1537084664;s:62:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\layui.php";i:1531729143;s:63:"D:\phpStudy\WWW\hisiphp\hisiphp\app\admin\view\block\footer.php";i:1531729143;}*/ ?>
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

                    <li class="layui-nav-item"><a href=<?php echo url('admin/prouser/listuser?type=1'); ?>>
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
                            <li <?php if($type == 13): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=13'); ?>>拟列入当年省市重点项目</a></li>
                            <li <?php if($type == 14): ?>class="layui-side-item layui-side-hover"<?php else: ?>class="layui-side-item"<?php endif; ?>><a  href=<?php echo url('admin/prouser/listuser?type=14'); ?>>拟列入当年“双十工程”项目</a></li>
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
                    
<div class="tens_title">
	<a href="javascript:void(0)" id="tobox1" class="hover">2018年郑州经济技术开发区十个重大产业项目服务部</a>
	<a href="javascript:void(0)" id="tobox2" >2018年郑州经济技术开发区十类重大工程指挥部</a>
</div>
<div class="tens" id="box1">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens1.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：樊福太 师淑君</span>
					<span class="tens_zz_wz">责任部门：工信局</span>
					<span class="tens_zz_wz">专职服务人员：卢红杰</span>
					<span class="tens_zz_wz">联系电话：15238023434</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>">上汽乘用车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens2.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：郭连喜</span>
					<span class="tens_zz_wz">责任部门：物流园区综合办</span>
					<span class="tens_zz_wz">专职服务人员：王广清</span>
					<span class="tens_zz_wz">联系电话：13623830080</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>">宇通整车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens3.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：杨光</span>
					<span class="tens_zz_wz">责任部门：物流园区发改局</span>
					<span class="tens_zz_wz">专职服务人员：胡凤玲</span>
					<span class="tens_zz_wz">联系电话：18838210966</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>">京东亚洲一号项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens4.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：孙兵</span>
					<span class="tens_zz_wz">责任部门：经发局</span>
					<span class="tens_zz_wz">专职服务人员：于万和</span>
					<span class="tens_zz_wz">联系电话：13703989319</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>">中铁高端职能化装备产业园项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens5.png" width="268" >
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：付田军</span>
					<span class="tens_zz_wz">联系电话：13384025075</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>">海尔创新产业园项目服务部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens6.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：师淑君</span>
					<span class="tens_zz_wz">责任部门：科技局</span>
					<span class="tens_zz_wz">专职服务人员：张延永</span>
					<span class="tens_zz_wz">联系电话：13027702385</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>">科技创新载体项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens7.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：刘洋</span>
					<span class="tens_zz_wz">责任部门：新兴局</span>
					<span class="tens_zz_wz">专职服务人员：蒋桂勇</span>
					<span class="tens_zz_wz">联系电话：13838108702</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>">EWTO核心功能集聚区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens8.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：崔巍</span>
					<span class="tens_zz_wz">责任部门：出口加工区综合管理局</span>
					<span class="tens_zz_wz">专职服务人员：李建河</span>
					<span class="tens_zz_wz">联系电话：13613823386</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>">经开综保区B区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens9.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：张广明</span>
					<span class="tens_zz_wz">联系电话：13700858366</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>">冷链物流项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens10.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：刘永梅</span>
					<span class="tens_zz_wz">联系电话：13937181023</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>">医药及医疗器械项目服务部</a>
		</p>
	</div>
</div>
<div class="tens hide" id="box2">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens11.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：新城办</span>
					<span class="tens_zz_wz">专职服务人员：郑昱</span>
					<span class="tens_zz_wz">联系电话：13673625600</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>">安置房建设工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens12.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：京杭办事处</span>
					<span class="tens_zz_wz">专职服务人员：王志强</span>
					<span class="tens_zz_wz">联系电话：18703850369</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>">村庄征迁工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens13.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：胡建利</span>
					<span class="tens_zz_wz">联系电话：15238017358</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>">骨干路网工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens14.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：守金力</span>
					<span class="tens_zz_wz">联系电话：15225176161</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>">城区道路工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens15.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：王培友</span>
					<span class="tens_zz_wz">联系电话：15890096660</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>">电力设施工程指挥部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens16.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：教文体局</span>
					<span class="tens_zz_wz">专职服务人员：乔建涛</span>
					<span class="tens_zz_wz">联系电话：13525503093</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>">教育文化工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens17.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：社区局</span>
					<span class="tens_zz_wz">专职服务人员：苏振馨</span>
					<span class="tens_zz_wz">联系电话：13653840901</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>">医疗卫生设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens18.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：任永洋</span>
					<span class="tens_zz_wz">联系电话：15837121516</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>">配套设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens19.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：农经委</span>
					<span class="tens_zz_wz">专职服务人员：刘陆锋</span>
					<span class="tens_zz_wz">联系电话：15937107944</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>">生态水系工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens20.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：张新法</span>
					<span class="tens_zz_wz">联系电话：13837168878</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>">绿化景观工程指挥部</a>
		</p>
	</div>
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
layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#tobox1").on("click",function(){
    	$("#tobox1").addClass("hover");
    	$("#tobox2").removeClass("hover");
    	$("#box1").removeClass("hide");
    	$("#box2").addClass("hide");

    });

    $("#tobox2").on("click",function(){
    	$("#tobox2").addClass("hover");
    	$("#tobox1").removeClass("hover");
    	$("#box2").removeClass("hide");
    	$("#box1").addClass("hide");

    });

    $(".tens_zz_big").on("mouseover",function(){
    	$(this).find(".tens_zz").removeClass("hide");
    });
    $(".tens_zz_big").on("mouseout",function(){
    	$(this).find(".tens_zz").addClass("hide");
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
                
<div class="tens_title">
	<a href="javascript:void(0)" id="tobox1" class="hover">2018年郑州经济技术开发区十个重大产业项目服务部</a>
	<a href="javascript:void(0)" id="tobox2" >2018年郑州经济技术开发区十类重大工程指挥部</a>
</div>
<div class="tens" id="box1">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens1.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：樊福太 师淑君</span>
					<span class="tens_zz_wz">责任部门：工信局</span>
					<span class="tens_zz_wz">专职服务人员：卢红杰</span>
					<span class="tens_zz_wz">联系电话：15238023434</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>">上汽乘用车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens2.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：郭连喜</span>
					<span class="tens_zz_wz">责任部门：物流园区综合办</span>
					<span class="tens_zz_wz">专职服务人员：王广清</span>
					<span class="tens_zz_wz">联系电话：13623830080</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>">宇通整车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens3.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：杨光</span>
					<span class="tens_zz_wz">责任部门：物流园区发改局</span>
					<span class="tens_zz_wz">专职服务人员：胡凤玲</span>
					<span class="tens_zz_wz">联系电话：18838210966</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>">京东亚洲一号项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens4.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：孙兵</span>
					<span class="tens_zz_wz">责任部门：经发局</span>
					<span class="tens_zz_wz">专职服务人员：于万和</span>
					<span class="tens_zz_wz">联系电话：13703989319</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>">中铁高端职能化装备产业园项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens5.png" width="268" >
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：付田军</span>
					<span class="tens_zz_wz">联系电话：13384025075</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>">海尔创新产业园项目服务部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens6.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：师淑君</span>
					<span class="tens_zz_wz">责任部门：科技局</span>
					<span class="tens_zz_wz">专职服务人员：张延永</span>
					<span class="tens_zz_wz">联系电话：13027702385</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>">科技创新载体项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens7.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：刘洋</span>
					<span class="tens_zz_wz">责任部门：新兴局</span>
					<span class="tens_zz_wz">专职服务人员：蒋桂勇</span>
					<span class="tens_zz_wz">联系电话：13838108702</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>">EWTO核心功能集聚区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens8.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：崔巍</span>
					<span class="tens_zz_wz">责任部门：出口加工区综合管理局</span>
					<span class="tens_zz_wz">专职服务人员：李建河</span>
					<span class="tens_zz_wz">联系电话：13613823386</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>">经开综保区B区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens9.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：张广明</span>
					<span class="tens_zz_wz">联系电话：13700858366</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>">冷链物流项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens10.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：刘永梅</span>
					<span class="tens_zz_wz">联系电话：13937181023</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>">医药及医疗器械项目服务部</a>
		</p>
	</div>
</div>
<div class="tens hide" id="box2">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens11.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：新城办</span>
					<span class="tens_zz_wz">专职服务人员：郑昱</span>
					<span class="tens_zz_wz">联系电话：13673625600</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>">安置房建设工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens12.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：京杭办事处</span>
					<span class="tens_zz_wz">专职服务人员：王志强</span>
					<span class="tens_zz_wz">联系电话：18703850369</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>">村庄征迁工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens13.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：胡建利</span>
					<span class="tens_zz_wz">联系电话：15238017358</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>">骨干路网工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens14.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：守金力</span>
					<span class="tens_zz_wz">联系电话：15225176161</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>">城区道路工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens15.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：王培友</span>
					<span class="tens_zz_wz">联系电话：15890096660</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>">电力设施工程指挥部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens16.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：教文体局</span>
					<span class="tens_zz_wz">专职服务人员：乔建涛</span>
					<span class="tens_zz_wz">联系电话：13525503093</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>">教育文化工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens17.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：社区局</span>
					<span class="tens_zz_wz">专职服务人员：苏振馨</span>
					<span class="tens_zz_wz">联系电话：13653840901</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>">医疗卫生设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens18.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：任永洋</span>
					<span class="tens_zz_wz">联系电话：15837121516</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>">配套设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens19.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：农经委</span>
					<span class="tens_zz_wz">专职服务人员：刘陆锋</span>
					<span class="tens_zz_wz">联系电话：15937107944</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>">生态水系工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens20.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：张新法</span>
					<span class="tens_zz_wz">联系电话：13837168878</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>">绿化景观工程指挥部</a>
		</p>
	</div>
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
layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#tobox1").on("click",function(){
    	$("#tobox1").addClass("hover");
    	$("#tobox2").removeClass("hover");
    	$("#box1").removeClass("hide");
    	$("#box2").addClass("hide");

    });

    $("#tobox2").on("click",function(){
    	$("#tobox2").addClass("hover");
    	$("#tobox1").removeClass("hover");
    	$("#box2").removeClass("hide");
    	$("#box1").addClass("hide");

    });

    $(".tens_zz_big").on("mouseover",function(){
    	$(this).find(".tens_zz").removeClass("hide");
    });
    $(".tens_zz_big").on("mouseout",function(){
    	$(this).find(".tens_zz").addClass("hide");
    });
});
</script>
            </div>
        </div>
    <?php break; case "3": ?>
    
        
<div class="tens_title">
	<a href="javascript:void(0)" id="tobox1" class="hover">2018年郑州经济技术开发区十个重大产业项目服务部</a>
	<a href="javascript:void(0)" id="tobox2" >2018年郑州经济技术开发区十类重大工程指挥部</a>
</div>
<div class="tens" id="box1">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens1.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：樊福太 师淑君</span>
					<span class="tens_zz_wz">责任部门：工信局</span>
					<span class="tens_zz_wz">专职服务人员：卢红杰</span>
					<span class="tens_zz_wz">联系电话：15238023434</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>">上汽乘用车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens2.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：郭连喜</span>
					<span class="tens_zz_wz">责任部门：物流园区综合办</span>
					<span class="tens_zz_wz">专职服务人员：王广清</span>
					<span class="tens_zz_wz">联系电话：13623830080</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>">宇通整车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens3.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：杨光</span>
					<span class="tens_zz_wz">责任部门：物流园区发改局</span>
					<span class="tens_zz_wz">专职服务人员：胡凤玲</span>
					<span class="tens_zz_wz">联系电话：18838210966</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>">京东亚洲一号项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens4.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：孙兵</span>
					<span class="tens_zz_wz">责任部门：经发局</span>
					<span class="tens_zz_wz">专职服务人员：于万和</span>
					<span class="tens_zz_wz">联系电话：13703989319</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>">中铁高端职能化装备产业园项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens5.png" width="268" >
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：付田军</span>
					<span class="tens_zz_wz">联系电话：13384025075</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>">海尔创新产业园项目服务部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens6.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：师淑君</span>
					<span class="tens_zz_wz">责任部门：科技局</span>
					<span class="tens_zz_wz">专职服务人员：张延永</span>
					<span class="tens_zz_wz">联系电话：13027702385</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>">科技创新载体项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens7.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：刘洋</span>
					<span class="tens_zz_wz">责任部门：新兴局</span>
					<span class="tens_zz_wz">专职服务人员：蒋桂勇</span>
					<span class="tens_zz_wz">联系电话：13838108702</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>">EWTO核心功能集聚区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens8.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：崔巍</span>
					<span class="tens_zz_wz">责任部门：出口加工区综合管理局</span>
					<span class="tens_zz_wz">专职服务人员：李建河</span>
					<span class="tens_zz_wz">联系电话：13613823386</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>">经开综保区B区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens9.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：张广明</span>
					<span class="tens_zz_wz">联系电话：13700858366</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>">冷链物流项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens10.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：刘永梅</span>
					<span class="tens_zz_wz">联系电话：13937181023</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>">医药及医疗器械项目服务部</a>
		</p>
	</div>
</div>
<div class="tens hide" id="box2">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens11.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：新城办</span>
					<span class="tens_zz_wz">专职服务人员：郑昱</span>
					<span class="tens_zz_wz">联系电话：13673625600</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>">安置房建设工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens12.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：京杭办事处</span>
					<span class="tens_zz_wz">专职服务人员：王志强</span>
					<span class="tens_zz_wz">联系电话：18703850369</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>">村庄征迁工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens13.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：胡建利</span>
					<span class="tens_zz_wz">联系电话：15238017358</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>">骨干路网工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens14.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：守金力</span>
					<span class="tens_zz_wz">联系电话：15225176161</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>">城区道路工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens15.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：王培友</span>
					<span class="tens_zz_wz">联系电话：15890096660</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>">电力设施工程指挥部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens16.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：教文体局</span>
					<span class="tens_zz_wz">专职服务人员：乔建涛</span>
					<span class="tens_zz_wz">联系电话：13525503093</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>">教育文化工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens17.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：社区局</span>
					<span class="tens_zz_wz">专职服务人员：苏振馨</span>
					<span class="tens_zz_wz">联系电话：13653840901</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>">医疗卫生设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens18.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：任永洋</span>
					<span class="tens_zz_wz">联系电话：15837121516</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>">配套设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens19.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：农经委</span>
					<span class="tens_zz_wz">专职服务人员：刘陆锋</span>
					<span class="tens_zz_wz">联系电话：15937107944</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>">生态水系工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens20.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：张新法</span>
					<span class="tens_zz_wz">联系电话：13837168878</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>">绿化景观工程指挥部</a>
		</p>
	</div>
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
layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#tobox1").on("click",function(){
    	$("#tobox1").addClass("hover");
    	$("#tobox2").removeClass("hover");
    	$("#box1").removeClass("hide");
    	$("#box2").addClass("hide");

    });

    $("#tobox2").on("click",function(){
    	$("#tobox2").addClass("hover");
    	$("#tobox1").removeClass("hover");
    	$("#box2").removeClass("hide");
    	$("#box1").addClass("hide");

    });

    $(".tens_zz_big").on("mouseover",function(){
    	$(this).find(".tens_zz").removeClass("hide");
    });
    $(".tens_zz_big").on("mouseout",function(){
    	$(this).find(".tens_zz").addClass("hide");
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
                    
<div class="tens_title">
	<a href="javascript:void(0)" id="tobox1" class="hover">2018年郑州经济技术开发区十个重大产业项目服务部</a>
	<a href="javascript:void(0)" id="tobox2" >2018年郑州经济技术开发区十类重大工程指挥部</a>
</div>
<div class="tens" id="box1">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens1.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：樊福太 师淑君</span>
					<span class="tens_zz_wz">责任部门：工信局</span>
					<span class="tens_zz_wz">专职服务人员：卢红杰</span>
					<span class="tens_zz_wz">联系电话：15238023434</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=2'); ?>">上汽乘用车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens2.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：郭连喜</span>
					<span class="tens_zz_wz">责任部门：物流园区综合办</span>
					<span class="tens_zz_wz">专职服务人员：王广清</span>
					<span class="tens_zz_wz">联系电话：13623830080</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=3'); ?>">宇通整车基地项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens3.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：杨光</span>
					<span class="tens_zz_wz">责任部门：物流园区发改局</span>
					<span class="tens_zz_wz">专职服务人员：胡凤玲</span>
					<span class="tens_zz_wz">联系电话：18838210966</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=4'); ?>">京东亚洲一号项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens4.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：孙兵</span>
					<span class="tens_zz_wz">责任部门：经发局</span>
					<span class="tens_zz_wz">专职服务人员：于万和</span>
					<span class="tens_zz_wz">联系电话：13703989319</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=5'); ?>">中铁高端职能化装备产业园项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens5.png" width="268" >
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：付田军</span>
					<span class="tens_zz_wz">联系电话：13384025075</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=6'); ?>">海尔创新产业园项目服务部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens6.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：师淑君</span>
					<span class="tens_zz_wz">责任部门：科技局</span>
					<span class="tens_zz_wz">专职服务人员：张延永</span>
					<span class="tens_zz_wz">联系电话：13027702385</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=7'); ?>">科技创新载体项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens7.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：刘洋</span>
					<span class="tens_zz_wz">责任部门：新兴局</span>
					<span class="tens_zz_wz">专职服务人员：蒋桂勇</span>
					<span class="tens_zz_wz">联系电话：13838108702</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=8'); ?>">EWTO核心功能集聚区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens8.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：崔巍</span>
					<span class="tens_zz_wz">责任部门：出口加工区综合管理局</span>
					<span class="tens_zz_wz">专职服务人员：李建河</span>
					<span class="tens_zz_wz">联系电话：13613823386</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=9'); ?>">经开综保区B区项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens9.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：张广明</span>
					<span class="tens_zz_wz">联系电话：13700858366</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=10'); ?>">冷链物流项目服务部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens10.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：商务局</span>
					<span class="tens_zz_wz">专职服务人员：刘永梅</span>
					<span class="tens_zz_wz">联系电话：13937181023</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=11'); ?>">医药及医疗器械项目服务部</a>
		</p>
	</div>
</div>
<div class="tens hide" id="box2">
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens11.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：新城办</span>
					<span class="tens_zz_wz">专职服务人员：郑昱</span>
					<span class="tens_zz_wz">联系电话：13673625600</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=12'); ?>">安置房建设工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens12.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：京杭办事处</span>
					<span class="tens_zz_wz">专职服务人员：王志强</span>
					<span class="tens_zz_wz">联系电话：18703850369</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=13'); ?>">村庄征迁工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens13.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：胡建利</span>
					<span class="tens_zz_wz">联系电话：15238017358</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=14'); ?>">骨干路网工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens14.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：守金力</span>
					<span class="tens_zz_wz">联系电话：15225176161</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=15'); ?>">城区道路工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens15.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：马良</span>
					<span class="tens_zz_wz">责任部门：建设局</span>
					<span class="tens_zz_wz">专职服务人员：王培友</span>
					<span class="tens_zz_wz">联系电话：15890096660</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=16'); ?>">电力设施工程指挥部</a>
		</p>
	</div>
	<div class="tens_first">
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens16.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：教文体局</span>
					<span class="tens_zz_wz">专职服务人员：乔建涛</span>
					<span class="tens_zz_wz">联系电话：13525503093</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=17'); ?>">教育文化工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens17.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：李国立</span>
					<span class="tens_zz_wz">责任部门：社区局</span>
					<span class="tens_zz_wz">专职服务人员：苏振馨</span>
					<span class="tens_zz_wz">联系电话：13653840901</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=18'); ?>">医疗卫生设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens18.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：任永洋</span>
					<span class="tens_zz_wz">联系电话：15837121516</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=19'); ?>">配套设施工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens19.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王宏伟</span>
					<span class="tens_zz_wz">责任部门：农经委</span>
					<span class="tens_zz_wz">专职服务人员：刘陆锋</span>
					<span class="tens_zz_wz">联系电话：15937107944</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=20'); ?>">生态水系工程指挥部</a>
		</p>
		<p>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>" class="tens_zz_big">
				<img src="/hisiphp/hisiphp/static/admin/image/tens20.png" width="268">
				<span class="tens_zz hide">
					<span class="tens_zz_wz">指挥长：王义民</span>
					<span class="tens_zz_wz">责任部门：城管局</span>
					<span class="tens_zz_wz">专职服务人员：张新法</span>
					<span class="tens_zz_wz">联系电话：13837168878</span>
				</span>
			</a>
			<a href="<?php echo url('admin/project/statis?type=2&isten=1&tens=21'); ?>">绿化景观工程指挥部</a>
		</p>
	</div>
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
layui.use(['jquery'], function() {
    var $ = layui.jquery;
    $("#tobox1").on("click",function(){
    	$("#tobox1").addClass("hover");
    	$("#tobox2").removeClass("hover");
    	$("#box1").removeClass("hide");
    	$("#box2").addClass("hide");

    });

    $("#tobox2").on("click",function(){
    	$("#tobox2").addClass("hover");
    	$("#tobox1").removeClass("hover");
    	$("#box2").removeClass("hide");
    	$("#box1").addClass("hide");

    });

    $(".tens_zz_big").on("mouseover",function(){
    	$(this).find(".tens_zz").removeClass("hide");
    });
    $(".tens_zz_big").on("mouseout",function(){
    	$(this).find(".tens_zz").addClass("hide");
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