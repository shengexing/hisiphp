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

class Index extends Admin
{
    /**
     * 首页
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function index()
    {
        $login = session('admin_user');
        if ($login['role_id'] == 5) {
           
        } else if ( $login['role_id'] == 3 ) {
            $company =  db("project_company")->where("uid", $login['uid'])->find();
            $this->assign('company', $company);

            $project = db("project_info")->where("cuser",$login['uid'])
                ->limit(10)
                ->order('recid','desc')
                ->select();
            $this->assign('project', $project);


        } else if ( $login['role_id'] == 4 ) {
            $userData = db("admin_user")->where('id', $login['uid'])->find();
            $unit = $userData['unit'];
            if ($unit > 0) {
                $qcnt =  db("project_dynamic")->alias('duna')
                ->join("project_info pinfo","pinfo.recid=duna.proid")
                ->where('pinfo.step >= 50 and duna.status = 1 and duna.unit='.$unit)
                ->count();
                $this->assign("qcnt", $qcnt);
            } else {
                $this->assign("qcnt", 0);
            }
            // $data = db("project_info")
            //     ->where('step>=50')
            //     ->group('punit')
            //     ->field('punit')
            //     ->select();
            // $this->assign('data', $data);
            // $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
        } else if ($login['role_id'] == 6 ) {
            $userData = db("admin_user")->where('id', $login['uid'])->find();
            $this->assign('stype', $userData['stype']);
        } else {
            $this->assign('dcnt', 0);
            $this->assign('dynamic', array());
            $this->assign('pcnt', 0);
            $this->assign('project', array());
        }
        return $this->fetch();


        // if ( $login['role_id'] == 3 ) {
        //     header("Location: ".url('project/generateditem'));
        //     exit;
        // } else if ($login['role_id'] == 5) {
        //     header("Location: ".url('prouser/listuser'));
        //     exit;
        // } else {
            // $user = db("admin_user")->where("id", $login['uid'])->find();
            // $logout_time = $user['logout_time'];
            // $logout_time = 0;
            

            // $pcnt = db("project_info")->alias('pinfo')
            //         ->join("project_manage pmanage","pinfo.recid=pmanage.proid")
            //         ->where('pinfo.step != 90 and pinfo.utime >= "'. date("Y-m-d H:i:s",$logout_time) .'" and pmanage.userid='.$login['uid'])
            //         ->count();
            // if ( $pcnt > 0 ) {
            //     $project = db("project_info")->alias('pinfo')
            //         ->join("project_manage pmanage","pinfo.recid=pmanage.proid")
            //         ->where('pinfo.step != 90 and pinfo.utime >= "'. date("Y-m-d H:i:s",$logout_time) .'" and pmanage.userid='.$login['uid'])
            //         ->order('pinfo.recid','desc')
            //         ->field('pinfo.step,pinfo.recid,pinfo.title')
            //         ->order('pinfo.recid asc')
            //         ->limit(10)
            //         ->select();
            //     } else {
            //         $project = array();
            //     }
            // $this->assign('pcnt', $pcnt);
            // $this->assign('project', $project);

            // $dcnt = db("project_info")->alias('pinfo')
            //         ->join("project_manage pmanage","pinfo.recid=pmanage.proid")
            //         ->join("project_dynamic pdynamic","pinfo.recid=pdynamic.proid")
            //         ->where('pinfo.step = 90 and pdynamic.ctime >= "'. date("Y-m-d H:i:s",$logout_time) .'" and pmanage.userid='.$login['uid'])
            //         ->count();
            // if ( $dcnt > 0 ) {
            //     $dynamic = db("project_info")->alias('pinfo')
            //         ->join("project_manage pmanage","pinfo.recid=pmanage.proid")
            //         ->join("project_dynamic pdynamic","pinfo.recid=pdynamic.proid")
            //         ->where('pinfo.step = 90 and pdynamic.ctime >= "'. date("Y-m-d H:i:s",$logout_time) .'" and pmanage.userid='.$login['uid'])
            //         ->field('pinfo.step,pinfo.recid,pinfo.title')
            //         ->order('pdynamic.ctime desc')
            //         ->group('pinfo.recid')
            //         ->limit(10)
            //         ->select();
            //     } else {
            //         $dynamic = array();
            //     }

           
        // }
    }

    /**
     * 欢迎首页
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function welcome()
    {
        return $this->fetch('index');
    }

    /**
     * 清理缓存
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function clear()
    {
        if (Dir::delDir(RUNTIME_PATH) === false) {
            return $this->error('缓存清理失败！');
        }
        return $this->success('缓存清理成功！');
    }
}
