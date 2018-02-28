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

class Brand extends Controller {

	public function index() {
		return $this->fetch();
	}

	/**
	 * [addBrand description]
	 * 添加品牌
	 */
	public function addBrand() {
		return $this->fetch();
	}
}
