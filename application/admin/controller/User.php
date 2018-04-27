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
use app\admin\model\userModel;
/**
 * User
 * 会员管理模块控制器
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class User extends Controller {

	public function index() {
		$userModel = new userModel();
		$data = $userModel->userList();
		$count = count($data);
		$this->assign('count',$count);
		$this->assign('data',$data);
		return $this->fetch();
	}

	/**
	 * 会员级别设定
	 * @return [type] [description]
	 */
	public function userGrade() {
		return $this->fetch();
	}

	/**
	 * 会员详细信息
	 * @return [type] [description]
	 */
	public function userDetail() {
		$uid = input('uid');
		$userModel = new userModel();
		$info = $userModel->userInfo($uid);
		$this->assign('info',$info); 
		return $this->fetch();
	}


	public function userAdd() {
		$data = [
			'uname' => input('uname'),
			'nickname' => input('nickname'),
			'pwd'	=> input('password'),
			'email'	=> input('email'),
			'phone' => input('phone'),
			'grade'	=> input('grade'),
			'add_time' => date('Y-m-d H:i:s'),
		];
		$userModel = new userModel();
		$result = $userModel->userAdd($data);
		if ($result) {
			$this->success('添加成功!','User/index');
		} else {
			$this->error('添加失败!','User/index');
		}

	}

	/**
	 * 用户状态操作
	 * @return [type] [description]
	 */
	public function userState() {
		$uid = input('uid');
		$state = input('state');
		$userModel = new userModel();
		$result = $userModel->userState($uid,$state);
		if ($result) {
			$this->success('操作成功!','User/index');
		} else {
			$this->error('操作失败!','User/index');
		}
	}

	/**
	 * 删除用户
	 * @return [type] [description]
	 */
	public function userDelete() {
		$uid = input('uid');
		$userModel = new userModel();
		$result = $userModel->userDelete($uid);
		if ($result) {
			$this->success('操作成功!','User/index');
		} else {
			$this->error('操作失败!','User/index');
		}
	}

	public function userEdit(){
		$uid = input('uid');
		$userModel = new userModel();
		$data = $userModel->userInfo($uid);
		$this->assign('data',$data);
		return $this->fetch();
	}

	/**
	 * 保存用户修改后的信息
	 * @return [type] [description]
	 */
	public function userEditSave() {
		$uid = input('uid');
		$data = [
			'uname' => input('uname'),
			'nickname' => input('nickname'),
			'pwd'	=> input('password'),
			'email'	=> input('email'),
			'phone' => input('phone'),
			'grade'	=> input('grade'),
			'add_time' => date('Y-m-d H:i:s'),
		];
		$userModel = new userModel();
		$result = $userrModel->userEditSave($uid,$data);
		if ($result) {
			$this->success('修改成功!','User/index');
		} else {
			$this->error('修改失败!','User/index');
		}
	}


}