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

class Member extends Controller {

	public function index() {
		return $this->fetch();
	}

	public function member_grade() {
		return $this->fetch();
	}

	public function member_detail() {
		return $this->fetch();
	}

}