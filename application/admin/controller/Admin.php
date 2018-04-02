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
use app\admin\model\commonModel;
/**
 * 管理员控制器
 */
class Admin extends Controller {

	private $table = 'admin';

	/**
	 * [admin_list description]
	 * @return [type] [description]
	 */
	public function admin_list() {
		$table = $this->table;
		$dataList = new commonModel();
		$list = $dataList->tableList($table);
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
		$id = input('id');
		var_dump($id);
	}

	public function adminDelete() {
		$id = input('id');
		$delete = new adminModel();
		$result = $delete->adminDelete($id);
		if ($result) {
			$this->success('删除成功!');
		} else {
			$this->error('删除失败!');
		}
	}

	public function adminStatus() {
		$id = input('id');
		$status = input('status');
		// var_dump($status);
		// die();
		$stop = new adminModel();
		$result = $stop->adminStatus($id,$status);
		if ($result) {
			$this->success('操作成功!');
		} else {
			$this->error('操作失败!');
		}
	}
}