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


	public function orderInfo() {
		return $this->fetch();
	}

	public function orderHandling() {
		return $this->fetch();
	}

	public function orderDetail() {
		return $this->fetch();
	}

}