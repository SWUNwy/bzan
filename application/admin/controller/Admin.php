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
use app\admin\model\adminModel;
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

	public function adminAdd() {
		$data  = [
			'name'	=> input('name'),
			'pwd'	=> input('password'),
			'tell'	=> input('tell'),
			'email'	=> input('email'),
			'role_id'	=> input('role_id'),
			'remarks'	=> input('remarks'),
		];
		$add = new adminModel();
		$result = $add->adminAdd($data);
		var_dump($result);
	}

}