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
use think\Request;
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
		$data = new adminModel();
		$list = $data->adminList();
		$allNum = count($list);
		$this->assign('allNum',$allNum);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function adminInfo() {
		$id = input('id');
		$info = new adminModel();
		$info = $info->adminInfo($id);
		$this->assign('info',$info);
		return $this->fetch();
	}

	public function auth_list() {
		return $this->fetch();
	}

	public function adminAdd() {
		$data  = [
			'name'	=> input('name'),
			'pwd'	=> md5(input('password')),
			'tell'	=> input('tell'),
			'email'	=> input('email'),
			'role_id'	=> input('role_id'),
			'remarks'	=> input('remarks'),
			'add_time'	=> date('Y-m-d H:i;s'),
			'login_ip'	=> request()->ip(),
		];
		$add = new adminModel();
		$result = $add->adminAdd($data);
		if ($result) {
			$this->success('添加管理员成功!');
		} else {
			$this->error('添加失败!');
		}
	}

	public function adminEdit() {
		echo "ok";
	}

}