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
use app\admin\model\memberModel;
/**
 * MemberController
 * 会员管理模块控制器
 * @author wyecho <[paul.wang@hotstaro2o.com]>
 * @date(2018-1-19)
 */
class Member extends Controller {

	public function index() {
		$memberModel = new memberModel();
		$data = $memberModel->memberList();
		$count = count($data);
		$this->assign('count',$count);
		$this->assign('data',$data);
		return $this->fetch();
	}

	/**
	 * 会员级别设定
	 * @return [type] [description]
	 */
	public function memberGrade() {
		return $this->fetch();
	}

	/**
	 * 会员详细信息
	 * @return [type] [description]
	 */
	public function memberDetail() {
		$uid = input('uid');
		$memberModel = new memberModel();
		$info = $memberModel->memberInfo($uid);
		$this->assign('info',$info); 
		return $this->fetch();
	}


	public function memberAdd() {
		$data = [
			'uname' => input('uname'),
			'nickname' => input('nickname'),
			'pwd'	=> input('password'),
			'eamil'	=> input('email'),
			'phone' => input('phone'),
			'grade'	=> input('grade'),
			'add_time' => date('Y-m-d H:i:s'),
		];

	}

}