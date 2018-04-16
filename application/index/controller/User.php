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
/**
 * UserController
 * 用户模块
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class User extends Controller {

	/**
	 * 用户中心首页
	 * @return [type] [description]
	 */
	public function index() {
		return $this->fetch();
	}


	/**
	 * 用户个人信息页面
	 * @return [type] [description]
	 */
	public function information() {
		return $this->fetch();
	}

	/**
	 * 用户安全设置页面
	 * @return [type] [description]
	 */
	public function safety() {
		return $this->fetch();
	}

}