<?php
// +----------------------------------------------------------------------
// | bzan
// +----------------------------------------------------------------------
// | Copyright (c) 2018~2022  All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: wyecho <@sina.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use think\Controller;
use app\admin\model\systemModel;
/**
 * 系统控制器
 */
class System extends Controller {

	/**
	 * index
	 */
	public function index(){
	    $data = new systemModel();
	    $data = $data->sysInfo();
	    $this->assign('data',$data);
	   	return $this->fetch();
	}

	public function sys_save() {}

	public function log() {
		return $this->fetch();
	}

}