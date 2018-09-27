<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\model\AdminUser as UserModel;
use app\common\util\Dir;
use think\db; //必须引用

/**
 * 后台默认首页控制器
 * @package app\admin\controller
 */

class Prouser extends Admin
{
    /**
     * 首页
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function listuser()
    {
        $login = session('admin_user');
        $user  = db("admin_user")->where("id",$login['uid'])->find();
        $type = input('param.type') ? intval(input('param.type')) : 0;
        $where = 'pinfo.dunit='.$user['unit'];
        if ( $type == 1 ) {
            $where .= " and pinfo.step < 40";
        } else if ( $type == 2 ) {
            $where .= " and pinfo.step = 40";
        } else if ( $type == 3 ) {
            $where .= " and pinfo.step = 40 and pinfo.isimportant > 1";
        } else if ( $type == 4 ) {
            $where .= " and pinfo.step = 40 and pinfo.isten = 1";
        } else if ( $type == 11) {
            $where .= " and pinfo.step >= 60";
        } else if ( $type == 12) {
            $where .= " and pinfo.step = 50";
        } else if ( $type == 13) {
            $where .= " and pinfo.step >= 50 and pinfo.isimportant > 1 and importantexam = 1";
        } else if ( $type == 14) {
            $where .= " and pinfo.step >= 50 and pinfo.isten = 1 and tenexam = 1";
        }
        $data = db("project_info")->alias('pinfo')
                ->join("admin_user puser","pinfo.cuser=puser.id")
                ->where($where)
                ->order('pinfo.recid','desc')
                ->field('puser.*,pinfo.title,pinfo.step,pinfo.recid as proid')
                ->paginate();
        $pages = $data->render();
        $this->assign('data', $data);
        $this->assign('pages', $pages);
        if ( $type <= 10 ) {
            // $this->assign('leftmenu', 51);    
            $this->assign('leftmenu', 0);
        } else {
            $this->assign('leftmenu', 52);
        }
       
        $this->assign('type', $type);
        return $this->fetch();
    }

    public function adduser()
    {   
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $login = session('admin_user');
            $username = $this->pinyin(mb_substr($data['projectname'], 0, 6, 'utf-8'), true).date('is');

            $userdata = array(
                                'username' => $username,
                                'nick' => $data['projectname'],
                                'password' => $username,
                                'passwd' => $username,
                                'email' => '',
                                'mobile' => '',
                                'status' => 1
                            );
            // 验证
            $projectname = $data['projectname'];
            unset($data['projectname']);
            $result = $this->validate($userdata, 'AdminUser');
            if($result !== true) {
                return $this->error($result);
            }
            
            $login = session('admin_user');
            $cuserData = db("admin_user")->where("id",$login['uid'])->find();
            $userdata['last_login_ip'] = '';
            $userdata['role_id'] = 3;
            $userdata['cuser'] = $login['uid'];
            $userdata['auth'] = '';
            if (UserModel::create($userdata)) {
                return $this->success('企业账户分配成功,管理用户'.$userdata['username'],url('prouser/listuser'));
            } else {
                return $this->error('企业账户分配失败');
            }
        }
        return $this->fetch();
    }

    

    
}
