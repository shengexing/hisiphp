<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.HisiPHP.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\admin\controller;
/**
 * 附表管理控制器
 * @package app\admin\controller
 */
class Dict extends Admin
{
    private $_dictTable = array(
                                // 1 => array('tablename'=>'dict_schedule','title'=>'项目进度','type'=>1),
                                1 => array('tablename'=>'dict_unit','title'=>'所属单位','type'=>1),
                                // 3 => array('tablename'=>'dict_department','title'=>'科室名称','type'=>1),
                                // 4 => array('tablename'=>'dict_upost','title'=>'职务','type'=>1),
                                2 => array('tablename'=>'dict_projecttype','title'=>'项目类别','type'=>1),
                                3 => array('tablename'=>'dict_projectlevel','title'=>'项目级别','type'=>1),
                                4 => array('tablename'=>'dict_capial','title'=>'资金类型','type'=>5),
                                5 => array('tablename'=>'dict_industry1','title'=>'产业类型','type'=>1),
                                6 => array('tablename'=>'dict_industry2','title'=>'产业二级类型','type'=>2,'pid'=>5),
                                7 => array('tablename'=>'dict_industry3','title'=>'产业三级类型','type'=>2,'pid'=>6),
                                8 => array('tablename'=>'dict_exam','title'=>'审批手续','type'=>6),
                                // 8 => array('tablename'=>'dict_examstatus','title'=>'审批情况','type'=>1),
                                // 9=> array('tablename'=>'dict_dynamic','title'=>'动态审批类型','type'=>1),
                                9 => array('tablename'=>'dict_tens','title'=>'双十项目','type'=>4),
                                10 => array('tablename'=>'dict_xiaqu','title'=>'辖区办事处','type'=>1),
                                11 => array('tablename'=>'dict_xianchang','title'=>'现场问题分类','type'=>1),
                            );
    // 附表列表
    public function index()
    {
        $this->assign('dicttable', $this->_dictTable);
        return $this->fetch();
    }

    // 附表详情
    public function detail()
    {
        $dict = input('param.dict') ? intval(input('param.dict')) : 0;
        if ( $dict and array_key_exists($dict, $this->_dictTable) ) {
            $tableData = $this->_dictTable[$dict];
            $data = db($tableData['tablename'])
                    ->order('recid','desc')
                    ->paginate();
            $pages = $data->render();
            if($tableData['type'] == 2) {
                $ptableData = $this->_dictTable[$tableData['pid']];
                $pdata = json_decode(cache('dict_'.$ptableData['tablename']),true);
                $this->assign('pdata', $pdata);
            }
            $this->assign('dict', $dict);
            $this->assign('title', $tableData['title']);
            $this->assign('type', $tableData['type']);
            $this->assign('data', $data);
            $this->assign('pages', $pages);
            return $this->fetch();
        } else {
            return $this->error('没有该附表信息', url('dict/index'));
        }
    }

    // 添加附表信息
    public function add()
    {
        $dict = input('param.dict') ? intval(input('param.dict')) : 0;
        if ( $dict and array_key_exists($dict, $this->_dictTable) ) {
            $tableData = $this->_dictTable[$dict];
            if ($this->request->isPost()) {
                $data = $this->request->post();
                $data['ctime'] = date("Y-m-d H:i:s");
                $data['utime'] = date("Y-m-d H:i:s");
                $data['status'] = 1;
                $login = session('admin_user');
                $data['cuser'] = $login['uid'];
                unset($data['dict']);
                if ( db($tableData['tablename'])->insert($data) ) {
                     $this->dictCache($dict);
                    return $this->success('附表信息添加成功', url('dict/detail?dict='.$dict));
                } else {
                    return $this->error('附表信息添加失败');
                }
            }

            if($tableData['type'] == 2) {
                $ptableData = $this->_dictTable[$tableData['pid']];
                $pdata = json_decode(cache('dict_'.$ptableData['tablename']),true);
                $this->assign('pdata', $pdata);
            }

            $this->assign('type', $tableData['type']);
            $this->assign('dict', $dict);
            $this->assign('title', $tableData['title']);
            return $this->fetch();
        } else {
            return $this->error('没有该附表信息', url('dict/index'));
        }
    }

    // 修改附表信息
    public function edit()
    {
        $recid = input('param.recid') ? intval(input('param.recid')) : 0;
        $dict = input('param.dict') ? intval(input('param.dict')) : 0;
        if ( $dict and array_key_exists($dict, $this->_dictTable) ) {
            $tableData = $this->_dictTable[$dict];
            if ( $recid > 0 and  $data = db($tableData['tablename'])->where("recid",$recid)->find() ) {
                if ($this->request->isPost()) {
                    $udata = $this->request->post();
                    $udata['utime'] = date("Y-m-d H:i:s");
                    unset($udata['dict']);
                    if ( db($tableData['tablename'])->where("recid",$recid)->update($udata) ) {
                        $this->dictCache($dict);
                        return $this->success('附表信息修改成功', url('dict/detail?dict='.$dict));
                    } else {
                        return $this->error('附表信息修改失败');
                    }
                }

                if($tableData['type'] == 2) {
                    $ptableData = $this->_dictTable[$tableData['pid']];
                    $pdata = json_decode(cache('dict_'.$ptableData['tablename']),true);
                    $this->assign('pdata', $pdata);
                }
                
                $this->assign('type', $tableData['type']);
                $this->assign('data', $data);
                $this->assign('dict', $dict);
                $this->assign('recid', $recid);
                $this->assign('title', $tableData['title']);
                return $this->fetch();
            } else {
                return $this->error('没有该附表信息', url('dict/detail?dict='.$dict));
            }
        } else {
            return $this->error('没有该附表信息', url('dict/index'));
        }
    }

    private function dictCache($dict) {
        if ( $dict and array_key_exists($dict, $this->_dictTable) ) {
            $tableData = $this->_dictTable[$dict];
            if ( $tableData['type'] == 5 or $tableData['type'] == 6 ) {
                 $data = db($tableData['tablename'])->order('sorder asc')->select();
            } else {
                 $data = db($tableData['tablename'])->select();     
            }
           
            $cacheData = array();
            foreach( $data AS $key => $val ) {
                $cacheData[$val['recid']] = array(
                                                    'recid' => $val['recid'],
                                                    'title' => $val['title'],
                                                    'status' => $val['status']
                                                );
                if ($tableData['type'] == 2) {
                    $cacheData[$val['recid']]['pid'] = $val['pid'];
                }

                if ($tableData['type'] == 3 or $tableData['type'] == 6) {
                    $cacheData[$val['recid']]['img'] = $val['img'];
                }
                if ($tableData['type'] == 4) {
                    $cacheData[$val['recid']]['type'] = $val['type'];
                }
            }
            cache('dict_'.$tableData['tablename'], json_encode($cacheData));
        }
    }
}
