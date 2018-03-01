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
 * 商城图片、广告管理
 */
class Picture extends Controller {

	public function index() {
		return $this->fetch();
	}
	
	public function ads_category() {
		return $this->fetch();
	}

	public function ads_list() {
		return $this->fetch();
	}

}