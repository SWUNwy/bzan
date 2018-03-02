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

class Order extends Controller {

	public function index() {
		return $this->fetch();
	}

	public function order_info() {
		return $this->fetch();
	}

	public function order_handling() {
		return $this->fetch();
	}

}