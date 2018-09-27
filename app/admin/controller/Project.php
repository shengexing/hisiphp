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
use think\db;
use think\Session; //必须引用

/**
 * 后台默认首页控制器
 * @package app\admin\controller
 */

class Project extends Admin
{

    private $_schedule = array(
                                1 => '前期',
                                2 => '新开',
                                3 => '新开，续建（竣工）',
                                4 => '续建',
                                5 => '续建（竣工）',
                            );
    private $_examStatus = array(
                                1 => '未提交',
                                2 => '进行中',
                                3 => '已完成'
                            );

    private $_isImportant = array(
                                1 => '否',
                                2 => '省重点项目',
                                3 => '市重点项目',
                                4 => '省、市重点项目'
                            );

    private $_lastExam = array(
                                1 => '国家级',
                                2 => '省级',
                                3 => '市级',
                                4 => '区级'
                            );

    private $_dynaType = array(
                                1 => '现场',
                                2 => '手续',
                                3 => '其他',
                            );
    /**
     * 首页
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function index()
    {
        if (cookie('hisi_iframe')) {
            $this->view->engine->layout(false);
            return $this->fetch('iframe');
        } else {
            return $this->fetch();
        }
    }

    public function company()
    {
        $login = session('admin_user');
        $data = db("project_company")->where("uid", $login['uid'])->find();
        if ($this->request->isPost()) {
            $in = $this->request->post();
            if (!$data) {
                $in['ctime'] = date("Y-m-d H:i:s");
                $in['uid'] = $login['uid'];
                db("project_company")->insert($in);
            } else {
                $in['utime'] = date("Y-m-d H:i:s");
                $in['status'] = 99;
                db("project_company")->where("uid", $login['uid'])->update($in);
            }
            return $this->success('企业基本信息完善成功', url('index/index'));
        }

        if ( !$data ) {
            $data = array();
        }

        $this->assign('data', $data);
        return $this->fetch();
    }

    public function manage()
    {
        $login = session('admin_user');
        $data = db("project_info")->where("cuser",$login['uid'])
                ->order('recid','desc')
                ->paginate();
        $pages = $data->render();
        $this->assign('data', $data);
        return $this->fetch();
    }

    /**
     * 创建项目
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function generatedItem()
    {
        $login = session('admin_user');

        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        //增加允许提交时间显示
        $itime = date('Y',time());
        $ptime = date('Y-m-d');
        $ltime = db("project_limit")->where('ltime',$itime)->find();
        $limitTime = array(
            'stime'=>$ltime['stime'],
            'etime'=>$ltime['etime'],
            'ptime'=>$ptime
        );
        if ( $proid > 0 ) {
            $project = db("project_info")->where('recid', $proid)->find();
        } else {
            $project = array(
                            'xiaqu' => 0,
                            'recid' => 0,
                            'step' => 0,
                            'dunit' => 0
                        );
        }


        if ($this->request->isPost()) {
            $data = $this->request->post();
            $data['utime'] = date("Y-m-d H:i:s");
            $data['cyear'] = date("Y");
            if (isset($data['isten']) and $data['isten'] == 0) {
                $data['tentype'] = 0;
            }
            if( $project['step'] == 0 ) {
                $data['step'] = 10;
            }  
            unset($data['proid']); 
            if ( !isset($data['industry1']) ) {
                $data['industry1'] = 0;
            }   
            if ( !isset($data['industry2']) ) {
                $data['industry2'] = 0;
            }   
            if ( !isset($data['industry3']) ) {
                $data['industry3'] = 0;
            }

            if ( $project['recid'] > 0 ) {

                db("project_info")->where("recid",$project['recid'])->update($data);
            }  else {
                $data['cuser'] = $login['uid'];
                $data['ctime'] = date("Y-m-d H:i:s");
                $result = db("project_info")->insert($data);
                $project = db("project_info")->where("title",$data['title'])->order('recid', 'desc')->find();
            }       
            return $this->success('基本信息填写成功', url('project/builditem?proid='.$project['recid']));
        }
       
        $editpar = 0;
        if ( ADMIN_ROLE == 3 and isset($project['step']) and  $project['step'] <= 30 ) { //企业申报
            $editpar = 1;
            if ($project['step'] >= 30) {
                $this->assign('leftmenu', 1);
            }
        }

        if ( ADMIN_ROLE == 5 and $project['step'] == 40 ) { //分管部门处理信息
            $editpar = 1;
            $this->assign('leftmenu', 1);
        }

        if ( ADMIN_ROLE == 4 and $project['step'] == 50 ) { //政府职能部门
            $editpar = 1;
            $this->assign('leftmenu', 1);
        }

        $this->assign('proid', $proid);
        $this->assign('unitData', json_decode(cache('dict_dict_unit'), true));
        $this->assign('editpar', $editpar);
        $this->assign('project', $project);
        $this->assign('projectlevel', json_decode(cache('dict_dict_projectlevel'), true));
        $this->assign('productType', json_decode(cache('dict_dict_projecttype'), true));
        $this->assign('schedule', $this->_schedule);
        $this->assign('IndustryType1', json_decode(cache('dict_dict_industry1'), true));
        $this->assign('IndustryType2', json_decode(cache('dict_dict_industry2'), true));
        $this->assign('IndustryType3', json_decode(cache('dict_dict_industry3'), true));
        $this->assign('Dictxiaqu', json_decode(cache('dict_dict_xiaqu'), true));
        $this->assign('limitTime',$limitTime);//增加允许提交时间显示
        return $this->fetch();
    }

    public function tens() {
         return $this->fetch();
    }

    // 项目列表
    public function listItem() {
        $this->assign('productType', json_decode(cache('dict_dict_projecttype'), true));
        $this->assign('schedule', json_decode(cache('dict_dict_schedule'), true));
        $this->assign('productLevel', json_decode(cache('dict_dict_projectlevel'), true));

        $login = session('admin_user');
        $data = db("project_info")->alias('pinfo')
                ->join("project_manage pmanage","pinfo.recid=pmanage.proid")
                ->where('pmanage.userid',$login['uid'])
                ->order('pinfo.recid','desc')
                ->field('pinfo.*')
                ->paginate();
        $pages = $data->render();
        $this->assign('data', $data);
        $this->assign('pages', $pages);
        return $this->fetch();
    }

    //企业信息
    public function companyinfo($q = '') {
        $where = "status=99";
        if ($q) {
            $where .= " and company like '%".$q."%'";
        }
        $data = db("project_company")->where($where)->paginate();
        $pages = $data->render();
        $this->assign('data', $data);
        $this->assign('pages', $pages);
        return $this->fetch();

    }

    // 项目列表
    public function statis() {
        $login = session('admin_user');
        // if ( ADMIN_ROLE == 6 ) {
            $userData6 = db("admin_user")->where("id",$login['uid'])->find();
        // }

        $this->assign('stype',$userData6['stype']);

        $postdata = $this->request->post();
        
        $seayear = input('param.year') ? intval(input('param.year')) : date("Y");
        $seamonth = input('param.month') ? intval(input('param.month')) : intval(date("m"));
        $where = "pinfo.step>=60";
        $keyword = input('param.keyword') ? trim(input('param.keyword')) : '';
        $this->assign('keyword', $keyword);
        if ( !empty($keyword) ) {
            $where .= " and pinfo.title like '%$keyword%'";
        }

        $company = input('param.company') ? intval(input('param.company')) : 0;
        if ( $company > 0 ) {
            $compro = db("project_info")->field('recid')->where("cuser=$company and step >= 60")->select();
            if ( count($compro) >= 1 ) {
                $comTemp = array();
                foreach ($compro as $k => $v) {
                    $comTemp[] = $v['recid'];
                }
                $where .= " and pinfo.recid in (". implode(',', $comTemp) .")";
            }
        }

        $type = input('param.type') ? intval(input('param.type')) : 1;
        if ( $type == 1 ) {
            $where .= " and pinfo.isimportant > 1 and importantexam = 1";
            $isimportant = isset($postdata['isimportant']) ? $postdata['isimportant'] : array();
            if ( count($isimportant) > 0 ) {
                $where .= " and pinfo.isimportant in (". implode(",",$isimportant) .")";
            }
            $this->assign('isimportant', $isimportant);    
        }

        if ( $type == 2 ) {
            $where .= " and pinfo.isten = 1 and tenexam = 1";
            $tentype = isset($postdata['tentype']) ? $postdata['tentype'] : array();
            $tens = input('param.tens') ? intval(input('param.tens')) : 0;
            if ( $tens > 0 ) {
                $where .= " and pinfo.tentype = $tens";
            }
            if ( count($tentype) > 0 ) {
                $where .= " and pinfo.tentype in (". implode(",", $tentype) .")";
            }

         
            $tenarr = json_decode(cache('dict_dict_tens'), true);
            $tenarr1 = array();
            $tenarr2 = array();
            $tentype1 = 0;
            $tentype2 = 0;
            foreach($tenarr as $k=>$v) {
                $v['id'] = $k;
                if ( $v['type'] == 1 ) {
                    $tenarr1[] = $v;
                    if (in_array($k, $tentype)) {
                        $tentype1 = 1;  
                    }
                }

                if ( $v['type'] == 2 ) {
                    $tenarr2[] = $v;
                    if (in_array($k, $tentype)) {
                        $tentype2 = 1;  
                    }
                }
            }

            $this->assign('tentype1', $tentype1);
            $this->assign('tentype2', $tentype2);
            $this->assign('tenarr1', $tenarr1);
            $this->assign('tenarr2', $tenarr2);
            $this->assign('tenarr', $tenarr);

            $this->assign('tentype', $tentype);
        }

        if ( $type == 4 ) {
            $fgdata = isset($postdata['fenguan']) ? $postdata['fenguan'] : array();
            $punit = input('param.punit') ? intval(input('param.punit')) : 0;
            if ($punit > 0) {
                $fgdata[] = $punit;
            }
            if ( count($fgdata) > 0 ) {
                $where .= " and pinfo.dunit in (". implode(",",$fgdata) .")";
            }
            $fenguan = db("project_info")->where('dunit>0')->field('dunit')->group('dunit')->select();
            $this->assign('fenguan', $fenguan);
            $this->assign('fgdata', $fgdata);
            $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
        }

        if ( $type == 5 ) {
            
            $wspdata = isset($postdata['shenpi']) ? $postdata['shenpi'] : array();
            $sp = input('param.sp') ? intval(input('param.sp')) : 0;
            if ( $sp > 0 ) {
                $wspdata[] = $sp;
            }
            $swhere = 'duna.status != 0 and pinfo.step >= 60 and duna.unit is not null';
            if ( count($wspdata) > 0 ) {
                $twhere = array();
                foreach($wspdata as $k=>$v) {
                    $twhere[] = "duna.unit like '%$v%'";
                }
                if ( count($twhere) > 0 ) {
                    $swhere .= " and (". implode(" or ", $twhere) .")";
                } 
            }
            if ( ADMIN_ROLE == 6 ) {
                $swhere .= " and duna.unit like '%".$userData6['unit']."%'";
            }
            $stmp = db("project_dynamic")->alias('duna')
                    ->join("project_info pinfo","pinfo.recid=duna.proid")
                    ->where($swhere)
                    ->group("duna.proid")
                    ->field('duna.proid,count(*) as cnt')
                    ->select();

            $shenpincnt = array();
            $shenpisea = array();
            foreach( $stmp as $k=>$v ) {
                $shenpincnt[$v['proid']] = $v['cnt'];
                $shenpisea[] = $v['proid']; 
            }
            if ( count($shenpisea) > 0 ) {
                $where .= " and pinfo.recid in (". implode(",", $shenpisea) .")";
            } else {
                $where .= " and pinfo.recid = 0";
            }

            $spData = db("admin_user")->where("role_id=6 and stype = 2")->field('unit,nick')->select();
            
            $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
            $this->assign('spData', $spData);
            $this->assign('shenpincnt', $shenpincnt);
            $this->assign('wspdata', $wspdata);
        }

        if ( $type == 6 ) {
            $xq = input('param.xq') ? intval(input('param.xq')) : 0;
            $xiaqu = isset($postdata['xiaqu']) ? $postdata['xiaqu'] : array();
            if ($xq > 0) {
                $xiaqu[] = $xq;
            }

            if ( ADMIN_ROLE == 6 ) {
                if( !empty($userData6['xiaqu']) and intval($userData6['xiaqu']) ) {
                    $xiaqu[] = intval($userData6['xiaqu']);
                } else {
                    $xiaqu[] = 9999;
                }
            }

            if ( count($xiaqu) > 0 ) {
                $where .= " and pinfo.xiaqu in (". implode(",", $xiaqu) .")";
            }
            $this->assign('xiaqu', $xiaqu);
            $this->assign('Dictxiaqu', json_decode(cache('dict_dict_xiaqu'), true));
        }

        $this->assign('skipurl', url('project/statis?type='.$type));


        $excel = input('param.excel') ? intval(input('param.excel')) : 0;
    
        if ( $excel == 1 ) {
            $tmp_excelData =  db("project_info")->alias('pinfo')
                            ->where($where)
                            ->field('pinfo.recid')
                            ->order('pinfo.recid','desc')
                            ->select();
            $excelData = array();
            foreach ($tmp_excelData as $k => $v) {
                $excelData[] = $v['recid'];
            }
            $this->excelout($excelData);
        }
        


        $data = db("project_info")->alias('pinfo')
                ->where($where)
                ->field('pinfo.*')
                ->order('pinfo.recid','desc')
                ->paginate();

        $recids = array();
        foreach($data as $k=>$v) {
            $recids[] = $v['recid'];
        }
        $capitionArr = array();
        if ( count($recids) > 0 ) {
            $capition = db("project_mcaption")->where("ctype in (1,2) and cyear='".$seayear."' and cmonth = '".$seamonth."' and proid in (". implode(",",$recids) .")")->group('proid')->field('proid')->select();   
            foreach ($capition as $k => $v) {
                $capitionArr[] = $v['proid'];
            }
        }
        $pages = $data->render();
        $this->assign('data', $data);
        $this->assign('capitionArr', $capitionArr);
        $this->assign('pages', $pages);
        $this->assign('type', $type);
        $this->assign('seayear', $seayear);
        $this->assign('seamonth', $seamonth);
        $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
        $years = array();
        for($i=date("Y")-3;$i<=date('Y');$i++) {
            $years[] = $i;
        }
        $this->assign('years', $years);  


        $this->assign('isImportant', $this->_isImportant);

        return $this->fetch();
    }

    private function excelout( $data ) {
         //导出
        $path = dirname(__FILE__); //找到当前脚本所在路径
        vendor("PHPExcel.PHPExcel.PHPExcel");
        vendor("PHPExcel.PHPExcel.Writer.IWriter");
        vendor("PHPExcel.PHPExcel.Writer.Abstract");
        vendor("PHPExcel.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);

        $excelData = array();
        if ( count($data) > 0 ) {
            $project = db("project_info")->where("recid in (". implode(',', $data) .")")->select();

            $productType = json_decode(cache('dict_dict_projecttype'), true);
            $IndustryType1 = json_decode(cache('dict_dict_industry1'), true);
            $IndustryType2 = json_decode(cache('dict_dict_industry2'), true);
            $IndustryType3 = json_decode(cache('dict_dict_industry3'), true);
  
            $excelId = array();
            foreach( $project as $k => $v ) {
                $excelData[$v['recid']] = array(
                                                    'title' => $v['title'],
                                                    'ptype' => $productType[$v['ptype']]['title'],
                                                    'industry1' => key_exists($v['industry1'], $IndustryType1) ? $IndustryType1[$v['industry1']]['title'] : '',
                                                    'industry2' => key_exists($v['industry2'], $IndustryType2) ? $IndustryType2[$v['industry2']]['title'] : '',
                                                    'industry3' => key_exists($v['industry3'], $IndustryType3) ? $IndustryType3[$v['industry3']]['title'] : '',
                                                    'schedule' =>  key_exists($v['schedule'], $this->_schedule) ? $this->_schedule[$v['schedule']] : '',
                                                    'sdate' => $v['sdate'],
                                                    'edate' => $v['edate'],
                                                    'amount' => $v['amount'] ,
                                                    'eamount' => $v['eamount'],
                                                    'notes' => '',
                                                    'capition' => 0,
                                                    'capitionTotal' => 0,
                                                    'Lastcapition' => 0,
                                                    'xingxiang' => ''
                                                );
                $excelId[] = $v['recid'];
            }

            if ( count($excelId) > 0 ) {
                $notes = db("project_notes")->where("proid in (". implode(',', $excelId) .")")->select();
                foreach($notes as $k=>$v) {
                    $tmp_notes = '';
                    $tmp_notes = '占地面积：' . $v['floor_area'] . '(亩)</br>';
                    $tmp_notes .= '总建筑面积：' . $v['build_area'] . '(万平方米)</br>';
                    $tmp_notes .= '主要建设内容：' . $v['significance'] . '</br>';
                    $tmp_notes .= '效益效值：' . $v['effect'];
                    $excelData[$v['proid']]['notes'] = $tmp_notes;
                }

                $capition = db("project_mcaption")->where("ctype = 1 and cyear='".intval(date('Y'))."' and cmonth = '".intval(date("m"))."' and proid in (". implode(',', $excelId) .")")->select();
                foreach( $capition as $k=>$v ) {
                     $excelData[$v['proid']]['capition'] = $v['amount'];
                }

                $capitionTotal = db("project_mcaption")->where("ctype = 1 and cyear='".intval(date('Y'))."' and cmonth <= '".intval(date("m"))."' and proid in (". implode(',', $excelId) .")")->select();
                foreach( $capitionTotal as $k=>$v ) {
                     $excelData[$v['proid']]['capitionTotal'] = $v['amount'];
                }

                $Lastcapition = db("project_mcaption")->where("ctype = 1 and cyear<'".intval(date('Y'))."' and proid in (". implode(',', $excelId) .")")->select();
                foreach( $Lastcapition as $k=>$v ) {
                     $excelData[$v['proid']]['Lastcapition'] = $v['amount'];
                }

                $xingxiang = db("project_progress")->where("proid in (". implode(',', $excelId) .")")->select();
                foreach( $xingxiang as $k=>$v ) {
                     $excelData[$v['proid']]['xingxiang'] = $v['progress'];
                }
            }
        }

        $excelData = array_values($excelData);

        // 设置表头信息
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '项目名称')
        ->setCellValue('B1', '项目类型')
        ->setCellValue('C1', '行业类别一级分类')
        ->setCellValue('D1', '行业类别二级分类')
        ->setCellValue('E1', '行业类别三级分类')
        ->setCellValue('F1', '项目进度')
        ->setCellValue('G1', '建筑总规模')
        ->setCellValue('H1', '起止年限')
        ->setCellValue('I1', '总投资')
        ->setCellValue('J1', '止上年底完成投资')
        ->setCellValue('K1', '当月完成投资')
        ->setCellValue('L1', '年度投资目标')
        ->setCellValue('M1', '当年累计完成投资')
        ->setCellValue('N1', '累计完成投资占年度目标比例(%)')
        ->setCellValue('O1', '形象进度');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/

        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($excelData);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $excelData[$i-2]['title']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $excelData[$i-2]['ptype']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $excelData[$i-2]['industry1']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $excelData[$i-2]['industry2']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $excelData[$i-2]['industry3']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $excelData[$i-2]['schedule']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $excelData[$i-2]['notes']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $excelData[$i-2]['sdate'] . '-' . $excelData[$i-2]['edate']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $excelData[$i-2]['amount'] . '(万元)');
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $excelData[$i-2]['Lastcapition'] . '(万元)');
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $excelData[$i-2]['capition'] . '(万元)');
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $excelData[$i-2]['eamount'] . '(万元)');
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $excelData[$i-2]['capitionTotal'] . '(万元)');
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $excelData[$i-2]['eamount'] > 0 ?  number_format($excelData[$i-2]['capitionTotal']/$excelData[$i-2]['eamount'], 4) . '%' : '0');
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $excelData[$i-2]['xingxiang']);
        }

        
        /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('productaccess');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
            
        header('Content-Disposition: attachment;filename="经开区项目统计-'. date('YmdHis') .'.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
        exit;//必须加上exit否则打开容易报错
    }

    public function examine() {
        $type = input('param.type') ? intval(input('param.type')) : 0;
        $where = "pinfo.step>=50";   
        if( $type == 1 ) {
            $where .= " and pinfo.step=50";
        }
        if( $type == 2 ) {
            $where .= " and pinfo.step>=60 and pinfo.isimportant > 1 and pinfo.importantexam = 0";
        }
        if( $type == 3 ) {
            $where .= " and pinfo.step>=60 and pinfo.isten = 1 and pinfo.tenexam = 0";
            $tenarr = json_decode(cache('dict_dict_tens'), true);
            $this->assign('tenarr', $tenarr);
        }

        if( $type == 11 ) {
            $where .= " and pinfo.step=60";
        }
         if( $type == 12 ) {
            $where .= " and pinfo.step>=60 and pinfo.isimportant > 1 and pinfo.importantexam = 1";
        }
        if( $type == 13 ) {
            $where .= " and pinfo.step>=60 and pinfo.isten = 1 and pinfo.tenexam = 1";
            $tenarr = json_decode(cache('dict_dict_tens'), true);
            $this->assign('tenarr', $tenarr);
        }
        $data = db("project_info")->alias('pinfo')
                ->where($where)
                ->order('recid','desc')
                ->field('pinfo.*')
                ->paginate();
        $pages = $data->render();
        $this->assign('data', $data);
        $this->assign('pages', $pages);
        $this->assign('type', $type);
        if ($type <= 10) {
           $this->assign('leftmenu', 41);
        } else {
            $this->assign('leftmenu', 42);
        }
        
        $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
        return $this->fetch();

    }

    // 完善基本信息
    public function perfectItem() {
        $login = session('admin_user');
        if ( $login['role_id'] == 3 ) {
            $data = db("project_info")->where('cuser', $login['uid'])->find();
            $proid = $data['recid'];
        } else {
            $proid = input('param.proid') ? intval(input('param.proid')) : 0;
            if ( $proid > 0 ) {
                $data = db("project_info")->where('recid', $proid)->find();
            }
        }

        if ($proid > 0 and $data) {
            if ($this->request->isPost()) {
                $rdata = $this->request->post();
                if ( $data['step'] == 10 ) {
                    $rdata['step'] = 20;
                }
                $rdata['utime'] = date("Y-m-d H:i:s", time());
                unset($rdata['proid']);
                if ( db("project_info")->where("recid",$data['recid'])->update($rdata) ) {
                    return $this->success('项目基本信息完善成功', url('project/builditem?proid='.$data['recid']));
                } else {
                    return $this->error('项目基本信息完善失败');
                }
            } else {
                if ( $data['step'] >= 30 ) {
                    $tab_data = [];
                    $tab_data = [
                        ['title' => '基本信息','url'=> 'admin/project/generateditem?proid='.$data['recid']],
                        ['title' => '完善项目信息','url'=> 'admin/project/perfectitem?proid='.$data['recid']],
                        ['title' => '项目明细','url'=> 'admin/project/builditem?proid='.$data['recid']],
                        ['title' => '查看项目信息','url'=> 'admin/project/baseitem?proid='.$data['recid']],
                    ];
                    $this->assign('tab_data', ['menu' => $tab_data, 'current' => 'admin/project/perfectitem?proid='.$data['recid']]);
                    $this->assign('tab_type', 1);
                }
                $editpar = 0;
                if ( ADMIN_ROLE == 3 and $data['step'] <= 30 ) { //企业申报
                    $editpar = 1;
                }

                if ( ADMIN_ROLE == 5 and $data['step'] == 40 ) { //分管部门处理信息
                    $editpar = 1;
                }

                if ( ADMIN_ROLE == 4 and $data['step'] == 50 ) { //政府职能部门
                    $editpar = 1;
                }
                $this->assign('editpar', $editpar);
                $industry1 = json_decode(cache('dict_dict_industry1'), true);
                $industry2 = json_decode(cache('dict_dict_industry2'), true);
                $industry3 = json_decode(cache('dict_dict_industry3'), true);
                $data['industry1'] = $industry1[$data['industry1']]['title'];
                $data['industry2'] = $industry2[$data['industry2']]['title'];
                $data['industry3'] = $industry3[$data['industry3']]['title'];
                $this->assign('data', $data);
                $this->assign('productType', json_decode(cache('dict_dict_projecttype'), true));
                $this->assign('schedule', $this->_schedule);
                $this->assign('productLevel', json_decode(cache('dict_dict_projectlevel'), true));
                $this->assign('capitalType', json_decode(cache('dict_dict_capial'), true));
                return $this->fetch();
            }
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }
    }

    //项目明细 
    public function buildItem() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;


        if ($proid > 0 and  $project = db("project_info")->where('recid', $proid)->find()) {
            $proid = $project['recid'];
            if ($this->request->isPost()) {
                $data = $this->request->post();
                $data['ctime'] = date("Y-m-d H:i:s");
                $data['utime'] = date("Y-m-d H:i:s");
                $login = session('admin_user');
                $data['cuser'] = $login['uid'];
                foreach($data['capition'] as $k=>$v) {

                    if ( isset($v) and !empty($v) and intval($v) > 0 ) {
                        //资金明细
                        if ( db("project_capital")->where("proid=$proid and ctype=".$data['capitiontype'][$k])->find() ) {
                            $uData = array(
                                        'amount' => $v,
                                        'utime' => date("Y-m-d H:i:s")
                                    );
                            db("project_capital")->where("proid=$proid and ctype=".$data['capitiontype'][$k])->update($uData);
                        } else {
                            $cData = array(
                                        'ctype' => $data['capitiontype'][$k],
                                        'proid' => $proid,
                                        'amount' => $v,
                                        'ctime' => date("Y-m-d H:i:s"),
                                        'utime' => date("Y-m-d H:i:s"),
                                        'cuser' => $login['uid']
                                    );
                            db("project_capital")->insert($cData);
                        }
                    } else {
                        db("project_capital")->where("proid=$proid and ctype=".$data['capitiontype'][$k])->delete();
                    }
                }
                unset($data['capitiontype']);
                unset($data['capition']);

                $data['proid'] = $proid;
                if ( db("project_notes")->insert($data) ) {
                    if ($project['step'] == 10) {
                        db("project_info")->where("recid",$proid)->update(array('step'=>20));
                    }
                    return $this->success('建设内容填写成功', url('project/staff?proid='.$proid));
                } else {
                    return $this->error('建设内容填写失败');
                }
            } else {
                $data = array();
                $capitalcnt = 0;
                if ( $project['step'] >= 20 ) {
                    if ($notes = db("project_notes")->where('proid', $proid)->find()) {
                        $data['floor_area'] = $notes['floor_area'];
                        $data['build_area'] = $notes['build_area'];
                        $data['build_type'] = $notes['build_type'];
                        $data['device'] = $notes['device'];
                        $data['effect'] = $notes['effect'];
                        $data['staffs'] = $notes['staffs'];
                        $data['remarks'] = $notes['remarks'];
                        $data['significance'] = $notes['significance'];
                    }

                    $capital = db("project_capital")->where("proid", $proid)->select();
                    $capitalcnt = count($capital);
                    foreach ($capital as $k => $v) {
                        $data['capital'.$v['ctype']] = $v['amount'];
                    }
                }
                $this->assign('capitalcnt', $capitalcnt);
                $editpar = 0;
                if ( ADMIN_ROLE == 3 and $project['step'] <= 30 ) { //企业申报
                    $editpar = 1;
                    if ( $project['step'] >= 30) {
                        $this->assign('leftmenu', 1);
                    }
                }

                if ( ADMIN_ROLE == 5 and $project['step'] == 40 ) { //分管部门处理信息
                    $editpar = 1;
                    $this->assign('leftmenu', 1);
                }

                if ( ADMIN_ROLE == 4 and $project['step'] == 50 ) { //政府职能部门
                    $editpar = 1;
                    $this->assign('leftmenu', 1);
                }
                $this->assign('editpar', $editpar);

                $data['step'] = $project['step'];
                $this->assign('data', $data);
                $this->assign('proid', $proid);
                $capialType = json_decode(cache('dict_dict_capial'), true);
                foreach($capialType as $k=>$v) {
                    $capialType[$k]['id'] = $k; 
                    if ( isset($data['capital'.$k]) and $data['capital'.$k] > 0 ) {
                        $capialType[$k]['isshow'] = 1; 
                    } else {
                        $capialType[$k]['isshow'] = 0; 
                    }
                    
                }
                $this->assign('capialType', $capialType);
                return $this->fetch();
            }
        } else {
           return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }
    }

    public function staff() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;

        if ($proid > 0 and $project = db("project_info")->where('recid', $proid)->find()) {
            $proid = $project['recid'];
            if ($this->request->isPost()) {
                $data = $this->request->post();
                //施工方相关信息
                
                if ( db("project_staff")->where("conid=$proid and stype=2")->find() ) {
                    $staffData = array(
                                    'realname' => $data['lead_realname'],
                                    'telphone' => $data['lead_mobile'],
                                    'utime' => date("Y-m-d H:i:s"),
                                );
                    db("project_staff")->where("conid=$proid and stype=2")->update($staffData);
                } else {
                    $staffData = array(
                                        'conid' => $proid,
                                        'realname' => $data['lead_realname'],
                                        'telphone' => $data['lead_mobile'],
                                        'ctime' => date("Y-m-d H:i:s"),
                                        'utime' => date("Y-m-d H:i:s"),
                                        'cuser' => $login['uid'],
                                        'stype' => 2
                                    );
                    db("project_staff")->insert($staffData);
                }

                if ( db("project_staff")->where("conid=$proid and stype=3")->find() ) {
                    $staffData = array(
                                    'realname' => $data['liaison_realname'],
                                    'telphone' => $data['liaison_mobile'],
                                    'utime' => date("Y-m-d H:i:s"),
                                );
                    db("project_staff")->where("conid=$proid and stype=3")->update($staffData);
                } else {
                    $staffData = array(
                                        'conid' => $proid,
                                        'realname' => $data['liaison_realname'],
                                        'telphone' => $data['liaison_mobile'],
                                        'ctime' => date("Y-m-d H:i:s"),
                                        'utime' => date("Y-m-d H:i:s"),
                                        'cuser' => $login['uid'],
                                        'stype' => 3
                                    );
                    db("project_staff")->insert($staffData);
                }

                if ( db("project_staff")->where("conid=$proid and stype=4")->find() ) {
                    $staffData = array(
                                    'realname' => $data['unit_realname'],
                                    'telphone' => $data['unit_mobile'],
                                    'utime' => date("Y-m-d H:i:s"),
                                );
                    db("project_staff")->where("conid=$proid and stype=4")->update($staffData);
                } else {
                    $staffData = array(
                                        'conid' => $proid,
                                        'realname' => $data['unit_realname'],
                                        'telphone' => $data['unit_mobile'],
                                        'ctime' => date("Y-m-d H:i:s"),
                                        'utime' => date("Y-m-d H:i:s"),
                                        'cuser' => $login['uid'],
                                        'stype' => 4
                                    );
                    db("project_staff")->insert($staffData);
                }
                if ($project['step'] == 20) {
                    db("project_info")->where("recid",$proid)->update(array('step'=>30));
                }
                return $this->success('项目联系人填写成功', url('project/examlist?proid='.$proid));
            } else {
                $staff = db("project_staff")->where('conid', $proid)->select();
                $data = array();
                $data['step'] = $project['step'];
                foreach ($staff as $k => $v) {
                    if ( $v['stype'] == 1 ) {
                        $data['legal_realname'] = $v['realname'];
                    } else if ( $v['stype'] == 2 ) {
                        $data['lead_realname'] = $v['realname'];
                        $data['lead_mobile'] = $v['telphone'];
                    } else if ( $v['stype'] == 3 ) {
                        $data['liaison_realname'] = $v['realname'];
                        $data['liaison_mobile'] = $v['telphone'];
                    } else if ( $v['stype'] == 4 ) {
                        $data['unit_realname'] = $v['realname'];
                        $data['unit_mobile'] = $v['telphone'];
                    } else {

                    }
                }

                $editpar = 0;
                if ( ADMIN_ROLE == 3 and $project['step'] <= 30 ) { //企业申报
                    $editpar = 1;
                    if ( $project['step'] >= 30 ) {
                        $this->assign('leftmenu', 1);
                    }
                }

                if ( ADMIN_ROLE == 5 and $project['step'] == 40 ) { //分管部门处理信息
                    $editpar = 1;
                    $this->assign('leftmenu', 1);
                }

                if ( ADMIN_ROLE == 4 and $project['step'] == 50 ) { //政府职能部门
                    $editpar = 1;
                    $this->assign('leftmenu', 1);
                }
                $this->assign('editpar', $editpar);

                $this->assign('proid', $proid);
                $this->assign('data', $data);
                
                return $this->fetch();
            }
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }
    }

    //提交审批
    public function subexam() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;

        if ( $proid > 0 and $data = db("project_info")->where('recid', $proid)->find()) {
            if ($this->request->isPost()) {
                $postData = $this->request->post();
                $itime = date('Y-m-d');//获取当前时间的年月日
                $ltime = date('Y',strtotime($itime));//获取当前年份
                $limitData = db("project_limit")->where('ltime',$ltime)->find();//扩展获取当年设置审核时间
                //$itime > $limitData['stime'] and $itime < $limitData['etime']
                //判断是否在当年设置的时间之内提交，如果不是，不能提交审核
                if ($itime >= $limitData['stime'] and $itime <= $limitData['etime']) {
                    if ($data['step'] == 30) {
                        $saveData = array(
                            'step' => 40,
                            'utime' => date("Y-m-d H:i:s", time())
                        );
                    } else if ($data['step'] == 40) {
                        $saveData = array(
                            'step' => 50,
                            'utime' => date("Y-m-d H:i:s", time())
                        );
                    } else if ($data['step'] == 50) {
                        $saveData = array(
                            'step' => 60,
                            'utime' => date("Y-m-d H:i:s", time())
                        );
                    } else {
                        $saveData = array();
                        $rdata = array(
                            'code' => 99,
                            'msg' => '提交审核失败'
                        );
                    }

                    if (count($saveData) > 0) {
                        db("project_info")->where("recid", $proid)->update($saveData);
                        $rdata = array(
                            'code' => 0,
                            'msg' => '提交审核成功'
                        );
                    }
                }else{
                    return $this->error('未在审核时间之内提交');
                }
                die(json_encode($rdata));
            }

            if ( $data['step'] >= 30 ) {
                $tab_data = [];
                $tab_data = [
                    ['title' => '基本信息','url'=> 'admin/project/generateditem?proid='.$data['recid']],
                    ['title' => '完善项目信息','url'=> 'admin/project/perfectitem?proid='.$data['recid']],
                    ['title' => '项目明细','url'=> 'admin/project/builditem?proid='.$data['recid']],
                    ['title' => '查看项目信息','url'=> 'admin/project/baseitem?proid='.$project['recid']],
                ];
                $this->assign('tab_data', ['menu' => $tab_data, 'current' => 'admin/project/subexam?proid='.$data['recid']]);
                $this->assign('tab_type', 1);
            }
            $this->assign('data', $data);
            $this->assign('proid', $proid);

            $subexam = 0;
            if ( ADMIN_ROLE == 3 and $data['step'] == 30 ) { //企业申报
                $subexam = 1;
            }

            if ( ADMIN_ROLE == 5 and $data['step'] == 40 ) { //主管部门审核
                $subexam = 1;
            }

            if ( ADMIN_ROLE == 4 and $data['step'] == 50 ) { //政府职能部门
                $subexam = 1;
            }
            $this->assign('subexam', $subexam);
            return $this->fetch();
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }
    }

    //项目审批情况
    public function examList() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;

        if ( $proid >0 and $data = db("project_info")->where('recid', $proid)->find()) {
            $examData = db("project_exam")->where('proid', $proid)->select();
            $examDataShow = array();
            foreach ($examData as $k => $v) {
                $examDataShow[$v['ptype']][] = $v;
            }

            $examName = json_decode(cache('dict_dict_exam'), true);
            foreach ($examName as $k => $v) {
                $examName[$k]['cnt'] = isset($examDataShow[$k]) ? count($examDataShow[$k]) : 0;
                if ( $v['status'] == 0 ) {
                    unset($examName[$k]);
                }
            }

            if ( ADMIN_ROLE == 3) { //企业申报
                $editpar = 1;
                $this->assign('leftmenu', 1);
            }

            $editpar = 0;
            if ( ADMIN_ROLE == 3 and $data['step'] <= 30 ) { //企业申报
                $editpar = 1;
            }

            if ( ADMIN_ROLE == 5 and $data['step'] == 40 ) { //分管部门处理信息
                $editpar = 1;
            }

            if ( ADMIN_ROLE == 4 and $data['step'] == 50 ) { //政府职能部门
                $editpar = 1;
            }
            $this->assign('editpar', $editpar);
            $this->assign('examName', $examName);
            $this->assign('examData', $examDataShow);
            $this->assign('examStatus', $this->_examStatus);
            $this->assign('proid', $proid);
            return $this->fetch();
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }
    }

    public function reexamList() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        if ( $proid > 0 ) {
            $data = db("project_info")->where('recid', $proid)->find();
        }

        if ( $proid >0 and $data) {
            $examData = db("project_exam")->where('proid', $proid)->select();
            $examDataShow = array();
            foreach ($examData as $k => $v) {
                $examDataShow[$v['ptype']][] = $v;
            }

            $examName = json_decode(cache('dict_dict_exam'), true);
            foreach ($examName as $k => $v) {
                $examName[$k]['cnt'] = isset($examDataShow[$k]) ? count($examDataShow[$k]) : 0;
                if ( $v['status'] == 0 ) {
                    unset($examName[$k]);
                }
            }

            $editpar = 0;
            if ( ADMIN_ROLE == 3) { //企业申报
                $editpar = 1;
                
            }
            $this->assign('leftmenu', 2);
            $this->assign('editpar', $editpar);
            $this->assign('examName', $examName);
            $this->assign('examData', $examDataShow);
            $this->assign('examStatus', $this->_examStatus);
            $this->assign('proid', $proid);
            return $this->fetch();
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }
    }

    //项目月报情况
    public function mreportList() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        if ( $proid > 0 ) {
            $data = db("project_info")->where('recid', $proid)->find();
        }

        if ( $proid > 0 and $data ) {
            $timeData = array();
            if ( !empty($data['sdate']) and !empty($data['edate']) ) {
                $timeData['cyear'] = date("Y", time());
                $timeData['cmonth'] = intval(date("m", time()));
                if ($capition = db("project_mcaption")->where("ctype in (1,2) and cyear='".$timeData['cyear']."' and cmonth = '".$timeData['cmonth']."' and proid=$proid")->select()) {
                    foreach($capition as $k=>$v) {
                        $timeData['capital'.$v['ctype']] = $v['amount']; 
                    }
                    $this->assign('editpar', 1); 
                } else {
                    $this->assign('editpar', 0); 
                }

                $tdata = db("project_mcaption")->where("ctype in (1,2) and (cyear<'".$timeData['cyear']."' or (cyear='".$timeData['cyear']."' and cmonth < '".$timeData['cmonth']."')) and proid=$proid")->group('ctype')->field('ctype,sum(amount) as amount')->select();
                $timeData['current1'] = 0;
                $timeData['current2'] = 0;
                foreach($tdata as $k=>$v) {
                    if ( $v['ctype'] == 1 ) {
                        $timeData['current1'] = $v['amount'];
                    }

                    if ( $v['ctype'] == 2 ) {
                        $timeData['current2'] = $v['amount'];
                    }
                }

                $tdata = db("project_mcaption")->where("ctype in (1,2) and proid=$proid and cyear<='".$timeData['cyear']."' and cmonth < '".$timeData['cmonth']."'")->group('ctype')->field('ctype,sum(amount) as amount')->select();
                $timeData['total1'] = 0;
                $timeData['total2'] = 0;
                foreach($tdata as $k=>$v) {
                    if ( $v['ctype'] == 1 ) {
                        $timeData['total1'] = $v['amount'];
                    }

                    if ( $v['ctype'] == 2 ) {
                        $timeData['total2'] = $v['amount'];
                    }
                }

                $this->assign('timeData', $timeData);
                $this->assign('skipurl', url('project/mreportlist?proid='.$proid));
                if (ADMIN_ROLE == 3) {
                    $this->assign('editAcc', 1); 
                } else {
                    $this->assign('editAcc', 0); 
                }
                $this->assign('leftmenu', 2); 
                $this->assign('proid', $proid); 
                return $this->fetch();           
            } else {
                return $this->success('请补充项目起止期限后再填写月报',url('project/generateditem?proid='.$data['recid']));
            }
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }      
    }

    public function addmreport() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        if ( $login['role_id'] and $project = db("project_info")->where('recid', $proid)->find() ) {
          
            if ($this->request->isPost()) {
                $proid = $project['recid'];
                $data = $this->request->post();
                $cyear = date("Y");
                $cmonth = intval(date("m"));
                foreach($data['capition'] as $k=>$v) {
                    if ( isset($v) and !empty($v) and intval($v) > 0 ) {
                        //资金明细
                        if ( db("project_mcaption")->where("cyear='$cyear' and cmonth = '$cmonth' and proid=$proid and ctype=".$data['capitiontype'][$k])->find() ) {
                            $uData = array(
                                        'amount' => $v,
                                        'mtime' => date("Y-m-d H:i:s")
                                    );
                            db("project_mcaption")->where("cyear='$cyear' and cmonth = '$cmonth' and proid=$proid and ctype=".$data['capitiontype'][$k])->update($uData);
                        } else {
                            $cData = array(
                                        'ctype' => $data['capitiontype'][$k],
                                        'proid' => $proid,
                                        'amount' => $v,
                                        'cyear' => $cyear,
                                        'cmonth' => $cmonth,
                                        'ctime' => date("Y-m-d H:i:s"),
                                        'mtime' => date("Y-m-d H:i:s"),
                                        'cuser' => $login['uid']
                                    );
                            db("project_mcaption")->insert($cData);
                        }  
                    }
                }
                $this->success('月报数据提交成功', url('project/reexamlist?proid='.$proid."&cyear=$cyear&cmonth=$cmonth"));
            } else {
                $this->error("您暂无权限提交该项目的月报",url('project/manage')); 
            }
        } else {
             $this->error("您暂无权限提交该项目的月报",url('project/manage')); 
        }
    }

    // 发布项目动态信息
    public function dynamic() {
        $login = session('admin_user');
        if ( $login['role_id'] == 3 ) {
            $proid = input('param.proid') ? intval(input('param.proid')) : 0;
            $recid = input('param.recid') ? intval(input('param.recid')) : 0;
           
            $BeginDate =  date('Y-m-01', strtotime(date("Y-m-d")));
            $EndDate = date('Y-m-d', strtotime("$BeginDate +1 month"));
            $dynamic = db("project_dynamic")->where("proid= $proid and recid=$recid")->find();
            if ($this->request->isPost()) {
                $data = $this->request->post();
                if ( isset($data['file']) and count($data['file']) > 0 ) {
                    $data['img'] = json_encode($data['file']);
                    unset($data['file']);
                } else {
                    $data['img'] = '';
                }

                if ( $data['qtype'] == 1 ) {
                    $data['etype'] = $data['xtype'];
                }
                unset($data['xtype']);
                if ( isset($data['qespunit']) ) {
                    if ( count($data['qespunit']) ) {
                        $data['unit'] = implode(",", $data['qespunit']);
                    }
                    unset($data['qespunit']);     
                }

                //unit

                if ( $dynamic ) {
                    $data['utime'] = date("Y-m-d H:i:s");
                    if ( db("project_dynamic")->where("recid=".$dynamic['recid'])->update($data) ) {
                        return $this->success('项目问题提交成功',url('project/dynalist?proid='.$dynamic['proid']));
                    } else {
                        return $this->error('项目问题提交失败',url('project/dynalist?proid='.$dynamic['proid']));
                    }
                } else {
                    $data['proid'] = $proid;
                
                    $data['ctime'] = date("Y-m-d H:i:s");
                    $data['utime'] = date("Y-m-d H:i:s");
                    $data['cuser'] = $login['uid'];
                    if ( db("project_dynamic")->insert($data) ) {
                        return $this->success('项目问题提交成功',url('project/dynalist?proid='.$proid));
                    } else {
                        return $this->error('项目问题提交失败',url('project/dynalist?proid='.$proid));
                    }
                }
            }
            $examUnit = json_decode(cache('dict_dict_unit'), true);
            
            $this->assign('examName', json_decode(cache('dict_dict_exam'), true));
            $this->assign('xianchang', json_decode(cache('dict_dict_xianchang'), true));
            $this->assign('dynamicType', $this->_dynaType);
            $this->assign('proid', $proid);
            $this->assign('recid', $recid);
            if ( $dynamic ) {
                $this->assign('status', $dynamic['status']);
                if ( $dynamic['qtype'] == 1 ) {
                    $dynamic['xtype'] = $dynamic['etype'];
                    $dynamic['etype'] = 0;
                }
                $unitArr = explode(",", $dynamic['unit']);
                $this->assign('showstatus', 1);
            } else {
                $dynamic['qtype'] = 0;
                $this->assign('status', 1);
                $this->assign('showstatus', 0);
                $unitArr = array();
            }
            foreach($examUnit as $k=>$v) {
                if ( in_array($v['recid'], $unitArr) ) {
                    $examUnit[$k]['checked'] = 1;
                } else {
                    $examUnit[$k]['checked'] = 0;
                }
            }
            $this->assign('examUnit', $examUnit);
            $this->assign('dynamic', $dynamic);
            // $images = array();
            // if ( $dynamic ) {
            //     $images = json_decode($dynamic['img']);  
            // }

            // $this->assign('images', $images);
            $this->assign('leftmenu', 2);
            return $this->fetch();
        } else {
            return $this->error('您暂无权限提交项目问题',url('index/index'));
        }   
    }

    public function progress() {
        $login = session('admin_user');
        if ( $login['role_id'] == 3 ) {
            $proid = input('param.proid') ? intval(input('param.proid')) : 0;
            $data = db("project_info")->where('recid', $proid)->find();
            $BeginDate =  date('Y-m-01', strtotime(date("Y-m-d")));
            $EndDate = date('Y-m-d', strtotime("$BeginDate +1 month"));
            $progress = db("project_progress")->where("proid= $proid and ctime >='$BeginDate' and ctime < '$EndDate'")->find();
            if ($this->request->isPost()) {
                $data = $this->request->post();
                if ( $progress ) {
                    $data['utime'] = date("Y-m-d H:i:s");

                    if ( db("project_progress")->where("recid=".$progress['recid'])->update($data) ) {
                        return $this->success('项目形象进度提交成功',url('project/dynalist?proid='.$progress['proid']));
                    } else {
                        return $this->error('项目形象进度提交失败',url('project/dynalist?proid='.$progress['proid']));
                    }
                } else {
                    $data['proid'] = $proid;
                    $data['ctime'] = date("Y-m-d H:i:s");
                    $data['utime'] = date("Y-m-d H:i:s");
                    $data['cuser'] = $login['uid'];
                    if ( db("project_progress")->insert($data) ) {
                        return $this->success('项目形象进度提交成功',url('project/dynalist?proid='.$data['proid']));
                    } else {
                        return $this->error('项目形象进度提交失败',url('project/dynalist?proid='.$data['proid']));
                    }
                }
            }

            $this->assign('proid', $proid);
            if ( $progress ) {
                $this->assign('editpar', 1);
            } else {
                $this->assign('editpar', 0);
            }
            $this->assign('progress', $progress);
            $this->assign('leftmenu', 2);
            return $this->fetch();
        } else {
            return $this->error('您暂无权限提交项目问题',url('index/index'));
        }   
    }

    public function mreport() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        if ( $proid > 0 and $data = db("project_info")->where('recid', $proid)->find() ) {
            $industry1 = json_decode(cache('dict_dict_industry1'), true);
            $industry2 = json_decode(cache('dict_dict_industry2'), true);
            $industry3 = json_decode(cache('dict_dict_industry3'), true);
            $industry = array();
            if ( $data['industry1'] > 0 ) {
               $industry[] = $industry1[$data['industry1']]['title']; 
            }
            if ( $data['industry2'] > 0 ) {
               $industry[] = $industry2[$data['industry2']]['title']; 
            }
            if ( $data['industry3'] > 0 ) {
               $industry[] = $industry3[$data['industry3']]['title']; 
            }  
            $data['industry'] = implode("-", $industry);
            $this->assign('proid', $proid);
     
            $notes = db("project_notes")->where("proid",$proid)->find();
            $notes['lead_realname'] = '';
            $notes['lead_mobile'] = '';
            $notes['liaison_realname'] = '';
            $notes['liaison_mobile'] = '';
            $notes['unit_realname'] = '';
            $notes['unit_mobile'] = '';
            $notes['capital_type'] = '';
            $notes['capital_amount'] = '';

            if ($capital = db("project_capital")->where("proid",$proid)->select()) {
                $this->assign('capitalCnt', count($capital));
                $this->assign('capital', $capital);
            } else {
                $this->assign('capitalCnt', 0);
            }
            // if ($company = db("project_company")->where("proid",$proid)->find()) {
                $staff = db("project_staff")->where("conid",$proid)->select();
                foreach($staff as $k=>$v) {
                    if ( $v['stype'] == 2 ) {
                        $notes['lead_realname'] = $v['realname'];
                        $notes['lead_mobile'] = $v['telphone'];
                    }
                    if ( $v['stype'] == 3 ) {
                         $notes['liaison_realname'] = $v['realname'];
                        $notes['liaison_mobile'] = $v['telphone'];
                    }
                    if ( $v['stype'] == 4 ) {
                         $notes['unit_realname'] = $v['realname'];
                        $notes['unit_mobile'] = $v['telphone'];
                    }
                }
            // }

            $unitData = db("admin_user")->where("id",$data['punit'])->find();
            $this->assign('unitData', $unitData);
            $this->assign('info', $data);

            $cuserData = db("admin_user")->where("id",$data['cuser'])->find();
            $this->assign('cuserData', $cuserData);
            $this->assign('notes', $notes);

            $this->assign('productTens', json_decode(cache('dict_dict_tens'), true));
            $this->assign('productType', json_decode(cache('dict_dict_projecttype'), true));
            $this->assign('schedule', $this->_schedule);
            $this->assign('productLevel', json_decode(cache('dict_dict_projectlevel'), true));
            $this->assign('capitalType', json_decode(cache('dict_dict_capial'), true));

            // 手续完成情况
            $examData = db("project_exam")->where("proid",$proid)->select();
            $examName = json_decode(cache('dict_dict_exam'), true);
            $examShow = array();
            foreach($examData as $k=>$v) {
                $v['examtime'] = date("Y.n.d", strtotime($v['examtime']));
                $examShow[$v['ptype']]['data'][] = $v;
            }

            foreach($examName as $k=>$v) {
                $examShow[$k]['cnt'] = 0;
                $examName[$k]['id'] = $k;
                if ($v['status'] == 1) {
                    if ( isset($examShow[$k]['data']) ) {
                        $examShow[$k]['cnt'] = count($examShow[$k]['data']);
                    }
                } else {
                    unset($examName[$k]);
                }
            }


            $this->assign('examShow', $examShow);
            $this->assign('examName', $examName);
            $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
            $this->assign('dicttens', json_decode(cache('dict_dict_tens'), true));
            $this->assign('examStatus', $this->_examStatus);
            $this->assign('_isImportant', $this->_isImportant);

            $cyear = input('param.cyear') ? intval(input('param.cyear')) : 0;
            $cmonth = input('param.cmonth') ? intval(input('param.cmonth')) : 0;

            $timeData = array();
            if ( !empty($data['sdate']) and !empty($data['edate']) ) {
                $tmpSdate = explode(".", $data['sdate']);
                $tmpEdate = explode(".", $data['edate']);
                $timeData['syear'] = $tmpSdate[0];
                $timeData['smonth'] = $tmpSdate[1];
                $timeData['eyear'] =$tmpEdate[0];
                if ( $tmpEdate[0] >= date("Y") ) {
                    $timeData['eyear'] =date("Y");
                    if ( $tmpEdate[1] >= date("n") ) {
                        $timeData['emonth'] = date("n"); 
                    }
                } else {
                    $timeData['emonth'] = $tmpEdate[1];    
                }
                
                for ($i = $timeData['syear']; $i <= $timeData['eyear']; $i ++) {
                    $timeData['years'][] = $i;
                }

                if ( $cyear > 0 and $cmonth > 0 ) {
                } else {
                    $cyear = date("Y", time());
                    $cmonth = intval(date("m", time()));
                }

                if ( $cyear > $timeData['eyear'] ) {
                    $timeData['cyear'] = $timeData['eyear'];
                    $timeData['cmonth'] = intval($timeData['emonth']); 
                } else if ( $cyear == $timeData['eyear'] and $cmonth > intval($timeData['emonth']) ) {
                    $timeData['cyear'] = $timeData['eyear'];
                    $timeData['cmonth'] = intval($timeData['emonth']); 
                } else if ( $cyear < $timeData['syear'] ) {
                    $timeData['cyear'] = $timeData['syear'];
                    $timeData['cmonth'] = intval($timeData['smonth']);  
                } else if ( $cyear == $timeData['syear'] and $cmonth < intval($timeData['smonth']) ) {
                    $timeData['cyear'] = $timeData['syear'];
                    $timeData['cmonth'] = intval($timeData['smonth']); 
                    $timeData['cmonth'] = intval($cmonth); 
                } else {
                    $timeData['cyear'] = $cyear;
                    $timeData['cmonth'] = intval($cmonth); 
                }

                $timeData['capital1'] = 0; 
                $timeData['capital2'] = 0; 
                if ($capition = db("project_mcaption")->where("ctype in (1,2) and cyear='".$timeData['cyear']."' and cmonth = '".$timeData['cmonth']."' and proid=$proid")->select()) {
                    foreach($capition as $k=>$v) {
                        $timeData['capital'.$v['ctype']] = $v['amount']; 
                    }  
                }

                $tdata = db("project_mcaption")->where("ctype in (1,2) and (cyear<'".$timeData['cyear']."' or (cyear='".$timeData['cyear']."' and cmonth < '".$timeData['cmonth']."')) and proid=$proid")->group('ctype')->field('ctype,sum(amount) as amount')->select();
                $timeData['current1'] = 0;
                $timeData['current2'] = 0;
                foreach($tdata as $k=>$v) {
                    if ( $v['ctype'] == 1 ) {
                        $timeData['current1'] = $v['amount'];
                    } 

                    if ( $v['ctype'] == 2 ) {
                        $timeData['current2'] = $v['amount'];
                    }
                }

                $tdata = db("project_mcaption")->where("ctype in (1,2) and proid=$proid and cyear<='".$timeData['cyear']."' and cmonth < '".$timeData['cmonth']."'")->group('ctype')->field('ctype,sum(amount) as amount')->select();
                $timeData['total1'] = 0;
                $timeData['total2'] = 0;

                foreach($tdata as $k=>$v) {
                    if ( $v['ctype'] == 1 ) {
                        $timeData['total1'] = $v['amount'];
                    }

                    if ( $v['ctype'] == 2 ) {
                        $timeData['total2'] = $v['amount'];
                    }
                }

                $etime = date("Y-m-d H:i:s", mktime(23, 59, 59, $timeData['cmonth'] + 1, 0, $timeData['cyear']));               
                $BeginDate = date("Y-m-d H:i:s", mktime(23, 59, 59, $timeData['cmonth'], 0, $timeData['cyear']));
                $progress = db("project_progress")->where("proid= $proid and ctime >='$BeginDate' and ctime < '$etime'")->find();
                if ( $progress ) {
                    $timeData['progress'] = $progress['progress'];
                } else {
                    $timeData['progress'] = '';
                }
                $this->assign('dicttens', json_decode(cache('dict_dict_tens'), true));
                $this->assign('examStatus', $this->_examStatus);
                $this->assign('_isImportant', $this->_isImportant);
                $this->assign('timeData', $timeData);
                $this->assign('dynaexam', json_decode(cache('dict_dict_exam'), true));
                $this->assign('dynamicType', json_decode(cache('dict_dict_dynamic'), true));
                $dynacnt = db("project_dynamic")->where("proid=$proid and status!=0 and ctime >='$BeginDate' and ctime < '$etime'")->count();
                $this->assign('dynacnt', $dynacnt);
                $this->assign('proid', $proid);
                $this->assign('skipurl', url('project/mreport?proid='.$proid));
                return $this->fetch();           
            } else {
                return $this->success('请补充项目起止期限后再填写月报',url('project/generateditem?proid='.$data['recid']));
            }  
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        } 
    }

    // 所有动态信息
    public function dynalist() {
        $login = session('admin_user');
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        if ( $proid > 0 ) {
            $data = db("project_info")->where('recid', $proid)->find();
        }

    
        if ( $proid > 0 and $data ) {
            $data = $this->request->get();
            $where = "proid=".$proid;
            if (isset($data['q']) and !empty($data['q'])) {
                $where .= " and notes like '%".trim($data['q'])."%'";
            }
            $dynamic = db("project_dynamic")->where($where)->order('recid desc')->paginate();
            $dynamicShow = array();
            foreach($dynamic as $k => &$v) {
                if ( !empty($v['img']) ) {
                    $v['files'] = json_decode($v['img']);  
                } else {
                    $v['files'] = array();
                }
                $dynamicShow[] = $v;
            }

            $pages = $dynamic->render();
            $this->assign('dynamic', $dynamicShow);
            $this->assign('examName', json_decode(cache('dict_dict_exam'), true));
            $this->assign('xianchang', json_decode(cache('dict_dict_xianchang'), true));
            $this->assign('pages', $pages);
            $this->assign('proid', $proid);
            $this->assign('dynamicType', $this->_dynaType);

            if ( ADMIN_ROLE == 3 ) {
                $this->assign('leftmenu', 2);     
            }

            if (ADMIN_ROLE == 3) {
                $this->assign('editAcc', 1); 
            } else {
                $this->assign('editAcc', 0); 
            }
            return $this->fetch();
        } else {
            return $this->success('该用户尚未分配管理项目,请联系管理员确认信息', url('index/index'));
        }
    }

   
    // 添加审批信息
    public function addExam() {
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        $ptype = input('param.ptype') ? intval(input('param.ptype')) : 0;
        $type = input('param.type') ? intval(input('param.type')) : 0;

        $project = db("project_info")->where("recid",$proid)->find();
    
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $data['ctime'] = date("Y-m-d H:i:s");
            $data['utime'] = date("Y-m-d H:i:s");
            if ( isset($data['qespunit']) ) {
                if ( count($data['qespunit']) ) {
                    $data['dunit'] = implode(",", $data['qespunit']);
                }
                unset($data['qespunit']);     
            }
           
            $login = session('admin_user');
            $data['cuser'] = $login['uid'];
            db("project_exam")->insert($data);
            if ( $project['step'] >= 60 ) {
                return $this->success('审批情况提交成功',url('project/reexamlist?proid='.$proid));
            } else {
                return $this->success('审批情况提交成功',url('project/examlist?proid='.$proid));    
            }
            
        } else {
            $examName =  json_decode(cache('dict_dict_exam'), true);
            $this->assign('unitData', json_decode(cache('dict_dict_unit'), true));
            $this->assign('lastexam', $this->_lastExam);
            $this->assign('proid', $proid);
            $this->assign('ptype', $ptype);
            $this->assign('type', $type);
            $this->assign('examName', $examName[$ptype]['title']);
            
            if ( $project['step'] >= 60 ) {
                $this->assign('leftmenu', 2);
            } else {
                $this->assign('leftmenu', 1);    
            }
            
            $this->assign('step', $project['step']);

            
            return $this->fetch();
        }
    }

    // 修改审批信息
    public function editExam() {
        $recid = input('param.recid') ? intval(input('param.recid')) : 0;

        if ( $recid > 0 and $examData = db("project_exam")->where("recid",$recid)->find() ) {
            $project = db("project_info")->where("recid",$examData['proid'])->find();
            if ($this->request->isPost()) {
                $data = $this->request->post();
                $data['utime'] = date("Y-m-d H:i:s");
                if ( isset($data['qespunit']) ) {
                    if ( count($data['qespunit']) ) {
                        $data['dunit'] = implode(",", $data['qespunit']);
                    }
                    unset($data['qespunit']);
                }
                db("project_exam")->where("recid",$recid)->update($data);
                if ( $project['step'] >= 60 ) {
                    return $this->success('审批情况修改成功',url('project/reexamlist?proid='.$examData['proid']));
                } else {
                    return $this->success('审批情况修改成功',url('project/examlist?proid='.$examData['proid']));    
                }
                
            } else {
                $examName =  json_decode(cache('dict_dict_exam'), true);
                $this->assign('unitData', json_decode(cache('dict_dict_unit'), true));
                $this->assign('lastexam', $this->_lastExam);
                $this->assign('proid', $examData['proid']);
                $this->assign('examName', $examName[$examData['ptype']]['title']);
                $this->assign('recid', $recid);
                $this->assign('examData', $examData);
                $this->assign('step', $project['step']);

                $examUnit = json_decode(cache('dict_dict_unit'), true);
                $dunit = explode(",",$examData['dunit']);
                foreach($examUnit as $k=>$v) {
                    if ( in_array($v['recid'], $dunit) ) {
                        $examUnit[$k]['check'] = 1;
                    } else {
                        $examUnit[$k]['check'] = 0;
                    }
                }
                $this->assign('examUnit', $examUnit);

                $login = session('admin_user');
                if ($examData['cuser'] == $login['uid']) {
                    $this->assign('editdata', 1);
                } else {
                    $this->assign('editdata', 0);
                }


                if ( $project['step'] >= 60 ) {
                    $this->assign('leftmenu', 2);
                } else {
                    $this->assign('leftmenu', 1);    
                }
                return $this->fetch();
            }
        }
    }

    // 查看项目信息
    public function baseItem() {
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        if ( $proid > 0 and $data = db("project_info")->where('step >= 30 and recid='.$proid)->find() ) {
            $industry1 = json_decode(cache('dict_dict_industry1'), true);
            $industry2 = json_decode(cache('dict_dict_industry2'), true);
            $industry3 = json_decode(cache('dict_dict_industry3'), true);
            $industry = array();
            if ( $data['industry1'] > 0 ) {
               $industry[] = $industry1[$data['industry1']]['title']; 
            }
            if ( $data['industry2'] > 0 ) {
               $industry[] = $industry2[$data['industry2']]['title']; 
            }
            if ( $data['industry3'] > 0 ) {
               $industry[] = $industry3[$data['industry3']]['title']; 
            }  
            $data['industry'] = implode("-", $industry);
            $this->assign('proid', $proid);
     
            $notes = db("project_notes")->where("proid",$proid)->find();
            $notes['legal_realname'] = '';
            $notes['lead_realname'] = '';
            $notes['lead_mobile'] = '';
            $notes['liaison_realname'] = '';
            $notes['liaison_mobile'] = '';
            $notes['unit_realname'] = '';
            $notes['unit_mobile'] = '';
            $notes['capital_type'] = '';
            $notes['capital_amount'] = '';
            if ($capital = db("project_capital")->where("proid",$proid)->select()) {
                $this->assign('capitalCnt', count($capital));
                $this->assign('capital', $capital);
            } else {
                 $this->assign('capitalCnt', 0);
            }
            // if ($company = db("project_company")->where("proid",$proid)->find()) {
                $staff = db("project_staff")->where("conid",$proid)->select();
                foreach($staff as $k=>$v) {
                    if ( $v['stype'] == 1 ) {
                        $notes['legal_realname'] = $v['realname'];
                    }
                    if ( $v['stype'] == 2 ) {
                        $notes['lead_realname'] = $v['realname'];
                        $notes['lead_mobile'] = $v['telphone'];
                    }
                    if ( $v['stype'] == 3 ) {
                         $notes['liaison_realname'] = $v['realname'];
                        $notes['liaison_mobile'] = $v['telphone'];
                    }
                    if ( $v['stype'] == 4 ) {
                         $notes['unit_realname'] = $v['realname'];
                        $notes['unit_mobile'] = $v['telphone'];
                    }
                }
            // }

            $this->assign('info', $data);

            $cuserData = db("admin_user")->where("id",$data['cuser'])->find();
            $this->assign('cuserData', $cuserData);
            $this->assign('notes', $notes);

            $this->assign('productType', json_decode(cache('dict_dict_projecttype'), true));
            $this->assign('schedule', $this->_schedule);
            $this->assign('productLevel', json_decode(cache('dict_dict_projectlevel'), true));
            $this->assign('capitalType', json_decode(cache('dict_dict_capial'), true));

          
            // 手续完成情况
            $examData = db("project_exam")->where("proid",$proid)->select();
            $examName = json_decode(cache('dict_dict_exam'), true);
            $examShow = array();
            foreach($examData as $k=>$v) {
                $examShow[$v['ptype']]['data'][] = $v;
            }

            foreach($examName as $k=>$v) {
                $examShow[$k]['cnt'] = 0;
                $examName[$k]['id'] = $k;
                if ($v['status'] == 1) {
                    if ( isset($examShow[$k]['data']) ) {
                        $examShow[$k]['cnt'] = count($examShow[$k]['data']);
                    }
                } else {
                    unset($examName[$k]);
                }
            }

            $this->assign('examShow', $examShow);
            $this->assign('examName', $examName);
            $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
            $this->assign('dicttens', json_decode(cache('dict_dict_tens'), true));
            $this->assign('examStatus', $this->_examStatus);
            $this->assign('_isImportant', $this->_isImportant);  
            $this->assign('productTens', json_decode(cache('dict_dict_tens'), true));          

            $subexam = 0;
            if ( ADMIN_ROLE == 3 and $data['step'] == 30 ) { //企业申报
                $subexam = 1;
            }

            if ( ADMIN_ROLE == 5 and $data['step'] == 40 ) { //主管部门审核
                $subexam = 1;
            }

            if ( ADMIN_ROLE == 4 and ($data['step'] == 50) ) { //政府职能部门
                $subexam = 1;
            }
            $this->assign('subexam', $subexam);

            $editpar = 0;
            if ( ADMIN_ROLE == 3 and $data['step'] <= 30 ) { //企业申报
                $editpar = 1;
            }

            if ( ADMIN_ROLE == 5 and $data['step'] == 40 ) { //分管部门处理信息
                $editpar = 1;
            }

            if ( ADMIN_ROLE == 4 and $data['step'] == 50 ) { //政府职能部门
                $editpar = 1;
            }
            $this->assign('editpar', $editpar);


            return $this->fetch();
        } else {
            return $this->success('该项目信息尚未提交完成', url('index/index'));
        }
    }

    // 查看项目信息
    public function prostaff() {
        $proid = input('param.proid') ? intval(input('param.proid')) : 0;
        if ( $proid > 0 and $data = db("project_info")->where('step >= 30 and recid='.$proid)->find() ) {
            $this->assign('proid', $proid);
     
            $notes = array();
            $notes['lead_realname'] = '';
            $notes['lead_mobile'] = '';
            $notes['liaison_realname'] = '';
            $notes['liaison_mobile'] = '';
            $notes['unit_realname'] = '';
            $notes['unit_mobile'] = '';
            $notes['capital_type'] = '';
            $notes['capital_amount'] = '';

            // if ($company = db("project_company")->where("proid",$proid)->find()) {
                $staff = db("project_staff")->where("conid",$proid)->select();
                foreach($staff as $k=>$v) {
                    if ( $v['stype'] == 2 ) {
                        $notes['lead_realname'] = $v['realname'];
                        $notes['lead_mobile'] = $v['telphone'];
                    }
                    if ( $v['stype'] == 3 ) {
                         $notes['liaison_realname'] = $v['realname'];
                        $notes['liaison_mobile'] = $v['telphone'];
                    }
                    if ( $v['stype'] == 4 ) {
                         $notes['unit_realname'] = $v['realname'];
                        $notes['unit_mobile'] = $v['telphone'];
                    }
                }
            // }
            $this->assign('notes', $notes);

            $login = session('admin_user');
            $userData6 = db("admin_user")->where("id",$login['uid'])->find();
            $this->assign('stype',$userData6['stype']);

            return $this->fetch();
        } else {
            return $this->success('该项目信息尚未提交完成', url('index/index'));
        }
    }


    public function fenguan() {
        $data = db("admin_user")->where("role_id=5")->field('id,nick')->select();
        $fenguanTmp = db("project_info")->alias('pinfo')
                ->where('pinfo.step>=60 and pinfo.dunit > 0')
                ->group('pinfo.dunit')
                ->field('pinfo.dunit,count(*) as cnt,sum(amount) as amount,sum(eamount) as eamount')
                ->select();


        $fenguan = array();
        foreach ($fenguanTmp as $key => $value) {
            $fenguan[$value['dunit']] = $value;
        }
        $this->assign('fenguan', $fenguan);
        $this->assign('data', $data);
        $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
        return $this->fetch();       
    }

    public function xiaqu() {
        $xiaquTmp = db("project_info")
                ->where('step>=60')
                ->group('xiaqu')
                ->field('xiaqu,count(*) as cnt,sum(amount) as amount,sum(eamount) as eamount')
                ->select();
        $this->assign('Dictxiaqu', json_decode(cache('dict_dict_xiaqu'), true));
        $xiaqu = array();
        foreach ($xiaquTmp as $key => $value) {
            $xiaqu[$value['xiaqu']] = $value;
        }
        $this->assign('xiaqu', $xiaqu);
        return $this->fetch();  
    }

     public function shouxu() {
        $data = db("admin_user")->where("role_id=6 and stype = 2")->field('unit,nick')->select();
        

        $stmp = db("project_dynamic")->alias('duna')
                    ->join("project_info pinfo","pinfo.recid=duna.proid")
                    ->where('duna.status != 0 and pinfo.step >= 60 and duna.unit is not null')
                    ->group("duna.unit")
                    ->field('duna.unit,duna.recid,count(*) as cnt')
                    ->select();

        
        $shouxu = array();
        foreach($stmp as $k=>$v) {
            $unit = explode(",", $v['unit']);
            foreach($unit as $uk=>$uv) {
                if ( array_key_exists($uv, $shouxu) ) {
                    if ( in_array($v['recid'], $shouxu[$uv]['recid']) ) {

                    } else {
                        $shouxu[$uv]['recid'][] = $v['recid'];
                        $shouxu[$uv]['cnt'] = $shouxu[$uv]['cnt'] + $v['cnt'];
                    }
                }  else {
                    $shouxu[$uv] = array(
                                            'recid' => array($v['recid']),
                                            'cnt' => $v['cnt']
                                        );
                } 
            }
        }
        $this->assign('shouxu', $shouxu);
        $this->assign('data', $data);
        return $this->fetch();  
    }



    public function assets() {
        $type = input('param.type') ? intval(input('param.type')) : 1;
        $tenarr = json_decode(cache('dict_dict_tens'), true);
        if ( $type == 1 ) {
            $tenarr1 = array();
            foreach($tenarr as $k=>$v) {
                if ( $v['type'] == 1 ) {
                    $tenarr1[] = $v['recid'];
                }
            }

            $data = db("project_info")->alias("pinfo")
                ->join("admin_user puser","pinfo.punit=puser.id")
                ->where('pinfo.step>=60 and pinfo.isten = 1 and pinfo.tentype in ('. implode(",", $tenarr1) .')')
                ->field('pinfo.*,puser.nick')
                ->select();
        }
        if ( $type == 2 ) {
            $tenarr1 = array();
            foreach($tenarr as $k=>$v) {
                if ( $v['type'] == 2 ) {
                    $tenarr1[] = $v['recid'];
                }
            }

            $data = db("project_info")->alias("pinfo")
                ->join("admin_user puser","pinfo.punit=puser.id")
                ->where('pinfo.step>=60 and pinfo.isten = 1 and pinfo.tentype in ('. implode(",", $tenarr1) .')')
                ->field('pinfo.*,puser.nick')
                ->select();
        }
        if ( $type == 3 ) {
            $data = db("project_info")->alias("pinfo")
                ->join("admin_user puser","pinfo.punit=puser.id")
                ->where('pinfo.step>=60')
                ->group('pinfo.punit')
                ->field('sum(pinfo.amount) as amount,sum(pinfo.eamount) as eamount,puser.nick')
                ->select();
        }
        if ( $type == 4 ) {
            $data = db("project_info")->alias("pinfo")
                ->where('pinfo.step>=60')
                ->group('pinfo.xiaqu')
                ->field('sum(pinfo.amount) as amount,sum(pinfo.eamount) as eamount,pinfo.xiaqu')
                ->select();
            $this->assign('Dictxiaqu', json_decode(cache('dict_dict_xiaqu'), true));
        }
        $this->assign('data', $data);
        $this->assign('type', $type);
        return $this->fetch();  
    }

    public function shengshi() {
        $rdata = array(
                                'code' => 9999,
                                'msg' => '该项目不能进行本操作'
                              );
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $proid = isset($data['proid']) ? intval($data['proid']) : 0;
            if ( $proid > 0 and $project = db("project_info")->where("step>=60 and isimportant > 1 and recid=$proid")->find() ) {
                $saveData = array('importantexam'=>1);
                db("project_info")->where("recid",$project['recid'])->update($saveData);
                $rdata = array(
                                'code' => 0,
                                'msg' => '操作成功'
                              );
            } 
        }
        die(json_encode($rdata));
    }


    public function preshengshi() {
        $rdata = array(
                                'code' => 9999,
                                'msg' => '该项目不能进行本操作'
                              );
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $proid = isset($data['proid']) ? intval($data['proid']) : 0;
            $isimportant = isset($data['isimportant']) ? intval($data['isimportant']) : 2;
            if ( $proid > 0 and $project = db("project_info")->where("step>=60 and isimportant = 1 and importantexam = 0 and recid=$proid")->find() ) {
                $saveData = array('isimportant'=>$isimportant);
                db("project_info")->where("recid",$project['recid'])->update($saveData);
                $rdata = array(
                                'code' => 0,
                                'msg' => '操作成功'
                              );
            } 
        }
        die(json_encode($rdata));
    }

    public function pretenexam() {
        $rdata = array(
                                'code' => 9999,
                                'msg' => '该项目不能进行本操作'
                              );
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $proid = isset($data['proid']) ? intval($data['proid']) : 0;
            $istenselect = isset($data['istenselect']) ? intval($data['istenselect']) : 1;
            if ( $proid > 0 and $project = db("project_info")->where("step>=60 and isten = 0 and recid=$proid")->find() ) {
                $saveData = array('isten'=>1,'istenselect'=>$istenselect);
                db("project_info")->where("recid",$project['recid'])->update($saveData);
                $rdata = array(
                                'code' => 0,
                                'msg' => '操作成功'
                              );
            } 
        }
        die(json_encode($rdata));
    }


     public function dealten() {
        $rdata = array(
                                'code' => 9999,
                                'msg' => '该项目不能进行本操作'
                              );
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $proid = isset($data['proid']) ? intval($data['proid']) : 0;
            if ( $proid > 0 and $project = db("project_info")->where("step>=60 and isten = 1 and recid=$proid")->find() ) {
                $saveData = array('tenexam'=>1,'tentype'=>$data['tentype']);
                db("project_info")->where("recid",$project['recid'])->update($saveData);
                $rdata = array(
                                'code' => 0,
                                'msg' => '操作成功'
                              );
            } 
        }
        die(json_encode($rdata));
    }

    public function important() {
        $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
        $data = db("project_info")
                ->where('step >= 60 and isimportant = 1 and importantexam = 0')
                ->field('*')
                ->order('recid','desc')
                ->paginate();
        $pages = $data->render();
        $this->assign('data', $data);
        $this->assign('leftmenu', 41);
        $this->assign('type', 4);
        return $this->fetch();
    }

    public function tenexam() {
        $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));
        $data = db("project_info")
                ->where('step >= 60 and isten = 0')
                ->field('*')
                ->order('recid','desc')
                ->paginate();
        $pages = $data->render();
        $this->assign('data', $data);
        $this->assign('leftmenu', 41);
        $this->assign('type', 4);
        return $this->fetch();   
    }

    //设置允许提交申请时间
    public function timelimit(){
        $ptime = date('Y',time());
        $login = session("admin_user");
        $data = db("project_limit")->where("ltime",$ptime)->find();
        if ($this->request->isPost()){
            $in=$this->request->post();
            if (!$data['ltime']){
                $in['ctime'] = date("Y-m-d H:i:s");//创建时间
                $in['cuser'] = $login['uid'];//创建人
                $ptime = date('Y',time());
                $in['ltime'] = $ptime;//获取当前年份进行设置
                db("project_limit")->insert($in);
            }else{
                $in['utime'] = date("Y-m-d H:i:s");
                db("project_limit")->where("ltime",$ptime)->update($in);
            }
            return $this->success('审核时间修改成功');//后续需要进行确认是否设置完时间不能进行修改
        }
        if(!$data){
            $data = array();
        }

        $this->assign('data',$data);
        return $this->fetch();
    }
    // 月报问题列表
    public function problemlist() {
        $login = session('admin_user');
        $userData = db("admin_user")->where("id",$login['uid'])->find();//查询出用户信息
        $this->assign('stype',$userData['stype']);
        $postdata = $this->request->post();
        /******************筛选查询条件*****************/
        $seayear = input('param.year') ? intval(input('param.year')) : date("Y");//过滤年
        $seamonth = input('param.month') ? intval(input('param.month')) : intval(date("m"));//过滤月
        $isresolve = input('param.isresolve');//过滤已经解决
        $isnotresolve = input('param.isnotresolve');//过滤未解决
        $ismonth = input('param.ismonth');//过滤未解决
        $keyword = input('param.keyword') ? trim(input('param.keyword')) : '';//输入框进行筛选查询

        //初始化查询为与自己账户相关的问题
        $where = "FIND_IN_SET(".$userData['unit'].",a.unit)";
        //判断输入框查询
        if ( !empty($keyword) ) {
            $where .= "and b.title like '%$keyword%'";//动态增加查询语句
        }
        //判断为已解决问题
        if(strcmp("1",$isresolve)){
            $where .="and a.`status`='0'";
        }
        //判断为未解决问题
        if(strcmp("1",$isnotresolve)){
            $where .="and a.`status`='1'";
        }
        //判断为当月新增问题
        if(strcmp("1",$ismonth)){
            $where .="AND DATE_FORMAT(a.utime,'%Y%m')=DATE_FORMAT(CURDATE(),'%Y%m')";
        }
        //返回输入结果
        $this->assign('keyword', $keyword);
        $this->assign('isresolve', $isresolve);
        $this->assign('isnotresolve', $isnotresolve);
        $this->assign('ismonth',$ismonth);
        /********************搜索框******************/

        /*
         * 通过动态赋值where条件，实现筛选查询
         * */

       // $where = "FIND_IN_SET(:id,a.unit) AND DATE_FORMAT(a.utime,'%Y%m')=DATE_FORMAT(CURDATE(),'%Y%m')";

        //查询与本账户ID有关系的问题
        $data = db("project_dynamic")->alias("a")
            ->join('project_info b',"a.proid=b.recid",'left')
            ->where($where)
            ->order('a.utime','desc')
            ->field('a.`qtype`,a.`notes`,a.`img`,a.`dunit`,a.`ctime`,a.`utime`,a.`exceptdate`,a.`consultdate`,a.`status`,b.`recid`,b.`code`,b.`title`')
            ->paginate();


        $pages = $data->render();
        $this->assign('data', $data);//返回查询数据
        $this->assign('pages', $pages);//分页
        $this->assign('etype',$this->_dynaType);//返回问题类型数据字典
        $this->assign('seayear', $seayear);//返回年
        $this->assign('seamonth', $seamonth);//返回月
        $this->assign('examUnit', json_decode(cache('dict_dict_unit'), true));//返回数据字典，项目类别

        $years = array();
        for($i=date("Y")-3;$i<=date('Y');$i++) {
            $years[] = $i;
        }
        $this->assign('years', $years);
        return $this->fetch();
    }
}
