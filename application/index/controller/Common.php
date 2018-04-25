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

	public function _initialize() {
        $uid = session('uid');
        if(!isset($uid)){
          $uid = "";
        }
        if($uid == null || $uid == "" || $uid == "null" || $uid == 0){
          return $this->error('请登录！','Login/index');
        }
    }

	/**
	 * 用户登出方法
	 * @return [type] [description]
	 */
	public function signOut() {
        session(null);
        $this->redirect('Index/index');		
	}

	/**
	 * 商城搜索功能
	 * @return [type] [description]
	 */
	public function search() {
		$this->redirect('Index/index');
	}
}