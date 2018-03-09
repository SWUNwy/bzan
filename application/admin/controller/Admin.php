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
/**
 * 管理员控制器
 */
class Admin extends Controller {

	/**
	 * [admin_list description]
	 * @return [type] [description]
	 */
	public function admin_list() {
		return $this->fetch();
	}

	public function admin_info() {
		return $this->fetch();
	}

	public function auth_list() {
		return $this->fetch();
	}

}