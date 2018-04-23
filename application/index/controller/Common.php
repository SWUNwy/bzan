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
namespace app\index\controller;

use think\Controller;
use think\Db;
use \think\Request;

/**
 * CommonController
 * 前端公用方法
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-4-19)
 */
class Common extends Controller {

	/**
	 * 用户登出方法
	 * @return [type] [description]
	 */
	public function signOut() {
        session(null);
        $this->redirect('Index/index');		
	}

}